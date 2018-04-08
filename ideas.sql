-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2018 at 03:29 PM
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
(22, 'Library', 'We are going to renovate our institute Library. We will think about all of your choice.', '2018-04-19', '2018-04-27', '2018-04-04'),
(23, 'Institute Website', 'Share your Opinion and Idea about our Institute Website', '2018-06-08', '2018-07-11', '2018-04-04'),
(24, 'Sports', 'Sports events need to be organized as regular basis.', '2018-04-06', '2018-04-30', '2018-04-04'),
(25, 'Mobile Apps', 'Our university should need a mobile app??', '2018-06-14', '2018-06-22', '2018-04-04'),
(26, 'Permanent campus', 'Provide your opinion about moving to permanent campus', '2018-04-27', '2018-04-30', '2018-04-05');

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
(125, 'I am agree', '2018-04-04 08:55:29', 0, 108, 5),
(126, 'I am agree to this subject', '2018-04-04 09:36:34', 0, 108, 31),
(127, 'Awesome', '2018-04-04 09:58:29', 1, 109, 28),
(128, 'Great', '2018-04-04 09:59:06', 0, 109, 28),
(129, 'I do not agree', '2018-04-04 10:01:53', 1, 108, 31),
(130, 'thats right', '2018-04-04 10:08:16', 0, 110, 48),
(131, 'Exactly', '2018-04-04 10:25:49', 0, 110, 31),
(132, 'Game development...', '2018-04-04 15:20:25', 0, 117, 7),
(133, 'Good thinking.. ðŸ‘ŒðŸ‘Œ', '2018-04-04 15:25:01', 0, 108, 5),
(134, 'right', '2018-04-04 15:29:35', 0, 117, 48),
(135, 'What a day dreaming... ðŸ˜›ðŸ˜›ðŸ˜›', '2018-04-04 15:40:47', 0, 107, 16),
(136, 'I hope this will happen within next 2 month.....', '2018-04-04 19:13:11', 0, 118, 7),
(137, 'Every course coordinator should to talk  to their student....', '2018-04-04 19:14:13', 0, 118, 7),
(138, 'Will enjoy a lot', '2018-04-04 19:15:42', 0, 119, 28),
(139, 'It Should Happen.... I will also join with the student.......', '2018-04-04 19:16:56', 0, 119, 16),
(140, 'All teacher , will all of you join with me.....???', '2018-04-04 19:17:36', 0, 119, 16),
(141, 'Badly needed a tournament ..  Students are working hard with their assignment...', '2018-04-04 19:19:03', 0, 118, 16),
(142, 'We can arrange on  July\r\n', '2018-04-04 19:35:56', 0, 118, 8),
(143, 'good idea!', '2018-04-04 19:40:28', 0, 119, 48),
(144, 'good idea', '2018-04-04 19:40:50', 0, 119, 48),
(145, 'funny guy\r\n', '2018-04-04 19:43:50', 0, 115, 5),
(146, '1111', '2018-04-04 19:44:21', 0, 119, 28),
(147, 'test', '2018-04-04 19:50:40', 0, 119, 28),
(148, 'agree\r\n', '2018-04-04 19:54:51', 0, 117, 5),
(149, 'After EID', '2018-04-04 19:55:55', 0, 118, 5),
(150, 'BIT is about Business ..', '2018-04-04 19:56:57', 0, 112, 5),
(151, 'Good Idea ... ', '2018-04-04 19:58:04', 0, 110, 5),
(152, 'Right....', '2018-04-04 19:59:38', 0, 119, 18),
(153, 'aaa', '2018-04-04 20:00:28', 0, 119, 28),
(154, 'what did he say\r\n', '2018-04-04 20:00:55', 0, 115, 18),
(155, 'I love to watch football.... ', '2018-04-04 20:01:46', 0, 118, 18),
(156, 'I faced it 3 times..', '2018-04-04 20:06:53', 0, 120, 32),
(157, 'I could not see payment notice', '2018-04-04 20:07:25', 0, 120, 32),
(158, 'I can hack our website...', '2018-04-04 20:07:53', 1, 120, 32),
(159, 'Ha ha ha', '2018-04-04 20:13:01', 1, 125, 32),
(160, 'poor guy', '2018-04-04 20:14:19', 1, 125, 32),
(161, 'Programming club members do not know programming', '2018-04-04 20:17:18', 1, 108, 32),
(162, 'checking', '2018-04-04 20:17:46', 0, 125, 28),
(163, 'NO!', '2018-04-04 20:20:19', 1, 126, 32),
(164, 'Okay', '2018-04-04 20:22:03', 0, 122, 28),
(165, 'Ify Students want to join', '2018-04-04 20:23:21', 0, 108, 34),
(166, 'want to learn freelancing ', '2018-04-04 20:24:13', 0, 108, 34),
(167, 'Not right', '2018-04-04 20:36:14', 0, 122, 18),
(168, 'Important', '2018-04-04 20:37:16', 0, 110, 33),
(169, 'Not agree', '2018-04-04 20:39:07', 0, 117, 18),
(170, 'yes we can', '2018-04-04 20:41:26', 0, 118, 28),
(171, 'NO', '2018-04-04 20:42:25', 1, 117, 28),
(172, 'Read your text book first', '2018-04-04 21:03:30', 1, 130, 39),
(173, 'Yes i read bit we also want to read other book', '2018-04-04 21:04:10', 0, 130, 39),
(174, 'Thanks for your idea', '2018-04-04 21:05:16', 0, 118, 39),
(175, 'It is needed for every department student', '2018-04-04 21:06:37', 0, 108, 39),
(176, 'I want to give a speech', '2018-04-04 21:09:47', 0, 108, 39),
(177, 'No need we are now living peacefully', '2018-04-04 21:11:58', 0, 110, 39),
(178, 'Price is not a great matter', '2018-04-04 21:13:18', 0, 117, 39),
(179, 'test', '2018-04-04 21:20:07', 0, 132, 5),
(180, 'Yes', '2018-04-04 21:22:31', 0, 118, 9),
(181, 'This student has brain', '2018-04-04 21:28:38', 0, 131, 7),
(182, 'this is a unlike test', '2018-04-04 21:32:01', 0, 117, 7),
(183, 'Why?', '2018-04-05 07:24:48', 1, 132, 28),
(184, 'A', '2018-04-05 07:26:04', 0, 132, 28),
(185, 'Bad education', '2018-04-05 07:52:01', 1, 123, 39),
(186, 'You are on a wrong track', '2018-04-05 07:52:35', 0, 123, 39),
(187, 'Yes . We will join', '2018-04-05 07:54:14', 0, 119, 39),
(188, 'Good', '2018-04-05 07:55:06', 0, 132, 17),
(189, 'Rumi sir will dance ðŸ˜›ðŸ˜›ðŸ’ƒðŸ’ƒðŸ’ƒ', '2018-04-05 07:55:31', 1, 119, 39),
(190, 'Ha ha ha ', '2018-04-05 07:56:51', 0, 132, 39),
(191, 'Othet prople will not allowed', '2018-04-05 07:58:18', 0, 110, 39),
(192, 'Our management focus on education business ', '2018-04-05 08:02:22', 1, 133, 39),
(193, 'r vallage na pem korbo', '2018-04-05 08:07:24', 1, 133, 35),
(194, 'I think our IT management will take necessary step', '2018-04-05 08:09:29', 0, 134, 7),
(195, 'Account department give financial support', '2018-04-05 08:10:17', 0, 134, 7),
(196, 'Hi', '2018-04-05 08:30:14', 0, 134, 28),
(197, 'A', '2018-04-05 08:33:45', 0, 134, 28),
(198, 'A', '2018-04-05 08:35:09', 0, 134, 5),
(199, 'Agree', '2018-04-05 08:38:31', 1, 135, 28),
(200, 'We can not afford it right now', '2018-04-05 08:40:46', 0, 135, 17),
(201, 'Agree', '2018-04-05 08:42:29', 0, 135, 28),
(202, 'I can play football', '2018-04-05 09:29:13', 0, 118, 17),
(203, 'App development', '2018-04-05 09:31:27', 0, 117, 17),
(204, 'Also for game development', '2018-04-05 09:31:49', 0, 117, 17),
(205, 'We are thinking about this ', '2018-04-05 09:33:33', 0, 133, 17),
(206, 'Hello', '2018-04-05 12:11:36', 0, 135, 28),
(207, 'test', '2018-04-05 12:19:53', 0, 135, 28),
(208, 'aaaaaaaaaaaaa', '2018-04-05 14:34:14', 0, 135, 28),
(209, 'really?', '2018-04-05 14:51:41', 0, 135, 48),
(210, 'checkkkk', '2018-04-05 14:54:04', 0, 118, 28),
(211, 'cccccccccccccccc', '2018-04-05 14:55:42', 0, 118, 28),
(212, 'aaaaaa', '2018-04-05 14:56:40', 0, 118, 28),
(213, 'aaaaaaaaaaaaa', '2018-04-05 14:56:54', 0, 118, 28),
(214, 'aaaaaaaaaaaa', '2018-04-05 14:57:42', 0, 118, 28),
(215, 'aaa', '2018-04-05 15:00:03', 0, 118, 28),
(216, 'BIT student need separate room', '2018-04-05 15:43:25', 0, 133, 5),
(217, 'We should select all tall guys...', '2018-04-05 17:30:22', 0, 131, 8),
(218, 'the site is already under SSL', '2018-04-05 17:47:07', 0, 120, 40),
(219, 'Student should get facility of paying money on 20 installments.\r\n', '2018-04-05 20:14:46', 0, 137, 39),
(220, 'If anyone stop continuing their study who will pay their money ', '2018-04-05 20:16:03', 1, 137, 39),
(221, 'Sometime I study in the lounge ...', '2018-04-05 20:20:19', 0, 133, 39),
(222, 'rubel is good student, he studies in two institute .', '2018-04-05 20:21:05', 0, 133, 39),
(223, 'I want to attend convocation program of 2019 at Greenwich. ', '2018-04-05 20:23:23', 0, 128, 39),
(224, 'Student , who will be the best dancer ?', '2018-04-05 20:31:32', 0, 138, 39),
(225, 'Not a good idea', '2018-04-06 05:39:43', 0, 138, 34),
(226, 'Toder ki matha thik ase ??', '2018-04-06 05:40:21', 1, 138, 34),
(227, 'Wow. what a news', '2018-04-06 05:41:12', 0, 137, 34),
(228, 'bablu bou mara gese', '2018-04-06 05:41:46', 0, 136, 34),
(229, 'emphasis to support   ', '2018-04-06 05:43:13', 0, 135, 34),
(230, 'this is a reasonable idea ', '2018-04-06 05:44:08', 0, 134, 34),
(231, 'No interest such as program', '2018-04-06 05:45:56', 0, 113, 34),
(232, 'Very good attempt', '2018-04-06 05:47:43', 0, 112, 34),
(233, 'Kan tui khelte paris na tai ??', '2018-04-06 05:48:36', 1, 111, 34),
(234, 'Ato din koi silen', '2018-04-06 05:49:27', 1, 110, 34),
(235, 'i agree with you', '2018-04-06 08:17:28', 0, 136, 26),
(236, 'ttt', '2018-04-06 10:15:50', 0, 138, 28),
(237, 'Bad idea', '2018-04-06 10:16:53', 0, 138, 5),
(238, 'What the hell is going on?', '2018-04-06 14:35:57', 0, 138, 9),
(239, 'I do not know sir', '2018-04-06 14:36:57', 0, 138, 5),
(240, 'I want this program held at any cost else ... ', '2018-04-06 14:38:34', 1, 138, 26),
(241, 'Who is this anonymous guy wanting this program?', '2018-04-06 17:28:41', 0, 138, 5),
(242, 'Bablu still like lolypop', '2018-04-07 06:17:37', 0, 136, 35),
(243, 'Well decision', '2018-04-07 06:19:58', 0, 117, 35),
(244, 'i am 6 feet tall', '2018-04-07 14:23:31', 0, 131, 39),
(245, 'It is waste of time :D ', '2018-04-07 18:34:04', 0, 111, 28);

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
(188, 109, 31),
(193, 109, 28),
(196, 108, 31),
(200, 110, 48),
(202, 110, 31),
(208, 108, 5),
(210, 117, 48),
(212, 118, 26),
(214, 107, 16),
(215, 119, 26),
(224, 119, 16),
(226, 118, 16),
(232, 117, 16),
(233, 112, 16),
(239, 118, 8),
(248, 119, 48),
(257, 115, 5),
(264, 112, 5),
(273, 115, 18),
(280, 120, 32),
(290, 125, 32),
(291, 118, 32),
(295, 117, 32),
(296, 119, 32),
(297, 110, 32),
(299, 108, 32),
(301, 125, 28),
(303, 126, 32),
(305, 126, 34),
(306, 122, 28),
(307, 118, 34),
(311, 108, 34),
(312, 126, 18),
(313, 125, 18),
(314, 120, 18),
(316, 109, 18),
(318, 129, 33),
(323, 108, 33),
(325, 122, 18),
(326, 110, 33),
(327, 119, 33),
(328, 117, 33),
(329, 118, 18),
(331, 108, 18),
(332, 119, 18),
(334, 110, 18),
(335, 118, 33),
(336, 117, 18),
(337, 129, 28),
(341, 119, 28),
(346, 130, 39),
(348, 118, 39),
(357, 131, 28),
(361, 132, 5),
(362, 132, 9),
(364, 118, 9),
(365, 117, 9),
(367, 110, 9),
(368, 108, 9),
(370, 131, 7),
(374, 117, 7),
(375, 110, 7),
(376, 108, 7),
(377, 132, 36),
(378, 118, 36),
(379, 110, 36),
(380, 118, 7),
(384, 110, 28),
(385, 108, 28),
(386, 117, 28),
(387, 129, 16),
(397, 123, 39),
(399, 132, 28),
(402, 132, 17),
(403, 119, 39),
(406, 132, 39),
(408, 110, 39),
(409, 108, 39),
(416, 134, 7),
(418, 133, 35),
(421, 134, 28),
(424, 134, 5),
(425, 134, 17),
(435, 110, 17),
(437, 118, 17),
(438, 119, 17),
(439, 108, 17),
(442, 117, 17),
(443, 135, 17),
(445, 133, 17),
(458, 135, 48),
(472, 118, 28),
(474, 135, 28),
(476, 133, 5),
(477, 118, 5),
(478, 110, 5),
(479, 119, 5),
(480, 117, 5),
(482, 131, 8),
(484, 120, 40),
(485, 136, 40),
(488, 136, 8),
(489, 108, 8),
(490, 110, 8),
(491, 119, 8),
(492, 117, 8),
(494, 117, 39),
(497, 137, 39),
(500, 133, 39),
(502, 128, 39),
(504, 138, 39),
(505, 136, 9),
(506, 138, 17),
(518, 138, 34),
(519, 137, 34),
(520, 136, 34),
(521, 135, 34),
(522, 134, 34),
(523, 113, 34),
(524, 112, 34),
(525, 111, 34),
(526, 110, 34),
(528, 136, 26),
(538, 138, 26),
(540, 138, 5),
(544, 136, 35),
(546, 117, 35),
(548, 138, 16),
(549, 138, 28),
(551, 131, 39),
(552, 136, 39),
(554, 111, 28),
(555, 138, 9);

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
(108, 'Freelancing workshop', 'Programming club should arrange freelancing workshop on upcoming ICT Fest.', 0, '2018-04-04 08:03:06', 'uploadFileZip/1522828986.zip', 19, 26),
(109, 'Test', 'testtt', 0, '2018-04-04 09:29:56', 'uploadFileZip/1522834196.zip', 19, 31),
(110, 'Ensure security', 'security should be arranged in the event.', 0, '2018-04-04 10:03:27', NULL, 20, 48),
(111, 'Cricket', 'There is no need any cricket tournament', 0, '2018-04-04 10:52:15', NULL, 21, 28),
(112, 'IT Business Idea Challenge', 'The detail of your business idea should be mailed in doc/docx format file at \"ictfest@iut-dhaka.edu\" within the 10th October 2017. ... BCG Matrix are not mandatory but encouraged Other than these, the participants will also be judged on their overall knowledge on the topic, presentation skills and a few other ', 0, '2018-04-04 11:21:07', NULL, 19, 48),
(113, 'CULTURAL PROGRAM', 'Thanks to cultural study trips led by faculty experts, you ll engage with the histories, perspectives, and contemporary realities of cultures and countries around the world. You can study art history in Rome, observe human rights law in the courts of Sarajevo and Belgrade, plunge into Fezs bustling business center, or take advantage of any of our many offerings. We want you to keep exploring, in class and beyond', 0, '2018-04-04 11:22:30', NULL, 20, 48),
(114, 'Cultural Program - Aroostook Band of Micmacs', 'The purpose of this program is to promote, advocate for and raise the level of Tribal unity and community interaction while increasing the degree of awareness of Tribal Programs, functions and activities.  This program is designed by sharing expertise, resources and through exchanging ideas that will provide a forum to assist our Tribe to carry out their mandate. The purpose is also to maintain this by respecting our elders, helping Micmac people through friendship, harmony, quality of service, ', 0, '2018-04-04 11:23:00', NULL, 20, 48),
(115, 'Cricket should play new field in this year', 'Siddesh Kulasekaran, The Gator Cricket Club (GCC) hails from a university rich for its sporting histories and heritages, The University of Florida. A place that has nurtured national heroes and legends is now turning its head towards a sport that is new to America but has its own legacies...\r\n', 0, '2018-04-04 11:24:41', NULL, 21, 48),
(116, 'No sports club', 'For many of us, going to the gym has all the allure of going to the dentist. It is a painful chore instead of an uplifting treat. At first, it is tempting to write off our aversion to gyms as sheer laziness, but does not the gym itself share some of the blame? ', 0, '2018-04-04 11:26:53', NULL, 24, 48),
(117, 'The price should expensive for the contest', '1. Programming Contest\r\n2. Project Showcasing\r\n3. Game Development Competition \r\n4. App Development Competition \r\n5. Hackathon \r\n6. ICT Olympiad\r\n7. Math Olympiad\r\n8. General Knowledge Competition', 0, '2018-04-04 11:29:12', NULL, 19, 48),
(118, 'Football tournament', 'We have been waiting to play a football tournament...', 0, '2018-04-04 15:32:41', NULL, 24, 26),
(119, 'PAHELA BOUSHAKH', 'Our institute should arrange a cultural programme on 1st day of Bangla new year ...â˜ºâ˜º', 0, '2018-04-04 15:35:36', NULL, 20, 26),
(120, 'Our website Should be secured....', 'Sometime our website becomes unavailable .. ', 0, '2018-04-04 20:06:11', NULL, 23, 32),
(121, 'Hacking is an ART', 'Why are we studying on IT, if we can not hack a poor security website...', 1, '2018-04-04 20:09:27', NULL, 23, 32),
(122, 'Hacking is an ART', 'Why are we studying on IT if we can not hack a poor security website...', 1, '2018-04-04 20:09:50', NULL, 23, 32),
(123, 'Hacking is an ART', 'Why are we studying on IT if we can not hack a poor security website\r\n', 1, '2018-04-04 20:10:11', NULL, 23, 32),
(124, 'Hacking is an ART', 'Why are we studying on IT if we can not hack a poor security website\r\n', 1, '2018-04-04 20:10:29', NULL, 23, 32),
(125, 'Hacking is an ART', 'Every try to hack institute website', 1, '2018-04-04 20:11:51', NULL, 23, 32),
(126, 'need to arrange', 'We should arrange at our campus ', 0, '2018-04-04 20:19:31', NULL, 19, 32),
(127, 'LIbrary', 'The library should rich with all necessary books.', 0, '2018-04-04 20:26:32', 'uploadFileZip/1522873592.zip', 22, 28),
(128, 'ATTEND to programme', 'We want to join in the program', 0, '2018-04-04 20:33:08', NULL, 20, 34),
(129, 'We want to arrange football tournament', 'Football tournamen', 0, '2018-04-04 20:35:13', NULL, 24, 33),
(130, 'Book needed', 'We need some science fiction book', 0, '2018-04-04 21:02:31', NULL, 22, 39),
(131, 'Basketball team', 'We want to form a basketball team ', 0, '2018-04-04 21:15:19', NULL, 24, 39),
(132, 'Interesting ', 'I am so excited about this', 0, '2018-04-04 21:16:59', NULL, 19, 39),
(133, 'Library capacity', 'There are few seats for reading', 0, '2018-04-05 08:00:25', NULL, 22, 39),
(134, 'We need a secure website ', 'We need https website and a portal ', 0, '2018-04-05 08:03:51', NULL, 23, 39),
(135, 'Permanent Campus Required', 'We need permanent campus urgent.', 0, '2018-04-05 08:38:07', NULL, 26, 28),
(136, 'why mr bablu is alone', 'mr.bablu should some one with him to pass good time :P', 0, '2018-04-05 17:48:01', NULL, 22, 40),
(137, 'Provide laptop', 'University should provide  laptop to every student.', 0, '2018-04-05 20:13:11', NULL, 23, 39),
(138, 'Dancing Competition ', 'We expect a dance competition of our teacher. As I can not see our teachers comment,  hope our teacher will comment on this idea to decide and other teacher will challenge one another.  ', 0, '2018-04-05 20:30:22', NULL, 20, 39);

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
(27, 0, 5, 108, '2018-04-04 08:55:19'),
(28, 1, 31, 108, '2018-04-04 09:34:52'),
(29, 1, 28, 109, '2018-04-04 09:58:18'),
(30, 1, 48, 110, '2018-04-04 10:06:30'),
(31, 1, 31, 110, '2018-04-04 10:22:52'),
(32, 0, 7, 117, '2018-04-04 15:19:31'),
(33, 1, 26, 118, '2018-04-04 15:36:56'),
(34, 1, 16, 107, '2018-04-04 15:40:22'),
(35, 1, 7, 118, '2018-04-04 19:11:29'),
(36, 1, 28, 119, '2018-04-04 19:15:17'),
(37, 1, 16, 119, '2018-04-04 19:16:23'),
(38, 1, 16, 118, '2018-04-04 19:19:05'),
(39, 1, 28, 111, '2018-04-04 19:20:28'),
(40, 0, 16, 117, '2018-04-04 19:24:00'),
(41, 1, 8, 118, '2018-04-04 19:35:08'),
(42, 0, 5, 115, '2018-04-04 19:43:20'),
(43, 0, 5, 117, '2018-04-04 19:54:35'),
(44, 1, 5, 118, '2018-04-04 19:55:45'),
(45, 1, 5, 112, '2018-04-04 19:56:36'),
(46, 1, 5, 110, '2018-04-04 19:57:28'),
(47, 0, 18, 119, '2018-04-04 19:59:22'),
(48, 0, 18, 115, '2018-04-04 20:00:41'),
(49, 1, 18, 118, '2018-04-04 20:01:21'),
(50, 1, 32, 120, '2018-04-04 20:07:07'),
(51, 0, 32, 125, '2018-04-04 20:13:00'),
(52, 1, 32, 118, '2018-04-04 20:14:55'),
(53, 1, 32, 108, '2018-04-04 20:15:04'),
(54, 1, 32, 110, '2018-04-04 20:15:16'),
(55, 1, 32, 119, '2018-04-04 20:15:23'),
(56, 0, 32, 117, '2018-04-04 20:15:30'),
(57, 0, 32, 126, '2018-04-04 20:20:07'),
(58, 1, 28, 122, '2018-04-04 20:21:55'),
(59, 0, 34, 126, '2018-04-04 20:22:07'),
(60, 1, 34, 118, '2018-04-04 20:22:16'),
(61, 1, 34, 110, '2018-04-04 20:22:24'),
(62, 1, 34, 108, '2018-04-04 20:22:48'),
(63, 0, 18, 120, '2018-04-04 20:35:53'),
(64, 0, 18, 125, '2018-04-04 20:35:54'),
(65, 0, 18, 122, '2018-04-04 20:36:07'),
(66, 1, 33, 118, '2018-04-04 20:36:26'),
(67, 1, 33, 110, '2018-04-04 20:36:44'),
(68, 1, 33, 108, '2018-04-04 20:36:51'),
(69, 1, 33, 119, '2018-04-04 20:38:04'),
(70, 0, 33, 117, '2018-04-04 20:38:15'),
(71, 0, 18, 110, '2018-04-04 20:38:32'),
(72, 1, 18, 108, '2018-04-04 20:38:39'),
(73, 0, 18, 117, '2018-04-04 20:38:48'),
(74, 1, 28, 129, '2018-04-04 20:40:52'),
(75, 1, 28, 118, '2018-04-04 20:41:06'),
(76, 1, 28, 110, '2018-04-04 20:41:47'),
(77, 0, 28, 117, '2018-04-04 20:42:05'),
(78, 1, 39, 130, '2018-04-04 21:03:02'),
(79, 1, 39, 118, '2018-04-04 21:04:51'),
(80, 1, 39, 108, '2018-04-04 21:06:07'),
(81, 0, 39, 110, '2018-04-04 21:10:51'),
(82, 0, 39, 117, '2018-04-04 21:12:48'),
(83, 1, 9, 132, '2018-04-04 21:21:30'),
(84, 1, 9, 118, '2018-04-04 21:21:48'),
(85, 0, 9, 117, '2018-04-04 21:23:42'),
(86, 1, 9, 110, '2018-04-04 21:24:59'),
(87, 1, 9, 108, '2018-04-04 21:25:24'),
(88, 1, 7, 131, '2018-04-04 21:28:12'),
(89, 0, 7, 110, '2018-04-04 21:32:36'),
(90, 1, 36, 132, '2018-04-05 02:12:34'),
(91, 1, 36, 118, '2018-04-05 02:13:31'),
(92, 0, 36, 110, '2018-04-05 02:15:16'),
(93, 1, 28, 108, '2018-04-05 05:31:07'),
(94, 1, 28, 132, '2018-04-05 07:24:33'),
(95, 0, 39, 123, '2018-04-05 07:51:39'),
(96, 1, 39, 119, '2018-04-05 07:53:49'),
(97, 1, 17, 132, '2018-04-05 07:54:57'),
(98, 0, 39, 132, '2018-04-05 07:56:23'),
(99, 1, 39, 133, '2018-04-05 08:01:40'),
(100, 1, 35, 133, '2018-04-05 08:06:42'),
(101, 1, 7, 134, '2018-04-05 08:09:04'),
(102, 1, 28, 134, '2018-04-05 08:30:07'),
(103, 1, 28, 135, '2018-04-05 08:38:25'),
(104, 0, 17, 135, '2018-04-05 08:39:43'),
(105, 1, 17, 110, '2018-04-05 09:28:13'),
(106, 1, 17, 118, '2018-04-05 09:28:51'),
(107, 0, 17, 117, '2018-04-05 09:30:27'),
(108, 1, 17, 133, '2018-04-05 09:33:00'),
(109, 1, 48, 135, '2018-04-05 14:51:15'),
(110, 1, 5, 133, '2018-04-05 15:42:56'),
(111, 1, 5, 119, '2018-04-05 15:44:55'),
(112, 1, 8, 131, '2018-04-05 17:29:29'),
(113, 1, 40, 120, '2018-04-05 17:46:18'),
(114, 1, 40, 136, '2018-04-05 17:51:45'),
(115, 1, 8, 136, '2018-04-05 17:58:47'),
(116, 1, 8, 108, '2018-04-05 17:59:00'),
(117, 0, 8, 110, '2018-04-05 17:59:12'),
(118, 1, 8, 119, '2018-04-05 17:59:23'),
(119, 0, 8, 117, '2018-04-05 17:59:41'),
(120, 1, 39, 137, '2018-04-05 20:13:57'),
(121, 1, 39, 128, '2018-04-05 20:22:43'),
(122, 1, 39, 138, '2018-04-05 20:30:54'),
(123, 1, 9, 136, '2018-04-05 23:56:37'),
(124, 0, 17, 138, '2018-04-06 03:14:08'),
(125, 1, 34, 138, '2018-04-06 05:39:17'),
(126, 1, 34, 137, '2018-04-06 05:40:38'),
(127, 1, 34, 136, '2018-04-06 05:41:29'),
(128, 1, 34, 135, '2018-04-06 05:42:10'),
(129, 1, 34, 134, '2018-04-06 05:43:32'),
(130, 0, 34, 113, '2018-04-06 05:45:17'),
(131, 1, 34, 112, '2018-04-06 05:46:16'),
(132, 0, 34, 111, '2018-04-06 05:48:07'),
(133, 1, 26, 136, '2018-04-06 08:18:13'),
(134, 0, 5, 138, '2018-04-06 10:17:05'),
(135, 1, 9, 138, '2018-04-06 14:35:43'),
(136, 1, 35, 136, '2018-04-07 06:16:34'),
(137, 1, 35, 117, '2018-04-07 06:19:22'),
(138, 0, 16, 138, '2018-04-07 07:20:38'),
(139, 1, 39, 131, '2018-04-07 14:23:14'),
(140, 1, 39, 136, '2018-04-07 14:24:02');

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
  `user_pin` int(10) NOT NULL DEFAULT '321',
  `user_address` varchar(200) DEFAULT NULL,
  `user_phone` varchar(15) DEFAULT NULL,
  `a_year` date DEFAULT NULL,
  `user_photo` varchar(100) NOT NULL DEFAULT 'images/author/rsz_ava.png',
  `department_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_role`, `user_email`, `user_pass`, `user_pin`, `user_address`, `user_phone`, `a_year`, `user_photo`, `department_id`) VALUES
