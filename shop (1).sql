-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2024 at 08:15 AM
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
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `slug` varchar(500) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(500) NOT NULL,
  `meta_title` varchar(500) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`) VALUES
(4, 'Laptop', 'Laptop', 'Laptop', 0, 1, '1722669319.jpg', 'Laptop', 'Laptop', 'Laptop', '2024-08-03 07:15:19'),
(5, 'Smart Phone', 'Smart Phone', 'Smart Phone', 0, 1, '1722671633.jpg', 'Smart Phone', 'Smart Phone', 'Smart Phone', '2024-08-03 07:53:53'),
(6, 'Grocery', 'Grocery', 'Grocery', 0, 1, '1722683112.jpeg', 'Grocery', 'Grocery', 'Grocery', '2024-08-03 11:05:12'),
(10, 'Sunglasses', 'Sunglasses', 'Sunglasses', 0, 1, '1723322783.jpg', 'Sunglasses', 'Sunglasses', 'Sunglasses', '2024-08-10 20:46:23');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `tracking_no` varchar(191) NOT NULL,
  `user_id` int(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `address` mediumtext NOT NULL,
  `pincode` int(191) NOT NULL,
  `total_price` int(191) NOT NULL,
  `payment_mode` varchar(191) NOT NULL,
  `payment_id` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `comment` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `tracking_no`, `user_id`, `name`, `email`, `phone`, `address`, `pincode`, `total_price`, `payment_mode`, `payment_id`, `status`, `comment`, `created_at`) VALUES
(1, 'arghya67492784 79075', 1, 'Arghya sinha', 'arghyasinha721@gmail.com', '072784 79075', 'vfdvfdvdfv', 700122, 0, '', '', 0, '', '2024-09-05 20:38:50'),
(2, 'arghya891447483647', 2, 'jack\'s', 'j@gmail.com', '2147483647', 'ddfdfcfhcfdrr', 500015, 335120, 'COD', '', 0, '', '2024-09-08 18:47:24'),
(4, 'arghya285447483647', 1, 'bhim', 'b@gmil.com', '2147483647', 'adcdscdscdscdsdscdsvfvfdvfd', 800015, 18280, 'COD', '', 0, '', '2024-09-08 18:59:36'),
(5, 'arghya409447483647', 1, 'bhim', 'b@gmil.com', '2147483647', 'gfgfdgftfewtftue', 800015, 18460, 'COD', '', 0, '', '2024-09-08 19:04:56'),
(12, 'ecom54771852963', 6, 'aa', 'a@gmail.com', '741852963', 'gvfvfvfvdffv', 700121, 800, 'COD', '', 0, '', '2024-09-09 08:20:35'),
(13, 'ecom20421852963', 6, 'aa', 'a@gmail.com', '741852963', 'dsdgvdsvggergerg', 700121, 18000, 'COD', '', 1, '', '2024-09-09 20:59:37'),
(14, 'ecom699947483647', 2, 'jack\'s', 'j@gmail.com', '2147483647', 'fvfdvdfgvergerg', 800015, 1440, 'COD', '', 0, '', '2024-09-11 11:24:53'),
(15, 'ecom438347483647', 2, 'jack\'s', 'j@gmail.com', '2147483647', 'dgdgggdgtgfgfbfsrtwryee', 800015, 180, 'COD', '', 2, '', '2024-09-12 07:59:34');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(191) NOT NULL,
  `prod_id` int(191) NOT NULL,
  `qty` int(191) NOT NULL,
  `price` int(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `prod_id`, `qty`, `price`, `created_at`) VALUES
(1, 4, 8, 1, 18000, '2024-09-08 18:59:36'),
(2, 4, 9, 2, 140, '2024-09-08 18:59:36'),
(3, 5, 10, 1, 180, '2024-09-08 19:04:56'),
(4, 5, 8, 1, 18000, '2024-09-08 19:04:56'),
(5, 5, 9, 2, 140, '2024-09-08 19:04:56'),
(12, 12, 7, 2, 400, '2024-09-09 08:20:35'),
(13, 13, 8, 1, 18000, '2024-09-09 20:59:37'),
(14, 14, 7, 2, 400, '2024-09-11 11:24:53'),
(15, 14, 10, 2, 180, '2024-09-11 11:24:53'),
(16, 14, 9, 2, 140, '2024-09-11 11:24:53'),
(17, 15, 10, 1, 180, '2024-09-12 07:59:34');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(20) NOT NULL,
  `category_id` int(20) NOT NULL,
  `name` varchar(500) NOT NULL,
  `slug` varchar(500) NOT NULL,
  `small_desciption` mediumtext NOT NULL,
  `desciption` mediumtext NOT NULL,
  `original_price` int(20) NOT NULL,
  `selling_price` int(20) NOT NULL,
  `image` varchar(500) NOT NULL,
  `qty` int(20) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `trending` tinyint(4) NOT NULL,
  `meta_title` varchar(500) NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `small_desciption`, `desciption`, `original_price`, `selling_price`, `image`, `qty`, `status`, `trending`, `meta_title`, `meta_keywords`, `meta_description`, `created_at`) VALUES
(1, 4, 'hp laptop', 'hp laptop', 'hp laptop', 'hp laptop', 50000, 45000, '1722762692.jpg', 19, 0, 1, 'hp laptop', 'hp laptop', 'hp laptop', '2024-08-04 09:11:32'),
(7, 10, 'Sunglasses', 'Sunglasses', 'Sunglasses', 'Sunglasses', 500, 400, '1723322866.jpg', 46, 0, 1, 'Sunglasses', 'Sunglasses', 'Sunglasses', '2024-08-10 20:47:46'),
(8, 5, 'Redmi note 8 pro', 'Redmi note 8 pro', 'Redmi note 8 pro', 'Redmi note 8 pro', 20000, 18000, '1723322993.jpg', 19, 0, 1, 'Redmi note 8 pro', 'Redmi note 8 pro', 'Redmi note 8 pro', '2024-08-10 20:49:53'),
(9, 6, 'Mustard oil', 'mustard oil', '', 'mustard oil', 150, 140, '1725216457.jpeg', 98, 0, 1, 'mustard oil', '1', '0', '2024-09-01 18:47:37'),
(10, 6, 'Sunflower oil ', 'Sunflower oil ', '', 'Sunflower oil ', 200, 180, '1725216597.jpg', 97, 0, 1, 'Sunflower oil ', '1', '0', '2024-09-01 18:49:57');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phno` int(20) NOT NULL,
  `password` varchar(500) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phno`, `password`, `role_as`, `created_at`) VALUES
(1, 'bhim', 'b@gmil.com', 2147483647, '1234', 0, '2024-07-29 06:04:48'),
(2, 'jack\'s', 'j@gmail.com', 2147483647, '1234', 0, '2024-07-29 06:40:52'),
(6, 'aa', 'a@gmail.com', 741852963, '1234', 0, '2024-07-29 06:56:46'),
(7, 'admin', 'admin@gmail.com', 0, 'admin', 1, '2024-07-29 07:05:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
