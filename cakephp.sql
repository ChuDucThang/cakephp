-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2020 at 11:48 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cakephp`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_at`) VALUES
(14, 'Thời trang', 0, '2020-03-05'),
(16, 'Tạp chí', 0, '2020-03-05'),
(17, 'Khoa học', 0, '2020-03-05'),
(18, 'Âm thực', 0, '2020-03-05');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `note` longtext NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `description` longtext NOT NULL,
  `price` float NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `name`, `image`, `description`, `price`, `status`, `created_at`, `updated_at`) VALUES
(7, 17, 'Thiên tai', 'thientai. jpg', 'Tìm hiểu về các thiên tai', 500000, 0, '2020-03-05', '2020-03-05'),
(8, 14, 'Thời trang 1', 'jhg.jpg', 'dshjsdsd', 150000, 0, '2020-03-05', '2020-03-05'),
(9, 14, 'Tuần lẽ thời trang', 'thoi trang.jpg', 'Thời trang diễn ra vào ...', 200000, 0, '2020-03-05', '2020-03-05'),
(10, 18, 'Hướng dẫn nấu ăn P1', 'gff.jpg', 'Hướng dẫn về nấu ăn', 150000, 0, '2020-03-05', '2020-03-05'),
(11, 16, 'The news', 'sdsd.jpg', 'tin tuc moi', 96000, 0, '2020-03-05', '2020-03-05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `image`, `fullname`, `phone`, `address`, `email`, `level`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$TD1toBrDIdSM7GAEcI6RE.D40ohNhN1YFJ3yNYyc9oil1QoPH2Rn6', 'shdj.jpg', 'Chu Đức Thắng', '0981929295', 'Tuyen quang', 'testemailsaishunkan@gmail.com', 1, 0, '2020-02-28', '2020-02-28'),
(27, 'testadmin', '$2y$10$gU0GRMyrAE2aq0KFLK.ate6BlYXQNCQB/Cc9b9M5FBqpn1s9jnMvi', 'test.jpg', 'Test html entities', '0989234434', 'HÀ GIANG', 'testemail2saishunkan@gmail.com', 1, 1, '2020-03-03', '2020-03-03'),
(28, 'user_one', '$2y$10$M3pIiaPw87FC7fHlQo.6MePOzmxdEJ04swl7bwlY6EzDjUMvdI6ZO', 'user1.jpg', 'User One', '0932893223', 'HN', 'user_one@gmail.com', 3, 0, '2020-03-04', '2020-03-04'),
(33, 'user2', '$2y$10$M3cTnsM1GG3PxztplyvyE.PN39alL3umVmAYNybExJ8jCx0is0uiC', 'user2.jpg', 'User Two', '0932893223', 'HN', 'usertwo@gmail.com', 3, 1, '2020-03-04', '2020-03-04'),
(34, 'libraries', '$2y$10$pReyWFJQL/cc2qfQgqj6deuu6dPEwPv7jHUKP12CgwRcDT1v/Ifem', 'library.jpg', 'Library', '0940344343', 'HN', 'libraries@gmail.com', 2, 1, '2020-03-04', '2020-03-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
