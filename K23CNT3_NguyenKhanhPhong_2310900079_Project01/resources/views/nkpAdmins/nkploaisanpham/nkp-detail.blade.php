@extends('_layouts.admins._master')
@section('title','Xem THông Tin Loại Sản Phẩm')
    
@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <div class="card">
                        <div class="card-header">
                            <h1>Chi Tiết Loại Sản Phẩm</h1>
                        </div>
                        <div class="card-body">

                            <p class="card-text">
                                <b>Mã Loại:</b>
                                {{$nkploaisanpham->nkpMaLoai}}
                            </p>
                            <p class="card-text">
                                <b>Tên Loại:</b>
                                {{$nkploaisanpham->nkpTenLoai}}
                            </p>
                            <p class="card-text">
                                <b>Trạng Thái:</b>
                                {{$nkploaisanpham->nkpTrangThai}}
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('nkpadmins.nkploaisanpham')}}" class="btn btn-primary"> Back</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection