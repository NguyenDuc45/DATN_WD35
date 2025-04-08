@extends('layouts.admin')

@section('title')
    Đơn hàng
@endsection

@section('css')
    <!-- Themify icon css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/themify.css') }}">

    <!-- Feather icon css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/feather-icon.css') }}">

    <!-- remixicon css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/remixicon.css') }}">

    <!-- Data Table css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">

    <!-- Plugins css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css') }}">

    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
@endsection

@section('content')
    <div class="col-sm-12">
        <div class="card card-table">
            <div class="card-body">
                <div class="title-header option-title">
                    <h5>Danh sách đơn hàng</h5>
                    {{-- <a href="#" class="btn btn-solid">Download all orders</a> --}}
                </div>
                <div class="w-100">
                    <div class="table-responsive">
                        <div class="mb-3 col-4 float-end d-flex flex-row-reverse">
                            <div class="col-6 mx-2">
                                <label for="trang_thai_don_hang">Trạng thái đơn hàng</label>
                                <select id="trang_thai_don_hang" class="form-control">
                                    <option value="">Tất cả</option>
                                    <option value="-1">Đã hủy</option>
                                    <option value="0">Chờ xác nhận</option>
                                    <option value="1">Đang xử lý</option>
                                    <option value="2">Đang giao</option>
                                    <option value="3">Đã giao</option>
                                    <option value="4">Hoàn thành</option>
                                    <option value="5">Trả hàng</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="trang_thai_thanh_toan">Trạng thái thanh toán</label>
                                <select id="trang_thai_thanh_toan" class="form-control">
                                    <option value="">Tất cả</option>
                                    <option value="0">Chưa thanh toán</option>
                                    <option value="1">Đã thanh toán</option>
                                </select>
                            </div>
                        </div>
                        <div id="orderTableContainer">
                            <table style="table-layout: fixed; width: 100%;" class="table order-table theme-table"
                                id="dataTable">
                                @foreach ($donHangs as $donHang)
                                    <thead>
                                        <tr>
                                            <th colspan="3">Mã đơn hàng: {{ $donHang->ma_don_hang }}</th>
                                            <th>
                                                @if ($donHang->trang_thai_thanh_toan == 0)
                                                    <span class="order-danger">Chưa thanh toán</span>
                                                @else
                                                    <span class="order-success">Đã thanh toán</span>
                                                @endif
                                            </th>
                                            <th>
                                                @if ($donHang->trang_thai_don_hang == -1)
                                                    <span class="order-danger">Đã hủy</span>
                                                @elseif ($donHang->trang_thai_don_hang == 0)
                                                    <span class="order-danger">Chờ xác nhận</span>
                                                @elseif ($donHang->trang_thai_don_hang == 1)
                                                    <span class="order-primary">Đang xử lý</span>
                                                @elseif ($donHang->trang_thai_don_hang == 2)
                                                    <span class="order-primary">Đang giao</span>
                                                @elseif ($donHang->trang_thai_don_hang == 3)
                                                    <span class="order-success">Đã giao</span>
                                                @elseif ($donHang->trang_thai_don_hang == 4)
                                                    <span class="order-success">Hoàn thành</span>
                                                @elseif ($donHang->trang_thai_don_hang == 5)
                                                    <span class="order-danger">Trả hàng</span>
                                                @else
                                                    <span>Trạng thái không hợp lệ</span>
                                                @endif
                                            </th>
                                            <th class="float-end">
                                                <a href="{{ route('donhangs.show', $donHang->id) }}">
                                                    <i class="ri-eye-line"></i>
                                                </a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="2">
                                                <b>Người đặt: </b>
                                                @if ($donHang->ten_nguoi_dung == '')
                                                    {{ $donHang->username }}
                                                @else
                                                    {{ $donHang->ten_nguoi_dung }}
                                                @endif
                                            </td>
                                            <td colspan="2">
                                                <b>Tổng tiền: </b>{{ number_format($donHang->tong_tien, 0, '', '.') }}đ
                                            </td>
                                            <td colspan="2"><b>Hình thức thanh toán:
                                                </b>{{ $donHang->ten_phuong_thuc }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><b>Tên người nhận: </b>{{ $donHang->ten_nguoi_nhan }}
                                            </td>
                                            <td colspan="2" class="text-truncate"><b>Email:
                                                </b>{{ $donHang->email_nguoi_nhan }}</td>
                                            <td colspan="2"><b>Số điện thoại: </b>{{ $donHang->sdt_nguoi_nhan }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-truncate"><b>Địa chỉ người nhận:
                                                </b>{{ $donHang->dia_chi_nguoi_nhan }}</td>
                                            <td colspan="2" class="text-truncate">
                                                <b>Ghi chú: </b>
                                                @if ($donHang->ghi_chu == '')
                                                    Không
                                                @else
                                                    {{ $donHang->ghi_chu }}
                                                @endif
                                            </td>
                                            <td><b>Ngày đặt: </b>{{ $donHang->created_at }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{ $donHangs->links('pagination::bootstrap-5') }}
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#trang_thai_don_hang, #trang_thai_thanh_toan').on('change', function() {
            let trangThaiDonHang = $('#trang_thai_don_hang').val();
            let trangThaiThanhToan = $('#trang_thai_thanh_toan').val();

            $.ajax({
                url: "{{ route('donhangs.filter') }}",
                method: 'GET',
                data: {
                    trang_thai: trangThaiDonHang,
                    thanh_toan: trangThaiThanhToan
                },
                success: function(response) {
                    $('#orderTableContainer').html(response.html);
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        });
    </script>

    <!-- customizer js -->
    <script src="{{ asset('assets/js/customizer.js') }}"></script>

    <!-- Sidebar js -->
    <script src="{{ asset('assets/js/config.js') }}"></script>

    <!-- Plugins js -->
    <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>

    <!-- Data table js -->
    <script src="{{ asset('assets/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/js/custom-data-table.js') }}"></script>

    <!-- all checkbox select js -->
    <script src="{{ asset('assets/js/checkbox-all-check.js') }}"></script>
@endsection
