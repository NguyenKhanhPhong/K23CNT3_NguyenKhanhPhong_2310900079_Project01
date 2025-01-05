<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nkp_SAN_PHAM extends Model
{
    use HasFactory;

    // Tên bảng trong cơ sở dữ liệu
   
    protected $table = 'nkp_SAN_PHAM';
    protected $primaryKey = 'id';
    public $timestamps = true;

    
    // Các trường có thể được gán hàng loạt
    protected $fillable = [
        'nkpMaSanPham',
        'nkpTenSanPham',
        'nkpHinhAnh',
        'nkpSoLuong',
        'nkpDonGia',
        'nkpMaLoai',
        'nkpMoTa',
        'nkpTrangThai',
    ];
    public function chiTietHoaDon()
    {
        return $this->hasMany(nkp_CT_HOA_DON::class, 'nkpSanPhamID','id');
    }
   

}