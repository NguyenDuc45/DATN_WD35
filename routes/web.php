<?php

use App\Models\User;
use App\Models\DanhGia;
use App\Models\SanPham;
use App\Models\PhuongThucThanhToan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\LienHeController;
use App\Http\Controllers\VaiTroController;
use App\Http\Controllers\BaiVietController;
use App\Http\Controllers\BienTheController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DanhGiaController;

use App\Http\Controllers\DonHangController;
use App\Http\Controllers\SanPhamController;

use App\Http\Controllers\ThongKeController;
use App\Http\Controllers\HelperCommon\Helper;
use App\Http\Controllers\ThuocTinhController;
use App\Http\Controllers\Payment\PaymentVnPay;
use App\Http\Controllers\Admins\UserController;
use App\Http\Controllers\PhieuGiamGiaController;
use App\Http\Controllers\Admins\SettingController;


use App\Http\Controllers\DanhMucBaiVietController;
use App\Http\Controllers\DanhMucSanPhamController;
use App\Http\Controllers\GiaTriThuocTinhController;
use App\Http\Controllers\Admins\Auth\AuthController;
use App\Http\Controllers\Clients\ThanhToanController;
use App\Http\Controllers\Clients\IndexClientController;
use App\Http\Controllers\ClientDanhMucSanPhamController;
use App\Http\Controllers\Clients\DanhGiaClientsController;
use App\Http\Controllers\Admins\PhuongThucThanhToanController;
use App\Http\Controllers\Admins\Responsibility\RoleController;
use App\Http\Controllers\Admins\Responsibility\PermissionController;
use App\Http\Controllers\Clients\UserController as ClientsUserController;
use App\Http\Controllers\Clients\Auth\AuthController as AuthAuthController;

// Login Admin Controller
Route::prefix('/admin')->controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login/restore', 'login')->name('login.store');

    Route::get('/register', 'showRegister')->name('register');
    Route::post('/register/restore', 'register')->name('register.store');

    Route::get('/forgetPass', 'showForgetPass')->name('pass.forget');
    Route::post('/forgetPass/restore', 'sendLinkForgetPass')->name('pass.sendLinkForgetPass');

    Route::get('/getTokenOfPass/{token}', 'showResetPass')->name('showResetPass');
    Route::post('/getTokenOfPass/{token}/restore', 'storeResetPass')->name('storeResetPass.store');

    Route::get('/pass/edit', 'editPass')->name('pass.edit');
    Route::post('/pass/update', 'updatePass')->name('pass.update');
});
Route::prefix('admin')->middleware(['auth', 'checkStatus'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::match(['post', 'get'], '/setting-infor', [SettingController::class, 'index'])->name('setting-infor.private');
    Route::middleware(['role:SuperAdmin'])->group(function () {

        Route::get('permissions/search', [PermissionController::class, 'search'])->name('permission-search');
        Route::resource('permissions', PermissionController::class);

        Route::get('roles/search', [RoleController::class, 'search'])->name('roles-search');
        Route::resource('roles', RoleController::class);

        Route::match(['post', 'get'], '/configuration-mail', [SettingController::class, 'mail'])->name('configuration.setting-mail');
        Route::match(['post', 'get'], '/configuration-common', [SettingController::class, 'common'])->name('configuration.common');
    });
    Route::get('/checkrole', function () {
        $permissions = App\Models\Role::findByName('admin')->getPermissionNames();
        dd($permissions, Auth::user()->roles);
    });
    // Route::get('/checkrole',function(){
    //     Auth::user()->syncRoles('SuperAdmin');
    //     dd(Auth::user()->hasRole('SuperAdmin'));
    // });

    Route::get("/", [ThongKeController::class, "index"])->name('index');
    Route::get("/lienhe", [LienHeController::class, "index"])->name('lienhe');
    Route::get("/danhgias", [DanhGiaController::class, "index"])->name('danhgias');
    Route::post('/sanphams/upload/{sanPhamId}', [Helper::class, 'uploadAlbum'])->name('upload.album');


    // Chức năng thì cho vào đây đánh tên route->name phải giống quyền lối bởi dấu . nếu là route resource
    // Nếu là route thường thì chỉ cần ghi bình thường không có dấu -
    Route::middleware('dynamic')->group(function () {
        Route::resource('danhmucsanphams', DanhMucSanPhamController::class);
        Route::resource('sanphams', SanPhamController::class);

        Route::get('users/search', [UserController::class, 'search'])->name('users-search');
        Route::resource('users', UserController::class);
        Route::resource('thuoctinhs', ThuocTinhController::class);
        Route::resource('giatrithuoctinh', GiaTriThuocTinhController::class);
        Route::resource('donhangs', DonHangController::class);
        Route::resource('baiviets', BaiVietController::class);
        Route::resource('danhmucbaiviets', DanhMucBaiVietController::class);
        Route::resource('phieugiamgias', PhieuGiamGiaController::class);
        Route::resource("danhgias", DanhGiaController::class);

        Route::get('phuongthucthanhtoans/search', [PhuongThucThanhToanController::class, 'search'])->name('phuongthucthanhtoans-search');
        Route::resource("phuongthucthanhtoans", PhuongThucThanhToanController::class);

        Route::get('/gioi-thieu', [DanhGiaController::class, 'danhGiaNoiBat'])->name('gioithieu');
        Route::get('/chat', [ChatController::class, 'showAdminChat'])->name('admin-chat');
        Route::get('/chat-users', [ChatController::class, 'getChatUsers']);
        Route::get('/test', function () {
            dd(1);
        })->name('hihi');
    });
});


