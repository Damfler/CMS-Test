-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 07 2021 г., 12:45
-- Версия сервера: 5.7.29
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `workbase`
--

-- --------------------------------------------------------

--
-- Структура таблицы `equipment`
--

CREATE TABLE `equipment` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `equipment`
--

INSERT INTO `equipment` (`id`, `name`, `code`, `active`) VALUES
(1, 'Shvabra', 1, 0),
(2, 'Ведро', 12, 1),
(3, 'Пользователь', 23423, 1),
(5, 'Стул', 3838, 1),
(6, 'Стрелка', 3452, 1),
(7, 'Обрез', 46453, 1),
(8, 'Макакаc', 33423, 1),
(9, 'Gashuk', 22, 1),
(10, 'Компьютер', 47837, 1),
(11, 'Калинин чертов мать', 0, 1),
(13, 'ноутбук', 242, 1),
(14, 'тестовое', 4323, 1),
(15, '2239329', 3324, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `list`
--

CREATE TABLE `list` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `equipment_id` int(11) DEFAULT NULL,
  `inv_num` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `list`
--

INSERT INTO `list` (`id`, `staff_id`, `equipment_id`, `inv_num`, `create_time`) VALUES
(1, 4, 9, 'ИН0', '2021-04-06 16:30:50'),
(2, 4, 3, 'ИН0', '2021-04-06 09:31:03'),
(3, 2, 11, 'ИН0', '2021-04-06 16:33:15'),
(4, 4, 5, 'ИН0', '2021-04-06 16:33:26'),
(5, 1, 2, 'ИН0', '2021-04-06 16:33:31'),
(6, 2, 6, 'ИН0', '2021-04-06 16:33:38'),
(7, NULL, 2, 'ИН0', '2021-04-06 17:08:53'),
(8, 4, 2, 'ИН0', '2021-04-06 17:08:59'),
(9, 1, 8, 'ИН0', '2021-04-07 05:37:28'),
(10, 4, 6, 'ИН0', '2021-04-07 05:38:10'),
(11, NULL, 3, 'ИН00011', '2021-04-07 05:39:21'),
(30, 1, 3, 'ИН000030', '2021-04-07 05:48:50'),
(31, 1, 3, 'ИН000031', '2021-04-07 05:49:01'),
(32, NULL, 6, 'ИН000032', '2021-04-07 05:50:18'),
(33, NULL, 1, 'ИН000033', '2021-04-07 06:06:00'),
(34, 1, 7, 'ИН000034', '2021-04-07 06:08:30'),
(35, 5, 14, 'ИН000035', '2021-04-07 06:29:23');

-- --------------------------------------------------------

--
-- Структура таблицы `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `FIO` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `INN` int(30) NOT NULL,
  `phone` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `staff`
--

INSERT INTO `staff` (`id`, `FIO`, `INN`, `phone`, `email`, `post`, `department`, `active`) VALUES
(1, 'Гашук Дмитрий Александрович', 1234567890, '+12345678901', 'admin@admin.ru', 'Должность', 'Отдел', 0),
(2, 'Иванов Иван Ивано`вич', 1234567890, '+12345678901', 'admin@admin.ru', 'Должность', 'Отдел', 1),
(4, 'Горин Генадий *вич', 4345354, '5657565', '56567665', '566565776', '67676767', 1),
(5, 'Фамилия Имя Отчество', 1234567890, '12345678901', 'admin@admin.admin', 'post', 'no post', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_id` (`staff_id`),
  ADD KEY `equipment_id` (`equipment_id`);

--
-- Индексы таблицы `staff`
--
ALTER TABLE `staff`
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
-- AUTO_INCREMENT для таблицы `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `list`
--
ALTER TABLE `list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `list`
--
ALTER TABLE `list`
  ADD CONSTRAINT `list_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`),
  ADD CONSTRAINT `list_ibfk_2` FOREIGN KEY (`equipment_id`) REFERENCES `equipment` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
