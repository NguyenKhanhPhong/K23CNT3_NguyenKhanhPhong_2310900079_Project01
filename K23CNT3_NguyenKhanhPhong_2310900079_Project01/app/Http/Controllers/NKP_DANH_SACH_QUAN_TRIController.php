<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\nkp_SAN_PHAM; 
use App\Models\nkp_KHACH_HANG; 
use App\Models\nkp_TIN_TUC; 
class nkp_DANH_SACH_QUAN_TRIController extends Controller
{
    //
        // Danh mục
        public function danhmuc()
        {
            // Truy vấn số lượng sản phẩm
            $productCount = nkp_SAN_PHAM::count();
        
            // Truy vấn số lượng người dùng
            $userCount = nkp_KHACH_HANG::count();
            $ttCount = nkp_TIN_TUC::count();

        
            // Trả về view và truyền cả productCount và userCount
            return view('nkpAdmins.nkpdanhsachquantri.nkpdanhmuc', compact('productCount', 'userCount','ttCount'));
        }

        public function nguoidung()
        {
            $nkpnguoidung = nkp_KHACH_HANG::all();
        
            // Chuyển đổi nkpNgayDangKy thành đối tượng Carbon thủ công
            foreach ($nkpnguoidung as $user) {
                // Chuyển đổi ngày tháng thành đối tượng Carbon nếu chưa phải là Carbon
                $user->nkpNgayDangKy = Carbon::parse($user->nkpNgayDangKy);
            }
        
            return view('nkpAdmins.nkpdanhsachquantri.nkpdanhmuc.nkpnguoidung', ['nkpnguoidung' => $nkpnguoidung]);
        }
        

        public function tintuc()
        {
            // Retrieve all news articles from the database (assuming you have a model named nkp_TIN_TUC)
            $nkptintucs = nkp_TIN_TUC::all();  // Fetching all articles
        
            // Loop through articles and add the full URL to the image
            foreach ($nkptintucs as $article) {
                // Assuming nkpHinhAnh stores the image name, we'll prepend the 'public/storage' path
                $article->image_url = asset('storage/' . $article->nkpHinhAnh);
            }
        
            // Return the view and pass the articles to it
            return view('nkpAdmins.nkpdanhsachquantri.nkpdanhmuc.nkptintuc', [
                'nkptintucs' => $nkptintucs, // Passing the news articles to the view
            ]);
        }
        
    

    // Hiển thị danh sách sản phẩm
    public function sanpham()
    {
        $nkpsanphams = nkp_SAN_PHAM::all(); // Lấy tất cả sản phẩm
        return view('nkpAdmins.nkpdanhsachquantri.nkpdanhmuc.nkpsanpham', ['nkpsanphams' => $nkpsanphams]);
    }

    // Hiển thị mô tả chi tiết sản phẩm
    public function mota($id)
    {
        // Lấy sản phẩm theo id
        $product = nkp_SAN_PHAM::find($id);
        
        // Kiểm tra nếu sản phẩm không tồn tại
        if (!$product) {
            return redirect()->route('nkpAdmins.nkpdanhsachquantri.danhmuc.sanpham')
                             ->with('error', 'Sản phẩm không tồn tại.');
        }

        // Trả về view với thông tin sản phẩm
        return view('nkpAdmins.nkpdanhsachquantri.nkpdanhmuc.nkpmota', ['product' => $product]);
    }
}