(5, 'Mr Shiplu Sinha', 1, '1000191@daffodil.ac', '123nsrz45', 231, 'Chasara, Narayanganj', '01756838467', NULL, 'images/author/s.jpg', 5),
(7, 'Mr Sarwar Hossain Mollah', 2, 'gmailwhy@yahoo.com', '123nsrz45', 323, 'Chondra, Gazipur', '01911323179', NULL, 'images/author/sm.jpg', 5),
(8, 'Ms. Nazrana Haque', 3, '14thnovember2014@gmail.com', '123nsrz45', 321, '12, Tejgaon, Dhaka-1210', '01670167319', NULL, 'images/author/naz.jpg', 2),
(9, 'Mr Nuruzzaman', 4, 'admin@gmail.com', '123nsrz45', 135, 'Dhaka', '36565656', NULL, 'images/author/nuru.jpg', 5),
(16, 'Mr Mustafizur Rahman', 3, 'gmailrahman@yahoo.com', '123nsrz45', 321, '48, Mohammadpur,Dhaka- 1212', '01912974881', NULL, 'images/author/m.jpg', 1),
(17, 'Mr Ali Imran', 3, 'mahmudur35@diit.info', '123nsrz45', 321, '23, Kazipara, Mirpur 10 , Dhaka- 1205', '01713493254', NULL, 'images/author/i.jpg', 4),
(18, 'Ms. Nayeema Rahman', 3, 'afteryou000005@gmail.com', '123nsrz45', 321, 'House no. 10, K - Block, Bonosree, Dhaka- 1210', '01552303556', NULL, 'images/author/n.jpg', 3),
(26, 'Mahmudur Rahman', 0, 'mahmudbabu007@gmail.com', '123nsrz45', 321, 'East Razabazar, Dhaka - 1215', '01829605079', '2018-12-31', 'images/author/samir.jpg', 1),
(27, 'Samir Mahmud', 0, 'digitalhacker2014@gmail.com', '123nsrz45', 321, '2/9 , Panthapath, Dhaka- 1214', '01756838467', '2018-12-31', 'images/author/rsz_ava.png', 2),
(28, 'Rubel Mahmud', 0, 'rmpro2021@gmail.com', '123nsrz45', 321, 'Jurain, Dhaka - 1202', '01912311291', '2018-12-31', 'images/author/rm.png', 1),
(29, 'Enamul Haque', 0, 'enamul2109@gmail.com', '123nsrz45', 321, 'kolabagan, Noakhali', '01912311291', '2018-06-30', 'images/author/rsz_ava.png', 4),
(30, 'Robiul Hasan', 0, 'enamul2177@gmail.com', '123nsrz45', 321, 'lichubagan, Dhaka-1219', '01912311291', '2018-12-31', 'images/author/rsz_ava.png', 3),
(31, 'Rubel Hossain', 0, 'rubelmahmuud21@gmail.com', '123nsrz45', 321, 'Jatrabari , Dhaka -1200', '01756838467', '2018-12-31', 'images/author/rsz_ava.png', 3),
(32, 'Shakibal Hasan', 0, '1000173@daffodil.ac', '123nsrz45', 321, 'Mirour-10 ,Dhaka_1218', '01829605079', '2018-12-31', 'images/author/shakib.jpg', 3),
(33, 'Masrafe Mortaza', 0, 'pkhogiya@gmail.com', '123nsrz45', 321, 'Narail, Khulna', '01756838467', '2018-12-31', 'images/author/mas.jpg', 1),
(34, 'Tamim Iqbal', 0, 'mochenabird@gmail.com', '123nsrz45', 321, 'Chotrrogram', '01912311291', '2018-12-31', 'images/author/rsz_ava.png', 4),
(35, 'Zahid Hasan', 0, 'zahidbit37@gmail.com', '123nsrz45', 321, 'West rajabazar, Dhaka - 1205', '01912311291', '2018-12-31', 'images/author/rsz_ava.png', 2),
(36, 'Nasir Hossain', 0, 'zasoilu@gmail.com', '123nsrz45', 321, 'Kathalbagan , Dhak-1208', '01756838467', '2018-12-31', 'images/author/rsz_ava.png', 2),
(37, 'Humayon Kabir', 0, '21stfebruary2016@gmail.com', '123nsrz45', 321, 'Dhanmondo, Dhaka - 1214', '01912311291', '2018-12-31', 'images/author/rsz_ava.png', 3),
(38, 'Sabbir Rahman', 0, 'MAMUDBABU007@yahoo.com.au', '123nsrz45', 321, 'Noakhali', '01756838467', '2018-12-31', 'images/author/sabbir.jpg', 4),
(39, 'Fokhrul Bepari', 0, 'testing1@gmail.com', '123nsrz45', 321, 'Dhaka - 1218', '01912311291', '2018-12-31', 'images/author/rsz_ava.png', 1),
(40, 'Sadman Ahmed', 0, 'testing2@gmail.com', '123nsrz45', 321, 'Khulna', '01756838467', '2018-12-31', 'images/author/rsz_ava.png', 2),
(41, 'Rayhan Mahmud', 0, 'testing3@gmail.com', '123nsrz45', 321, 'Madaripur', '01912311291', '2018-12-31', 'images/author/rayhan', 2),
(42, 'Shahed Durzoy', 0, 'testing4@gmail.com', '123nsrz45', 321, 'Borishal', '01912311291', '2018-12-31', 'images/author/rsz_ava.png', 2),
(43, 'Nahid Islam', 0, 'testing5@gmail.com', '123nsrz45', 321, 'Borishal', '01756838467', '2018-12-31', 'images/author/rsz_ava.png', 3),
(44, 'Mahadi Hasan', 0, 'testing6@gmail.com', '123nsrz45', 321, 'Jashore', '01912311291', '2018-12-31', 'images/author/rsz_ava.png', 4),
(45, 'Sadia Akter', 0, 'testing7@gmail.com', '123nsrz45', 321, 'khulna', '01756838467', '2018-12-31', 'images/author/rsz_ava.png', 4),
(46, 'Foysal Ahmed', 0, 'testing8@gmail.com', '123nsrz45', 321, 'Kumilla', '01912311291', '2018-12-31', 'images/author/foysal.jpg', 3),
(47, 'Kazi Sajid', 0, 'testing9@gmail.com', '123nsrz45', 321, 'Khulna', '01756838467', '2018-12-31', 'images/author/sajid.jpg', 2),
(48, 'Naim', 0, '1000359@daffodil.ac', '123nsrz45', 321, 'Mirpur', '0123456789', '2018-12-31', 'images/author/naim.jpg', 1),
(49, 'Nagorik', 0, 'sala@gmail.com', '12345', 321, 'Dhaka', '123456789', NULL, 'images/author/rsz_ava.png', 3);

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
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `page_views`
--
ALTER TABLE `page_views`
  MODIFY `page_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=556;

--
-- AUTO_INCREMENT for table `student_ideas`
--
ALTER TABLE `student_ideas`
  MODIFY `ideas_number` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `thumbsupdown`
--
ALTER TABLE `thumbsupdown`
  MODIFY `thumbs_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

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
