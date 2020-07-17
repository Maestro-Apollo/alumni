-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2020 at 08:27 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni`
--

-- --------------------------------------------------------

--
-- Table structure for table `committee`
--

CREATE TABLE `committee` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post` varchar(255) DEFAULT NULL,
  `created` datetime(6) DEFAULT NULL,
  `updated` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created` datetime(6) DEFAULT NULL,
  `updated` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fund`
--

CREATE TABLE `fund` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `details` longtext DEFAULT NULL,
  `headline` text NOT NULL,
  `date` date NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created` datetime(6) DEFAULT NULL,
  `updated` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `details`, `headline`, `date`, `image`, `created`, `updated`) VALUES
(1, 'Hello World of JU!', 'JU Opening', '2020-07-17', '1594965259_yoyo.jpg', NULL, NULL),
(2, 'Hello World of DU!', 'DU Opening', '2020-07-17', '1594966782_yoyo.jpg', NULL, NULL),
(3, 'Hello World of DU!', 'DU Opening', '2020-07-17', '1594966791_yoyo.jpg', NULL, NULL),
(4, ' Lorem Ipsum is simply ', 'JnU Opening', '2020-07-17', '1594966854_yoyo.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `is_valid` tinyint(1) DEFAULT NULL,
  `created` datetime(6) DEFAULT NULL,
  `updated` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `token`, `is_valid`, `created`, `updated`) VALUES
(7, 'rafimahafid@gmail.com', '$2y$10$aMuqPuoJEkQojJnarpBHS.ruB3IZZfunpMJQDeSFGvauJqKCEF.VS', NULL, 1, NULL, NULL),
(8, 'noyondey8@gmail.com', '$2y$10$RKGfFPOsyGhfrPmCRi8u1O07JUaVDrr.srB0QDkL1ZB5wM4WsRBu.', NULL, 0, NULL, NULL),
(9, 'noyondeyiit07@gmail.com', '$2y$10$DTFJR8crx2FhBDzRECINVOGWksU17V4h3YUPi7xjfuY9LNHfkIYjG', NULL, 1, NULL, NULL),
(26, 'yes@gmail.com', '$2y$10$HCeAh2D19cLWZHlmz0C17eYjexbXZEyCrBWs3Vmtp9RYopC6D68ry', NULL, NULL, NULL, NULL),
(28, '', '$2y$10$UWM966eBc07uaNr3abFs5uVpf8svh0lsnJ9sCtAGNZMPvctfT2.wS', NULL, NULL, NULL, NULL),
(29, 'hori@gmail.com', '$2y$10$ycNaN80kTH1F2Z.in7jJgO0t16.NXOy.NYL9Z5xxC8BsI7lYoeQ3m', NULL, NULL, NULL, NULL),
(34, 'rick@gmail.com', '$2y$10$lDOxLkJ6wHZgrEE6nvyDvOl1yYZacvrPovzl5YsdULf.SRwAgPu7S', NULL, NULL, NULL, NULL),
(36, 'happy@gmail.com', '$2y$10$BYyVLCrKnViWeljZLjApOuy/PPXI2U94I9xE4/T/fnGM1f6rPGSWe', NULL, NULL, NULL, NULL),
(37, 'sandy31@gmail.com', '$2y$10$li1AtmcbS6Bjsv0DtJfwWedEtaz7yIQLEd4juI4H.h5eSkGBRHGYS', NULL, NULL, NULL, NULL),
(38, 'josh41@gmail.com', '$2y$10$SYF.jOVTDzLq//g9foj.Deh2s3Q8i9sUXIu1Qcc.BhYQ1w4agzuJS', NULL, NULL, NULL, NULL),
(39, 'stive@gmail.com', '$2y$10$yfwuo.uEyOhjRNCQ.Cz/DuvQlLwx8w4GTm17mOkE3bAKJq8GiyeWq', NULL, NULL, NULL, NULL),
(40, 'jogr31@gmail.com', '$2y$10$zXjDP0j4EkXswz0kS9Sf7uq/W5q1JEf64lvTBXF..WZVDFBplbxF2', NULL, NULL, NULL, NULL),
(41, 'keya8@gmail.com', '$2y$10$yQA1s4ApFuMADSvi0Sw1n.VLC27JqwoAN3DWram.ICPPUhFJaCCpa', NULL, NULL, NULL, NULL),
(42, 'go31@gmail.com', '$2y$10$Wol0Oqjb7SduLcrwPlqYSurt5ymgcUgVum4GoJplrwqG4MbMwphp6', NULL, 1, NULL, NULL),
(43, 'yellow@gmail.com', '$2y$10$Z5P0Kkh.NHKBiExpyWCtlO5QQ.Bgw5AC43MkS.knK6vWTeYbjbSe6', NULL, 1, NULL, NULL),
(44, 'rakib@gmail.com', '$2y$10$JqoxORo1k2r4rS7eDOeRX.R4mrAxCiUCCt6oDIFcfU7tY0UaC6iUu', NULL, 1, NULL, NULL),
(45, 'sagor@gmail.com', '$2y$10$hBTISGNWUIoBCYTo6iSyceuRdiGRklPIrn.6aQ1GgCxpMi5wzaSCe', NULL, 1, NULL, NULL),
(46, 'nonny8@gmail.com', '$2y$10$o3KCF3TKGUnu10Kt2m37H.RmgDrx0fRoARXDZbEjreqImDQzpfCD.', NULL, 1, NULL, NULL),
(47, 'yop@gmail.com', '$2y$10$bQCC2AEt/ZdkIyav3aL96OuhsDlPabgVYlHQz/zdjEroYbAYNW8NK', NULL, 0, NULL, NULL),
(48, '', '$2y$10$2Q24GYeUzfN3O2uPQYUhDuBLnFKNrgHzV7.25Bo3tWUw4v8gfxpfW', NULL, 1, NULL, NULL),
(49, '', '$2y$10$Ei/B/9Zu9zsaPBmeslADW.FDfHBbNkEzhBzZVDPP4eogBbIT2jhQa', NULL, 1, NULL, NULL),
(50, 'gouri@gmail.com', '$2y$10$4/k.6POhkTkKto932WiqeuADRXexCXPhNuWuHdFluUUaId/tFWlre', NULL, 1, NULL, NULL),
(51, 'tomh@gmail.com', '$2y$10$LGU4Giwv7e5fr..spoe7IuOkBKGWRmB2A7.S8BcAT4RbIYgaefgEW', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_career`
--

