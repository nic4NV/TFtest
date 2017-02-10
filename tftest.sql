-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 10 2017 г., 18:44
-- Версия сервера: 5.7.14
-- Версия PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tftest`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `second_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `sex` int(1) NOT NULL,
  `city` varchar(255) NOT NULL,
  `ip` int(11) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `first_name`, `second_name`, `email`, `password`, `birth_date`, `sex`, `city`, `ip`, `reg_date`) VALUES
(8, 'Вася', 'Пупкин', 'pupkin@mail.com', '$2y$10$AykJ69phP9VOlz2p4kDr..MYIFJGKi49JXVOyqf32Q81lrA8Fb74e', '1993-11-03', 1, 'Санкт-Петербург', 2130706433, '2017-02-09 11:04:44'),
(9, 'Александр', 'Пушкин', 'pushkin@mail.com', '$2y$10$xhicVYuxo15OrglVYNC4MuiNevii/bRkp.Ov/O5sysMQ3e3mmJbL6', '1977-06-06', 1, 'Москва', 2130706433, '2017-02-09 13:34:13'),
(11, 'Jack', 'Richer', 'richer@mail.com', '$2y$10$V2AQBhji3ifB.K7z/asE3eKSwz8v88/KGcwEnhalbbzdFpQ8KHX/.', '1974-04-17', 1, 'New-York', 2130706433, '2017-02-10 10:42:54');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `ip` (`ip`),
  ADD KEY `reg_date` (`reg_date`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
