-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Хост: localhost:3306
-- Время создания: Апр 14 2019 г., 15:27
-- Версия сервера: 5.5.42
-- Версия PHP: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `taskmanager`
--

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `image`) VALUES
(1, 'Заголовок 1', 'Описание заголовка 1', NULL),
(2, 'Заголовок 1', 'Описание заголовка 1', NULL),
(3, '111', '111', NULL),
(6, 'test', 'test text', NULL),
(7, 'test', 'test text', NULL),
(8, 'test', 'test text', 'mybottle.jpg'),
(9, 'test', 'test text', 'mybottle.jpg'),
(11, 'test444', 'test text444', 'mybottle.jpg'),
(12, 'test444', 'test text444', 'mybottle.jpg'),
(13, 'test444', 'test text444', 'mybottle.jpg'),
(14, 'rtrtrt', 'rtrtrt', 'mybottle.jpg'),
(15, 'test444', 'test text444', 'mybottle.jpg'),
(16, 'Заголовок', 'Описание', 'IMG_4894.PNG'),
(17, 'Заголовок 333', 'Описание 333', 'IMG_4894.PNG'),
(18, 'оавоыадовыда', 'fsdfdsfdsfsdf', 'IMG_9375.JPG'),
(19, 'оавоыадовыдапавпав', 'fsdfdsfdsfsdfпвпавп', NULL),
(20, '666', '666', 'IMG_8306.JPG'),
(21, '666565', '6665656', 'IMG_8306.JPG'),
(22, 'кукукук', 'укукукук', 'IMG_9375-1.jpg'),
(23, 'кукукук111', 'укукукук', 'IMG_9375-1.jpg'),
(24, 'кукукук111', 'укукукук', 'IMG_9375-1.jpg'),
(25, '5656', '6666', '29-8marta2.jpg'),
(26, '565666', '666677', '29-8marta2.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, '1121', '12@example.php', '202cb962ac59075b964b07152d234b70'),
(2, '23', '23@mail.ru', '202cb962ac59075b964b07152d234b70'),
(3, '45', '45@mail.ru', '6c8349cc7260ae62e3b1396831a8398f'),
(4, '121212', '121212@mail.ru', '93279e3308bdbbeed946fc965017f67a');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
