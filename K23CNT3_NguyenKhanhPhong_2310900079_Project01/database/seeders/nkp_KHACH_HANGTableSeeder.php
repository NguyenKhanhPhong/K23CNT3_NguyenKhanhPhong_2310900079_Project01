<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class nkp_KHACH_HANGTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nkp_KHACH_HANG')->insert([
            'nkpMaKhachHang'=>'KH001',
            'nkpHoTenKhachHang'=>'Nguyễn Khánh Phong',
            'nkpEmail'=>'nguyenphong@gmail.com',
            'nkpMatKhau'=>Hash::make('123456a@'), // Mã hóa mật khẩu
            'nkpDienThoai'=>'0375730295',
            'nkpDiaChi'=>'Hà Nội',
            'nkpNgayDangKy'=>'2024/12/12',
            'nkpTrangThai'=>0,
        ]);

        DB::table('nkp_KHACH_HANG')->insert([
            'nkpMaKhachHang'=>'KH002',
            'nkpHoTenKhachHang'=>'Trần Văn B',
            'nkpEmail'=>'TranB@gmail.com',
            'nkpMatKhau'=>Hash::make('tranb123@'), // Mã hóa mật khẩu
            'nkpDienThoai'=>'012345678',
            'nkpDiaChi'=>'Phú Thọ',
            'nkpNgayDangKy'=>'2024/12/20',
            'nkpTrangThai'=>0,
        ]);

        DB::table('nkp_KHACH_HANG')->insert([
            'nkpMaKhachHang'=>'KH003',
            'nkpHoTenKhachHang'=>'Trần Văn C',
            'nkpEmail'=>'TranC@gmail.com',
            'nkpMatKhau'=>Hash::make('tranc123'), // Mã hóa mật khẩu
            'nkpDienThoai'=>'098765432',
            'nkpDiaChi'=>'Quảng Ninh',
            'nkpNgayDangKy'=>'2024/12/17',
            'nkpTrangThai'=>2,
        ]);

        DB::table('nkp_KHACH_HANG')->insert([
            'nkpMaKhachHang'=>'KH004',
            'nkpHoTenKhachHang'=>'Trần Văn D',
            'nkpEmail'=>'TranD@gmail.com',
            'nkpMatKhau'=>Hash::make('TranD2005'), // Mã hóa mật khẩu
            'nkpDienThoai'=>'012385775',
            'nkpDiaChi'=>'Hà Nội',
            'nkpNgayDangKy'=>'2024/12/03',
            'nkpTrangThai'=>0,
        ]);
    }
}
