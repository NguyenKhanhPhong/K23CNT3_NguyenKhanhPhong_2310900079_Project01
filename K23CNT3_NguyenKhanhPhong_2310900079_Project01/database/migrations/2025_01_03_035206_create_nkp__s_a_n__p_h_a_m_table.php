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
        Schema::create('nkp_SAN_PHAM', function (Blueprint $table) {
            $table->id();
            $table->string('nkpMaSanPham',255)->unique();
            $table->string('nkpTenSanPham',255);
            $table->string('nkpHinhAnh',255);
            $table->Integer('nkpSoLuong');
            $table->float('nkpDonGia');
            $table->bigInteger('nkpMaLoai')->references('id')->on('nkp_LOAI_SAN_PHAM');
            $table->string('nkpMoTa',1000);
            $table->tinyInteger('nkpTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nkp_SAN_PHAM');
    }
};
