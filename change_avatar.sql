-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 20, 2017 at 05:42 PM
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
(6, 19, 'avatar', '{"1":"Second","2":"","3":"Becoming Overwhelmed"}', '2017-02-10 07:41:58', '2017-02-12 21:49:08'),
(106, 36, 'avatar', '{"1":"66666666","2":"123456789","3":""}', '2017-02-12 22:18:26', '2017-02-20 13:12:43');

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
(36, '', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `synonym`
--

CREATE TABLE `synonym` (
  `id` int(11) NOT NULL,
  `synonym` varchar(255) NOT NULL,
  `parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `synonym`
--

INSERT INTO `synonym` (`id`, `synonym`, `parent`) VALUES
(1, 'happy', NULL),
(2, 'disgusted', NULL),
(3, 'sad', NULL),
(4, 'angry', NULL),
(5, 'content', 1),
(6, 'accepted', 1),
(7, 'interested', 1),
(8, 'optimistic', 1),
(9, 'peaceful', 1),
(10, 'playful', 1),
(11, 'powerful', 1),
(12, 'proud', 1),
(13, 'trusting', 1),
(14, 'respected', 6),
(15, 'valued', 6),
(16, 'aggressive', 4),
(17, 'bitter', 4),
(18, 'critical', 4),
(19, 'distant', 4),
(20, 'frustrated', 4),
(21, 'humiliated', 4),
(22, 'let_down', 4),
(23, 'mad', 4),
(24, 'awful', 2),
(25, 'detestable', 24),
(26, 'nauseated', 24),
(27, 'free', 5),
(28, 'joyful', 5),
(29, 'disappointed', 2),
(30, 'dissaproving', 2),
(31, 'repelled', 2),
(32, 'depressed', 3),
(33, 'despair', 3),
(34, 'guilty', 3),
(35, 'hurt', 3),
(36, 'lonely', 3),
(37, 'vulnerable', 3),
(38, 'empty', 32),
(39, 'inferior', 32),
(40, 'grief', 33),
(41, 'powerless', 33),
(42, 'appalled', 29),
(43, 'revolted', 29),
(44, 'embarrassed', 30),
(45, 'judgmental', 30),
(46, 'ashamed', 34),
(47, 'remorseful', 34),
(48, 'dissapointed', 35),
(49, 'embarrassed', 35),
(50, 'curious', 7),
(51, 'inquisitive', 7),
(52, 'abandoned', 36),
(53, 'isolated', 36),
(54, 'hopeful', 8),
(55, 'inspired', 8),
(56, 'loving', 9),
(57, 'thankful', 9),
(58, 'aroused', 10),
(59, 'cheeky', 10),
(60, 'courageous', 11),
(61, 'creative', 11),
(62, 'confident', 12),
(63, 'successful', 12),
(64, 'hesitant', 31),
(65, 'horrified', 31),
(66, 'intimate', 13),
(67, 'sensitive', 13),
(68, 'fragile', 37),
(69, 'victimised', 37),
(70, 'dismissive', 18),
(71, 'sceptical', 18),
(72, 'numb', 19),
(73, 'withdrawn', 19),
(74, 'annoyed', 20),
(75, 'infuriated', 20),
(76, 'hostile', 16),
(77, 'provoked', 16),
(78, 'jealous', 23),
(79, 'furious', 23),
(80, 'violated', 17),
(81, 'indignant', 17),
(82, 'ridiculed', 21),
(83, 'disrespected', 21),
(84, 'resentful', 22),
(85, 'betrayed', 22),
(86, 'fearful', NULL),
(87, 'threatened', 86),
(88, 'rejected', 86),
(89, 'weak', 86),
(90, 'insecure', 86),
(91, 'anxious', 86),
(92, 'scared', 86),
(93, 'exposed', 87),
(94, 'nervous', 87),
(95, 'persecuted', 88),
(96, 'excluded', 88),
(97, 'insignificant', 89),
(98, 'worthless', 89),
(99, 'inferior', 90),
(100, 'inadequate', 90),
(101, 'worried', 91),
(102, 'overwhelmed', 91),
(103, 'frightened', 92),
(104, 'helpless', 92),
(105, 'bad', NULL),
(106, 'bored', 105),
(107, 'busy', 105),
(108, 'stressed', 105),
(109, 'tired', 105),
(110, 'indifferent', 106),
(111, 'apathetic', 106),
(112, 'pressured', 107),
(113, 'rushed', 107),
(114, 'overwhelmed', 108),
(115, 'out_of_control', 108),
(116, 'sleepy', 109),
(117, 'unfocussed', 109),
(118, 'surprised ', NULL),
(119, 'startled', 118),
(120, 'confused', 118),
(121, 'amazed', 118),
(122, 'excited', 118),
(123, 'shoked', 119),
(124, 'dismayed', 119),
(125, 'disillusioned', 120),
(126, 'perplexed', 120),
(127, 'astonished', 121),
(128, 'awe', 121),
(129, 'eager', 122),
(130, 'energetic', 122);

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
(7, 1, '{"0":"Here\'s A Special \\"New Customer\\" Offer about <span class=\'avatar-answer\' answerId=\'2\'></span> That Our Customers Absolutely Love!",\n"1":"Here’s an Amazing Offer about <span class=\'avatar-answer\' answerId=\'2\'></span> That Our Customers Extremely Loves!",\n"2":"New Customers receive this Special Offer about <span class=\'avatar-answer\' answerId=\'2\'></span>"}'),
(8, 2, '{"0":"Discover How To <span class=\'avatar-answer\' answerId=\'2\'></span> Without <span class=\'avatar-answer\' answerId=\'3\'></span>...",\n"1":"Learn How To <span class=\'avatar-answer\' answerId=\'2\'></span> and Not Worry About <span class=\'avatar-answer\' answerId=\'3\'></span>...",\n"2":"Master How To <span class=\'avatar-answer\' answerId=\'2\'></span> Without <span class=\'avatar-answer\' answerId=\'3\'></span>..."}');

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
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `synonym`
--
ALTER TABLE `synonym`
  ADD PRIMARY KEY (`id`),
  ADD KEY `myIndex` (`parent`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `avatar`
--
ALTER TABLE `avatar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `synonym`
--
ALTER TABLE `synonym`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `template_headline`
--
ALTER TABLE `template_headline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `synonym`
--
ALTER TABLE `synonym`
  ADD CONSTRAINT `synonym_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `synonym` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `template_headline`
--
ALTER TABLE `template_headline`
  ADD CONSTRAINT `fk_template_id` FOREIGN KEY (`template_id`) REFERENCES `template` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
