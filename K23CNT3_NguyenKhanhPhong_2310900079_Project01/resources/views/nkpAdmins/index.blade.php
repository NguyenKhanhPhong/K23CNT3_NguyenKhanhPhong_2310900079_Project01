@extends('_layouts.admins._master')
@section('title', 'Quản Trị Nội Dung')

@section('content-body')
    <div class="container">
        <!-- Tiêu đề chính -->
        <div class="row border mb-4">
            <h1 class="nkp1">Thống Kê Hệ Thống</h1>
        </div>
        <style>
            .nkp1{
                text-align: center;
                font-size: 50px;                       /* Kích thước chữ */
                font-weight: bold;                     /* Đậm chữ */
                background-image: linear-gradient(45deg, red, orange, yellow, green, blue, indigo, violet); /* Gradient cầu vồng */
                background-size: 400% 400%;            /* Tạo không gian cho gradient di chuyển */
                color: transparent;                    /* Làm cho văn bản trong suốt để gradient có thể hiển thị */
                -webkit-background-clip: text;         /* Hỗ trợ cho các trình duyệt như Chrome và Safari */
                background-clip: text;                 /* Cho phép gradient áp dụng cho chữ */
                animation: rainbowAnimation 3s linear infinite; /* Hiệu ứng chuyển động */
                display: inline-block;
            }
            @keyframes rainbowAnimation {
      0% {
        background-position: 0% 50%;
      }
      50% {
        background-position: 100% 50%;
      }
      100% {
        background-position: 0% 50%;
      }
    }
        </style>

        <!-- Các thông tin thống kê cơ bản -->
        <div class="row">
            <!-- Số lượng người dùng -->
            <div class="col-md-4 mb-4">
                <div class="card text-white bg-primary">
                    <div class="card-header">
                        <h5 class="mb-0">Số Lượng Người Dùng</h5>
                    </div>
                    <div class="card-body">
                        <h2 class="card-title">1,250</h2>
                        <p class="card-text">Số lượng người dùng đã đăng ký trong hệ thống.</p>
                    </div>
                </div>
            </div>

            <!-- Số bài viết -->
            <div class="col-md-4 mb-4">
                <div class="card text-white bg-success">
                    <div class="card-header">
                        <h5 class="mb-0">Số Bài Viết</h5>
                    </div>
                    <div class="card-body">
                        <h2 class="card-title">825</h2>
                        <p class="card-text">Tổng số bài viết đã được đăng trên hệ thống.</p>
                    </div>
                </div>
            </div>

            <!-- Số lượt truy cập -->
            <div class="col-md-4 mb-4">
                <div class="card text-white bg-warning">
                    <div class="card-header">
                        <h5 class="mb-0">Lượt Truy Cập</h5>
                    </div>
                    <div class="card-body">
                        <h2 class="card-title">32,540</h2>
                        <p class="card-text">Tổng số lượt truy cập trên toàn bộ hệ thống.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Biểu đồ thống kê -->
        <div class="row mb-4">
            <div class="col-12">
                <h4 class="mb-3">Biểu đồ lượt truy cập theo tháng</h4>
                <canvas id="trafficChart"></canvas>
            </div>
        </div>

        <!-- Bảng chi tiết hệ thống -->
        <div class="row">
            <div class="col-12">
                <h4 class="mb-3">Chi Tiết Hệ Thống</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên Hệ Thống</th>
                            <th scope="col">Trạng Thái</th>
                            <th scope="col">Ngày Cập Nhật</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Hệ Thống Quản Lý Nội Dung</td>
                            <td><span class="badge bg-success">Hoạt Động</span></td>
                            <td>20/12/2024</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Hệ Thống Thống Kê</td>
                            <td><span class="badge bg-warning">Bảo Trì</span></td>
                            <td>15/12/2024</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Hệ Thống Gửi Thông Báo</td>
                            <td><span class="badge bg-danger">Lỗi</span></td>
                            <td>18/12/2024</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Script để vẽ biểu đồ -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('trafficChart').getContext('2d');
        var trafficChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Lượt Truy Cập',
                    data: [1200, 1900, 1500, 2200, 1800, 2500, 2700, 2400, 2600, 2800, 3000, 3200],
                    fill: false,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        enabled: true
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection