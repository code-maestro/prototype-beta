-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: eu-cdbr-west-01.cleardb.com
-- Generation Time: Dec 03, 2021 at 02:17 PM
-- Server version: 5.6.50-log
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `heroku_dc3ac1671ff9bcb`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `appointment_id` varchar(11) DEFAULT NULL,
  `complaint` varchar(45) DEFAULT NULL,
  `complaint_detail` mediumtext NOT NULL,
  `appointment_date` date DEFAULT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `status` tinyint(1) NOT NULL,
  `users_uid` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `appointment_id`, `complaint`, `complaint_detail`, `appointment_date`, `start_time`, `end_time`, `status`, `users_uid`) VALUES
(138, 'A-8351', 'Bipolar', 'Mood swings', '2021-10-19', '19:00:00', '20:00:00', 0, 'STD/5305'),
(139, 'A-1058', 'Bipolar and mood swings', 'Angry all the time', '2021-10-23', '09:41:00', '10:41:00', 0, 'STD/5305'),
(140, 'A-8182', 'Anger and elevated stress', 'Stressed', '2021-10-24', '10:00:00', '11:00:00', 0, 'STD/5305'),
(141, 'A-8228', 'Elevated stress levels', 'Annoyed', '2021-10-23', '09:00:00', '10:00:00', 0, 'STD/5305'),
(142, 'A-9662', 'Depressed ', 'Hating oneself', '2021-10-31', '11:06:00', '13:06:00', 0, 'STD/3173'),
(145, 'A-5021', 'Chronic Depression', 'sdfasdf', '2021-11-10', '10:46:00', '13:47:00', 0, 'STD/5305');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `login_id` int(11) DEFAULT NULL,
  `reg_no` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `users_uid` varchar(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `login_id`, `reg_no`, `password`, `users_uid`, `email`) VALUES
(13, 4103, '2018/bit/036', '88bca2d92c65d972dbf866283c818548', 'STD/648', 'edgarbaluku@gmail.com'),
(48, 7025, '', 'd54d1702ad0f8326224b817c796763c9', 'STAFF/184', 'major@must.ac.ug'),
(54, 6890, '', 'd54d1702ad0f8326224b817c796763c9', 'STAFF/155', 'max@must.ac.ug'),
(58, 8091, 'U234', 'd54d1702ad0f8326224b817c796763c9', 'STD/5305', 'shafiq@must.ac.ug'),
(59, 8267, 'U1231/90', 'd54d1702ad0f8326224b817c796763c9', 'STD/3173', 'aaron@must.ac.ug'),
(65, 1692, '2018/BFF/232', 'd54d1702ad0f8326224b817c796763c9', 'STD/7961', 'gerald@must.ac.ug'),
(75, 3118, 'DONT23', 'd54d1702ad0f8326224b817c796763c9', 'STD/5988', 'dont@must.ac.ug');

-- --------------------------------------------------------

--
-- Table structure for table `login_logs`
--

CREATE TABLE `login_logs` (
  `id` int(11) NOT NULL,
  `users_uid` varchar(20) NOT NULL,
  `login_id` varchar(20) NOT NULL,
  `snapshot` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `message`) VALUES
(1, 'HDFJHDFJDFG'),
(2, 'lmfaooooo'),
(3, 'poppopp'),
(4, 'ada'),
(5, 'delete'),
(6, 'oopo'),
(7, 'HOOOOO'),
(8, 'Did you just see that'),
(9, 'i have cance'),
(10, 'still ogging'),
(11, 'bad person'),
(12, 'John'),
(13, 'John'),
(14, 'John'),
(15, 'STAFF/3893'),
(16, 'STAFF/3893'),
(17, 'STAFF/3893'),
(18, 'STAFF/3893'),
(19, 'STAFF/3893');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sent_msg_id` varchar(50) NOT NULL,
  `received_msg_id` varchar(50) NOT NULL,
  `text_msg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sent_msg_id`, `received_msg_id`, `text_msg`) VALUES
(1, 'STAFF/1604', 'STD/5305', 'hallo ha'),
(2, 'STAFF/155', 'STD/5305', 'food'),
(3, 'STD/5305', 'STAFF/155', 'helllo there '),
(4, 'STD/5305', 'STAFF/155', ' '),
(5, 'STD/5305', 'STAFF/155', 'sdfjasfhasfasjf'),
(6, 'STD/5305', 'STAFF/184', 'nothing'),
(7, 'STAFF/184', 'STD/5305', 'and somwthng about t'),
(8, 'STD/5305', 'STAFF/155', 'jdfhsjghdfalghdfs'),
(9, 'STD/5305', 'STAFF/155', ' HEYYUU'),
(10, 'STAFF/155', 'STD/5305', 'WE ARE GOOD'),
(11, 'STD/5305', 'STAFF/155', ' DFGJSDFJKGSDG'),
(12, 'STD/5305', 'STAFF/184', 'Hello there'),
(13, 'STD/5305', 'STAFF/184', 'Heyy again'),
(14, 'STD/5305', 'STAFF/184', 'heyyy its me agan'),
(15, 'STAFF/184', 'STD/5305', 'Heeyy how are you doing'),
(16, 'STD/5305', 'STAFF/184', ' im not okay'),
(17, 'STD/3173', 'STAFF/155', 'helllo'),
(18, 'STAFF/155', 'STD/3173', 'hiiii'),
(19, 'STAFF/155', 'STD/3173', 'im here to help'),
(20, 'STD/3173', 'STAFF/155', 'glad to be here'),
(21, 'STAFF/155', 'STD/3173', 'thank you'),
(22, 'STD/3173', 'STAFF/155', 'police'),
(23, 'STD/3173', 'STAFF/155', 'lkj'),
(25, 'STAFF/155', 'STD/5305', 'helllo');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_id` varchar(45) DEFAULT NULL,
  `users_uid` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_id`, `users_uid`) VALUES
(10, '1', 'STD/7645'),
(11, '2', 'STAFF/3893'),
(12, '1', 'STD/249'),
(13, '1', 'STD/648'),
(14, '1', 'STD/5523'),
(15, '1', 'STD/9016'),
(16, '1', 'STD/5722'),
(17, '1', 'STD/1886'),
(18, '1', 'STD/7780'),
(19, '1', 'STD/9578'),
(20, '2', 'STAFF/989'),
(21, '2', 'STAFF/7133'),
(22, '1', 'STD/5902'),
(23, '1', 'STD/708'),
(24, '2', 'STAFF/7251'),
(25, '2', 'STAFF/8727'),
(26, '2', 'STAFF/7254'),
(27, '2', 'STAFF/3709'),
(28, '2', 'STAFF/8087'),
(29, '2', 'STAFF/4110'),
(30, '2', 'STAFF/5206'),
(31, '2', 'STAFF/7521'),
(32, '2', 'STAFF/6243'),
(33, '2', 'STAFF/1048'),
(34, '2', 'STAFF/254'),
(35, '2', 'STAFF/4063'),
(36, '2', 'STAFF/4572'),
(37, '2', 'STAFF/9913'),
(38, '1', 'STD/9016'),
(39, '2', 'STAFF/8335'),
(40, '2', 'STAFF/2762'),
(41, '2', 'STAFF/8229'),
(42, '2', 'STAFF/4003'),
(43, '1', 'STD/9852'),
(44, '2', 'STAFF/5548'),
(45, '2', 'STAFF/6968'),
(46, '2', 'STAFF/3306'),
(47, '2', 'STAFF/2129'),
(48, '2', 'STAFF/184'),
(49, '1', 'STD/3129'),
(50, '1', 'STD/9121'),
(51, '1', 'STD/1613'),
(52, '1', 'STD/7825'),
(53, '2', 'STAFF/6087'),
(54, '2', 'STAFF/155'),
(55, '2', 'STAFF/1604'),
(56, '2', 'STAFF/5020'),
(57, '2', 'STAFF/9634'),
(58, '1', 'STD/5305'),
(59, '1', 'STD/3173'),
(65, '1', 'STD/7961'),
(75, '1', 'STD/5988');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `access_token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`id`, `access_token`) VALUES
(1, '{\"access_token\":\"eyJhbGciOiJIUzUxMiIsInYiOiIyLjAiLCJraWQiOiJkMzYwYzQ3MS00YjVlLTQzYTUtYjYzNi03YzlmY2M5ZjA3NmUifQ.eyJ2ZXIiOjcsImF1aWQiOiIwZWIxNzNhNjBiOTU0MWE4YWY2ZGJhOTAwNDYwMmQ1MyIsImNvZGUiOiJNb1BPZTQySUtaX2lTRmZEVU9jVGhTMWQwWDR4VjNzUFEiLCJpc3MiOiJ6bTpjaWQ6YkQ2N05IQ3NTZE90cXBRMXNGbkc1USIsImdubyI6MCwidHlwZSI6MCwidGlkIjowLCJhdWQiOiJodHRwczovL29hdXRoLnpvb20udXMiLCJ1aWQiOiJpU0ZmRFVPY1RoUzFkMFg0eFYzc1BRIiwibmJmIjoxNjI3MTI1NjA5LCJleHAiOjE2MjcxMjkyMDksImlhdCI6MTYyNzEyNTYwOSwiYWlkIjoiMWcwUzVZdk1SbUctTUh5UXh2TjMxZyIsImp0aSI6ImFjYmY1MGFiLTI0ZmQtNDMxMC04OTg2LTJhNjE1Njc4MDI2OCJ9.HplRJuvRikl-Caae7smR2JnVQInhl1gXmQ39Z589Y92u3RV8KY6cNFMOnGb1FbDr6xWJE3NunIwEbcslgMAwNw\",\"token_type\":\"bearer\",\"refresh_token\":\"eyJhbGciOiJIUzUxMiIsInYiOiIyLjAiLCJraWQiOiI3N2NiMWU3Yi0yMTczLTRmOTYtYWNkMi03YjkwNmI4MjdiZGEifQ.eyJ2ZXIiOjcsImF1aWQiOiIwZWIxNzNhNjBiOTU0MWE4YWY2ZGJhOTAwNDYwMmQ1MyIsImNvZGUiOiJNb1BPZTQySUtaX2lTRmZEVU9jVGhTMWQwWDR4VjNzUFEiLCJpc3MiOiJ6bTpjaWQ6YkQ2N05IQ3NTZE90cXBRMXNGbkc1USIsImdubyI6MCwidHlwZSI6MSwidGlkIjowLCJhdWQiOiJodHRwczovL29hdXRoLnpvb20udXMiLCJ1aWQiOiJpU0ZmRFVPY1RoUzFkMFg0eFYzc1BRIiwibmJmIjoxNjI3MTI1NjA5LCJleHAiOjIxMDAxNjU2MDksImlhdCI6MTYyNzEyNTYwOSwiYWlkIjoiMWcwUzVZdk1SbUctTUh5UXh2TjMxZyIsImp0aSI6ImQ1OGM1ODA4LTEyNzctNGIyZS04M2ZlLTIyOWE3MDQ2N2U0ZCJ9.sujd3TYAlzwMi-9Rx_YkAneTpih3ixDaeWtgMbPbpXkOXZsYqJEqBkOty-OywpnL5x8C68YcVoup9xLKh7CVEw\",\"expires_in\":3599,\"scope\":\"meeting:master meeting:read:admin meeting:write:admin\"}');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `users_id` varchar(11) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `gender` varchar(7) NOT NULL,
  `phone_number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `users_id`, `first_name`, `last_name`, `gender`, `phone_number`) VALUES
(14, 'STD/5523', 'Baluku', 'Edgar', '', ''),
(21, 'STAFF/7133', 'mick', 'schummacker', 'Female', ''),
(35, 'STAFF/4063', 'high', 'high', 'female', ''),
(48, 'STAFF/184', 'mak', 'must', 'female', '+242990903424'),
(52, 'STD/7825', 'cancel', 'cancle', 'male', ''),
(54, 'STAFF/155', 'max', 'verstappen', 'male', '+256780730001'),
(55, 'STAFF/1604', 'kimi', 'rakkonnen', 'male', '+23423322323'),
(56, 'STD/5305', 'shafiq', 'lafam', 'male', '+23416463456345'),
(57, 'STD/3173', 'aaron', 'eel', '', ''),
(65, 'STD/7961', 'sir', 'gero', '', ''),
(75, 'STD/5988', 'dont', 'user', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `zoom-token`
--

CREATE TABLE `zoom-token` (
  `id` int(11) NOT NULL,
  `meeting-id` varchar(10) NOT NULL,
  `access-token` text,
  `users_uid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`,`users_uid`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`,`users_uid`);

--
-- Indexes for table `login_logs`
--
ALTER TABLE `login_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`,`users_uid`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `zoom-token`
--
ALTER TABLE `zoom-token`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_uid` (`users_uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `login_logs`
--
ALTER TABLE `login_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `zoom-token`
--
ALTER TABLE `zoom-token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
