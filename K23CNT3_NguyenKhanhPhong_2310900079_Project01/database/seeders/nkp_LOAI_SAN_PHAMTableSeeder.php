<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class nkp_LOAI_SAN_PHAMTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nkp_LOAI_SAN_PHAM')->insert([
            'nkpMaLoai'=>'AS',
            'nkpTenLoai'=>'Asus Zenbook 14 Q407IQ',
            'nkpTrangThai'=>0
        ]);
        DB::table('nkp_LOAI_SAN_PHAM')->insert([
            'nkpMaLoai'=>'LNV',
            'nkpTenLoai'=>'Lenovo IdeaPad Slim 5 2024',
            'nkpTrangThai'=>0
        ]);
        DB::table('nkp_LOAI_SAN_PHAM')->insert([
            'nkpMaLoai'=>'Dell',
            'nkpTenLoai'=>'Dell Alienware M15',
            'nkpTrangThai'=>0
        ]);
    }
}
