-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Ноя 09 2019 г., 16:22
-- Версия сервера: 10.4.8-MariaDB
-- Версия PHP: 7.3.11

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

CREATE TABLE `achivment` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_people` int(255) UNSIGNED NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `club`
--

CREATE TABLE `club` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8 DEFAULT NULL,
  `rating` float(255,0) DEFAULT NULL,
  `address` text CHARACTER SET utf8 DEFAULT NULL,
  `x` text CHARACTER SET utf8 DEFAULT NULL,
  `y` text CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `club`
--

INSERT INTO `club` (`id`, `name`, `description`, `rating`, `address`, `x`, `y`) VALUES
(1, 'Буревестник', 'Описание клуба Буревестник', 1, 'ул. Долгоозерная,  д. 16', '60.018701', '30.251041'),
(2, 'Восход', 'Описание клуба Буревестник', 2, 'пр. Испытателей,  д. 31', '60.007451', '30.270729'),
(3, 'Галактика', 'Описание клуба Галактика', 3, 'Ланское шоссе,  д. 24, корп. 5', '59.998260', '30.319920'),
(4, 'Заозерье', 'Описание клуба Заозерье', 4, 'Комендантский пр., 39', '60.025142', '30.240185'),
(5, 'Школа автомотоспорта Лахта-спорт', 'Описание клуба Школа автомотоспорта Лахта-спорт', 5, 'Пос. Лахта Вокзальный пер., д. 2  ', '59.991839', '30.158336');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_people` int(11) NOT NULL,
  `comment` text CHARACTER SET utf8 NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `people`
--

CREATE TABLE `people` (
  `id` int(10) UNSIGNED NOT NULL,
  `sername` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `otch` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `id_vk` int(15) NOT NULL,
  `information` text CHARACTER SET utf8 NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `people`
--

INSERT INTO `people` (`id`, `sername`, `name`, `otch`, `id_vk`, `information`, `date`) VALUES
(5, 'Дмитриев', 'Лёня', NULL, 133936878, '', '0000-00-00');

-- --------------------------------------------------------

--
-- Структура таблицы `section`
--

CREATE TABLE `section` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `description` text CHARACTER SET utf8 DEFAULT NULL,
  `rating` float(255,0) DEFAULT NULL,
  `id_club` int(255) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `section`
--

INSERT INTO `section` (`id`, `name`, `description`, `rating`, `id_club`) VALUES
(1, 'Игротека', 'Описание игротеки', 1, 1),
(2, 'Настольные игры', 'Описание настольные игры', 2, 1),
(3, 'Собеседование', 'Описание собеседования', 3, 1),
(4, 'Общение по интересам', 'Описание Общение по интересам', 4, 1),
(5, 'Игротека', 'Описание игротеки', 4, 2),
(6, 'Настольные игры', 'Описание настольных игр', 4, 2),
(7, 'Собеседование', 'Описание собеседования', 1, 2),
(8, 'Просмотр телевизионных программ', 'Описание телевизионных программ', 4, 2),
(9, 'Настольные игры', 'Описание настольных игр', 5, 3),
(10, 'Настольный теннис', 'Описание настольного тенниса', 5, 3),
(11, 'Собеседование', 'Описание собеседования', 3, 3),
(12, 'Игротека', 'Описание игротеки', 4, 4),
(13, 'Настольные игры', 'Описание настольных игр', 5, 4),
(14, 'Собеседование', 'Описание собеседования', 2, 4),
(15, 'Просмотр телевизионных программ', 'Описание телевизионных программ', 1, 4),
(16, 'Картинг', 'Описание картинга', 5, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `teacher`
--

CREATE TABLE `teacher` (
  `id` int(10) UNSIGNED NOT NULL,
  `sername` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `otch` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `rating` int(255) DEFAULT NULL,
  `id_section` int(255) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `visit`
--

CREATE TABLE `visit` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_people` int(255) UNSIGNED NOT NULL,
  `id_section` int(255) UNSIGNED NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `whowhere`
--

CREATE TABLE `whowhere` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_people` int(255) UNSIGNED NOT NULL,
  `id_section` int(255) UNSIGNED NOT NULL,
  `rating` float(255,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `achivment`
--
ALTER TABLE `achivment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_people` (`id_people`) USING BTREE;

--
-- Индексы таблицы `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_club` (`id_club`) USING BTREE;

--
-- Индексы таблицы `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_section` (`id_section`);

--
-- Индексы таблицы `visit`
--
ALTER TABLE `visit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_people` (`id_people`) USING BTREE,
  ADD KEY `id_section` (`id_section`) USING BTREE;

--
-- Индексы таблицы `whowhere`
--
ALTER TABLE `whowhere`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_people` (`id_people`) USING BTREE,
  ADD KEY `id_section` (`id_section`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `club`
--
ALTER TABLE `club`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `people`
--
ALTER TABLE `people`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `section`
--
ALTER TABLE `section`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `visit`
--
ALTER TABLE `visit`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `whowhere`
--
ALTER TABLE `whowhere`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- Ограничения внешнего ключа таблицы `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`id_section`) REFERENCES `section` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
