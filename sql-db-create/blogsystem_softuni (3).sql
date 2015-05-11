-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 
-- Версия на сървъра: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blogsystem_softuni`
--

-- --------------------------------------------------------

--
-- Структура на таблица `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL,
  `content` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime NOT NULL,
  `Post_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `comments`
--

INSERT INTO `comments` (`id`, `content`, `firstname`, `lastname`, `email`, `date`, `Post_id`) VALUES
(1, 'very cool!', 'Ivan', 'Penev', 'ivan@vankata.com', '2015-05-09 07:36:12', 1),
(2, 'This is so cool. I like it.', 'Margarita', 'Zdravkova', NULL, '2015-05-10 06:30:13', 1),
(7, 'Cool Post!', 'Lili', 'Ivanova', 'lili@lili.com', '2015-05-09 08:41:18', 2),
(8, 'I like it it is realy cool!', 'Penka', 'Tsatcheva', 'penka@penka.com', '2015-05-10 06:17:17', 2),
(9, 'I like it. Can you tell more about it?', 'Pesho', 'Georgiev', 'pecata@abv.bg', '2015-05-10 10:44:43', 3),
(10, 'Hey can you be more specific about Diablo?', 'Ivan', 'Petrov', 'vankata@gmail.com', '2015-05-10 10:46:11', 3),
(11, 'Cool. We keep in touch about it.', 'Kiril', 'Petrov', '', '2015-05-10 10:50:00', 3),
(12, 'Cool. We keep in touch about it.', 'Kiril', 'Petrov', '', '2015-05-10 10:50:07', 3),
(13, 'This is nice.', 'Ivanka', 'Petrova', '', '2015-05-10 10:52:19', 3),
(14, 'Wow. It this for real?', 'Pesho', 'Peshev', 'peshkata@dir.bg', '2015-05-10 10:54:07', 2),
(15, 'Test', 'Test', 'Test', '', '2015-05-10 11:32:41', 3);

-- --------------------------------------------------------

--
-- Структура на таблица `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `content` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `date` datetime NOT NULL,
  `User_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `date`, `User_id`) VALUES
(1, 'Test Post 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2015-05-04 00:00:00', 1),
(2, 'Test Post 2.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2015-05-05 12:23:15', 2),
(3, 'New Test Post.', 'Now it''s your turn to join the crusade and take up arms against the enemies of the mortal realms. The Ultimate Evil Edition combines Diablo III and the Reaper of Souls expansion in one definitive volume. Stand ready. Something wicked this way comes.\r\nNow it''s your turn to join the crusade and take up arms against the enemies of the mortal realms. The Ultimate Evil Edition combines Diablo III and the Reaper of Souls expansion in one definitive volume. Stand ready. Something wicked this way comes.\r\n\r\nNow it''s your turn to join the crusade and take up arms against the enemies of the mortal realms. The Ultimate Evil Edition combines Diablo III and the Reaper of Souls expansion in one definitive volume. Stand ready. Something wicked this way comes.', '2015-05-10 02:15:08', 1);

-- --------------------------------------------------------

--
-- Структура на таблица `posts_visits`
--

CREATE TABLE IF NOT EXISTS `posts_visits` (
  `Post_id` int(11) NOT NULL,
  `visits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `posts_visits`
--

INSERT INTO `posts_visits` (`Post_id`, `visits`) VALUES
(1, 1),
(2, 3),
(3, 5);

-- --------------------------------------------------------

--
-- Структура на таблица `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(1, 'cool'),
(2, 'post'),
(3, 'web'),
(4, 'news');

-- --------------------------------------------------------

--
-- Структура на таблица `tags_has_posts`
--

CREATE TABLE IF NOT EXISTS `tags_has_posts` (
  `Tag_id` int(11) NOT NULL,
  `Post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `tags_has_posts`
--

INSERT INTO `tags_has_posts` (`Tag_id`, `Post_id`) VALUES
(1, 1),
(2, 1),
(2, 2),
(3, 2);

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`) VALUES
(1, 'test', '098f6bcd4621d373cade4e832627b4f6', 'Svetoslav', 'Savov'),
(2, 'test2', 'ad0234829205b9033196ba818f7a872b', 'Ivan', 'Ivanov'),
(3, 'test3', '8ad8757baa8564dc136c1e07507f4a98', 'Mariana', 'Peneva'),
(4, 'test12', 'test12', 'test12', 'test12'),
(5, 'test1234', 'test1234', 'test1234', 'test1234'),
(6, 'krisko', 'krisko', 'krisko', 'krisko'),
(7, 'test11111', 'test11111', 'test11111', 'test11111'),
(10, 'ani', '29d1e2357d7c14db51e885053a58ec67', 'ani', 'ani'),
(12, 'test22', '4d42bf9c18cb04139f918ff0ae68f8a0', 'test22', 'test22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_postId` (`Post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`), ADD KEY `fk_Posts_Users1_idx` (`User_id`);

--
-- Indexes for table `posts_visits`
--
ALTER TABLE `posts_visits`
  ADD KEY `Post_id` (`Post_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags_has_posts`
--
ALTER TABLE `tags_has_posts`
  ADD PRIMARY KEY (`Tag_id`,`Post_id`), ADD KEY `fk_Tags_has_Posts_Posts1_idx` (`Post_id`), ADD KEY `fk_Tags_has_Posts_Tags1_idx` (`Tag_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `comments`
--
ALTER TABLE `comments`
ADD CONSTRAINT `fk_postId` FOREIGN KEY (`Post_id`) REFERENCES `posts` (`id`);

--
-- Ограничения за таблица `posts`
--
ALTER TABLE `posts`
ADD CONSTRAINT `fk_Posts_Users1` FOREIGN KEY (`User_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения за таблица `posts_visits`
--
ALTER TABLE `posts_visits`
ADD CONSTRAINT `posts_visits_ibfk_1` FOREIGN KEY (`Post_id`) REFERENCES `posts` (`id`);

--
-- Ограничения за таблица `tags_has_posts`
--
ALTER TABLE `tags_has_posts`
ADD CONSTRAINT `fk_Tags_has_Posts_Posts1` FOREIGN KEY (`Post_id`) REFERENCES `posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Tags_has_Posts_Tags1` FOREIGN KEY (`Tag_id`) REFERENCES `tags` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
