<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class nkp_HOA_DONTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nkp_HOA_DON')->insert([
            'nkpMaHoaDon'=>'HD001',
            'nkpMaKhachHang'=>1,
            'nkpNgayHoaDon'=>'2024/12/12',
            'nkpNgayNhan'=>'2024/12/12',
            'nkpHoTenKhachHang'=>'Nguyễn Khánh Phong',
            'nkpEmail'=>'nguyenphong@gmail.com',
            'nkpDienThoai'=>'0375730295',
            'nkpDiaChi'=>'Hà Nội',
            'nkpTongGiaTri'=>'500000',
            'nkpTrangThai'=>2,
        ]);

        DB::table('nkp_HOA_DON')->insert([
            'nkpMaHoaDon'=>'HD002',
            'nkpMaKhachHang'=>2,
            'nkpNgayHoaDon'=>'2024/12/20',
            'nkpNgayNhan'=>'2024/12/21',
            'nkpHoTenKhachHang'=>'Trần Văn B',
            'nkpEmail'=>'TranB@gmail.com',
            'nkpDienThoai'=>'012345678',
            'nkpDiaChi'=>'Phú Thọ',
            'nkpTongGiaTri'=>'500000',
            'nkpTrangThai'=>0,
        ]);

        DB::table('nkp_HOA_DON')->insert([
            'nkpMaHoaDon'=>'HD003',
            'nkpMaKhachHang'=>3,
            'nkpNgayHoaDon'=>'2024/12/17',
            'nkpNgayNhan'=>'2024/12/17',
            'nkpHoTenKhachHang'=>'Trần Văn C',
            'nkpEmail'=>'TranC@gmail.com',
            'nkpDienThoai'=>'098765432',
            'nkpDiaChi'=>'Quảng Ninh',
            'nkpTongGiaTri'=>'500000',
            'nkpTrangThai'=>1,
        ]);

        DB::table('nkp_HOA_DON')->insert([
            'nkpMaHoaDon'=>'HD004',
            'nkpMaKhachHang'=>1,
            'nkpNgayHoaDon'=>'2024/12/12',
            'nkpNgayNhan'=>'2024/12/12',
            'nkpHoTenKhachHang'=>'Trần Văn D',
            'nkpEmail'=>'TranD@gmail.com',
            'nkpDienThoai'=>'012385775',
            'nkpDiaChi'=>'Hà Nội',
            'nkpTongGiaTri'=>'500000',
            'nkpTrangThai'=>1,
        ]);
        DB::table('nkp_HOA_DON')->insert([
            'nkpMaHoaDon'=>'HD005',
            'nkpMaKhachHang'=>4,
            'nkpNgayHoaDon'=>'2024/12/03',
            'nkpNgayNhan'=>'2024/12/04',
            'nkpHoTenKhachHang'=>'Trần Văn E',
            'nkpEmail'=>'TranE@gmail.com',
            'nkpDienThoai'=>'094357152',
            'nkpDiaChi'=>'Hà Nội',
            'nkpTongGiaTri'=>'500000',
            'nkpTrangThai'=>1,
        ]);
    }
}
