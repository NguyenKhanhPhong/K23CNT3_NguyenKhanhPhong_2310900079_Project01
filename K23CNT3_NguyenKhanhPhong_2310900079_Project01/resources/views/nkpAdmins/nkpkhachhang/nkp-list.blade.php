@extends('_layouts.admins._master')
@section('title','Danh Sách Khách Hàng')

@section('content-body')
    <div class="container border mt-4">
        <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1>Danh Sách Khách Hàng</h1>
                <!-- Nút Thêm Mới -->
                <a href="/nkp-admins/nkp-khach-hang/nkp-create" class="btn btn-success btn-lg">
                    <i class="fa-solid fa-plus-circle"></i> Thêm Mới
                </a>
            </div>
        </div>

        <div class="row">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Mã Khách Hàng</th>
                        <th>Họ Tên Khách Hàng</th>
                        <th>Email</th>
                        <th>Mật Khẩu</th>
                        <th>Điện Thoại</th>
                        <th>Địa Chỉ</th>
                        <th>Ngày Đăng Ký</th>
                        <th>Trạng Thái</th>
                        <th>Chức Năng</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $stt = 0;
                    @endphp
                    @forelse ($khachhangs as $item)
                        @php
                            $stt++;
                        @endphp
                        <tr>
                            <td>{{ $stt }}</td>
                            <td>{{ $item->nkpMaKhachHang }}</td>
                            <td>{{ $item->nkpHoTenKhachHang }}</td>
                            <td>{{ $item->nkpEmail }}</td>
                            <td>{{ $item->nkpMatKhau }}</td>
                            <td>{{ $item->nkpDienThoai }}</td>
                            <td>{{ $item->nkpDiaChi }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->nkpNgayDangKy)->format('d/m/Y') }}</td> <!-- Định dạng lại ngày đăng ký -->
                            
                            <td>
                                @if($item->nkpTrangThai == 0)
                                    <span class="badge bg-success">Hoạt Động</span>
                                @elseif($item->nkpTrangThai == 1)
                                    <span class="badge bg-warning">Tạm Khóa</span>
                                @else
                                    <span class="badge bg-danger">Khóa</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <!-- Các nút chức năng với icon -->
                                <div class="btn-group" role="group">
                                    <!-- Xem chi tiết -->
                                    <a href="/nkp-admins/nkp-khach-hang/nkp-detail/{{ $item->id }}" class="btn btn-success btn-sm" title="Xem">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <!-- Chỉnh sửa -->
                                    <a href="/nkp-admins/nkp-khach-hang/nkp-edit/{{ $item->id }}" class="btn btn-primary btn-sm" title="Chỉnh sửa">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <!-- Xóa -->
                                    <a href="/nkp-admins/nkp-khach-hang/nkp-delete/{{ $item->id }}" class="btn btn-danger btn-sm" 
                                       onclick="return confirm('Bạn muốn xóa Mã Khách Hàng này không? ID: {{ $item->id }}');" title="Xóa">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center text-muted">
                                Chưa có thông tin Khách Hàng
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection