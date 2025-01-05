<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nkp_CT_HOA_DON extends Model
{
    use HasFactory;

    // Đặt tên bảng nếu khác mặc định
    protected $table = 'nkp_CT_HOA_DON';  // Tên bảng trong cơ sở dữ liệu

    protected $primaryKey = 'id';  // Xác định khóa chính của bảng (mặc định là 'id')

    public $timestamps = true;  // Laravel tự động quản lý các cột created_at và updated_at

    // Các trường có thể được gán hàng loạt
    protected $fillable = [
       'nkpHoaDonID',   // Đảm bảo có trường nkpHoaDonID ở đây
        'nkpSanPhamID',
        'nkpSoLuongMua',
        'nkpDonGiaMua',
        'nkpThanhTien',
        'nkpTrangThai',
    ];

    // Quan hệ giữa bảng nkp_CT_HOA_DON và bảng nkp_SAN_PHAM
 // Quan hệ với bảng nkp_HOA_DON
public function hoaDon()
{
    return $this->belongsTo(nkp_HOA_DON::class, 'nkpHoaDonID', 'id');
}

// Quan hệ với bảng nkp_SAN_PHAM
public function sanPham()
{
    return $this->belongsTo(nkp_SAN_PHAM::class, 'nkpSanPhamID', 'id');
}

}