// Route::get('mail', function () {
//     return view('admins.auth.mailForgetPass');
// });

Route::get('/', [IndexClientController::class, 'index'])->name('home');

Route::controller(App\Http\Controllers\Clients\Auth\AuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('login.client');
    Route::post('/login/store', 'storeLogin')->name('login.store.client');

    Route::get('/register', 'showRegister')->name('register.client');
    Route::post('/register/restore', 'storeRegister')->name('register.store.client');

    Route::get('/forgetPass', 'showForgetPass')->name('pass.forget.client');
    Route::post('/forgetPass/restore', 'sendLinkForgetPass')->name('pass.sendLinkForgetPass.client');

    Route::get('/getTokenOfPass/{token}', 'showResetPass')->name('showResetPass.client');
    Route::post('/getTokenOfPass/{token}/restore', 'storeResetPass')->name('storeResetPass.store.client');

    Route::get('/pass/edit', 'editPass')->name('pass.edit.client');
    Route::post('/pass/update', 'updatePass')->name('pass.update.client');

    Route::get('/logout', 'logout')->name('logout.client');
});

Route::get('/san-pham/{san_pham_id}/danh-gia', [DanhGiaClientsController::class, 'danhSachDanhGia']);
Route::post('/san-pham/{san_pham_id}/danh-gia', [DanhGiaClientsController::class, 'themDanhGia'])->name('sanphams.themdanhgia');

Route::get('/sanpham', [App\Http\Controllers\Clients\SanPhamController::class, 'danhSach'])->name('sanphams.danhsach');
Route::get('/sanpham/{id}', [App\Http\Controllers\Clients\SanPhamController::class, 'chiTiet'])->name('sanphams.chitiet');
Route::get('/quick-view', [App\Http\Controllers\Clients\SanPhamController::class, 'quickView'])->name('sanphams.quickview');

Route::get('/sanphamyeuthich', [App\Http\Controllers\Clients\SanPhamController::class, 'sanPhamYeuThich'])->name('sanphams.sanphamyeuthich');
Route::delete('/xoa-yeu-thich/{id}', [App\Http\Controllers\Clients\SanPhamController::class, 'xoaYeuThich']);
Route::post('/them-yeu-thich/{id}', [App\Http\Controllers\Clients\SanPhamController::class, 'addsanPhamYeuThich'])->name('add.wishlist');


Route::get('/baiviet', [App\Http\Controllers\Clients\BaiVietController::class, 'danhSach'])->name('baiviets.danhsach');
Route::get('/baiviet/{id}', [App\Http\Controllers\Clients\BaiVietController::class, 'chiTiet'])->name('baiviets.chitiet');

Route::get('/huongdan', [App\Http\Controllers\Clients\HuongDanController::class, 'danhSach'])->name('huongdans.danhsach');
Route::get('/huongdan/{id}', [App\Http\Controllers\Clients\HuongDanController::class, 'chiTiet'])->name('huongdans.chitiet');

