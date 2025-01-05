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
        Schema::create('nkp_LOAI_SAN_PHAM', function (Blueprint $table) {
            $table->id();
            $table->string('nkpMaLoai',255)->unique();
            $table->string('nkpTenLoai',255);
            $table->tinyInteger('nkpTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nkp_LOAI_SAN_PHAM');
    }
};
