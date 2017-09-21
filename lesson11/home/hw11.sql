-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 08 2017 г., 22:47
-- Версия сервера: 5.5.53
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `task11`
--

-- --------------------------------------------------------

--
-- Структура таблицы `groupUsers`
--

CREATE TABLE `groupUsers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `groupUsers`
--

INSERT INTO `groupUsers` (`id`, `name`) VALUES
(1, 'Группа 1'),
(2, 'Группа 2'),
(3, 'Группа 3'),
(4, 'Группа 4'),
(5, 'Группа 5'),
(6, 'Группа 6'),
(7, 'Группа 7');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `group_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `group_id`) VALUES
(1, 'Пользователь 1', 'user1@mail.com', '+380(11) 111-11-11', 3),
(2, 'Пользователь 2', 'user2@mail.com', '+380(22) 222-22-22', 3),
(3, 'Пользователь 3', 'user3@mail.com', '+380(33) 333-33-33', 3),
(4, 'Пользователь 4', 'user4@mail.com', NULL, 1),
(5, 'Пользователь 5', 'user5@mail.com', NULL, 7),
(6, 'Пользователь 6', 'user6@mail.com', NULL, NULL),
(7, 'Пользователь 7', 'user7@mail.com', NULL, NULL),
(8, 'Пользователь 8', 'user8@mail.com', NULL, NULL),
(9, 'Пользователь 9', NULL, NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `groupUsers`
--
ALTER TABLE `groupUsers`
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
-- AUTO_INCREMENT для таблицы `groupUsers`
--
ALTER TABLE `groupUsers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
