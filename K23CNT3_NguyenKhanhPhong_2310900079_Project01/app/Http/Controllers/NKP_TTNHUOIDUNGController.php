<?php

namespace App\Http\Controllers;

use App\Models\nkp_KHACH_HANG;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Đảm bảo thêm dòng này

class nkp_TTNHUOIDUNGController extends Controller
{
    // Hiển thị form chỉnh sửa thông tin khách hàng
    public function nkpEdit($id)
    {
        // Lấy khách hàng theo id
        $nkpuser = nkp_KHACH_HANG::where('id', $id)->first();
    
        // Kiểm tra nếu khách hàng không tồn tại
        if (!$nkpuser) {
            return redirect()->route('nkpuser.home1')->with('error', 'Khách hàng không tồn tại!');
        }
    
        // Trả về view để chỉnh sửa khách hàng
        return view('nkpuser.ttuser', ['nkpuser' => $nkpuser]);
    }
    
    // Xử lý submit form chỉnh sửa
    public function nkpEditSubmit(Request $request, $id)
    {
        // Xác thực dữ liệu
        $validate = $request->validate([
            'nkpMaKhachHang' => 'required|unique:nkp_khach_hang,nkpMaKhachHang,' . $id, // Bỏ qua kiểm tra unique cho bản ghi hiện tại
            'nkpHoTenKhachHang' => 'required|string',
            'nkpEmail' => 'required|email|unique:nkp_khach_hang,nkpEmail,' . $id,  // Bỏ qua kiểm tra unique cho bản ghi hiện tại
            'nkpMatKhau' => 'nullable|min:6', // Mật khẩu không bắt buộc khi cập nhật
            'nkpDienThoai' => 'required|numeric|unique:nkp_khach_hang,nkpDienThoai,' . $id,  // Bỏ qua kiểm tra unique cho bản ghi hiện tại
            'nkpDiaChi' => 'required|string',
            'nkpNgayDangKy' => 'required|date',
            'nkpTrangThai' => 'required|in:0,1,2',
        ]);
    
        // Lấy khách hàng theo id
        $nkpuser = nkp_KHACH_HANG::where('id', $id)->first();
    
        // Kiểm tra nếu khách hàng không tồn tại
        if (!$nkpuser) {
            return redirect()->route('nkpuser.home1')->with('error', 'Khách hàng không tồn tại!');
        }
    
        // Cập nhật các giá trị từ request
        $nkpuser->nkpMaKhachHang = $request->nkpMaKhachHang;
        $nkpuser->nkpHoTenKhachHang = $request->nkpHoTenKhachHang;
        $nkpuser->nkpEmail = $request->nkpEmail;
        
        // Kiểm tra nếu người dùng nhập mật khẩu mới
        if ($request->filled('nkpMatKhau')) {
            // Nếu có mật khẩu mới, mã hóa và cập nhật
            $nkpuser->nkpMatKhau = Hash::make($request->nkpMatKhau);
        }
        
        $nkpuser->nkpDienThoai = $request->nkpDienThoai;
        $nkpuser->nkpDiaChi = $request->nkpDiaChi;
        $nkpuser->nkpNgayDangKy = $request->nkpNgayDangKy;
        $nkpuser->nkpTrangThai = $request->nkpTrangThai;
    
        // Lưu khách hàng đã cập nhật
        $nkpuser->save();
    
        // Chuyển hướng đến danh sách khách hàng
        return redirect()->route('nkpuser.home1')->with('success', 'Cập nhật khách hàng thành công!');
    }
}