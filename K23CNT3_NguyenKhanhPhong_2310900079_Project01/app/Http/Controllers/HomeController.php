<?php

namespace App\Http\Controllers;

use App\Models\nkp_SAN_PHAM;
use App\Models\nkp_HOA_DON;
use App\Models\nkp_CT_HOA_DON;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    // Giỏ hàng
    public function giohang()
    {
        
        // Lấy giỏ hàng từ session
        $cart = Session::get('cart', []);
        
        // Số lượng sản phẩm trong giỏ hàng
        $cartCount = count($cart);

        // Trả về view với số lượng giỏ hàng
        return view('_layouts.frontend._headerTitle1', compact('cartCount'));
    }


    // Trang chủ - hiển thị tất cả sản phẩm
    public function index()
    {
        // Lấy tất cả sản phẩm với phân trang, 6 sản phẩm mỗi trang
        $sanPhams = nkp_SAN_PHAM::paginate(6);  // Sử dụng paginate() để phân trang
    
        // Trả về view và truyền dữ liệu sản phẩm vào
        return view('nkpuser.home', compact('sanPhams'));
    }
    
    public function index1()
    {
        // Lấy tất cả sản phẩm với phân trang, 6 sản phẩm mỗi trang
        $sanPhams = nkp_SAN_PHAM::paginate(6);  // Sử dụng paginate() để phân trang
        
        // Trả về view và truyền dữ liệu sản phẩm vào
        return view('nkpuser.home1', compact('sanPhams'));
    }
    

    // Hiển thị chi tiết sản phẩm
    public function show($id)
    {
        // Lấy sản phẩm theo id
        $sanPham = nkp_SAN_PHAM::findOrFail($id); 
        
        // Trả về view chi tiết sản phẩm
        return view('nkpuser.show', compact('sanPham')); 
    }






 


} 