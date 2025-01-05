<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nkp_KHACH_HANG;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class nkp_LOGIN_USERController extends Controller
{
    // Show login form
    public function nkpLogin()
    {
        return view('nkpuser.login');
    }

    // Handle login form submission
   // Handle login form submission
public function nkpLoginSubmit(Request $request)
{
    // Validate the input data
    $request->validate([
        'nkpEmail' => 'required|email',
        'nkpMatKhau' => 'required|string',
    ]);

    // Tìm người dùng theo email
    $user = nkp_KHACH_HANG::where('nkpEmail', $request->nkpEmail)->first();

    // Xóa giỏ hàng trong session khi đăng nhập
    Session::forget('cart');

    // Kiểm tra nếu người dùng tồn tại và mật khẩu đúng
    if ($user && Hash::check($request->nkpMatKhau, $user->nkpMatKhau)) {
        
        // Kiểm tra trạng thái tài khoản
        if ($user->nkpTrangThai == 2) {
            // Tài khoản bị khóa
            return redirect()->back()->withErrors(['nkpEmail' => 'Tài khoản của bạn đã bị khóa.']);
        } elseif ($user->nkpTrangThai == 1) {
            // Tài khoản bị tạm khóa
            return redirect()->back()->withErrors(['nkpEmail' => 'Tài khoản của bạn đã bị tạm khóa.']);
        }

        // Đăng nhập người dùng
        Auth::login($user);

        // Lưu thông tin người dùng vào session
        Session::put('user_id', $user->id);
        Session::put('username1', $user->nkpHoTenKhachHang);  // Lưu tên người dùng
        Session::put('nkpEmail', $user->nkpEmail);  // Lưu email
        Session::put('nkpDienThoai', $user->nkpDienThoai);  // Lưu số điện thoại
        Session::put('nkpDiaChi', $user->nkpDiaChi);  // Lưu địa chỉ
        Session::put('nkpMaKhachHang', $user->nkpMaKhachHang);  // Lưu mã khách hàng

        // Lưu trữ các thông tin cần thiết vào session

        // Chuyển hướng người dùng tới trang chủ sau khi đăng nhập thành công
        return redirect()->route('nkpuser.home1')->with('message', 'Đăng Nhập Thành Công');
    } else {
        // Nếu thông tin không chính xác, trả về lỗi
        return redirect()->back()->withErrors(['nkpEmail' => 'Email hoặc Mật khẩu không đúng']);
    }
}


    public function logout()
{
    // Xóa giỏ hàng trong session khi người dùng đăng xuất
    Session::forget('cart');

    // Tiến hành đăng xuất
}

    

}