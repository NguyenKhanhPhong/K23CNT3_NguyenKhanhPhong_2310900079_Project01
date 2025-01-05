<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class nkp_SAN_PHAMTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nkp_SAN_PHAM')->insert([
            'nkpMaSanPham' => 'AS001',
            'nkpTenSanPham' => 'Laptop Asus Zenbook 14',
            'nkpHinhAnh' => asset('img/san_pham/AS.jpg'),
            'nkpSoLuong' => 100,
            'nkpDonGia' => 500000,
            'nkpMaLoai' => 2,
            'nkpMoTa' =>'Laptop ngon 
            ',
            'nkpTrangThai' => 0
        ]);
        DB::table('nkp_SAN_PHAM')->insert([
            'nkpMaSanPham' => 'LNV001',
            'nkpTenSanPham' => 'Laptop Lenovo IdeaPad Slim 5',
            'nkpHinhAnh' => asset('img/san_pham/LNV.jpg'),
            'nkpSoLuong' => 100,
            'nkpDonGia' => 500000,
            'nkpMaLoai' => 2,
            'nkpMoTa' =>'Laptop ngon',
            'nkpTrangThai' => 0
        ]);
        DB::table('nkp_SAN_PHAM')->insert([
            'nkpMaSanPham' => 'D001',
            'nkpTenSanPham' => 'Laptop Dell Alienware m15',
            'nkpHinhAnh' => asset('img/san_pham/Dell.jpg'),
            'nkpSoLuong' => 100,
            'nkpDonGia' => 500000,
            'nkpMaLoai' => 2,
            'nkpMoTa' =>'Laptop Dell Alienware M15 là một chiếc laptop gaming cao cấp thuộc dòng Alienware, nổi tiếng với thiết kế ấn tượng, hiệu suất mạnh mẽ và khả năng chơi game vượt trội. Đây là một trong những lựa chọn hàng đầu cho những game thủ hoặc những người làm việc yêu cầu cấu hình mạnh mẽ như thiết kế đồ họa, chỉnh sửa video, hay chạy các phần mềm yêu cầu tài nguyên hệ thống cao. Dưới đây là những cảm nhận chi tiết về chiếc máy này:',
            'nkpTrangThai' => 0
        ]);
    }
}
