-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 10, 2018 at 03:56 PM
-- Server version: 5.6.39-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elbiosc_agridb`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `NID` int(20) DEFAULT NULL,
  `profile_picture` varchar(1024) DEFAULT NULL,
  `gender` enum('m','f','') NOT NULL,
  `password` varchar(256) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `phone_number` varchar(32) NOT NULL,
  `email` varchar(256) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `NID`, `profile_picture`, `gender`, `password`, `birth_date`, `phone_number`, `email`, `createdDate`) VALUES
(1, 'Kwizera Misago', 'coop_001', NULL, 'images\\farmer\\default.jpg', 'm', 'cooperative', '2018-04-18', '', '', '2018-06-03 21:33:54'),
(46, 'Patricke', '1212', 2147483647, 'images\\farmer\\default.jpg', '', '', '1970-01-01', '', '', '2018-06-03 21:33:58'),
(58, 'Patricke', 'coop_me', 2147483647, '', '', '1212', '1970-01-01', '', '', '2018-04-30 22:16:10'),
(59, 'patrick', 'coop_me', 2147483647, '', '', '10222', '1969-12-31', '', '', '2018-05-01 11:06:44'),
(60, 'patrick', 'coop_me', 2147483647, '', '', '10222', '1969-12-31', '', '', '2018-05-01 11:06:50'),
(64, 'Amazina ye', 'coop_041', 2147483647, '', 'm', 'coop_041', '1969-12-31', '344444444', '', '2018-05-03 11:29:07'),
(65, 'Lambert', 'coop_042', 2147483647, 'images\\farmer\\default.jpg', 'm', '123456789', '1969-12-31', '0781187555', '', '2018-06-03 21:33:38'),
(66, 'Kamali', '', 1212121, 'images/farmer/Kamali1527625200.jpg', 'm', '', '1976-05-20', '078878787', '', '2018-05-29 20:20:00'),
(67, 'Samuel SUGIRA', '', 2147483647, 'images/farmer/Samuel SUGIRA1527881998.jpg', 'm', '', '2001-06-14', '0788265199', '', '2018-06-01 19:39:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
