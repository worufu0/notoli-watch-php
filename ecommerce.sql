-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 24, 2021 at 12:11 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `mainTitle` varchar(30) NOT NULL,
  `subTitle` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `brands_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `mainTitle`, `subTitle`, `image`, `brands_id`) VALUES
(1, 'Rolex', 'Sang Trọng', 'luxury-banner.jpg', 1),
(2, 'Citizen', 'Mạnh mẽ', 'tuyet-dinh-vat-lieu-tren-dong-ho-citizen-eco-drive-super-titanium-f.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Rolex'),
(2, 'Apple'),
(3, 'Casio'),
(4, 'Omega'),
(5, 'Citizen'),
(6, 'Orient'),
(8, 'Samsung');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cart_user` varchar(100) NOT NULL,
  `cart_prodID` int(11) NOT NULL,
  `cart_prodTitle` varchar(255) DEFAULT NULL,
  `cart_quantity` int(11) NOT NULL,
  `cart_price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `cart_user`, `cart_prodID`, `cart_prodTitle`, `cart_quantity`, `cart_price`) VALUES
(252, '8', 3, 'Đồng hồ Nam Citizen AW1211-12A ', 3, 9870000),
(253, '8', 2, 'Đồng hồ Nam Citizen AN3610-55L\r\n', 2, 8064000),
(254, '8', 4, 'Đồng hồ Nam Citizen BI5070-57H\r\n', 2, 7520000),
(430, '40', 9, 'ROLEX DATEJUST 31 278273-0029', 2, 170000000),
(431, '40', 19, 'Apple Watch S5 LTE 44mm viền thép dây thép đen', 1, 18392000),
(432, '40', 18, 'Apple Watch S5 44mm viền nhôm dây cao su đen', 1, 10392000),
(433, '40', 14, 'Đồng hồ Nam Orient FAC0000EW0 - Cơ tự động', 1, 5091000),
(434, '40', 15, 'Đồng hồ Nam Orient RA-AR0001S10B - Cơ tự động', 1, 8644000);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Đồng hồ thời trang'),
(2, 'Đồng hồ thông minh');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orderDetail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unitPrice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`orderDetail_id`, `order_id`, `product_id`, `quantity`, `unitPrice`) VALUES
(136, 55, 1, 1, 2063000),
(144, 56, 8, 1, 90600000),
(138, 56, 9, 4, 85000000),
(146, 56, 10, 1, 90500000),
(143, 56, 11, 1, 6876000),
(147, 56, 12, 1, 2295000),
(140, 56, 14, 2, 5091000),
(139, 56, 15, 6, 8644000),
(141, 56, 16, 2, 5990000),
(145, 56, 19, 1, 18392000),
(142, 56, 20, 1, 11891000),
(148, 56, 31, 1, 700000);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_user_id` int(11) NOT NULL,
  `order_name` varchar(255) DEFAULT NULL,
  `order_date` date NOT NULL,
  `order_email` varchar(255) NOT NULL,
  `order_phone` varchar(30) NOT NULL,
  `order_address` varchar(300) NOT NULL,
  `order_amount` float NOT NULL,
  `order_note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_user_id`, `order_name`, `order_date`, `order_email`, `order_phone`, `order_address`, `order_amount`, `order_note`) VALUES
