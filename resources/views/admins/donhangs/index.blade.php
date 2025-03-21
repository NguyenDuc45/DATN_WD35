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
                <div>
                    <div class="table-responsive">
                        <table class="table all-package order-table theme-table" id="table_id">
                            <thead>
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th>Người đặt</th>
                                    <th>Ngày đặt</th>
                                    <th>Hình thức thanh toán</th>
                                    <th>Trạng thái thanh toán</th>
                                    <th>Trạng thái đơn hàng</th>
                                    <th>Tổng tiền</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($donHangs as $donHang)
                                    <tr data-bs-toggle="offcanvas">
                                        <td>{{ $donHang->ma_don_hang }}</td>
                                        <td>{{ $donHang->ten_nguoi_dung }}</td>
                                        <td>{{ $donHang->created_at }}</td>
                                        <td>{{ $donHang->ten_phuong_thuc }}</td>
                                        <td>
                                            @if ($donHang->trang_thai_thanh_toan == 0)
                                                <span class="text-danger">Chưa thanh toán</span>
                                            @else
                                                <span class="text-success">Đã thanh toán</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($donHang->trang_thai_don_hang == -1)
                                                <span class="text-danger">Đã hủy</span>
                                            @elseif ($donHang->trang_thai_don_hang == 0)
                                                <span class="text-danger">Chưa xác nhận</span>
                                            @elseif ($donHang->trang_thai_don_hang == 1)
                                                <span class="text-success">Đã xác nhận</span>
                                            @elseif ($donHang->trang_thai_don_hang == 2)
                                                <span class="text-primary">Chờ vận chuyển</span>
                                            @elseif ($donHang->trang_thai_don_hang == 3)
                                                <span class="text-primary">Đang giao</span>
                                            @elseif ($donHang->trang_thai_don_hang == 4)
                                                <span class="text-success">Đã giao</span>
                                            @elseif ($donHang->trang_thai_don_hang == 5)
                                                <span class="text-danger">Trả hàng</span>
                                            @else
                                                <span>Trạng thái không hợp lệ</span>
                                            @endif
                                        </td>
                                        <td>{{ number_format($donHang->tong_tien, 0, '', '.') }}đ</td>
                                        <td>
                                            <a href="{{ route('donhangs.show', $donHang->id) }}">
                                                <i class="ri-eye-line"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{ $donHangs->links('pagination::bootstrap-5') }}
    </div>
@endsection

@section('js')
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
