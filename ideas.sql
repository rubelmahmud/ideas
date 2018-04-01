-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2018 at 11:32 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ideas`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(30) DEFAULT NULL,
  `category_desc` varchar(100) DEFAULT NULL,
  `ideas_closer_date` date DEFAULT NULL,
  `ideas_final_closer_date` date DEFAULT NULL,
  `created_time` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_desc`, `ideas_closer_date`, `ideas_final_closer_date`, `created_time`) VALUES
(2, 'Library', 'A', '2018-04-11', '2018-05-01', '2018-03-14'),
(3, 'Sports', 'B', '2018-04-20', '2018-05-05', '2018-03-19'),
(5, 'Education', 'D', '2018-03-20', '2018-04-20', '2018-03-19'),
(6, 'Club', ' Club Club Club                                                ', '2018-05-01', '2018-05-05', '2018-03-19'),
(10, 'Neve Miles', 'AAAAAAA   F AAAA                        ', '2018-05-02', '2018-06-13', '2018-03-16'),
(11, 'Programming Club', 'programing contest, workshop', '2018-04-05', '2018-06-01', '2018-04-02');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(15) NOT NULL,
  `comment_description` varchar(150) DEFAULT NULL,
  `comment_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment_type` int(5) NOT NULL DEFAULT '0' COMMENT '0-public, 1-private',
  `ideas_number` int(100) DEFAULT NULL,
  `user_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment_description`, `comment_time`, `comment_type`, `ideas_number`, `user_id`) VALUES
(54, 'Hi', '2018-03-25 03:18:09', 0, 47, 6),
(58, 'comment', '2018-03-26 07:44:48', 0, 46, 6),
(59, 'Anno comment                      ', '2018-03-26 07:44:56', 1, 46, 6),
(71, 'Who Am I ?                                     ', '2018-03-26 14:15:47', 0, 47, 5),
(73, 'Comment                      ', '2018-03-27 09:10:58', 0, 53, 5),
(74, 'STD                                    ', '2018-03-27 09:12:58', 0, 53, 6),
(76, 'Cool              ', '2018-03-28 07:51:44', 0, 46, 17),
(77, 'i am not naim         ', '2018-03-28 07:52:12', 1, 46, 17),
(78, 'hey           ', '2018-03-30 13:50:45', 0, 80, 6),
(79, 'hello                        ', '2018-03-30 13:50:53', 1, 80, 6),
(80, 'File is not att                        ', '2018-03-30 18:42:02', 0, 82, 20),
(81, 'Awesome', '2018-03-30 18:51:21', 0, 82, 20),
(82, 'testssss                                        ', '2018-03-30 18:52:44', 0, 82, 20),
(83, 'testssss                                        ', '2018-03-30 18:56:14', 0, 82, 20),
(84, 'testssss                                        ', '2018-03-30 18:56:36', 0, 82, 20),
(85, 'testssss                                        ', '2018-03-30 18:57:13', 0, 82, 20),
(86, 'testssss                                        ', '2018-03-30 18:58:59', 0, 82, 20),
(87, 'testssss                                        ', '2018-03-30 18:59:50', 0, 82, 20),
(88, 'testssss                                        ', '2018-03-30 19:00:20', 0, 82, 20),
(89, 'Mail sending                                        ', '2018-03-30 19:04:01', 0, 82, 20),
(90, 'ttttttttt', '2018-03-30 19:14:11', 0, 80, 20),
(91, 'ttttttttt', '2018-03-30 19:14:47', 0, 80, 20),
(92, 'aaaaaaaaa', '2018-03-30 19:18:03', 0, 80, 20),
(93, 'aaaaaaaaa', '2018-03-30 19:18:39', 0, 80, 20),
(113, 'test', '2018-04-01 13:56:12', 0, 104, 20),
(114, 'Pro test Ano        ', '2018-04-01 20:01:47', 1, 105, 22),
(115, 'Pro test     ', '2018-04-01 20:02:56', 0, 105, 22),
(116, 'test test             ', '2018-04-01 20:05:03', 0, 105, 5),
(117, 'supervisor staff comment         ', '2018-04-01 20:05:41', 0, 105, 5),
(118, 'QAM comm                 ', '2018-04-01 20:07:11', 0, 105, 7),
(119, 'anno QAM           ', '2018-04-01 20:16:54', 0, 105, 7);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(20) NOT NULL,
  `department_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`) VALUES
(1, 'BIT'),
(2, 'L5DC'),
(3, 'L4DC'),
(4, 'IFY'),
(5, 'All');

-- --------------------------------------------------------

--
-- Table structure for table `page_views`
--

