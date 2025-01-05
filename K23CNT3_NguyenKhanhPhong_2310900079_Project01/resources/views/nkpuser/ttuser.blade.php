@extends('_layouts.frontend.user1')

@section('title', 'Trang Chủ')

@section('content-body')
<form action="{{ route('nkpuser.tt.nkpEditSubmit', ['id' => $nkpuser->id]) }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $nkpuser->id }}">

    <div class="card">
        <div class="card-header text-center">
            <h1 class="mb-0">Sửa Thông Tin bản thân</h1>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="nkpMaKhachHang" class="form-label">Mã Khách Hàng</label>
                <input type="text" class="form-control" id="nkpMaKhachHang" name="nkpMaKhachHang" value="{{ $nkpuser->nkpMaKhachHang }}" readonly>
                @error('nkpMaKhachHang')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nkpHoTenKhachHang" class="form-label">Họ Tên </label>
                <input type="text" class="form-control" id="nkpHoTenKhachHang" name="nkpHoTenKhachHang" value="{{ old('nkpHoTenKhachHang', $nkpuser->nkpHoTenKhachHang) }}">
                @error('nkpHoTenKhachHang')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nkpEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="nkpEmail" name="nkpEmail" value="{{ old('nkpEmail', $nkpuser->nkpEmail) }}">
                @error('nkpEmail')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nkpMatKhau" class="form-label">Mật Khẩu</label>
                <input type="password" class="form-control" id="nkpMatKhau" name="nkpMatKhau" value="{{ old('nkpMatKhau', '') }}" >
                @error('nkpMatKhau')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            

            <div class="mb-3">
                <label for="nkpDienThoai" class="form-label">Điện Thoại</label>
                <input type="tel" class="form-control" id="nkpDienThoai" name="nkpDienThoai" value="{{ old('nkpDienThoai', $nkpuser->nkpDienThoai) }}">
                @error('nkpDienThoai')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nkpDiaChi" class="form-label">Địa Chỉ</label>
                <input type="text" class="form-control" id="nkpDiaChi" name="nkpDiaChi" value="{{ old('nkpDiaChi', $nkpuser->nkpDiaChi) }}">
                @error('nkpDiaChi')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nkpNgayDangKy" class="form-label">Ngày Đăng Ký</label>
                <input type="date" class="form-control" id="nkpNgayDangKy" name="nkpNgayDangKy" value="{{ old('nkpNgayDangKy', $nkpuser->nkpNgayDangKy) }}">
                @error('nkpNgayDangKy')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nkpTrangThai" class="form-label">Trạng Thái</label>
                <select name="nkpTrangThai" id="nkpTrangThai" class="form-control" required>
                    <option value="" disabled {{ old('nkpTrangThai') == '' ? 'selected' : '' }}>Chọn trạng thái</option>
                    <option value="0" {{ old('nkpTrangThai', $nkpuser->nkpTrangThai) == 0 ? 'selected' : '' }}>Hoạt Động</option>
                    <option value="1" {{ old('nkpTrangThai', $nkpuser->nkpTrangThai) == 1 ? 'selected' : '' }}>Tạm Khóa</option>
                    <option value="2" {{ old('nkpTrangThai', $nkpuser->nkpTrangThai) == 2 ? 'selected' : '' }}>Khóa</option>
                </select>
                @error('nkpTrangThai')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            

        </div>
        <div class="card-footer text-center">
            <button class="btn btn-success" type="submit">Cập nhật</button>
            <a href="{{ route('nkpuser.home1') }}" class="btn btn-primary">Trở lại</a>
          
        </div>
    </div>
</form>
@endsection 