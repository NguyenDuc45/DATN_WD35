<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
use Illuminate\Http\Request;
use App\Models\LichSuDonHang;
use App\Models\ChiTietDonHang;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreDonHangRequest;
use App\Http\Requests\UpdateDonHangRequest;
use App\Mail\UpdateTrangThaiDonHangMail;
use App\Models\User;

class DonHangController extends Controller
{
    public function __construct() {}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = DonHang::select('don_hangs.*', 'users.username', 'users.ten_nguoi_dung', 'phuong_thuc_thanh_toans.ten_phuong_thuc')
            ->join('users', 'users.id', '=', 'user_id')
            ->join('phuong_thuc_thanh_toans', 'phuong_thuc_thanh_toans.id', '=', 'phuong_thuc_thanh_toan_id');

        if ($request->filled('trang_thai_don_hang')) {
            $query->where('trang_thai_don_hang', $request->trang_thai_don_hang);
        }

        if ($request->filled('trang_thai_thanh_toan')) {
            $query->where('trang_thai_thanh_toan', $request->trang_thai_thanh_toan);
        }

        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $query->where(function ($q) use ($keyword) {
                $q->where('ma_don_hang', 'like', "%$keyword%")
                    ->orWhere('ten_nguoi_dung', 'like', "%$keyword%")
                    ->orWhere('username', 'like', "%$keyword%");
            });
        }

        $donHangs = $query->orderBy('created_at', 'desc')->paginate(10);

        if ($request->ajax()) {
            return view('admins.donhangs.donhang-table', compact('donHangs'))->render();
        }

        return view('admins.donhangs.index', compact('donHangs'));
    }

    public function bulkUpdate(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'trang_thai_don_hang' => 'required|in:-1,0,1,2,3,4,5'
        ]);

        $updatedCount = 0;

        foreach ($request->ids as $id) {
            $donHang = DonHang::find($id);
            if ($donHang) {
                $donHang->trang_thai_don_hang = $request->trang_thai_don_hang;

                if ((int) $request->trang_thai_don_hang === 3) {
                    $donHang->trang_thai_thanh_toan = 1;
                }

                $donHang->save();

                LichSuDonHang::create([
                    'don_hang_id' => $donHang->id,
                    'trang_thai' => $request->trang_thai_don_hang,
                ]);

                $updatedCount++;
            }
        }

        return response()->json([
            'message' => "Đã cập nhật $updatedCount đơn hàng thành công."
        ]);
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
    public function store(StoreDonHangRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DonHang $donhang)
    {
        $donHang = DonHang::select('don_hangs.*', 'users.username', 'users.ten_nguoi_dung', 'phuong_thuc_thanh_toans.ten_phuong_thuc')
            ->join('users', 'users.id', '=', 'user_id')
            ->join('phuong_thuc_thanh_toans', 'phuong_thuc_thanh_toans.id', '=', 'phuong_thuc_thanh_toan_id')
            ->find($donhang->id);

        $chiTietDonHangs = ChiTietDonHang::select('chi_tiet_don_hangs.*', 'bien_thes.ten_bien_the', 'bien_thes.anh_bien_the', 'bien_thes.gia_ban', 'san_phams.hinh_anh', 'san_phams.ten_san_pham')
            ->join('bien_thes', 'bien_thes.id', '=', 'bien_the_id')
            ->join('san_phams', 'san_phams.id', '=', 'bien_thes.san_pham_id')
            ->where('don_hang_id', '=', $donhang->id)
            ->get();

        $lichSuDonHangs = LichSuDonHang::where('don_hang_id', '=', $donhang->id)->get();

        $tongGiaTri = 0;

        foreach ($chiTietDonHangs as $chiTietDonHang) {
            $tongGiaTri += $chiTietDonHang->gia_ban * $chiTietDonHang->so_luong;
        }

        return view('admins.donhangs.show', compact('donHang', 'chiTietDonHangs', 'lichSuDonHangs', 'tongGiaTri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DonHang $donhang)
    {
        // $donHang = DonHang::select('don_hangs.*', 'users.ten_nguoi_dung', 'phuong_thuc_thanh_toans.ten_phuong_thuc')
        //     ->join('users', 'users.id', '=', 'user_id')
        //     ->join('phuong_thuc_thanh_toans', 'phuong_thuc_thanh_toans.id', '=', 'phuong_thuc_thanh_toan_id')
        //     ->find($donhang->id);
        // return view('admins.donhangs.edit', compact('donHang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDonHangRequest $request, DonHang $donhang)
    {
        if ($request->doi_trang_thai) {
            $trangThaiHienTai = $donhang->trang_thai_don_hang;
            if ($trangThaiHienTai != -1) {
                $data = [
                    'trang_thai_don_hang' => $request->trang_thai
                ];

                $lichSuDonHang = [
                    'don_hang_id' => $donhang->id,
                    'trang_thai' => $request->trang_thai
                ];

                if ($request->trang_thai == 3) {
                    $data['trang_thai_thanh_toan'] = 1;
                    $data['updated_at'] = now();
                }

                DonHang::where("id", $donhang->id)->update($data);
                LichSuDonHang::create($lichSuDonHang);

                // Gửi email
                if (in_array($request->trang_thai, [1, 2, 3])) {
                    $trangThai = (int) $request->trang_thai;

                    $trangThaiText = match ($trangThai) {
                        1 => 'Đang xử lý',
                        2 => 'Đang giao',
                        3 => 'Đã giao',
                        default => 'Đã cập nhật'
                    };

                    $user = User::find($donhang->user_id);

                    Mail::to($user->email)->send(new UpdateTrangThaiDonHangMail($donhang, $trangThaiText, $user));
                }
            }
        }

        if ($request->huy_don_hang) {
            $data = [
                'trang_thai_don_hang' => -1
            ];
            DonHang::where("id", $donhang->id)->update($data);
        }

        return redirect()->route('donhangs.show', $donhang->id)->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DonHang $donHang)
    {
        //
    }
}
