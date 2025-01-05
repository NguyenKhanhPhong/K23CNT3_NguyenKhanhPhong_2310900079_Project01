@extends('_layouts.admins._master')
@section('title','Sửa Loại Khách Hàng')

@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <!-- Update the form action route to pass the nkpMaKhachHang as a parameter -->
                <form action="{{ route('nkpadmin.nkpkhachhang.nkpEditSubmit', ['id' => $nkpkhachhang->id]) }}" method="POST">
                    @csrf
                    <!-- Hidden input for the ID -->
                    <input type="hidden" name="id" value="{{ $nkpkhachhang->id }}">

                    <div class="card">
                        <div class="card-header">
                            <h1>Sửa loại Khách Hàng</h1>
                        </div>
                        <div class="card-body">
                            <!-- Mã Loại (disabled) -->
                            <div class="mb-3">
                                <label for="nkpMaKhachHang" class="form-label">Mã Khách Hàng</label>
                                <input type="text" class="form-control" id="nkpMaKhachHang" name="nkpMaKhachHang" value="{{ $nkpkhachhang->nkpMaKhachHang }}" >
                                @error('nkpMaKhachHang')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>

                            <!-- Tên Loại -->
                            <div class="mb-3">
                                <label for="nkpHoTenKhachHang" class="form-label">Họ Tên Khách Hàng</label>
                                <input type="text" class="form-control" id="nkpHoTenKhachHang" name="nkpHoTenKhachHang" value="{{ old('nkpHoTenKhachHang', $nkpkhachhang->nkpHoTenKhachHang) }}" >
                                @error('nkpHoTenKhachHang')
                                    <span class="text-danger">{{ $message }}</span> 
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nkpEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="nkpEmail" name="nkpEmail" value="{{ old('nkpEmail', $nkpkhachhang->nkpEmail) }}" >
                                @error('nkpEmail')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nkpMatKhau" class="form-label">Mật Khẩu</label>
                                <input type="password" class="form-control" id="nkpMatKhau" name="nkpMatKhau" value="{{ old('nkpMatKhau', $nkpkhachhang->nkpMatKhau) }}" >
                                @error('nkpMatKhau')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nkpDienThoai" class="form-label">Điện Thoại</label>
                                <input type="tel" class="form-control" id="nkpDienThoai" name="nkpDienThoai" value="{{ old('nkpDienThoai', $nkpkhachhang->nkpDienThoai) }}" >
                                @error('nkpDienThoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nkpDiaChi" class="form-label">Địa Chỉ</label>
                                <input type="text" class="form-control" id="nkpDiaChi" name="nkpDiaChi" value="{{ old('nkpDiaChi', $nkpkhachhang->nkpDiaChi) }}" >
                                @error('nkpDiaChi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nkpNgayDangKy" class="form-label">Ngày Đăng Ký</label>
                                <input type="date" class="form-control" id="nkpNgayDangKy" name="nkpNgayDangKy" value="{{ old('nkpNgayDangKy', $nkpkhachhang->nkpNgayDangKy) }}" >
                                @error('nkpNgayDangKy')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Trạng Thái -->
                            <div class="mb-3">
                                <label for="nkpTrangThai" class="form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="nkpTrangThai0" name="nkpTrangThai" value="0" {{ old('nkpTrangThai', $nkpkhachhang->nkpTrangThai) == 0 ? 'checked' : '' }} />
                                    <label for="nkpTrangThai0">Hoạt Động</label>
                                    &nbsp;
                                    <input type="radio" id="nkpTrangThai1" name="nkpTrangThai" value="1" {{ old('nkpTrangThai', $nkpkhachhang->nkpTrangThai) == 1 ? 'checked' : '' }} />
                                    <label for="nkpTrangThai1">Tạm Khóa</label>
                           
                                    &nbsp;
                                    <input type="radio" id="nkpTrangThai2" name="nkpTrangThai" value="2" {{ old('nkpTrangThai', $nkpkhachhang->nkpTrangThai) == 2 ? 'checked' : '' }} />
                                    <label for="nkpTrangThai0">Khóa</label>
                                </div>
                                @error('nkpTrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="card-footer">
                            <!-- Change button label to "Cập nhật" (Update) -->
                            <button class="btn btn-success" type="submit">Cập nhật</button>
                            <a href="{{ route('nkpadmins.nkpkhachhang') }}" class="btn btn-primary">Trở lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection