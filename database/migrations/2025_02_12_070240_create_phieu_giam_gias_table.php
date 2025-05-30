<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('phieu_giam_gias', function (Blueprint $table) {
            $table->id();
            $table->string('ma_phieu')->unique();
            $table->string('ten_phieu');
            $table->date('ngay_bat_dau')->nullable();
            $table->date('ngay_ket_thuc')->nullable();
            $table->double('gia_tri')->default(0);
            $table->double('muc_giam_toi_da')->default(0);
            $table->double('muc_gia_toi_thieu')->default(0);
            $table->unsignedInteger('so_luong')->default(0);
            $table->text('mo_ta')->nullable();
            $table->boolean('trang_thai')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phieu_giam_gias');
    }
};
