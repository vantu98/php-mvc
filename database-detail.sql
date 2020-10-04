-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 04, 2020 at 05:29 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `PHP2_STORE`
--

-- --------------------------------------------------------

--
-- Table structure for table `attr`
--

CREATE TABLE `attr` (
  `id` int(10) NOT NULL,
  `attr_name` varchar(30) DEFAULT NULL,
  `attr_slug` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attr`
--

INSERT INTO `attr` (`id`, `attr_name`, `attr_slug`) VALUES
(1, 'Color', 'color'),
(2, 'Material', 'material'),
(3, 'Sizes', 'sizes');

-- --------------------------------------------------------

--
-- Table structure for table `attr__detail`
--

CREATE TABLE `attr__detail` (
  `id` int(10) NOT NULL,
  `attr_id` int(10) DEFAULT NULL,
  `ad_name` varchar(30) DEFAULT NULL,
  `ad_value` varchar(30) DEFAULT NULL,
  `ad_slug` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attr__detail`
--

INSERT INTO `attr__detail` (`id`, `attr_id`, `ad_name`, `ad_value`, `ad_slug`) VALUES
(1, 1, 'Black', '#000000', 'black'),
(2, 1, 'White', '#ffffff', 'white'),
(3, 1, 'Orange', '#FA6701', 'orange'),
(4, 1, 'Red', '#C10A12', 'red'),
(5, 1, 'Green', '#588732', 'green'),
(6, 2, 'Canvas', 'canvas | vải', 'canvas'),
(7, 2, 'Suede', 'suede | gia lộn', 'suede'),
(8, 2, 'Leather', 'leather | da', 'leather'),
(9, 3, 'XS', 'xs', 'xs'),
(10, 3, 'S', 's', 's'),
(11, 3, 'L', 'l', 'l'),
(12, 3, 'M', 'm', 'm'),
(13, 3, 'XL', 'xl', 'xl');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `gallery_id` int(10) DEFAULT NULL,
  `c_name` varchar(50) NOT NULL,
  `c_desc` varchar(255) DEFAULT NULL,
  `c_slug` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `gallery_id`, `c_name`, `c_desc`, `c_slug`) VALUES
(1, 1, 'Uncategory', 'Sản phẩm chưa được phân loại', 'uncategory'),
(2, 16, 'Dòng Sản Phẩm', 'Đây là category của dòng sản phẩm mà shop đang bán', 'product-line'),
(3, 15, 'Giày Nữ', 'Đây là sản phẩm cho giày nữ, nam vui lòng không mang, hãy mua', 'female-shoes'),
(4, 14, 'Giày Nam', 'Đây là giày cho Nam', 'male-shoes'),
(26, 1, 'Tuỳ em', 'ádasd', 'tuy-em'),
(27, 1, 'Tuỳ Anh', 'Cay đắng cuộc đời', 'tuy-anh');

-- --------------------------------------------------------

--
-- Table structure for table `cites`
--

CREATE TABLE `cites` (
  `id` int(10) NOT NULL,
  `city_name` varchar(30) DEFAULT NULL,
  `city_slug` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cites`
--

INSERT INTO `cites` (`id`, `city_name`, `city_slug`) VALUES
(1, 'Hồ Chí Minh', 'hcm'),
(2, 'Hà Nội', 'hn'),
(3, 'Đà Nẵng', 'dn'),
(4, 'Cần Thơ', 'ct'),
(5, 'Quảng Ngãi', 'qn');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(10) NOT NULL,
  `city_id` int(10) DEFAULT NULL,
  `district_name` varchar(100) DEFAULT NULL,
  `district_slug` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `city_id`, `district_name`, `district_slug`) VALUES
(1, 1, 'Quận 1', 'quan-1'),
(2, 1, 'Quận 2', 'quan-2'),
(3, 1, 'Quận 3', 'quan-3'),
(4, 1, 'Quận 4', 'quan-4'),
(5, 1, 'Quận 5', 'quan-5'),
(6, 1, 'Quận 6', 'quan-6'),
(7, 1, 'Quận 10', 'quan-10'),
(8, 1, 'Quận Tân Phú', 'tan-phu'),
(9, 1, 'Quận Gò Vấp', 'go-vap'),
(10, 5, 'Huyện Sơn Tinh', 'son-tinh'),
(11, 5, 'Thành phố Quảng Ngãi', 'tp-quang-ngai'),
(12, 5, 'Huyện Nghĩa Hành', 'nghia-hanh');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(10) NOT NULL,
  `gt_id` int(10) DEFAULT '1',
  `g_slug` varchar(255) DEFAULT NULL,
  `g_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `gt_id`, `g_slug`, `g_name`) VALUES
(1, 1, 'https://spectraservices.com/mm5/graphics/00000001/image-not-available.png', 'image not available'),
(2, 1, 'https://ananas.vn/wp-content/uploads/pro_track6_A6T003_1.jpg', 'pro track 6 black 1'),
(3, 1, 'https://ananas.vn/wp-content/uploads/pro_track6_A6T003_2.jpg', 'pro track 6 black 2'),
(4, 1, 'https://ananas.vn/wp-content/uploads/pro_track6_A6T003_3.jpg', 'pro track 6 black 3'),
(5, 1, 'https://ananas.vn/wp-content/uploads/pro_track6_A6T003_4.jpg', 'pro track 6 black 4'),
(6, 1, 'https://ananas.vn/wp-content/uploads/pro_track6_A6T003_5.jpg', 'pro track 6 black 5'),
(8, 1, 'https://ananas.vn/wp-content/uploads/pro_track6_A6T002_1.jpg', 'pro track 6 white 1'),
(9, 1, 'https://ananas.vn/wp-content/uploads/pro_track6_A6T002_2.jpg', 'pro track 6 white 2'),
(10, 1, 'https://ananas.vn/wp-content/uploads/pro_track6_A6T002_3.jpg', 'pro track 6 white 3'),
(11, 1, 'https://ananas.vn/wp-content/uploads/pro_track6_A6T002_4.jpg', 'pro track 6 white 4'),
(12, 1, 'https://ananas.vn/wp-content/uploads/pro_track6_A6T002_5.jpg', 'pro track 6 white 5'),
(14, 1, 'https://ananas.vn/wp-content/uploads/catalogy-1.jpg', 'male shoes'),
(15, 1, 'https://ananas.vn/wp-content/uploads/catalogy-2.jpg', 'female shoes'),
(16, 1, 'https://ananas.vn/wp-content/uploads/catalogy-3.jpg', 'product line\r\n'),
(26, 1, 'http://localhost/php_2/php-mvc/uploads/avatar_origin.jpg', 'avatar_origin.jpg'),
(27, 1, 'http://localhost/php_2/php-mvc/uploads/avatar_square.jpg', 'avatar_square.jpg'),
(28, 1, 'http://localhost/php_2/php-mvc/uploads/logo.jpg', 'logo.jpg'),
(29, 1, 'http://localhost/php_2/php-mvc/uploads/zoro.png', 'zoro.png'),
(30, 1, 'http://localhost/php_2/php-mvc/uploads/avatar-copy.jpg', 'avatar-copy.jpg'),
(31, 1, 'http://localhost/php_2/php-mvc/uploads/pro_basas_A61067_1.jpg', 'pro_basas_A61067_1.jpg'),
(32, 1, 'http://localhost/php_2/php-mvc/uploads/pro_vintas_A61043_1.jpg', 'pro_vintas_A61043_1.jpg'),
(33, 1, 'http://localhost/php_2/php-mvc/uploads/stu_basas_A61003_1.jpg', 'stu_basas_A61003_1.jpg'),
(34, 1, 'http://localhost/php_2/php-mvc/uploads/stu_basas_A61013_1.jpg', 'stu_basas_A61013_1.jpg'),
(35, 1, 'http://localhost/php_2/php-mvc/uploads/stu_basas_A61015_11.jpg', 'stu_basas_A61015_11.jpg'),
(36, 1, 'http://localhost/php_2/php-mvc/uploads/stu_basas_A61018_1.jpg', 'stu_basas_A61018_1.jpg'),
(38, 1, 'http://localhost/php_2/php-mvc/uploads/pro_track6_A6T001_1.jpg', 'pro_track6_A6T001_1.jpg'),
(39, 1, 'http://localhost/php_2/php-mvc/uploads/stu_basas_A61006_1.jpg', 'stu_basas_A61006_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `galleries__types`
--

CREATE TABLE `galleries__types` (
  `id` int(10) NOT NULL,
  `gt_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `galleries__types`
--

INSERT INTO `galleries__types` (`id`, `gt_name`) VALUES
(1, 'image'),
(2, 'video');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(10) NOT NULL,
  `g_name` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `g_name`) VALUES
(1, 'male'),
(2, 'female');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders__detail`
--

CREATE TABLE `orders__detail` (
  `order_id` int(10) DEFAULT NULL,
  `p_id` int(10) DEFAULT NULL,
  `p_amount` int(10) DEFAULT NULL,
  `p_unit_price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_sku` varchar(20) DEFAULT NULL,
  `p_desc` text,
  `p_price` double DEFAULT NULL,
  `p_slug` varchar(255) DEFAULT NULL,
  `p_feature_img` int(10) DEFAULT NULL,
  `gender_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `p_name`, `p_sku`, `p_desc`, `p_price`, `p_slug`, `p_feature_img`, `gender_id`) VALUES
(2, 'ANANAS TRACK 6 - LOW TOP - TRIPLE BLACK\r\n', 'A6T003', 'Với cảm hứng từ Retro Sneakers và âm nhạc giai đoạn 1970s, Ananas Track 6 ra đời với danh hiệu là mẫu giày Cold Cement đầu tiên của Ananas - một thương hiệu giày Vulcanized. Chất liệu Storm Leather đáng giá \"càn quét\" toàn bộ bề mặt upper cùng những chi tiết thiết kế đặc trưng và mang nhiều ý nghĩa. Chắc rắng, Track 6 sẽ đem đến cho bạn sự tự nhiên thú vị như chính thông điệp bài hát Let it be của huyền thoại The Beatles gửi gắm. Màu all black huyền bí luôn có mặt trong danh sách best seller.\r\n', 990000, 'a6t003', 2, NULL),
(3, 'VINTAS THE NEW MILITARY - HIGH TOP - CAPULET OLIVE', 'A61043', 'Mang vẻ ngoài bụi bặm, mộc mạc và được lấy cảm hứng từ những bộ quân phục của nhiều binh chủng trong quân đội, Vintas \"The New Military\" đem lại một \"chất lính\" rất riêng cho những ai yêu phong cách \"Military\" và những tâm hồn điềm đạm, kiên cường đầy tinh tế.\n', 495000, 'a61043', 32, NULL),
(4, 'BASAS NEW FAMILIAR - LOW TOP - LIGHT GREY', 'A61015', 'Mang ý nghĩa là một “người bạn thân” có thể đồng hành cùng bạn trên khắp các nẻo đường,“The Familiar” không mang đến những sản phẩm cầu kì phức tạp hay đủ phá cách để bạn phấn khích và mang khoe nó với nhiều người. Nó chỉ đơn giản là mang đến cho bạn một sự lựa chọn an toàn, đa-zi-năng cho một ngày học tập, làm việc, vui chơi bình dị.\n', 420000, 'a61015', 33, NULL),
(5, 'BASAS MONO-BLACK - LOW TOP - ALL BLACK', 'A61013', 'Vẻ ngoài cổ điển. Chất màu đơn giản cùng phần đế tiệp màu, \"ton-sur-ton\" với upper. Basas \"Mono\" Pack hứa hẹn sẽ là một điểm nhấn đầy thú vị cho tủ giày của bạn.\n', 420000, 'a61013', 34, NULL),
(8, 'ANANAS TRACK 6 - LOW TOP - TRIPLE WHITE', 'A6T002', 'Với cảm hứng từ Retro Sneakers và âm nhạc giai đoạn 1970s, Ananas Track 6 ra đời với danh hiệu là mẫu giày Cold Cement đầu tiên của Ananas - một thương hiệu giày Vulcanized. Chất liệu Storm Leather đáng giá \"càn quét\" toàn bộ bề mặt upper cùng những chi tiết thiết kế đặc trưng và mang nhiều ý nghĩa. Chắc rằng, Track 6 sẽ đem đến cho bạn sự tự nhiên thú vị như chính thông điệp bài hát Let it be của huyền thoại The Beatles gửi gắm. Màu all white chắc nhiều bạn sẽ thích.\n', 990000, 'a6t002', 8, NULL),
(9, 'BASAS MONO-BLACK - HIGH TOP - ALL BLACK', 'A61018', '                    Chọn một màu đen cá tính làm chủ đạo, \"Mono-Black\" là tập hợp những sản phẩm đơn sắc cơ bản, mang đến cho bạn gợi ý vừa an toàn vừa cá tính, không quá nổi bật trong đám đông mà cũng chẳng nhạt nhòa trong đám bạn.\n', 490000, 'a61018', 36, NULL),
(10, 'BASAS BLACK LACE - LOW TOP - DARK GREY', 'A61067', 'Vẫn sử dụng những màu sắc cơ bản của Basas, \"Basas Black Lace\" Pack trở nên mạnh mẻ, ấn tượng hơn khi sử dụng dây giày màu đen làm điểm nhấn cho bản phối màu trắng-đen-xám tưởng chừng quá quen thuộc. Dáng giày low top cổ điển, đây sẽ là một lựa chọn an toàn nhưng không nhàm chán.\n', 450000, 'a61067', 31, NULL),
(11, 'BASAS MONO - LOW TOP - TAOS TAUPE', 'A61006', 'Vẻ ngoài cổ điển. Chất màu đơn giản cùng phần đế tiệp màu, \"ton-sur-ton\" với upper. Basas \"Mono\" Pack hứa hẹn sẽ là một điểm nhấn đầy thú vị cho tủ giày của bạn.\n', 450000, 'a61006', 39, NULL),
(12, 'ANANAS TRACK 6 OG - LOW TOP - 70S WHITE', 'A6T001', 'Với cảm hứng từ Retro Sneakers và âm nhạc giai đoạn 1970s, Ananas Track 6 ra đời với danh hiệu là mẫu giày Cold Cement đầu tiên của Ananas - một thương hiệu giày Vulcanized. Chất liệu Storm Leather đáng giá \"càn quét\" toàn bộ bề mặt upper cùng những chi tiết thiết kế đặc trưng và mang nhiều ý nghĩa. Chắc rằng, Track 6 sẽ đem đến cho bạn sự tự nhiên thú vị như chính thông điệp bài hát Let it be của huyền thoại The Beatles gửi gắm.\n', 990000, 'a6t001', 38, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product__attr`
--

CREATE TABLE `product__attr` (
  `p_id` int(10) DEFAULT NULL,
  `attr_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product__attr`
--

INSERT INTO `product__attr` (`p_id`, `attr_id`) VALUES
(1, 2),
(1, 6),
(2, 1),
(2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `product__images`
--

CREATE TABLE `product__images` (
  `p_id` int(10) DEFAULT NULL,
  `g_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product__images`
--

INSERT INTO `product__images` (`p_id`, `g_id`) VALUES
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `product__in_categories`
--

CREATE TABLE `product__in_categories` (
  `p_id` int(10) NOT NULL,
  `c_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product__in_categories`
--

INSERT INTO `product__in_categories` (`p_id`, `c_id`) VALUES
(1, 1),
(1, 4),
(2, 1),
(3, 4),
(4, 4),
(5, 3),
(5, 4),
(6, 3),
(6, 4),
(8, 3),
(8, 4),
(9, 4),
(10, 3),
(10, 4),
(10, 26),
(10, 27),
(11, 4),
(12, 3),
(12, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `u_name` varchar(50) DEFAULT NULL,
  `u_email` varchar(50) DEFAULT NULL,
  `u_password` varchar(100) DEFAULT NULL,
  `u_fullname` varchar(50) DEFAULT NULL,
  `city_id` int(10) DEFAULT NULL,
  `district_id` int(10) DEFAULT NULL,
  `u_address` varchar(255) DEFAULT NULL,
  `user_phone_num` varchar(15) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attr`
--
ALTER TABLE `attr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attr__detail`
--
ALTER TABLE `attr__detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `c_slug` (`c_slug`);

--
-- Indexes for table `cites`
--
ALTER TABLE `cites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `g_slug` (`g_slug`);

--
-- Indexes for table `galleries__types`
--
ALTER TABLE `galleries__types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `p_sku` (`p_sku`),
  ADD UNIQUE KEY `p_slug` (`p_slug`);

--
-- Indexes for table `product__in_categories`
--
ALTER TABLE `product__in_categories`
  ADD PRIMARY KEY (`p_id`,`c_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_name` (`u_name`),
  ADD UNIQUE KEY `u_email` (`u_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attr`
--
ALTER TABLE `attr`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attr__detail`
--
ALTER TABLE `attr__detail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `cites`
--
ALTER TABLE `cites`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `galleries__types`
--
ALTER TABLE `galleries__types`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