(54, 40, 'Nguyễn Duy Nhật', '2021-01-20', 'duynhat719@gmail.com', '+84836988085', 'Đắk Lắk', 15000000, ''),
(55, 40, 'Trần Thành Nam', '2021-01-20', 'thanhnam2000@gmail.com', '+10836988085', 'Bình Định', 3063000, ''),
(56, 40, 'Tô Ngọc Thiên Phú', '2021-01-20', 'thienphu2001@gmail.com', '+10836988085', 'Sa Đéc', 635280000, '');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `photo_id` int(11) NOT NULL,
  `photo_prod_id` int(11) NOT NULL,
  `photo_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`photo_id`, `photo_prod_id`, `photo_name`) VALUES
(1, 1, 'citizen-bi5000-87l.jpg'),
(2, 1, 'dong-ho-citicen-BI5000-87L-2_1587518940.jpg.jpg'),
(3, 1, 'dong-ho-citicen-BI5000-87L-1_1587518940.jpg.jpg'),
(4, 1, 'dong-ho-citicen-BI5000-87L-10_1587518940.jpg.jpg'),
(10, 7, 'rolex-datejust-36-126231-mat-so-vi-tinh-chocolate-day-deo-oyster.png'),
(11, 7, 'rolex-datejust-126231-mat-vi-tinh-chocolate-8.jpg'),
(12, 7, 'rolex-datejust-126231-mat-vi-tinh-chocolate-4.jpg'),
(13, 7, 'rolex-datejust-126231-mat-vi-tinh-chocolate-5.jpg'),
(14, 8, 'rolex-datejust-36-126234-mat-so-xanh.png'),
(15, 8, 'a63f2a0c7bd1868fdfc0.jpg'),
(16, 8, 'rolex-datejust-36-126234-5.jpg'),
(17, 8, 'rolex-datejust-36-126234-4.jpg'),
(18, 9, 'rolex-datejust-31-278273-0029.png'),
(19, 9, '008_Rolex-Datejust-31-Stainless-Steel-18K-White-Gold-Ladies-68274.jpg'),
(20, 9, '009_Rolex-Datejust-31-Stainless-Steel-18K-Yellow-Gold-Ladies-68273.jpg'),
(21, 9, 'b79ca7e771041d329a6cb38a9cbd7206.jpg'),
(22, 10, 'orient-ra-ag0003s10b-nam-co-tu-dong-7-org.jpg'),
(23, 10, 'm278384rbr-0029_2001ac_003.jpg'),
(24, 10, 'eda7fc5f1ffa8077a1d601a22340f9a3.jpg'),
(25, 10, 'rolex-datejust-31-278243-0014.png'),
(26, 11, 'orient-ra-ag0003s10b-nam-co-tu-dong-7-org.jpg'),
(27, 11, 'orient-ra-ag0003s10b-nam-co-tu-dong-1-1-org.jpg'),
(29, 11, 'orient-ra-ag0003s10b-nam-co-tu-dong-4-org.jpg'),
(30, 11, 'orient-ra-ag0003s10b-nam-co-tu-dong-3-org.jpg'),
(31, 11, 'orient-ra-ag0003s10b-nam-co-tu-dong-2-1-org.jpg'),
(32, 12, 'orient-fung2004f0-nam-12-org.jpg'),
(33, 12, 'orient-fung2004f0-nam-10-org.jpg'),
(34, 12, 'orient-fung2004f0-nam-7-org.jpg'),
(35, 12, 'orient-fung2004f0-nam-8-1-org.jpg'),
(36, 13, 'orient-fung2002w0-nam-cont-1-org.jpg'),
(37, 13, 'orient-fung2002w0-nam-cont-2-org.jpg'),
(38, 13, 'orient-fung2002w0-nam-cont-3-org.jpg'),
(39, 13, 'orient-fung2002w0-nam-cont-4-org.jpg'),
(40, 14, 'orient-fac0000ew0-nam-co-tu-dong-6-org.jpg'),
(41, 14, 'orient-fac0000ew0-nam-co-tu-dong-7-org.jpg'),
(42, 14, 'orient-fac0000ew0-nam-co-tu-dong-8-org.jpg'),
(43, 14, 'orient-fac0000ew0-nam-co-tu-dong-3-org.jpg'),
(44, 15, 'orient-ra-ar0001s10b-nam-co-tu-dong-5-org.jpg'),
(45, 15, 'orient-ra-ar0001s10b-nam-co-tu-dong-1-1-org.jpg'),
(46, 15, 'orient-ra-ar0001s10b-nam-co-tu-dong-2-1-org.jpg'),
(47, 15, 'orient-ra-ar0001s10b-nam-co-tu-dong-3-org.jpg'),
(50, 16, 'AW-S3-SG.1-600x600.png'),
(51, 16, 'aw_series_3_gps_38mm_mqkv2_f8fcca35953d488da40900e14f027dc2.png'),
(52, 16, 'nillkin_nillkin-3d-aw-plus-tempered-glass-screen-protector-for-apple-watch-series-3--42-mm-_full05.jpg'),
(53, 16, '047336100_1536828187-apple_watch_4.jpeg'),
(54, 17, 'apple-watch-s6-lte-40mm-vien-nhom-day-cao-su-hong-cont-2-org.jpg'),
(55, 17, 'apple-watch-s6-lte-40mm-vien-nhom-day-cao-su-hong-cont-1-org.jpg'),
(56, 17, 'apple-watch-s6-lte-40mm-vien-nhom-day-cao-su-den-9-org.jpg'),
(57, 17, 'apple-watch-s6-lte-40mm-vien-nhom-day-cao-su-den-10-org.jpg'),
(58, 18, 'apple-watch-s5-44mm-vien-nhom-day-cao-su-4-org.jpg'),
(59, 18, 'apple-watch-s5-44mm-vien-nhom-day-cao-su-5-org.jpg'),
(60, 18, 'apple-watch-series-5-ambient-wrist-1000x1000.jpg'),
(61, 19, 'apple-watch-s5-lte-day-thep-den2.jpg-org.jpg'),
(62, 19, 'apple-watch-s5-lte-day-thep-den-org.jpg'),
(63, 19, 'apple-watch-s6-lte-40mm-vien-thep-day-thep-vang-cont-1-org.jpg'),
(64, 20, 'apple-watch-s6-44mm-vien-nhom-day-cao-su-red2-org.jpg'),
(65, 20, 'apple-watch-s6-44mm-vien-nhom-day-cao-su-red1-org.jpg'),
(66, 20, 'apple-watch-s6-44mm-vien-nhom-day-cao-su-red2-2-org.jpg'),
(67, 20, 'apple-watch-s6-44mm-vien-nhom-day-cao-su-red2-2-org.jpg'),
(69, 31, '6006c1c67a4e5casio-a159wa-n1df-bac-600x600.jpg'),
(70, 31, '6006c1c67b503casio-a159wa-n1df-bac-up-2-1-org.jpg'),
(71, 31, '6006c1c67c494casio-a159wa-n1df-bac-up-4-1-org.jpg'),
(72, 31, '6006c1c67de7bcasio-a159wa-n1df-bac-up-5-1-org.jpg'),
(87, 2, '6007a857c3e42an3610_55l_1_5292d101df90437abd29b9b0fc44320f.jpg'),
(88, 2, '6007a857c674fBE9174-55E_1561093889_800x.jpg'),
(89, 2, '6007a857c7756citizen_an3610_55l_chronograph_blue_dial_men_s_watch_41mm_7_3135fdd83c07407d803aba914cd5ab38.jpg'),
(90, 2, '6007a857c871aCitizen-AN3610-55L-Nam-41mm-donghotymo.com-4.jpg'),
(103, 1, '600863cb2e1bccitizen_an3610_55l_chronograph_blue_dial_men_s_watch_41mm_7_3135fdd83c07407d803aba914cd5ab38.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `prod_cat` int(11) NOT NULL,
  `prod_brand` int(11) NOT NULL,
  `prod_title` varchar(255) NOT NULL,
  `prod_price` float NOT NULL,
  `prod_quantity` int(11) DEFAULT NULL,
  `prod_view` int(11) NOT NULL,
  `prod_tinydes` text NOT NULL,
  `prod_fulldes` text NOT NULL,
  `prod_image` text NOT NULL,
  `prod_date` datetime NOT NULL,
  `prod_origin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_cat`, `prod_brand`, `prod_title`, `prod_price`, `prod_quantity`, `prod_view`, `prod_tinydes`, `prod_fulldes`, `prod_image`, `prod_date`, `prod_origin`) VALUES
(1, 1, 5, 'Đồng hồ Nam Citizen BI5000-87L', 2063000, 994, 181, '<p>Xu hướng thiết kế chính của đồng hồ Citizen chính hãng là đơn giản và thanh lịch. Citizen luôn chú trọng đến việc đổi mới và tạo sự phong phú cho các mẫu thiết kế. Các chi tiết cũng được Citizen đầu tư kỹ lưỡng trong khâu chế tác.</p>', '<p>Xu hướng thiết kế chính của đồng hồ Citizen chính hãng là đơn giản và thanh lịch. Citizen luôn chú trọng đến việc đổi mới và tạo sự phong phú cho các mẫu thiết kế. Các chi tiết cũng được Citizen đầu tư kỹ lưỡng trong khâu chế tác.</p>', 'citizen-bi5000-87l.jpg', '2020-12-24 00:00:00', 'Hoa kì'),
(2, 1, 5, 'Đồng hồ Nam Citizen AN3610-55L', 4032000, 351, 13, '<p>Xu hướng thiết kế chính của đồng hồ Citizen chính hãng là đơn giản và thanh lịch. Citizen luôn chú trọng đến việc đổi mới và tạo sự phong phú cho các mẫu thiết kế. Các chi tiết cũng được Citizen đầu tư kỹ lưỡng trong khâu chế tác.</p>', '<p>Ý nghĩa của từ Citizen trong tiếng anh là người dân. Điều này cho thấy mong muốn của Citizen là bình dân hóa mặt hàng đồng hồ vốn xa xỉ trở nên gần gũi và phổ biến cho mọi người trên khắp thế giới. Không chỉ sản xuất các sản phẩm về đồng hồ, Citizen còn sản xuất rất nhiều các mặt hàng khác như đồ trang sức, gọng kính mắt và các sản phẩm chăm sóc sức khỏe khác.Citizen thường sử dụng thép không gỉ, vàng, titanium, kính Sapphire hay pha lê để chế tác vỏ đồng hồ, mỗi loại sẽ có những đặc tính riêng làm nổi bật lên vẻ đẹp thẩm mỹ và tăng giá trị của từng mẫu đồng hồ. Ngoài ra hãng còn tận dụng các chất liệu khác như cao su, silicone, nhựa, gốm, đá quý, kim cương nhân tạo,... để tạo nên một sản phẩm kết cấu hoàn chỉnh và chất lượng tốt nhất.</p>', 'citizen-an3610-55l-xanh-1-org.jpg', '2020-12-24 00:00:00', 'Hoa kì'),
(3, 1, 5, 'Đồng hồ Nam Citizen AW1211-12A ', 3290000, 208, 7, 'Xu hướng thiết kế chính của đồng hồ Citizen chính hãng là đơn giản và thanh lịch. Citizen luôn chú trọng đến việc đổi mới và tạo sự phong phú cho các mẫu thiết kế. Các chi tiết cũng được Citizen đầu tư kỹ lưỡng trong khâu chế tác.\r\n\r\n', 'Ý nghĩa của từ Citizen trong tiếng anh là người dân. Điều này cho thấy mong muốn của Citizen là bình dân hóa mặt hàng đồng hồ vốn xa xỉ trở nên gần gũi và phổ biến cho mọi người trên khắp thế giới.\r\n\r\nKhông chỉ sản xuất các sản phẩm về đồng hồ, Citizen còn sản xuất rất nhiều các mặt hàng khác như đồ trang sức, gọng kính mắt và các sản phẩm chăm sóc sức khỏe khác.Citizen thường sử dụng thép không gỉ, vàng, titanium, kính Sapphire hay pha lê để chế tác vỏ đồng hồ, mỗi loại sẽ có những đặc tính riêng làm nổi bật lên vẻ đẹp thẩm mỹ và tăng giá trị của từng mẫu đồng hồ.\r\n\r\nNgoài ra hãng còn tận dụng các chất liệu khác như cao su, silicone, nhựa, gốm, đá quý, kim cương nhân tạo,... để tạo nên một sản phẩm kết cấu hoàn chỉnh và chất lượng tốt nhất.', 'citizen-aw1211-12a-trang3-ga-1-org.jpg', '2020-12-24 00:00:00', 'Việt nam'),
(4, 1, 5, 'Đồng hồ Nam Citizen BI5070-57H\r\n', 3760000, 972, 1, 'Xu hướng thiết kế chính của đồng hồ Citizen chính hãng là đơn giản và thanh lịch. Citizen luôn chú trọng đến việc đổi mới và tạo sự phong phú cho các mẫu thiết kế. Các chi tiết cũng được Citizen đầu tư kỹ lưỡng trong khâu chế tác.\r\n\r\n', 'Sở hữu thiết kế sang trọng và tinh tế, chiếc đồng hồ quartz này phù hợp với các quý ông mạnh mẽ và thời thượng\r\n\r\nĐồng hồ Citizen BI5000-87L mang thương hiệu đồng hồ Citizen đến từ Nhật Bản, nổi tiếng với nhiều chiếc đồng hồ hiện đại và sang trọng.\r\n\r\nLớp vỏ ngoài bền chắc giúp đồng hồ có khả năng chịu va đập tốt.\r\n\r\n- Mặt kính của mẫu đồng hồ Citizen nam này có độ trong suốt tốt, cứng cáp, hạn chế nứt vỡ khi rơi ở độ cao vừa phải.\r\n\r\n- Bộ khung chắc chắn, khả năng chống oxi hóa và ăn mòn tốt, bảo vệ an toàn cho các chi tiết máy bên trong.\r\n\r\nHệ số chống nước 5 ATM, chiếc đồng hồ nam này vẫn an toàn khi bạn đeo đi mưa và tắm, không mang khi bơi lội hay lặn.\r\n\r\nNgười dùng nắm bắt thông tin ngày trong tháng dễ dàng hơn khi chiếc đồng hồ kim này được trang bị lịch ngày.\r\n\r\nDây đồng hồ có độ bền cao, chịu được mọi điều kiện thời tiết, dễ dàng đánh bóng như mới sau một thời gian sử dụng.', 'dong-ho-nam-citizen-bi5000-87l-trang-600x600.jpg', '2020-12-24 00:00:00', 'Việt nam'),
(5, 1, 5, 'Đồng hồ Nam Citizen BI5000-87A\r\n', 2064000, 191, 3, 'Xu hướng thiết kế chính của đồng hồ Citizen chính hãng là đơn giản và thanh lịch. Citizen luôn chú trọng đến việc đổi mới và tạo sự phong phú cho các mẫu thiết kế. Các chi tiết cũng được Citizen đầu tư kỹ lưỡng trong khâu chế tác.\r\n\r\n', 'Thiết kế sang trọng và với màu bạc tinh tế, mẫu đồng hồ quartz này phù hợp với các quý ông đẳng cấp, thời thượng\r\n\r\nĐồng hồ nam Citizen BI5000-87A mang thương hiệu đồng hồ Citizen, một trong những hãng đồng hồ nổi tiếng của Nhật Bản.\r\n\r\nLớp vỏ bên ngoài chắc chắn và cứng cáp\r\n\r\n- Chiếc đồng hồ Citizen nam này có mặt kính trong suốt, chịu lực tốt, có thể đánh bóng, làm mới khi trầy xước nhẹ.\r\n\r\n- Khung viền mẫu đồng hồ nam này bền bỉ, chống oxi hóa, hạn chế hư hỏng khi bị tác động hoặc khi rơi ở độ cao vừa phải.\r\n\r\nHệ số chống nước lên đến 5 ATM, an toàn khi đi mưa, rửa tay và đi tắm, không đeo đồng hồ khi bơi hay đi lặn\r\n\r\nĐồng hồ được trang bị lịch ngày giúp bạn thuận tiện hơn trong công việc và cuộc sống\r\n\r\nDây đeo của chiếc đồng hồ kim này có độ bền cao, chịu được mọi thời tiết khác nhau, dễ dàng lau chùi khi bám bẩn', 'dong-ho-nam-citizen-bi5000-87a-trang-600x600.jpg', '2020-12-24 00:00:00', 'Việt nam'),
(7, 1, 1, 'Rolex Datejust 126231 mặt vi tính', 33500000, 98, 12, 'Được trang bị vỏ khung từ hai hợp kim độc quyền là theo Oystersteel và vàng hồng Everose nên mẫu đồng hồ trông vừa khỏe khoắn mà lại có thể chống nước ở mức 100m. Bên dưới lớp kính sapphire là mặt số đồng hồ có màu chocolate đã được làm mới với những dòng chữ Rolex xếp lồng vào nhau.', 'Đồng Hồ Rolex Datejust 36 126231 Mặt Số Vi Tính Chocolate có size 36mm, chế tác trên 2 chất liệu vàng hồng 18k và thép không gỉ cao cấp 904L độc quyền. Mặt số vi tính được nhiều người yêu thích bởi sự độc đáo, cũng như khả năng phản chiếu dưới ánh nắng xuất sắc. Các cọc số được chế tác từ kim cương thiên nhiên đêm đến sự sang trọng và đẳng cấp. Bộ máy cơ thế hệ mới Cal 3235 trữ cót lên tới 72h cùng độ chính xác rất cao.', 'rolex-datejust-36-126231-mat-so-vi-tinh-chocolate-day-deo-oyster.png', '2021-01-03 00:00:00', 'Thụy sĩ'),
(8, 1, 1, 'ROLEX DATEJUST 36 126234 MẶT SỐ XANH', 90600000, 995, 7, 'Phiên bản Rolex 126234 mặt số xanh cùng hệ thống cọc số phủ dạ quang cùng chất liệu từ vàng trắng và thép không gỉ chính là điểm nhấn tinh tế dành cho cổ tay của những quý ông hiện đại. ', 'Đồng Hồ Rolex Datejust 36 126234-0017 Mặt Số Xanh Cọc Số Dạ Quang là một phiên bản mới trong bộ sưu tập Datejust của hãng đồng hồ Rolex.\r\n\r\nĐồng hồ Rolex Datejust mang mã hiệu 126234-0017 xuất hiện trong lớp vỏ thép cùng bộ dây deo Jubilee 5 mối nối có độ nhận diện đặc trưng trên những dòng Rolex, vành khía bezel được làm bằng vàng trắng.\r\n\r\nPhiên bản được hãng phối màu mặt số với tông màu xanh cùng với đó là hệ thống cọc số dáng gậy được phủ chất dạ quang, mang đến trải nghiệm xem giờ tốt hơn trong điều kiện thiếu ánh sáng\r\n\r\nNgười chơi đều biết rằng, từ những phiên bản mới được hãng cho ra mắt đầu năm 2019 thì đều có nhiều cải tiến thay đổi tinh tế từ ngoại hình, nhận diện mặt số, cỗ máy đều đem đến cho người dùng nhiều trải nghiệm tốt hơn, đặc biệt đó là việc nâng cấp cỗ máy với hàng loạt cải tiến cùng 14 bằng sáng chế, nâng cấp hữu ích thời lượng trữ cót lên tới 70 giờ. Ống kính Cyclops khuếch đại màn hình phụ hiển thị ngày, tăng độ hiển thị ngày nhằm mục đích đọc dễ dàng.\r\n\r\nPhiên bản được trang bị với calibre 3235, một máy cơ tự lên dây được phát triển và chế tác bởi Rolex. Bộ chuyển động cơ học tự lên dây này nắm vị trí dẫn đầu trong nghệ thuật chế tác đồng hồ. Một kiệt tác nghệ thuật tuyệt vời của công nghệ Rolex, với 14 bằng sáng chế, chiếc đồng hồ cung cấp những lợi ích cơ bản về độ chuẩn xác, dự trữ điện năng, chống chấn động và từ trường, dễ sử dụng và đáng tin cậy. Kết hợp chặt chẽ với bộ thoát Chronergy được Rolex cấp bằng sáng chế, chiếc đồng hồ này tận dụng được hiệu quả năng lượng cao và đáng tin cậy. Được làm từ chất liệu kền-phốt pho, đồng thời tránh được các tác động nhiễu từ cho sản phẩm.\r\n\r\nDây đeo đồng hồ kim loại Jubilee có thiết kế mềm mại và thoải mái với mối nối năm mảnh và được đặc biệt chế tác đi kèm với sự ra mắt của Oyster Perpetual Datejust vào năm 1945.', 'rolex-datejust-36-126234-mat-so-xanh.png', '2021-01-04 00:00:00', 'Thụy sĩ'),
(9, 1, 1, 'ROLEX DATEJUST 31 278273-0029', 85000000, 79, 19, 'Rolex Datejust là hình mẫu của đồng hồ cổ điển nhờ vào các tính năng và thẩm mỹ luôn hợp thời. Ra mắt vào năm 1945, tuy bộ sưu tập có thiết kế đơn giản nhưng nó đã trở thành dấu mốc quan trọng trong sự phát triển của đồng hồ bởi cơ chế chuyển ngày nhanh. ', 'Đồng hồ Rolex Datejust 31 278273-0029 là sự giao thoa tuyệt vời giữa chất liệu vàng vàng 18k và chất liệu thép (Oystersteel). Sự kết hợp giữa hai chất liệu bền bỉ và đẹp mắt này đã giúp Rolex tạo ra một sản phẩm đồng hồ có vẻ đẹp sang trọng và hoàn mỹ.\r\n\r\nVới những chiếc đồng hồ sử dụng hai chất liệu, Rolex luôn tạo ra điểm nhấn cho vành bezel, cụ thể với chiếc đồng hồ này, Rolex sử dụng chất liệu vàng vàng 18k, hấp dẫn giới mộ điệu bởi bezel có rãnh. Độ tỉ mỉ từ vành bezel kết hợp với ánh sáng vàng sang trọng từ vàng vàng khiến người xem càng chiêm ngưỡng càng mê mẩn.\r\n\r\nKế tiếp vành bezel bằng vàng vàng 18k chính là mặt số màu xanh ô liu chải tia vô cùng tinh tế. Cọc số chỉ giờ kim cương lấp lánh hay còn gọi là cọc số index nổi bật trên nền mặt số màu xanh. Chi tiết này càng làm tăng thêm sức hấp dẫn cho chiếc Rolex Datejust 31 278273-0029 này. Mặt kính đồng hồ được làm từ Sapphire có khả năng chống xước và chống phản quang hiệu quả, nên người sử dụng có thể xem giờ dễ hơn khi ở ngoài trời.\r\n\r\nDây đeo Oyster mối nối 3 mảnh là sự kết hợp hoàn hảo giữa vàng vàng và Oystersteel với mối nối ở giữa làm từ vàng vàng 18k nổi bật, hai mối nối hai bên là Oystersteel màu trắng bạc. \r\n\r\nĐồng hồ Rolex Datejust 31 278273-0029 được trang bị bộ máy lên cót tự động Caliber 2236. Bộ máy được sản xuất độc quyền bởi Rolex. Bộ máy hoạt động vô cùng chính xác với sai số xảy ra vô cùng nhỏ, sau khi được lắp đặt hoàn chỉnh, bộ máy chỉ sai số với ± 2 giây / ngày. Có thể nói độ chính xác của chiếc đồng hồ Rolex Datejust 31 278273-0029 là gần như tuyệt đối. Bộ máy trữ cót khá tốt, thời gian trữ cót của bộ máy là 55 giờ. Nhờ được hoàn thiện bởi lớp vỏ bằng thép không gỉ, nên bộ máy Cal 2236 ở bên trong chiếc Rolex Datejust 31 278273-0029 luôn được bảo vệ rất tốt tránh được những tác nhân không tốt từ môi trường trường bên ngoài. Bởi có sự bảo vệ này mà bộ máy có thể chịu được áp lực nước là 10 ATM (100 mét).\r\n\r\nRolex Datejust 31 278273-0029 có kích thước 31mm, rất vừa vặn trên cổ tay của các quý cô. Quý cô nếu bị thuyết phục bởi vẻ đẹp và độ chính xác của chiếc đồng hồ này hãy liên hệ ngay với Boss Luxury để sở hữu mãu đồng hồ với mức giá tốt nhất nhé.', 'rolex-datejust-31-278273-0029.png', '2021-01-11 00:00:00', 'Thụy sĩ'),
(10, 1, 1, 'ROLEX DATEJUST 31 278243-0014', 90500000, 94, 5, 'Rolex Datejust là hình mẫu của đồng hồ cổ điển nhờ vào các tính năng và thẩm mỹ luôn hợp thời. Ra mắt vào năm 1945, tuy bộ sưu tập có thiết kế đơn giản nhưng nó đã trở thành dấu mốc quan trọng trong sự phát triển của đồng hồ bởi cơ chế chuyển ngày nhanh. ', 'Đồng hồ Rolex Datejust 31 278243-0014 là sự giao thoa tuyệt vời giữa chất liệu vàng vàng 18k và chất liệu thép (Oystersteel). Sự kết hợp giữa hai chất liệu bền bỉ và đẹp mắt này đã giúp Rolex tạo ra một sản phẩm đồng hồ có vẻ đẹp sang trọng và hoàn mỹ.\r\n\r\nVới những chiếc đồng hồ sử dụng hai chất liệu, Rolex luôn tạo ra điểm nhấn cho vành bezel, cụ thể với chiếc đồng hồ này, Rolex sử dụng chất liệu vàng vàng 18k, hấp dẫn giới mộ điệu bởi độ bóng hoàn hảo. Độ bóng bẩy từ vành bezel kết hợp với ánh sáng vàng sang trọng từ vàng vàng khiến người xem càng chiêm ngưỡng càng mê mẩn.\r\n\r\nKế tiếp vành bezel bằng vàng 18k chính là mặt số màu champagne vô cùng tinh tế. Cọc số chỉ giờ sử dụng dạng index khá rõ nét. Chi tiết này càng làm tăng thêm sức hấp dẫn cho chiếc Rolex Datejust 31 278243-0014 này của Rolex. Mặt kính đồng hồ được làm từ Sapphire có khả năng chống xước và chống phản quang hiệu quả, nên người sử dụng có thể xem giờ dễ hơn khi ở ngoài trời.\r\n\r\nDây đeo Jubilee mối nối 5 mảnh là sự kết hợp hoàn hảo giữa vàng vàng và Oystersteel với 3 mối nối ở giữa làm từ vàng vàng 18k nổi bật, hai mối nối hai bên là Oystersteel màu trắng bạc. \r\n\r\nĐồng hồ Rolex Datejust 31 278243-0014 được trang bị bộ máy lên cót tự động Caliber 2236. Bộ máy được sản xuất độc quyền bởi Rolex. Bộ máy hoạt động vô cùng chính xác với sai số xảy ra vô cùng nhỏ, sau khi được lắp đặt hoàn chỉnh, bộ máy chỉ sai số với ± 2 giây / ngày. Có thể nói độ chính xác của chiếc đồng hồ Rolex Datejust 31 278243-0014 là gần như tuyệt đối. Bộ máy trữ cót khá tốt, thời gian trữ cót của bộ máy là 55 giờ. Nhờ được hoàn thiện bởi lớp vỏ bằng thép không gỉ, nên bộ máy Cal 2236 ở bên trong chiếc Rolex Datejust 31 278243-0014 luôn được bảo vệ rất tốt tránh được những tác nhân không tốt từ môi trường trường bên ngoài. Bởi có sự bảo vệ này mà bộ máy có thể chịu được áp lực nước là 10 ATM (100 mét).\r\n\r\nRolex Datejust 31 278243-0014 có kích thước 31mm, rất vừa vặn trên cổ tay của các quý cô. Quý cô nếu bị thuyết phục bởi vẻ đẹp và độ chính xác của chiếc đồng hồ này hãy liên hệ ngay với Boss Luxury để sở hữu mãu đồng hồ với mức giá tốt nhất nhé.', 'rolex-datejust-31-278243-0014.png', '2021-01-06 00:00:00', 'Thụy sĩ'),
(11, 1, 6, 'Đồng hồ Nam Orient RA-AG0003S10B - Cơ tự động', 6876000, 87, 14, 'Orient là một trong những thương hiệu đồng hồ nổi tiếng trên toàn thế giới. Và nếu bạn đang thắc mắc rằng: Đồng hồ Orient là của nước nào? Ưu điểm và dòng sản phẩm nổi bật là gì? Hãy cùng tìm hiểu thông qua bài viết dưới đây.', 'Orient là thương hiệu đồng hồ của Nhật Bản, chính thức được sáng lập từ những năm 1950 bởi Shogoro Yoshida.\r\n\r\nSản phẩm của Orient thường sử dụng chất liệu dây da và kim loại được chế tác tỉ mỉ tôn lên vẻ sang trọng, kết hợp cùng mặt kính khoáng và kính sapphire tạo độ chắc chắn của sản phẩm cũng như có phần máy cơ tự động bền bỉ.\r\nChính vì lẽ đó, thương hiệu này đã giành được vị trí số 3 trong hàng chục thương hiệu đồng hồ Nhật Bản về cả doanh thu lẫn chất lượng.\r\n\r\nHiện tại, đối tượng khách hàng mà Orient đang hướng tới chính là những doanh nhân, nhân viên văn phòng và cả những người có thu nhập tầm trung.\r\nCác dòng sản phẩm của thương hiệu đồng hồ Orient\r\nĐồng hồ Orient có 2 dòng chính: Orient và Orient Star.\r\n\r\nOrient\r\nTrong nhóm sản phẩm mang thương hiệu Orient được phân thành 3 dòng sản phẩm chính với những đặc trưng riêng biệt. \r\n\r\n- Classic\r\n\r\nDòng Classic mang đậm dấu ấn cổ điển đầy tinh tế với kim và những chi tiết khắc sâu, tinh xảo nhất ở mặt đồng hồ. \r\n\r\nDù có thiết kế cổ xưa và khá thân thuộc, nhưng những chiếc đồng hồ Classic Orient trải qua thời gian ngày càng được khách hàng quan tâm, trở thành những chiếc đồng hồ đeo tay nam rất được yêu thích.', 'orient-ra-ag0003s10b-nam-co-tu-dong-7-org.jpg', '2021-01-04 00:00:00', 'Nhật bản'),
(12, 1, 6, 'Đồng hồ Nam Orient FUNG2004F0\r\n', 2295000, 987, 7, 'Đồng hồ Orient đem đến những sản phẩm ấn tượng chinh phục người nhìn một cách nhanh chóng. Đồng hồ Orient với những chất liệu cao cấp bóng bẩy nâng tầm đẳng cấp cho người sở hữu, phù hợp với doanh nhân thành đạt, dân văn phòng hay các giám đốc công ty. Phong cách thời thượng, sang trọng đầy sức thu hút đến từ đồng hồ Orient chắc chắn sẽ khiến bạn luôn hãnh diện với những người xung quanh.', 'Orient là thương hiệu đồng hồ của Nhật Bản, chính thức được sáng lập từ những năm 1950 bởi Shogoro Yoshida.\r\n\r\nSản phẩm của Orient thường sử dụng chất liệu dây da và kim loại được chế tác tỉ mỉ tôn lên vẻ sang trọng, kết hợp cùng mặt kính khoáng và kính sapphire tạo độ chắc chắn của sản phẩm cũng như có phần máy cơ tự động bền bỉ.\r\nChính vì lẽ đó, thương hiệu này đã giành được vị trí số 3 trong hàng chục thương hiệu đồng hồ Nhật Bản về cả doanh thu lẫn chất lượng.\r\n\r\nHiện tại, đối tượng khách hàng mà Orient đang hướng tới chính là những doanh nhân, nhân viên văn phòng và cả những người có thu nhập tầm trung.\r\nOrient\r\nTrong nhóm sản phẩm mang thương hiệu Orient được phân thành 3 dòng sản phẩm chính với những đặc trưng riêng biệt. \r\n\r\n- Classic\r\n\r\nDòng Classic mang đậm dấu ấn cổ điển đầy tinh tế với kim và những chi tiết khắc sâu, tinh xảo nhất ở mặt đồng hồ. \r\n\r\nDù có thiết kế cổ xưa và khá thân thuộc, nhưng những chiếc đồng hồ Classic Orient trải qua thời gian ngày càng được khách hàng quan tâm, trở thành những chiếc đồng hồ đeo tay nam rất được yêu thích.', 'orient-fung2004f0-nam-12-org.jpg', '2021-01-07 00:00:00', 'Nhật bản'),
(13, 1, 6, 'Đồng hồ Nam Orient FUNG2002W0', 2006000, 998, 2, 'Đồng hồ Orient đem đến những sản phẩm ấn tượng chinh phục người nhìn một cách nhanh chóng. Đồng hồ Orient với những chất liệu cao cấp bóng bẩy nâng tầm đẳng cấp cho người sở hữu, phù hợp với doanh nhân thành đạt, dân văn phòng hay các giám đốc công ty. Phong cách thời thượng, sang trọng đầy sức thu hút đến từ đồng hồ Orient chắc chắn sẽ khiến bạn luôn hãnh diện với những người xung quanh.', 'Orient là thương hiệu đồng hồ của Nhật Bản, chính thức được sáng lập từ những năm 1950 bởi Shogoro Yoshida.\r\n\r\nSản phẩm của Orient thường sử dụng chất liệu dây da và kim loại được chế tác tỉ mỉ tôn lên vẻ sang trọng, kết hợp cùng mặt kính khoáng và kính sapphire tạo độ chắc chắn của sản phẩm cũng như có phần máy cơ tự động bền bỉ.\r\nChính vì lẽ đó, thương hiệu này đã giành được vị trí số 3 trong hàng chục thương hiệu đồng hồ Nhật Bản về cả doanh thu lẫn chất lượng.\r\n\r\nHiện tại, đối tượng khách hàng mà Orient đang hướng tới chính là những doanh nhân, nhân viên văn phòng và cả những người có thu nhập tầm trung.\r\nDòng Classic mang đậm dấu ấn cổ điển đầy tinh tế với kim và những chi tiết khắc sâu, tinh xảo nhất ở mặt đồng hồ. \r\n\r\nDù có thiết kế cổ xưa và khá thân thuộc, nhưng những chiếc đồng hồ Classic Orient trải qua thời gian ngày càng được khách hàng quan tâm, trở thành những chiếc đồng hồ đeo tay nam rất được yêu thích.', 'orient-fung2002w0-nam-cont-1-org.jpg', '2020-12-08 00:00:00', 'Nhật bản'),
(14, 1, 6, 'Đồng hồ Nam Orient FAC0000EW0 - Cơ tự động', 5091000, 984, 21, 'Đồng hồ Orient đem đến những sản phẩm ấn tượng chinh phục người nhìn một cách nhanh chóng. Đồng hồ Orient với những chất liệu cao cấp bóng bẩy nâng tầm đẳng cấp cho người sở hữu, phù hợp với doanh nhân thành đạt, dân văn phòng hay các giám đốc công ty. Phong cách thời thượng, sang trọng đầy sức thu hút đến từ đồng hồ Orient chắc chắn sẽ khiến bạn luôn hãnh diện với những người xung quanh.\r\n\r\n', 'Đồng hồ Orient đem đến những sản phẩm ấn tượng chinh phục người nhìn một cách nhanh chóng. Đồng hồ Orient với những chất liệu cao cấp bóng bẩy nâng tầm đẳng cấp cho người sở hữu, phù hợp với doanh nhân thành đạt, dân văn phòng hay các giám đốc công ty. Phong cách thời thượng, sang trọng đầy sức thu hút đến từ đồng hồ Orient chắc chắn sẽ khiến bạn luôn hãnh diện với những người xung quanh.\r\n\r\nĐồng hồ Orient đem đến những sản phẩm ấn tượng chinh phục người nhìn một cách nhanh chóng. Đồng hồ Orient với những chất liệu cao cấp bóng bẩy nâng tầm đẳng cấp cho người sở hữu, phù hợp với doanh nhân thành đạt, dân văn phòng hay các giám đốc công ty. Phong cách thời thượng, sang trọng đầy sức thu hút đến từ đồng hồ Orient chắc chắn sẽ khiến bạn luôn hãnh diện với những người xung quanh.\r\n\r\nĐồng hồ Orient đem đến những sản phẩm ấn tượng chinh phục người nhìn một cách nhanh chóng. Đồng hồ Orient với những chất liệu cao cấp bóng bẩy nâng tầm đẳng cấp cho người sở hữu, phù hợp với doanh nhân thành đạt, dân văn phòng hay các giám đốc công ty. Phong cách thời thượng, sang trọng đầy sức thu hút đến từ đồng hồ Orient chắc chắn sẽ khiến bạn luôn hãnh diện với những người xung quanh.\r\n\r\n', 'orient-fac0000ew0-nam-co-tu-dong-6-org.jpg', '2021-01-13 00:00:00', 'Nhật bản'),
(15, 1, 6, 'Đồng hồ Nam Orient RA-AR0001S10B - Cơ tự động', 8644000, 900, 5, 'Đồng hồ Orient đem đến những sản phẩm ấn tượng chinh phục người nhìn một cách nhanh chóng. Đồng hồ Orient với những chất liệu cao cấp bóng bẩy nâng tầm đẳng cấp cho người sở hữu, phù hợp với doanh nhân thành đạt, dân văn phòng hay các giám đốc công ty. Phong cách thời thượng, sang trọng đầy sức thu hút đến từ đồng hồ Orient chắc chắn sẽ khiến bạn luôn hãnh diện với những người xung quanh.', 'Đồng hồ Orient đem đến những sản phẩm ấn tượng chinh phục người nhìn một cách nhanh chóng. Đồng hồ Orient với những chất liệu cao cấp bóng bẩy nâng tầm đẳng cấp cho người sở hữu, phù hợp với doanh nhân thành đạt, dân văn phòng hay các giám đốc công ty. Phong cách thời thượng, sang trọng đầy sức thu hút đến từ đồng hồ Orient chắc chắn sẽ khiến bạn luôn hãnh diện với những người xung quanh.Đồng hồ Orient đem đến những sản phẩm ấn tượng chinh phục người nhìn một cách nhanh chóng. Đồng hồ Orient với những chất liệu cao cấp bóng bẩy nâng tầm đẳng cấp cho người sở hữu, phù hợp với doanh nhân thành đạt, dân văn phòng hay các giám đốc công ty. Phong cách thời thượng, sang trọng đầy sức thu hút đến từ đồng hồ Orient chắc chắn sẽ khiến bạn luôn hãnh diện với những người xung quanh.Đồng hồ Orient đem đến những sản phẩm ấn tượng chinh phục người nhìn một cách nhanh chóng. Đồng hồ Orient với những chất liệu cao cấp bóng bẩy nâng tầm đẳng cấp cho người sở hữu, phù hợp với doanh nhân thành đạt, dân văn phòng hay các giám đốc công ty. Phong cách thời thượng, sang trọng đầy sức thu hút đến từ đồng hồ Orient chắc chắn sẽ khiến bạn luôn hãnh diện với những người xung quanh.Đồng hồ Orient đem đến những sản phẩm ấn tượng chinh phục người nhìn một cách nhanh chóng. Đồng hồ Orient với những chất liệu cao cấp bóng bẩy nâng tầm đẳng cấp cho người sở hữu, phù hợp với doanh nhân thành đạt, dân văn phòng hay các giám đốc công ty. Phong cách thời thượng, sang trọng đầy sức thu hút đến từ đồng hồ Orient chắc chắn sẽ khiến bạn luôn hãnh diện với những người xung quanh.', 'orient-ra-ar0001s10b-nam-co-tu-dong-5-org.jpg', '2021-01-09 00:00:00', 'Nhật bản'),
(16, 2, 2, 'Apple Watch S3 GPS 38mm viền nhôm dây cao su', 5990000, 480, 10, 'Apple Watch S3 GPS không có nhiều sự khác biệt so với thế hệ Apple Watch S2 với phần mặt được chế tác từ chất liệu nhôm tổng hợp cứng cáp và sang trọng. Nút khóa dây kim loại hình tròn được hoàn thiện với các họa tiết đồng tâm đem lại điểm nhấn cho thiết bị. Đây sẽ là sự lựa chọn phù hợp dành cho các bạn trẻ năng động.', 'Apple Watch S3 GPS không có nhiều sự khác biệt so với thế hệ Apple Watch S2 với phần mặt được chế tác từ chất liệu nhôm tổng hợp cứng cáp và sang trọng.\r\n\r\nNút khóa dây kim loại hình tròn được hoàn thiện với các họa tiết đồng tâm đem lại điểm nhấn cho thiết bị. Đây sẽ là sự lựa chọn phù hợp dành cho các bạn trẻ năng động.\r\nApple Watch Series 3 được trang bị màn hình cảm ứng AMOLED 1.5 inch, độ phân giải 340 x 272 pixels với mặt kính cường lực Ion-X strengthened glass cho độ bền ấn tượng.\r\n\r\nĐộ sáng màn hình khá cao giúp bạn dễ dàng quan sát nội dung ngay cả dưới điều kiện ánh sáng mạnh.\r\nĐược trang bị hệ thống định vị GPS, Đồng hồ thông minh Apple Watch Series 3 hỗ trợ tốt trong quá trình tập thể dục.\r\n\r\nBạn có thể theo dõi được mọi thông tin một cách chính xác nhất, giám sát sức khỏe, cập nhật thông tin dựa trên vị trí địa lý mà không cần kết nối với iPhone.', 'AW-S3-SG.1-600x600.png', '2021-01-06 00:00:00', 'Hoa kì'),
(17, 2, 2, 'Apple Watch S6 LTE 40mm viền nhôm dây cao su', 13591000, 998, 4, 'Apple Watch S6 LTE 40mm viền nhôm dây cao su mang nét sang trọng và đẳng cấp. Nó sở hữu mặt kính cường lực Ion-X strengthened glass chống trầy xước, màn hình 1.57 inch hiển thị hình ảnh sắc nét cùng dây đeo cao su êm ái, dẻo dai, không thấm nước, mang lại cảm giác dễ chịu khi đeo trong thời gian dài.', 'Sở hữu chip S6 cho hiệu năng cao hơn dòng chip S-series đời trước\r\nApple Watch Series 6 được trang bị chip S6 hoàn toàn mới, đây là một bước tiến vượt bậc, cho tốc độ xử lý nhanh hơn 20% so với dòng chip S5.Sở hữu chip S6 cho hiệu năng cao hơn dòng chip S-series đời trước\r\nApple Watch Series 6 được trang bị chip S6 hoàn toàn mới, đây là một bước tiến vượt bậc, cho tốc độ xử lý nhanh hơn 20% so với dòng chip S5.Apple Watch 2020 được trang bị cảm biến SpO2 giúp theo dõi nồng độ oxy trong máu chỉ trong thời gian 15 giây, bên cạnh đó Apple cũng tích hợp tính năng đo điện tâm đồ ECG giúp người dùng theo dõi sức khỏe mình tốt hơn.\r\n\r\nLưu ý: Tính năng này hiện không khả dụng ở Việt Nam.', 'apple-watch-s6-lte-40mm-vien-nhom-day-cao-su-hong-cont-2-org.jpg', '2021-01-01 00:00:00', 'Hoa kỳ'),
(18, 2, 2, 'Apple Watch S5 44mm viền nhôm dây cao su đen', 10392000, 961, 8, 'Apple Watch S5 44 mm nâng cấp nhẹ so với chiếc S4 tiền nhiệm. Apple Watch S5 có thiết kế sang trọng, dây đeo silicone mềm mại và đặc biệt là màn hình OLED luôn bật lần đầu tiên xuất hiện trên các sản phẩm đồng hồ thông minh của Apple.', 'Apple Watch S5 44 mm nâng cấp nhẹ so với chiếc S4 tiền nhiệm. Apple Watch S5 có thiết kế sang trọng, dây đeo silicone mềm mại và đặc biệt là màn hình OLED luôn bật lần đầu tiên xuất hiện trên các sản phẩm đồng hồ thông minh của Apple.\r\nMàn hình OLED luôn hiển thị trên đồng hồ Apple Watch giúp người xem có thể tiện lợi xem giờ và thông báo bất kì lúc nào. Ánh sáng màn hình sẽ tự động giảm xuống để tối đa thời lượng pin.\r\nBên cạnh tính năng định vị bằng GPS, đồng hồ trang bị tính năng xác định phương hướng với la bàn từ tính - đây là điểm cải tiến so với các dòng Apple Watch trước đây. Với tính năng này, bạn có thể dễ dàng xác định phương hướng ở những nơi không có mạng Internet hay GPS không định vị được.\r\nTính năng gọi khẩn cấp nay đã có ở nhiều nơi hơn, khi bạn nhấn gọi khẩn cấp, đồng hồ sẽ gọi cứu hộ của địa phương. Apple nêu rõ các địa phương không được hỗ trợ,', 'apple-watch-s5-44mm-vien-nhom-day-cao-su-4-org.jpg', '2021-01-04 00:00:00', 'Hoa kì'),
(19, 2, 2, 'Apple Watch S5 LTE 44mm viền thép dây thép đen', 18392000, 993, 9, 'Apple Watch S5 LTE 44mm viền thép dây thép được thiết kế bằng dây thép Milanese sang trọng hơn rất nhiều nhờ viền thép mạnh mẽ và dây đeo thiết kế dạng lưới đan mỏng xuất phát từ vùng đất Milan xinh đẹp, vừa mềm mại, lại vừa quý phái. Đồng thời, màn hình đồng hồ có viền mỏng hơn, trọng lượng nhẹ hơn, màn hình lớn hơn mang lại sự trải nghiệm đẳng cấp hơn.', 'Apple Watch S5 LTE 44mm viền thép dây thép được thiết kế bằng dây thép Milanese sang trọng hơn rất nhiều nhờ viền thép mạnh mẽ và dây đeo thiết kế dạng lưới đan mỏng xuất phát từ vùng đất Milan xinh đẹp, vừa mềm mại, lại vừa quý phái. Đồng thời, màn hình đồng hồ có viền mỏng hơn, trọng lượng nhẹ hơn, màn hình lớn hơn mang lại sự trải nghiệm đẳng cấp hơn.\r\nApple Watch S5 LTE 44mm viền thép dây thép được thiết kế bằng dây thép Milanese sang trọng hơn rất nhiều nhờ viền thép mạnh mẽ và dây đeo thiết kế dạng lưới đan mỏng xuất phát từ vùng đất Milan xinh đẹp, vừa mềm mại, lại vừa quý phái. Đồng thời, màn hình đồng hồ có viền mỏng hơn, trọng lượng nhẹ hơn, màn hình lớn hơn mang lại sự trải nghiệm đẳng cấp hơn.\r\n- Apple Watch bản LTE sẽ có núm vặn Digital Crown màu đỏ nguyên núm xoay đối với Series 3 và viền đỏ với Series 4 và Series 5.\r\n\r\n- Apple Watch bản GPS sẽ có phần núm vặn Digital Crown màu trơn, đồng màu với thân máy.\r\nChiếc đồng hồ thông minh có hỗ trợ tính năng eSim, kết nối mạng Wifi và Bluetooth, nghe gọi điện thoại, gửi tin nhắn qua Siri, nghe những bản nhạc yêu thích, nhận thông báo mạng xã hội và rất nhiều ứng dụng tiện ích khác. Nhờ Apple Watch, bạn sẽ ít bị phân tâm hơn khi làm việc, đồng thời vẫn đảm bảo không bỏ lỡ những thông báo quan trọng.', 'apple-watch-s5-lte-day-thep-den2.jpg-org.jpg', '2021-01-04 00:00:00', 'Hoa kì'),
(20, 2, 2, 'Apple Watch S6 44mm viền nhôm dây cao su', 11891000, 989, 8, 'Thiết kế của chiếc đồng hồ Apple Watch Series 6 44mm dù không có nhiều thay đổi so với Apple Watch Series 5, ngoại trừ màu đỏ trẻ trung và cá tính mang đến sự nổi bật, thời thượng. Tuy nhiên đây vẫn là chiếc đồng hồ sang trọng và tinh tế, chi tiết có độ hoàn thiện cao, gia công chắc chắn, và toát lên vẻ sang trọng của một hãng đồng hồ cao cấp.', 'Thiết kế của chiếc đồng hồ Apple Watch Series 6 44mm dù không có nhiều thay đổi so với Apple Watch Series 5, ngoại trừ màu đỏ trẻ trung và cá tính mang đến sự nổi bật, thời thượng. Tuy nhiên đây vẫn là chiếc đồng hồ sang trọng và tinh tế, chi tiết có độ hoàn thiện cao, gia công chắc chắn, và toát lên vẻ sang trọng của một hãng đồng hồ cao cấp. Số tiền mà Apple thu được từ việc bán sản phẩm này sẽ quyên góp và gửi đến Quỹ toàn cầu phòng chống HIV/AIDS.\r\nChiếc đồng hồ thông minh này có hệ điều hành tối ưu. với nhiều tính năng được trang bị, mang đến cho người dùng những trải nghiệm chưa từng có trên các phiên bản trước cũng như khó tìm thấy ở các hãng đồng hồ khác.\r\nApple luôn nổi tiếng với tốc độ xử lý của con chip và lần này là không ngoại lệ. Với con chip Apple S6 các thao tác của người dùng sẽ  thật mượt mà, không chậm lag gây khó chịu cho người dùng.\r\n\r\nLà 2 tính năng còn khá mới và có rất ít dòng đồng hồ được trang bị, tuy nhiên Apple đã đầu tư 2 tính năng này cho người dùng có thể trải nghiệm, giúp bạn có thể theo dõi và chăm sóc sức khỏe của bản thân tốt hơn.\r\n\r\n* Lưu ý: tuy nhiên tính năng hiện chưa khả dụng ở Việt Nam', 'apple-watch-s6-44mm-vien-nhom-day-cao-su-red2-org.jpg', '2021-01-06 00:00:00', 'Hoa kì'),
(31, 1, 3, ' Đồng hồ Unisex Casio A159WA-N1DF', 700000, 97, 6, '<p>Mô tả rút gọn</p>', '<p>Mô tả chi tiết</p>', '6006c1c6774b3casio-a159wa-n1df-bac-600x600.jpg', '2021-01-19 12:25:58', 'Nhật bản');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `province_id` varchar(20) NOT NULL,
  `province_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`province_id`, `province_title`) VALUES
('01TTT', 'Hà Nội'),
('02TTT', 'Hà Giang'),
('04TTT', 'Cao Bằng'),
('06TTT', 'Bắc Kạn'),
('08TTT', 'Tuyên Quang'),
('10TTT', 'Lào Cai'),
('11TTT', 'Điện Biên'),
('12TTT', 'Lai Châu'),
('14TTT', 'Sơn La'),
('15TTT', 'Yên Bái'),
('17TTT', 'Hòa Bình'),
('19TTT', 'Thái Nguyên'),
('20TTT', 'Lạng Sơn'),
('22TTT', 'Quảng Ninh'),
('24TTT', 'Bắc Giang'),
('25TTT', 'Phú Thọ'),
('26TTT', 'Vĩnh Phúc'),
('27TTT', 'Bắc Ninh'),
('30TTT', 'Hải Dương'),
('31TTT', 'Hải Phòng'),
('33TTT', 'Hưng Yên'),
('34TTT', 'Thái Bình'),
('35TTT', 'Hà Nam'),
('36TTT', 'Nam Định'),
('37TTT', 'Ninh Bình'),
('38TTT', 'Thanh Hóa'),
('40TTT', 'Nghệ An'),
('42TTT', 'Hà Tĩnh'),
('44TTT', 'Quảng Bình'),
('45TTT', 'Quảng Trị'),
('46TTT', 'Thừa Thiên Huế'),
('48TTT', 'Đà Nẵng'),
('49TTT', 'Quảng Nam'),
('51TTT', 'Quảng Ngãi'),
('52TTT', 'Bình Định'),
('54TTT', 'Phú Yên'),
('56TTT', 'Khánh Hòa'),
('58TTT', 'Ninh Thuận'),
('60TTT', 'Bình Thuận'),
('62TTT', 'Kon Tum'),
('64TTT', 'Gia Lai'),
('66TTT', 'Đắk Lắk'),
('67TTT', 'Đắk Nông'),
('68TTT', 'Lâm Đồng'),
('70TTT', 'Bình Phước'),
('72TTT', 'Tây Ninh'),
('74TTT', 'Bình Dương'),
('75TTT', 'Đồng Nai'),
('77TTT', 'Bà Rịa - Vũng Tàu'),
('79TTT', 'Hồ Chí Minh'),
('80TTT', 'Long An'),
('82TTT', 'Tiền Giang'),
('83TTT', 'Bến Tre'),
('84TTT', 'Trà Vinh'),
('86TTT', 'Vĩnh Long'),
('87TTT', 'Đồng Tháp'),
('89TTT', 'An Giang'),
('91TTT', 'Kiên Giang'),
('92TTT', 'Cần Thơ'),
('93TTT', 'Hậu Giang'),
('94TTT', 'Sóc Trăng'),
('95TTT', 'Bạc Liêu'),
('96TTT', 'Cà Mau');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `size_id` int(11) NOT NULL,
  `size_prod_id` int(11) NOT NULL,
  `size_name` varchar(255) NOT NULL,
  `size_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`size_id`, `size_prod_id`, `size_name`, `size_quantity`) VALUES
(3, 1, '40', 50),
(4, 1, '41', 50);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_fullname` varchar(100) DEFAULT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(300) NOT NULL,
  `user_role` varchar(15) DEFAULT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_token` varchar(300) NOT NULL,
  `user_verified` bit(1) NOT NULL,
  `user_address` varchar(200) DEFAULT NULL,
  `user_birthday` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fullname`, `user_username`, `user_password`, `user_role`, `user_email`, `user_token`, `user_verified`, `user_address`, `user_birthday`) VALUES
(24, 'williams', 'williams', '$2y$10$CuISV0FT0rqCNi54ptlo6eoSEuHFfVsVQ6BY6keZnDutlsUh8jQ46', 'Administrator', 'tuyenbuis@gmail.com', 'af76b2eb8439274e7b0911f8a467f24b4ae9f266803bc8bcfff1677d4e613a4ca20a71992a557f626ab692ec72f2c1fe559c', b'0', '64TTT', '1999-08-12'),
(28, 'anhhungxalo', 'anhhungxalo', '$2y$10$pbH1XiAOiJti63d07ayReeKyDpivHPnChBO5.4kMI984tPE8r.6Pq', 'Customer', 'tuyenbui1111@gmail.com', '5460a1c593435a1ac1a6ebf109a8f023ceba9c59e3a4f12bc46a4852bcf43315064b68e0bb4ad695441bf70217322afaa55b', b'0', '64TTT', '1999-02-06'),
(29, 'tuyenspider', 'tuyenspider', '$2y$10$fW22eJYjJaKfD6WcFdIoGuWwYveh52D58pvNMdgTExtmyHNn09.qe', 'Administrator', 'tuyenspider@gmail.com', '7760cbf78fbd5603271e781c34221d6326b9a5110c3b1c2433f8f472adffde59f2c4755471a81546758c6f90d1cee90e3694', b'0', '64TTT', '2020-12-27'),
(32, 'Cu Tèo', 'tuyenbui3030', '$2y$10$7XPatjDiSeCP6x7.aZx4xulJqEjTc1jNPehxKaEeb.JlxA6J0zl5S', 'Customer', 'tuyenbui30030@gmail.com', 'bcc22617d63b29bd6bde32a8b294850116d3ff8adf6bf43836c160f2a86c28b9ef4a7c40f8de51c868b16b1654254c979a55', b'1', '01TTT', '2021-01-02'),
(33, 'Nhóc tèo', 'nhokquay123', '$2y$10$6iB9C1kB9IfLNUg3pQdhX.Uz7ALcmLP4lVxGGjGLueDNGek/r3j9G', 'Administrator', '18600392@student.hcmus.edu.vn', 'b00507fd84b1f26216987dcada5a3e24e709de903a4ee44286a9dcbb85a926619cdd6cd4a6cff1847db0df9a56858d29c4b8', b'1', '01TTT', '1999-11-11'),
(40, 'Kara A Fiore', 'kasumin147', '$2y$10$nl0bCeu/.5DtoH0yys1BWeYFl5Tp3bT6bshGAsxOOxX5br5xg8nHW', 'Administrator', 'fdsfdfd@gmail.com', '44907eb39ccdcd86732d9c8724b7e8df4bab49d8c86732bc250f9381f0cc60cd7e6d828fb75d44892d32d7dbfc53c8a583be', b'1', '01TTT', '2021-01-14'),
(41, 'Kara A Fiore', 'testnotoli', '$2y$10$5VipoqHdVeu1m.IaW5ifTeapeK9TQts/ofz.LrTvWYJJQutRrvUSq', 'Customer', 'tuyenbui3030@gmail.com', '76be4740c52898f9ef84b62961a3b4eca51c7578945c6bed2f72444c4419bb09fb5034c1001925793059f109a14d005ac11f', b'0', '19TTT', '2021-01-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_BANNER_BRAND` (`brands_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `FK_CART_PRODUCT` (`cart_prodID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD UNIQUE KEY `orderDetail_id` (`orderDetail_id`),
  ADD KEY `FK_ORDERDETAILS_PRODUCT` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `FK_ORDERS_USERS` (`order_user_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`photo_id`),
  ADD KEY `FK_PHOTOS_PRODUCT` (`photo_prod_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `FK_PRODUCT_BRAND` (`prod_brand`),
  ADD KEY `FK_PRODUCT_CATEGORY` (`prod_cat`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`province_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size_id`),
  ADD KEY `FK_SIZE_PRODUCT` (`size_prod_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_username` (`user_username`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD KEY `FK_USER_PROVINCE` (`user_address`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=435;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `orderDetail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `banner`
--
ALTER TABLE `banner`
  ADD CONSTRAINT `FK_BANNER_BRAND` FOREIGN KEY (`brands_id`) REFERENCES `brands` (`brand_id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_CART_PRODUCT` FOREIGN KEY (`cart_prodID`) REFERENCES `products` (`prod_id`) ON DELETE CASCADE;

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `FK_ORDERDETAILS_ORDERS` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_ORDERDETAILS_PRODUCT` FOREIGN KEY (`product_id`) REFERENCES `products` (`prod_id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_ORDERS_USERS` FOREIGN KEY (`order_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `FK_PHOTOS_PRODUCT` FOREIGN KEY (`photo_prod_id`) REFERENCES `products` (`prod_id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_PRODUCT_BRAND` FOREIGN KEY (`prod_brand`) REFERENCES `brands` (`brand_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_PRODUCT_CATEGORY` FOREIGN KEY (`prod_cat`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE;

--
-- Constraints for table `size`
--
ALTER TABLE `size`
  ADD CONSTRAINT `FK_SIZE_PRODUCT` FOREIGN KEY (`size_prod_id`) REFERENCES `products` (`prod_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_USER_PROVINCE` FOREIGN KEY (`user_address`) REFERENCES `province` (`province_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
