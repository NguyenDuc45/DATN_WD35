<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\BaiViet;
use App\Models\DanhMucBaiViet;
use App\Models\BinhLuan;
use Illuminate\Http\Request;

class BaiVietController extends Controller
{
    public function danhSach(Request $request)
    {
        $query = BaiViet::with('danhMuc');

        if ($request->filled('search')) {
            $query->where('tieu_de', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('danh_muc')) {
            $query->where('danh_muc_id', $request->danh_muc);
        }

        $baiViets = $query->latest()->paginate(10)->appends($request->query());
        $danhMucBaiViets = DanhMucBaiViet::withCount('baiViets')->get();
        $baiVietGanDay = BaiViet::latest()->take(5)->get();

        return view('clients.baiviets.danhsach', compact('baiViets', 'danhMucBaiViets', 'baiVietGanDay'));
    }

    public function chiTiet($id)
    {
        $baiViet = BaiViet::with('danhMuc')->findOrFail($id);
        $danhMucBaiViets = DanhMucBaiViet::withCount('baiViets')->get();
        $baiVietGanDay = BaiViet::latest()->take(5)->get();

        // Lấy các bình luận gốc (không có parent_id)
        $binhLuans = BinhLuan::with(['user', 'replies.user'])
            ->where('bai_viet_id', $id)
            ->whereNull('parent_id')
            ->where('trang_thai', 1)
            ->orderByDesc('created_at')
            ->get();

        $countComment = BinhLuan::where('bai_viet_id', $id)
            ->where('trang_thai', 1)
            ->count();

        return view('clients.baiviets.chitiet', compact(
            'baiViet',
            'danhMucBaiViets',
            'baiVietGanDay',
            'binhLuans',
            'countComment'
        ));
    }
}
