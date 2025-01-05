@extends('_layouts.admins._master')

@section('title', 'Create Tin Tức')

@section('content-body')
<div class="container border">
    <div class="row">
        <div class="col">
            <form action="{{ route('nkpadmin.nkptintuc.nkpCreateSubmit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h1>Thêm Mới Tin Tức</h1>
                    </div>
                    <div class="card-body">
                        <!-- Mã Tin Tức -->
                        <div class="mb-3">
                            <label for="nkpMaTT" class="form-label">Mã Tin Tức</label>
                            <input type="text" class="form-control" id="nkpMaTT" name="nkpMaTT" value="{{ old('nkpMaTT') }}">
                            @error('nkpMaTT')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Tiêu đề tin tức -->
                        <div class="mb-3">
                            <label for="nkpTieuDe" class="form-label">Tiêu đề tin tức</label>
                            <input type="text" class="form-control" id="nkpTieuDe" name="nkpTieuDe" value="{{ old('nkpTieuDe') }}">
                            @error('nkpTieuDe')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Mô tả tin tức -->
                        <div class="mb-3">
                            <label for="nkpMoTa" class="form-label">Mô tả tin tức</label>
                            <input type="text" class="form-control" id="nkpMoTa" name="nkpMoTa" value="{{ old('nkpMoTa') }}">
                            @error('nkpMoTa')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Nội dung tin tức -->
                        <div class="mb-3">
                            <label for="nkpNoiDung" class="form-label">Nội dung tin tức</label>
                            <textarea class="form-control" id="nkpNoiDung" name="nkpNoiDung" rows="5">{{ old('nkpNoiDung') }}</textarea>
                            @error('nkpNoiDung')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Hình ảnh tin tức -->
                        <div class="mb-3">
                            <label for="nkpHinhAnh" class="form-label">Hình Ảnh</label>
                            <input type="file" class="form-control" id="nkpHinhAnh" name="nkpHinhAnh" accept="image/*">
                            @error('nkpHinhAnh')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Ngày đăng tin -->
                        <div class="mb-3">
                            <label for="nkpNgayDangTin" class="form-label">Ngày Đăng</label>
                            <input type="datetime-local" class="form-control" id="nkpNgayDangTin" name="nkpNgayDangTin" value="{{ old('nkpNgayDangTin') }}">
                            @error('nkpNgayDangTin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Ngày cập nhật -->
                        <div class="mb-3">
                            <label for="nkpNgayCapNhap" class="form-label">Ngày Cập Nhật</label>
                            <input type="datetime-local" class="form-control" id="nkpNgayCapNhap" name="nkpNgayCapNhap" value="{{ old('nkpNgayCapNhap') }}">
                            @error('nkpNgayCapNhap')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Trạng thái -->
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
                        <a href="{{ route('nkpadmins.nkptintuc') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection