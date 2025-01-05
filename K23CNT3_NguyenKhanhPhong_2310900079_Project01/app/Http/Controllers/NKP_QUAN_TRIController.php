<?php

namespace App\Http\Controllers;

use App\Models\nkp_QUAN_TRI; // Thêm dòng này để sử dụng Model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session; // Thêm dòng này để sử dụng session

class nkp_QUAN_TRIController extends Controller
{
    // GET login (authentication)
    public function nkpLogin()
    {
        return view('nkpAdmins.nkp-login');
    }

    // POST login (authentication)
    public function nkpLoginSubmit(Request $request)
    {
        // Validate tài khoản và mật khẩu
        $request->validate([
            'nkpTaiKhoan' => 'required|string',
            'nkpMatKhau' => 'required|string',
        ]);

        // Tìm người dùng trong bảng nkp_QUAN_TRI
        $user = nkp_QUAN_TRI::where('nkpTaiKhoan', $request->nkpTaiKhoan)->first();

        // Kiểm tra nếu người dùng tồn tại và mật khẩu đúng
        if ($user && Hash::check($request->nkpMatKhau, $user->nkpMatKhau)) {
            // Đăng nhập thành công
            Auth::loginUsingId($user->id);

            // Lưu tên tài khoản vào session
            Session::put('username', $user->nkpTaiKhoan);

            // Chuyển hướng về trang admin với thông báo thành công
            return redirect('/nkp-admins')->with('message', 'Đăng Nhập Thành Công');
        } else {
            // Thông báo lỗi nếu tài khoản hoặc mật khẩu sai
            return redirect()->back()->withErrors(['nkpMatKhau' => 'Tài khoản hoặc mật khẩu không đúng']);
        }
    }

    public function nkplist()
{
    $nkpquantris = nkp_QUAN_TRI::all(); // Lấy tất cả quản trị viên
    return view('nkpAdmins.nkpquantri.nkp-list', ['nkpquantris'=>$nkpquantris]);
}

public function nkpDetail($id)
    {
        $nkpquantri = nkp_QUAN_TRI::where('id', $id)->first();
        return view('nkpAdmins.nkpquantri.nkp-detail',['nkpquantri'=>$nkpquantri]);

    }

    //create
    // GET: Hiển thị form thêm mới quản trị viên
public function nkpCreate()
{
    return view('nkpAdmins.nkpquantri.nkp-create');
}

// POST: Xử lý form thêm mới quản trị viên
public function nkpCreateSubmit(Request $request)
{
    // Xác thực dữ liệu
    $request->validate([
        'nkpTaiKhoan' => 'required|string|unique:nkp_quan_tri,nkpTaiKhoan',
        'nkpMatKhau' => 'required|string|min:6',
        'nkpTrangThai' => 'required|in:0,1', 
    ]);

    // Tạo bản ghi mới trong cơ sở dữ liệu
    $nkpquantri = new nkp_QUAN_TRI();
    $nkpquantri->nkpTaiKhoan = $request->nkpTaiKhoan;
    $nkpquantri->nkpMatKhau = Hash::make($request->nkpMatKhau); // Mã hóa mật khẩu
    $nkpquantri->nkpTrangThai = $request->nkpTrangThai;
    $nkpquantri->save();

    // Chuyển hướng về trang danh sách với thông báo thành công
    return redirect()->route('nkpadmins.nkpquantri')->with('success', 'Thêm quản trị viên thành công');
}

// edit
// GET: Hiển thị form chỉnh sửa quản trị viên
public function nkpEdit($id)
{
    $nkpquantri = nkp_QUAN_TRI::find($id); // Lấy thông tin quản trị viên cần chỉnh sửa
    if (!$nkpquantri) {
        return redirect()->route('nkpadmins.nkpquantri')->with('error', 'Không tìm thấy quản trị viên!');
    }
    return view('nkpAdmins.nkpquantri.nkp-edit', ['nkpquantri'=>$nkpquantri]);
}

// POST: Xử lý form chỉnh sửa quản trị viên
public function nkpEditSubmit(Request $request, $id)
{
    // Xác thực dữ liệu
    $request->validate([
        'nkpTaiKhoan' => 'required|string|unique:nkp_quan_tri,nkpTaiKhoan,' . $id,
        'nkpMatKhau' => 'nullable|string|min:6', // Cho phép mật khẩu trống
        'nkpTrangThai' => 'required|in:0,1',
    ]);

    // Lấy quản trị viên cần sửa
    $nkpquantri = nkp_QUAN_TRI::find($id);
    if (!$nkpquantri) {
        return redirect()->route('nkpadmins.nkpquantri')->with('error', 'Không tìm thấy quản trị viên!');
    }

    // Cập nhật thông tin
    $nkpquantri->nkpTaiKhoan = $request->nkpTaiKhoan;
    if ($request->nkpMatKhau) {
        $nkpquantri->nkpMatKhau = Hash::make($request->nkpMatKhau); // Cập nhật mật khẩu nếu có
    }
    $nkpquantri->nkpTrangThai = $request->nkpTrangThai;
    $nkpquantri->save();

    return redirect()->route('nkpadmins.nkpquantri')->with('success', 'Cập nhật quản trị viên thành công');
}

// delete
public function nkpDelete($id)
{
    $nkpquantri = nkp_QUAN_TRI::find($id); // Tìm quản trị viên cần xóa
    if (!$nkpquantri) {
        return redirect()->route('nkpadmins.nkpquantri')->with('error', 'Không tìm thấy quản trị viên!');
    }
    $nkpquantri->delete(); // Xóa bản ghi

    return redirect()->route('nkpadmins.nkpquantri')->with('success', 'Xóa quản trị viên thành công');
}



}