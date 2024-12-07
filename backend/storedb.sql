-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2024 at 03:47 AM
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
-- Database: `storedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `username`, `password`) VALUES
(1, 'krel', '2023-54276', '123'),
(2, 'test', '2023-54277', '123'),
(3, 'aj', '2023-0002', '123'),
(4, 'cass', '2023-0004', '123');

-- --------------------------------------------------------

--
-- Table structure for table `drinks`
--

CREATE TABLE `drinks` (
  `Drink_ID` int(11) NOT NULL,
  `Drink_Name` varchar(255) NOT NULL,
  `Drink_Price` decimal(15,2) NOT NULL,
  `Drink_Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `drinks`
--

INSERT INTO `drinks` (`Drink_ID`, `Drink_Name`, `Drink_Price`, `Drink_Quantity`) VALUES
(1, 'Blueberry Juice', 38.00, 39),
(2, 'Chocolate Milktea', 30.00, 67),
(3, 'Coke Float', 45.00, 50),
(4, 'Cookies and Cream Milktea', 30.00, 32),
(5, 'Lemon Juice', 38.00, 40),
(6, 'Lychee Juice', 38.00, 40),
(7, 'Matcha Milktea', 30.00, 62),
(8, 'Okinawa Milktea', 30.00, 62),
(9, 'Royal Float', 45.00, 89),
(10, 'Water', 10.00, 150);

-- --------------------------------------------------------

--
-- Table structure for table `drinks_thumbnail`
--

CREATE TABLE `drinks_thumbnail` (
  `Drink_Thumbnail_ID` int(11) NOT NULL,
  `Drink_Thumbnail_Name` varchar(255) NOT NULL,
  `Drink_Thumbnail_Directory` varchar(255) NOT NULL,
  `Drink_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `drinks_thumbnail`
--

INSERT INTO `drinks_thumbnail` (`Drink_Thumbnail_ID`, `Drink_Thumbnail_Name`, `Drink_Thumbnail_Directory`, `Drink_ID`) VALUES
(1, 'blueberry', 'Assets/img/Web/Web_Drinks_Thumbnails/blueberry.png', 1),
(2, 'chocolate', 'Assets/img/Web/Web_Drinks_Thumbnails/chocolate.png', 2),
(3, 'coke_float', 'Assets/img/Web/Web_Drinks_Thumbnails/coke_float.jpg', 3),
(4, 'cookies_and_cream', 'Assets/img/Web/Web_Drinks_Thumbnails/cookies_and_cream.jpg', 4),
(5, 'lemon', 'Assets/img/Web/Web_Drinks_Thumbnails/lemon.jpg', 5),
(6, 'lychee', 'Assets/img/Web/Web_Drinks_Thumbnails/lychee.jpeg', 6),
(7, 'matcha', 'Assets/img/Web/Web_Drinks_Thumbnails/matcha.png', 7),
(8, 'okinawa milktea', 'Assets/img/Web/Web_Drinks_Thumbnails/okinawa_milktea.png', 8),
(9, 'royal_float', 'Assets/img/Web/Web_Drinks_Thumbnails/royal_float.jpg', 9),
(10, 'water', 'Assets/img/Web/Web_Drinks_Thumbnails/water.jpg', 10);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `Food_ID` int(11) NOT NULL,
  `Food_Name` varchar(255) NOT NULL,
  `Food_Price` decimal(15,2) NOT NULL,
  `Food_Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`Food_ID`, `Food_Name`, `Food_Price`, `Food_Quantity`) VALUES
(1, 'French Fries', 40.00, 63),
(2, 'Burger Steak w/ Rice', 58.00, 85),
(3, 'Cheese Sticks', 20.00, 19),
(4, 'Ham w/ Rice', 45.00, 49),
(5, 'Japanese Siomai', 45.00, 29),
(6, 'Siomai', 33.00, 24),
(7, 'Luncheon Meat w/ Rice', 48.00, 54),
(8, 'Nuggets w/ Rice', 58.00, 49),
(9, 'Siopao', 25.00, 39),
(10, 'Tocino with Rice', 80.00, 73);

-- --------------------------------------------------------

--
-- Table structure for table `food_thumbnail`
--

CREATE TABLE `food_thumbnail` (
  `Food_Thumbnail_ID` int(11) NOT NULL,
  `Food_Thumbnail_Name` varchar(255) NOT NULL,
  `Food_Thumbnail_Directory` varchar(255) NOT NULL,
  `Food_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `food_thumbnail`
--

INSERT INTO `food_thumbnail` (`Food_Thumbnail_ID`, `Food_Thumbnail_Name`, `Food_Thumbnail_Directory`, `Food_ID`) VALUES
(1, 'fries', 'Assets/img/Web/Web_Food_Thumbnails/fries.jpg', 1),
(2, 'burger_steak', 'Assets/img/Web/Web_Food_Thumbnails/burger_steak.jpg', 2),
(3, 'cheese_sticks', 'Assets/img/Web/Web_Food_Thumbnails/cheese_sticks.jpg', 3),
(4, 'ham', 'Assets/img/Web/Web_Food_Thumbnails/ham.jpg', 4),
(5, 'japanese_siomai', 'Assets/img/Web/Web_Food_Thumbnails/japanese_siomai.jpg', 5),
(6, 'siomai', 'Assets/img/Web/Web_Food_Thumbnails/siomai.jpg', 6),
(7, 'luncheon_meat', 'Assets/img/Web/Web_Food_Thumbnails/luncheon_meat.jpeg', 7),
(8, 'nuggets', 'Assets/img/Web/Web_Food_Thumbnails/nuggets.png', 8),
(9, 'siopao', 'Assets/img/Web/Web_Food_Thumbnails/siopao.jpg', 9),
(10, 'tocino', 'Assets/img/Web/Web_Food_Thumbnails/tocino.png', 10);

-- --------------------------------------------------------

--
-- Table structure for table `reserve_food`
--

CREATE TABLE `reserve_food` (
  `reserve_id` int(11) NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_student_id` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `reserve_food`
--

INSERT INTO `reserve_food` (`reserve_id`, `customer_name`, `customer_student_id`, `date`, `time`, `total`, `status`) VALUES
(15, 'krel', '2023-54276', '2024-12-05', '10:35', 98, 'cancelled'),
(16, 'krel', '2023-54276', '2024-12-05', '01:38', 40, 'completed'),
(17, 'krel', '2023-54276', '2024-12-06', '00:40', 120, 'completed'),
(18, 'test', '2023-54277', '2024-12-05', '00:16', 80, 'cancelled'),
(19, 'krel', '2023-54276', '2024-12-05', '04:55', 316, 'completed'),
(20, 'test', '2023-54277', '2024-12-05', '00:56', 0, 'completed'),
(21, 'test', '2023-54277', '2024-12-05', '13:01', 120, 'cancelled'),
(22, 'krel', '2023-54276', '2024-12-05', '04:13', 98, 'waiting'),
(23, 'krel', '2023-54276', '2024-12-05', '', 58, 'waiting'),
(24, 'krel', '2023-54276', '2024-12-05', '', 58, 'cancelled'),
(25, 'aj', '2023-0002', '2024-12-05', '03:19', 370, 'cancelled'),
(26, 'aj', '2023-0002', '2024-12-05', '02:20', 65, 'cancelled'),
(27, 'cass', '2023-0004', '2024-12-05', '02:27', 156, 'completed'),
(28, 'cass', '2023-0004', '2024-12-06', '01:02', 20, 'waiting'),
(29, 'aj', '2023-0002', '2024-12-06', '11:39', 40, 'cancelled'),
(30, 'aj', '2023-0002', '2024-12-06', '01:27', 0, 'cancelled'),
(31, 'aj', '2023-0002', '2024-12-06', '01:27', 0, 'cancelled'),
(32, 'aj', '2023-0002', '2024-12-06', '00:27', 80, 'waiting'),
(33, 'aj', '2023-0002', '2024-12-06', '00:28', 168, 'waiting'),
(34, 'aj', '2023-0002', '2024-12-06', '00:28', 40, 'waiting'),
(35, 'aj', '2023-0002', '2024-12-06', '00:26', 452, 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `reserve_food_items`
--

CREATE TABLE `reserve_food_items` (
  `id` int(11) NOT NULL,
  `reserve_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `food_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `reserve_food_items`
--

INSERT INTO `reserve_food_items` (`id`, `reserve_id`, `price`, `quantity`, `food_name`) VALUES
(21, 13, 40, 1, 'French Fries'),
(22, 13, 45, 1, 'Ham w/ Rice'),
(23, 14, 40, 1, 'French Fries'),
(24, 15, 40, 1, 'French Fries'),
(25, 15, 58, 1, 'Burger Steak w/ Rice'),
(26, 16, 40, 1, 'French Fries'),
(27, 17, 40, 1, 'French Fries'),
(28, 17, 80, 1, 'Tocino with Rice'),
(29, 18, 40, 2, 'French Fries'),
(30, 19, 40, 5, 'French Fries'),
(31, 19, 58, 2, 'Burger Steak w/ Rice'),
(32, 21, 40, 1, 'French Fries'),
(33, 21, 80, 1, 'Tocino with Rice'),
(34, 22, 40, 1, 'French Fries'),
(35, 22, 58, 1, 'Burger Steak w/ Rice'),
(36, 23, 58, 1, 'Burger Steak w/ Rice'),
(37, 23, 58, 1, 'Burger Steak w/ Rice'),
(38, 25, 40, 2, 'French Fries'),
(39, 25, 58, 5, 'Burger Steak w/ Rice'),
(40, 26, 20, 1, 'Cheese Sticks'),
(41, 26, 45, 1, 'Ham w/ Rice'),
(42, 27, 40, 1, 'French Fries'),
(43, 27, 58, 2, 'Burger Steak w/ Rice'),
(44, 28, 20, 1, 'Cheese Sticks'),
(45, 29, 40, 1, 'French Fries'),
(46, 32, 40, 2, 'French Fries'),
(47, 33, 58, 1, 'Burger Steak w/ Rice'),
(48, 33, 20, 1, 'Cheese Sticks'),
(49, 33, 45, 1, 'Ham w/ Rice'),
(50, 33, 45, 1, 'Japanese Siomai'),
(51, 34, 40, 1, 'French Fries'),
(52, 35, 40, 1, 'French Fries'),
(53, 35, 58, 1, 'Burger Steak w/ Rice'),
(54, 35, 20, 1, 'Cheese Sticks'),
(55, 35, 45, 1, 'Ham w/ Rice'),
(56, 35, 45, 1, 'Japanese Siomai'),
(57, 35, 33, 1, 'Siomai'),
(58, 35, 48, 1, 'Luncheon Meat w/ Rice'),
(59, 35, 58, 1, 'Nuggets w/ Rice'),
(60, 35, 25, 1, 'Siopao'),
(61, 35, 80, 1, 'Tocino with Rice');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `drinks`
--
ALTER TABLE `drinks`
  ADD PRIMARY KEY (`Drink_ID`),
  ADD UNIQUE KEY `Drink_Name` (`Drink_Name`);

--
-- Indexes for table `drinks_thumbnail`
--
ALTER TABLE `drinks_thumbnail`
  ADD PRIMARY KEY (`Drink_Thumbnail_ID`),
  ADD UNIQUE KEY `Drink_Thumbnail_Name` (`Drink_Thumbnail_Name`),
  ADD KEY `Drink_ID` (`Drink_ID`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`Food_ID`),
  ADD UNIQUE KEY `Food_Name` (`Food_Name`);

--
-- Indexes for table `food_thumbnail`
--
ALTER TABLE `food_thumbnail`
  ADD PRIMARY KEY (`Food_Thumbnail_ID`),
  ADD UNIQUE KEY `Food_Thumbnail_Name` (`Food_Thumbnail_Name`),
  ADD KEY `Food_ID` (`Food_ID`);

--
-- Indexes for table `reserve_food`
--
ALTER TABLE `reserve_food`
  ADD PRIMARY KEY (`reserve_id`);

--
-- Indexes for table `reserve_food_items`
--
ALTER TABLE `reserve_food_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `drinks`
--
ALTER TABLE `drinks`
  MODIFY `Drink_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `drinks_thumbnail`
--
ALTER TABLE `drinks_thumbnail`
  MODIFY `Drink_Thumbnail_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `Food_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4018;

--
-- AUTO_INCREMENT for table `food_thumbnail`
--
ALTER TABLE `food_thumbnail`
  MODIFY `Food_Thumbnail_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reserve_food`
--
ALTER TABLE `reserve_food`
  MODIFY `reserve_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `reserve_food_items`
--
ALTER TABLE `reserve_food_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `drinks_thumbnail`
--
ALTER TABLE `drinks_thumbnail`
  ADD CONSTRAINT `drinks_thumbnail_ibfk_1` FOREIGN KEY (`Drink_ID`) REFERENCES `drinks` (`Drink_ID`);

--
-- Constraints for table `food_thumbnail`
--
ALTER TABLE `food_thumbnail`
  ADD CONSTRAINT `food_thumbnail_ibfk_1` FOREIGN KEY (`Food_ID`) REFERENCES `food` (`Food_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
