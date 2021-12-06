-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2021 at 12:00 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `counsellor`
--

-- --------------------------------------------------------

--
-- Table structure for table `post_login`
--

CREATE TABLE `post_login` (
  `id` int(11) NOT NULL,
  `users_uid` varchar(20) NOT NULL,
  `login_id` varchar(20) NOT NULL,
  `snapshot` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_login`
--

INSERT INTO `post_login` (`id`, `users_uid`, `login_id`, `snapshot`, `status`) VALUES
(1, 'STD/5305', '58', '2021-12-06 10:50:28', 'OFF'),
(2, 'STD/4384', '85', '2021-12-06 10:03:57', 'ON'),
(3, 'STD/5305', '58', '2021-12-06 10:50:28', 'OFF'),
(4, 'STD/4384', '85', '2021-12-06 10:12:37', 'ON'),
(5, 'STD/4384', '85', '2021-12-06 10:47:41', 'ON'),
(6, 'STD/5305', '58', '2021-12-06 10:50:42', 'OFF'),
(7, 'STD/4384', '85', '2021-12-06 10:54:00', 'ON'),
(8, 'STD/5305', '58', '2021-12-06 10:55:03', 'ON');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post_login`
--
ALTER TABLE `post_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post_login`
--
ALTER TABLE `post_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
