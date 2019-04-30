-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 01, 2019 at 01:36 AM
-- Server version: 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taskmanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `image`, `user_id`) VALUES
(15, '1', '11', '636704463446126112.jpeg', 2),
(16, '2', '222', '33abafef293281108edf7bb0766eb70d.jpg', 2),
(17, 'запись другого пользователя', 'вавав', '21533892.cc7cb014.1200x1200o.f8d984404d72.jpeg', 3),
(18, 'вавава', 'вавава', '400x400.png', 3),
(19, 'задачв', 'тлдтлотло', '636704463446126112.jpeg', 4),
(20, '1212121', '121212121212', '400x400.png', 4),
(21, 'Первая моя запись', 'Описание первой записи про фиолетовую луну', '636704463446126112.jpeg', 5),
(22, 'Вторая задача', 'текст 111', '636704463446126112.jpeg', 5),
(23, 'симпсон 2', 'описание про симпсона такое то', '33abafef293281108edf7bb0766eb70d.jpg', 5),
(24, 'Если нет картинки', 'То получается вставляется картинка no-image.jpg', '', 5),
(25, '', '', '', 5),
(26, 'сысысвысывс', 'сывсысвысвы', '636704463446126112.jpeg', 5),
(27, '111', '11111', '21533892.cc7cb014.1200x1200o.f8d984404d72.jpeg', 5),
(28, 'тут заголовок же ', 'а тут уже описание ', '63f927b24.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(2, '111', '111@mail.ru', '698d51a19d8a121ce581499d7b701668'),
(3, '222', '222@mail.ru', 'bcbe3365e6ac95ea2c0343a2395834dd'),
(4, 'Ð˜ÐœÑ Ð¼Ð¾Ðµ', '123@mail.ru', '202cb962ac59075b964b07152d234b70'),
(5, 'Таня', 'offersoler@mail.ru', 'd60db28d94d538bbb249dcc7f2273ab1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
