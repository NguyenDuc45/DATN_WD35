@extends('layouts.admin')

@section('title', 'Chi Tiết Sản Phẩm')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/themify.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/feather-icon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/remixicon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <style>
        .product-image {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-custom {
            border-radius: 15px;
            padding: 20px;
        }
        .product-info h3 {
            font-size: 26px;
            font-weight: 700;
        }
        .product-info p {
            font-size: 18px;
            font-weight: 600;
        }
        .table thead {
            background-color: #f8f9fa;
            color: black;
            font-weight: bold;
        }
        .table tbody tr {
            background-color: #ffffff;
            color: black;
            font-weight: 600;
        }
        h2.text-primary {
            font-weight: 800;
        }
        h4.text-success {
            font-weight: 700;
        }
        .variant-container {
            cursor: pointer;
            padding: 10px;
            background-color: #f8f9fa;
            border-radius: 10px;
        }
        .variant-container:hover {
            background-color: #e9ecef;
        }
        .variant-table {
            display: none;
        }
        .text-secondary {
            color: black !important;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <h2 class="text-center text-success mb-4">Chi Tiết Sản Phẩm</h2>
    <div class="card card-custom shadow-lg border-0">
        <div class="row g-4 align-items-center">
            <div class="col-md-5 text-center">
                <img width="200px" src="{{ asset('storage/' . $sanPham->hinh_anh) }}" class="product-image" alt="{{ $sanPham->ten_san_pham }}">
            </div>
            <div class="col-md-7 product-info">
                <p class="text-secondary">Tên sản phẩm: {{ $sanPham->ten_san_pham }}<p>
                <p class="text-secondary">Giá: {{ number_format($sanPham->gia_cu) }} đ</p>
                <p class="text-secondary">Mô tả: {!! $sanPham->mo_ta !!}</p>



            </div>
        </div>
    </div>

    <div class="card card-custom mt-4 shadow-lg border-0">
        <div class="variant-container" onclick="toggleVariantTable()">
            <h4 class="text-success mb-0">Biến thể ▼</h4>
        </div>
        @if($sanPham->bienThes->isNotEmpty())
            <div class="table-responsive variant-table">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Ảnh</th>
                            <th>Tên biến thể</th>
                            <th>Giá bán</th>
                            <th>Số lượng</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sanPham->bienThes as $bienThe)
                            <tr>
                                <td class="text-center">
                                    @if($bienThe->anh_bien_the)
                                        <img src="{{ asset('storage/' . $bienThe->anh_bien_the) }}" alt="{{ $bienThe->ten_bien_the }}" class="img-thumbnail" width="80">
                                    @else
                                        <span class="text-muted">Không có ảnh</span>
                                    @endif
                                </td>
                                <td>{{ $bienThe->ten_bien_the }}</td>
                                <td>{{ number_format($bienThe->gia_ban) }} VNĐ</td>
                                <td>{{ $bienThe->so_luong }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-muted">Không có biến thể nào cho sản phẩm này.</p>
        @endif
    </div>


    {{-- Đánh giá --}}

    <div class="card card-custom mt-4 shadow-lg border-0">
        <div class="variant-container">
            <h4 class="text-success mb-0">Đánh giá ▼</h4>
        </div>
    
        @if($sanPham->danhGias->isNotEmpty())
            <div class="table-responsive p-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Người dùng</th>
                            <th>Số sao</th>
                            <th>Nhận xét</th>
                            <th>Biến thể</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sanPham->danhGias as $danhGia)
                            <tr>
                                <td>{{ $danhGia->user->username ?? 'Ẩn danh' }}</td>
                                <td>
                                    @for($i = 0; $i < $danhGia->so_sao; $i++)
                                        ⭐
                                    @endfor
                                </td>
                                <td>{!! nl2br(e($danhGia->nhan_xet)) !!}</td>
                                <td>{{ $danhGia->bienThe->ten_bien_the ?? 'Không rõ biến thể' }}</td>
                                <td>
                                    @if($danhGia->trang_thai)
                                        <span class="badge bg-success">Hiển thị</span>
                                    @else
                                        <span class="badge bg-secondary">Ẩn</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-muted px-3">Chưa có đánh giá nào cho sản phẩm này.</p>
        @endif
    </div>
    
</div>
@endsection



@section('js')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const tabLinks = document.querySelectorAll(".nav-tabs .nav-link");
        const tabContents = document.querySelectorAll(".tab-pane");

        tabLinks.forEach(link => {
            link.addEventListener("click", function (event) {
                event.preventDefault();

                tabLinks.forEach(tab => tab.classList.remove("active"));
                tabContents.forEach(content => content.classList.remove("active", "show"));

                this.classList.add("active");

                const targetTab = document.querySelector(this.getAttribute("href"));
                if (targetTab) {
                    targetTab.classList.add("active", "show");
                }
            });
        });
    });
</script>
<script>
    function toggleVariantTable() {
        const variantTable = document.querySelector(".variant-table");
        variantTable.style.display = variantTable.style.display === "none" || variantTable.style.display === "" ? "block" : "none";
    }
</script>
<script src="{{ asset('assets/js/config.js') }}"></script>
<script src="{{ asset('assets/js/customizer.js') }}"></script>
<script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
<script src="{{ asset('assets/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/js/custom-data-table.js') }}"></script>
@endsection
