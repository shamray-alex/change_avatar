-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 10, 2017 at 05:33 PM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 7.0.13-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `change_avatar`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `entity_id` int(11) NOT NULL,
  `entity_type` set('avatar','template') NOT NULL,
  `answer_object` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `entity_id`, `entity_type`, `answer_object`, `created_at`, `updated_at`) VALUES
(3, 18, 'avatar', '{"1":"Webinar","2":"Make more money","3":""}', '2017-02-09 22:32:11', NULL),
(4, 2, 'template', '{"9":"Spend more time with your partner","10":"Spend more time with your loved ones","11":"Increase your bottom line","12":"Webinar"}', '2017-02-09 22:33:05', NULL),
(6, 19, 'avatar', '{"1":"Second","2":"grow business","3":"Becoming Overwhelmed"}', '2017-02-10 07:41:58', NULL),
(7, 20, 'avatar', '[""]', '2017-02-10 15:23:57', NULL),
(8, 21, 'avatar', '{"1":"Test123","2":"step2","3":"step3"}', '2017-02-10 15:30:31', '2017-02-10 15:30:38'),
(9, 1, 'template', '{"4":"answer1","5":"answer2","6":"answer3","7":"answer4","8":"Service"}', '2017-02-10 15:31:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `avatar`
--

CREATE TABLE `avatar` (
  `id` int(11) NOT NULL,
  `answer_object` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `avatar`
--

INSERT INTO `avatar` (`id`, `answer_object`, `created_at`, `updated_at`) VALUES
(18, '', '0000-00-00 00:00:00', NULL),
(19, '', '0000-00-00 00:00:00', NULL),
(21, '', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'No Auto Increment',
  `question` varchar(500) NOT NULL,
  `predefined_answers` text,
  `template_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `question`, `predefined_answers`, `template_id`) VALUES
(1, 'Name of Avatar Profile? (Ex: Webinar Promo Cindy)', NULL, NULL),
(2, 'Specific End Result (Ex: Make more money and grow your business)', NULL, NULL),
(3, '#1 Pain they want to avoid (Ex: Losing Money On Advertising And Becoming Overwhelmed)', NULL, NULL),
(4, 'Benefit #1 of what they really want: (Ex: Spend more time with your partner and/or kids)', NULL, 1),
(5, 'Benefit #2 of what they really want: (Ex: Spend more time with your loved ones)', NULL, 1),
(6, 'Benefit #3 of what they really want (Ex: Increase your bottom line by 20%)', NULL, 1),
(7, 'Product/Service/Giveaway Name: (Ex: 3 Ways To Growing A Massive Business)', NULL, 1),
(8, 'Type of Offer', '{"0":"Product",\r\n"1":"Webinar",\r\n"2":"Service"}', 1),
(9, 'Benefit #1 of what they really want: (Ex: Spend more time with your partner and/or kids)', NULL, 2),
(10, 'Benefit #2 of what they really want: (Ex: Spend more time with your loved ones)', NULL, 2),
(11, 'Benefit #3 of what they really want (Ex: Increase your bottom line by 20%)', NULL, 2),
(12, 'Type of Offer', '{"0":"Product",\r\n"1":"Webinar",\r\n"2":"Service"}', 2);

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `template` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`id`, `name`, `template`, `image`) VALUES
(1, 'OTO', 'oto_1486671441.php', NULL),
(2, 'Squeeze', 'squeeze_1486671500.php', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `template_headline`
--

CREATE TABLE `template_headline` (
  `id` int(11) NOT NULL,
  `template_id` int(11) NOT NULL,
  `headline` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `template_headline`
--

INSERT INTO `template_headline` (`id`, `template_id`, `headline`) VALUES
(7, 1, '{"0":"Here\'s A Special \\"New Customer\\" Offer about {%2%} That Our Customers Absolutely Love!",\r\n"1":"Here’s an Amazing Offer about {%2%} That Our Customers Extremely Loves!",\r\n"2":"New Customers receive this Special Offer about {%2%}"}'),
(8, 2, '{"0":"Discover How To {%2%} Without {%3%}...",\r\n"1":"Learn How To {%2%} and Not Worry About {%3%}...",\r\n"2":"Master How To {%2%} Without {%3%}..."}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `avatar`
--
ALTER TABLE `avatar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template_headline`
--
ALTER TABLE `template_headline`
  ADD PRIMARY KEY (`id`),
  ADD KEY `template_id_fk` (`template_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `avatar`
--
ALTER TABLE `avatar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `template_headline`
--
ALTER TABLE `template_headline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `template_headline`
--
ALTER TABLE `template_headline`
  ADD CONSTRAINT `fk_template_id` FOREIGN KEY (`template_id`) REFERENCES `template` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
