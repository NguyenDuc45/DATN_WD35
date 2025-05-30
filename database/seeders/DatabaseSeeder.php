<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DanhGia;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SettingSeeder::class,
            AddPermissionAndRoleSeeder::class,
            AdminSeeder::class,
            AltUserSeeder::class,
            UserSeeder::class,
            DanhMucSanPhamSeeder::class,
            PhuongThucThanhToanSeeder::class,
            ThuocTinhSeeder::class,
            GiaTriThuocTinhSeeder::class,
            SanPhamSeeder::class,
            BienTheSeeder::class,
            DonHangSeeder::class,
            ChiTietDonHangSeeder::class,
            DanhMucBaiVietSeeder::class,
            BaiVietSeeder::class,
            PhieuGiamGiaSeeder::class,
            DanhGiaSeeder::class,
            ChiTietGioHangSeeder::class,
            BinhLuanSeeder::class,
            // BienTheThuocTinhSeeder::class,
        ]);
    }
}
