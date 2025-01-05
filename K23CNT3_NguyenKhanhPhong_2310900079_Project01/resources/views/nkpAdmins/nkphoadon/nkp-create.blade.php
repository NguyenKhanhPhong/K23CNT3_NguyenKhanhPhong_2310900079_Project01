@extends('_layouts.admins._master')
@section('title','Create Hóa Đơn')
    
@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <form action="{{route('nkpadmin.nkphoadon.nkpCreateSubmit')}}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h1>Thêm Mới Hóa Đơn</h1>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="nkpMaHoaDon" class="form-label">Mã Hóa Đơn</label>
                                <input type="text" class="form-control" id="nkpMaHoaDon" name="nkpMaHoaDon" value="{{ old('nkpMaHoaDon') }}" >
                                @error('nkpMaHoaDon')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nkpMaKhachHang" class="form-label">Khách Hàng</label>
                                <select name="nkpMaKhachHang" id="nkpMaKhachHang" class="form-control">
                                    @foreach ($nkpkhachhang as $item)
                                        <option value="{{ $item->id }}">{{ $item->nkpHoTenKhachHang }}</option>
                                    @endforeach
                                </select>
                                @error('nkpMaKhachHang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nkpNgayHoaDon" class="form-label">Ngày Hóa Đơn</label>
                                <input type="date" class="form-control" id="nkpNgayHoaDon" name="nkpNgayHoaDon" value="{{ old('nkpNgayHoaDon') }}" >
                                @error('nkpNgayHoaDon')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nkpNgayNhan" class="form-label">Ngày Nhận</label>
                                <input type="date" class="form-control" id="nkpNgayNhan" name="nkpNgayNhan" value="{{ old('nkpNgayNhan') }}" >
                                @error('nkpNgayNhan')
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
                                <input type="Email" class="form-control" id="nkpEmail" name="nkpEmail" value="{{ old('nkpEmail') }}" >
                                @error('nkpEmail')
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
                                <label for="nkpTongGiaTri" class="form-label">Tổng Giá Trị</label>
                                <input type="number" class="form-control" id="nkpTongGiaTri" name="nkpTongGiaTri" value="{{ old('nkpTongGiaTri') }}" >
                                @error('nkpTongGiaTri')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nkpTrangThai" class="form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="nkpTrangThai0" name="nkpTrangThai" value="0" checked/>
                                    <label for="nkpTrangThai1">Chờ Sử Lý</label>
                                    &nbsp;
                                    <input type="radio" id="nkpTrangThai1" name="nkpTrangThai" value="1"/>
                                    <label for="nkpTrangThai0">Đang Sử Lý</label>
                                    &nbsp;
                                    <input type="radio" id="nkpTrangThai2" name="nkpTrangThai" value="2"/>
                                    <label for="nkpTrangThai0">Đã hoàn Thành</label>
                                </div>
                                @error('nkpTrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success">Create</button>
                            <a href="{{route('nkpadmins.nkphoadon')}}" class="btn btn-primary"> Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection