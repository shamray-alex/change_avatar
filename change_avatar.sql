
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE TABLE `avatar` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `avatar_answer` (
  `id` int(11) NOT NULL,
  `avatar_question_id` int(11) NOT NULL,
  `answer` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `avatar_question` (
  `id` int(11) NOT NULL,
  `question` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `template` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `template_answer` (
  `id` int(11) NOT NULL,
  `template_id` int(11) NOT NULL,
  `template_question_id` int(11) NOT NULL,
  `answer` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `template_question` (
  `id` int(11) NOT NULL,
  `question` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `avatar`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `avatar_answer`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `avatar_question`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `template`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `template_answer`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `template_question`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `avatar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `avatar_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `avatar_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `template_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `template_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;