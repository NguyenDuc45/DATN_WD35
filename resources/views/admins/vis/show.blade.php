@extends('layouts.admin')

@section('title', 'Lịch sử ví người dùng')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 style="color: #009688; font-weight: 700;">Lịch sử ví -
                <span class="text-dark">{{  $user->username }}</span>
            </h4>
            <span class="badge rounded-pill px-3 py-2 fs-6" style="background-color: #009688; color: white;">
                💰 Số dư: {{ number_format($user->vi->so_du ?? 0, 0, ',', '.') }} VNĐ
            </span>

        </div>

        {{-- Bộ lọc trạng thái --}}
        <div class="card shadow mb-4 rounded-4">
            <div class="card-body">
                <form method="GET" class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3 align-items-end">
                    {{-- Trạng thái --}}
                    <div>
                        <label for="trang_thai" class="form-label fw-semibold">Trạng thái</label>
                        <select name="trang_thai" id="trang_thai" class="form-select" onchange="this.form.submit()">
                            <option value="">Tất cả</option>
                            <option value="1" {{ request('trang_thai') === '1' ? 'selected' : '' }}>✅ Thành công</option>
                            <option value="0" {{ request('trang_thai') === '0' ? 'selected' : '' }}>⏳ Chờ xử lý</option>
                            <option value="2" {{ request('trang_thai') === '2' ? 'selected' : '' }}>❌ Huỷ</option>
                        </select>
                    </div>

                    {{-- Loại giao dịch --}}
                    <div>
                        <label for="loai" class="form-label fw-semibold">Loại giao dịch</label>
                        <select name="loai" id="loai" class="form-select" onchange="this.form.submit()">
                            <option value="">Tất cả</option>
                            <option value="Nạp tiền" {{ request('loai') === 'Nạp tiền' ? 'selected' : '' }}>💰 Nạp tiền
                            </option>
                            <option value="Rút tiền" {{ request('loai') === 'Rút tiền' ? 'selected' : '' }}>🏧 Rút tiền
                            </option>
                            <option value="Hoàn tiền" {{ request('loai') === 'Hoàn tiền' ? 'selected' : '' }}>↩️ Hoàn tiền
                            </option>
                            <option value="Mua hàng" {{ request('loai') === 'Mua hàng' ? 'selected' : '' }}>🛒 Mua hàng
                            </option>
                        </select>
                    </div>

                    {{-- Từ ngày --}}
                    <div>
                        <label for="tu_ngay" class="form-label fw-semibold">Từ ngày</label>
                        <input type="date" name="tu_ngay" id="tu_ngay" class="form-control" value="{{ request('tu_ngay') }}"
                            onchange="this.form.submit()">
                    </div>

                    {{-- Đến ngày --}}
                    <div>
                        <label for="den_ngay" class="form-label fw-semibold">Đến ngày</label>
                        <input type="date" name="den_ngay" id="den_ngay" class="form-control"
                            value="{{ request('den_ngay') }}" onchange="this.form.submit()">
                    </div>
                </form>
            </div>
        </div>




        {{-- Cập nhật trạng thái --}}
        <form method="POST" id="form-cap-nhat-trang-thai" action="{{ route('admin.vis.updateTrangThai') }}" onsubmit="return handleCapNhat(event)">
            @csrf
            <div class="card shadow mb-4" style="border-radius: 16px;">
                <div class="card-body">
                    <div class="row g-3 align-items-center">
                        <!-- Select trạng thái -->
                        <div class="col-auto">
                            <label for="trang_thai_moi" class="form-label mb-0 fw-semibold">Trạng thái mới</label>
                            <select name="trang_thai" id="trang_thai_moi"
                                class="form-select form-select-sm border-0 rounded-3 shadow-sm" style="min-width: 180px;"
                                required onchange="toggleLyDo()">
                                <option value="">-- Chọn trạng thái --</option>
                                <option value="1">✅ Duyệt yêu cầu</option>
                                <option value="2">❌ Huỷ yêu cầu</option>
                            </select>
                        </div>

                        <!-- Input lý do (ẩn/hiện) -->
                        <div class="col-auto d-none" id="ly_do_wrapper">
                            <label for="ly_do_chung" class="form-label mb-0 fw-semibold">Lý do huỷ</label>
                            <input type="text" name="ly_do" id="ly_do_chung"
                                class="form-control form-control-sm border-0 rounded-3 shadow-sm"
                                placeholder="Nhập lý do huỷ..." style="min-width:800px; max-width: 100%;">
                        </div>


                        <!-- Nút cập nhật -->
                        <div class="col-auto d-flex align-items-end">
                            <button type="submit" class="btn btn-sm"
                                style="background-color: #009688; color: white; border-radius: 20px; padding: 8px 20px;"
                                onclick="return handleCapNhat()">
                                <i class="bi bi-check-circle me-1"></i> Cập nhật
                            </button>
                        </div>
                    </div>
                </div>
            </div>




            {{-- Bảng giao dịch --}}
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead style="background-color: #009688 !important;">
                        <tr>
                            <th style="color: white;"><input type="checkbox" id="checkAll"></th>
                            <th style="color: white;">Mã giao dịch</th>
                            <th style="color: white;">Số tiền</th>
                            <th style="color: white;">Loại</th>
                            <th style="color: white;">Mô tả</th>
                            <th style="color: white;">Trạng thái</th>
                            <th style="color: white;">Thời gian</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if (!$user->vi)
                            <tr>
                                <td colspan="6" class="text-center text-danger">Người dùng chưa có ví</td>
                            </tr>
                        @else
                            @forelse ($giaodichs as $gd)
                                <tr>

                                    <td><input type="checkbox" name="ids[]" value="{{ $gd->id }}"></td>
                                    <td class="text-center">{{ $gd->ma_giao_dich }}</td>
                                    <td>
                                        @if(in_array($gd->loai, ['Rút tiền', 'Mua hàng', 'Thanh toán']))
                                            @if($gd->trang_thai == 1)
                                                <span class="text-danger">-{{ number_format(abs($gd->so_tien), 0, ',', '.') }} VNĐ</span>
                                            @else
                                                <span class="text-warning">{{ number_format(abs($gd->so_tien), 0, ',', '.') }} VNĐ</span>
                                            @endif
                                        @elseif(in_array($gd->loai, ['Nạp tiền', 'Hoàn tiền']))
                                            @if($gd->trang_thai == 2)
                                                <span class="text-warning">{{ number_format($gd->so_tien, 0, ',', '.') }} VNĐ</span>
                                            @else
                                                <span class="text-success">+{{ number_format($gd->so_tien, 0, ',', '.') }} VNĐ</span>
                                            @endif
                                        @else
                                            <span class="text-dark">{{ number_format($gd->so_tien, 0, ',', '.') }} VNĐ</span>
                                        @endif
                                    </td>

                                    <td>
                                        <span class="badge bg-light border border-1 text-dark px-2">{{ $gd->loai }}</span>
                                    </td>
                                    <td>
                                        {!! nl2br(e($gd->mo_ta)) !!}

                                        @if ($gd->trang_thai == 1 && $gd->updated_at)
                                            <br>
                                            <strong class="text-muted">
                                                Thời gian xử lý 🕒 {{ $gd->updated_at->format('d/m/Y H:i') }}
                                            </strong>
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        @if($gd->trang_thai == 1)
                                            <span
                                                style="background-color: #28a745; color: white; padding: 2px 6px; border-radius: 4px; font-size: 0.85rem;">
                                                ✔ Thành công
                                            </span>
                                        @elseif($gd->trang_thai == 0)
                                            <div class="d-flex flex-column align-items-center gap-1">
                                                <span
                                                    style="background-color: #ffc107; color: black; padding: 2px 6px; border-radius: 4px; font-size: 0.85rem;">
                                                    ⏳ Chờ xử lý
                                                </span>
                                                <div class="d-flex gap-1">
                                                    {{-- Nút duyệt --}}

                                                    <a href="#" onclick="duyetLe({{ $gd->id }}, '{{ $gd->ma_giao_dich }}')"
                                                        class="btn btn-success btn-sm">✅</a>

                                                    {{-- <form id="form-duyet-{{ $gd->id }}"
                                                        action="{{ route('admin.vis.updateTrangThaiTungGiaoDich', ['id' => $gd->id]) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $gd->id }}">
                                                        <input type="hidden" name="trang_thai" value="1">
                                                    </form> --}}



                                                    {{-- Nút huỷ mở modal --}}
                                                    <button type="button" class="btn btn-danger btn-sm px-2 py-1" data-bs-toggle="modal"
                                                        data-bs-target="#huyModal" data-id="{{ $gd->id }}">
                                                        ❌
                                                    </button>


                                                </div>
                                            </div>
                                        @elseif($gd->trang_thai == 2)
                                            <span
                                                style="background-color: #dc3545; color: white; padding: 2px 6px; border-radius: 4px; font-size: 0.85rem;">
                                                ❌ Đã huỷ
                                            </span>
                                        @endif
                                    </td>



                                    <td>{{ $gd->created_at->format('d/m/Y H:i') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">Không có giao dịch nào</td>
                                </tr>

                            @endforelse
                        @endif
                    </tbody>
                </table>
            </div>

            {{-- Phân trang --}}
            <div class="d-flex justify-content-center mt-3">
                {{ $giaodichs->appends(request()->query())->links('pagination::bootstrap-5') }}
            </div>
        </form>
        <!-- Modal huỷ từng giao dịch -->
        <!-- Modal huỷ -->
        <div class="modal fade" id="huyModal" tabindex="-1" aria-labelledby="huyModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form method="POST" id="huyForm" {{--
                    action="{{ route('admin.vis.updateTrangThaiTungGiaoDich', ['id' => $gd->id]) }}" --}}>
                    @csrf
                    <input type="hidden" name="id" id="modal_gd_id">
                    <input type="hidden" name="trang_thai" value="2">
                    <div class="modal-content">
                        <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title" id="huyModalLabel">Huỷ giao dịch</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label for="modal_ly_do" class="form-label">Lý do huỷ:</label>
                            <textarea name="ly_do" id="modal_ly_do" rows="3" class="form-control" required></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-danger">Xác nhận huỷ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>







