@extends('_layouts.admins._master')
@section('title','Xem THông Tin Khách Hàng')
    
@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <div class="card">
                        <div class="card-header">
                            <h1>Chi Tiết Khách Hàng</h1>
                        </div>
                        <div class="card-body">

                            <p class="card-text">
                                <b>Mã Khách Hàng:</b>
                                {{$nkpkhachhang->nkpMaKhachHang}}
                            </p>
                            <p class="card-text">
                                <b>Họ Tên Khách Hàng:</b>
                                {{$nkpkhachhang->nkpHoTenKhachHang}}
                            </p>
                            <p class="card-text">
                                <b>Email:</b>
                                {{$nkpkhachhang->nkpEmail}}
                            </p>

                            <p class="card-text">
                                <b>Mật Khẩu:</b>
                                {{$nkpkhachhang->nkpMatKhau}}
                            </p>

                            <p class="card-text">
                                <b>Điện Thoại:</b>
                                {{$nkpkhachhang->nkpDienThoai}}
                            </p>

                            <p class="card-text">
                                <b>Địa Chỉ:</b>
                                {{$nkpkhachhang->nkpDiaChi}}
                            </p>

                            <p class="card-text">
                                <b>Ngày Đăng Ký:</b>
                                {{$nkpkhachhang->nkpNgayDangKy}}
                            </p>

                            <p class="card-text">
                                <b>Trạng Thái:</b>
                                {{$nkpkhachhang->nkpTrangThai}}
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('nkpadmins.nkpkhachhang')}}" class="btn btn-primary"> Back</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection