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
        Schema::create('nkp_KHACH_HANG', function (Blueprint $table) {
            $table->id();
            $table->string('nkpMaKhachHang',255)->unique();
            $table->string('nkpHoTenKhachHang',255);
            $table->string('nkpEmail',255)->unique();
            $table->string('nkpMatKhau',255);
            $table->string('nkpDienThoai',255)->unique();
            $table->string('nkpDiaChi',255);
            $table->date('nkpNgayDangKy');
            $table->tinyInteger('nkpTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nkp_KHACH_HANG');
    }
};
