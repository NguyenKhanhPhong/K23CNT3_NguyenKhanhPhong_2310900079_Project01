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
        Schema::create('nkp_TIN_TUC', function (Blueprint $table) {
            $table->id();
            $table->string('nkpMaTT')->unique(); // Assuming 'nkpMaTT' is unique, add unique constraint if needed
            $table->string('nkpTieuDe');
            $table->text('nkpMoTa'); // 'text' type is better for longer descriptions
            $table->longText('nkpNoiDung'); // 'longText' for potentially larger content
            $table->dateTime('nkpNgayDangTin'); // Store as datetime
            $table->dateTime('nkpNgayCapNhap'); // Store as datetime
            $table->string('nkpHinhAnh');
            $table->tinyInteger('nkpTrangThai'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nkp_TIN_TUC');
    }
};
