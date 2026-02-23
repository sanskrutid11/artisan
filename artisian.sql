-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2024 at 07:20 AM
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
-- Database: `artisian`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'adminpass');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `order_notes` text DEFAULT NULL,
  `grand_total` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `shipping` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `first_name`, `address`, `mobile`, `email`, `order_notes`, `grand_total`, `created_at`, `shipping`) VALUES
(1, 'sd', 'sgdf', '678999', 'm@gmail.com', '', 2000.00, '2024-07-30 13:15:37', 0.00),
(2, 'sd', 'sgdf', '678999', 'm@gmail.com', '', 2000.00, '2024-07-30 13:18:00', 0.00),
(3, 'sd', 'sgdf', '678999', 'm@gmail.com', '', 2000.00, '2024-07-30 13:18:05', 0.00),
(4, 'sd', 'sgdf', '5677878', 'pooja@gmail.com', '', 2000.00, '2024-07-30 13:23:52', 0.00),
(5, NULL, NULL, NULL, NULL, '', 2300.00, '2024-08-05 14:33:48', 0.00),
(6, NULL, NULL, NULL, 's@gmail.com', '', 500.00, '2024-08-05 14:39:57', 0.00),
(7, NULL, NULL, NULL, 's@gmail.com', '', 1000.00, '2024-08-05 15:09:20', 0.00),
(8, NULL, NULL, NULL, 'pooja@gmail.com', '', 1000.00, '2024-08-07 02:15:06', 0.00),
(9, NULL, NULL, NULL, 's@gmail.com', '', 1000.00, '2024-08-07 02:16:21', 0.00),
(10, NULL, NULL, NULL, 'pooja@gmail.com', '', 5600.00, '2024-08-07 05:39:20', 0.00),
(11, NULL, NULL, NULL, 's@gmail.com', '', 500.00, '2024-08-09 08:05:25', 0.00),
(12, NULL, NULL, NULL, 'm@gmail.com', '', 2000.00, '2024-08-09 08:11:45', 0.00),
(13, NULL, NULL, NULL, 'gayatri@gmail.com', '', 1500.00, '2024-08-09 08:17:30', 0.00),
(14, NULL, NULL, NULL, NULL, '', 0.00, '2024-08-09 12:42:08', 0.00),
(15, NULL, NULL, NULL, NULL, '', 1500.00, '2024-08-09 13:06:00', 0.00),
(16, NULL, NULL, NULL, NULL, '', 800.00, '2024-08-09 13:06:23', 0.00),
(17, NULL, NULL, NULL, 's@gmail.com', '', 1500.00, '2024-08-09 13:22:23', 0.00),
(18, NULL, NULL, NULL, 'pooja@gmail.com', '', 1500.00, '2024-08-09 13:31:41', 0.00),
(19, 'kavita', 'rahuri', '9384895845', 'pooja@gmail.com', '', 1500.00, '2024-08-09 13:37:36', 0.00),
(20, 'kavita', 'rahuri', '9384895845', 'pooja@gmail.com', '', 800.00, '2024-08-09 13:39:22', 0.00),
(21, 'kavita', 'rahuri', '9384895845', 's@gmail.com', '', 1000.00, '2024-08-09 13:40:38', 0.00),
(22, 'shreya', 'rahuri', '9384895845', 'pooja@gmail.com', '', 500.00, '2024-08-09 13:51:54', 0.00),
(23, 'shreya', 'vambori', '9384895845', 's@gmail.com', '', 1800.00, '2024-08-13 16:37:51', 0.00),
(24, 'Renuka', 'vambori', '9384895845', 'm@gmail.com', '', 3000.00, '2024-08-16 07:55:49', 0.00),
(25, 'shreya', 'vambori', '9226441210', 's@gmail.com', '', 2000.00, '2024-08-16 15:21:36', 0.00),
(26, 'shreya', 'devlali', '8769564398', 's@gmail.com', '', 1515.00, '2024-08-16 15:26:59', 15.00),
(27, 'shreya', 'devlali', '9604771978', 'm@gmail.com', '', 1515.00, '2024-08-16 15:45:25', 15.00),
(28, 'shreya', 'devlali', '9384895845', 'pooja@gmail.com', '', 2015.00, '2024-08-17 16:48:49', 15.00),
(29, 'shreya', 'rahuri', '8769564398', 'pooja@gmail.com', '', 1515.00, '2024-08-21 14:40:54', 15.00),
(30, 'pooja ', 'Rahuri', '9384895845', 'pooja@gmail.com', 'I like the product.', 3515.00, '2024-09-03 08:59:46', 15.00),
(31, 'shreya', 'Rahuri', '9384895845', 's@gmail.com', '', 1515.00, '2024-10-18 04:50:35', 15.00);

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_name`, `price`, `quantity`, `total`) VALUES
(1, 1, 'sculpture', 1000.00, 2, 2000.00),
(2, 2, 'sculpture', 1000.00, 2, 2000.00),
(3, 3, 'sculpture', 1000.00, 2, 2000.00),
(4, 4, 'sculpture', 1000.00, 2, 2000.00),
(5, 5, 'wall hanging', 500.00, 3, 1500.00),
(6, 5, 'Zoola', 800.00, 1, 800.00),
(7, 6, 'wall hanging', 500.00, 1, 500.00),
(8, 7, 'sculpture', 1000.00, 1, 1000.00),
(9, 8, 'sculpture', 1000.00, 1, 1000.00),
(10, 9, 'sculpture', 1000.00, 1, 1000.00),
(11, 10, 'Zoola', 800.00, 2, 1600.00),
(12, 10, 'Stone painting', 2000.00, 1, 2000.00),
(13, 10, 'Engagement Hoopart', 2000.00, 1, 2000.00),
(14, 11, 'wall hanging', 500.00, 1, 500.00),
(15, 12, 'wall hanging', 500.00, 1, 500.00),
(16, 12, 'Wall Mural', 1500.00, 1, 1500.00),
(17, 13, 'Lord Krishna', 1500.00, 1, 1500.00),
(18, 15, 'Quote Hoopart', 1500.00, 1, 1500.00),
(19, 16, 'Zoola', 800.00, 1, 800.00),
(20, 17, 'Akashdiya', 1500.00, 1, 1500.00),
(21, 18, 'Akashdiya', 1500.00, 1, 1500.00),
(22, 19, 'Akashdiya', 1500.00, 1, 1500.00),
(23, 20, 'Zoola', 800.00, 1, 800.00),
(24, 21, 'sculpture', 1000.00, 1, 1000.00),
(25, 22, 'Apricots', 500.00, 1, 500.00),
(26, 23, 'sculpture', 1000.00, 1, 1000.00),
(27, 23, 'Zoola', 800.00, 1, 800.00),
(28, 24, 'Woolean Elephant', 1500.00, 1, 1500.00),
(29, 24, 'Lord Krishna', 1500.00, 1, 1500.00),
(30, 25, 'Pebble art', 1000.00, 2, 2000.00),
(31, 26, 'Akashdiya', 1500.00, 1, 1500.00),
(32, 27, 'Coconut Ganesha', 500.00, 3, 1500.00),
(33, 28, 'sculpture', 1000.00, 2, 2000.00),
(34, 29, 'Baby set', 1500.00, 1, 1500.00),
(35, 30, 'sculpture', 1000.00, 2, 2000.00),
(36, 30, 'Quote Hoopart', 1500.00, 1, 1500.00),
(37, 31, 'Wall Mural', 1500.00, 1, 1500.00);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `desci` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `price` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `desci`, `img`, `price`) VALUES
(1, 'sculpture', 'Macrame handmade sculpture', 'img/i2.jpg', '1000'),
(2, 'wall hanging', 'macrame wall hangimg', 'img/m5.jpg', '500'),
(3, 'Zoola', 'macrame zoola', 'img/i10.jpg', '800'),
(4, 'Akashdiya', 'macrame akashdiya', 'img/p1.jpg', '1500'),
(5, 'Stone painting', '', 'img/p3.jpg', '2000'),
(6, 'Apricots', '', 'img/p3.jpg', '500'),
(7, 'Wall Mural', '', 'img/s3.jpg', '1500'),
(8, 'Pebble art', '', 'img/s2.jpg', '1000'),
(9, 'Engagement Hoopart', '', 'img/e.jpg', '2000'),
(10, 'Quote Hoopart', '', 'img/e7.jpg', '1500'),
(11, 'Lord Krishna', '', 'img/e5.jpg', '1500'),
(12, 'Flower Hoopart', '', 'img/e6.jpg', '2000'),
(13, 'Woolean Hanging', '', 'img/p8.jpg', '500'),
(14, 'Baby set', '', 'img/w1.jpg', '1500'),
(15, 'Woolean Elephant', '', 'img/w2.jpg', '1500'),
(16, 'Woolean Kite', '', 'img/w4.jpg', '1000'),
(17, 'Tealight', '', 'img/q.jpg', '400'),
(18, 'Shell Flower', '', 'img/q1.jpg', '500'),
(19, 'Coconut Ganesha', '', 'img/q2.jpg', '500'),
(20, 'Shell Planter', '', 'img/q3.jpg', '550'),
(21, 'Buddha mandala art', '', 'img/m2.jpg', '2000'),
(22, 'Doodle Mandala', '', 'img/m3.jpg', '1500'),
(23, 'Dot Mandala', '', 'img/m4.jpg', '2500'),
(24, 'Peacock Mandala', '', 'img/l.jpg', '2000'),
(25, 'White Pottery', '', 'img/c3.jpg', '500'),
(26, 'Warli Pottery', '', 'img/c2.jpg', '1500'),
(27, 'Red Clay Pottery', '', 'img/p6.jpg', '1000'),
(28, 'Dinnerset', '', 'img/p7.jpg', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `product_size_variation`
--

CREATE TABLE `product_size_variation` (
  `var_id` int(20) NOT NULL,
  `id` int(20) NOT NULL,
  `quantity` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_size_variation`
