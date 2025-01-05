<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class nkp_QUAN_TRITableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mã hóa mật khẩu bằng Hash::make()
        $nkpMatKhau = Hash::make('phong2005dz'); // Mã hóa mật khẩu

        DB::table('nkp_QUAN_TRI')->insert([
            'nkpTaiKhoan' => 'nguyenphong@gmail.com',
            'nkpMatKhau' => $nkpMatKhau,
            'nkpTrangThai' => 0
        ]);

        DB::table('nkp_QUAN_TRI')->insert([
            'nkpTaiKhoan' => '0943572199',
            'nkpMatKhau' => $nkpMatKhau,
            'nkpTrangThai' => 0
        ]);
    }
}
