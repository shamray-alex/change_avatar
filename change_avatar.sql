-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 08, 2017 at 06:00 PM
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
-- Table structure for table `avatar`
--

CREATE TABLE `avatar` (
  `id` int(11) NOT NULL,
  `answer_object` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `avatar`
--

INSERT INTO `avatar` (`id`, `answer_object`, `created_at`, `updated_at`) VALUES
(16, '{"1":"First","2":"make a lot of money"}', '2017-02-07 13:48:14', '0000-00-00 00:00:00');

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
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'OTO', '2017-02-08 07:07:19', '2017-02-08 07:07:19'),
(2, 'Squeeze', '2017-02-08 07:07:19', '2017-02-08 07:07:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avatar`
--
ALTER TABLE `avatar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_key_questions` (`template_id`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avatar`
--
ALTER TABLE `avatar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `fk_key` FOREIGN KEY (`template_id`) REFERENCES `template` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
