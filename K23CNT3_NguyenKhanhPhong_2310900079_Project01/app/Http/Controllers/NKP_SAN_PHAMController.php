<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nkp_SAN_PHAM; 
use App\Models\nkp_LOAI_SAN_PHAM; // Sử dụng Model User để thao tác với cơ sở dữ liệu
use Illuminate\Support\Facades\Storage;  // Use this for file handling
class nkp_SAN_PHAMController extends Controller
{


    
    // In your controller
    public function search(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ input của người dùng
        $search = $request->input('search');
    
        // Nếu có từ khóa tìm kiếm, lọc sản phẩm theo tên
        if ($search) {
            // Sử dụng where để lọc các sản phẩm có tên giống hoặc chứa từ khóa tìm kiếm
            $products = nkp_SAN_PHAM::where('nkpTenSanPham', 'like', '%' . $search . '%')->paginate(10);
        } else {
            // Nếu không có từ khóa tìm kiếm, hiển thị tất cả sản phẩm
            $products = nkp_SAN_PHAM::paginate(10);
        }
    
        // Trả về view với danh sách sản phẩm và từ khóa tìm kiếm   
        return view('nkpuser.search', compact('products', 'search'));
    }

    public function search1(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ input của người dùng
        $search = $request->input('search');
    
        // Nếu có từ khóa tìm kiếm, lọc sản phẩm theo tên
        if ($search) {
            // Sử dụng where để lọc các sản phẩm có tên giống hoặc chứa từ khóa tìm kiếm
            $products = nkp_SAN_PHAM::where('nkpTenSanPham', 'like', '%' . $search . '%')->paginate(10);
        } else {
            // Nếu không có từ khóa tìm kiếm, hiển thị tất cả sản phẩm
            $products = nkp_SAN_PHAM::paginate(10);
        }
    
        // Trả về view với danh sách sản phẩm và từ khóa tìm kiếm   
        return view('nkpuser.search1', compact('products', 'search'));
    }


    // search sap pham admin
    public function searchAdmins(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ input của người dùng
        $search = $request->input('search');
    
        // Nếu có từ khóa tìm kiếm, lọc sản phẩm theo tên
        if ($search) {
            // Sử dụng where để lọc các sản phẩm có tên giống hoặc chứa từ khóa tìm kiếm
            $products = nkp_SAN_PHAM::where('nkpTenSanPham', 'like', '%' . $search . '%')->paginate(10);
        } else {
            // Nếu không có từ khóa tìm kiếm, hiển thị tất cả sản phẩm
            $products = nkp_SAN_PHAM::paginate(10);
        }
    
        // Trả về view với danh sách sản phẩm và từ khóa tìm kiếm   
        return view('nkpAdmins.nkpsanpham.nkp-search', compact('products', 'search'));
    }

     //admin CRUD
    // list -----------------------------------------------------------------------------------------------------------------------------------------
    public function nkpList()
{


    // Apply pagination and filter by nkpTrangThai
    $nkpsanphams = nkp_SAN_PHAM::where('nkpTrangThai', 0); 
                   // Phân trang kết quả, thay 10 bằng số lượng bạn muốn mỗi trang
     $nkpsanphams = nkp_SAN_PHAM::paginate(5);    
    
    // Pass the paginated products to the view
    return view('nkpAdmins.nkpsanpham.nkp-list', ['nkpsanphams' => $nkpsanphams]);
}

    // detail -----------------------------------------------------------------------------------------------------------------------------------------
    public function nkpDetail($id)
    {
        // Tìm sản phẩm theo ID
        $nkpsanpham = nkp_SAN_PHAM::where('id', $id)->first();

        // Trả về view và truyền thông tin sản phẩm
        return view('nkpAdmins.nkpsanpham.nkp-detail', ['nkpsanpham' => $nkpsanpham]);
    }

      //create  -----------------------------------------------------------------------------------------------------------------------------------------
      public function nkpCreate()
      {
            // đọc dữ liệu từ nkp_LOAI_SAN_PHAM
            $nkploaisanpham = nkp_LOAI_SAN_PHAM::all();
          return view('nkpAdmins.nkpsanpham.nkp-create',['nkploaisanpham'=>$nkploaisanpham]);
      }
     

     // Controller
public function nkpCreateSubmit(Request $request)
{

    // Validate input
    $validatedData = $request->validate([
        'nkpMaSanPham' => 'required|unique:nkp_SAN_PHAM,nkpMaSanPham',
        'nkpTenSanPham' => 'required|string|max:255',
        'nkpHinhAnh' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // Kiểm tra hình ảnh và loại định dạng
        'nkpSoLuong' => 'required|numeric|min:1',
        'nkpDonGia' => 'required|numeric',
        'nkpMaLoai' => 'required|exists:nkp_LOAI_SAN_PHAM,id',
        'nkpTrangThai' => 'required|in:0,1',
    ]);

    // Khởi tạo đối tượng nkp_SAN_PHAM và lưu thông tin vào cơ sở dữ liệu
    $nkpsanpham = new nkp_SAN_PHAM;
    $nkpsanpham->nkpMaSanPham = $request->nkpMaSanPham;
    $nkpsanpham->nkpTenSanPham = $request->nkpTenSanPham;

    // Kiểm tra nếu có tệp hình ảnh
    if ($request->hasFile('nkpHinhAnh')) {
        // Lấy tệp hình ảnh
        $file = $request->file('nkpHinhAnh');

        // Kiểm tra nếu tệp hợp lệ
        if ($file->isValid()) {
            // Tạo tên tệp dựa trên mã sản phẩm
            $fileName = $request->nkpMaSanPham . '.' . $file->extension();

            // Lưu tệp vào thư mục public/img/san_pham
            $file->storeAs('public/img/san_pham', $fileName); // Lưu tệp vào thư mục storage/app/public/img/san_pham

            // Lưu đường dẫn vào cơ sở dữ liệu
            $nkpsanpham->nkpHinhAnh = 'img/san_pham/' . $fileName; // Lưu đường dẫn tương đối trong CSDL
        }
    }

    // Lưu các thông tin còn lại vào cơ sở dữ liệu
    $nkpsanpham->nkpSoLuong = $request->nkpSoLuong;
    $nkpsanpham->nkpDonGia = $request->nkpDonGia;
    $nkpsanpham->nkpMaLoai = $request->nkpMaLoai;
    $nkpsanpham->nkpTrangThai = $request->nkpTrangThai;

    // Lưu dữ liệu vào cơ sở dữ liệu
    $nkpsanpham->save();

    // Chuyển hướng người dùng về trang danh sách sản phẩm
    return redirect()->route('nkpadims.nkpsanpham');
}

//delete    -----------------------------------------------------------------------------------------------------------------------------------------

public function nkpdelete($id)
{
    nkp_SAN_PHAM::where('id',$id)->delete();
return back()->with('sanpham_deleted','Đã xóa Sản Phẩm thành công!');
}

// edit -----------------------------------------------------------------------------------------------------------------------------------------
public function nkpEdit($id)
    {
       // Tìm sản phẩm theo ID
    $nkpsanpham = nkp_SAN_PHAM::findOrFail($id);

    // Lấy tất cả các loại sản phẩm từ bảng nkp_LOAI_SAN_PHAM
    $nkploaisanpham = nkp_LOAI_SAN_PHAM::all();

    // Trả về view với dữ liệu sản phẩm và loại sản phẩm
    return view('nkpAdmins.nkpsanpham.nkp-edit', [
        'nkpsanpham' => $nkpsanpham,
        'nkploaisanpham' => $nkploaisanpham
    ]);
    }

    // Phương thức xử lý dữ liệu form chỉnh sửa sản phẩm


    public function nkpEditSubmit(Request $request, $id)
{
    // Validate dữ liệu
    $request->validate([
        'nkpMaSanPham' => 'required|max:20',
        'nkpTenSanPham' => 'required|max:255',
        'nkpHinhAnh' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'nkpSoLuong' => 'required|integer',
        'nkpDonGia' => 'required|numeric',
        'nkpMaLoai' => 'required|max:10',
        'nkpTrangThai' => 'required|in:0,1',
    ]);

    // Tìm sản phẩm cần chỉnh sửa
    $nkpsanpham = nkp_SAN_PHAM::findOrFail($id);

    // Cập nhật thông tin sản phẩm
    $nkpsanpham->nkpMaSanPham = $request->nkpMaSanPham;
    $nkpsanpham->nkpTenSanPham = $request->nkpTenSanPham;
    $nkpsanpham->nkpSoLuong = $request->nkpSoLuong;
    $nkpsanpham->nkpDonGia = $request->nkpDonGia;
    $nkpsanpham->nkpMaLoai = $request->nkpMaLoai;
    $nkpsanpham->nkpTrangThai = $request->nkpTrangThai;

    // Kiểm tra nếu có hình ảnh mới
    if ($request->hasFile('nkpHinhAnh')) {
        // Kiểm tra và xóa hình ảnh cũ nếu tồn tại
        if ($nkpsanpham->nkpHinhAnh && Storage::disk('public')->exists('img/san_pham/' . $nkpsanpham->nkpHinhAnh)) {
            // Xóa file cũ nếu tồn tại
            Storage::disk('public')->delete('img/san_pham/' . $nkpsanpham->nkpHinhAnh);
        }
        // Lưu hình ảnh mới
        $imagePath = $request->file('nkpHinhAnh')->store('img/san_pham', 'public');
        $nkpsanpham->nkpHinhAnh = $imagePath;
    }

    // Lưu thông tin sản phẩm đã chỉnh sửa
    $nkpsanpham->save();

    // Redirect về trang danh sách sản phẩm
    return redirect()->route('nkpadims.nkpsanpham')->with('success', 'Sản phẩm đã được cập nhật thành công.');
}

    

}