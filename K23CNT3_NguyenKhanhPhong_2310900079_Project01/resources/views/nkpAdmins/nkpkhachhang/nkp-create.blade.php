@extends('_layouts.admins._master')
@section('title','Create Khách Hàng')
    
@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <form action="{{route('nkpadmin.nkpkhachhang.nkpCreateSubmit')}}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h1>Thêm Mới Khách Hàng</h1>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="nkpMaKhachHang" class="form-label">Mã Khách Hàng</label>
                                <input type="text" class="form-control" id="nkpMaKhachHang" name="nkpMaKhachHang" value="{{ old('nkpMaKhachHang') }}" >
                                @error('nkpMaKhachHang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nkpHoTenKhachHang" class="form-label">Họ Tên Khách Hàng</label>
                                <input type="text" class="form-control" id="nkpHoTenKhachHang" name="nkpHoTenKhachHang" value="{{ old('nkpHoTenKhachHang') }}" >
                                @error('nkpHoTenKhachHang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nkpEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="nkpEmail" name="nkpEmail" value="{{ old('nkpEmail') }}" >
                                @error('nkpEmail')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nkpMatKhau" class="form-label">Mật Khẩu</label>
                                <input type="password" class="form-control" id="nkpMatKhau" name="nkpMatKhau" value="{{ old('nkpMatKhau') }}" >
                                @error('nkpMatKhau')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nkpDienThoai" class="form-label">Điện Thoại</label>
                                <input type="tel" class="form-control" id="nkpDienThoai" name="nkpDienThoai" value="{{ old('nkpDienThoai') }}" >
                                @error('nkpDienThoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nkpDiaChi" class="form-label">Địa Chỉ</label>
                                <input type="text" class="form-control" id="nkpDiaChi" name="nkpDiaChi" value="{{ old('nkpDiaChi') }}" >
                                @error('nkpDiaChi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nkpNgayDangKy" class="form-label">Ngày Đăng Ký</label>
                                <input type="date" class="form-control" id="nkpNgayDangKy" name="nkpNgayDangKy" value="{{ old('nkpNgayDangKy') }}" >
                                @error('nkpNgayDangKy')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nkpTrangThai" class="form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="nkpTrangThai0" name="nkpTrangThai" value="0" checked/>
                                    <label for="nkpTrangThai1"> Hoạt Động</label>
                                    &nbsp;
                                    <input type="radio" id="nkpTrangThai1" name="nkpTrangThai" value="1"/>
                                    <label for="nkpTrangThai0">Tạm Khóa</label>
                                    &nbsp;
                                    <input type="radio" id="nkpTrangThai2" name="nkpTrangThai" value="2"/>
                                    <label for="nkpTrangThai0">Khóa</label>
                                </div>
                                @error('nkpTrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success">Create</button>
                            <a href="{{route('nkpadmins.nkpkhachhang')}}" class="btn btn-primary"> Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection