-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 18 2024 г., 06:03
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `my_site`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `text` text NOT NULL,
  `metadescription` varchar(255) NOT NULL,
  `metakeywords` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `description`, `text`, `metadescription`, `metakeywords`, `date_created`, `author`) VALUES
(1, 'about Tame Impala', 'Tame Impala is the psychedelic music project of Australian multi-instrumentalist Kevin Parker. In the recording studio, Parker writes, records, performs, and produces all of the project\'s music. As a touring act, Tame Impala consists of Parker (vocals, guitar, synthesizer), Dominic Simper (guitar, synthesiser), Jay Watson (synthesiser, vocals, guitar), Cam Avery (bass guitar, vocals, synthesizer), and Julien Barbagallo (drums, vocals). The group has a close affiliation with fellow Australian psychedelic rock band Pond, sharing members and collaborators, including Nick Allbrook, formerly a live member of Tame Impala. Originally signed to Modular Recordings, Tame Impala is now signed to Interscope Records in the United States and Fiction Records in the UK.', 'Tame Impala is the psychedelic music project of Australian multi-instrumentalist Kevin Parker. In the recording studio, Parker writes, records, performs, and produces all of the project\'s music. As a touring act, Tame Impala consists of Parker (vocals, guitar, synthesizer), Dominic Simper (guitar, synthesiser), Jay Watson (synthesiser, vocals, guitar), Cam Avery (bass guitar, vocals, synthesizer), and Julien Barbagallo (drums, vocals). The group has a close affiliation with fellow Australian psychedelic rock band Pond, sharing members and collaborators, including Nick Allbrook, formerly a live member of Tame Impala. Originally signed to Modular Recordings, Tame Impala is now signed to Interscope Records in the United States and Fiction Records in the UK.', 'Tame Impala is the psychedelic music project of Australian multi-instrumentalist Kevin Parker. ', 'Tame Impala is the psychedelic music project of Australian multi-instrumentalist Kevin Parker. ', '2024-03-02 19:47:57', 'Wiki'),
(2, 'about Gorillaz', 'Gorillaz are an English virtual band created in 1998 by musician Damon Albarn and artist Jamie Hewlett, from London. The band primarily consists of four fictional members: 2-D (vocals, keyboards), Murdoc Niccals (bass guitar), Noodle (guitar, keyboards, vocals) and Russel Hobbs (drums). Their universe is presented in media such as music videos, interviews, comic strips and short cartoons. Gorillaz\'s music has featured collaborations with a wide range of featured artists, with Albarn as the only permanent musical contributor.', 'Gorillaz are an English virtual band created in 1998 by musician Damon Albarn and artist Jamie Hewlett, from London. The band primarily consists of four fictional members: 2-D (vocals, keyboards), Murdoc Niccals (bass guitar), Noodle (guitar, keyboards, vocals) and Russel Hobbs (drums). Their universe is presented in media such as music videos, interviews, comic strips and short cartoons. Gorillaz\'s music has featured collaborations with a wide range of featured artists, with Albarn as the only permanent musical contributor.', 'Gorillaz are an English virtual band created in 1998 by musician Damon Albarn and artist Jamie Hewlett, from London.', 'Gorillaz are an English virtual band created in 1998 by musician Damon Albarn and artist Jamie Hewlett, from London.', '2024-03-02 19:47:57', 'Wiki ');

-- --------------------------------------------------------

--
-- Структура таблицы `guest_book`
--

CREATE TABLE `guest_book` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `guest_book`
--

INSERT INTO `guest_book` (`id`, `name`, `message`, `email`, `date_created`) VALUES
(1, 'User 1', 'Hi, everyone. I didn’t understand one task, who can help with the analysis?', 'UserMail@gmail.com', '2024-03-11 07:50:40'),
(2, 'Tom', 'Hi, user. I can help you with analysis. ', 'TomWithMail@gmail.com', '2024-03-11 07:50:40'),
(3, 'Danil', 'I can make a new post!', 'danil@gmail.com', '2024-03-11 12:17:55');

-- --------------------------------------------------------

--
-- Структура таблицы `photo`
--

CREATE TABLE `photo` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `name_file` text NOT NULL,
  `date` datetime NOT NULL,
  `published` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `photo`
--

INSERT INTO `photo` (`id`, `name`, `name_file`, `date`, `published`) VALUES
(2, 'crows', '2.jpeg', '2024-04-05 16:51:34', 1),
(3, 'Black castle', '1.jpeg', '2024-04-05 16:54:27', 0),
(4, 'Clouds', '5.jpeg', '2024-04-05 17:00:57', 1),
(5, 'White picture', '3.jpeg', '2024-04-05 17:01:20', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `quest` text NOT NULL,
  `answer` text NOT NULL,
  `correct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id`, `article_id`, `quest`, `answer`, `correct`) VALUES
(1, 1, 'Кто придумал язык PHP?\r\n', 'Стив Джобс|Билл Гейтс|Расмус Лердорф|Тим Бернес', 3),
(2, 1, 'Как правильно расшифровывается PHP? ', 'Hypertext Preprocessor|Pages HTTP Personal', 1),
(3, 2, 'Является ли MySQL реляционной СУБД?', 'Нет|Да', 2),
(4, 2, 'Какая компания поддерживает разработку MySQL?', 'Sun Microsystem|Google|Microsoft|Oracle', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `test_resultation`
--

CREATE TABLE `test_resultation` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `resultation` int(11) NOT NULL,
  `test_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `test_resultation`
--

INSERT INTO `test_resultation` (`id`, `name`, `resultation`, `test_num`) VALUES
(62, '99912', 50, 1),
(64, '99912', 100, 2),
(65, 'tester1', 100, 1),
(66, 'tester1', 50, 2),
(67, 'tester12', 100, 1),
(68, 'tes1123123123', 50, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `password`) VALUES
(81, 'NotAdmin', '202cb962ac59075b964b07152d234b70'),
(82, 'danil', '202cb962ac59075b964b07152d234b70'),
(83, '123', 'caf1a3dfb505ffed0d024130f58c5cfa'),
(84, '321', '0ca22a2948cb0fe2f666f77faff02834'),
(85, '3211', '0ca22a2948cb0fe2f666f77faff02834'),
(86, '321154', '0ca22a2948cb0fe2f666f77faff02834'),
(87, '3213', '0ca22a2948cb0fe2f666f77faff02834'),
(88, '3213333', '0ca22a2948cb0fe2f666f77faff02834'),
(89, '32133332', '0ca22a2948cb0fe2f666f77faff02834'),
(90, 'Tester', 'caf1a3dfb505ffed0d024130f58c5cfa'),
(91, '32133332ы', '0ca22a2948cb0fe2f666f77faff02834'),
(92, '999', '0ca22a2948cb0fe2f666f77faff02834'),
(93, '9991', '0ca22a2948cb0fe2f666f77faff02834'),
(94, '99912', '0ca22a2948cb0fe2f666f77faff02834'),
(95, 'tester1', '0ca22a2948cb0fe2f666f77faff02834'),
(96, 'tester12', '0ca22a2948cb0fe2f666f77faff02834'),
(97, 'tes1123123123', '0ca22a2948cb0fe2f666f77faff02834');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `guest_book`
--
ALTER TABLE `guest_book`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `test_resultation`
--
ALTER TABLE `test_resultation`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `guest_book`
--
ALTER TABLE `guest_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=317;

--
-- AUTO_INCREMENT для таблицы `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `test_resultation`
--
ALTER TABLE `test_resultation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
