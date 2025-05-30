@extends('layouts.admin')

@section('title')
    Phương thức thanh toán
@endsection

@section('css')
    <!-- remixicon css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/remixicon.css') }}">

    <!-- Data Table css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">

    <!-- Themify icon css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/themify.css') }}">

    <!-- Feather icon css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/feather-icon.css') }}">

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
                    <h5>Danh sách phương thức thanh toán </h5>
                    <form class="d-inline-flex">
                        <a href="{{route('phuongthucthanhtoans.create')}}" class="align-items-center btn btn-theme d-flex">
                            <i data-feather="plus-square"></i>Thêm mới
                        </a>
                    </form>
                </div>

                <div class="table-responsive table-product">
                    <form class="d-inline-flex col-4" method="get" action="{{ route('phuongthucthanhtoans-search') }}">
                        <div style="margin-right: 10px" class=" col-7 ">
                            <input class="form-control col-1" type="text" placeholder="Tìm kiếm" name="key" value="{{ request('key') }}">
                        </div>
                            <button type="submit" class="btn btn-theme mr-1"><i data-feather="search"></i></button>
                    </form>
                    @if(session('error-key'))
                        <p class="text-danger">{{ session('error-key') }}</p>
                    @endif
                    <table class="table all-package theme-table" id="table_id">
                        <thead>
                            <tr>
                                <th>
                                    <div class="check-box-contain">
                                        <span class="form-check user-checkbox">
                                            <input class="checkbox_animated checkall"
                                                type="checkbox" value="">
                                        </span>
                                        <span>STT</span>
                                    </div>
                                </th>
                                <th>Phương thức thanh toán</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>

                        <tbody>
                        @if(@$lists)
                            @foreach ( $lists as $key => $item)
                                <tr class="justify-content-center">
                                    <td>
                                        <div class="check-box-contain">
                                            <span class="form-check user-checkbox">
                                                <input class="checkbox_animated check-it"
                                                    type="checkbox" value="">
                                            </span>
                                            <span>{{ ++$key }}</span>
                                        </div>
                                    </td>

                                    <td>{{ $item->ten_phuong_thuc }}</td>

                                    <td class="{{ $item->trang_thai == 1 ? 'status-close' : 'status-danger' }}">
                                        <span>{{ $item->trang_thai == 1 ? 'Hoạt động' : 'Không hoạt động' }}</span>
                                    </td>

                                    <td>
                                        <ul>
                                            <li>
                                                <a href="{{ route('phuongthucthanhtoans.edit', $item->id) }}">
                                                    <i class="ri-pencil-line"></i>
                                                </a>
                                            </li>
                                            @if ($item->id > 3)
                                                <li>
                                                    <a href="#" onclick="confirmDelete(event, {{ $item->id }})">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </a>

                                                    <form id="delete-form-{{ $item->id }}" action="{{ route('phuongthucthanhtoans.destroy', $item->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </li>
                                            @endif




                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        @endif


                        </tbody>
                    </table>
                    @if($lists->isEmpty())
                        <p style="font-size: 2rem" class="text-center text-muted">Danh sách trống</p>
                        <center><img style="width: 200px; height: 200px" src="{{ asset('assets/images/inner-page/not-found.png') }}" alt=""></center>
                    @endif
                </div>
            </div>
        </div>
    </div>
    {{ $lists->links("pagination::bootstrap-5") }}
@endsection

@section('js')
<script>
    function confirmDelete(event, id) {
        event.preventDefault(); // Ngăn chặn hành động mặc định của thẻ <a>

        Swal.fire({
            title: 'Bạn có chắc chắn muốn xóa?',
            text: 'Hành động này không thể hoàn tác!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Có, xóa!',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit(); // Gửi form ẩn để xóa
            }
        });
    }
</script>
    <!-- customizer js -->
    <script src="{{ asset('assets/js/customizer.js') }}"></script>

    <!-- Sidebar js -->
    <script src="{{ asset('assets/js/config.js') }}"></script>

    <!-- Plugins JS -->
    <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>

    <!-- Data table js -->
    <script src="{{ asset('assets/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/js/custom-data-table.js') }}"></script>

    <script src="{{ asset('assets/js/checkbox-all-check.js') }}"></script>
@endsection
