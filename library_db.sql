-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 05 2017 г., 23:00
-- Версия сервера: 10.1.21-MariaDB
-- Версия PHP: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `book_library`
--
CREATE DATABASE IF NOT EXISTS `book_library` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `book_library`;

-- --------------------------------------------------------

--
-- Структура таблицы `authors`
--

CREATE TABLE `authors` (
  `author_id` int(11) NOT NULL,
  `author_name` text NOT NULL,
  `author_pseudonim` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `authors`
--

INSERT INTO `authors` (`author_id`, `author_name`, `author_pseudonim`) VALUES
(57, 'Leo Tolstoy', ''),
(58, 'Maureen Johnson', ''),
(59, 'John Green', ''),
(60, 'Lauren Myracle', ''),
(70, 'Mark Twain', ''),
(71, 'Toni Morrison', ''),
(72, 'Franz Kafka', ''),
(73, 'Jonathan Swift', ''),
(74, 'Stendhal', ''),
(76, 'Carina Adams', ''),
(77, 'Jeannine Colette', ''),
(78, 'Leddy Harper', ''),
(79, 'Nicole Hart', ''),
(80, 'Lauren Runow', ''),
(81, 'Stephie Walls', ''),
(82, 'S.L. Ziegler', ''),
(83, 'Holly Black', ''),
(84, 'Justine Larbalestier', ''),
(85, 'Alaya Dawn Johnson', ''),
(86, 'Carrie Ryan', ''),
(87, 'Scott Westerfeld', ''),
(88, 'Meg Cabot', ''),
(89, 'Garth Nix', '');

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `book_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`book_id`, `book_title`) VALUES
(57, 'Anna Karenina'),
(58, 'Let it Snow'),
(62, 'The Adventures of Huckleberry Finn'),
(63, 'Beloved'),
(64, 'The Castle'),
(65, 'Gulliver\'s Travels'),
(66, 'War and Peace'),
(67, 'The Red and the Black'),
(69, 'A Secret Affair'),
(70, 'Zombies Vs. Unicorns');

-- --------------------------------------------------------

--
-- Структура таблицы `books_authors`
--

CREATE TABLE `books_authors` (
  `books_authors_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books_authors`
--

INSERT INTO `books_authors` (`books_authors_id`, `book_id`, `author_id`) VALUES
(72, 57, 57),
(73, 58, 58),
(74, 58, 59),
(75, 58, 60),
(85, 62, 70),
(86, 63, 71),
(87, 64, 72),
(88, 65, 73),
(89, 66, 57),
(90, 67, 74),
(92, 69, 76),
(93, 69, 77),
(94, 69, 78),
(95, 69, 79),
(96, 69, 80),
(97, 69, 81),
(98, 69, 82),
(99, 70, 83),
(100, 70, 84),
(101, 70, 85),
(102, 70, 58),
(103, 70, 86),
(104, 70, 87),
(105, 70, 88),
(106, 70, 89);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`) VALUES
(3, 'Александр', 'alex@mail.com', '111111', ''),
(5, 'Сергей', 'serg@mail.com', '111111', ''),
(6, 'Alexandr', 'alexman_b@mail.ru', '111111', 'admin'),
(7, 'Alexandr', 'new@gmail.com', '111111', 'admin'),
(8, 'aaa', 'dd@aa.com', '111111', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`);

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Индексы таблицы `books_authors`
--
ALTER TABLE `books_authors`
  ADD PRIMARY KEY (`books_authors_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT для таблицы `books_authors`
--
ALTER TABLE `books_authors`
  MODIFY `books_authors_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `books_authors`
--
ALTER TABLE `books_authors`
  ADD CONSTRAINT `books_authors_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`author_id`),
  ADD CONSTRAINT `books_authors_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
