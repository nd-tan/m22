-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 06, 2022 lúc 09:25 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `test`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `deleted_at`) VALUES
(7, 'Poodle', NULL),
(8, 'Pug', NULL),
(9, 'Alaska', NULL),
(10, 'Husky', NULL),
(14, 'Grass', NULL),
(53, 'ưdw', '2022-09-05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `address`, `email`, `phone`, `password`, `last_name`, `country`) VALUES
(9, 'phi', 'gio linh', 'phi@gmail.com', '2345678', '1', 'phung', 'viet nam'),
(10, 'thắng', 'gio linh', 'thang@gmail.com', '1234567', '1', 'phung', 'viet nam'),
(11, 'tan', 'cam hieu', 'tan@gmail.com', '0987654321', '1', 'đỏ', 'viet nam'),
(13, 'tâm phong', 'đông hà', 'tam@gmail.com', '1234567', '1', 'phung', 'viet nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customers_id` int(11) NOT NULL,
  `notes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_add` datetime NOT NULL,
  `total_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `name`, `last_name`, `address`, `email`, `country`, `phone`, `status`, `customers_id`, `notes`, `date_add`, `total_order`) VALUES
(1, 'tâm', 'phong', 'đông hà', 'tam@gmail.com', 'viet nam', '1234567', '', 13, 'oke', '2022-08-14 23:02:00', 9000),
(2, 'tan', 'đỏ', 'cam lo', 'tan@gmail.com', 'viet nam', '1234567', '', 11, 'nice', '2022-08-14 23:03:00', 11000),
(3, 'thắng', 'đỏ', 'gio linh', 'thang@gmail.com', 'viet nam', '1234567', '', 10, 'chủ shop đẹp trai!', '2022-08-18 22:28:00', 5000),
(4, 'phi', 'phung', 'gio linh', 'phi@gmail.com', 'viet nam', '2345678', '', 9, 'chủ shop đẹp trai!', '2022-08-18 22:38:00', 13500),
(11, 'phi', 'phung', 'gio linh', 'phi@gmail.com', 'viet nam', '2345678', '', 9, 'giao hang sau 5h chieu', '2022-09-06 11:50:00', 11000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `totalPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `orders_detail`
--

INSERT INTO `orders_detail` (`id`, `orders_id`, `quantity`, `products_id`, `totalPrice`) VALUES
(1, 1, 2, 28, 4000),
(2, 1, 1, 30, 5000),
(3, 2, 2, 34, 11000),
(4, 3, 2, 29, 5000),
(5, 4, 1, 29, 2500),
(6, 4, 2, 34, 11000),
(17, 11, 2, 29, 5000),
(18, 11, 3, 39, 6000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `age`, `color`, `price`, `image`, `gender`, `categories_id`, `quantity`, `deleted_at`) VALUES
(26, 'lux', '2 month', 'Brown', 3000, 'poodle.jpg', 'Bitch', 8, 2, NULL),
(28, 'yasuo', '2 years', 'black and while', 2000, 'alaska.jpg', 'Male_Dog', 10, 3, NULL),
(29, 'natalia', '2 weeks', 'black and while', 2500, 'husky.jpg', 'Bitch', 10, 0, NULL),
(30, 'Dark', '2 weeks', 'grown', 5000, 'golden.jpg', 'Bitch', 14, 4, NULL),
(32, 'fan', '3 weeks', 'grown', 2500, 'alaska2.jpg', 'Bitch', 9, 3, NULL),
(33, 'garen', '2 month', 'black and while', 3000, 'alaska3.jpg', 'Male_Dog', 10, 3, NULL),
(34, 'morgana', '2 years', 'while', 5500, 'alaska4.jpg', 'Bitch', 7, 4, NULL),
(38, 'caterlin', '2 weeks', 'grown', 5500, 'co5.jpg', 'Male_Dog', 7, 3, NULL),
(39, 'florentino', '2 weeks', 'black and while', 2000, 'husky1.jpg', 'Bitch', 7, 1, NULL),
(40, 'telnas', '2 weeks', 'black and while', 2000, 'husky3.jpg', 'Male_Dog', 7, 4, NULL),
(41, 'verra', '2 years', 'while', 5400, 'husky4.jpg', 'Bitch', 7, 1, NULL),
(43, 'lisanra', '2 month', 'Gray', 2500, 'pug3.jpg', 'Male_Dog', 7, 6, NULL),
(44, 'kai', '2 weeks', 'grown', 5000, 'pug4.jpg', 'Bitch', 7, 9, NULL),
(45, 'darius', '2 years', 'grown', 5000, 'pug5.jpg', 'Male_Dog', 14, 7, NULL),
(46, 'romeo', '2 month', 'Gray', 2000, 'pudle2.jpg', 'Male_Dog', 7, 5, NULL),
(48, 'oner', '2 month', 'black', 2000, 'pudle5.jpg', 'Bitch', 10, 8, NULL),
(84, 'linh', '2 week', 'while', 2222, 'samoyed.jpg', 'Male_Dog', 14, 2, NULL),
(85, 'Việt nguu', '2 month', 'grown', 2000, 'husky1.jpg', 'Male_Dog', 10, 2, NULL),
(86, 'German Glover', 'Dolor quia labore.', 'Aliquid quia deserunt sequi a distinctio nihil dolor ipsam molestiae.', 55378, 'pug3.jpg', 'Male_Dog', 8, 5, '2022-08-23'),
(102, '111111111', 'Porro cum et labore itaque aliquid illum.', 'Hic expedita quisquam tempore eum officia odit.', 256, 'hinh-anh-nhung-con-cho-de-thuong_092948873.jpg', 'Male_Dog', 10, 307, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `user_name`, `phone`, `address`, `email`, `password`) VALUES
(1, 'cuong', '123456', 'cam lo', 'cuong@gmail.com', '1'),
(2, 'phi', '123', 'gio linh', 'phi@gmail.com', '1'),
(22, 'tan', '2345678', '8972 Viva Land', 'tan@gmail.com', '1'),
(25, 'Leonard.Conn', '150-032-0293', '4690 Gia Dam', 'cuong@gmail.com', '1');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_id` (`customers_id`);

--
-- Chỉ mục cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_id` (`orders_id`),
  ADD KEY `products_id` (`products_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_id` (`categories_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customers_id`) REFERENCES `customers` (`id`);

--
-- Các ràng buộc cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD CONSTRAINT `orders_detail_ibfk_1` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `orders_detail_ibfk_2` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
