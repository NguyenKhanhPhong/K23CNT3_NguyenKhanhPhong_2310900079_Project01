<style>
    .list-group-item{
        background-color: #3498db;     /* Màu nền ban đầu */
  color: white;                  /* Màu chữ */
  padding: 15px 30px;            /* Khoảng cách xung quanh chữ */
  font-size: 18px;               /* Kích thước chữ */
  border: 2px solid transparent; /* Viền trong suốt để không ảnh hưởng khi thay đổi */
  border-radius: 8px;            /* Bo góc */
  text-align: center;            /* Căn giữa văn bản */
  text-decoration: none;         /* Loại bỏ gạch chân (nếu là link) */
  display: inline-block;         /* Hiển thị inline block để áp dụng hiệu ứng */
  transition: all 0.3s ease;     /* Hiệu ứng chuyển đổi mượt mà cho tất cả các thuộc tính */
}
</style>
<ul class="list-group">
    <!-- Hiển thị tên tài khoản nếu đã đăng nhập -->
    <li class="list-group-item active" style="color: red; background:black;">
        @if(Session::has('username'))
            <span class="fw-bold">Hello, {{ Session::get('username') }}</span>
        @else
            <a href="/nkp-admins/login" class="text-decoration-none text-dark">Đăng nhập</a>
        @endif
    </li>

    <li class="list-group-item active" aria-current="true">
        <strong>Quản Trị Nội Dung</strong>
    </li>


    <li class="list-group-item">
        <a href="/nkp-admins/nkpdanhsachquantri/nkpdanhmuc" class="text-decoration-none text-white">Danh Sách Quản Trị</a>
    </li>

    <li class="list-group-item">
        <a href="/nkp-admins/nkp-quan-tri" class="text-decoration-none text-white">Quản trị Viên</a>
    </li>

    <li class="list-group-item">
        <a href="/nkp-admins/nkp-loai-san-pham" class="text-decoration-none text-white">Loại Sản Phẩm</a>
    </li>

    <li class="list-group-item">
        <a href="/nkp-admins/nkp-san-pham" class="text-decoration-none text-white">Sản Phẩm</a>
    </li>

    <li class="list-group-item">
        <a href="/nkp-admins/nkp-khach-hang" class="text-decoration-none text-white">Khách Hàng</a>
    </li>

    <li class="list-group-item">
        <a href="/nkp-admins/nkp-hoa-don" class="text-decoration-none text-white">Hóa Đơn</a>
    </li>

    <li class="list-group-item">
        <a href="/nkp-admins/nkp-ct-hoa-don" class="text-decoration-none text-white">Chi Tiết Hóa Đơn</a>
    </li>

    <li class="list-group-item">
        <a href="/nkp-admins/nkp-tin-tuc" class="text-decoration-none text-white">Tin Tức</a>
    </li>

</ul>

