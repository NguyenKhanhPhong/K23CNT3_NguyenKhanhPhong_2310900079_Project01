<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nkp_KHACH_HANG;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class nkp_SIGNUPController extends Controller
{
    // Show the form to create a new customer
    public function nkpsignup()
    {
        return view('nkpuser.signup');
    }

    // Handle the form submission and store customer data
    public function nkpsignupSubmit(Request $request)
    {
        // Validate the input data
        $request->validate([
            'nkpHoTenKhachHang' => 'required|string|max:255',
            'nkpEmail' => 'required|email|unique:nkp_khach_hang,nkpEmail',
            'nkpMatKhau' => 'required|min:6',
            'nkpDienThoai' => 'required|numeric|unique:nkp_khach_hang,nkpDienThoai',
            'nkpDiaChi' => 'required|string|max:255',
        ]);

        // Generate a new customer ID (nkpMaKhachHang)
        $lastCustomer = nkp_KHACH_HANG::latest('nkpMaKhachHang')->first(); // Get the latest customer to determine the next ID
    
        // If no customers exist, start with KH001
        if ($lastCustomer) {
            $newCustomerID = 'KH' . str_pad((substr($lastCustomer->nkpMaKhachHang, 2) + 1), 3, '0', STR_PAD_LEFT);  // e.g., KH001, KH002, etc.
        } else {
            $newCustomerID = 'KH001'; // First customer will be KH001
        }
    
        // Create a new customer record
        $nkpkhachhang = new nkp_KHACH_HANG;
        $nkpkhachhang->nkpMaKhachHang = $newCustomerID; // Automatically generated ID
        $nkpkhachhang->nkpHoTenKhachHang = $request->nkpHoTenKhachHang;
        $nkpkhachhang->nkpEmail = $request->nkpEmail;
        $nkpkhachhang->nkpMatKhau = $request->nkpMatKhau; // Encrypt the password
        $nkpkhachhang->nkpDienThoai = $request->nkpDienThoai;
        $nkpkhachhang->nkpDiaChi = $request->nkpDiaChi;
        $nkpkhachhang->nkpNgayDangKy = now(); // Set the current timestamp for registration date
        $nkpkhachhang->nkpTrangThai = 0; // Set the default value for nkpTrangThai to 0 (inactive or unverified)
    
        // Save the new customer data
        try {
            $nkpkhachhang->save();
            // Redirect to login page on success with a success message
            return redirect()->route('nkpuser.login')->with('success', 'Đăng ký thành công, vui lòng đăng nhập!');
        } catch (\Exception $e) {
            // In case of error, return to the previous page with an error message
            return back()->with('error', 'Có lỗi xảy ra, vui lòng thử lại!');
        }
    }
}