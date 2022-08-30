-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2021 at 10:45 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_myspace`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `id_category` int(11) NOT NULL,
  `category_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`id_category`, `category_name`) VALUES
(1, 'Bedroom'),
(2, 'Bathroom'),
(3, 'Living Room'),
(4, 'Kitchen'),
(5, 'Workspace');

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `id_customer` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `photo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`id_customer`, `full_name`, `email`, `password`, `photo`) VALUES
(1, 'Fadlana', 'inifadlan7@gmail.com', '123', 'customer1.jpg'),
(2, 'Customer 2', 'customer@customer.com', '12345', 'customer2.jpg'),
(3, 'dlan', 'fadlan@mail.com', '123', NULL),
(4, 'dadang saepudin', 'dadangsae@gmail.com', 'dadang123', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `id_product` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `price` int(15) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `product_images` text DEFAULT NULL,
  `product_weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`id_product`, `product_name`, `id_category`, `price`, `description`, `product_images`, `product_weight`) VALUES
(1, 'Mahjong Workchair', 5, 2999999, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Velit aliquet sagittis id consectetur purus ut faucibus pulvinar. Condimentum mattis pellentesque id nibh tortor id aliquet. Donec enim diam vulputate ut pharetra sit. Quis ipsum suspendisse ultrices gravida dictum. Viverra vitae congue eu consequat ac felis donec. Ornare arcu dui vivamus arcu.', 'img1.jpg', 2200),
(2, 'Tobergert', 3, 999999, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Velit aliquet sagittis id consectetur purus ut faucibus pulvinar. Condimentum mattis pellentesque id nibh tortor id aliquet. Donec enim diam vulputate ut pharetra sit. Quis ipsum suspendisse ultrices gravida dictum. Viverra vitae congue eu consequat ac felis donec. Ornare arcu dui vivamus arcu.', 'tobergert.jpg', 4000),
(7, 'Keran', 2, 120000, 'loremmmmmmmmmmmmm', '0644786_PE702961_S5.jpg', 200),
(8, 'Liebra Office Chair', 5, 1299999, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eget sit amet tellus cras adipiscing. Suscipit tellus mauris a diam maecenas. Id aliquet risus feugiat in. Aliquam vestibulum morbi blandit cursus risus. Nulla facilisi morbi tempus iaculis urna id volutpat. Amet massa vitae tortor condimentum. Fermentum et sollicitudin ac orci phasellus egestas tellus rutrum. Leo duis ut diam quam. Duis tristique sollicitudin nibh sit amet commodo nulla facilisi nullam. \r\n\r\nSed lectus vestibulum mattis ullamcorper velit sed ullamcorper morbi. Ultricies leo integer malesuada nunc. Sed viverra tellus in hac habitasse. Eget nullam non nisi est sit amet facilisis magna. Porttitor leo a diam sollicitudin tempor id. Blandit turpis cursus in hac habitasse platea dictumst quisque sagittis. Euismod elementum nisi quis eleifend quam adipiscing. Et malesuada fames ac turpis egestas integer eget aliquet nibh. Mi ipsum faucibus vitae aliquet nec.\r\n\r\nEt malesuada fames ac turpis egestas. Sit amet consectetur adipiscing elit ut aliquam purus sit amet.', 'img-catalog-chair3.jpg', 4500),
(9, 'Reddhis Office Chair', 5, 1199999, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eget sit amet tellus cras adipiscing. Suscipit tellus mauris a diam maecenas. Id aliquet risus feugiat in. Aliquam vestibulum morbi blandit cursus risus. Nulla facilisi morbi tempus iaculis urna id volutpat. Amet massa vitae tortor condimentum. Fermentum et sollicitudin ac orci phasellus egestas tellus rutrum. Leo duis ut diam quam. Duis tristique sollicitudin nibh sit amet commodo nulla facilisi nullam. \r\n\r\nSed lectus vestibulum mattis ullamcorper velit sed ullamcorper morbi. Ultricies leo integer malesuada nunc. Sed viverra tellus in hac habitasse. Eget nullam non nisi est sit amet facilisis magna. Porttitor leo a diam sollicitudin tempor id. Blandit turpis cursus in hac habitasse platea dictumst quisque sagittis. Euismod elementum nisi quis eleifend quam adipiscing. Et malesuada fames ac turpis egestas integer eget aliquet nibh. Mi ipsum faucibus vitae aliquet nec.', 'img-catalog-chair.jpg', 2400),
(10, 'Fauxhult', 4, 6509999, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eget sit amet tellus cras adipiscing. Suscipit tellus mauris a diam maecenas. Id aliquet risus feugiat in. Aliquam vestibulum morbi blandit cursus risus. Nulla facilisi morbi tempus iaculis urna id volutpat. Amet massa vitae tortor condimentum. Fermentum et sollicitudin ac orci phasellus egestas tellus rutrum. Leo duis ut diam quam. Duis tristique sollicitudin nibh sit amet commodo nulla facilisi nullam. \r\n\r\nSed lectus vestibulum mattis ullamcorper velit sed ullamcorper morbi. Ultricies leo integer malesuada nunc. Sed viverra tellus in hac habitasse. Eget nullam non nisi est sit amet facilisis magna. Porttitor leo a diam sollicitudin tempor id. Blandit turpis cursus in hac habitasse platea dictumst quisque sagittis. Euismod elementum nisi quis eleifend quam adipiscing. Et malesuada fames ac turpis egestas integer eget aliquet nibh. Mi ipsum faucibus vitae aliquet nec.', '0802695_PE768546_S4.jpg', 5500),
(11, 'Thai Table', 1, 1400000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Eget sit amet tellus cras adipiscing. Suscipit tellus mauris a diam maecenas. Id aliquet risus feugiat in. Aliquam vestibulum morbi blandit cursus risus. Nulla facilisi morbi tempus iaculis urna id volutpat. Amet massa vitae tortor condimentum. Fermentum et sollicitudin ac orci phasellus egestas tellus rutrum. Leo duis ut diam quam. Duis tristique sollicitudin nibh sit amet commodo nulla facilisi nullam. \r\n\r\nSed lectus vestibulum mattis ullamcorper velit sed ullamcorper morbi. Ultricies leo integer malesuada nunc. Sed viverra tellus in hac habitasse. Eget nullam non nisi est sit amet facilisis magna. Porttitor leo a diam sollicitudin tempor id. Blandit turpis cursus in hac habitasse platea dictumst quisque sagittis. Euismod elementum nisi quis eleifend quam adipiscing. Et malesuada fames ac turpis egestas integer eget aliquet nibh. Mi ipsum faucibus vitae aliquet nec.', '0152647_PE311000_S4.jpg', 2300);

-- --------------------------------------------------------

--
-- Table structure for table `tb_product_images`
--

CREATE TABLE `tb_product_images` (
  `id_images` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `img_desc` varchar(255) DEFAULT NULL,
  `product_images` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_product_images`
--

INSERT INTO `tb_product_images` (`id_images`, `id_product`, `img_desc`, `product_images`) VALUES
(1, 1, 'img1', 'img1.jpg'),
(2, 1, 'img2', 'img2.jpg'),
(3, 1, 'img3', 'img3.jpg'),
(4, 1, 'img4', 'img4.jpg'),
(5, 1, 'img5', 'img5.jpg'),
(10, 10, 'rak', '0871561_PE617192_S4.jpg'),
(11, 10, 'atas', '0871581_PE617225_S4.jpg'),
(13, 9, 'Tampil', 'img51.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rajaongkir`
--

CREATE TABLE `tb_rajaongkir` (
  `id` int(1) NOT NULL,
  `store_name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `tel` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rajaongkir`
--

INSERT INTO `tb_rajaongkir` (`id`, `store_name`, `location`, `address`, `tel`) VALUES
(1, 'MySpace Store\'s', 'Bekasi', 'Jl. Jend. Ahmad Yani', '08123456789');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekening`
--

CREATE TABLE `tb_rekening` (
  `id_rekening` int(11) NOT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `no_rek` varchar(255) DEFAULT NULL,
  `atas_nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rekening`
--

INSERT INTO `tb_rekening` (`id_rekening`, `bank_name`, `no_rek`, `atas_nama`) VALUES
(1, 'Bank Central Asia', '80218 98390', 'PT MySpace Indonesia Tbk'),
(2, 'Bank Rakyat Indonesia', '98327 97812 89327', 'PT MySpace Indonesia Tbk');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaction`
--

CREATE TABLE `tb_transaction` (
  `id_transaction` int(11) NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `no_order` varchar(40) NOT NULL,
  `date_order` date DEFAULT NULL,
  `recipient_name` varchar(255) DEFAULT NULL,
  `tel` varchar(15) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `postal_code` varchar(10) DEFAULT NULL,
  `courier` varchar(255) DEFAULT NULL,
  `delivery` varchar(255) DEFAULT NULL,
  `shipping` varchar(255) DEFAULT NULL,
  `estimation` varchar(255) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `payment_status` int(1) DEFAULT NULL,
  `proof_payment` text DEFAULT NULL,
  `in_the_name_of` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `no_rek` varchar(255) DEFAULT NULL,
  `order_status` int(1) NOT NULL,
  `resi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaction`
--

INSERT INTO `tb_transaction` (`id_transaction`, `id_customer`, `no_order`, `date_order`, `recipient_name`, `tel`, `province`, `city`, `address`, `postal_code`, `courier`, `delivery`, `shipping`, `estimation`, `weight`, `subtotal`, `total`, `payment_status`, `proof_payment`, `in_the_name_of`, `bank_name`, `no_rek`, `order_status`, `resi`) VALUES
(11, 1, '20210709NBSZUAJI', '2021-07-09', 'A', '08123456789', 'Bangka Belitung', 'Bangka Selatan', 'JL', '2121', 'tiki', 'REG', '116000', '3 Hari', 2200, 2999999, 3115999, 1, 'apple.png', 'ABC', 'BNI', '98311-13241-12321-12333', 3, 'BDG398127hj'),
(12, 1, '20210709MFBCMQU7', '2021-07-09', 'ADB', '0112323', 'Papua', 'Merauke', 'JL. ABCDE', '98391', 'tiki', 'REG', '798000', '4 Hari', 6700, 6121210, 6919210, 0, NULL, NULL, NULL, NULL, 3, NULL),
(13, 1, '20210709FEL2IGMJ', '2021-07-09', 'AAA', '0321938', 'Nanggroe Aceh Darussalam (NAD)', 'Sabang', 'Jl. ACD', '8392138', 'jne', 'OKE', '141000', '3-6 Hari', 2700, 5121211, 5262211, 1, '1215.jpg', 'Fadlan', 'American Express', '98323-12389-12899', 3, NULL),
(14, 2, '202107096C1ETBQJ', '2021-07-09', 'ZZZ', '01398', 'Kalimantan Timur', 'Paser', 'Jl. RSTU', '21829', 'pos', 'Paket Kilat Khusus', '100000', '5 HARI Hari', 2200, 2999999, 3099999, 0, NULL, NULL, NULL, NULL, 0, NULL),
(15, 2, '20210710I4IANHAL', '2021-07-10', 'hh', '9080', 'Bangka Belitung', 'Bangka Selatan', 'JL', '19821', 'pos', 'Paket Kilat Khusus', '190000', '5 HARI Hari', 4400, 5999998, 6189998, 0, NULL, NULL, NULL, NULL, 0, NULL),
(16, 0, '20210710I4IANHAL', '2021-07-10', 'hh', '9080', 'Bangka Belitung', 'Bangka Selatan', 'JL', '19821', 'pos', 'Paket Kilat Khusus', '190000', '5 HARI Hari', 4400, 5999998, 6189998, 0, NULL, NULL, NULL, NULL, 0, NULL),
(17, 4, '20210713WPHJIZGZ', '2021-07-13', 'dadang', '0812345679', 'Jawa Barat', 'Purwakarta', 'jl. dadang raya', '41118', 'tiki', 'ONS', '96000', '1 Hari', 12000, 2999997, 3095997, 1, '3161465.png', 'dadang saepudin', 'BCA', '9876543454', 3, 'ABC');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaction_details`
--

CREATE TABLE `tb_transaction_details` (
  `id_transaction_details` int(11) NOT NULL,
  `no_order` varchar(40) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaction_details`
--

INSERT INTO `tb_transaction_details` (`id_transaction_details`, `no_order`, `id_product`, `qty`) VALUES
(12, '20210709NBSZUAJI', 1, 1),
(13, '20210709MFBCMQU7', 1, 1),
(14, '20210709MFBCMQU7', 2, 1),
(15, '20210709MFBCMQU7', 7, 1),
(16, '20210709FEL2IGMJ', 7, 1),
(17, '20210709FEL2IGMJ', 1, 1),
(18, '202107096C1ETBQJ', 1, 1),
(19, '20210710I4IANHAL', 1, 2),
(20, '20210713WPHJIZGZ', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `full_name` varchar(25) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `user_level` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `full_name`, `username`, `password`, `user_level`) VALUES
(1, 'Fadlan', 'admin', 'admin', 1),
(6, 'Rozi', 'zi', '123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `tb_product_images`
--
ALTER TABLE `tb_product_images`
  ADD PRIMARY KEY (`id_images`);

--
-- Indexes for table `tb_rajaongkir`
--
ALTER TABLE `tb_rajaongkir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_rekening`
--
ALTER TABLE `tb_rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `tb_transaction`
--
ALTER TABLE `tb_transaction`
  ADD PRIMARY KEY (`id_transaction`);

--
-- Indexes for table `tb_transaction_details`
--
ALTER TABLE `tb_transaction_details`
  ADD PRIMARY KEY (`id_transaction_details`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_product_images`
--
ALTER TABLE `tb_product_images`
  MODIFY `id_images` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_rajaongkir`
--
ALTER TABLE `tb_rajaongkir`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_rekening`
--
ALTER TABLE `tb_rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_transaction`
--
ALTER TABLE `tb_transaction`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_transaction_details`
--
ALTER TABLE `tb_transaction_details`
  MODIFY `id_transaction_details` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
