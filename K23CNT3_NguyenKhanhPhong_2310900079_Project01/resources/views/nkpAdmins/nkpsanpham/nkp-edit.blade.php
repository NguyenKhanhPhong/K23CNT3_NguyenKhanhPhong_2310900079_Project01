@extends('_layouts.admins._master')

@section('title', 'Chỉnh Sửa Sản Phẩm')

@section('content-body')
<div class="container border mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1>Chỉnh Sửa Sản Phẩm</h1>
                </div>
                <div class="card-body">
                    <!-- Form chỉnh sửa sản phẩm -->
                    <form action="{{ route('nkpadmin.nkpsanpham.nkpEditSubmit', $nkpsanpham->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <!-- Mã sản phẩm -->
                        <div class="mb-3">
                            <label for="nkpMaSanPham" class="form-label">Mã sản phẩm</label>
                            <input type="text" name="nkpMaSanPham" class="form-control" value="{{ old('nkpMaSanPham', $nkpsanpham->nkpMaSanPham) }}">
                            @error('nkpMaSanPham')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tên sản phẩm -->
                        <div class="mb-3">
                            <label for="nkpTenSanPham" class="form-label">Tên sản phẩm</label>
                            <input type="text" name="nkpTenSanPham" class="form-control" value="{{ old('nkpTenSanPham', $nkpsanpham->nkpTenSanPham) }}">
                            @error('nkpTenSanPham')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Hình ảnh sản phẩm -->
                        <div class="mb-3">
                            <label for="nkpHinhAnh" class="form-label">Hình ảnh</label>
                            <input type="file" name="nkpHinhAnh" class="form-control">
                            @if($nkpsanpham->nkpHinhAnh)
                                <img src="{{ asset('storage/' . $nkpsanpham->nkpHinhAnh) }}" alt="Sản phẩm {{ $nkpsanpham->nkpMaSanPham }}" width="200" class="mt-2">
                            @endif
                            @error('nkpHinhAnh')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Số lượng -->
                        <div class="mb-3">
                            <label for="nkpSoLuong" class="form-label">Số lượng</label>
                            <input type="number" name="nkpSoLuong" class="form-control" value="{{ old('nkpSoLuong', $nkpsanpham->nkpSoLuong) }}">
                            @error('nkpSoLuong')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Đơn giá -->
                        <div class="mb-3">
                            <label for="nkpDonGia" class="form-label">Đơn giá</label>
                            <input type="number" name="nkpDonGia" class="form-control" value="{{ old('nkpDonGia', $nkpsanpham->nkpDonGia) }}">
                            @error('nkpDonGia')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Mã Loại -->
                        <div class="mb-3">
                            <label for="nkpMaLoai" class="form-label">Loại Danh Muc</label>
                            <select name="nkpMaLoai" id="nkpMaLoai" class="form-control">
                                @foreach ($nkploaisanpham as $item)
                                    <option value="{{ $item->id }}" 
                                        {{ old('nkpMaLoai', $nkpsanpham->nkpMaLoai) == $item->id ? 'selected' : '' }}>
                                        {{ $item->nkpTenLoai }}
                                    </option>
                                @endforeach
                            </select>
                            @error('nkpMaLoai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <!-- Trạng thái -->
                        <div class="mb-3">
                            <label for="nkpTrangThai" class="form-label">Trạng Thái</label>
                            <div class="col-sm-10">
                                <input type="radio" id="nkpTrangThai1" name="nkpTrangThai" value="1" {{ old('nkpTrangThai', $nkpsanpham->nkpTrangThai) == 1 ? 'checked' : '' }} />
                                <label for="nkpTrangThai1">Khóa</label>
                                &nbsp;
                                <input type="radio" id="nkpTrangThai0" name="nkpTrangThai" value="0" {{ old('nkpTrangThai', $nkpsanpham->nkpTrangThai) == 0 ? 'checked' : '' }} />
                                <label for="nkpTrangThai0">Hiển Thị</label>
                            </div>
                            @error('nkpTrangThai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Nút lưu -->
                        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                    </form>
                </div>
                <div class="card-footer">
                    <!-- Nút quay lại danh sách sản phẩm -->
                    <a href="{{ route('nkpadims.nkpsanpham') }}" class="btn btn-secondary">Quay lại danh sách</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection