
@extends('_layouts.admins._master')
@section('title', 'Thêm Quản Trị Viên')

@section('content-body')
    <div class="container">
        <form action="{{ route('nkpadmin.nkpquantri.nkpCreateSubmit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nkpTaiKhoan">Tài Khoản</label>
                <input type="text" class="form-control" id="nkpTaiKhoan" name="nkpTaiKhoan" required>
                @error('nkpTaiKhoan') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="nkpMatKhau">Mật Khẩu</label>
                <input type="password" class="form-control" id="nkpMatKhau" name="nkpMatKhau" required>
                @error('nkpMatKhau') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="nkpTrangThai">Trạng Thái</label>
                <select name="nkpTrangThai" id="nkpTrangThai" class="form-control" required>
                    <option value="0">Cho Phép Đăng Nhập</option>
                    <option value="1">Khóa</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Thêm Quản Trị Viên</button>
        </form>
    </div>
@endsection
