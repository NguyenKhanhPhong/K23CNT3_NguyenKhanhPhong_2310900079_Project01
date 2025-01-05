<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nkp_LOAI_SAN_PHAM; // Sử dụng Model User để thao tác với cơ sở dữ liệu
class nkp_LOAI_SAN_PHAMController extends Controller
{
    //admin CRUD
    // list
    public function nkpList()
    {
        $nkploaisanphams = nkp_LOAI_SAN_PHAM::all();
        return view('nkpAdmins.nkploaisanpham.nkp-list',['nkploaisanphams'=>$nkploaisanphams]);
    }

    //create
    public function nkpCreate()
    {
        return view('nkpAdmins.nkploaisanpham.nkp-create');
    }

    public function nkpCreateSunmit(Request $request)
    {
        $validatedData = $request->validate([
            'nkpMaLoai' => 'required|unique:nkp_LOAI_SAN_PHAM,nkpMaLoai',  // Kiểm tra mã loại không trống và duy nhất
            'nkpTenLoai' => 'required|string|max:255',  // Kiểm tra tên loại không trống và là chuỗi
            'nkpTrangThai' => 'required|in:0,1',  // Trạng thái phải là 0 hoặc 1
        ]);
        //ghi dữ liệu xuống db
        $nkploaisanpham = new nkp_LOAI_SAN_PHAM;
        $nkploaisanpham->nkpMaLoai = $request->nkpMaLoai;
        $nkploaisanpham->nkpTenLoai = $request->nkpTenLoai;
        $nkploaisanpham->nkpTrangThai = $request->nkpTrangThai;

        $nkploaisanpham->save();
       return redirect()->route('nkpadmins.nkploaisanpham');
    }

    public function nkpEdit($id)
    {
        // Retrieve the product by the primary key (id)
        $nkploaisanpham = nkp_LOAI_SAN_PHAM::find($id);
    
        // If the product does not exist, redirect with an error message
        if (!$nkploaisanpham) {
            return redirect()->route('nkpadmins.nkploaisanpham')->with('error', 'Loại sản phẩm không tồn tại.');
        }
    
        // Pass the product data to the edit view
        return view('nkpAdmins.nkploaisanpham.nkp-edit', ['nkploaisanpham' => $nkploaisanpham]);
    }
    
    public function nkpEditSubmit(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'nkpMaLoai' => 'required|string|max:255|unique:nkp_LOAI_SAN_PHAM,nkpMaLoai,' . $request->id,  // Bỏ qua nkpMaLoai của bản ghi hiện tại
            'nkpTenLoai' => 'required|string|max:255',   
            'nkpTrangThai' => 'required|in:0,1',  // Validation for nkpTrangThai (0 or 1)
        ]);
    
        // Find the product by id
        $nkploaisanpham = nkp_LOAI_SAN_PHAM::find($request->id);
    
        // Check if the product exists
        if (!$nkploaisanpham) {
            return redirect()->route('nkpadmins.nkploaisanpham')->with('error', 'Loại sản phẩm không tồn tại.');
        }
    
        // Update the product with validated data
        $nkploaisanpham->nkpMaLoai = $request->nkpMaLoai;
        $nkploaisanpham->nkpTenLoai = $request->nkpTenLoai;
        $nkploaisanpham->nkpTrangThai = $request->nkpTrangThai;
    
        // Save the updated product
        $nkploaisanpham->save();
    
        // Redirect back to the list page with a success message
        return redirect()->route('nkpadmins.nkploaisanpham')->with('success', 'Cập nhật loại sản phẩm thành công.');
    }
    
    

    public function nkpGetDetail($id)
    {
        $nkploaisanpham = nkp_LOAI_SAN_PHAM::where('id', $id)->first();
        return view('nkpAdmins.nkploaisanpham.nkp-detail',['nkploaisanpham'=>$nkploaisanpham]);

    }

    public function nkpDelete($id)
    {
        nkp_LOAI_SAN_PHAM::where('id',$id)->delete();
    return back()->with('loaisanpham_deleted','Đã xóa Loại Sản Phẩm thành công!');
    }

}