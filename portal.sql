-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 14 2021 г., 02:38
-- Версия сервера: 10.2.22-MariaDB
-- Версия PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `portal`
--

-- --------------------------------------------------------

--
-- Структура таблицы `application`
--

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `status_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `img_after` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `application`
--

INSERT INTO `application` (`id`, `name`, `text`, `img`, `user_id`, `date_time`, `status_id`, `category_id`, `img_after`) VALUES
(1, 'ямы', 'Ужасные ямы на дорогах решите проблему!!!!', 'ben-white-qDY9ahp0Mto-unsplash.jpg', 52, '2021-04-05 17:43:14', 1, 1, NULL),
(4, 'животные', 'Много бродячих собак, решите проблему', 'фасад недочищенный.jpg', 55, '2021-04-06 12:04:12', 1, 3, NULL),
(7, 'Дом в ужасном стостоянии', 'СТРАШНО ЖИТЬ! Дом просто в ужасном состоянии, пожалуйста, примите меры!', 'jpgreret.png', 55, '2021-04-07 18:28:47', 1, 3, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Дороги'),
(2, 'Животные'),
(3, 'Здания');

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `name`, `img`) VALUES
(1, 'Решена', ''),
(2, 'Отклонена', '');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `last_name`, `email`, `password`, `type`) VALUES
(27, 'яшка', 'никитич', 'fffffffff@mail.ru', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(35, 'добрыня', 'никитич', 'fffffffff@mail.ru', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(42, 'добрыня', 'абдулов', 'fffffffff@mail.ru', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(43, 'илья', 'яшкин', 'fffff@mail.ru', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(44, 'добрыня', 'яшкин', 'gfgfgf@mail.ru', 'e10adc3949ba59abbe56e057f20f883e', 1),
(46, 'Ян', 'яныч', 'asddsa@mail.ru', '202cb962ac59075b964b07152d234b70', 1),
(47, 'Kate', 'kate', 'rewrew@mail.ru', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(48, 'яшка', 'никитич', 'hgfffghgf@mail.ru', 'e10adc3949ba59abbe56e057f20f883e', 1),
(52, 'Святослав', 'Раневский', 'popopopo@mail.ru', '$2y$10$fGMHHPIYwQOsQdg8pdlzLO8GAA9drjn4OMSVZaWH8SZm42tz410jm', 1),
(53, 'Леонид', 'яшкин', 'hghghg@mail.ru', '$2y$10$NMvnmYk0T3yRK87SjDWxXe9hJoD7SUuEAECYEn49RpdhijVtqqvqO', 1),
(54, 'владислав', 'добрынин', 'cokadel@mail.ru', '$2y$10$5iO5A9ffFuC5fOKi/WggEecSH2pC7MA2bsrz7lTnPH8Ti.dsz3UXq', 1),
(55, 'Оксана', 'орифлейм', 'oriflame@mail.ru', '$2y$10$vDIpiegbXugbIkI5ht0Z/ekAALvo7RPUFc9dqPUztXix3o9Dm.wX2', 1),
(60, 'Администратор', 'портала', 'admin', '$2y$10$M5hGg2.joSt8ihu/VB4nNuWt4y.BXEfd6AAmtOr.2xh/En2Uge.X2', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user_type`
--

INSERT INTO `user_type` (`id`, `name`) VALUES
(1, 'Обычный пользователь'),
(2, 'Администратор');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`);

--
-- Индексы таблицы `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT для таблицы `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `application_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `application_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`type`) REFERENCES `user_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
