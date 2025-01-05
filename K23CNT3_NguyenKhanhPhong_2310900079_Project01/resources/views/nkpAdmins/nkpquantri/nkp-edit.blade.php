
@extends('_layouts.admins._master')
@section('title', 'Chỉnh Sửa Quản Trị Viên')

@section('content-body')
    <div class="container">
        <form action="{{ route('nkpadmin.nkpquantri.nkpEditSubmit', $nkpquantri->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nkpTaiKhoan">Tài Khoản</label>
                <input type="text" class="form-control" id="nkpTaiKhoan" name="nkpTaiKhoan" value="{{ $nkpquantri->nkpTaiKhoan }}" required>
                @error('nkpTaiKhoan') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="nkpMatKhau">Mật Khẩu</label>
                <input type="password" class="form-control" id="nkpMatKhau" name="nkpMatKhau">
                @error('nkpMatKhau') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="nkpTrangThai">Trạng Thái</label>
                <select name="nkpTrangThai" id="nkpTrangThai" class="form-control" required>
                    <option value="0" {{ $nkpquantri->nkpTrangThai == 0 ? 'selected' : '' }}>Cho Phép Đăng Nhập</option>
                    <option value="1" {{ $nkpquantri->nkpTrangThai == 1 ? 'selected' : '' }}>Khóa</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Cập Nhật</button>
        </form>
    </div>
@endsection
