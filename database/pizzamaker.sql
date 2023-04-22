-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2023 at 03:56 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzamaker`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_to_cart`
--

CREATE TABLE `add_to_cart` (
  `id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` int(255) NOT NULL,
  `user_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_to_cart`
--

INSERT INTO `add_to_cart` (`id`, `product_id`, `product_name`, `product_price`, `user_id`) VALUES
(1, 2, 's', 34, NULL),
(2, 4, 'OPPO Reno5', 15000, NULL),
(3, 3, 'Oppo A37', 20000, NULL),
(4, 7, 'I Phone 6S', 25000, NULL),
(9, 3, 'Oppo A37', 20000, 0),
(10, 2, 'Oppo A20', 13000, 0),
(13, 3, 'Oppo A37', 20000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `phone_number` int(255) DEFAULT NULL,
  `total` int(255) DEFAULT NULL,
  `user_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `first_name`, `last_name`, `address`, `city`, `phone_number`, `total`, `user_id`) VALUES
(5, 'Len', 'Patton', 'Nemo velit quae prae', 'Voluptates est quia ', 1, 20000, 5),
(6, 'Umar', 'Habib', 'lahore', 'lahore', 2147483647, 15000, 1),
(7, 'Vincent', 'Hale', 'Quibusdam non volupt', 'Fugit culpa archite', 1, 35000, 6);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` int(255) DEFAULT NULL,
  `rate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `price`, `rate`) VALUES
(2, 'Chicken Extreme', 'Combination Of 3 Flavors of Chicken with Onion Bell Pepper, Green Olives, Mushrooms and Special Sauce', '16027866211808193155.png', 13000, '4'),
(3, 'Sausage Pizza', 'Chicken Sausages, Pizza Sauce and Cheese\r\n\r\n', '16129654997952468.jpeg', 20000, '1'),
(4, 'Chicken Supreme', 'A Combination Of 3 Flavors of Chicken, Black Olives, Mushrooms Bell Pepper and Onion with Tomato Sauce.', '16129648331142483410.jpeg', 15000, '5'),
(5, 'Black Pepper Tikka', 'A Blend of Marinated Black Pepper Chicken, Onion & Bell Pepper', '161288351560704272.png', 20000, '1'),
(6, 'Vegetable Pizza', 'Vegetables, Pizza Sauce and Cheese\r\n\r\n', '1642865986.png', 18000, '1'),
(7, 'Euro', 'Delight Combination of Specially Marinated Smoked Chicken Bell Pepper, Mushrooms with Tomato Sauce', '1612956575722870824.png', 25000, '1'),
(8, 'Cheese Lover Pizza', 'Yummiest Blend of Cheese and Pizza Sauce\r\n\r\n', '16129664171069619674.png', 30000, NULL),
(9, 'Cheezy Tikka', 'A Cheezy Fusion! A Cheese Sauce base with Tikka topping. Topped with Jalapenos, Onions our special Cheezy Sauce.', '16129648331142483410.jpeg', 100000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` int(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `role`) VALUES
(1, 'Admin', '', 'admin@gmail.com', '12345', 12345678, 'Admin'),
(2, 'User', NULL, 'user@gmail.com', '12345', 2147483647, 'User'),
(6, 'Kristen', 'Neal', 'vogih@mailinator.com', 'Pa$$w0rd!', 1, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
