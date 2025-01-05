<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nkp_HOA_DON extends Model
{
    use HasFactory;

    // Đặt tên bảng nếu khác mặc định
    protected $table = 'nkp_HOA_DON';  // Tên bảng trong cơ sở dữ liệu

    protected $primaryKey = 'id';  // Xác định khóa chính của bảng (mặc định là 'id')

    public $timestamps = true;  // Laravel tự động quản lý các cột created_at và updated_at

    // Các trường có thể được gán hàng loạt
    protected $fillable = [
        'nkpMaHoaDon',  // Thêm trường nkpMaHoaDon vào mảng fillable
        'nkpMaKhachHang',
        'nkpNgayHoaDon',
        'nkpNgayNhan',
        'nkpHoTenKhachHang',
        'nkpEmail',
        'nkpDienThoai',
        'nkpDiaChi',
        'nkpTongGiaTri',
        'nkpTrangThai',
    ];

    // Quan hệ với bảng nkp_KHACH_HANG
    public function khachHang()
    {
        return $this->belongsTo(nkp_KHACH_HANG::class, 'nkpMaKhachHang', 'id');
    }

    // Quan hệ với bảng nkp_CT_HOA_DON
    public function chiTietHoaDon()
    {
        return $this->hasMany(nkp_CT_HOA_DON::class, 'nkpHoaDonID', 'id');
    }
    
}