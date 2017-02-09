-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 09, 2017 at 05:59 PM
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
(1, 17, 'avatar', '{"1":"First","2":"step22222222222","3":"all"}', '2017-02-09 12:40:39', NULL);

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
(17, '', '0000-00-00 00:00:00', NULL);

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
  `text` text NOT NULL,
  `image` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`id`, `name`, `text`, `image`) VALUES
(1, 'OTO', 'Success! Thank you for ordering {%7%}.\r\n{%h%}\r\nBecause you are serious about {%2%}, I want to offer you something special. Other customers who have purchased {%7%} found this to be an even faster shortcut to getting the results they want. Which is why...\r\nFirst off, I want to congratulate you for taking action and investing in {%7%}.\r\nSince you decided to purchase {%7%}, you\'ll be able to {%2%} better than ever before.\r\nAnd now that you have this in your arsenal, I want to do something special for you. I want to provide you with another {%5%} that will help you reach the goals you\'ve set for yourself.\r\nThis {%5%} has actually been of great use to the many people who\'ve got {%7%} just as you did. It not only helps them reach their goals quicker, but it also gives them a more effective path...a more predictable path to getting there.\r\nAnnouncing {%7%}\r\nWhat {%7%} does is helps you {%2%} without {%3%}.\r\nNot only that it can also:\r\n{%2%}\r\nNow, you may be wondering if you actually in fact need {%7%}. Especially since you\'ve already made your purchase of {%7%} just a few moments ago.\r\nAnd if you are feeling that way, let me be the first to say I get it.\r\nTo be honest with you, you\'re not alone in that. Other people who\'ve made the decision to upgrade to {%7%} felt the exact same way.\r\nBut here\'s what they found that I believe can be of some great use to you.\r\nBased on the feedback we received, there were 2 main reasons why a great number of our customers decided to upgrade to {%7%}.\r\nIt\'s easy to understand. So putting this information inside {%7%} isn\'t hard to implement. In fact, anyone can do it.\r\nSeriousness of their goals. Most of our customers really have a strong desire to overcome their current hurdles...and finally breakthrough to reach their goals. And {%7%} is just another way to help them do that faster.\r\nAs you can see, by making the choice to upgrade to {%7%}, you\'re not only making an even wiser decision than before, but if you\'d like to reach your goals faster...this will most definitely get you there.\r\nWe have done everything in our power to ensure this upgrade goes seamlessly with your purchase of {%7%}.\r\nSo if you\'d like to:\r\n{%4%}, {%5%}...and...{%6%}...\r\nClick the link below to order.', NULL),
(2, 'Squeeze', 'Do you want to {%2%}? Then pay close attention to what you\'re about to see. Because you\'re about to...\r\n"Discover How To {%2%} Without {%3%}..."\r\nNow it\'s your turn to {%2%}!\r\nGet FREE Instant Access To This {%12%} Now...\r\nSimply enter your name and email below to get started:\r\n\r\n\r\n(NOTE: We hate spam as much as you do! We promise never to sell, share or distribute your personal information.)\r\nInside this {%12%}, you\'ll discover:\r\n{%2%}\r\n{%9%}\r\n{%10%}\r\n{%11%}\r\nAnd much, much more!\r\nTo get INSTANT access to these powerful secrets - and many more - simply click the button below, enter your email address and I\'ll send you your copy right away!', NULL);

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
(1, 1, 'Here\'s A Special "New Customer" Offer about {%2%} That Our Customers Absolutely Love!'),
(2, 1, 'Here’s an Amazing Offer about {%2%} That Our Customers Extremely Loves!'),
(3, 1, 'New Customers receive this Special Offer about {%2%}'),
(4, 2, 'Discover How To {%2%} Without {%3%}...'),
(5, 2, 'Learn How To {%2%} and Not Worry About {%3%}...'),
(6, 2, 'Master How To {%2%} Without {%3%}...');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_key_questions` (`template_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `avatar`
--
ALTER TABLE `avatar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `template_headline`
--
ALTER TABLE `template_headline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `fk_key` FOREIGN KEY (`template_id`) REFERENCES `template` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `template_headline`
--
ALTER TABLE `template_headline`
  ADD CONSTRAINT `fk_template_id` FOREIGN KEY (`template_id`) REFERENCES `template` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
