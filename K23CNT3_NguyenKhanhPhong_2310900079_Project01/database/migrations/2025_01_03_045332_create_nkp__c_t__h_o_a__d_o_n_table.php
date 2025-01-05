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
        Schema::create('nkp_CT_HOA_DON', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nkpHoaDonID')->references('id')->on('nkp_HOA_DON');
            $table->bigInteger('nkpSanPhamID')->references('id')->on('nkp_SAN_PHAM');
            $table->integer('nkpSoLuongMua');
            $table->float('nkpDonGiaMua');
            $table->double('nkpThanhTien');
            $table->tinyInteger('nkpTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nkp_CT_HOA_DON');
    }
};
