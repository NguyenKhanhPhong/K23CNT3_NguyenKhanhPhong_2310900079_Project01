@extends('_layouts.admins._master')
@section('title','Xem THông Tin Khách Hàng')
    
@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <div class="card">
                        <div class="card-header">
                            <h1>Chi Tiết Hóa Đơn</h1>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <b>Mã Hóa Đơn:</b>
                                {{$nkphoadon->nkpMaHoaDon}}
                            </p>

                            <p class="card-text">
                                <b>Mã Khách Hàng:</b>
                                {{$nkphoadon->nkpMaKhachHang}}
                            </p>

                            <p class="card-text">
                                <b>Ngày Hóa Đơn:</b>
                                {{$nkphoadon->nkpNgayHoaDon}}
                            </p>

                            <p class="card-text">
                                <b>Ngày Nhận:</b>
                                {{$nkphoadon->nkpNgayNhan}}
                            </p>


                            <p class="card-text">
                                <b>Họ Tên Khách Hàng:</b>
                                {{$nkphoadon->nkpHoTenKhachHang}}
                            </p>
                            <p class="card-text">
                                <b>Email:</b>
                                {{$nkphoadon->nkpEmail}}
                            </p>


                            <p class="card-text">
                                <b>Điện Thoại:</b>
                                {{$nkphoadon->nkpDienThoai}}
                            </p>

                            <p class="card-text">
                                <b>Địa Chỉ:</b>
                                {{$nkphoadon->nkpDiaChi}}
                            </p>

                            <p class="card-text">
                                <b>Tổng Giá Trị:</b>
                                {{ number_format($nkphoadon->nkpTongGiaTri, 0, ',', '.') }} VND
                            </p>

                            <p class="card-text">
                                <b>Trạng Thái:</b>
                                {{$nkphoadon->nkpTrangThai}}
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('nkpadmins.nkphoadon')}}" class="btn btn-primary"> Back</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection