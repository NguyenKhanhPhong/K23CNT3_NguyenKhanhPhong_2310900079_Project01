<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Đăng Ký</title>
    <style>
        body {
            background-color: #f8f9fa; /* Light background for the entire page */
        }
        .form-container {
            background-color: #ffffff; /* White background for the form */
            border-radius: 8px; /* Rounded corners for the form */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for the form */
            padding: 30px; /* Padding inside the form */
        }
        .form-group label {
            font-weight: bold;
        }
        .form-group .is-invalid {
            border-color: #e74a3b;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="form-container">
        <h2 class="text-center mb-4">Đăng Ký</h2>

        <!-- Display errors from backend if validation fails -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('nkpuser.nkpsignupSubmit') }}">
            @csrf

            <div class="form-group mb-3">
                <label for="nkpHoTenKhachHang">Họ và Tên</label>
                <input type="text" class="form-control @error('nkpHoTenKhachHang') is-invalid @enderror" 
                       id="nkpHoTenKhachHang" name="nkpHoTenKhachHang" value="{{ old('nkpHoTenKhachHang') }}" required>
                @error('nkpHoTenKhachHang')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="nkpEmail">Email</label>
                <input type="email" class="form-control @error('nkpEmail') is-invalid @enderror" 
                       id="nkpEmail" name="nkpEmail" value="{{ old('nkpEmail') }}" required>
                @error('nkpEmail')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="nkpMatKhau">Mật Khẩu</label>
                <input type="password" class="form-control @error('nkpMatKhau') is-invalid @enderror" 
                       id="nkpMatKhau" name="nkpMatKhau" required>
                @error('nkpMatKhau')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="nkpDienThoai">Số Điện Thoại</label>
                <input type="text" class="form-control @error('nkpDienThoai') is-invalid @enderror" 
                       id="nkpDienThoai" name="nkpDienThoai" value="{{ old('nkpDienThoai') }}" required>
                @error('nkpDienThoai')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="nkpDiaChi">Địa Chỉ</label>
                <input type="text" class="form-control @error('nkpDiaChi') is-invalid @enderror" 
                       id="nkpDiaChi" name="nkpDiaChi" value="{{ old('nkpDiaChi') }}" required>
                @error('nkpDiaChi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary btn-lg w-100">Đăng Ký</button>
        </form>

        <div class="mt-3 text-center">
            <p>Đã có tài khoản? <a href="{{ route('nkpuser.login') }}">Đăng nhập</a></p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>