<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nkp_KHACH_HANG; 
class nkp_KHACH_HANGcontroller extends Controller
{
    //
    // CRUD
    // list
    public function nkpList()
    {
        $khachhangs = nkp_KHACH_HANG::all();
        return view('nkpAdmins.nkpkhachhang.nkp-list',['khachhangs'=>$khachhangs]);
    }
    // detail 
    public function nkpDetail($id)
    {
        $nkpkhachhang = nkp_KHACH_HANG::where('id',$id)->first();
        return view('nkpAdmins.nkpkhachhang.nkp-detail',['nkpkhachhang'=>$nkpkhachhang]);
    }
    // create
    public function nkpCreate()
    {
        return view('nkpAdmins.nkpkhachhang.nkp-create');
    }
    //post
    public function nkpCreateSubmit(Request $request)
    {
        $validate = $request->validate([
            'nkpMaKhachHang' => 'required|unique:nkp_khach_hang,nkpMaKhachHang',
            'nkpHoTenKhachHang' => 'required|string',
            'nkpEmail' => 'required|email|unique:nkp_khach_hang,nkpEmail',  
            'nkpMatKhau' => 'required|min:6',
            'nkpDienThoai' => 'required|numeric|unique:nkp_khach_hang,nkpDienThoai',  
            'nkpDiaChi' => 'required|string',
            'nkpNgayDangKy' => 'required|date',  
            'nkpTrangThai' => 'required|in:0,1,2',
        ]);

        $nkpkhachhang = new nkp_KHACH_HANG;
        $nkpkhachhang->nkpMaKhachHang = $request->nkpMaKhachHang;
        $nkpkhachhang->nkpHoTenKhachHang = $request->nkpHoTenKhachHang;
        $nkpkhachhang->nkpEmail = $request->nkpEmail;
        $nkpkhachhang->nkpMatKhau = $request->nkpMatKhau;
        $nkpkhachhang->nkpDienThoai = $request->nkpDienThoai;
        $nkpkhachhang->nkpDiaChi = $request->nkpDiaChi;
        $nkpkhachhang->nkpNgayDangKy = $request->nkpNgayDangKy;
        $nkpkhachhang->nkpTrangThai = $request->nkpTrangThai;

        $nkpkhachhang->save();

        return redirect()->route('nkpadmins.nkpkhachhang');


    }

    // edit
    public function nkpEdit($id)
    {
        // Lấy khách hàng theo id
        $nkpkhachhang = nkp_KHACH_HANG::where('id', $id)->first();
    
        // Kiểm tra nếu khách hàng không tồn tại
        if (!$nkpkhachhang) {
            return redirect()->route('nkpadmins.nkpkhachhang')->with('error', 'Khách hàng không tồn tại!');
        }
    
        // Trả về view để chỉnh sửa khách hàng
        return view('nkpAdmins.nkpkhachhang.nkp-edit', ['nkpkhachhang' => $nkpkhachhang]);
    }
    
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
        $nkpkhachhang = nkp_KHACH_HANG::where('id', $id)->first();
    
        // Kiểm tra nếu khách hàng không tồn tại
        if (!$nkpkhachhang) {
            return redirect()->route('nkpadmins.nkpkhachhang')->with('error', 'Khách hàng không tồn tại!');
        }
    
        // Cập nhật các giá trị từ request
        $nkpkhachhang->nkpMaKhachHang = $request->nkpMaKhachHang;
        $nkpkhachhang->nkpHoTenKhachHang = $request->nkpHoTenKhachHang;
        $nkpkhachhang->nkpEmail = $request->nkpEmail;
        $nkpkhachhang->nkpMatKhau = $request->nkpMatKhau;
        $nkpkhachhang->nkpDienThoai = $request->nkpDienThoai;
        $nkpkhachhang->nkpDiaChi = $request->nkpDiaChi;
        $nkpkhachhang->nkpNgayDangKy = $request->nkpNgayDangKy;
        $nkpkhachhang->nkpTrangThai = $request->nkpTrangThai;
    
        // Lưu khách hàng đã cập nhật
        $nkpkhachhang->save();
    
        // Chuyển hướng đến danh sách khách hàng
        return redirect()->route('nkpadmins.nkpkhachhang')->with('success', 'Cập nhật khách hàng thành công!');
    }
    
    //delete
    public function nkpDelete($id)
    {
        nkp_KHACH_HANG::where('id',$id)->delete();
        return back()->with('khachhang_deleted','Đã xóa Khách hàng thành công!');
    }

}