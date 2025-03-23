<?php

namespace App\Http\Controllers\Clients;

use App\Models\DanhGia;
use App\Models\SanPham;
use Illuminate\Http\Request;
use App\Models\DanhMucSanPham;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SanPhamController extends Controller
{
    public function danhSach(Request $request)
    {
        $query = SanPham::with(['danhMuc', 'danhGias', 'bienThes'])
            ->where('san_phams.trang_thai', 1)
            ->orderBy('san_phams.created_at', 'desc'); // Sắp xếp sản phẩm mới nhất lên đầu

        if ($request->has('danh_muc_id')) {
            $query->where('san_phams.danh_muc_id', $request->danh_muc_id);
        }

        if ($request->has('so_sao')) {
            $soSao = (int) $request->so_sao;

            $query->selectRaw('san_phams.id, san_phams.ten_san_pham, san_phams.trang_thai, san_phams.created_at, COALESCE(AVG(danh_gias.so_sao), 0) as avg_rating')
                ->leftJoin('danh_gias', 'san_phams.id', '=', 'danh_gias.san_pham_id')
                ->where('san_phams.trang_thai', 1)
                ->groupBy('san_phams.id', 'san_phams.ten_san_pham', 'san_phams.trang_thai', 'san_phams.created_at')
                ->orderBy('san_phams.created_at', 'desc'); // Sắp xếp luôn khi lọc theo sao

            if ($soSao == 5) {
                $query->havingRaw('AVG(danh_gias.so_sao) = 5.0');
            } else {
                $min = $soSao;
                $max = $soSao + 0.9;
                $query->havingRaw('AVG(danh_gias.so_sao) BETWEEN ? AND ?', [$min, $max]);
            }
        }

        $sanPhams = $query->paginate(50); // Phân trang 50 sản phẩm mỗi trang

        $danhMucs = DanhMucSanPham::withCount([
            'sanPhams' => function ($query) {
                $query->where('san_phams.trang_thai', 1);
            }
        ])->get();

        return view('clients.sanphams.danhsach', compact('sanPhams', 'danhMucs'));
    }




    public function chiTiet($id)
    {
        $sanPham = SanPham::with([
            'bienThes',
            'anhSP',
            'danhGias',
            'bienThes.giaTriThuocTinh', // Sửa ở đây
            'bienThes.thuocTinh',
            'danhGias.nguoiDung'
        ])
            ->where('san_phams.id', $id)
            ->where('san_phams.trang_thai', 1)
            ->selectRaw('san_phams.*, 
                COALESCE(AVG(danh_gias.so_sao), 0) as avg_rating, 
                COUNT(danh_gias.id) as total_reviews')
            ->leftJoin('danh_gias', 'san_phams.id', '=', 'danh_gias.san_pham_id')
            ->groupBy('san_phams.id')
            ->firstOrFail();

        // Tính phần trăm giảm giá
        $phanTramGiamGia = ($sanPham->gia_cu > 0) ?
            round((($sanPham->gia_cu - $sanPham->gia_moi) / $sanPham->gia_cu) * 100) : 0;

        $sanPham = SanPham::with('danhMuc')->findOrFail($id);

        // Lấy danh mục của sản phẩm
        $danhMucId = $sanPham->danh_muc_id;

        // Lấy các sản phẩm cùng danh mục (trừ sản phẩm hiện tại)
        $sanPhamsCungDanhMuc = SanPham::where('danh_muc_id', $danhMucId)
            ->where('id', '!=', $id)
            ->limit(4) // Giới hạn số lượng hiển thị
            ->get();


        return view('clients.sanphams.chitiet', [
            'sanPhams' => $sanPham,
            'bienThes' => $sanPham->bienThes,
            'anhSPs' => $sanPham->anhSP,
            'phanTramGiamGia' => $phanTramGiamGia,
            'sanPhamsCungDanhMuc'=>$sanPhamsCungDanhMuc
        ]);
    }


    // public function sanPhamYeuThich()
    // {
    //     $user = Auth::user();
    //     return view('clients.sanphams.sanphamyeuthich', compact('user'));
    // }


    // public function addsanPhamYeuThich(string $id)
    // {
    //     $user = Auth::user();
    //     if ($user) {
    //         $user->sanPhamYeuThichs()->attach($id);
    //     } else {
    //         return redirect()->back()->with(['error' => 'Vui lòng đăng nhập để sử dụng tính năng']);
    //     }
    //     return view('clients.sanphams.sanphamyeuthich', compact('user'));
    // }

    // public function xoaYeuThich($id)
    // {
    //     try {
    //         $user = Auth::user();

    //         // Kiểm tra xem sản phẩm có trong danh sách yêu thích không
    //         if (!$user->sanPhamYeuThichs()->where('san_pham_id', $id)->exists()) {
    //             return response()->json(['success' => false, 'message' => 'Sản phẩm không tồn tại!'], 404);
    //         }

    //         // Xóa sản phẩm yêu thích
    //         $user->sanPhamYeuThichs()->detach($id);

    //         return response()->json(['success' => true, 'message' => 'Xóa thành công!']);
    //     } catch (\Exception $e) {
    //         \Log::error('Lỗi xóa sản phẩm yêu thích: ' . $e->getMessage());
    //         return response()->json(['success' => false, 'message' => 'Lỗi server!'], 500);
    //     }
    // }

}
