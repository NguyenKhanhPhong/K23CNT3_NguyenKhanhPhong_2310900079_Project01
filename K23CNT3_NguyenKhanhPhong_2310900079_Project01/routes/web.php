<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\nkp_LOAI_SAN_PHAMController;
use App\Http\Controllers\nkp_SAN_PHAMController;
use App\Http\Controllers\nkp_KHACH_HANGcontroller;
use App\Http\Controllers\nkp_DANH_SACH_QUAN_TRIController;
use App\Http\Controllers\nkp_HOA_DONController;
use App\Http\Controllers\nkp_CT_HOA_DONController;
use App\Http\Controllers\nkp_TIN_TUCController;
use App\Http\Controllers\nkp_LOGIN_USERController;
use App\Http\Controllers\nkp_SIGNUPController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// admins login --------------------------------------------------------------------------------------------------------------------------------------
use App\Http\Controllers\nkp_QUAN_TRIController;
Route::get('/', [nkp_QUAN_TRIController::class, 'nkpLogin'])->name('admins.nkpLogin');
Route::post('/', [nkp_QUAN_TRIController::class, 'nkpLoginSubmit'])->name('admins.nkpLoginSubmit');


#admins - route--------------------------------------------------------------------------------------------------------------------------------------
route::get('/nkp-admins',function(){
    return view('nkpAdmins.index');
});
#admins - danh muc--------------------------------------------------------------------------------------------------------------------------------------
Route::get('/nkp-admins/nkpdanhsachquantri/nkpdanhmuc', [nkp_DANH_SACH_QUAN_TRIController::class, 'danhmuc'])->name('nkpAdmins.nkpdanhsachquantri.danhmuc');
#admins - tin tức --------------------------------------------------------------------------------------------------------------------------------------
Route::get('/nkp-admins/nkpdanhsachquantri/nkptintuc', [nkp_DANH_SACH_QUAN_TRIController::class, 'tintuc'])->name('nkpAdmins.nkpdanhsachquantri..danhmuc.tintuc');
// Sản phẩm--------------------------------------------------------------------------------------------------------------------------------------
Route::get('/nkp-admins/nkpdanhsachquantri/nkpsanpham', [nkp_DANH_SACH_QUAN_TRIController::class, 'sanpham'])->name('nkpAdmins.nkpdanhsachquantri.danhmuc.sanpham');
// Mô tả sản phẩm--------------------------------------------------------------------------------------------------------------------------------------
Route::get('/nkp-admins/nkpdanhsachquantri/nkpmota/{id}', [nkp_DANH_SACH_QUAN_TRIController::class, 'mota'])->name('nkpAdmins.nkpdanhsachquantri.danhmuc.mota');
#admins - nguoidung--------------------------------------------------------------------------------------------------------------------------------------
Route::get('/nkp-admins/nkpdanhsachquantri/nkpnguoidung', [nkp_DANH_SACH_QUAN_TRIController::class, 'nguoidung'])->name('nkpAdmins.nkpdanhsachquantri.nguoidung');

// loai san pham--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/nkp-admins/nkp-loai-san-pham',[nkp_LOAI_SAN_PHAMController::class,'nkpList'])->name('nkpadmins.nkploaisanpham');
//create
Route::get('/nkp-admins/nkp-loai-san-pham/nkp-create',[nkp_LOAI_SAN_PHAMController::class,'nkpCreate'])->name('nkpadmin.nkploaisanpham.nkpcreate');
Route::post('/nkp-admins/nkp-loai-san-pham/nkp-create',[nkp_LOAI_SAN_PHAMController::class,'nkpCreateSunmit'])->name('nkpadmin.nkploaisanpham.nkpCreateSunmit');
// edit
Route::get('/nkp-admins/nkp-loai-san-pham/nkp-edit/{id}',[nkp_LOAI_SAN_PHAMController::class,'nkpEdit'])->name('nkpadmin.nkploaisanpham.nkpEdit');
Route::post('/nkp-admins/nkp-loai-san-pham/nkp-edit',[nkp_LOAI_SAN_PHAMController::class,'nkpEditSubmit'])->name('nkpadmin.nkploaisanpham.nkpEditSubmit');
// detail
Route::get('/nkp-admins/nkp-loai-san-pham/nkp-detail/{id}',[nkp_LOAI_SAN_PHAMController::class,'nkpGetDetail'])->name('nkpadmin.nkploaisanpham.nkpGetDetail');
// delete
Route::get('/nkp-admins/nkp-loai-san-pham/nkp-delete/{id}',[nkp_LOAI_SAN_PHAMController::class,'nkpDelete'])->name('nkpadmin.nkploaisanpham.nkpDelete');

// san pham--------------------------------------------------------------------------------------------------------------------------------------
// search
Route::get('/nkp-admins/nkp-san-pham/search', [nkp_SAN_PHAMController::class, 'searchAdmins'])->name('nkpuser.searchAdmins');
// list

Route::get('/nkp-admins/nkp-san-pham',[nkp_SAN_PHAMController::class,'nkpList'])->name('nkpadims.nkpsanpham');
//create
Route::get('/nkp-admins/nkp-san-pham/nkp-create',[nkp_SAN_PHAMController::class,'nkpCreate'])->name('nkpadmin.nkpsanpham.nkpcreate');
Route::post('/nkp-admins/nkp-san-pham/nkp-create',[nkp_SAN_PHAMController::class,'nkpCreateSubmit'])->name('nkpadmin.nkpsanpham.nkpCreateSubmit');
//detail
Route::get('/nkp-admins/nkp-san-pham/nkp-detail/{id}', [nkp_SAN_PHAMController::class, 'nkpDetail'])->name('nkpadmin.nkpsanpham.nkpDetail');
// edit
Route::get('/nkp-admins/nkp-san-pham/nkp-edit/{id}', [nkp_SAN_PHAMController::class, 'nkpEdit'])->name('nkpadmin.nkpsanpham.nkpedit');

// Xử lý cập nhật sản phẩm
Route::post('/nkp-admins/nkp-san-pham/nkp-edit/{id}', [nkp_SAN_PHAMController::class, 'nkpEditSubmit'])->name('nkpadmin.nkpsanpham.nkpEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/nkp-admins/nkp-san-pham/nkp-delete/{id}', [nkp_SAN_PHAMController::class, 'nkpdelete'])->name('nkpadmin.nkpsanpham.nkpdelete');


// khach hang--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/nkp-admins/nkp-khach-hang',[nkp_KHACH_HANGcontroller::class,'nkpList'])->name('nkpadmins.nkpkhachhang');
//detail
Route::get('/nkp-admins/nkp-khach-hang/nkp-detail/{id}', [nkp_KHACH_HANGcontroller::class, 'nkpDetail'])->name('nkpadmin.nkpkhachhang.nkpDetail');
//create
Route::get('/nkp-admins/nkp-khach-hang/nkp-create',[nkp_KHACH_HANGcontroller::class,'nkpCreate'])->name('nkpadmin.nkpkhachhang.nkpcreate');
Route::post('/nkp-admins/nkp-khach-hang/nkp-create',[nkp_KHACH_HANGcontroller::class,'nkpCreateSubmit'])->name('nkpadmin.nkpkhachhang.nkpCreateSubmit');
//edit
Route::get('/nkp-admins/nkp-khach-hang/nkp-edit/{id}', [nkp_KHACH_HANGcontroller::class, 'nkpEdit'])->name('nkpadmin.nkpkhachhang.nkpedit');
Route::post('/nkp-admins/nkp-khach-hang/nkp-edit/{id}', [nkp_KHACH_HANGcontroller::class, 'nkpEditSubmit'])->name('nkpadmin.nkpkhachhang.nkpEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/nkp-admins/nkp-khach-hang/nkp-delete/{id}', [nkp_KHACH_HANGcontroller::class, 'nkpDelete'])->name('nkpadmin.nkpkhachhang.nkpdelete');

// Hóa Đơn--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/nkp-admins/nkp-hoa-don',[nkp_HOA_DONController::class,'nkpList'])->name('nkpadmins.nkphoadon');
//detail
Route::get('/nkp-admins/nkp-hoa-don/nkp-detail/{id}', [nkp_HOA_DONController::class, 'nkpDetail'])->name('nkpadmin.nkphoadon.nkpDetail');
//create
Route::get('/nkp-admins/nkp-hoa-don/nkp-create',[nkp_HOA_DONController::class,'nkpCreate'])->name('nkpadmin.nkphoadon.nkpcreate');
Route::post('/nkp-admins/nkp-hoa-don/nkp-create',[nkp_HOA_DONController::class,'nkpCreateSubmit'])->name('nkpadmin.nkphoadon.nkpCreateSubmit');
//edit
Route::get('/nkp-admins/nkp-hoa-don/nkp-edit/{id}', [nkp_HOA_DONController::class, 'nkpEdit'])->name('nkpadmin.nkphoadon.nkpedit');
Route::post('/nkp-admins/nkp-hoa-don/nkp-edit/{id}', [nkp_HOA_DONController::class, 'nkpEditSubmit'])->name('nkpadmin.nkphoadon.nkpEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/nkp-admins/nkp-hoa-don/nkp-delete/{id}', [nkp_HOA_DONController::class, 'nkpDelete'])->name('nkpadmin.nkphoadon.nkpdelete');


// Chi Tiết Hóa Đơn--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/nkp-admins/nkp-ct-hoa-don',[nkp_CT_HOA_DONController::class,'nkpList'])->name('nkpadmins.nkpcthoadon');
//detail
Route::get('/nkp-admins/nkp-ct-hoa-don/nkp-detail/{id}', [nkp_CT_HOA_DONController::class, 'nkpDetail'])->name('nkpadmin.nkpcthoadon.nkpDetail');
//create
Route::get('/nkp-admins/nkp-ct-hoa-don/nkp-create',[nkp_CT_HOA_DONController::class,'nkpCreate'])->name('nkpadmin.nkpcthoadon.nkpcreate');
Route::post('/nkp-admins/nkp-ct-hoa-don/nkp-create',[nkp_CT_HOA_DONController::class,'nkpCreateSubmit'])->name('nkpadmin.nkpcthoadon.nkpCreateSubmit');
//edit
Route::get('/nkp-admins/nkp-ct-hoa-don/nkp-edit/{id}', [nkp_CT_HOA_DONController::class, 'nkpEdit'])->name('nkpadmin.nkpcthoadon.nkpedit');
Route::post('/nkp-admins/nkp-ct-hoa-don/nkp-edit/{id}', [nkp_CT_HOA_DONController::class, 'nkpEditSubmit'])->name('nkpadmin.nkpcthoadon.nkpEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/nkp-admins/nkp-ct-hoa-don/nkp-delete/{id}', [nkp_CT_HOA_DONController::class, 'nkpDelete'])->name('nkpadmin.nkpcthoadon.nkpdelete');


// Quản trị Viên--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/nkp-admins/nkp-quan-tri',[nkp_QUAN_TRIController::class,'nkpList'])->name('nkpadmins.nkpquantri');
//detail
Route::get('/nkp-admins/nkp-quan-tri/nkp-detail/{id}', [nkp_QUAN_TRIController::class, 'nkpDetail'])->name('nkpadmin.nkpquantri.nkpDetail');
//create
Route::get('/nkp-admins/nkp-quan-tri/nkp-create',[nkp_QUAN_TRIController::class,'nkpCreate'])->name('nkpadmin.nkpquantri.nkpcreate');
Route::post('/nkp-admins/nkp-quan-tri/nkp-create',[nkp_QUAN_TRIController::class,'nkpCreateSubmit'])->name('nkpadmin.nkpquantri.nkpCreateSubmit');
//edit
Route::get('/nkp-admins/nkp-quan-tri/nkp-edit/{id}', [nkp_QUAN_TRIController::class, 'nkpEdit'])->name('nkpadmin.nkpquantri.nkpedit');
Route::post('/nkp-admins/nkp-quan-tri/nkp-edit/{id}', [nkp_QUAN_TRIController::class, 'nkpEditSubmit'])->name('nkpadmin.nkpquantri.nkpEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/nkp-admins/nkp-quan-tri/nkp-delete/{id}', [nkp_QUAN_TRIController::class, 'nkpDelete'])->name('nkpadmin.nkpquantri.nkpdelete');

// Tin Tức--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/nkp-admins/nkp-tin-tuc',[nkp_TIN_TUCController::class,'nkpList'])->name('nkpadmins.nkptintuc');
//detail
Route::get('/nkp-admins/nkp-tin-tuc/nkp-detail/{id}', [nkp_TIN_TUCController::class, 'nkpDetail'])->name('nkpadmin.nkptintuc.nkpDetail');
//create
Route::get('/nkp-admins/nkp-tin-tuc/nkp-create',[nkp_TIN_TUCController::class,'nkpCreate'])->name('nkpadmin.nkptintuc.nkpcreate');
Route::post('/nkp-admins/nkp-tin-tuc/nkp-create',[nkp_TIN_TUCController::class,'nkpCreateSubmit'])->name('nkpadmin.nkptintuc.nkpCreateSubmit');
//edit
Route::get('/nkp-admins/nkp-tin-tuc/nkp-edit/{id}', [nkp_TIN_TUCController::class, 'nkpEdit'])->name('nkpadmin.nkptintuc.nkpedit');
Route::post('/nkp-admins/nkp-tin-tuc/nkp-edit/{id}', [nkp_TIN_TUCController::class, 'nkpEditSubmit'])->name('nkpadmin.nkptintuc.nkpEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/nkp-admins/nkp-tin-tuc/nkp-delete/{id}', [nkp_TIN_TUCController::class, 'nkpDelete'])->name('nkpadmin.nkptintuc.nkpdelete');














use App\Http\Controllers\HomeController;

// User - Routes
Route::get('/nkp-user', [HomeController::class, 'index'])->name('nkpuser.home');
Route::get('/nkp-user1', [HomeController::class, 'index1'])->name('nkpuser.home1');
// Hiển thị chi tiết sản phẩm
Route::get('/nkp-user/show/{id}', [HomeController::class, 'show'])->name('nkpuser.show');
// search
Route::get('/search', [nkp_SAN_PHAMController::class, 'search'])->name('nkpuser.search');
Route::get('/search1', [nkp_SAN_PHAMController::class, 'search1'])->name('nkpuser.search1');

Route::get('/nkpuser/login', [nkp_LOGIN_USERController::class, 'nkpLogin'])->name('nkpuser.login');
Route::post('/nkpuser/login', [nkp_LOGIN_USERController::class, 'nkpLoginSubmit'])->name('nkpuser.nkpLoginSubmit');
Route::get('/nkpuser/logout', [nkp_LOGIN_USERController::class, 'nkpLogout'])->name('nkpuser.logout');


// hỗ trợ 
route::get('/nkp-user/support',function()
{
    return view('nkpuser.support');
});

// signup
Route::get('/nkp-user/signup', [nkp_SIGNUPController::class, 'nkpsignup'])->name('nkpuser.nkpsignup');
Route::post('/nkp-user/signup', [nkp_SIGNUPController::class, 'nkpsignupSubmit'])->name('nkpuser.nkpsignupSubmit');



// Route để hiển thị sản phẩm trong trang thanh toán
Route::get('/nkp-user/thanhtoan/{product_id}', [nkp_CT_HOA_DONController::class, 'nkpthanhtoan'])->name('nkpuser.nkpthanhtoan');

// Route để xử lý thanh toán
Route::post('/nkp-user/thanhtoan', [nkp_CT_HOA_DONController::class, 'storeThanhtoan'])->name('nkpuser.storeThanhtoan');
// create hóa đơn user


// tạo bảng hóa đơn
Route::get('san-pham/{sanPham}', [nkp_CT_HOA_DONController::class, 'show'])->name('sanpham.show');
Route::post('mua-san-pham/{sanPham}', [nkp_CT_HOA_DONController::class, 'store'])->name('hoadon.store');

// xem bảng Hóa Đơn mới Tạo
Route::get('hoa-don/{hoaDonId}/san-pham/{sanPhamId}', [nkp_HOA_DONController::class, 'show'])->name('hoadon.show');



// tạo bảng chi tiết hóa đơn


// Route để tạo mới chi tiết hóa đơn
Route::get('/cthoadon/{hoaDonId}/{sanPhamId}', [nkp_CT_HOA_DONController::class, 'create'])->name('cthoadon.create');

// Route để lưu chi tiết hóa đơn
Route::post('/cthoadon/store', [nkp_CT_HOA_DONController::class, 'storecthoadon'])->name('cthoadon.storecthoadon');

// Route để hiển thị chi tiết hóa đơn
Route::get('/hoa-don-id/{hoaDonId}/san-pham-id/{sanPhamId}', [nkp_CT_HOA_DONController::class, 'cthoadonshow'])->name('cthoadon.cthoadonshow');


// giỏ hàng
use App\Http\Controllers\CartController;

Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');

// liên hệ (_menu) 
route::get('/nkpuser-lienhe',function(){
    return view('nkpuser.lienhe');
})->name('nkpuser.lienhe');
// giới thiệt (_menu) 
route::get('/nkpuser-gioithieu',function(){
    return view('nkpuser.gioithieu');
})->name('nkpuser.gioithieu');


// thông tin cá nhân
use App\Http\Controllers\nkp_TTNHUOIDUNGController;
// Route hiển thị form chỉnh sửa thông tin khách hàng
Route::get('/nkp-user/nkp-edit/{id}', [nkp_TTNHUOIDUNGController::class, 'nkpEdit'])->name('nkpuser.tt.nkpedit');
Route::post('/nkp-user/nkp-edit/{id}', [nkp_TTNHUOIDUNGController::class, 'nkpEditSubmit'])->name('nkpuser.tt.nkpEditSubmit');