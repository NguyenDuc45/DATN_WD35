@extends('layouts.admin')

@section('title', 'Chi Tiết Sản Phẩm')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/themify.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/feather-icon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/remixicon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <!-- Thêm CSS của Slick Slider -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <style>
        .product-image {
            width: 100%;
            max-width: 400px;
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
        .variant-container, .review-container {
            cursor: pointer;
            padding: 10px;
            background-color: #f8f9fa;
            border-radius: 10px;
        }
        .variant-container:hover, .review-container:hover {
            background-color: #e9ecef;
        }
        .variant-table, .review-table {
            display: none;
        }
        .text-secondary {
            color: black !important;
        }
        /* CSS cho slider */
        .album-slider {
            margin-top: 20px;
        }
        .album-slider .album-img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }
        .slick-prev, .slick-next {
            z-index: 1;
        }
        .slick-prev:before, .slick-next:before {
            color: #000;
        }
        .album-slider .slick-slide {
            margin: 0 5px;
        }
        .album-slider .slick-list {
            margin: 0 -5px;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <h2 class="text-center text-success mb-4">Chi Tiết Sản Phẩm</h2>
    <div class="card card-custom shadow-lg border-0">
        <div class="row g-4 align-items-center">
            <div class="col-md-5 text-center">
                <img id="main-product-image" src="{{ asset('storage/' . $sanPham->hinh_anh) }}" class="product-image" alt="{{ $sanPham->ten_san_pham }}">
                <div class="album-slider mt-4">
                    <!-- Thêm ảnh chính vào slider -->
                    <div>
                        <img src="{{ asset('storage/' . $sanPham->hinh_anh) }}" class="album-img" data-image="{{ asset('storage/' . $sanPham->hinh_anh) }}" alt="Ảnh chính">
                    </div>
                    <!-- Các ảnh phụ -->
                    @if($sanPham->anhSP->isNotEmpty())
                        @foreach($sanPham->anhSP as $anh)
                            <div>
                                <img src="{{ asset('storage/' . $anh->link_anh_san_pham) }}" class="album-img" data-image="{{ asset('storage/' . $anh->link_anh_san_pham) }}" alt="Ảnh phụ">
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col-md-7 product-info">
                <p class="text-secondary">Tên sản phẩm: {{ $sanPham->ten_san_pham }}<p>
                <p class="text-secondary">Giá: {{ number_format($sanPham->gia_cu) }} đ</p>
                <p class="text-secondary">Mô tả: {!! nl2br($sanPham->mo_ta) !!}</p>
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

    <div class="card card-custom mt-4 shadow-lg border-0">
        <div class="review-container" onclick="toggleReviewTable()">
            <h4 class="text-success mb-0">Đánh giá ▼</h4>
        </div>
        
        <div class="px-3 py-2">
            <label for="filter-sao" class="form-label fw-bold">Lọc theo số sao:</label>
            <select id="filter-sao" class="form-select" onchange="filterReviews()">
                <option value="all">Tất cả</option>
                @for($i = 5; $i >= 1; $i--)
                    <option value="{{ $i }}">{{ $i }} sao</option>
                @endfor
            </select>
        </div>

        @if($sanPham->danhGias->isNotEmpty())
            <div class="table-responsive review-table">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Người dùng</th>
                            <th>Số sao</th>
                            <th>Nhận xét</th>
                            <th>Biến thể</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody id="review-table-body">
                        @foreach($sanPham->danhGias as $danhGia)
                            <tr data-sao="{{ $danhGia->so_sao }}">
                                <td>{{ $danhGia->user->ten_nguoi_dung ?? 'Ẩn danh' }}</td>
                                <td>
                                    @for($i = 0; $i < $danhGia->so_sao; $i++)
                                        ⭐
                                    @endfor
                                </td>
                                <td>{!! nl2br(e($danhGia->nhan_xet)) !!}</td>
                                <td>
                                    @if($danhGia->bienThe?->anh_bien_the)
                                        <img src="{{ asset('storage/' . $danhGia->bienThe->anh_bien_the) }}" width="60" class="img-thumbnail">
                                    @endif
                                    <br>
                                    {{ $danhGia->bienThe->ten_bien_the ?? 'Không rõ biến thể' }}
                                </td>
                                <td class="status-icon">
                                    @if ($danhGia->trang_thai == 1)
                                        <i class="ri-checkbox-circle-line text-success"></i>
                                    @else
                                        <i class="ri-close-circle-line text-danger"></i>
                                    @endif
                                </td>
                                <td>
                                    <button
                                        class="toggleStatus btn btn-sm {{ $danhGia->trang_thai == 1 ? 'btn-danger' : 'btn-primary' }}"
                                        data-id="{{ $danhGia->id }}">
                                        {{ $danhGia->trang_thai == 1 ? 'Ẩn' : 'Hiện' }}
                                    </button>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.album-slider').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                arrows: true,
                dots: true,
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });

            $('.album-slider').on('afterChange', function(event, slick, currentSlide) {
                var currentImage = $(slick.$slides[currentSlide]).find('img').attr('data-image');
                $('#main-product-image').attr('src', currentImage);
            });

            $('.album-slider .album-img').on('click', function() {
                var imageSrc = $(this).attr('data-image');
                $('#main-product-image').attr('src', imageSrc);
            });

            $('.toggleStatus').click(function() {
                var danhGiaId = $(this).data('id');
                var button = $(this);
                var newStatus = button.hasClass('btn-danger') ? 0 : 1;

                $.ajax({
                    url: '/danh-gia/update-status/' + danhGiaId,
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        trang_thai: newStatus
                    },
                    success: function(response) {
                        if (response.success) {
                            if (newStatus === 1) {
                                button.removeClass('btn-primary').addClass('btn-danger').text('Ẩn');
                                button.closest('tr').find('.status-icon i')
                                    .removeClass('ri-close-circle-line text-danger')
                                    .addClass('ri-checkbox-circle-line text-success');
                            } else {
                                button.removeClass('btn-danger').addClass('btn-primary').text('Hiện');
                                button.closest('tr').find('.status-icon i')
                                    .removeClass('ri-checkbox-circle-line text-success')
                                    .addClass('ri-close-circle-line text-danger');
                            }
                        } else {
                            alert('Cập nhật trạng thái thất bại.');
                        }
                    },
                    error: function() {
                        alert('Đã xảy ra lỗi. Vui lòng thử lại.');
                    }
                });
            });
        });

        function filterReviews() {
            const selected = document.getElementById("filter-sao").value;
            const rows = document.querySelectorAll("#review-table-body tr");

            rows.forEach(row => {
                const sao = row.getAttribute("data-sao");
                if (selected === "all" || sao === selected) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        }

        function toggleVariantTable() {
            const variantTable = document.querySelector(".variant-table");
            variantTable.style.display = variantTable.style.display === "none" || variantTable.style.display === "" ? "block" : "none";
        }

        function toggleReviewTable() {
            const reviewTable = document.querySelector(".review-table");
            reviewTable.style.display = reviewTable.style.display === "none" || reviewTable.style.display === "" ? "block" : "none";
        }
    </script>
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <script src="{{ asset('assets/js/customizer.js') }}"></script>
    <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/js/custom-data-table.js') }}"></script>
@endsection