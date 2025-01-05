@extends('_layouts.admins._master')
@section('title','Chỉnh Sửa Chi Tiết Hóa Đơn')

@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <form action="{{ route('nkpadmin.nkpcthoadon.nkpEditSubmit', $nkpcthoadon->id) }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="card">
                        <div class="card-header">
                            <h1>Chỉnh Sửa Chi Tiết Hóa Đơn</h1>
                        </div>

                        <div class="mb-3">
                            <label for="nkpHoaDonID" class="form-label">Mã Hóa Đơn</label>
                            <select name="nkpHoaDonID" id="nkpHoaDonID" class="form-control">
                                @foreach ($nkphoadon as $item)
                                    <option value="{{ $item->id }}" {{ $nkpcthoadon->nkpHoaDonID == $item->id ? 'selected' : '' }}>{{ $item->nkpMaHoaDon }}</option>
                                @endforeach
                            </select>
                            @error('nkpHoaDonID')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nkpSanPhamID" class="form-label">Mã Sản Phẩm</label>
                            <select name="nkpSanPhamID" id="nkpSanPhamID" class="form-control">
                                @foreach ($nkpsanpham as $item)
                                    <option value="{{ $item->id }}" {{ $nkpcthoadon->nkpSanPhamID == $item->id ? 'selected' : '' }}>{{ $item->nkpMaSanPham }}</option>
                                @endforeach
                            </select>
                            @error('nkpSanPhamID')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nkpSoLuongMua" class="form-label">Số Lượng Mua</label>
                            <input type="number" class="form-control" id="nkpSoLuongMua" name="nkpSoLuongMua" value="{{ old('nkpSoLuongMua', $nkpcthoadon->nkpSoLuongMua) }}" min="1" oninput="calculateThanhTien()">
                            @error('nkpSoLuongMua')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nkpDonGiaMua" class="form-label">Đơn Giá Mua</label>
                            <input type="number" class="form-control" id="nkpDonGiaMua" name="nkpDonGiaMua" value="{{ old('nkpDonGiaMua', $nkpcthoadon->nkpDonGiaMua) }}" oninput="calculateThanhTien()">
                            @error('nkpDonGiaMua')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nkpThanhTien" class="form-label">Thành Tiền</label>
                            <input type="number" class="form-control" id="nkpThanhTien" name="nkpThanhTien" value="{{ old('nkpThanhTien', $nkpcthoadon->nkpThanhTien) }}" readonly>
                            @error('nkpThanhTien')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nkpTrangThai" class="form-label">Trạng Thái</label>
                            <div class="col-sm-10">
                                <input type="radio" id="nkpTrangThai0" name="nkpTrangThai" value="0" {{ $nkpcthoadon->nkpTrangThai == 0 ? 'checked' : '' }} />
                                <label for="nkpTrangThai0">Hoàn Thành</label>
                                &nbsp;
                                <input type="radio" id="nkpTrangThai1" name="nkpTrangThai" value="1" {{ $nkpcthoadon->nkpTrangThai == 1 ? 'checked' : '' }} />
                                <label for="nkpTrangThai1">Trả Lại</label>
                                &nbsp;
                                <input type="radio" id="nkpTrangThai2" name="nkpTrangThai" value="2" {{ $nkpcthoadon->nkpTrangThai == 2 ? 'checked' : '' }} />
                                <label for="nkpTrangThai2">Xóa</label>
                            </div>
                            @error('nkpTrangThai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="card-footer">
                            <button class="btn btn-success">Cập Nhật</button>
                            <a href="{{ route('nkpadmins.nkpcthoadon') }}" class="btn btn-primary">Quay lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Hàm tính Thành Tiền
        function calculateThanhTien() {
            var quantity = parseFloat(document.getElementById('nkpSoLuongMua').value);
            var unitPrice = parseFloat(document.getElementById('nkpDonGiaMua').value);
            var thanhTien = quantity * unitPrice;
            document.getElementById('nkpThanhTien').value = thanhTien.toFixed(2);  // Làm tròn đến 2 chữ số thập phân
        }
    </script>
@endsection