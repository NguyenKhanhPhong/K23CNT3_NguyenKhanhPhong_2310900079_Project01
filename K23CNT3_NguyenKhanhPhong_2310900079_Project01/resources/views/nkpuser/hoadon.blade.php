@extends('_layouts.frontend.user1')

@section('title', 'Hóa Đơn')

@section('content-body')
<div class="container" >
    <h1 style="color: black">Mua Sản Phẩm: {{ $sanPham->nkpTenSanPham }}</h1>

    <form action="{{ route('hoadon.store', ['sanPham' => $sanPham->id]) }}" method="POST">
        @csrf
        <!-- Các trường khách hàng -->
        <div class="mb-3">
            <label for="nkpMaKhachHang" class="form-label" style="color: black">Mã Khách Hàng</label>
            <input type="text" name="nkpMaKhachHang" value="{{ Session::get('nkpMaKhachHang', '') }}" class="form-control" required readonly>
        </div>

        <div class="mb-3">
            <label for="nkpHoTenKhachHang" class="form-label" style="color: black">Họ Tên Khách Hàng</label>
            <input type="text" name="nkpHoTenKhachHang" value="{{ Session::get('username1', '') }}" class="form-control" required readonly>
        </div>

        <div class="mb-3">
            <label for="nkpEmail" class="form-label" style="color: black">Email</label>
            <input type="email" name="nkpEmail" value="{{ Session::get('nkpEmail', '') }}" class="form-control" required readonly>
        </div>

        <div class="mb-3">
            <label for="nkpDienThoai" class="form-label" style="color: black">Số Điện Thoại</label>
            <input type="text" name="nkpDienThoai" value="{{ Session::get('nkpDienThoai', '') }}" class="form-control" required readonly>
        </div>

        <div class="mb-3">
            <label for="nkpDiaChi" class="form-label" style="color: black">Địa Chỉ</label>
            <input type="text" name="nkpDiaChi" value="{{ Session::get('nkpDiaChi', '') }}" class="form-control" required readonly>
        </div>

        <!-- Chọn sản phẩm và số lượng -->
        <input type="hidden" name="nkpSanPhamId" value="{{ $sanPham->id }}" required>
        <div class="mb-3">
            <label for="nkpSoLuong" class="form-label" style="color: black">Số Lượng</label>
            <input type="number" name="nkpSoLuong" value="1" min="1" max="{{ $sanPham->nkpSoLuong }}" class="form-control" required>
        </div>

        <!-- Nút Mua -->
        <button type="submit" class="btn btn-primary">Mua Sản Phẩm</button>
        
    </form>
</div>
@endsection