@extends('_layouts.admins._master')
@section('title','Sửa Loại Sản Phẩm')

@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <!-- Update the form action route to pass the nkpMaLoai as a parameter -->
                <form action="{{ route('nkpadmin.nkploaisanpham.nkpEditSubmit') }}" method="POST">
                    @csrf
                    <!-- Hidden input for the ID -->
                    <input type="hidden" name="id" value="{{ $nkploaisanpham->id }}">

                    <div class="card">
                        <div class="card-header">
                            <h1>Sửa loại sản phẩm</h1>
                        </div>
                        <div class="card-body">
                            <!-- Mã Loại (disabled) -->
                            <div class="mb-3">
                                <label for="nkpMaLoai" class="form-label">Mã Loại</label>
                                <input type="text" class="form-control" id="nkpMaLoai" name="nkpMaLoai" value="{{ $nkploaisanpham->nkpMaLoai }}" >
                                @error('nkpMaLoai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>

                            <!-- Tên Loại -->
                            <div class="mb-3">
                                <label for="nkpTenLoai" class="form-label">Tên Loại</label>
                                <input type="text" class="form-control" id="nkpTenLoai" name="nkpTenLoai" value="{{ old('nkpTenLoai', $nkploaisanpham->nkpTenLoai) }}" >
                                @error('nkpTenLoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Trạng Thái -->
                            <div class="mb-3">
                                <label for="nkpTrangThai" class="form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="nkpTrangThai1" name="nkpTrangThai" value="1" {{ old('nkpTrangThai', $nkploaisanpham->nkpTrangThai) == 1 ? 'checked' : '' }} />
                                    <label for="nkpTrangThai1">Khóa</label>
                                    &nbsp;
                                    <input type="radio" id="nkpTrangThai0" name="nkpTrangThai" value="0" {{ old('nkpTrangThai', $nkploaisanpham->nkpTrangThai) == 0 ? 'checked' : '' }} />
                                    <label for="nkpTrangThai0">Hiển Thị</label>
                                </div>
                                @error('nkpTrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="card-footer">
                            <!-- Change button label to "Cập nhật" (Update) -->
                            <button class="btn btn-success" type="submit">Cập nhật</button>
                            <a href="{{ route('nkpadmins.nkploaisanpham') }}" class="btn btn-primary">Trở lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection