<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nkp_TIN_TUC;  // Assuming you have the model for TIN_TUC
use Illuminate\Support\Facades\Storage;

class nkp_TIN_TUCController extends Controller
{
    // List all news ----------------------------------------------------------------------
 // List all news with pagination
public function nkpList()
{
    $nkptinTucs = nkp_TIN_TUC::all();
        
    // Phân trang kết quả, thay 10 bằng số lượng bạn muốn mỗi trang
    $nkptinTucs = nkp_TIN_TUC::paginate(10);
    
    
    // Return the view with the paginated data
    return view('nkpAdmins.nkptintuc.nkp-list', ['nkptinTucs' => $nkptinTucs]);
}

    

    // Show the detail of a specific news item -------------------------------------------
    public function nkpDetail($id)
    {
        $nkptinTuc = nkp_TIN_TUC::findOrFail($id);
        return view('nkpAdmins.nkptintuc.nkp-detail', ['nkptinTuc' => $nkptinTuc]);
    }

    // Show the create form for a new news item ----------------------------------------
    public function nkpCreate()
    {
        return view('nkpAdmins.nkptintuc.nkp-create');
    }

    // Handle the form submission for creating a new news item ---------------------------
    public function nkpCreateSubmit(Request $request)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'nkpMaTT' => 'required|unique:nkp_TIN_TUC,nkpMaTT',
            'nkpTieuDe' => 'required|string|max:255',
            'nkpMoTa' => 'required|string',
            'nkpNoiDung' => 'required|string',
            'nkpNgayDangTin' => 'required|date',
            'nkpNgayCapNhap' => 'required|date',
            'nkpHinhAnh' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // Optional image
            'nkpTrangThai' => 'required|in:0,1',  // 0 - inactive, 1 - active
        ]);

        // Create the new news item
        $nkptinTuc = new nkp_TIN_TUC();
        $nkptinTuc->nkpMaTT = $request->nkpMaTT;
        $nkptinTuc->nkpTieuDe = $request->nkpTieuDe;
        $nkptinTuc->nkpMoTa = $request->nkpMoTa;
        $nkptinTuc->nkpNoiDung = $request->nkpNoiDung;
        $nkptinTuc->nkpNgayDangTin = $request->nkpNgayDangTin;
        $nkptinTuc->nkpNgayCapNhap = $request->nkpNgayCapNhap;

        // Check if there's an image and save it
        if ($request->hasFile('nkpHinhAnh')) {
            $imagePath = $request->file('nkpHinhAnh')->store('public/img/tin_tuc');
            $nkptinTuc->nkpHinhAnh = 'img/tin_tuc/' . basename($imagePath);
        }

        $nkptinTuc->nkpTrangThai = $request->nkpTrangThai;
        $nkptinTuc->save();

        return redirect()->route('nkpadmins.nkptintuc')->with('success', 'Tin tức đã được tạo thành công.');
    }

    // Delete a news item ----------------------------------------------------------------
    public function nkpDelete($id)
    {
        $nkptinTuc = nkp_TIN_TUC::findOrFail($id);
        $nkptinTuc->delete();

        return back()->with('success', 'Tin tức đã được xóa thành công.');
    }

    // Show the edit form for a specific news item --------------------------------------
    public function nkpEdit($id)
    {
        $nkptinTuc = nkp_TIN_TUC::findOrFail($id);
        return view('nkpAdmins.nkptintuc.nkp-edit', ['nkptinTuc' => $nkptinTuc]);
    }

    // Handle the form submission for updating an existing news item ---------------------
    public function nkpEditSubmit(Request $request, $id)
{
    $validated = $request->validate([
        'nkpTieuDe' => 'required|string|max:255',
        'nkpMoTa' => 'required|string|max:500',
        'nkpNoiDung' => 'required|string',
        'nkpHinhAnh' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'nkpNgayDangTin' => 'required|date',
        'nkpNgayCapNhap' => 'nullable|date',
        'nkpTrangThai' => 'required|in:0,1',
    ]);

    // Retrieve the news article to update
    $nkptinTuc = nkp_TIN_TUC::findOrFail($id);

    // Handle image upload
    if ($request->hasFile('nkpHinhAnh')) {
        // Delete old image if exists
        if ($nkptinTuc->nkpHinhAnh) {
            Storage::delete('public/' . $nkptinTuc->nkpHinhAnh);
        }

        $imagePath = $request->file('nkpHinhAnh')->store('nkptinTuc', 'public');
        $nkptinTuc->nkpHinhAnh = $imagePath;
    }

    // Update the news article
    $nkptinTuc->nkpTieuDe = $request->nkpTieuDe;
    $nkptinTuc->nkpMoTa = $request->nkpMoTa;
    $nkptinTuc->nkpNoiDung = $request->nkpNoiDung;
    $nkptinTuc->nkpNgayDangTin = $request->nkpNgayDangTin;
    $nkptinTuc->nkpNgayCapNhap = $request->nkpNgayCapNhap ?? now();
    $nkptinTuc->nkpTrangThai = $request->nkpTrangThai;
    $nkptinTuc->save();

    return redirect()->route('nkpadmins.nkptintuc')->with('success', 'Tin tức đã được cập nhật!');
}

}