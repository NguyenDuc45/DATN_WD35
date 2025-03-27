<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GiaTriThuocTinh extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'thuoc_tinh_id',
        'gia_tri'
    ];

    public function thuocTinh()
    {
        return $this->belongsTo(ThuocTinh::class, 'thuoc_tinh_id');
    }

    public function bienTheThuocTinh()
    {
        return $this->hasOne(BienTheThuocTinh::class, 'gia_tri_thuoc_tinh_id');
    }
    public function bienThes()
    {
        return $this->hasMany(BienThe::class, 'gia_tri_thuoc_tinh_id');
    }
}