Route::get('/giohang', [App\Http\Controllers\Clients\GioHangController::class, 'gioHang'])->name('giohang');
Route::post('/post-giohang', [App\Http\Controllers\Clients\GioHangController::class, 'storegioHang'])->name('post.giohang');
Route::post('/xoa-gio-hang', [App\Http\Controllers\Clients\GioHangController::class, 'xoagioHang'])->name('delete.giohang');
Route::post('/accept-thanh-toan', [App\Http\Controllers\Clients\GioHangController::class, 'acceptThanhToan'])->name('accept.giohang');

Route::post('/nhap-voucher', [App\Http\Controllers\Clients\GioHangController::class, 'nhapvoucher'])->name('voucher.giohang');



Route::get('/thanhtoan', [App\Http\Controllers\Clients\ThanhToanController::class, 'thanhToan'])->name('thanhtoans.thanhtoan');
Route::post('/thanhtoan-xu-ly', [App\Http\Controllers\Clients\ThanhToanController::class, 'xuLyThanhToan'])->name('thanhtoans.xuLy');
Route::get('/dathangthanhcong/{id}', [App\Http\Controllers\Clients\ThanhToanController::class, 'datHangThanhCong'])->name('thanhtoans.dathangthanhcong');

Route::get('/users', [App\Http\Controllers\Clients\UserController::class, 'chiTiet'])->name('users.chitiet');
Route::put('/users/update-infor/{id}', [App\Http\Controllers\Clients\UserController::class, 'updateInfor'])->name('users.update');
Route::get('/order-tracking/{id}', [App\Http\Controllers\Clients\UserController::class, 'orderTracking'])->name('order-tracking.client');
Route::post('/order/updateTrangThai/{id}', [App\Http\Controllers\Clients\UserController::class, 'updateTrangThai'])->name('order.updateTrangThai');

Route::get('/gioithieu', [App\Http\Controllers\Clients\GioiThieuController::class, 'home'])->name('gioithieu.home');

Route::get('/lienhe', [App\Http\Controllers\Clients\LienHeController::class, 'home'])->name('lienhe.home');

Route::get('/danh-muc', [SanPhamController::class, 'danhMuc'])->name('danh-muc');

Route::get('/gioi-thieu', [DanhGiaController::class, 'showDanhGias'])->name('gioithieu');

Route::get('clientdanhmucsanpham', [ClientDanhMucSanPhamController::class, 'index'])->name('danhsach');

Route::get('/top-san-pham', [SanPhamController::class, 'sanPhamTopDanhGia'])->name('sanpham.top_danh_gia');
Route::post('/lienhe', [ContactController::class, 'send'])->name('send.contact');

Route::get('/san-pham/{id}/bien-the', [SanPhamController::class, 'getBienThe']);
Route::post('/danhgias/toggle-status', [DanhGiaController::class, 'trangThaiDanhGia'])->name('danhgias.trangthaidanhgia');

Route::get('/vnpay-return', [ThanhToanController::class, 'vnpayReturn'])->name('vnpay.return');

// Route::get('/phieugiamgia', [PhieuGiamGiaController::class, 'showCart'])->name('cart.show');

// Route::get('/test', function(){
//     $user = User::with(['danhGias', 'donHangs.chiTietDonHangs'])
//     ->where('id', Auth::user()->id)
//     ->first();

//     $sanPhamDaMua = []; // Danh sách sản phẩm đã mua ở trạng thái "Đã nhận hàng"

//     foreach ($user->donHangs as $donHang) {
//         if ($donHang->trang_thai === 5) { // Kiểm tra trạng thái đơn hàng
//             foreach ($donHang->chiTietDonHangs as $chiTiet) {
//                 $sanPhamDaMua[] = $chiTiet->id_bien_the;
//             }
//         }
//     }

//     // Kiểm tra sản phẩm có trong danh sách được phép đánh giá hay không
//     $idBienTheCanDanhGia = 123; // ID biến thể của sản phẩm cần kiểm tra
//     if (in_array($idBienTheCanDanhGia, $sanPhamDaMua)) {
//         echo "Bạn có thể đánh giá sản phẩm này!";
//     } else {
//         echo "Bạn chưa mua hoặc đơn hàng chưa hoàn thành!";
//     }

// })->name('vnpay.return');

Route::get('/messages/{receiverId}', [ChatController::class, 'getMessages']);
Route::post('/send-chat', [ChatController::class, 'sendChat']);

Route::middleware(['auth'])->group(function () {
    Route::get('/vi', [App\Http\Controllers\ViController::class, 'hienThi'])->name('vi');
});

