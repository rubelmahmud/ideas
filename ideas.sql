-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2018 at 11:09 AM
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
(19, 'ICT FEST', 'Dear Student, We are thinking about to arrange an ICT FEST. We want to know your expectation from th', '2018-04-14', '2018-04-25', '2018-04-04'),
(20, 'CULTURAL PROGRAM ', '14th April 2018 is the 1st day of Bangla 1425 New Year. We are going to arrange some cultural progra', '2018-04-12', '2018-04-28', '2018-04-04'),
(21, 'CRICKET TOURNAMENT', 'A cricket tournament will be arrange on May. Provide all of your idea... ', '2018-04-12', '2018-05-10', '2018-04-04'),
(22, 'Library', 'We are going to renovate our institute Library. We will think about all of your choice.', '2018-04-04', '2018-04-21', '2018-04-04'),
(23, 'Institute Website', 'Share your Opinion and Idea about our Institute Website', '2018-06-08', '2018-07-11', '2018-04-04'),
(24, 'Sports', 'Sports events need to be organized as regular basis.', '2018-04-06', '2018-04-30', '2018-04-04');

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
(124, 'Please, everyone raise your voice according to this issue. ', '2018-04-04 08:04:24', 0, 108, 26),
(125, 'I am agree', '2018-04-04 08:55:29', 0, 108, 5);

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
(154, 107, 26),
(179, 108, 26),
(180, 108, 7),
(183, 108, 5);

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
(107, 'Tournament  Venue', 'Our Tournament venue could be Mirpur Sher-e Bangla Stadium ', 0, '2018-04-04 07:10:30', NULL, 21, 26),
(108, 'Freelancing workshop', 'Programming club should arrange freelancing workshop on upcoming ICT Fest.', 0, '2018-04-04 08:03:06', 'uploadFileZip/1522828986.zip', 19, 26);

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
(25, 1, 26, 108, '2018-04-04 08:03:50'),
(26, 1, 7, 108, '2018-04-04 08:40:09'),
(27, 0, 5, 108, '2018-04-04 08:55:19');

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
(5, 'Mr Shiplu Sinha', 1, '1000191@daffodil.ac', '123', 'Chasara, Narayanganj', '01756838467', 'images/author/s.jpg', 5),
(7, 'Mr Sarwar Hossain Mollah', 2, 'gmailwhy@yahoo.com', '123', 'Chondra, Gazipur', '01911323179', 'images/author/sm.jpg', 5),
(8, 'Ms. Nazrana Haque', 3, '14thnovember2014@gmail.com', '123', '12, Tejgaon, Dhaka-1210', '01670167319', 'images/author/nj.jpg', 2),
(9, 'Mr Nuruzzaman', 4, 'admin@gmail.com', '123', 'Dhaka', '36565656', 'images/author/nuru.jpg', 5),
(16, 'Mr Mustafizur Rahman', 3, 'gmailrahman@yahoo.com', '123', '48, Mohammadpur,Dhaka- 1212', '01912974881', 'images/author/m.jpg', 1),
(17, 'Mr Ali Imran', 3, 'mahmudur35@diit.info', '123', '23, Kazipara, Mirpur 10 , Dhaka- 1205', '01713493254', 'images/author/i.jpg', 4),
(18, 'Ms. Nayeema Rahman', 3, 'afteryou000005@gmail.com', '123', 'House no. 10, K - Block, Bonosree, Dhaka- 1210', '01552303556', 'images/author/n.jpg', 3),
(26, 'Mahmudur Rahman', 0, 'mahmudbabu007@gmail.com', '123', 'East Razabazar, Dhaka - 1215', '01829605079', 'images/author/samir.jpg', 1),
(27, 'Samir Mahmud', 0, 'digitalhacker2014@gmail.com', '123', '2/9 , Panthapath, Dhaka- 1214', '01756838467', 'images/author/rsz_ava.png', 2),
(28, 'Rubel Mahmud', 0, 'rmpro2021@gmail.com', '123', 'Jurain, Dhaka - 1202', '01912311291', 'images/author/rsz_ava.png', 1),
(29, 'Enamul Haque', 0, 'enamul2109@gmail.com', '123', 'kolabagan, Noakhali', '01912311291', 'images/author/rsz_ava.png', 4),
(30, 'Robiul Hasan', 0, 'enamul2177@gmail.com', '123', 'lichubagan, Dhaka-1219', '01912311291', 'images/author/rsz_ava.png', 3),
(31, 'Rubel Sarkar', 0, 'rubelmahmuud21@gmail.com', '123', 'Jatrabari , Dhaka -1200', '01756838467', 'images/author/rsz_ava.png', 3),
(32, 'Shakibal Hasan', 0, '1000173@daffodil.ac', '123', 'Mirour-10 ,Dhaka_1218', '01829605079', 'images/author/rsz_ava.png', 3),
(33, 'MAsrafe mortaza', 0, 'pkhogiya@gmail.com', '123', 'Narail, Khulna', '01756838467', 'images/author/rsz_ava.png', 1),
(34, 'Tamim Iqbal', 0, 'mochenabird@gmail.com', '123', 'Chotrrogram', '01912311291', 'images/author/rsz_ava.png', 4),
(35, 'Zahid Hasan', 0, 'zahidbit37@gmail.com', '123', 'West rajabazar, Dhaka - 1205', '01912311291', 'images/author/rsz_ava.png', 2),
(36, 'Nasir Hossain', 0, 'zasoilu@gmail.com', '123', 'Kathalbagan , Dhak-1208', '01756838467', 'images/author/rsz_ava.png', 2),
(37, 'Humaina Afreen', 0, '21stfebruary2016@gmail.com', '123', 'Dhanmondo, Dhaka - 1214', '01912311291', 'images/author/rsz_ava.png', 3),
(38, 'Sabbir Rahman', 0, 'MAMUDBABU007@yahoo.com.au', '123', 'Noakhali', '01756838467', 'images/author/rsz_ava.png', 4),
(39, 'Fokhrul Bepari', 0, 'testing1@gmail.com', '123', 'Dhaka - 1218', '01912311291', 'images/author/rsz_ava.png', 1),
(40, 'Sadman Ahmed', 0, 'testing2@gmail.com', '123', 'Khulna', '01756838467', 'images/author/rsz_ava.png', 2),
(41, 'Rayhan Mahmud', 0, 'testing3@gmail.com', '123', 'Madaripur', '01912311291', 'images/author/rsz_ava.png', 2),
(42, 'Shahed Durzoy', 0, 'testing4@gmail.com', '123', 'Borishal', '01912311291', 'images/author/rsz_ava.png', 2),
(43, 'Nahid Islam', 0, 'testing5@gmail.com', '123', 'Borishal', '01756838467', 'images/author/rsz_ava.png', 3),
(44, 'Mahadi Hasan', 0, 'testing6@gmail.com', '123', 'Jashore', '01912311291', 'images/author/rsz_ava.png', 4),
(45, 'Sadia ', 0, 'testing7@gmail.com', '123', 'khulna', '01756838467', 'images/author/rsz_ava.png', 4),
(46, 'Foysal Ahmed', 0, 'testing8@gmail.com', '123', 'Kumilla', '01912311291', 'images/author/rsz_ava.png', 3),
(47, 'Kazi Sajid', 0, 'testing9@gmail.com', '123', 'Khulna', '01756838467', 'images/author/rsz_ava.png', 2);

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
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `page_views`
--
ALTER TABLE `page_views`
  MODIFY `page_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `student_ideas`
--
ALTER TABLE `student_ideas`
  MODIFY `ideas_number` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `thumbsupdown`
--
ALTER TABLE `thumbsupdown`
  MODIFY `thumbs_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

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
