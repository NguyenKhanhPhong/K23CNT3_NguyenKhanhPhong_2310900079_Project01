<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nkp_CT_HOA_DON; 
use App\Models\nkp_SAN_PHAM; 
use App\Models\nkp_HOA_DON; 
use App\Models\nkp_KHACH_HANG; 
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class nkp_CT_HOA_DONController extends Controller
{
   //create hoadon user

  // Controller
public function show($sanPhamId)
{
    $sanPham = nkp_SAN_PHAM::find($sanPhamId);

    // Lấy Mã Khách Hàng từ session
    $userId = Session::get('nkpMaKhachHang');

    // Kiểm tra khách hàng tồn tại trong hệ thống
    $khachHang = nkp_KHACH_HANG::find($userId);

    // Truyền thông tin qua view
    return view('nkpuser.hoadon', [
        'sanPham' => $sanPham,
        'khachHang' => $khachHang, // Truyền thông tin khách hàng vào view
    ]);
}
  

  
  


   /**
    * Xử lý khi người dùng nhấn "Mua", tạo hóa đơn tự động.
    */
    public function store(Request $request)
    {
        // Lấy Mã Khách Hàng từ session
        $userId = Session::get('nkpMaKhachHang'); // Lấy ID khách hàng từ session
    
        // Kiểm tra nếu không có khách hàng trong session
        if (!$userId) {
            return redirect()->route('nkpuser.login')->with('error', 'Vui lòng đăng nhập để tiếp tục!');
        }
    
        // Kiểm tra khách hàng tồn tại trong bảng nkp_KHACH_HANG
        $khachhang = nkp_KHACH_HANG::find($userId);
        if (!$khachhang) {
            return redirect()->route('nkpuser.login')->with('error', 'Khách hàng không tồn tại.');
        }
    
        // Lấy thông tin sản phẩm từ bảng nkp_SAN_PHAM
        $sanPham = nkp_SAN_PHAM::find($request->nkpSanPhamId);
        if (!$sanPham) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
        }
    
        // Tạo mã hóa đơn tự động (nkpMaHoaDon)
        $nkpMaHoaDon = 'HD' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT); // Tạo mã hóa đơn ngẫu nhiên
    
        // Tạo hóa đơn mới với thông tin lấy từ khách hàng
        $hoaDon = nkp_HOA_DON::create([
            'nkpMaHoaDon' => $nkpMaHoaDon,
            'nkpMaKhachHang' => $khachhang->id,  // Sử dụng ID của khách hàng từ bảng nkp_KHACH_HANG
            'nkpNgayHoaDon' => Carbon::now()->toDateString(),
            'nkpNgayNhan' => Carbon::now()->addDays(3)->toDateString(),
            'nkpHoTenKhachHang' => $request->nkpHoTenKhachHang,
            'nkpEmail' => $request->nkpEmail,
            'nkpDienThoai' => $request->nkpDienThoai,
            'nkpDiaChi' => $request->nkpDiaChi,
            'nkpTongGiaTri' => $sanPham->nkpDonGia * $request->nkpSoLuong, // Tính tổng giá trị
            'nkpTrangThai' => 0, // 0 nghĩa là chưa thanh toán
        ]);
     
        // Quay lại trang chi tiết hóa đơn vừa tạo
        return redirect()->route('hoadon.show', ['hoaDonId' => $hoaDon->id, 'sanPhamId' => $sanPham->id]);
    }
    
    
    

// xem cthoadon
public function create($hoaDonId, $sanPhamId)
{
    // Lấy thông tin hóa đơn và sản phẩm
    $hoaDon = nkp_HOA_DON::find($hoaDonId);
    $sanPham = nkp_SAN_PHAM::find($sanPhamId);

    // Kiểm tra nếu hóa đơn hoặc sản phẩm không tồn tại
    if (!$hoaDon || !$sanPham) {
        return redirect()->route('hoadon.index')->with('error', 'Hóa đơn hoặc sản phẩm không tồn tại.');
    }
 // Lấy số lượng từ request
 $soLuong = request('nkpSoLuong', 1); // Số lượng mặc định là 1 nếu không có giá trị
    // Truyền dữ liệu vào view
    return view('nkpuser.cthoadon', [
        'hoaDon' => $hoaDon,
        'sanPham' => $sanPham,
        'soLuong' => $soLuong // Truyền số lượng vào view
    ]);
}


