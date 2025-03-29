<?php

namespace App\Http\Controllers\Clients;

use App\Models\DonHang;
use Illuminate\Http\Request;
use App\Models\ChiTietDonHang;
use App\Models\ChiTietGioHang;
use Illuminate\Support\Facades\DB;
use App\Models\PhuongThucThanhToan;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HelperCommon\Helper;
use App\Http\Requests\Client\ThanhToanRequest;
use App\Models\GioHang;
use App\Models\PhieuGiamGia;

class ThanhToanController extends Controller
{
    public function gioHang()
    {
        $chiTietGioHangs = ChiTietGioHang::select('chi_tiet_gio_hangs.*', 'san_phams.ten_san_pham', 'san_phams.san_pham_slug', 'san_phams.gia_cu', 'san_phams.gia_moi', 'san_phams.hinh_anh', 'bien_thes.ten_bien_the')
            ->join('bien_thes', 'bien_thes.id', '=', 'bien_the_id')
            ->join('san_phams', 'san_phams.id', '=', 'san_pham_id')
            ->where('user_id', '=', Auth::user()->id)
            ->get();

        // dd($chiTietGioHangs);

        return view('clients.thanhtoans.giohang', compact('chiTietGioHangs'));
    }

    public function thanhToan()
    {
        if(Auth::check()){
            $chiTietGioHangs = ChiTietGioHang::select('chi_tiet_gio_hangs.*', 'san_phams.ten_san_pham', 'san_phams.san_pham_slug', 'san_phams.gia_cu', 'san_phams.gia_moi', 'san_phams.hinh_anh', 'bien_thes.ten_bien_the')
            ->join('bien_thes', 'bien_thes.id', '=', 'bien_the_id')
            ->join('san_phams', 'san_phams.id', '=', 'san_pham_id')
            ->where('user_id', '=', Auth::user()->id)
            ->get();
        $phuongThucThanhToan = PhuongThucThanhToan::all();
        }else{
            return view('clients.auth.login');
        }

        return view('clients.thanhtoans.thanhtoan', compact('chiTietGioHangs','phuongThucThanhToan'));
    }
    public function xuLyThanhToan(ThanhToanRequest $request){
        $user = Auth::user();
        if($user){
            $giohang = ChiTietGioHang::where('user_id',Auth::user()->id)->first();
            if(!$giohang){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Giỏ hàng trống'
                ],403);
            }
            $checkquantity = Helper::checkQuantity($user->id);
            if($checkquantity == null){
                if($request->phuong_thuc_thanh_toan_id === "1"){
                    // 🔹 Xử lý thanh toán nội bộ
                    $donHang = DonHang::create([
                        'user_id' => $user->id,
                        'ma_don_hang' => Helper::generateOrderCode(),
                        'ten_nguoi_nhan' => $request->ten_nguoi_nhan,
                        'email_nguoi_nhan' => $request->email_nguoi_nhan,
                        'sdt_nguoi_nhan' => $request->sdt_nguoi_nhan,
                        'dia_chi_nguoi_nhan' => $request->dia_chi_nguoi_nhan,
                        'tong_tien' => $request->tong_tien,
                        'ghi_chu' => $request->ghi_chu,
                        'phuong_thuc_thanh_toan_id' => $request->phuong_thuc_thanh_toan_id,
                        'trang_thai_don_hang' => 0,
                        'trang_thai_thanh_toan' => 0,
                        'created_at' => now()
                    ]);
    
                    if($request->voucher_code != ''){
                        $idVoucher = PhieuGiamGia::where('ma_phieu',$request->voucher_code)->first();
                        if($idVoucher){
                            DB::table('phieu_giam_gia_tai_khoans')->insert([
                                'phieu_giam_gia_id' => $idVoucher->id,
                                'user_id' => $user->id,
                                'order_id' => $donHang->id,
                                'created_at' => now(),
                            ]);
                        }
                    }
    
                    $cart = ChiTietGioHang::with('user','bienThe')->where('user_id',$user->id)->get();
                    foreach($cart as $item){
                        ChiTietDonHang::create([
                            'don_hang_id' => $donHang->id,
                            'bien_the_id' => $item->bienThe->id,
                            'so_luong' => $item->so_luong,
                            'created_at' => now()
                        ]);
                    }
                    $cart->each->delete();
                    return response()->json([
                        'status' => 'success',
                        'id' => $donHang->id
                    ],200);
    
                } elseif($request->phuong_thuc_thanh_toan_id === "2") {
                    // 🔹 Nếu là VNPAY, chuyển hướng đến cổng thanh toán trước, không tạo đơn hàng
                    return app(ThanhToanController::class)->createPayment(new Request([
                        'amount' => $request->tong_tien,
                        'bank_code' => $request->bank_code
                    ]));
                } else {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Lỗi phương thức',
                    ],500);
                }
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Sản phẩm vượt quá số lượng tồn kho!',
                    'over_quantity' => $checkquantity
                ],500);
            }
        }
    }
    
    public function datHangThanhCong(Request $request, string $id)
    {
        $donHang = DonHang::select('don_hangs.*', 'phuong_thuc_thanh_toans.ten_phuong_thuc')
            ->join('phuong_thuc_thanh_toans', 'phuong_thuc_thanh_toans.id', '=', 'phuong_thuc_thanh_toan_id')
            ->where('don_hangs.id', '=', $id)
            ->find($id);
        // dd($id,$donHang);
        $chiTietDonHangs = ChiTietDonHang::select(
            'chi_tiet_don_hangs.*',
            'san_phams.ten_san_pham',
            'san_phams.id',
            'san_phams.san_pham_slug',
            'san_phams.gia_cu',
            'bien_thes.gia_ban',
            'san_phams.hinh_anh',
            'bien_thes.ten_bien_the',
            'don_hangs.created_at'
        )
            ->join('bien_thes', 'bien_thes.id', '=', 'bien_the_id')
            ->join('san_phams', 'san_phams.id', '=', 'bien_thes.san_pham_id')
            ->join('don_hangs', 'don_hangs.id', '=', 'bien_thes.san_pham_id')
            ->where('don_hang_id', '=', $donHang->id)
            ->get();

        return view('clients.thanhtoans.dathangthanhcong', compact('donHang', 'chiTietDonHangs'));
    }
    public function createPayment(Request $request)
    {
        dd($request->all());
        
        $request->validate([
            'amount' => 'required|numeric|min:1000',
            'bank_code' => 'required'
        ]);

        $vnp_TmnCode = env('VNP_TMN_CODE');
        $vnp_HashSecret = env('VNP_HASH_SECRET');
        $vnp_Url = env('VNP_URL');

        $vnp_Returnurl = route('vnpay.return');

        $vnp_TxnRef = time();
        $vnp_OrderInfo = "Thanh toán đơn hàng";
        $vnp_OrderType = "billpayment";
        $vnp_Amount = $request->amount * 100; // Số tiền nhân 100
        $vnp_Locale = "vn";
        $vnp_BankCode = $request->bank_code;
        $vnp_IpAddr = $request->ip();

        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_BankCode" => $vnp_BankCode,
        ];

        ksort($inputData);
        $query = http_build_query($inputData);
        $vnpSecureHash = hash_hmac('sha512', $query, $vnp_HashSecret);
        $vnp_Url .= "?" . $query . "&vnp_SecureHash=" . $vnpSecureHash;

        return redirect($vnp_Url);
    }


    public function returnPayment(Request $request)
{
    Log::info('Dữ liệu trả về từ VNPAY:', $request->all());

    $vnp_HashSecret = env('VNP_HASH_SECRET');
    $inputData = $request->all();
    $secureHash = $inputData['vnp_SecureHash'];
    unset($inputData['vnp_SecureHash']);

    ksort($inputData);
    $query = http_build_query($inputData);
    $calculatedHash = hash_hmac('sha512', $query, $vnp_HashSecret);

    if ($calculatedHash === $secureHash) {
        if ($inputData['vnp_ResponseCode'] == '00') {
            DB::beginTransaction(); // Bắt đầu transaction
            try {
                // ✅ 1. Lấy user hiện tại
                $user = Auth::user();
                if (!$user) {
                    return redirect()->route('cart')->with('error', 'Bạn chưa đăng nhập.');
                }
                Log::info('User ID: ' . $user->id);
                // ✅ 2. Lấy giỏ hàng của user
                $gioHang = ChiTietGioHang::where('user_id', $user->id)->get();
                if ($gioHang->isEmpty()) {
                    return redirect()->route('cart')->with('error', 'Giỏ hàng trống, không thể đặt hàng.');
                }
                Log::info('Số sản phẩm trong giỏ hàng: ' . count($gioHang));
                // ✅ 3. Tạo đơn hàng mới
                $donHang = new DonHang();
                $donHang->user_id = $user->id;
                $donHang->tong_tien = $inputData['vnp_Amount'] / 100; // VNPAY gửi số nhân 100
                $donHang->trang_thai = 'Đã thanh toán';
                $donHang->save();
                Log::info('Đã tạo đơn hàng ID: ' . $donHang->id);
                // ✅ 4. Lưu chi tiết đơn hàng
                foreach ($gioHang as $item) {
                    ChiTietDonHang::create([
                        'don_hang_id' => $donHang->id,
                        'bien_the_id' => $item->bien_the_id,
                        'san_pham_id' => $item->san_pham_id,
                        'so_luong' => $item->so_luong,
                        'gia_ban' => $item->gia_moi,
                    ]);
                }
                Log::info('Đã lưu chi tiết đơn hàng.');
                // ✅ 5. Xóa giỏ hàng sau khi đặt hàng thành công
                ChiTietGioHang::where('user_id', $user->id)->delete();

                DB::commit(); // Lưu thay đổi vào database
                return redirect()->route('thanhtoans.dathangthanhcong');
            } catch (\Exception $e) {
                DB::rollBack(); // Hoàn tác nếu có lỗi
                Log::error('Lỗi khi lưu đơn hàng: ' . $e->getMessage());

                return view('vnpay.fail', [
                    'vnp_ResponseCode' => '00',
                    'message' => 'Thanh toán thành công nhưng lỗi khi xử lý đơn hàng. Vui lòng liên hệ hỗ trợ.'
                ]);
            }
        } else {
            return view('vnpay.fail', [
                'vnp_ResponseCode' => $inputData['vnp_ResponseCode'] ?? 'Không xác định',
                'message' => 'Thanh toán không thành công.'
            ]);
        }
    } else {
        return view('vnpay.fail', [
            'vnp_ResponseCode' => 'Lỗi xác thực',
            'message' => 'Chữ ký không hợp lệ!'
        ]);
    }
}
    public function phuongThucThanhToan()
    {
        $phuongThucThanhToan = PhuongThucThanhToan::all();

        return view('clients.thanhtoans.thanhtoan', compact('phuongThucThanhToan'));
    }
}
