-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Фев 06 2017 г., 01:02
-- Версия сервера: 5.7.17-0ubuntu0.16.04.1
-- Версия PHP: 7.0.13-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `change_avatar`
--

-- --------------------------------------------------------

--
-- Структура таблицы `avatar`
--

CREATE TABLE `avatar` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `avatar_answer`
--

CREATE TABLE `avatar_answer` (
  `id` int(11) NOT NULL,
  `avatar_id` int(11) NOT NULL,
  `avatar_question_id` int(11) NOT NULL,
  `answer` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `avatar_question`
--

CREATE TABLE `avatar_question` (
  `id` int(11) NOT NULL,
  `question` varchar(500) NOT NULL,
  `defined_answers` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `avatar_question`
--

INSERT INTO `avatar_question` (`id`, `question`, `defined_answers`) VALUES
(1, 'Name of Avatar Profile? (Ex: Webinar Promo Cindy)', NULL),
(2, 'What is the age of the avatar? (Ex: 26 or ranging from 18-25)', NULL),
(3, 'Gender', '{"0":"Male",\r\n"1":"Female",\r\n"2":"Both"}'),
(4, 'Education Level?', NULL),
(5, 'Relationship Status?', '{"0":"Single",\r\n"1":"In a relationship",\r\n"2":"Engaged",\r\n"3":"Married",\r\n"4":"It\'s complicated",\r\n"5":"In an open relationship",\r\n"6":"Widowed",\r\n"7":"In a domestic partnership",\r\n"8":"In a civil union"}'),
(6, 'What industry or niche this offer in? (Ex: Real Estate Developers, Marketers)', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `template`
--

CREATE TABLE `template` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `template_answer`
--

CREATE TABLE `template_answer` (
  `id` int(11) NOT NULL,
  `template_id` int(11) NOT NULL,
  `template_question_id` int(11) NOT NULL,
  `answer` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `template_question`
--

CREATE TABLE `template_question` (
  `id` int(11) NOT NULL,
  `question` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `avatar`
--
ALTER TABLE `avatar`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `avatar_answer`
--
ALTER TABLE `avatar_answer`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `avatar_question`
--
ALTER TABLE `avatar_question`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `template_answer`
--
ALTER TABLE `template_answer`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `template_question`
--
ALTER TABLE `template_question`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `avatar`
--
ALTER TABLE `avatar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `avatar_answer`
--
ALTER TABLE `avatar_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `avatar_question`
--
ALTER TABLE `avatar_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `template`
--
ALTER TABLE `template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `template_answer`
--
ALTER TABLE `template_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `template_question`
--
ALTER TABLE `template_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
