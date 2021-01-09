-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3325
-- Generation Time: Jan 09, 2021 at 05:57 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

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
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `details` varchar(1000) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `venue` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `time` varchar(255) NOT NULL,
  `created` datetime(6) DEFAULT NULL,
  `updated` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `email`, `details`, `image`, `attachment`, `venue`, `type`, `date`, `time`, `created`, `updated`) VALUES
(22, 'Apollo_Product two', NULL, '0s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lore', '1595496014_37960509_2097840177102508_4817775003309178880_o (1).jpg', NULL, 'JU', 'Anime', '25/07/2020', '6:20 PM', NULL, NULL),
(26, 'Jinta', NULL, 'ghggggggg guuuuuuuuu', '1595556840_4251c4100587783.5f0c5ecca290a.jpeg', NULL, 'du', 'ty', '25/07/2020', '6:13 AM', NULL, NULL),
(27, 'Minna_Jinta_2', NULL, 'giuuuu gouuuuuuuuuuu', '1596097339_0.jpg', NULL, 'du', 'ty', '30/07/2020', '8:15 AM', NULL, NULL),
(31, 'Apollo_Product h', NULL, 'hjvhjvhvhv gvuguu', '1595563819_37286809866_9ee8e7c996_b.jpg', NULL, 'JU', 'Anime', '25/07/2020', '6:10 AM', NULL, NULL),
(37, 'Apollo_Product yh', NULL, 'hjhh hohoh hoihoih', '1595612207_business-background-illustration-people-thumbnail.jpg', NULL, 'JU', 'Anime', '25-07-2020', '11:35 PM', NULL, NULL),
(39, 'Apollo_Product_234', NULL, 'sggs thd', '1595688399_Gantt Chart.JPG', NULL, 'JU', 'Anime', '22-07-2020', '6:46 PM', NULL, NULL),
(40, 'Apollo_Product new', NULL, 'gsrgg sgsg', '1595688516_Capture.JPG', NULL, 'JU', 'Anime', '23-07-2020', '5:48 PM', NULL, NULL),
(41, 'JU Pohela', NULL, '0s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lore', '1595688985_source2.gif', NULL, 'JU', 'Anime', '30-07-2020', '10:56 PM', NULL, NULL),
(43, 'Anime T-shirt  4', NULL, 'gsg dfs sgsg', '1596098779_c1.png', NULL, 'DU', 'Anime', '01-08-2020', '6:45 PM', NULL, NULL),
(44, 'Anime T-shirt ice', NULL, 'aeaf afaf zfzdfz sggtqegqg', '1596099136_hqdefault.jpg', NULL, 'JU', 'Anime', '21-07-2020', '5:35 PM', NULL, NULL),
(45, 'Anime T-shirt af', NULL, 'afaf', '1596099251_', NULL, '', '', '', '', NULL, NULL),
(46, 'Rafi Maha', NULL, 'aefaef', '1596099358_2.jpg', NULL, 'DU', 'Anime', '22-07-2020', '6:55 PM', NULL, NULL),
(47, 'JU Alumni', NULL, 'Gather all alumni members', '1610197793_japan-2014616_1920.jpg', NULL, 'JU', 'Reunion ', '11-01-2021', '6:08 PM', NULL, NULL),
(48, 'JU Alumni - 2', NULL, 'This is plain text', '1610198489__MG_7134.jpg', NULL, 'JU', 'Alumni', '15-01-2021', '6:00 PM', NULL, NULL);

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
-- Table structure for table `job_offer`
--

CREATE TABLE `job_offer` (
  `id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  `title` varchar(256) NOT NULL,
  `position` varchar(256) NOT NULL,
  `requirements` text NOT NULL,
  `salary` int(7) NOT NULL,
  `institute` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `details` mediumtext NOT NULL,
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
(4, ' Lorem Ipsum is simply ', 'JnU Opening', '2020-07-17', '1594966854_yoyo.jpg', NULL, NULL),
(5, 'yo yo yo  yo yo yo ', 'SUST Opening', '2019-06-15', '1594981925_yoyo.jpg', NULL, NULL),
(6, 'you you you  you yuo yuo ', 'DUST Opening', '2020-06-15', '1594982058_yoyo.jpg', NULL, NULL),
(7, 'metimes by accident, sometimes on purpose (injected humour and the like).', 'MGHS', '2020-07-18', '1595067148_yoyo.jpg', NULL, NULL),
(8, 'hdssssssssssssssss thssshffdhfhdfh', 'News', '2020-07-17', '1595514600_202044a52e53dff8c3182b7d1f981279b17f06_25_44a52e53dff8c3182b7d1f981279b17f_image.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE `publications` (
  `id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  `title` text NOT NULL,
  `link` varchar(256) NOT NULL,
  `date` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`id`, `user_id`, `title`, `link`, `date`, `created`, `updated`) VALUES
(6, 7, 'Title 2', 'fjkfy', '14/11/1918', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 7, 'Title 1', 'text', '2020-05-13 08:27:42', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 7, 'Title 3', 'text', '2020-05-13 08:27:42', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
(8, 'noyondey8@gmail.com', '$2y$10$RKGfFPOsyGhfrPmCRi8u1O07JUaVDrr.srB0QDkL1ZB5wM4WsRBu.', NULL, 1, NULL, NULL),
(9, 'noyondeyiit07@gmail.com', '$2y$10$DTFJR8crx2FhBDzRECINVOGWksU17V4h3YUPi7xjfuY9LNHfkIYjG', NULL, 1, NULL, NULL),
(26, 'yes@gmail.com', '$2y$10$HCeAh2D19cLWZHlmz0C17eYjexbXZEyCrBWs3Vmtp9RYopC6D68ry', NULL, NULL, NULL, NULL),
(28, '', '$2y$10$UWM966eBc07uaNr3abFs5uVpf8svh0lsnJ9sCtAGNZMPvctfT2.wS', NULL, NULL, NULL, NULL),
(29, 'hori@gmail.com', '$2y$10$ycNaN80kTH1F2Z.in7jJgO0t16.NXOy.NYL9Z5xxC8BsI7lYoeQ3m', NULL, NULL, NULL, NULL),
(34, 'rick@gmail.com', '$2y$10$lDOxLkJ6wHZgrEE6nvyDvOl1yYZacvrPovzl5YsdULf.SRwAgPu7S', NULL, NULL, NULL, NULL),
(36, 'happy@gmail.com', '$2y$10$BYyVLCrKnViWeljZLjApOuy/PPXI2U94I9xE4/T/fnGM1f6rPGSWe', NULL, NULL, NULL, NULL),
(37, 'sandy31@gmail.com', '$2y$10$li1AtmcbS6Bjsv0DtJfwWedEtaz7yIQLEd4juI4H.h5eSkGBRHGYS', NULL, NULL, NULL, NULL),
(38, 'josh41@gmail.com', '$2y$10$SYF.jOVTDzLq//g9foj.Deh2s3Q8i9sUXIu1Qcc.BhYQ1w4agzuJS', NULL, NULL, NULL, NULL),
(41, 'keya8@gmail.com', '$2y$10$yQA1s4ApFuMADSvi0Sw1n.VLC27JqwoAN3DWram.ICPPUhFJaCCpa', NULL, NULL, NULL, NULL),
(42, 'go31@gmail.com', '$2y$10$Wol0Oqjb7SduLcrwPlqYSurt5ymgcUgVum4GoJplrwqG4MbMwphp6', NULL, 1, NULL, NULL),
(43, 'yellow@gmail.com', '$2y$10$Z5P0Kkh.NHKBiExpyWCtlO5QQ.Bgw5AC43MkS.knK6vWTeYbjbSe6', NULL, 1, NULL, NULL),
(44, 'rakib@gmail.com', '$2y$10$JqoxORo1k2r4rS7eDOeRX.R4mrAxCiUCCt6oDIFcfU7tY0UaC6iUu', NULL, 1, NULL, NULL),
(45, 'sagor@gmail.com', '$2y$10$hBTISGNWUIoBCYTo6iSyceuRdiGRklPIrn.6aQ1GgCxpMi5wzaSCe', NULL, 1, NULL, NULL),
(46, 'nonny8@gmail.com', '$2y$10$o3KCF3TKGUnu10Kt2m37H.RmgDrx0fRoARXDZbEjreqImDQzpfCD.', NULL, 1, NULL, NULL),
(50, 'gouri@gmail.com', '$2y$10$fmhEllYPH95XO2Jl80YoROs7k12ERKOXs.sawdi8bDsRs1sXwZeoq', NULL, 1, NULL, NULL),
(51, 'tomh@gmail.com', '$2y$10$LGU4Giwv7e5fr..spoe7IuOkBKGWRmB2A7.S8BcAT4RbIYgaefgEW', NULL, 1, NULL, NULL),
(52, 'urmi@gmail.com', '$2y$10$UOgL3gvThax4Q3SnikeJo.WVTadfvLRSOjViD2hNsp28HS9dTZ2XS', NULL, 1, NULL, NULL),
(53, 'dey@gmail.com', '$2y$10$hjV8Ah6zdlciWsiovPL3JekabDwyIo3dFJRHMi.wkmcujtLfO.Ti6', NULL, 1, NULL, NULL),
(54, 'tomas@gmail.com', '$2y$10$xNmPQs7sL/PmhPT4aAAfFuDzo7YW95xikWNwqN4XzxNjrnONg9ZWm', NULL, 1, NULL, NULL),
(55, 'yoc@gmail.com', '$2y$10$6tYLfcOkI8X5ygu4y.GVgeFYOkIGITj.rKzmXyAVMy28hn.pJgwJS', NULL, 1, NULL, NULL),
(57, 'noyon10@gmail.com', '$2y$10$Bixd/eGOJ0i3kWbdN3XV4eETwDOnaDBil3biv6AKu9ufdNBk/ptrW', NULL, 1, NULL, NULL);

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
(58, 50, 42, '1594354492_yoyo.jpg', 'Gouri Sen', '01578524135', 'Bangladesh', 'Moulvibazar', NULL, NULL),
(59, 51, 42, '1594356547_yoyo.jpg', 'Tom HD12', '01785332352', 'India', 'Dhaka', NULL, NULL),
(60, 52, 40, '1595313786_yoyo.jpg', 'Urmi', '01578524135', 'Japan', 'Delhi', NULL, NULL),
(61, 53, 42, '1595314538_yoyo.jpg', 'Dey N', '01785332351', 'USA', 'Delhi', NULL, NULL),
(62, 54, 41, '1595315327_yoyo.jpg', 'Tomas', '01785332352', 'India', 'Delhi', NULL, NULL),
(63, 55, 41, '1595316755_yoyo.jpg', 'Yoc', '01578524135', 'Germany', 'Dhaka', NULL, NULL),
(65, 57, 39, '1610197954__MG_6950.jpg', 'Noyon Dey 23', '01778065890', 'India', 'Dhaka', NULL, NULL);

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
-- Indexes for table `job_offer`
--
ALTER TABLE `job_offer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `fund`
--
ALTER TABLE `fund`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_offer`
--
ALTER TABLE `job_offer`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `user_career`
--
ALTER TABLE `user_career`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

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
-- Constraints for table `job_offer`
--
ALTER TABLE `job_offer`
  ADD CONSTRAINT `job_offer_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `publications`
--
ALTER TABLE `publications`
  ADD CONSTRAINT `publications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