@endsection
@section('js')

    {{--
    <script>
        function duyetLe(id, ma_giao_dich) {
            if (confirm('Bạn có chắc muốn duyệt giao dịch mã #' + ma_giao_dich + '?')) {
                document.getElementById('form-duyet-' + id).submit();
            }
        }
    </script> --}}
    <script>
        function duyetLe(id, ma_giao_dich) {
            Swal.fire({
                title: `Xác nhận duyệt giao dịch`,
                text: `Bạn có chắc muốn duyệt giao dịch ${ma_giao_dich}?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: '✔ Duyệt',
                cancelButtonText: 'Huỷ',
                confirmButtonColor: '#009688',
                cancelButtonColor: '#dc3545'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/vi/cap-nhat-tung-giao-dich/${id}`, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            id: id,
                            trang_thai: 1
                        })
                    })
                        .then(res => res.json())
                        .then(data => {
                            if (data.status === 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Thành công!',
                                    text: data.message,
                                    confirmButtonColor: '#009688'
                                }).then(() => location.reload());
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Lỗi!',
                                    text: data.message
                                }).then(() => location.reload());
                            }
                        });
                }
            });
        }

    </script>




    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Khi modal mở, gán ID vào input ẩn
            const huyModal = document.getElementById('huyModal');
            if (huyModal) {
                huyModal.addEventListener('show.bs.modal', function (event) {
                    const button = event.relatedTarget;
                    const giaoDichId = button.getAttribute('data-id');
                    document.getElementById('modal_gd_id').value = giaoDichId;
                });
            }

            // Bắt sự kiện submit form huỷ
            const huyForm = document.getElementById('huyForm');
            if (huyForm) {
                huyForm.addEventListener('submit', function (e) {
                    e.preventDefault();

                    const id = document.getElementById('modal_gd_id').value;
                    const ly_do = document.getElementById('modal_ly_do').value;

                    fetch(`/vi/cap-nhat-tung-giao-dich/${id}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            id: id,
                            trang_thai: 2,
                            ly_do: ly_do
                        })
                    })
                        .then(async res => {
                            const data = await res.json().catch(() => ({})); // tránh lỗi khi không phải JSON
                            if (res.ok && data.success === 'success') {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Huỷ thành công!',
                                    text: data.message,
                                    confirmButtonColor: '#009688'
                                }).then(() => location.reload());
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Lỗi!',
                                    text: data.message || 'Đã xảy ra lỗi.'
                                }).then(() => location.reload()); // ⚠️ Reload trang ngay cả khi lỗi
                            }
                        })
                        .catch(() => {
                            Swal.fire({
                                icon: 'error',
                                title: 'Lỗi!',
                                text: 'Không thể kết nối tới máy chủ.'
                            });
                        });

                });
            }
        });
    </script>



    {{-- Check All --}}
    <script>
        document.getElementById('checkAll').addEventListener('click', function () {
            document.querySelectorAll('input[name="ids[]"]').forEach(el => el.checked = this.checked);
        });
    </script>

    <script>
        function toggleLyDo() {
            const trangThai = document.getElementById('trang_thai_moi').value;
            const lyDoWrapper = document.getElementById('ly_do_wrapper');
            const lyDoInput = document.getElementById('ly_do_chung');

            if (trangThai == '2') {
                lyDoWrapper.classList.remove('d-none');
                lyDoInput.setAttribute('required', 'required');
            } else {
                lyDoWrapper.classList.add('d-none');
                lyDoInput.removeAttribute('required');
            }
        }

        function handleCapNhat(e) {
        const trangThai = document.getElementById('trang_thai_moi').value;

        if (trangThai === "1") {
            e.preventDefault(); // Ngăn form gửi đi

            Swal.fire({
                title: 'Xác nhận duyệt yêu cầu',
                text: 'Bạn có chắc chắn muốn duyệt yêu cầu này?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: '✔ Duyệt',
                cancelButtonText: 'Huỷ',
                confirmButtonColor: '#009688',
                cancelButtonColor: '#dc3545'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form-cap-nhat-trang-thai').submit(); // Submit lại form thủ công
                }
            });

            return false; // Không cho submit ngay lập tức
        }

        return true; // Nếu trạng thái khác, cho submit bình thường
    }



        document.getElementById('checkAll')?.addEventListener('click', function () {
            const checkboxes = document.querySelectorAll('input.trang_thai_gd');
            checkboxes.forEach(cb => cb.checked = this.checked);
        });

        document.querySelector('form-cap-nhat-trang-thai').addEventListener('submit', function (e) {
            const selected = document.querySelectorAll('input.trang_thai_gd:checked');
            if (selected.length === 0) {
                alert('Vui lòng chọn ít nhất một giao dịch.');
                e.preventDefault();
                return;
            }

            const trangThaiMoi = document.getElementById('trang_thai_moi').value;
            if (!trangThaiMoi) {
                alert('Vui lòng chọn trạng thái mới.');
                e.preventDefault();
                return;
            }

            let valid = true;
            selected.forEach(cb => {
                if (cb.dataset.trangThai !== '0') {
                    valid = false;
                }
            });

            if (!valid) {
                alert('Chỉ được cập nhật các giao dịch đang ở trạng thái chờ xác nhận.');
                e.preventDefault();
            }
        });

        document.addEventListener('DOMContentLoaded', toggleLyDo);
    </script>





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