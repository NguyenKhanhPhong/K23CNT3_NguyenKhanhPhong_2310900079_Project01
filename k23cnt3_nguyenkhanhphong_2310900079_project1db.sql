-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2025 at 03:09 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `k23cnt3_nguyenkhanhphong_2310900079_project1db`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(29, '2014_10_12_000000_create_users_table', 1),
(30, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(31, '2019_08_19_000000_create_failed_jobs_table', 1),
(32, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(33, '2025_01_03_034141_create_nkp__l_o_a_i__s_a_n__p_h_a_m_table', 1),
(34, '2025_01_03_035206_create_nkp__s_a_n__p_h_a_m_table', 1),
(35, '2025_01_03_043429_create_nkp__k_h_a_c_h__h_a_n_g_table', 1),
(36, '2025_01_03_044005_create_nkp__h_o_a__d_o_n_table', 1),
(37, '2025_01_03_045332_create_nkp__c_t__h_o_a__d_o_n_table', 1),
(38, '2025_01_03_045614_create_nkp__t_i_n__t_u_c_table', 1),
(39, '2025_01_03_051518_create_nkp__q_u_a_n__t_r_i_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nkp_ct_hoa_don`
--

CREATE TABLE `nkp_ct_hoa_don` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nkpHoaDonID` bigint(20) NOT NULL,
  `nkpSanPhamID` bigint(20) NOT NULL,
  `nkpSoLuongMua` int(11) NOT NULL,
  `nkpDonGiaMua` double(8,2) NOT NULL,
  `nkpThanhTien` double NOT NULL,
  `nkpTrangThai` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nkp_ct_hoa_don`
--

INSERT INTO `nkp_ct_hoa_don` (`id`, `nkpHoaDonID`, `nkpSanPhamID`, `nkpSoLuongMua`, `nkpDonGiaMua`, `nkpThanhTien`, `nkpTrangThai`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 12, 500000.00, 6000000, 0, NULL, NULL),
(2, 2, 2, 20, 500000.00, 10000000, 0, NULL, NULL),
(3, 3, 5, 5, 500000.00, 2500000, 0, NULL, NULL),
(4, 4, 8, 3, 500000.00, 1500000, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nkp_hoa_don`
--

CREATE TABLE `nkp_hoa_don` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nkpMaHoaDon` varchar(255) NOT NULL,
  `nkpMaKhachHang` bigint(20) UNSIGNED NOT NULL,
  `nkpNgayHoaDon` date NOT NULL,
  `nkpNgayNhan` date NOT NULL,
  `nkpHoTenKhachHang` varchar(255) NOT NULL,
  `nkpEmail` varchar(255) NOT NULL,
  `nkpDienThoai` varchar(255) NOT NULL,
  `nkpDiaChi` varchar(255) NOT NULL,
  `nkpTongGiaTri` double(8,2) NOT NULL,
  `nkpTrangThai` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nkp_hoa_don`
--

INSERT INTO `nkp_hoa_don` (`id`, `nkpMaHoaDon`, `nkpMaKhachHang`, `nkpNgayHoaDon`, `nkpNgayNhan`, `nkpHoTenKhachHang`, `nkpEmail`, `nkpDienThoai`, `nkpDiaChi`, `nkpTongGiaTri`, `nkpTrangThai`, `created_at`, `updated_at`) VALUES
(1, 'HD001', 1, '2024-12-12', '2024-12-12', 'Nguyễn Khánh Phong', 'nguyenphong@gmail.com', '0375730295', 'Hà Nội', 500000.00, 2, NULL, NULL),
(2, 'HD002', 2, '2024-12-20', '2024-12-21', 'Trần Văn B', 'TranB@gmail.com', '012345678', 'Phú Thọ', 500000.00, 0, NULL, NULL),
(3, 'HD003', 3, '2024-12-17', '2024-12-17', 'Trần Văn C', 'TranC@gmail.com', '098765432', 'Quảng Ninh', 500000.00, 1, NULL, NULL),
(4, 'HD004', 1, '2024-12-12', '2024-12-12', 'Trần Văn D', 'TranD@gmail.com', '012385775', 'Hà Nội', 500000.00, 1, NULL, NULL),
(5, 'HD005', 4, '2024-12-03', '2024-12-04', 'Trần Văn E', 'TranE@gmail.com', '094357152', 'Hà Nội', 500000.00, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nkp_khach_hang`
--

CREATE TABLE `nkp_khach_hang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nkpMaKhachHang` varchar(255) NOT NULL,
  `nkpHoTenKhachHang` varchar(255) NOT NULL,
  `nkpEmail` varchar(255) NOT NULL,
  `nkpMatKhau` varchar(255) NOT NULL,
  `nkpDienThoai` varchar(255) NOT NULL,
  `nkpDiaChi` varchar(255) NOT NULL,
  `nkpNgayDangKy` date NOT NULL,
  `nkpTrangThai` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nkp_khach_hang`
--

INSERT INTO `nkp_khach_hang` (`id`, `nkpMaKhachHang`, `nkpHoTenKhachHang`, `nkpEmail`, `nkpMatKhau`, `nkpDienThoai`, `nkpDiaChi`, `nkpNgayDangKy`, `nkpTrangThai`, `created_at`, `updated_at`) VALUES
(1, 'KH001', 'Nguyễn Khánh Phong', 'nguyenphong@gmail.com', '$2y$10$ItncNlNkgZRJZZEKUbFKtO2aR0fEjv8MFwRen7UW3EkwqT.ce9OE2', '0375730295', 'Hà Nội', '2024-12-12', 0, NULL, NULL),
(2, 'KH002', 'Trần Văn B', 'TranB@gmail.com', '$2y$10$MYEs2rYK9iI6ax0jG9QZdedK/J3ugWvXFzaYovkoZMfw8cqqn5DRK', '012345678', 'Phú Thọ', '2024-12-20', 0, NULL, NULL),
(3, 'KH003', 'Trần Văn C', 'TranC@gmail.com', '$2y$10$1F8XB4F.hZufoOWt6xCt0OkQXFUxhH2BXVw4Py865rDeMZo.WPL7m', '098765432', 'Quảng Ninh', '2024-12-17', 0, NULL, '2025-01-03 00:03:12'),
(4, 'KH004', 'Trần Văn D', 'TranD@gmail.com', '$2y$10$YZw4HXlN12D5OGt7gHBSVuj.151oMp2nQ48IK12EQdqxKoQdOdLTi', '012385775', 'Hà Nội', '2024-12-03', 0, NULL, NULL),
(5, 'KH005', 'nguyenphong', 'jansaker1@gmail.com', '$2y$10$MJmF6hUrGEN.EKV2oZU1zetuvwPlBY3.J1FzgR.qn4W11XjUeLSMK', '0987612345', 'Ha Noi', '2025-01-04', 0, '2025-01-03 21:35:17', '2025-01-03 21:35:17'),
(6, 'KH006', 'phongnguyen1', 'nkp200575@gmail.com', '$2y$10$KYe5krYPp53jWEinG.hKX.3fbdm99j.8mM8wAt67WBLg9CBBnlWz.', '0758156129', 'Hà Nội', '2025-01-04', 0, '2025-01-03 22:00:15', '2025-01-03 22:00:15'),
(7, 'KH007', 'Nguyễn Văn A', 'lalala@gmail.com', '$2y$10$zrnFnrXhjMzPDoeHoViMm.CZUihg7xi2iuh9MovlSY4hlnjpgSK5m', '0375730299', 'Đà Nẵng', '2025-01-04', 0, '2025-01-04 12:01:54', '2025-01-04 12:01:54');

-- --------------------------------------------------------

--
-- Table structure for table `nkp_loai_san_pham`
--

CREATE TABLE `nkp_loai_san_pham` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nkpMaLoai` varchar(255) NOT NULL,
  `nkpTenLoai` varchar(255) NOT NULL,
  `nkpTrangThai` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nkp_loai_san_pham`
--

INSERT INTO `nkp_loai_san_pham` (`id`, `nkpMaLoai`, `nkpTenLoai`, `nkpTrangThai`, `created_at`, `updated_at`) VALUES
(1, 'AS', 'Asus', 0, NULL, '2025-01-03 00:12:00'),
(2, 'LNV', 'Lenovo', 0, NULL, '2025-01-03 00:11:55'),
(3, 'D', 'Dell', 0, NULL, '2025-01-03 00:11:49'),
(5, 'MB', 'MacBook', 0, '2025-01-04 13:04:38', '2025-01-04 13:04:47');

-- --------------------------------------------------------

--
-- Table structure for table `nkp_quan_tri`
--

CREATE TABLE `nkp_quan_tri` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nkpTaiKhoan` varchar(255) NOT NULL,
  `nkpMatKhau` varchar(255) NOT NULL,
  `nkpTrangThai` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nkp_quan_tri`
--

INSERT INTO `nkp_quan_tri` (`id`, `nkpTaiKhoan`, `nkpMatKhau`, `nkpTrangThai`, `created_at`, `updated_at`) VALUES
(1, 'nguyenphong@gmail.com', '$2y$10$ys9THAyxeJFQnhrjubXr6uryAvyCtx0yO74aU6HNzrUvQEYnFu.W2', 0, NULL, NULL),
(2, '0943572199', '$2y$10$ys9THAyxeJFQnhrjubXr6uryAvyCtx0yO74aU6HNzrUvQEYnFu.W2', 0, NULL, NULL),
(3, '0123456789', '$2y$10$Wzc50bDOHGRqrhbLn4IwSeEwH9yGNd7eMPlcLGYI5pK.gjnh//cX2', 0, NULL, NULL),
(4, 'NguyenKhanhPhong', '$2y$10$CLs7KMmnZ3qSUOuFAv8mcOAWxWxT0dZw8/n50CJDfYCrokktCqo9u', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nkp_san_pham`
--

CREATE TABLE `nkp_san_pham` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nkpMaSanPham` varchar(255) NOT NULL,
  `nkpTenSanPham` varchar(255) NOT NULL,
  `nkpHinhAnh` varchar(255) NOT NULL,
  `nkpSoLuong` int(11) NOT NULL,
  `nkpDonGia` double(8,2) NOT NULL,
  `nkpMaLoai` bigint(20) NOT NULL,
  `nkpMoTa` varchar(1000) NOT NULL,
  `nkpTrangThai` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nkp_san_pham`
--

INSERT INTO `nkp_san_pham` (`id`, `nkpMaSanPham`, `nkpTenSanPham`, `nkpHinhAnh`, `nkpSoLuong`, `nkpDonGia`, `nkpMaLoai`, `nkpMoTa`, `nkpTrangThai`, `created_at`, `updated_at`) VALUES
(1, 'AS001', 'Laptop Asus Zenbook 14', '/img/san_pham/AS.jpg', 100, 500000.00, 2, 'Laptop ngon \n            ', 0, NULL, NULL),
(2, 'LNV001', 'Laptop Lenovo IdeaPad Slim 5', '/img/san_pham/LNV.jpg', 100, 500000.00, 2, 'Laptop ngon', 0, NULL, NULL),
(3, 'D001', 'Laptop Dell Alienware m15', '/img/san_pham/Dell.jpg', 100, 500000.00, 2, 'Laptop Dell Alienware M15 là một chiếc laptop gaming cao cấp thuộc dòng Alienware, nổi tiếng với thiết kế ấn tượng, hiệu suất mạnh mẽ và khả năng chơi game vượt trội. Đây là một trong những lựa chọn hàng đầu cho những game thủ hoặc những người làm việc yêu cầu cấu hình mạnh mẽ như thiết kế đồ họa, chỉnh sửa video, hay chạy các phần mềm yêu cầu tài nguyên hệ thống cao. Dưới đây là những cảm nhận chi tiết về chiếc máy này:', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nkp_tin_tuc`
--

CREATE TABLE `nkp_tin_tuc` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nkpMaTT` varchar(255) NOT NULL,
  `nkpTieuDe` varchar(255) NOT NULL,
  `nkpMoTa` text NOT NULL,
  `nkpNoiDung` longtext NOT NULL,
  `nkpNgayDangTin` datetime NOT NULL,
  `nkpNgayCapNhap` datetime NOT NULL,
  `nkpHinhAnh` varchar(255) NOT NULL,
  `nkpTrangThai` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nkp_tin_tuc`
--

INSERT INTO `nkp_tin_tuc` (`id`, `nkpMaTT`, `nkpTieuDe`, `nkpMoTa`, `nkpNoiDung`, `nkpNgayDangTin`, `nkpNgayCapNhap`, `nkpHinhAnh`, `nkpTrangThai`, `created_at`, `updated_at`) VALUES
(1, 'sint', 'Excepturi dolor ab aliquam esse velit.', 'Non quisquam asperiores laborum et placeat illo. Et in repellendus incidunt eos. Magni et repellat autem natus.', 'Voluptas pariatur tempore distinctio in necessitatibus harum. Numquam nesciunt libero iusto pariatur tempora. Voluptatem numquam aut cumque quibusdam nisi quis. Et atque quod et odio beatae non.', '2025-01-02 01:17:57', '2025-01-02 00:18:07', 'https://via.placeholder.com/640x480.png/00dd99?text=omnis', 0, '2025-01-02 22:10:13', '2025-01-02 22:10:13'),
(2, 'delectus', 'Facilis perspiciatis mollitia enim quaerat exercitationem ratione et.', 'Tempore reiciendis consequatur temporibus voluptas voluptas. Est eaque aut consequuntur quam est et nihil. Consectetur repudiandae autem exercitationem qui provident ad corporis consequatur.', 'Rerum pariatur nam consequatur et. Porro et asperiores doloribus veniam ut vero. Eos occaecati dolorem quia. Officia est sequi mollitia. Harum praesentium doloremque enim quae commodi et. Aut est velit dolor tempora eos voluptate. Et et eaque occaecati voluptas nihil modi.', '2025-01-03 01:56:47', '2025-01-02 15:10:29', 'https://via.placeholder.com/640x480.png/00ff44?text=rerum', 1, '2025-01-02 22:10:13', '2025-01-02 22:10:13'),
(3, 'ut', 'Est ratione voluptatem quidem voluptate sequi dolor laborum.', 'Dolorem eum beatae qui laborum aspernatur nihil dolorum. Voluptatem voluptas temporibus enim nobis in cumque. Nihil est occaecati expedita voluptatibus et ut ex. Tempora id nemo omnis in omnis iure.', 'Quam perferendis magnam et eum deleniti. Ratione et quo modi et temporibus consectetur ut consequatur. Quam fugiat illum perspiciatis atque ab sit aut. Cumque ea aut dolorem.', '2025-01-02 00:23:13', '2025-01-02 07:56:50', 'https://via.placeholder.com/640x480.png/00ff99?text=aperiam', 1, '2025-01-02 22:10:13', '2025-01-02 22:10:13'),
(4, 'aut', 'Ducimus et et autem doloremque fugiat voluptatem sapiente.', 'Tempora et doloribus labore. Assumenda ex occaecati facere culpa. Maiores reiciendis rerum tenetur adipisci. Placeat numquam alias aspernatur fugit asperiores.', 'Numquam possimus doloremque eaque ea excepturi reiciendis. Natus voluptatum totam aperiam maxime consectetur. Qui fugit voluptatibus exercitationem sed excepturi. Debitis hic est nisi qui facilis repudiandae minima ea.', '2025-01-02 16:05:10', '2025-01-01 20:30:20', 'https://via.placeholder.com/640x480.png/0099ee?text=nam', 1, '2025-01-02 22:10:13', '2025-01-02 22:10:13'),
(5, 'reiciendis', 'Ea enim qui sit quis voluptate.', 'Voluptatem minima quis ut repellat quis. Sit rerum suscipit modi delectus totam. At voluptatem vitae sint iste tempore voluptates.', 'Omnis ex debitis autem non aut. Dicta esse fugit est iusto quis et exercitationem. Facere optio omnis qui praesentium ut velit. Fugiat aut eos consequatur. Itaque sunt expedita cum quis molestiae unde. Commodi vel atque incidunt iure est.', '2025-01-02 20:23:21', '2025-01-01 00:46:41', 'https://via.placeholder.com/640x480.png/00cc55?text=culpa', 0, '2025-01-02 22:10:13', '2025-01-02 22:10:13'),
(6, 'exercitationem', 'Aperiam aut soluta voluptatem rerum occaecati enim ipsam.', 'Sit voluptatem labore earum rerum voluptas dolor. Occaecati expedita sunt quos maiores qui.', 'Ut aliquam id sunt ab recusandae. Quisquam quia sit aut alias in. Incidunt ea laboriosam odio quia non placeat. Ut molestiae perspiciatis quos quis. Dolore nam qui soluta sint. Laborum molestiae id maiores et laborum porro eius. Beatae est officia illum quam maiores laudantium.', '2025-01-01 08:56:00', '2025-01-02 01:50:08', 'https://via.placeholder.com/640x480.png/00ff44?text=quam', 1, '2025-01-02 22:10:13', '2025-01-02 22:10:13'),
(7, 'iusto', 'Quibusdam error accusantium recusandae alias sed omnis eveniet.', 'Perferendis perspiciatis omnis minus quasi et dicta. Cum minima vero minus nihil iusto. Accusantium eos ut accusantium amet ad omnis voluptatem quia.', 'Et molestiae commodi eum et facilis. Delectus sapiente ab vero delectus fugiat quae mollitia nobis. Rerum molestiae quaerat est quas placeat tenetur. Debitis est non unde earum dolore iusto ut. Molestiae rerum accusantium commodi qui.', '2025-01-03 04:31:08', '2025-01-02 17:09:40', 'https://via.placeholder.com/640x480.png/004433?text=sunt', 0, '2025-01-02 22:10:13', '2025-01-02 22:10:13'),
(8, 'minima', 'Qui enim voluptatem architecto laborum facilis eveniet incidunt non.', 'Maxime aut debitis voluptas omnis quos. Quia porro porro dolores ad dignissimos. Ex error sit occaecati.', 'Sit dolorem laboriosam quo et. Tempore magni tenetur quia dignissimos cumque. Et blanditiis repudiandae molestiae rerum. Voluptatem consequatur commodi quia expedita officia. Nesciunt aliquid enim pariatur ea non ipsam at.', '2025-01-01 04:08:55', '2025-01-02 07:34:52', 'https://via.placeholder.com/640x480.png/009900?text=et', 1, '2025-01-02 22:10:13', '2025-01-02 22:10:13'),
(9, 'sapiente', 'Sint maxime provident ad ducimus aspernatur aut.', 'In voluptas magnam adipisci accusantium. Blanditiis vero deleniti ipsa sint dicta tempore temporibus. Voluptas pariatur nemo quia commodi quia labore. Qui sit voluptates et veritatis.', 'Ut velit aut quidem omnis eligendi magnam. Autem quia eos laudantium et impedit et. Tempore vel ea error velit perferendis. Consequatur aliquid voluptas enim beatae autem expedita laborum. Est sapiente ipsam sunt fugit iste ab. Aut non beatae unde doloremque ut quia. Qui eligendi modi laborum quos. Autem quis incidunt corrupti qui.', '2025-01-02 08:09:16', '2025-01-02 05:09:21', 'https://via.placeholder.com/640x480.png/0099aa?text=quos', 1, '2025-01-02 22:10:13', '2025-01-02 22:10:13'),
(10, 'cumque', 'Voluptas illo nulla voluptas.', 'Aliquam dicta perferendis ut sit quis quia voluptas nemo. Nobis quia repellat possimus sit. Sit autem excepturi corrupti.', 'Dolor natus illum eius eligendi. Voluptatum optio aut minima nemo vitae modi. Voluptate totam blanditiis nam vitae dolores reprehenderit. Quia aliquam voluptatum dignissimos aspernatur. Perferendis et soluta quo. Totam quo excepturi omnis ut.', '2025-01-01 20:47:23', '2025-01-01 08:08:54', 'https://via.placeholder.com/640x480.png/005522?text=at', 1, '2025-01-02 22:10:13', '2025-01-02 22:10:13');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nkp_ct_hoa_don`
--
ALTER TABLE `nkp_ct_hoa_don`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nkp_hoa_don`
--
ALTER TABLE `nkp_hoa_don`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nkp_hoa_don_nkpmahoadon_unique` (`nkpMaHoaDon`),
  ADD KEY `nkp_hoa_don_nkpmakhachhang_foreign` (`nkpMaKhachHang`);

--
-- Indexes for table `nkp_khach_hang`
--
ALTER TABLE `nkp_khach_hang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nkp_khach_hang_nkpmakhachhang_unique` (`nkpMaKhachHang`),
  ADD UNIQUE KEY `nkp_khach_hang_nkpemail_unique` (`nkpEmail`),
  ADD UNIQUE KEY `nkp_khach_hang_nkpdienthoai_unique` (`nkpDienThoai`);

--
-- Indexes for table `nkp_loai_san_pham`
--
ALTER TABLE `nkp_loai_san_pham`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nkp_loai_san_pham_nkpmaloai_unique` (`nkpMaLoai`);

--
-- Indexes for table `nkp_quan_tri`
--
ALTER TABLE `nkp_quan_tri`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nkp_quan_tri_nkptaikhoan_unique` (`nkpTaiKhoan`);

--
-- Indexes for table `nkp_san_pham`
--
ALTER TABLE `nkp_san_pham`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nkp_san_pham_nkpmasanpham_unique` (`nkpMaSanPham`);

--
-- Indexes for table `nkp_tin_tuc`
--
ALTER TABLE `nkp_tin_tuc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nkp_tin_tuc_nkpmatt_unique` (`nkpMaTT`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `nkp_ct_hoa_don`
--
ALTER TABLE `nkp_ct_hoa_don`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nkp_hoa_don`
--
ALTER TABLE `nkp_hoa_don`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nkp_khach_hang`
--
ALTER TABLE `nkp_khach_hang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nkp_loai_san_pham`
--
ALTER TABLE `nkp_loai_san_pham`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nkp_quan_tri`
--
ALTER TABLE `nkp_quan_tri`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nkp_san_pham`
--
ALTER TABLE `nkp_san_pham`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nkp_tin_tuc`
--
ALTER TABLE `nkp_tin_tuc`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nkp_hoa_don`
--
ALTER TABLE `nkp_hoa_don`
  ADD CONSTRAINT `nkp_hoa_don_nkpmakhachhang_foreign` FOREIGN KEY (`nkpMaKhachHang`) REFERENCES `nkp_khach_hang` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
