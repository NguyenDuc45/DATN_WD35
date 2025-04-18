<?php

namespace App\Http\Controllers;

use App\Models\ThongBao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThongBaoController extends Controller
{
    public function fetch()
    {
        $notifications = ThongBao::where('user_id', 1)
            ->where('trang_thai', 0)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        return response()->json($notifications);
    }
    public function daDoc(Request $request, $id)
    {
        $thongBao = ThongBao::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $thongBao->trang_thai = 1; // 1: đã đọc
        $thongBao->save();

        return response()->json(['success' => true]);
    }
    public function fetchAll()
{
    $userId = Auth::id();
    if (!$userId) {
        return response()->json([]);
    }

    $thongBaos = ThongBao::with('danhGia.sanPham')
        ->where('user_id', $userId)
        ->where('trang_thai', 0)
        ->get()
        ->map(function ($thongBao) {
            return [
                'id' => $thongBao->id,
                'noi_dung' => $thongBao->noi_dung,
                'created_at' => $thongBao->created_at->diffForHumans(), // "1 giờ trước"
                'created_at_full' => $thongBao->created_at->format('d/m/Y H:i'), // "19/04/2025 14:30"
                'danh_gia' => $thongBao->danhGia ? [
                    'san_pham' => $thongBao->danhGia->sanPham ? [
                        'ten_san_pham' => $thongBao->danhGia->sanPham->ten_san_pham,
                    ] : null,
                    'ly_do_an' => $thongBao->danhGia->ly_do_an,
                ] : null,
            ];
        });

    return response()->json($thongBaos);
}
}
