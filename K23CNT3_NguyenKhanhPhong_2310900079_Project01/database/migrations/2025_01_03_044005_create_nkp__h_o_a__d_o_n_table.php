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
        Schema::create('nkp_HOA_DON', function (Blueprint $table) {
            $table->id();
            $table->string('nkpMaHoaDon', 255)->unique();
            
            // Định nghĩa khóa ngoại cho nkpMaKhachHang
            $table->bigInteger('nkpMaKhachHang')->unsigned();
            $table->foreign('nkpMaKhachHang')
                  ->references('id')->on('nkp_KHACH_HANG')
                  ->onDelete('cascade');  // Xóa hóa đơn khi khách hàng bị xóa
            
            $table->date('nkpNgayHoaDon');
            $table->date('nkpNgayNhan');
            $table->string('nkpHoTenKhachHang', 255);
            $table->string('nkpEmail', 255);
            $table->string('nkpDienThoai', 255);
            $table->string('nkpDiaChi', 255);
            $table->float('nkpTongGiaTri');
            $table->tinyInteger('nkpTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nkp_HOA_DON');
    }
};
