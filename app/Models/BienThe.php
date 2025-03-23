<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BienThe extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'san_pham_id',
        'thuoc_tinh_id',
        'gia_tri_thuoc_tinh_id',
        'ten_bien_the',
        'anh_bien_the',
        'gia_nhap',
        'gia_ban',
        'so_luong'
    ];

    public function sanPham()
    {
        return $this->belongsTo(SanPham::class, 'san_pham_id');
    }

    public function thuocTinh()
    {
        return $this->belongsTo(ThuocTinh::class, 'thuoc_tinh_id');
    }

    public function giaTriThuocTinh()
    {
        return $this->belongsTo(GiaTriThuocTinh::class, 'gia_tri_thuoc_tinh_id', 'id');
    }
    

    public function donHangs()
    {
        return $this->belongsToMany(DonHang::class, 'chi_tiet_don_hangs', 'bien_the_id', 'don_hang_id')
            ->withPivot('so_luong');
    }
}

