<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class nkp_CT_HOA_DONTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nkp_CT_HOA_DON')->insert([
            'nkpHoaDonID'=>1,
            'nkpSanPhamID'=>1,
            'nkpSoLuongMua'=>12,
            'nkpDonGiaMua'=>500000,
            'nkpThanhTien'=>500000 * 12,
            'nkpTrangThai'=>0,
        ]);

        DB::table('nkp_CT_HOA_DON')->insert([
            'nkpHoaDonID'=>2,
            'nkpSanPhamID'=>2,
            'nkpSoLuongMua'=>20,
            'nkpDonGiaMua'=>500000,
            'nkpThanhTien'=>500000 * 20,
            'nkpTrangThai'=>0,
        ]);

        DB::table('nkp_CT_HOA_DON')->insert([
            'nkpHoaDonID'=>3,
            'nkpSanPhamID'=>5,
            'nkpSoLuongMua'=>5,
            'nkpDonGiaMua'=>500000,
            'nkpThanhTien'=>500000 *  5,
            'nkpTrangThai'=>0,
        ]);

        DB::table('nkp_CT_HOA_DON')->insert([
            'nkpHoaDonID'=>4,
            'nkpSanPhamID'=>8,
            'nkpSoLuongMua'=>3,
            'nkpDonGiaMua'=>500000,
            'nkpThanhTien'=>500000 * 3,
            'nkpTrangThai'=>0,
        ]);
    }
}
