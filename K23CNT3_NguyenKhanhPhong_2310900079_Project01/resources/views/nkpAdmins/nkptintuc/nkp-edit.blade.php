
@extends('_layouts.admins._master')

@section('title', 'Chỉnh Sửa Tin Tức')

@section('content-body')
<div class="container border mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1>Chỉnh Sửa Tin Tức</h1>
                </div>
                <div class="card-body">
                    <!-- Form chỉnh sửa tin tức -->
                    <form action="{{ route('nkpadmin.nkptintuc.nkpEditSubmit', $nkptinTuc->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <!-- Tiêu đề tin tức -->
                        <div class="mb-3">
                            <label for="nkpTieuDe" class="form-label">Tiêu đề tin tức</label>
                            <input type="text" name="nkpTieuDe" class="form-control" value="{{ old('nkpTieuDe', $nkptinTuc->nkpTieuDe) }}">
                            @error('nkpTieuDe')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Mô tả tin tức -->
                        <div class="mb-3">
                            <label for="nkpMoTa" class="form-label">Mô tả tin tức</label>
                            <input type="text" name="nkpMoTa" class="form-control" value="{{ old('nkpMoTa', $nkptinTuc->nkpMoTa) }}">
                            @error('nkpMoTa')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nội dung tin tức -->
                        <div class="mb-3">
                            <label for="nkpNoiDung" class="form-label">Nội dung tin tức</label>
                            <textarea name="nkpNoiDung" class="form-control" rows="5">{{ old('nkpNoiDung', $nkptinTuc->nkpNoiDung) }}</textarea>
                            @error('nkpNoiDung')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Hình ảnh tin tức -->
                        <div class="mb-3">
                            <label for="nkpHinhAnh" class="form-label">Hình ảnh</label>
                            <input type="file" name="nkpHinhAnh" class="form-control">
                            @if($nkptinTuc->nkpHinhAnh)
                                <img src="{{ asset('storage/' . $nkptinTuc->nkpHinhAnh) }}" alt="Tin tức {{ $nkptinTuc->nkpTieuDe }}" width="200" class="mt-2">
                            @endif
                            @error('nkpHinhAnh')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Ngày đăng -->
                        <div class="mb-3">
                            <label for="nkpNgayDangTin" class="form-label">Ngày Đăng</label>
                            <input type="datetime-local" name="nkpNgayDangTin" class="form-control" value="{{ old('nkpNgayDangTin', $nkptinTuc->nkpNgayDangTin) }}">
                            @error('nkpNgayDangTin')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Ngày cập nhật -->
                        <div class="mb-3">
                            <label for="nkpNgayCapNhap" class="form-label">Ngày Cập Nhật</label>
                            <input type="datetime-local" name="nkpNgayCapNhap" class="form-control" value="{{ old('nkpNgayCapNhap', $nkptinTuc->nkpNgayCapNhap) }}">
                            @error('nkpNgayCapNhap')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Trạng thái -->
                        <div class="mb-3">
                            <label for="nkpTrangThai" class="form-label">Trạng Thái</label>
                            <div class="col-sm-10">
                                <input type="radio" id="nkpTrangThai1" name="nkpTrangThai" value="1" {{ old('nkpTrangThai', $nkptinTuc->nkpTrangThai) == 1 ? 'checked' : '' }} />
                                <label for="nkpTrangThai1">Khóa</label>
                                &nbsp;
                                <input type="radio" id="nkpTrangThai0" name="nkpTrangThai" value="0" {{ old('nkpTrangThai', $nkptinTuc->nkpTrangThai) == 0 ? 'checked' : '' }} />
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
                    <!-- Nút quay lại danh sách tin tức -->
                    <a href="{{ route('nkpadmins.nkptintuc') }}" class="btn btn-secondary">Quay lại danh sách</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
