-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 09 2019 г., 14:47
-- Версия сервера: 5.7.26
-- Версия PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `balsticsea`
--

-- --------------------------------------------------------

--
-- Структура таблицы `achivment`
--

DROP TABLE IF EXISTS `achivment`;
CREATE TABLE IF NOT EXISTS `achivment` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_people` int(255) UNSIGNED NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_people` (`id_people`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `club`
--

DROP TABLE IF EXISTS `club`;
CREATE TABLE IF NOT EXISTS `club` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` text,
  `rating` float(255,0) DEFAULT NULL,
  `address` text CHARACTER SET utf8,
  `x` text CHARACTER SET utf8,
  `y` text CHARACTER SET utf8,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_people` int(11) NOT NULL,
  `comment` text CHARACTER SET utf8 NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `people`
--

DROP TABLE IF EXISTS `people`;
CREATE TABLE IF NOT EXISTS `people` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sername` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `otch` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `id_vk` int(15) NOT NULL,
  `information` text CHARACTER SET utf8 NOT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `people`
--

INSERT INTO `people` (`id`, `sername`, `name`, `otch`, `id_vk`, `information`, `date`) VALUES
(5, 'Дмитриев', 'Лёня', NULL, 133936878, '', '0000-00-00');

-- --------------------------------------------------------

--
-- Структура таблицы `section`
--

DROP TABLE IF EXISTS `section`;
CREATE TABLE IF NOT EXISTS `section` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `rating` float(255,0) DEFAULT NULL,
  `id_club` int(255) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_club` (`id_club`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sername` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `otch` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `rating` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `ts`
--

DROP TABLE IF EXISTS `ts`;
CREATE TABLE IF NOT EXISTS `ts` (
  `id_section` int(255) UNSIGNED NOT NULL,
  `id_teacher` int(255) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_section`,`id_teacher`),
  KEY `id_section` (`id_section`) USING BTREE,
  KEY `id_teacher` (`id_teacher`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `visit`
--

DROP TABLE IF EXISTS `visit`;
CREATE TABLE IF NOT EXISTS `visit` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_people` int(255) UNSIGNED NOT NULL,
  `id_section` int(255) UNSIGNED NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_people` (`id_people`) USING BTREE,
  KEY `id_section` (`id_section`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `whowhere`
--

DROP TABLE IF EXISTS `whowhere`;
CREATE TABLE IF NOT EXISTS `whowhere` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_people` int(255) UNSIGNED NOT NULL,
  `id_section` int(255) UNSIGNED NOT NULL,
  `rating` float(255,0) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_people` (`id_people`) USING BTREE,
  KEY `id_section` (`id_section`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `achivment`
--
ALTER TABLE `achivment`
  ADD CONSTRAINT `achivment_ibfk_1` FOREIGN KEY (`id_people`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`id_club`) REFERENCES `club` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `ts`
--
ALTER TABLE `ts`
  ADD CONSTRAINT `ts_ibfk_1` FOREIGN KEY (`id_section`) REFERENCES `section` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ts_ibfk_2` FOREIGN KEY (`id_teacher`) REFERENCES `teacher` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `visit`
--
ALTER TABLE `visit`
  ADD CONSTRAINT `visit_ibfk_1` FOREIGN KEY (`id_people`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `visit_ibfk_2` FOREIGN KEY (`id_section`) REFERENCES `section` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `whowhere`
--
ALTER TABLE `whowhere`
  ADD CONSTRAINT `whowhere_ibfk_1` FOREIGN KEY (`id_people`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `whowhere_ibfk_2` FOREIGN KEY (`id_section`) REFERENCES `section` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