public function cthoadonshow($hoaDonId, $sanPhamId)
{
    // Lấy hóa đơn từ ID
    $hoaDon = nkp_HOA_DON::findOrFail($hoaDonId);

    // Lấy chi tiết hóa đơn từ ID
    $chiTietHoaDon = nkp_HOA_DON::where('nkpHoaDonID', $hoaDonId)
                                    ->where('nkpSanPhamID', $sanPhamId)
                                    ->firstOrFail();

    // Trả về view và truyền dữ liệu
    return view('nkpuser.cthoadonshow', compact('hoaDon', 'chiTietHoaDon'));
}





    public function storecthoadon(Request $request)
    {
        // Validate các dữ liệu yêu cầu
        $validated = $request->validate([
            'nkpSanPhamID' => 'required|exists:nkp_SAN_PHAM,id',
            'nkpHoaDonID' => 'required|exists:nkp_HOA_DON,id',
            'nkpSoLuong' => 'required|integer|min:1',
        ]);
    
        // Lấy thông tin sản phẩm và hóa đơn
        $sanPham = nkp_SAN_PHAM::find($request->nkpSanPhamID);
        $hoaDon = nkp_HOA_DON::find($request->nkpHoaDonID);
    
        // Kiểm tra xem sản phẩm và hóa đơn có tồn tại không
        if (!$sanPham || !$hoaDon) {
            return redirect()->back()->with('error', 'Sản phẩm hoặc hóa đơn không tồn tại.');
        }
    
        // Kiểm tra xem chi tiết hóa đơn đã tồn tại chưa
        $chiTietHoaDon = nkp_CT_HOA_DON::where('nkpHoaDonID', $hoaDon->id)
                                        ->where('nkpSanPhamID', $sanPham->id)
                                        ->first();
    
        // Nếu chi tiết hóa đơn đã tồn tại, cập nhật số lượng và tính lại thành tiền
        if ($chiTietHoaDon) {
            // Cập nhật số lượng và tính lại tổng thành tiền
            $chiTietHoaDon->nkpSoLuongMua += $request->nkpSoLuong;  // Tăng số lượng
            $chiTietHoaDon->nkpThanhTien = $chiTietHoaDon->nkpSoLuongMua * $sanPham->nkpDonGia; // Tính lại thành tiền
            $chiTietHoaDon->save(); // Lưu cập nhật
        } else {
            // Nếu không tồn tại chi tiết hóa đơn, tạo mới chi tiết hóa đơn
            $nkpThanhTien = $request->nkpSoLuong * $sanPham->nkpDonGia;
    
            nkp_CT_HOA_DON::create([
                'nkpHoaDonID' => $hoaDon->id, // ID hóa đơn
                'nkpSanPhamID' => $sanPham->id, // ID sản phẩm
                'nkpSoLuongMua' => $request->nkpSoLuong, // Số lượng mua
                'nkpDonGiaMua' => $sanPham->nkpDonGia, // Đơn giá của sản phẩm
                'nkpThanhTien' => $nkpThanhTien, // Tổng thành tiền
                'nkpTrangThai' => 1,  // Trạng thái đơn hàng đã xác nhận
            ]);
        }
    
        // Quay lại trang chi tiết hóa đơn vừa tạo
        return redirect()->route('cthoadon.cthoadonshow', ['hoaDonId' => $hoaDon->id, 'sanPhamId' => $sanPham->id]);
    }
    


    
    
    

    
  // thanh toán
 // Hiển thị sản phẩm khi nhấn vào "Mua"
 public function nkpthanhtoan($product_id)
 {
     // Lấy sản phẩm theo ID sử dụng model
     $sanPham = nkp_SAN_PHAM::find($product_id);

     // Kiểm tra nếu không có sản phẩm
     if (!$sanPham) {
         abort(404, 'Sản phẩm không tồn tại');
     }

     // Trả về view với thông tin sản phẩm
     return view('nkpuser.thanhtoan', compact('sanPham'));
 }

 // Lưu thông tin thanh toán (chỉ cần lưu vào bảng thanh toán nếu cần, ở đây ta không tạo bảng ThanhToan)
 public function storeThanhtoan(Request $request)
 {
     // Lấy thông tin sản phẩm từ model SanPham
     $sanPham = nkp_SAN_PHAM::find($request->product_id);

     // Kiểm tra nếu không có sản phẩm
     if (!$sanPham) {
         return redirect()->route('home')->with('error', 'Sản phẩm không tồn tại');
     }

     // Tính tổng tiền thanh toán
     $tongTien = $request->nkpSoLuong * $sanPham->nkpDonGia;

     // Nếu muốn lưu vào bảng thanh toán, bạn có thể thêm logic ở đây.
     // Nhưng ở đây chỉ cần hiển thị thông tin và tính tổng tiền.

     return view('nkpuser.thanhtoan', [
         'sanPham' => $sanPham,
         'nkpSoLuong' => $request->nkpSoLuong,
         'tongTien' => $tongTien
     ]);
 }

      //admin CRUD
    // list -----------------------------------------------------------------------------------------------------------------------------------------
    public function nkpList()
    {
        $nkpcthoadons = nkp_CT_HOA_DON::all();
        return view('nkpAdmins.nkpcthoadon.nkp-list',['nkpcthoadons'=>$nkpcthoadons]);
    }
    // detail -----------------------------------------------------------------------------------------------------------------------------------------
    public function nkpDetail($id)
    {
        // Tìm sản phẩm theo ID
        $nkpcthoadon = nkp_CT_HOA_DON::where('id', $id)->first();

        // Trả về view và truyền thông tin sản phẩm
        return view('nkpAdmins.nkpcthoadon.nkp-detail', ['nkpcthoadon' => $nkpcthoadon]);
    }

     // create-----------------------------------------------------------------------------------------------------------------------------------------
     public function nkpCreate()
     {
         $nkphoadon = nkp_HOA_DON::all();
         $nkpsanpham = nkp_SAN_PHAM::all();
         return view('nkpAdmins.nkpcthoadon.nkp-create',['nkphoadon'=>$nkphoadon,'nkpsanpham'=>$nkpsanpham]);
     }
     //post-----------------------------------------------------------------------------------------------------------------------------------------
     public function nkpCreateSubmit(Request $request)
     {
         // Xác thực dữ liệu yêu cầu dựa trên các quy tắc xác thực
         $validate = $request->validate([
             'nkpHoaDonID' => 'required|exists:nkp_hoa_don,id',
             'nkpSanPhamID' => 'required|exists:nkp_san_pham,id',
             'nkpSoLuongMua' => 'required|numeric',  
             'nkpDonGiaMua' => 'required|numeric',
             'nkpThanhTien' => 'required|numeric',  
             'nkpTrangThai' => 'required|in:0,1,2',
         ]);
     
         // Tạo một bản ghi hóa đơn mới
         $nkpcthoadon = new nkp_CT_HOA_DON;
     
         // Gán dữ liệu xác thực vào các thuộc tính của mô hình
         $nkpcthoadon->nkpHoaDonID = $request->nkpHoaDonID;
         $nkpcthoadon->nkpSanPhamID = $request->nkpSanPhamID;  
         $nkpcthoadon->nkpSoLuongMua = $request->nkpSoLuongMua;
         $nkpcthoadon->nkpDonGiaMua = $request->nkpDonGiaMua;
         $nkpcthoadon->nkpThanhTien = $request->nkpThanhTien;
         $nkpcthoadon->nkpTrangThai = $request->nkpTrangThai;
     
        
     
         // Lưu bản ghi mới vào cơ sở dữ liệu
         $nkpcthoadon->save();
     
         // Chuyển hướng đến danh sách hóa đơn
         return redirect()->route('nkpadmins.nkpcthoadon');
     }

      // edit-----------------------------------------------------------------------------------------------------------------------------------------
      public function nkpEdit($id)
{
    $nkphoadon = nkp_HOA_DON::all(); // Lấy tất cả các hóa đơn
    $nkpsanpham = nkp_SAN_PHAM::all(); // Lấy tất cả các sản phẩm

    // Lấy chi tiết hóa đơn cần chỉnh sửa
    $nkpcthoadon = nkp_CT_HOA_DON::where('id', $id)->first();

    if (!$nkpcthoadon) {
        // Nếu không tìm thấy chi tiết hóa đơn, chuyển hướng với thông báo lỗi
        return redirect()->route('nkpadmins.nkpcthoadon')->with('error', 'Không tìm thấy chi tiết hóa đơn!');
    }

    // Trả về view với dữ liệu
    return view('nkpAdmins.nkpcthoadon.nkp-edit', [
        'nkphoadon' => $nkphoadon,
        'nkpsanpham' => $nkpsanpham,
        'nkpcthoadon' => $nkpcthoadon
    ]);
}

      //post-----------------------------------------------------------------------------------------------------------------------------------------
      public function nkpEditSubmit(Request $request,$id)
      {
          // Xác thực dữ liệu yêu cầu dựa trên các quy tắc xác thực
          $validate = $request->validate([
              'nkpHoaDonID' => 'required|exists:nkp_hoa_don,id',
              'nkpSanPhamID' => 'required|exists:nkp_san_pham,id',
              'nkpSoLuongMua' => 'required|numeric',  
              'nkpDonGiaMua' => 'required|numeric',
              'nkpThanhTien' => 'required|numeric',  
              'nkpTrangThai' => 'required|in:0,1,2',
          ]);
         
      
          // Tạo một bản ghi hóa đơn mới
          $nkpcthoadon = nkp_CT_HOA_DON::where('id', $id)->first();
      
          // Gán dữ liệu xác thực vào các thuộc tính của mô hình
          $nkpcthoadon->nkpHoaDonID = $request->nkpHoaDonID;
          $nkpcthoadon->nkpSanPhamID = $request->nkpSanPhamID;  
          $nkpcthoadon->nkpSoLuongMua = $request->nkpSoLuongMua;
          $nkpcthoadon->nkpDonGiaMua = $request->nkpDonGiaMua;
          $nkpcthoadon->nkpThanhTien = $request->nkpThanhTien;
          $nkpcthoadon->nkpTrangThai = $request->nkpTrangThai;
      
         
      
          // Lưu bản ghi mới vào cơ sở dữ liệu
          $nkpcthoadon->save();
      
          // Chuyển hướng đến danh sách hóa đơn
          return redirect()->route('nkpadmins.nkpcthoadon');
      }

        //delete
        public function nkpDelete($id)
        {
            nkp_CT_HOA_DON::where('id',$id)->delete();
            return back()->with('cthoadon_deleted','Đã xóa Khách hàng thành công!');
        }
     
}