CREATE TABLE `user_career` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `institute` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `joining_date` varchar(255) DEFAULT NULL,
  `ending_date` varchar(255) DEFAULT NULL,
  `created` datetime(6) DEFAULT NULL,
  `updated` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_career`
--

INSERT INTO `user_career` (`id`, `user_id`, `institute`, `position`, `joining_date`, `ending_date`, `created`, `updated`) VALUES
(1, 50, 'Jahangirnagar University', 'Student', '2016-03-12', '2020-03-12', NULL, NULL),
(2, 50, 'DU', 'Student', '2010-05-12', '2014-05-12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `batch` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `current_country` varchar(255) DEFAULT NULL,
  `current_city` varchar(255) DEFAULT NULL,
  `created` datetime(6) DEFAULT NULL,
  `updated` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `user_id`, `batch`, `image`, `name`, `phone`, `current_country`, `current_city`, `created`, `updated`) VALUES
(15, 7, 40, '1592541921_Bootstrap.png', 'Elric', '01778065885', 'Japan', 'Boston', NULL, NULL),
(16, 8, 42, '1592807176_20200205_131430.jpg', 'Noyon Dey', '01785332351', 'Bangladesh', 'Moulvibazar', NULL, NULL),
(17, 9, 40, '1592808848_104492255_167891401416596_1166288462964307465_n.jpg', 'Tommy', '01558658478', 'India', 'Delhi', NULL, NULL),
(34, 26, 39, '1592827889_1592818162_john-legend-gty-ml-191113_mn_4x3_608.jpg', 'YEs', '01785332352', 'Bangladesh', 'Dhaka', NULL, NULL),
(36, 28, 39, '1592833975_1592818162_john-legend-gty-ml-191113_mn_4x3_608.jpg', 'Ganga', '01785332352', 'Germany', 'Munich', NULL, NULL),
(37, 29, 41, '1592834151_1592818162_john-legend-gty-ml-191113_mn_4x3_608.jpg', 'Hori', '01578524135', 'Germany', 'Delhi', NULL, NULL),
(44, 36, 39, '1592845707_1592818162_john-legend-gty-ml-191113_mn_4x3_608.jpg', 'Happy', '01785332351', 'India', 'Moulvibazar', NULL, NULL),
(45, 37, 41, '1592879735_1592818162_john-legend-gty-ml-191113_mn_4x3_608.jpg', 'Sandy John', '01558658478', 'Germany', 'Munich', NULL, NULL),
(57, 49, 39, '1594354361_yoyo.jpg', 'nishi dey', '01785332352', 'Bangladesh', 'Moulvibazar', NULL, NULL),
(58, 50, 42, '1594354492_yoyo.jpg', 'Gouri Sen', '01578524135', 'Bangladesh', 'Moulvibazar', NULL, NULL),
(59, 51, 42, '1594356547_yoyo.jpg', 'Tom HD12', '01785332352', 'India', 'Dhaka', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_job`
--

CREATE TABLE `user_job` (
  `id` int(6) NOT NULL,
  `u_id` int(6) NOT NULL,
  `institute` varchar(256) DEFAULT NULL,
  `position` varchar(256) DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `committee`
--
ALTER TABLE `committee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fund`
--
ALTER TABLE `fund`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_career`
--
ALTER TABLE `user_career`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `user_job`
--
ALTER TABLE `user_job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_id` (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `committee`
--
ALTER TABLE `committee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fund`
--
ALTER TABLE `fund`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user_career`
--
ALTER TABLE `user_career`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `user_job`
--
ALTER TABLE `user_job`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `committee`
--
ALTER TABLE `committee`
  ADD CONSTRAINT `committee_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_career`
--
ALTER TABLE `user_career`
  ADD CONSTRAINT `user_career_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `user_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
