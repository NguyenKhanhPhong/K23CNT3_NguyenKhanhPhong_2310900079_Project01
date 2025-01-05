@extends('_layouts.admins._master')
@section('title','Create Loại Sản Phẩm')
    
@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <form action="{{route('nkpadmin.nkploaisanpham.nkpCreateSunmit')}}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h1>Thêm Mới loại sản phẩm</h1>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="nkpMaLoai" class="form-label">Mã Loại</label>
                                <input type="text" class="form-control" id="nkpMaLoai" name="nkpMaLoai" value="{{ old('nkpMaLoai') }}" >
                                @error('nkpMaLoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nkpTenLoai" class="form-label">Tên Loại</label>
                                <input type="text" class="form-control" id="nkpTenLoai" name="nkpTenLoai" value="{{ old('nkpTenLoai') }}" >
                                @error('nkpTenLoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nkpTrangThai" class="form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="nkpTrangThai1" name="nkpTrangThai" value="0" checked/>
                                    <label for="nkpTrangThai1"> Hiển Thị</label>
                                    &nbsp;
                                    <input type="radio" id="nkpTrangThai0" name="nkpTrangThai" value="1"/>
                                    <label for="nkpTrangThai0">Khóa</label>
                                </div>
                                @error('nkpTrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success">Create</button>
                            <a href="{{route('nkpadmins.nkploaisanpham')}}" class="btn btn-primary"> Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection