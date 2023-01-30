-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2023 at 09:49 AM
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
-- Database: `audio_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(50) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirm_pass` varchar(50) NOT NULL,
  `user_image` text NOT NULL,
  `date` text NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `fullname`, `username`, `email`, `password`, `confirm_pass`, `user_image`, `date`) VALUES
(116, 'tonna praise', 'demo', 'vorah@gmail.com1111', '96e79218965eb72c92a549dd5a330112', '111111', 'me.jpg', 'Tue_08_22'),
(117, 'obi nolumh', 'dddd', 'nolum@gmail.comdddd', '', '111111', 'WIN_20220613_12_33_46_Pro.jpg', 'Tue_08_22'),
(122, 'Obi Cuban', 'Christian', 'nolum@gmail.comw', '96e79218965eb72c92a549dd5a330112', '111111', 'hero-bg.jpg', 'Wed_08_22'),
(123, 'Offorah Raphael Chinolum', 'dave', 'nolum@gmail.comr', '96e79218965eb72c92a549dd5a330112', '1', 'hero-bg.jpg', 'Wed_08_22'),
(124, 'emy okafor', 'emy', 'jsmith@sample.comx', '96e79218965eb72c92a549dd5a330112', '1', 'hero-bg.jpg', 'Thu_08_22'),
(125, 'Obi b', 'b', 'b@gmail.com', '3dbe00a167653a1aaee01d93e77e730e', '1', '', 'Mon_11_22'),
(126, 'user', 'user', 'user@user.com', '88b87698be0bc461f3cacf1f080929d5', '1', '', 'Sun_01_23');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `fullname`, `email`, `username`, `password`, `role`, `created`) VALUES
(25, 'forah', 'nofforah@gmail.com', 'forah', '96e79218965eb72c92a549dd5a330112', 'admin', '2022-08-11 14:37:20'),
(27, 'Obi Cuban', 'dd@gmail.com', 'cuban', '96e79218965eb72c92a549dd5a330112', 'moderator', '2022-08-11 14:57:04'),
(28, 'sss', 'dd@gmail.com', 'Christian', '96e79218965eb72c92a549dd5a330112', 'admin', '2022-08-11 14:57:59'),
(29, 'admin', 'admin@admin.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '2023-01-29 08:34:12'),
(30, 'admin', 'admin@admin.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '2023-01-29 08:34:15');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `upload_id` int(11) NOT NULL,
  `sn` int(11) NOT NULL,
  `username` text NOT NULL,
  `title` text NOT NULL,
  `artist` text NOT NULL,
  `upath` text NOT NULL,
  `cover` text NOT NULL,
  `date` text NOT NULL DEFAULT current_timestamp(),
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`upload_id`, `sn`, `username`, `title`, `artist`, `upath`, `cover`, `date`, `status`) VALUES
(243, 0, 'user', 'c', 'p square', '[MP3DOWNLOAD.TO] Polo G, Lil Wayne - GANG GANG (INSTRUMENTAL) Reprod. @Winiss Beats-320k.mp3', '2348107767732_status_30c8d1951f0d455992c5668124532c82.jpg', 'Sun_01_23', 'APPROVED');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`upload_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `upload_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
