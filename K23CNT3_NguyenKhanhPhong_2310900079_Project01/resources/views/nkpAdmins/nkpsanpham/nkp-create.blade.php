@extends('_layouts.admins._master')
@section('title','Create  Sản Phẩm')
    
@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <form action="{{route('nkpadmin.nkpsanpham.nkpCreateSubmit')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h1>Thêm Mới sản phẩm</h1>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="nkpMaSanPham" class="form-label">Mã sản phẩm</label>
                                <input type="text" class="form-control" id="nkpMaSanPham" name="nkpMaSanPham" value="{{ old('nkpMaSanPham') }}" >
                                @error('nkpMaSanPham')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nkpTenSanPham" class="form-label">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="nkpTenSanPham" name="nkpTenSanPham" value="{{ old('nkpTenSanPham') }}" >
                                @error('nkpTenSanPham')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="nkpHinhAnh" class="form-label">Hình Ảnh</label>
                                <input type="file" class="form-control" id="nkpHinhAnh" name="nkpHinhAnh" accept="image/*">
                                @error('nkpHinhAnh')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            

                            <div class="mb-3">
                                <label for="nkpSoLuong" class="form-label">Số Lượng</label>
                                <input type="number" class="form-control" id="nkpSoLuong" name="nkpSoLuong" value="{{ old('nkpSoLuong') }}" >
                                @error('nkpSoLuong')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nkpDonGia" class="form-label">Đơn Giá</label>
                                <input type="number" class="form-control" id="nkpDonGia" name="nkpDonGia" value="{{ old('nkpDonGia') }}" >
                                @error('nkpDonGia')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nkpMaLoai" class="form-label">Loại Danh Muc</label>
                                <select name="nkpMaLoai" id="nkpMaLoai" class="form-control">
                                    @foreach ($nkploaisanpham as $item)
                                        <option value="{{ $item->id }}">{{ $item->nkpTenLoai }}</option>
                                    @endforeach
                                </select>
                                @error('nkpMaLoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            

                            <div class="mb-3">
                                <label for="nkpTrangThai" class="form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="nkpTrangThai1" name="nkpTrangThai" value="0" checked/>
                                    <label for="nkpTrangThai1"> Hiển Thị</label>
                                    &nbsp;
                                    <input type="radio" id="nkpTrangThai0" name="nkpTrangThai" value="1"/>
                                    <label for="nkpTrangThai0">Khóa</label>
                                </div>
                                @error('nkpTrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success">Create</button>
                            <a href="{{route('nkpadims.nkpsanpham')}}" class="btn btn-primary"> Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection