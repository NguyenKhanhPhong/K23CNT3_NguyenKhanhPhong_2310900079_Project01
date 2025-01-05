@extends('_layouts.admins._master')

@section('title', 'Chi Tiết Tin Tức')

@section('content-body')
<div class="container border mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1>Chi Tiết Tin Tức</h1>
                </div>
                <div class="card-body">
                    <!-- Mã Tin Tức -->
                    <p class="card-text">
                        <b>Mã Tin Tức:</b> {{ $vtdtinTuc->vtdMaTT }}
                    </p>

                    <!-- Tên Tin Tức -->
                    <p class="card-text">
                        <b>Tiêu Đề:</b> {{ $vtdtinTuc->vtdTieuDe }}
                    </p>

                    <p class="card-text">
                        <b>Mô Tả:</b> {{ $vtdtinTuc->vtdMoTa }}
                    </p>

                    <p class="card-text">
                        <b>Nội dung:</b> {{ $vtdtinTuc->vtdNoiDung }}
                    </p>

                    <p class="card-text">
                        <b> Ngày Cập Nhập:</b> {{ $vtdtinTuc->vtdNgayDangTin }}
                    </p>

                    <p class="card-text">
                        <b>Ngày Đăng Ký:</b> {{ $vtdtinTuc->vtdNgayCapNhap }}
                    </p>

                    <!-- Hình ảnh sản phẩm -->
                    <p class="card-text">
                        <b>Hình Ảnh:</b><br>
                        <img src="{{ asset('storage/' . $vtdtinTuc->vtdHinhAnh) }}" alt="ko" width="200" class="img-fluid">
                    </p>

                    
                    <!-- Trạng thái -->
                    <p class="card-text">
                        <b>Trạng Thái:</b>
                        @if($vtdtinTuc->vtdTrangThai == 0)
                            <span class="badge bg-success">Hiển Thị</span>
                        @else
                            <span class="badge bg-danger">Khóa</span>
                        @endif
                    </p>
                </div>
                <div class="card-footer">
                    <!-- Nút Quay lại -->
                    <a href="{{ route('vtdadmins.vtdtintuc') }}" class="btn btn-primary">Quay lại danh sách</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection