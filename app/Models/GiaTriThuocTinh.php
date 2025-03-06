<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiaTriThuocTinh extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'thuoc_tinh_id',
        'gia_tri'
    ];
    protected $dates = ['deleted_at'];
}
