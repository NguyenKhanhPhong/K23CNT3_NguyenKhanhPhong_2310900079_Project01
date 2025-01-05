<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Thêm dòng này
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;

class nkp_KHACH_HANG extends Authenticatable // Kế thừa từ Authenticatable
{
    use HasFactory;


    protected $table = 'nkp_KHACH_HANG';
    protected $primaryKey = 'nkpMaKhachHang'; // Đảm bảo rằng nkpMaKhachHang là khóa chính

    protected $fillable = [
        'nkpMaKhachHang', 'nkpHoTenKhachHang', 'nkpEmail', 'nkpMatKhau', 
        'nkpDienThoai', 'nkpDiaChi', 'nkpNgayDangKy', 'nkpTrangThai'
    ];

    public $incrementing = false; // Nếu nkpMaKhachHang không tự tăng thì bạn cần đặt false
    public $timestamps = true;

    protected $dates = ['nkpNgayDangKy'];

    public function setnkpMatKhauAttribute($value)
{
    if (!empty($value)) {
        $this->attributes['nkpMatKhau'] = Hash::make($value);
    }
}

    
}