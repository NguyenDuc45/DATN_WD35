<?php

namespace Database\Seeders;

use App\Models\GiaTriThuocTinh;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GiaTriThuocTinhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GiaTriThuocTinh::factory()->count(5)->create();
    }
}
