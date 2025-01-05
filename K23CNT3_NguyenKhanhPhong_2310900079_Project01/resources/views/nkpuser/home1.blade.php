@extends('_layouts.frontend.user1')

@section('title', 'Trang Chủ')

@section('content-body')
    <div class="container">
       
        <h1>Chào mừng đến với Trang Chủ</h1>
    
       

        <p>Đây là giao diện người dùng, nơi bạn có thể xem thông tin và tương tác với các tính năng của website.</p>

        <!-- Danh sách sản phẩm -->
        <div class="row">
            @foreach ($sanPhams as $sanPham)
            
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $sanPham->nkpHinhAnh) }}" class="card-img-top product-img" alt="{{ $sanPham->nkpTenSanPham }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $sanPham->nkpTenSanPham }}</h5>
                            <p class="card-text"><strong>{{ number_format($sanPham->nkpDonGia, 0, ',', '.') }} VND</strong></p>
                            <p class="card-text"><small class="text-muted">Số lượng còn lại: {{ $sanPham->nkpSoLuong }}</small></p>
                            
                            <!-- Nút xem chi tiết -->
                            <a href="{{ route('nkpuser.show', $sanPham->id) }}" class="btn btn-primary btn-sm flex " style="justify-content: center">Xem Chi Tiết</a>

                          <!-- Nút Mua và icon giỏ hàng -->
                            <a href="{{ route('sanpham.show', ['sanPham' => $sanPham->id]) }}" class="btn btn-primary btn-sm">
                                <i class="fa fa-shopping-cart"></i> Mua
                            </a>
                            

                            <!-- Thêm vào giỏ hàng -->
                        <!-- Nút "Thêm vào giỏ hàng" -->
                    <button type="button" class="btn btn-warning btn-sm add-to-cart-btn" data-id="{{ $sanPham->id }}" data-name="{{ $sanPham->nkpTenSanPham }}">
                        <i class="fa fa-cart-plus"></i> Thêm vào giỏ
                    </button>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center mt-3">
        {{ $sanPhams->links('pagination::bootstrap-5') }}
    </div>
@endsection

<!-- Thêm CSS cho layout sản phẩm -->
<style>
    .product-img {
        width: 100%;
        height: 300px;
        object-fit: cover;
    }

    .card-body {
        text-align: center;
    }

    .btn-primary, .btn-success, .btn-warning {
        margin-top: 10px;
    }

    .card {
        border: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    @media (max-width: 767px) {
        .product-img {
            height: 200px;
        }
    }

    /* Custom styling for the "Add to Cart" button */
    .add-to-cart-btn {
        background-color: #ff9800;
        color: white;
    }

    .add-to-cart-btn:hover {
        background-color: #f57c00;
        cursor: pointer;
    }
</style>

<!-- Thêm phần JavaScript để xử lý thêm vào giỏ -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Lắng nghe sự kiện click vào nút "Thêm vào giỏ hàng"
        $('.add-to-cart-btn').click(function() {
            // Lấy id và tên sản phẩm từ thuộc tính data của nút
            var productId = $(this).data('id');
            var productName = $(this).data('name');

            // Gửi yêu cầu AJAX để thêm sản phẩm vào giỏ
            $.ajax({
                url: '{{ route('cart.add') }}', // Đảm bảo route này đúng với route đã tạo ở trên
                method: 'POST',
                data: {
                    product_id: productId,
                    product_name: productName,
                    _token: '{{ csrf_token() }}' // Đừng quên gửi token CSRF
                },
                success: function(response) {
                    // Cập nhật số lượng giỏ hàng
                    $('#cart-count').text(response.cart_count);
                },
                error: function(xhr, status, error) {
                    alert('Đã có lỗi xảy ra! Hãy thử lại sau.');
                }
            });
        });
    });
</script>