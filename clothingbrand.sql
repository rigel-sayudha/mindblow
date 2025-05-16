-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2025 at 09:19 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clothingbrand`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cId` int(255) NOT NULL,
  `pId` int(255) NOT NULL,
  `uName` varchar(255) NOT NULL,
  `pQty` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cId`, `pId`, `uName`, `pQty`) VALUES
(1, 1, 'channa', 1),
(10, 17, 'channa', 1),
(14, 11, 'channa', 2),
(17, 7, 'user', 4),
(18, 14, 'hash', 1),
(26, 24, 'admin', 1),
(27, 24, 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `collection_table`
--

CREATE TABLE `collection_table` (
  `c_id` int(255) NOT NULL,
  `collection` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collection_table`
--

INSERT INTO `collection_table` (`c_id`, `collection`) VALUES
(1, 'T-Shirt'),
(2, 'Hoodie'),
(3, 'Pants');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `shipping_address` text DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT 'Pending',
  `shipping_cost` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `total_price`, `shipping_address`, `order_date`, `status`, `shipping_cost`) VALUES
(1, 'olell', '1795000.00', 'Jl. Margonda', '2025-05-16 03:55:04', 'Delivered', '75000.00'),
(2, 'olell', '798000.00', 'Jl. Cibubur', '2025-05-16 04:39:19', 'Shipped', '75000.00');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 27, 1, '199000.00'),
(2, 1, 30, 1, '399000.00'),
(3, 1, 29, 1, '399000.00'),
(4, 1, 29, 1, '399000.00'),
(5, 1, 29, 1, '399000.00'),
(6, 2, 29, 1, '399000.00'),
(7, 2, 29, 1, '399000.00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pId` int(255) NOT NULL,
  `pName` varchar(255) NOT NULL,
  `pPrice` int(255) NOT NULL,
  `pQty` int(255) NOT NULL,
  `pDetails` text NOT NULL,
  `pCollection` varchar(255) NOT NULL,
  `pImg` varchar(255) NOT NULL,
  `pAImg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pId`, `pName`, `pPrice`, `pQty`, `pDetails`, `pCollection`, `pImg`, `pAImg`) VALUES
(24, 'Hoodie Black Boxy Fit', 399000, 5, 'Black Hoodie', 'Hoodie', '../uploads/MindBlow 2-71.jpg', '../uploads/MindBlow 2-71.jpg'),
(25, 'Oversize black scuba', 249000, 15, '', 'T-Shirt', '../uploads/MindBlow 2-64.jpg', ''),
(26, 'Oversize brown cotton fleece', 199000, 25, '', 'T-Shirt', '../uploads/MindBlow 2-99.jpg', ''),
(27, 'Oversize grey cotton fleece ', 199000, 25, '', 'T-Shirt', '../uploads/MindBlow 2-10.jpg', ''),
(28, 'Oversize white scuba ', 249000, 25, '', 'T-Shirt', '../uploads/MindBlow-106.jpg', ''),
(29, 'Hoodie brown boxy fit ', 399000, 25, '', 'Hoodie', '../uploads/MindBlow 2-177.jpg', ''),
(30, 'Hoodie grey boxy fit', 399000, 25, '', 'Hoodie', '../uploads/MindBlow 3-99.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` enum('Active','Inactive','','') NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `username`, `email`, `profile`, `number`, `address`, `status`, `password`, `cpassword`) VALUES
(1, 'admin', 'admin@admin.com', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRtVwUoQz0A0BFEsRVq4gLh2KMy4l8RCY8ExP9cXDg4xgr1z1u3RmqLRvNLB-DMPNIuIeM&usqp=CAU', '', '', 'Active', '$2y$10$VxxOau4mCH4dGap9GTDRB.BxGQ8V4rNI./D76VYmOXYuyxMrzN8Wm', '$2y$10$Bcun6P87FSp8yBr/N/nyYej5KtfjoviY/SyRI.qGNyUSiEzqmwwGG'),
(7, 'olell', 'aurellwienanda@gmail.com', '', '', '', 'Active', '$2y$10$TK12g.eZ4mo0RZ7YATZ00.HwnesqurWt0HubIxPUYwfdkZqDJg7sW', '$2y$10$mlmwiB7w5LXUKnOw.gqaf.h07302Slwj4ULx4CduKMumHJnC/dl5i');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cId`);

--
-- Indexes for table `collection_table`
--
ALTER TABLE `collection_table`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pId`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `collection_table`
--
ALTER TABLE `collection_table`
  MODIFY `c_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`pId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