CREATE TABLE `page_views` (
  `page_id` int(100) NOT NULL,
  `ideas_number` int(100) DEFAULT NULL,
  `user_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_views`
--

INSERT INTO `page_views` (`page_id`, `ideas_number`, `user_id`) VALUES
(5, 100, 6),
(14, 82, 20),
(25, 80, 20),
(26, 100, 7),
(31, 80, 7),
(34, 100, 8),
(35, 82, 8),
(36, 80, 8),
(37, 53, 8),
(43, 53, 25),
(45, 53, 17),
(47, 102, 25),
(56, 102, 20),
(65, 104, 20),
(68, 53, 16),
(69, 80, 16),
(70, 82, 16),
(71, 46, 16),
(84, 105, 22),
(85, 105, 7),
(86, 105, 5);

-- --------------------------------------------------------

--
-- Table structure for table `student_ideas`
--

CREATE TABLE `student_ideas` (
  `ideas_number` int(100) NOT NULL,
  `ideas_title` varchar(50) DEFAULT NULL,
  `ideas_description` varchar(500) DEFAULT NULL,
  `ideas_type` int(5) DEFAULT '0' COMMENT '0-public, 1-private',
  `posted_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `file` varchar(100) DEFAULT NULL,
  `category_id` int(10) DEFAULT NULL,
  `user_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_ideas`
--

INSERT INTO `student_ideas` (`ideas_number`, `ideas_title`, `ideas_description`, `ideas_type`, `posted_time`, `file`, `category_id`, `user_id`) VALUES
(46, 'Rubel s idea', 'Nisl quae inventore tempora lobortis habitant ducimus vitae! Feugiat officia dui unde maiores fermentum incididunt? \r\nAsperiores, justo dictum, , sint ', 0, '2018-03-18 00:51:23', NULL, 2, 6),
(47, 'It\'s test', 'wefrgtyuki', 0, '2018-03-25 00:48:00', NULL, 2, 15),
(53, 'IDEA', 'IDEAIDEAIDEAIDEA', 0, '2018-03-27 09:06:50', NULL, 3, 13),
(80, 'idea is a an idea', 'aaaaaaaaaaaaaa', 0, '2018-03-30 13:49:22', NULL, 2, 6),
(82, 'Test without file', 'dessss      ', 0, '2018-03-30 17:24:00', NULL, 3, 6),
(100, 'Earum eiusmod ex recusandae Omnis consectetur', 'Non mollit molestiae molestiae sed amet', 0, '2018-03-30 18:36:16', 'uploadFileZip/1522434975.zip', 3, 20),
(102, 'IFY IDEA', 'IFY IDEAaaaaa                    ', 0, '2018-04-01 11:55:18', NULL, 2, 25),
(103, 'Dignissimos expedita amet consectetur laborum Eius', 'Et nostrud repellendus Unde enim in quasi deserunt ea', 0, '2018-04-01 13:52:13', 'uploadFileZip/1522590733.zip', 3, 20),
(104, 'Et eum eligendi impedit omnis quae architecto mini', 'A iste voluptas qui accusantium', 0, '2018-04-01 13:55:49', NULL, 6, 20),
(105, 'Pro test Ano', 'Pro test Ano Pro test Ano Pro test Ano Pro test Ano', 1, '2018-04-01 19:59:30', 'uploadFileZip/1522612770.zip', 6, 22);

-- --------------------------------------------------------

--
-- Table structure for table `thumbsupdown`
--

CREATE TABLE `thumbsupdown` (
  `thumbs_id` int(5) NOT NULL,
  `type` int(5) DEFAULT NULL COMMENT '1-like, 0-unlike',
  `user_id` int(100) DEFAULT NULL,
  `ideas_number` int(100) DEFAULT NULL,
  `thumbs_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thumbsupdown`
--

INSERT INTO `thumbsupdown` (`thumbs_id`, `type`, `user_id`, `ideas_number`, `thumbs_time`) VALUES
(2, 1, 6, 53, '2018-03-28 07:39:14'),
(4, 1, 17, 46, '2018-03-28 07:51:35'),
(5, 1, 20, 82, '2018-03-30 18:41:53'),
(6, 1, 20, 80, '2018-03-30 19:17:59'),
(13, 0, 7, 80, '2018-04-01 10:59:22'),
(14, 0, 16, 80, '2018-04-01 19:51:22'),
(15, 0, 16, 53, '2018-04-01 19:56:45'),
(16, 1, 16, 82, '2018-04-01 19:57:35'),
(17, 1, 16, 46, '2018-04-01 19:57:37'),
(18, 1, 22, 105, '2018-04-01 19:59:56'),
(19, 1, 5, 105, '2018-04-01 20:06:07'),
(20, 0, 7, 105, '2018-04-01 20:16:41');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(100) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_role` int(5) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_pass` varchar(10) DEFAULT NULL,
  `user_address` varchar(200) DEFAULT NULL,
  `user_phone` varchar(15) DEFAULT NULL,
  `user_photo` varchar(100) NOT NULL DEFAULT 'images/author/rsz_ava.png',
  `department_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_role`, `user_email`, `user_pass`, `user_address`, `user_phone`, `user_photo`, `department_id`) VALUES
(5, 'Mr Shiplu Sinha', 1, 'super@gmail.com', '123', 'Dhaka', '5654656', 'images/author/rsz_ava.png', 5),
(6, 'Mr Student', 0, 'std@gmail.com', '123', 'dhaka', '01912311291', 'images/author/avatar.png', 1),
(7, 'Mr Sarwar Molla', 2, 'qam@gmail.com', '123', 'Dhaka', '34653456', 'images/author/rsz_ava.png', 5),
(8, 'Mrs Nazrana Haque', 3, 'qac@gmail.com', '123', 'Dhaka', '566346', 'images/author/rsz_ava.png', 2),
(9, 'Mr Admin', 4, 'admin@gmail.com', '123', 'Dhaka', '36565656', 'images/author/rsz_ava.png', 5),
(10, 'Mr Naim', 0, 'naimpabna@gmail.com', '123', 'Dhaka', '6366', 'images/author/rsz_ava.png', 1),
(13, 'Rubel Mahmud', 0, 'rubel@yahoo.com', '123', 'Dhaka', '36636', 'images/author/rsz_ava.png', 1),
(15, 'Zahid', 0, 'zasoilu@gmail.com', '123', 'uyiguohijpok', '4567890', 'images/author/avatar.png', 1),
(16, 'Mr Mustafizur Rahman', 3, 'qac2@gmail.com', '123', 'qDhaka', '36463', 'images/author/rsz_ava.png', 1),
(17, 'Mr Ali Imran', 3, 'qac4@gmail.com', '123', 'sdfghyju', '234567', 'images/author/1.jpg', 4),
(18, 'Mrs Nayema Rahman', 3, 'qac3@gmail.com', '123', 'sdfgdgdg', '242344', 'images/author/rsz_ava.png', 3),
(19, 'photo test', 0, 'ppp@gmail.com', '123', 'dhaka', '23245', 'images/author/rsz_ava.png', 3),
(20, 'Rubel', 0, 'rubelmahmuud21@gmail.com', '12345', 'Jurain', '2324242424', 'images/author/avatar.png', 3),
(21, 'Enamul', 0, 'enamul2109@gmail.com', '123', 'asasdad', '22424242424', 'images/author/rsz_ava.png', 1),
(22, 'RM Pro', 0, 'rmpro2021@gmail.com', '123', 'Dhaka', '123456789', 'images/author/rsz_ava.png', 1),
(23, 'Kawsar', 0, 'prokawsar@gmail.com', '123', 'Mdpur', '34567890456', 'images/author/rsz_ava.png', 1),
(24, 'Naim', 0, 'abc@gmail.com', '123', 'dhaka', '12345678', 'images/author/rsz_ava.png', 2),
(25, 'Foysal fy', 0, 'ify@gmail.com', '123', 'dhfjgkh', '565768', 'images/author/rsz_ava.png', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `user_role` int(5) NOT NULL,
  `user_role_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`user_role`, `user_role_name`) VALUES
(0, 'Student'),
(1, 'Supervisor'),
(2, 'QAM'),
(3, 'QAC'),
(4, 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `fk_10` (`ideas_number`),
  ADD KEY `fk_uid` (`user_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `page_views`
--
ALTER TABLE `page_views`
  ADD PRIMARY KEY (`page_id`),
  ADD KEY `ui` (`user_id`),
  ADD KEY `in` (`ideas_number`);

--
-- Indexes for table `student_ideas`
--
ALTER TABLE `student_ideas`
  ADD PRIMARY KEY (`ideas_number`),
  ADD UNIQUE KEY `ideas_number` (`ideas_number`),
  ADD KEY `fk16` (`category_id`),
  ADD KEY `fk_u` (`user_id`);

--
-- Indexes for table `thumbsupdown`
--
ALTER TABLE `thumbsupdown`
  ADD PRIMARY KEY (`thumbs_id`),
  ADD KEY `fk_9` (`ideas_number`),
  ADD KEY `fk_17` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD KEY `fk_1` (`user_role`),
  ADD KEY `fk_2` (`department_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`user_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `page_views`
--
ALTER TABLE `page_views`
  MODIFY `page_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `student_ideas`
--
ALTER TABLE `student_ideas`
  MODIFY `ideas_number` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `thumbsupdown`
--
ALTER TABLE `thumbsupdown`
  MODIFY `thumbs_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_10` FOREIGN KEY (`ideas_number`) REFERENCES `student_ideas` (`ideas_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_uid` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `page_views`
--
ALTER TABLE `page_views`
  ADD CONSTRAINT `in` FOREIGN KEY (`ideas_number`) REFERENCES `student_ideas` (`ideas_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ui` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_ideas`
--
ALTER TABLE `student_ideas`
  ADD CONSTRAINT `fk16` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_u` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thumbsupdown`
--
ALTER TABLE `thumbsupdown`
  ADD CONSTRAINT `fk_17` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_9` FOREIGN KEY (`ideas_number`) REFERENCES `student_ideas` (`ideas_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_1` FOREIGN KEY (`user_role`) REFERENCES `user_role` (`user_role`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_2` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
