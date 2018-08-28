-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2018 at 04:27 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `investments`
--

-- --------------------------------------------------------

--
-- Table structure for table `invest_users`
--

CREATE TABLE `invest_users` (
  `id` int(11) NOT NULL,
  `userCode` int(11) NOT NULL COMMENT 'link to uplus user id',
  `loginId` varchar(128) NOT NULL,
  `pwd` varchar(1024) NOT NULL,
  `account_type` varchar(16) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` int(11) NOT NULL,
  `updatedDate` timestamp NULL DEFAULT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `archived` enum('no','yes','','') NOT NULL DEFAULT 'no',
  `archievedDate` timestamp NULL DEFAULT NULL,
  `archivedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='this helps in tables creation';

--
-- Dumping data for table `invest_users`
--

INSERT INTO `invest_users` (`id`, `userCode`, `loginId`, `pwd`, `account_type`, `createdDate`, `createdBy`, `updatedDate`, `updatedBy`, `archived`, `archievedDate`, `archivedBy`) VALUES
(1, 201, 'firstbank', 'firstbank', 'broker', '2018-04-22 14:12:51', 1, NULL, NULL, 'no', NULL, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `users`
-- (See below for the actual view)
--
CREATE TABLE `users` (
`id` int(11)
,`loginId` varchar(128)
,`pwd` varchar(1024)
,`name` varchar(50)
,`gender` varchar(20)
,`phone` varchar(50)
,`email` varchar(50)
,`profile_picture` text
,`account_type` varchar(16)
);

-- --------------------------------------------------------

--
-- Structure for view `users`
--
DROP TABLE IF EXISTS `users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `users`  AS  select `u`.`id` AS `id`,`i`.`loginId` AS `loginId`,`i`.`pwd` AS `pwd`,`u`.`name` AS `name`,`u`.`gender` AS `gender`,`u`.`phone` AS `phone`,`u`.`email` AS `email`,`u`.`userImage` AS `profile_picture`,`i`.`account_type` AS `account_type` from (`uplus`.`users` `u` join `invest_users` `i` on((`i`.`userCode` = `u`.`id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invest_users`
--
ALTER TABLE `invest_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invest_users`
--
ALTER TABLE `invest_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
