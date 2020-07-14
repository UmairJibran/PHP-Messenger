-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 14, 2020 at 07:48 PM
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
-- Database: `php-messenger`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_convo`
--

CREATE TABLE `tbl_convo` (
  `convo_id` int(11) NOT NULL,
  `msg_participant1` int(11) NOT NULL,
  `msg_participant2` int(11) NOT NULL,
  `total_messages` int(11) NOT NULL,
  `last_message` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_convo`
--

INSERT INTO `tbl_convo` (`convo_id`, `msg_participant1`, `msg_participant2`, `total_messages`, `last_message`) VALUES
(1, 1, 2, 2, 'Test Successful'),
(2, 1, 4, 12, 'OMG*'),
(3, 4, 2, 1, 'Hi Yasin, how are you m\'friend');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_messages`
--

CREATE TABLE `tbl_messages` (
  `msg_id` int(11) NOT NULL,
  `msg_participant1` int(11) NOT NULL,
  `msg_participant2` int(11) NOT NULL,
  `msg_sender` int(11) NOT NULL,
  `msg_body` varchar(1024) NOT NULL,
  `msg_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_messages`
--

INSERT INTO `tbl_messages` (`msg_id`, `msg_participant1`, `msg_participant2`, `msg_sender`, `msg_body`, `msg_time`) VALUES
(1, 1, 2, 1, 'Testing message feature', '2020-07-14 09:48:44'),
(2, 1, 2, 2, 'Test Successful', '2020-07-14 09:49:09'),
(3, 1, 4, 1, 'Hi, Aizaz. How are you?', '2020-07-14 12:26:36'),
(4, 4, 1, 4, 'hi', '2020-07-14 12:41:22'),
(5, 4, 1, 4, 'lol', '2020-07-14 12:41:40'),
(6, 1, 4, 1, 'What?', '2020-07-14 12:42:04'),
(7, 4, 1, 4, '', '2020-07-14 12:49:17'),
(8, 4, 1, 4, 'Let\'s see if i can send apostrophe', '2020-07-14 12:49:34'),
(9, 1, 4, 1, 'Does it accept apostrophe?', '2020-07-14 12:53:13'),
(10, 1, 4, 1, 'let\'s see', '2020-07-14 12:53:18'),
(11, 4, 1, 4, 'Yes, It\'s working, that\'s so great!', '2020-07-14 13:06:15'),
(12, 4, 1, 4, 'let\'s see if preview works or not', '2020-07-14 13:08:42'),
(13, 1, 4, 1, 'OMH, YES PREVIEW IS WORKING TOO!', '2020-07-14 13:22:11'),
(14, 1, 4, 1, 'OMG*', '2020-07-14 13:22:24'),
(15, 4, 2, 4, 'Hi Yasin, how are you m\'friend', '2020-07-14 17:42:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `usr_id` int(11) NOT NULL,
  `usr_first_name` varchar(50) NOT NULL,
  `usr_last_name` varchar(50) NOT NULL,
  `usr_email` varchar(100) NOT NULL,
  `usr_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`usr_id`, `usr_first_name`, `usr_last_name`, `usr_email`, `usr_password`) VALUES
(1, 'Umair', 'Jibran', 'umair@gmail.com', '$2y$10$mdI/nr5wvmFnXm8Vym5hEOO7MksmJvTgAS2J98svP//zfxvilRDCe'),
(2, 'Muhammad', 'Yasin', 'yasin@yahoo.com', '$2y$10$nPQ1vxHRbiQ84kyR.DP6M.qYIZiRoVjfyTeZCJS2hRymiu8Fc67bq'),
(4, 'Aizaz', 'Nawab', 'aizaz@gmail.com', '$2y$10$ieSWYlcDi/IYkgBHAsF/COjyFMs/ZeHP3dPq5F7R28n/7ku03jHYi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_convo`
--
ALTER TABLE `tbl_convo`
  ADD PRIMARY KEY (`convo_id`);

--
-- Indexes for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`usr_id`),
  ADD UNIQUE KEY `email` (`usr_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_convo`
--
ALTER TABLE `tbl_convo`
  MODIFY `convo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
