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
                        <div class="mb-3 col-12 d-flex flex-row-reverse">
                            <div class="col-2">
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
                            <div class="col-2 mx-2">
                                <label for="trang_thai_thanh_toan">Trạng thái thanh toán</label>
                                <select id="trang_thai_thanh_toan" class="form-control">
                                    <option value="">Tất cả</option>
                                    <option value="0">Chưa thanh toán</option>
                                    <option value="1">Đã thanh toán</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="searchDonHang">Tìm kiếm</label>
                                <input type="text" id="searchDonHang" class="form-control"
                                    placeholder="Tìm theo mã đơn, người đặt...">
                            </div>
                        </div>
                        <div id="orderTableContainer">
                            @include('admins.donhangs.donhang-table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function fetchOrders(url = null) {
            let trangThaiDonHang = $('#trang_thai_don_hang').val();
            let trangThaiThanhToan = $('#trang_thai_thanh_toan').val();
            let keyword = $('#searchDonHang').val();

            url = url || "{{ route('donhangs.index') }}";

            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    trang_thai_don_hang: trangThaiDonHang,
                    trang_thai_thanh_toan: trangThaiThanhToan,
                    keyword: keyword
                },
                beforeSend: function() {
                    $('#orderTableContainer').html('<p>Đang tải...</p>');
                },
                success: function(data) {
                    $('#orderTableContainer').html(data);
                },
                error: function() {
                    alert('Không thể tải dữ liệu. Vui lòng thử lại!');
                }
            });
        }

        $(document).ready(function() {
            // Lọc theo trạng thái hoặc tìm kiếm
            $('#trang_thai_don_hang, #trang_thai_thanh_toan').on('change', function() {
                fetchOrders();
            });

            $('#searchDonHang').on('input', function() {
                fetchOrders();
            });

            // Phân trang
            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();
                let pageUrl = $(this).attr('href');
                fetchOrders(pageUrl);
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
