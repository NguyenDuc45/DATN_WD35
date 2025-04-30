@extends('layouts.client')
@section('title', 'Ví người dùng')
@section('content')
<div class="container py-5">

   
    
    <div class="d-md-flex justify-content-between gap-3 mb-4 flex-wrap">
        <!-- Cột trái: Số dư + nút -->
        <div class="d-flex flex-column align-items-start gap-2" style="min-width: 270px;">
            <h6 class="text-center mb-3" style="color: #009688; font-weight: 700; font-size: 2rem;">
                VÍ CỦA TÔI
            </h6>
            <!-- Số dư gọn dạng nút -->
            <div class="btn btn-light border d-flex align-items-center gap-2 px-3 py-2" 
                 style="border-color: #009688; color: #009688; font-weight: 600; border-radius: 8px;">
                <i class="fas fa-wallet"></i>
                <span>Số dư: {{ number_format($vi->so_du, 0, ',', '.') }} VNĐ</span>
            </div>
    
            <!-- Nút nạp & rút tiền -->
            <div class="d-flex gap-2 flex-wrap">
                <a href="{{ route('nap-tien.form') }}" class="btn btn-outline-success px-3 py-2" 
                   style="border-color: #009688; color: #009688; font-weight: 600; border-radius: 8px; font-size: 0.9rem;">
                    <i class="fas fa-wallet me-1"></i> Nạp tiền
                </a>
                <a href="{{ route('rut-tien.form') }}" class="btn btn-outline-success px-3 py-2" 
                   style="border-color: #009688; color: #009688; font-weight: 600; border-radius: 8px; font-size: 0.9rem;">
                    <i class="fas fa-money-bill-wave me-1"></i> Rút tiền
                </a>
            </div>
        </div>
    
      <!-- Cột phải: Lọc giao dịch -->
<div class="card shadow-sm mt-3 mt-md-0" style="border-radius: 10px; flex: 1; max-height: 240px;">
    <div class="card-body py-2 px-2">
        <form method="GET" action="{{ route('vi') }}">
            <div class="row gx-2 gy-1 mb-2">
                <div class="col-md-6">
                    <label for="from" class="form-label mb-1 fw-semibold" style="font-size: 0.8rem;">Từ ngày</label>
                    <input type="date" name="from" id="from" class="form-control form-control-sm"
                        style="font-size: 0.8rem; padding: 0.25rem 0.5rem;"
                        value="{{ request('from') }}" onchange="this.form.submit()">
                </div>
                <div class="col-md-6">
                    <label for="to" class="form-label mb-1 fw-semibold" style="font-size: 0.8rem;">Đến ngày</label>
                    <input type="date" name="to" id="to" class="form-control form-control-sm"
                        style="font-size: 0.8rem; padding: 0.25rem 0.5rem;"
                        value="{{ request('to') }}" onchange="this.form.submit()">
                </div>
            </div>

            <div class="row gx-2 gy-1">
                <div class="col-md-6">
                    <label for="loai" class="form-label mb-1 fw-semibold" style="font-size: 0.8rem;">Loại giao dịch</label>
                    <select name="loai" id="loai" class="form-select form-select-sm" 
                            style="font-size: 0.8rem; padding: 0.25rem 0.5rem;" onchange="this.form.submit()">
                        <option value="">-- Tất cả --</option>
                        <option value="Nạp tiền" {{ request('loai') == 'Nạp tiền' ? 'selected' : '' }}>💰 Nạp tiền</option>
                        <option value="Rút tiền" {{ request('loai') == 'Rút tiền' ? 'selected' : '' }}>🏧 Rút tiền</option>
                        <option value="Mua hàng" {{ request('loai') == 'Mua hàng' ? 'selected' : '' }}>🛒 Mua hàng</option>
                        <option value="Hoàn tiền" {{ request('loai') == 'Hoàn tiền' ? 'selected' : '' }}>↩️ Hoàn tiền</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="trang_thai" class="form-label mb-1 fw-semibold" style="font-size: 0.8rem;">Trạng thái</label>
                    <select name="trang_thai" id="trang_thai" class="form-select form-select-sm"
                            style="font-size: 0.8rem; padding: 0.25rem 0.5rem;" onchange="this.form.submit()">
                        <option value="">-- Tất cả --</option>
                        <option value="0" {{ request('trang_thai') == '0' ? 'selected' : '' }}>⏳ Chờ xử lý</option>
                        <option value="1" {{ request('trang_thai') == '1' ? 'selected' : '' }}>✔️ Thành công</option>
                        <option value="2" {{ request('trang_thai') == '2' ? 'selected' : '' }}>❌ Đã huỷ</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
</div>

    </div>
    

    
    
    
    
    
    

    <!-- Lịch sử giao dịch -->
    <div class="card shadow" style="border-radius: 16px;">
        <div class="card-header text-white" style="background-color: #009688; border-radius: 16px 16px 0 0;">
            <strong>Lịch sử giao dịch</strong>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead style="background-color: #f1f1f1;">
                        <tr>
                            <th class="text-center">Mã giao dịch</th>
                            <th class="text-center">Thời gian</th>
                            <th class="text-center">Loại</th>
                            <th class="text-center">Số tiền</th>
                            <th class="text-center">Trạng thái</th>
                            <th class="text-start">Mô tả</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($giaodichs as $gd)
                            <tr>
                                <td class="text-center">{{ $gd->ma_giao_dich }}</td>
                                <td class="text-center">{{ $gd->created_at->format('H:i d/m/Y') }}</td>
                                <td class="text-center">{{ ucfirst($gd->loai) }}</td>
                                <td class="text-center">
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
                    
                                <td class="text-center">
                                    @if($gd->trang_thai == 1)
                                        <span class="badge bg-success">Thành công</span>
                                    @elseif($gd->trang_thai == 0)
                                        <span class="badge bg-warning text-dark">Chờ xử lý</span>
                                        <br>
                                        <button 
                                        class="mt-1 px-2 py-1 text-white fw-bold"
                                        style="background-color: #d32f2f; border: none; border-radius: 6px; font-size: 14px;"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#modalHuyGiaoDich{{ $gd->id }}">
                                        Huỷ
                                    </button>
                                    
                                  


                                    @elseif($gd->trang_thai == 2)
                                        <span class="badge bg-danger">Đã huỷ</span>
                                    @endif
                                </td>
                    
                                <td>
                                    {!! nl2br(e($gd->mo_ta)) !!}
                                    @if ($gd->trang_thai == 1 && $gd->updated_at)
                                        <br>
                                        <strong class="text-muted">
                                            Thời gian xử lý 🕒 {{ $gd->updated_at->format('H:i d/m/Y ') }}
                                        </strong>
                                    @endif
                                </td>
                            </tr>
                    
                            <!-- ✅ Modal nằm ngay sau mỗi dòng -->
                            <div class="modal fade" id="modalHuyGiaoDich{{ $gd->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $gd->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form method="POST" action="{{ route('giao-dich.huy', $gd->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalLabel{{ $gd->id }}">Huỷ giao dịch</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="ly_do_{{ $gd->id }}" class="form-label">Lý do huỷ:</label>
                                                    <textarea name="ly_do" id="ly_do_{{ $gd->id }}" class="form-control" rows="3" required></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                                <button type="submit" class="btn btn-danger">Xác nhận huỷ</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">Không có giao dịch nào.</td>
                            </tr>
                        @endforelse
                    </tbody>
                    
                </table>
            </div>

            <!-- Phân trang -->
            <div class="p-3 d-flex justify-content-center">
                {{ $giaodichs->withQueryString()->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection
