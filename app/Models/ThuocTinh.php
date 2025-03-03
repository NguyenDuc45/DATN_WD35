<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThuocTinh extends Model
{
    use HasFactory;

    protected $fillable = [
        'ten_thuoc_tinh'
    ];
    public function giaTriThuocTinh()
    {
        return $this->hasMany(GiaTriThuocTinh::class, 'thuoc_tinh_id');
    }
}
