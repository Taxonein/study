-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 03 2023 г., 00:17
-- Версия сервера: 5.7.33
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `diplom`
--

-- --------------------------------------------------------

--
-- Структура таблицы `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `category` int(10) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_before` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `catalog`
--

INSERT INTO `catalog` (`id`, `category`, `date`, `name`, `description`, `photo`, `price`, `price_before`, `qty`) VALUES
(1, 1, '2023-04-25', 'Самокат (тестовый 1)Самокат (тестовый 1)Самокат (тестовый 1)', 'тест2', '', '14500', '18000', '4'),
(2, 1, '2023-04-25', 'Самокат (тестовый 2)', 'тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 тест2 ', '', '15000', '20000', '4'),
(3, 1, '2023-04-25', 'Товар (тестовый 3)', 'тест3', 'img/catalog/1682887797x3xRobloxScreenShot20220813_211957621.png', '2000', '3000', '5'),
(4, 2, '2023-04-25', 'Дизель тест4 название +4 название +4 название +4 название +4 название +4 обновлено', 'Тест4 обновлено', '', '2000', '', '6');

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_category`
--

CREATE TABLE `catalog_category` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `catalog_category`
--

INSERT INTO `catalog_category` (`id`, `name`) VALUES
(1, 'Самокаты'),
(2, 'Мопеды');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `items` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(10) NOT NULL DEFAULT '1',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `items`, `date`, `status`, `description`) VALUES
(7, 1, '3x1;2x2;', '02.05.2023 22:12:00', 1, NULL),
(8, 1, '1x1;', '02.05.2023 22:21:23', 1, NULL),
(9, 1, '1x1;', '02.05.2023 22:22:25', 1, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `status_list`
--

CREATE TABLE `status_list` (
  `id` int(10) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `status_list`
--

INSERT INTO `status_list` (`id`, `name`) VALUES
(1, 'Новый'),
(2, 'Подтвержденный'),
(3, 'Отмененный');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `register_date` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `cart` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `fullname`, `mail`, `pass`, `register_date`, `status`, `img`, `cart`) VALUES
(1, 'test', 'Dmitry Dmitry Dmitry', 'test@mail.ru', '098f6bcd4621d373cade4e832627b4f6', '30.04.2023 22:39:26', 1, 'img/user/1682950190x1xRobloxScreenShot20220820_203905872.png', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `catalog_category`
--
ALTER TABLE `catalog_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `status_list`
--
ALTER TABLE `status_list`
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
-- AUTO_INCREMENT для таблицы `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `catalog_category`
--
ALTER TABLE `catalog_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `status_list`
--
ALTER TABLE `status_list`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
