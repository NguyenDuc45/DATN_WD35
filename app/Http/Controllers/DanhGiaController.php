<?php

namespace App\Http\Controllers;

use App\Models\DanhGia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DanhGiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $danhGias = DanhGia::select('danh_gias.*', 'users.ten_nguoi_dung', 'san_phams.ten_san_pham')
            ->join('users', 'users.id', '=',  'danh_gias.user_id')
            ->join('san_phams', 'san_phams.id', '=', 'danh_gias.san_pham_id')
            ->orderBy('danh_gias.created_at', 'desc');

        // Nếu có lọc theo sản phẩm
        if ($request->has('san_pham_id') && $request->san_pham_id != '') {
            $danhGias->where('danh_gias.san_pham_id', $request->san_pham_id);
        }

        $locdanhGias = $danhGias->paginate(10);

        // Lấy danh sách sản phẩm để hiển thị trong dropdown lọc
        $sanPhams = \App\Models\SanPham::all();
        
        return view('admins.danhgias.index', compact('danhGias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DanhGia $danhgia)
    {
        $danhGia = DanhGia::select('danh_gias.*', 'users.ten_nguoi_dung', 'san_phams.ten_san_pham')
            ->join('users', 'users.id', '=', 'user_id')
            ->join('san_phams', 'san_phams.id', '=', 'san_pham_id')
            ->find($danhgia->id);

        return view('admins.danhgias.show', compact('danhGia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DanhGia $danhgia)
    {
        if ($request->an_danh_gia) {
            $data = ['trang_thai' => 0];
            DanhGia::where("id", $danhgia->id)->update($data);
        }

        if ($request->hien_danh_gia) {
            $data = ['trang_thai' => 1];
            DanhGia::where("id", $danhgia->id)->update($data);
        }

        return redirect()->route('danhgias.show', $danhgia->id)->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showDanhGias()
    {
        $danhGias = DanhGia::with(['user', 'sanPham'])->where('trang_thai', 1)->get();
        return view('clients.gioithieu', compact('danhGias'));
    }

    // public function trangThaiDanhGia(Request $request)
    // {
    //     $danhGia = DanhGia::find($request->id);

    //     if (!$danhGia) {
    //         return response()->json(['success' => false, 'message' => 'Đánh giá không tồn tại']);
    //     }

    //     $danhGia->trang_thai = !$danhGia->trang_thai;
    //     $danhGia->save();

    //     return response()->json(['success' => true, 'status' => $danhGia->trang_thai]);
    // }

    public function trangThaiDanhGia(Request $request)
    {
        $danhGia = DanhGia::find($request->id);
        if ($danhGia) {
            $danhGia->trang_thai = $danhGia->trang_thai == 1 ? 0 : 1;
            $danhGia->save();
            return response()->json(['success' => true, 'status' => $danhGia->trang_thai]);
        }
        return response()->json(['success' => false, 'message' => 'Đánh giá không tồn tại.']);
    }
}
