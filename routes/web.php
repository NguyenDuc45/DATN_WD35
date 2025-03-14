<?php

use App\Http\Controllers\GiaTriThuocTinhController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LienHeController;
use App\Http\Controllers\VaiTroController;
use App\Http\Controllers\BaiVietController;
use App\Http\Controllers\BienTheController;
use App\Http\Controllers\DanhGiaController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\ThongKeController;
use App\Http\Controllers\ThuocTinhController;
use App\Http\Controllers\Admins\UserController;

use App\Http\Controllers\PhieuGiamGiaController;
use App\Http\Controllers\Admins\SettingController;

use App\Http\Controllers\DanhMucBaiVietController;
use App\Http\Controllers\DanhMucSanPhamController;
use App\Http\Controllers\Admins\Auth\AuthController;
use App\Http\Controllers\Admins\Responsibility\RoleController;
use App\Http\Controllers\Admins\Responsibility\PermissionController;
use App\Http\Controllers\HelperCommon\Helper;

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
    Route::middleware('dynamic')->group(function () {
        Route::resource('danhmucsanphams', DanhMucSanPhamController::class);
        Route::resource('sanphams', SanPhamController::class);

        Route::resource('bienthes', BienTheController::class);
        Route::get('users/search', [UserController::class, 'search'])->name('users-search');
        Route::resource('users', UserController::class);
        Route::resource('thuoctinhs', ThuocTinhController::class);
        Route::resource('giatrithuoctinh', GiaTriThuocTinhController::class);
        Route::resource('donhangs', DonHangController::class);
        Route::resource('baiviets', BaiVietController::class);
        Route::resource('danhmucbaiviets', DanhMucBaiVietController::class);
        Route::resource('baiviets', BaiVietController::class);
        Route::resource('phieugiamgias', PhieuGiamGiaController::class);
        Route::resource("danhgias", DanhGiaController::class);
        Route::get('/gioi-thieu', [DanhGiaController::class, 'danhGiaNoiBat'])->name('gioithieu');
    });
});


// Route::get('mail', function () {
//     return view('admins.auth.mailForgetPass');
// });

Route::get('/', function () {
    return view('clients.index');
})->name('home');

Route::get('/sanpham', [App\Http\Controllers\Clients\SanPhamController::class, 'danhSach'])->name('sanphams.danhsach');
Route::get('/sanpham/{id}', [App\Http\Controllers\Clients\SanPhamController::class, 'chiTiet'])->name('sanphams.chitiet');
Route::get('/sanphamyeuthich', [App\Http\Controllers\Clients\SanPhamController::class, 'sanPhamYeuThich'])->name('sanphams.sanphamyeuthich');

Route::get('/baiviet', [App\Http\Controllers\Clients\BaiVietController::class, 'danhSach'])->name('baiviets.danhsach');
Route::get('/baiviet/{id}', [App\Http\Controllers\Clients\BaiVietController::class, 'chiTiet'])->name('baiviets.chitiet');

Route::get('/huongdan', [App\Http\Controllers\Clients\HuongDanController::class, 'danhSach'])->name('huongdans.danhsach');
Route::get('/huongdan/{id}', [App\Http\Controllers\Clients\HuongDanController::class, 'chiTiet'])->name('huongdans.chitiet');

Route::get('/giohang', [App\Http\Controllers\Clients\ThanhToanController::class, 'gioHang'])->name('thanhtoans.giohang');
Route::get('/thanhtoan', [App\Http\Controllers\Clients\ThanhToanController::class, 'thanhToan'])->name('thanhtoans.thanhtoan');
Route::get('/dathangthanhcong', [App\Http\Controllers\Clients\ThanhToanController::class, 'datHangThanhCong'])->name('thanhtoans.dathangthanhcong');

Route::get('/users/{username}', [App\Http\Controllers\Clients\UserController::class, 'chiTiet'])->name('users.chitiet');

Route::get('/gioithieu', [App\Http\Controllers\Clients\GioiThieuController::class, 'home'])->name('gioithieu.home');

Route::get('/lienhe', [App\Http\Controllers\Clients\LienHeController::class, 'home'])->name('lienhe.home');

Route::get('/gioi-thieu', [DanhGiaController::class, 'showDanhGias'])->name('gioithieu');
