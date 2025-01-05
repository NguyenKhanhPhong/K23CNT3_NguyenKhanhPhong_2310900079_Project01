<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nkp_HOA_DON; 
use App\Models\nkp_KHACH_HANG; 
use App\Models\nkp_SAN_PHAM; 
class nkp_HOA_DONController extends Controller
{
    //
    public function show($hoaDonId,$sanPhamId)
    {
        // Lấy hóa đơn từ ID
        $hoaDon = nkp_HOA_DON::findOrFail($hoaDonId);
        $sanPham = nkp_SAN_PHAM::findOrFail($sanPhamId);

        // Trả về view để hiển thị thông tin hóa đơn
        return view('nkpuser.hoadonshow', compact('hoaDon','sanPham'));
    }


      //admin CRUD
    // list -----------------------------------------------------------------------------------------------------------------------------------------
    public function nkpList()
    {
        $nkphoadons = nkp_HOA_DON::all();
        return view('nkpAdmins.nkphoadon.nkp-list',['nkphoadons'=>$nkphoadons]);
    }
    // detail -----------------------------------------------------------------------------------------------------------------------------------------
    public function nkpDetail($id)
    {
        // Tìm sản phẩm theo ID
        $nkphoadon = nkp_HOA_DON::where('id', $id)->first();

        // Trả về view và truyền thông tin sản phẩm
        return view('nkpAdmins.nkphoadon.nkp-detail', ['nkphoadon' => $nkphoadon]);
    }
    // create
    public function nkpCreate()
    {
        $nkpkhachhang = nkp_KHACH_HANG::all();
        return view('nkpAdmins.nkphoadon.nkp-create',['nkpkhachhang'=>$nkpkhachhang]);
    }
    //post
    public function nkpCreateSubmit(Request $request)
    {
        // Xác thực dữ liệu yêu cầu dựa trên các quy tắc xác thực
        $validate = $request->validate([
            'nkpMaHoaDon' => 'required|unique:nkp_hoa_don,nkpMaHoaDon',
            'nkpMaKhachHang' => 'required|exists:nkp_khach_hang,id',
            'nkpNgayHoaDon' => 'required|date',  
            'nkpNgayNhan' => 'required|date',
            'nkpHoTenKhachHang' => 'required|string',  
            'nkpEmail' => 'required|email',
            'nkpDienThoai' => 'required|numeric',  
            'nkpDiaChi' => 'required|string',  
            'nkpTongGiaTri' => 'required|numeric',  // Đã thay đổi thành numeric (cho kiểu double)
            'nkpTrangThai' => 'required|in:0,1,2',
        ]);
    
        // Tạo một bản ghi hóa đơn mới
        $nkphoadon = new nkp_HOA_DON;
    
        // Gán dữ liệu xác thực vào các thuộc tính của mô hình
        $nkphoadon->nkpMaHoaDon = $request->nkpMaHoaDon;
        $nkphoadon->nkpMaKhachHang = $request->nkpMaKhachHang;  // Giả sử đây là khóa ngoại
        $nkphoadon->nkpHoTenKhachHang = $request->nkpHoTenKhachHang;
        $nkphoadon->nkpEmail = $request->nkpEmail;
        $nkphoadon->nkpDienThoai = $request->nkpDienThoai;
        $nkphoadon->nkpDiaChi = $request->nkpDiaChi;
        
        // Lưu 'nkpTongGiaTri' dưới dạng float (hoặc double) để phù hợp với kiểu dữ liệu trong cơ sở dữ liệu
        $nkphoadon->nkpTongGiaTri = (double) $request->nkpTongGiaTri; // Chuyển đổi sang double
        
        $nkphoadon->nkpTrangThai = $request->nkpTrangThai;
    
        // Đảm bảo định dạng đúng cho các trường ngày
        $nkphoadon->nkpNgayHoaDon = $request->nkpNgayHoaDon;
        $nkphoadon->nkpNgayNhan = $request->nkpNgayNhan;
    
        // Lưu bản ghi mới vào cơ sở dữ liệu
        $nkphoadon->save();
    
        // Chuyển hướng đến danh sách hóa đơn
        return redirect()->route('nkpadmins.nkphoadon');
    }
    


    public function nkpEdit($id)
    {
        $nkphoadon = nkp_HOA_DON::where('id', $id)->first();
        $nkpkhachhang = nkp_KHACH_HANG::all();
        return view('nkpAdmins.nkphoadon.nkp-edit',['nkpkhachhang'=>$nkpkhachhang,'nkphoadon'=>$nkphoadon]);
    }
    //post
    public function nkpEditSubmit(Request $request,$id)
    {
        // Xác thực dữ liệu yêu cầu dựa trên các quy tắc xác thực
        $validate = $request->validate([
            'nkpMaHoaDon' => 'required|unique:nkp_hoa_don,nkpMaHoaDon,'. $id,
            'nkpMaKhachHang' => 'required|exists:nkp_khach_hang,id',
            'nkpNgayHoaDon' => 'required|date',  
            'nkpNgayNhan' => 'required|date',
            'nkpHoTenKhachHang' => 'required|string',  
            'nkpEmail' => 'required|email',
            'nkpDienThoai' => 'required|numeric',  
            'nkpDiaChi' => 'required|string',  
            'nkpTongGiaTri' => 'required|numeric', 
            'nkpTrangThai' => 'required|in:0,1,2',
        ]);
    
        $nkphoadon = nkp_HOA_DON::where('id', $id)->first();
        // Gán dữ liệu xác thực vào các thuộc tính của mô hình
        $nkphoadon->nkpMaHoaDon = $request->nkpMaHoaDon;
        $nkphoadon->nkpMaKhachHang = $request->nkpMaKhachHang;  // Giả sử đây là khóa ngoại
        $nkphoadon->nkpHoTenKhachHang = $request->nkpHoTenKhachHang;
        $nkphoadon->nkpEmail = $request->nkpEmail;
        $nkphoadon->nkpDienThoai = $request->nkpDienThoai;
        $nkphoadon->nkpDiaChi = $request->nkpDiaChi;
        
        // Lưu 'nkpTongGiaTri' dưới dạng float (hoặc double) để phù hợp với kiểu dữ liệu trong cơ sở dữ liệu
        $nkphoadon->nkpTongGiaTri = (double) $request->nkpTongGiaTri; // Chuyển đổi sang double
        
        $nkphoadon->nkpTrangThai = $request->nkpTrangThai;
    
        // Đảm bảo định dạng đúng cho các trường ngày
        $nkphoadon->nkpNgayHoaDon = $request->nkpNgayHoaDon;
        $nkphoadon->nkpNgayNhan = $request->nkpNgayNhan;
    
        // Lưu bản ghi mới vào cơ sở dữ liệu
        $nkphoadon->save();
    
        // Chuyển hướng đến danh sách hóa đơn
        return redirect()->route('nkpadmins.nkphoadon');
    }
    
        //delete
        public function nkpDelete($id)
        {
            nkp_HOA_DON::where('id',$id)->delete();
            return back()->with('hoadon_deleted','Đã xóa Khách hàng thành công!');
        }
}