--

INSERT INTO `product_size_variation` (`var_id`, `id`, `quantity`) VALUES
(1, 1, 10),
(2, 2, 20),
(3, 3, 15),
(4, 4, 10),
(5, 5, 20),
(6, 6, 20),
(7, 7, 20),
(8, 8, 20),
(9, 9, 20),
(10, 10, 20),
(11, 11, 20),
(12, 12, 20),
(13, 13, 20),
(14, 14, 20),
(15, 15, 20),
(16, 16, 20),
(17, 17, 20),
(18, 18, 20),
(19, 19, 20),
(20, 20, 20),
(21, 21, 20),
(22, 22, 20),
(23, 23, 20),
(24, 24, 20),
(25, 25, 20);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `review_text` text NOT NULL,
  `rating` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `product_id`, `user_name`, `review_text`, `rating`, `created_at`) VALUES
(1, 1, 'sdfa', 'good', 0, '2024-08-13 15:05:45'),
(2, 1, 'sada', 'very good', 0, '2024-08-13 15:16:18'),
(3, 1, 'sada', 'dafa', 0, '2024-08-13 15:21:11'),
(4, 1, 'sdfa', 'dfsa', 0, '2024-08-13 15:27:54'),
(5, 1, 'sairam', 'very good product', 0, '2024-08-13 15:35:27'),
(6, 1, 'sairam', 'good', 0, '2024-08-13 15:37:30'),
(7, 22, 'shreya', 'aa', 5, '2024-09-25 15:05:19'),
(11, 22, 'shreya', 'good', 1, '2024-10-18 04:42:52'),
(12, 22, 'shreya', 'good', 5, '2024-10-18 04:51:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phno` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `addr` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `phno`, `email`, `addr`) VALUES
(1, 'pooja ', '$2y$10$dAlUyERZjZDLf7CZYMOa6e.bN2SIdRhCqJw59auHDi4vbPUVrNAja', '9226441210', 'pooja@gmail.com', 'rahuri'),
(2, 'p', '$2y$10$05Y3rU/y9uZ/V/wyltjuWOkLD7KO9U.CVLzXrFV/E79Kk/RnRsQ7u', '8767647', 'pooja@gmail.com', 'rahuri'),
(3, 'shreya', '$2y$10$6dWKNUPtXoF6CCRqvBltn.2HJcY85R.S8FuW9rWpBE0gDpMj/0KjO', '9384895845', 's@gmail.com', 'Umbre'),
(4, 'sk', '$2y$10$tmaeNMjGG..OdHU3djxFPecI1rUlrFKP3xZT6TMABj0YsNfmg0KU2', '978656', 'm@gmail.com', 'rahuri'),
(5, 'sakshi', '$2y$10$IJKuJxdxoX0Yq1G3HXlTXeiONv4u0WZhHD9gVpKEQkpnJq0AACYxC', '9384895845', 'pooja@gmail.com', 'vambori'),
(6, 'yash', '$2y$10$QgRWYEBWBn1NNOaM9x9meuOKPoJiOxhSeN8/tIsxOdXNwZ8CjKvX2', '8769564398', 's@gmail.com', 'vambori'),
(7, 'anjali', '$2y$10$OwCJIo28APPs7PV1Ph9LZu6gtutKlPckQAuPJz558E7ImhGK7JzE6', '9384895845', 'gayatri@gmail.com', 'rahuri'),
(8, 'kavita', '$2y$10$xGQnbezxCqwH/kMxUwWJ/eQqIPKe8Okqx/fCFrfBUg1NYVsq0xu5q', '9384895845', 's@gmail.com', 'rahuri'),
(9, 'bhushan', '$2y$10$6KtY2hx9Za6v3cz1okSU9ezddTyoGre0RFX3Xq6.QcDtyV7ioOE6.', '9384895845', 'pooja@gmail.com', 'rahuri'),
(10, 'Renuka', '$2y$10$T54jyxHnef6CkeoKtan05uIkoYWCxj7gYCuqnY6m3.o4PiqJRY1AK', '9384895845', 's@gmail.com', 'vambori'),
(11, 'Ashwini', '$2y$10$VLooW6GPbLhUskNBdZ0UaOSNwNXm5jtadCSv3IhoC.FG7m3HHpQi2', '9384895845', 'pooja@gmail.com', 'Rahuri');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
