-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Дек 20 2020 г., 19:36
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `curtains_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(1, 'Тюль'),
(2, 'Ночные шторы'),
(3, 'Карнизы'),
(4, 'Аксессуары');

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `image` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `category`, `image`) VALUES
(1, 'Тюль 1', '1000.00', 1, 'tyul1.jpg'),
(2, 'Тюль 2', '3000.00', 1, 'tyul2.jpg'),
(3, 'Тюль 3', '2000.00', 1, 'tyul3.jpg'),
(4, 'Штора 1', '1000.00', 2, 'shtora1.jpg'),
(5, 'Штора 2', '3000.00', 2, 'shtora2.jpg'),
(6, 'Штора 3', '2000.00', 2, 'shtora3.jpg'),
(7, 'Карниз 1', '1000.00', 3, 'karniz1.jpg'),
(8, 'Карниз 2', '3000.00', 3, 'karniz2.jpg'),
(10, 'Аксессуар 1', '1000.00', 4, 'acc1.jpg'),
(11, 'Аксессуар 2', '3000.00', 4, 'acc2.jpg'),
(12, 'Аксессуар 3', '2000.00', 4, 'acc3.jpg'),
(13, 'Карниз 3', '2000.00', 3, 'karniz3.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `orderid` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `price` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`orderid`, `userid`, `price`) VALUES
(3, 2, '5000.00'),
(4, 2, '7000.00'),
(5, 2, '8000.00'),
(6, 2, '8000.00');

-- --------------------------------------------------------

--
-- Структура таблицы `orderscontent`
--

CREATE TABLE `orderscontent` (
  `orderid` int(11) DEFAULT NULL,
  `itemid` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orderscontent`
--

INSERT INTO `orderscontent` (`orderid`, `itemid`, `quantity`) VALUES
(4, 4, 2),
(4, 4, 1),
(4, 4, 1),
(5, 2, 2),
(5, 2, 1),
(6, 5, 2),
(6, 5, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pass` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isadmin` bit(1) DEFAULT b'0',
  `name` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `pass`, `phonenumber`, `mail`, `isadmin`, `name`) VALUES
(2, '25d55ad283aa400af464c76d713c07ad', '79997644334', 'patachyon@gmail.com', b'1', 'Санёк'),
(3, '25d55ad283aa400af464c76d713c07ad', '12345678', '123@456.78', b'0', 'тестировщик');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`),
  ADD KEY `userid` (`userid`);

--
-- Индексы таблицы `orderscontent`
--
ALTER TABLE `orderscontent`
  ADD KEY `orderid` (`orderid`),
  ADD KEY `itemid` (`itemid`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`);

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `orderscontent`
--
ALTER TABLE `orderscontent`
  ADD CONSTRAINT `orderscontent_ibfk_1` FOREIGN KEY (`orderid`) REFERENCES `orders` (`orderid`),
  ADD CONSTRAINT `orderscontent_ibfk_2` FOREIGN KEY (`itemid`) REFERENCES `items` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
