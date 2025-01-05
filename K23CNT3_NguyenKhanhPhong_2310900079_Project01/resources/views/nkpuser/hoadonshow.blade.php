    <!-- resources/views/nkpuser/hoadonshow.blade.php -->

    @extends('_layouts.frontend.user1')  <!-- Hoặc layout của bạn -->

    @section('title', 'Thông Tin Hóa Đơn')

    @section('content-body')
    <div class="container">
        <h1>Thông Tin Hóa Đơn</h1>
        
        <div class="card">
            <div class="card-header">
                <h3>Hóa Đơn ID: {{ $hoaDon->nkpMaHoaDon }}</h3>
            </div>
            <div class="card-body">
                <p><strong>Tên Khách Hàng:</strong> {{ $hoaDon->nkpHoTenKhachHang }}</p>
                <p><strong>Email:</strong> {{ $hoaDon->nkpEmail }}</p>
                <p><strong>Số Điện Thoại:</strong> {{ $hoaDon->nkpDienThoai }}</p>
                <p><strong>Địa Chỉ:</strong> {{ $hoaDon->nkpDiaChi }}</p>
                <p><strong>Tổng Giá Trị:</strong> {{ number_format($hoaDon->nkpTongGiaTri, 0, ',', '.') }} VND</p>
                <p><strong>Ngày Hóa Đơn:</strong> {{ $hoaDon->nkpNgayHoaDon }}</p>
                <p><strong>Ngày Nhận:</strong> {{ $hoaDon->nkpNgayNhan }}</p>
                <p><strong>Trạng Thái:</strong> 
                    @if ($hoaDon->nkpTrangThai == 0)
                        Chưa Thanh Toán
                    @elseif ($hoaDon->nkpTrangThai == 1)
                        Đã Thanh Toán
                    @endif
                </p>
            </div>
            <a href="{{ route('cthoadon.create', ['hoaDonId' => $hoaDon->id, 'sanPhamId' => $sanPham->id]) }}">Tạo chi tiết hóa đơn</a>

        </div>
    </div>

    @endsection