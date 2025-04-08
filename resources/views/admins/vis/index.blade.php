@extends('layouts.admin')

@section('title', 'Quản lý ví người dùng')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4" style="color: #009688; font-weight: 700; font-size: 2.5rem;">Danh sách ví người dùng</h2>

    <form method="GET" class="mb-4">
        <div class="input-group" style="max-width: 400px;">
            <input type="text" name="keyword" class="form-control"
                autocomplete="off"
                placeholder="Tìm theo tên hoặc username..." value="{{ request('keyword') }}">
            <button type="submit" class="btn" style="background-color: #009688; color: white;">
                <i class="bi bi-search"></i> Tìm kiếm
            </button>
        </div>
    </form>

    <form method="GET" class="mb-4 d-flex flex-wrap align-items-center gap-3">
        {{-- <div class="input-group" style="max-width: 400px;">
            <input type="text" name="keyword" class="form-control"
                autocomplete="off"
                placeholder="Tìm theo tên hoặc username..." value="{{ request('keyword') }}">
            <button type="submit" class="btn" style="background-color: #009688; color: white;">
                <i class="bi bi-search"></i> Tìm kiếm
            </button>
        </div> --}}
    
        <div>
            <select name="loc_can_duyet" class="form-select" onchange="this.form.submit()" style="min-width: 200px;">
                <option value="">-- Lọc  theo tất cả  --</option>
                <option value="1" {{ request('loc_can_duyet') == '1' ? 'selected' : '' }}>Cần duyệt</option>
            </select>
        </div>

        
    </form>
    
    <table class="table table-bordered shadow-sm" style="border-color: #009688;">
        <thead style="background-color: #009688; color: white !important;">
            <tr>
                <th style="color: white !important;">Tên người dùng</th>
                <th style="color: white !important;">Số dư ví</th>
                <th style="color: white !important;">Số tiền rút chờ xử lý</th>
                <th style="color: white !important;">Hành động</th>
                <th style="color: white !important;">Lịch sử giao dịch</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                @php
                    $tongTienRut = 0;
                    $rutChuaXuLy = collect();

                    if ($user->vi) {
                        $rutChuaXuLy = $user->vi->giaodichs()
                            ->where('loai', 'Rút tiền')
                            ->where('trang_thai', 0)
                            ->get();

                        $tongTienRut = $rutChuaXuLy->sum('so_tien');
                    }
                @endphp

                <tr>
                    <td>{{ $user->ten_nguoi_dung ?? $user->username }}</td>

                    <td style="color: #009688; font-weight: 600;">
                        {{ number_format($user->vi->so_du ?? 0, 0, ',', '.') }} VNĐ
                    </td>

                    <td style="color: #dc3545; font-weight: 600;">
                        @if ($tongTienRut > 0)
                            {{ number_format($tongTienRut, 0, ',', '.') }} VNĐ
                        @else
                            <span class="text-muted">Không có</span>
                        @endif
                    </td>
                    
                    
                    <td>
                        @if ($rutChuaXuLy->count() > 0)
                            <form method="POST" action="{{ route('admin.vis.xuLyRutNhieu') }}">
                                @csrf
                                @foreach ($rutChuaXuLy as $giaoDich)
                                    <input type="hidden" name="ids[]" value="{{ $giaoDich->id }}">
                                @endforeach
                                <input type="hidden" name="trang_thai" value="1">
                                <button type="submit" class="btn btn-sm"
                                    style="background-color: #009688; color: white; font-weight: 600;">
                                    Duyệt rút tiền
                                </button>
                            </form>
                        @else
                            <span class="text-muted">Không có</span>
                        @endif
                    </td>
                    
                    <td>
                        <a href="{{ route('admin.vis.show', $user->id) }}"
                            class="btn btn-sm"
                            style="background-color: #009688; color: white; font-weight: 600;">
                            Xem giao dịch
                        </a>
                    </td>

                   
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $users->appends(request()->query())->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection

@section('js')
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
