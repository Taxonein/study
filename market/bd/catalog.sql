-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 24 2022 г., 07:46
-- Версия сервера: 8.0.29
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `catalog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(100) NOT NULL,
  `img` varchar(100) DEFAULT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `content`, `img`, `price`) VALUES
(1, 'Ренни', '', 'w.png', 300),
(2, 'Пумпан(Таблетки)', '', 'e.png', 588),
(3, 'Пумпан(Капли)', '', 'q.png', 375),
(4, 'Аквалор софт мини', '', 'r.png', 320),
(5, 'Супрадин', '', 't.png', 1400),
(6, 'Отривин Ментол', '', 'u.png', 210),
(7, 'Смекта', '', 'i.png', 109),
(8, 'Тизин классик', '', 'o.png', 130),
(9, 'АМБРОБЕНЕ ТАБ. 30МГ', '', 'abrabene.png', 140),
(10, 'Феназепам', '', 'Fenazepam.png', 999),
(11, 'Крем лекарь. Регенерирующий 100 мл', '', 'cream.png', 140);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `name` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `Surname` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `login` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`name`, `Surname`, `login`, `email`, `password`) VALUES
('Юра', 'Петров', 'Yura', 'yura.petrov@yandex.ru', 'deaad792606928825c0bf85cd46e9edf');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
