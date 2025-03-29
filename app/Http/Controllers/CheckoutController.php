<?php

namespace App\Http\Controllers;
// use Illuminate\Support\Facades\Auth;
// use App\Models\DonHang;


use Illuminate\Http\Request;


class CheckoutController extends Controller
{
    public function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data))
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);
    return $result;
}
public function momo_payment(Request $request)
{

  $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

  $partnerCode = 'MOMOBKUN20180529';
  $accessKey = 'klm05TvNBzhg7h7j';
  $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
  $orderInfo = "Thanh toán qua ATM MoMo";
  $amount = $_POST['total_momo'];
  $orderId = time() . "";
  $redirectUrl = "http://127.0.0.1:8000/thanhtoan";
  $ipnUrl = "http://127.0.0.1:8000/thanhtoan";
  $extraData = "";

  $requestId = time() . "";
  $requestType = "payWithATM";
  // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
  //before sign HMAC SHA256 signature
  $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
  $signature = hash_hmac("sha256", $rawHash, $secretKey);
  $data = array(
    'partnerCode' => $partnerCode,
    'partnerName' => "Test",
    "storeId" => "MomoTestStore",
    'requestId' => $requestId,
    'amount' => $amount,
    'orderId' => $orderId,
    'orderInfo' => $orderInfo,
    'redirectUrl' => $redirectUrl,
    'ipnUrl' => $ipnUrl,
    'lang' => 'vi',
    'extraData' => $extraData,
    'requestType' => $requestType,
    'signature' => $signature
  );
  $result = $this->execPostRequest($endpoint, json_encode($data));
  $jsonResult = json_decode($result, true);  // decode json

  //Just a example, please check more in there
  return redirect()->to($jsonResult['payUrl']);

  header('Location: ' . $jsonResult['payUrl']);
}
// public function momo_return(Request $request)
// {
//     if ($request->resultCode == 0) { // Thanh toán thành công
//         $donHang = DonHang::where('ma_don_hang', $request->orderId)->first();
//         if ($donHang) {
//             $donHang->trang_thai_thanh_toan = 1; // Đã thanh toán
//             $donHang->trang_thai_don_hang = 1; // Đang xử lý
//             $donHang->save();
//         }
//         return redirect()->route('dathang.thanhcong')->with('success', 'Thanh toán thành công!');
//     } else {
//         return redirect()->route('giohang')->with('error', 'Thanh toán thất bại. Vui lòng thử lại.');
//     }
// }
// public function momo_ipn(Request $request)
// {
//     if ($request->resultCode == 0) { // Thanh toán thành công
//         $donHang = DonHang::where('ma_don_hang', $request->orderId)->first();
//         if ($donHang) {
//             $donHang->trang_thai_thanh_toan = 1; // Đã thanh toán
//             $donHang->trang_thai_don_hang = 1; // Đang xử lý
//             $donHang->save();
//         }
//     }
// }

}
