-- phpMyAdmin SQL Dump
-- version 3.5.0
-- http://www.phpmyadmin.net
--
-- Хост: openserver:3306
-- Время создания: Дек 11 2012 г., 08:02
-- Версия сервера: 5.5.22-log
-- Версия PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `internet_sales`
--

-- --------------------------------------------------------

--
-- Структура таблицы `deliveries`
--

CREATE TABLE IF NOT EXISTS `deliveries` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `fio` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `time` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `confirm` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`order_id`,`fio`),
  UNIQUE KEY `order_id_UNIQUE` (`order_id`),
  KEY `orders_to_deliveries` (`order_id`),
  KEY `delivery_to_user` (`fio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `fio` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `quantity` tinyint(4) DEFAULT NULL,
  `tel` varchar(100) DEFAULT NULL,
  `confirm` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`,`shop_id`,`product_id`,`fio`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `shop_id_to_orders` (`shop_id`),
  KEY `product_id_to_orders` (`product_id`),
  KEY `order_to_user` (`fio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `data` tinytext,
  `img` varchar(255) DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  `warranty` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`,`shop_id`,`type_id`),
  KEY `shop_to_products` (`shop_id`),
  KEY `product_to_type` (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `shop_id`, `type_id`, `brand`, `model`, `data`, `img`, `price`, `warranty`) VALUES
(1, 1, 3, 'Genius', 'KB21', 'ÐžÑ„Ñ„Ð¸ÑÐ½Ð°Ñ ÐºÐ»Ð°Ð²Ð¸Ð°Ñ‚ÑƒÑ€Ð° ÑÐ¾ 105-ÑŽ ÐºÐ»Ð°Ð²Ð¸ÑˆÐ°Ð¼Ð¸', 'http://sales/css/img/keyboard_kb.jpg', '23$', '1 year'),
(4, 7, 1, 'LG', '23L23P', '23-Ñ… Ð´ÑŽÐ¹Ð¼Ð¾Ð²Ñ‹Ð¹ Ð¼Ð¾Ð½Ð¸Ñ‚Ð¾Ñ€ Ñ Ñ€Ð°Ð·Ñ€ÐµÑˆÐµÐ½Ð¸ÐµÐ¼ Ð² 1920x1080 Ð¿Ð¸ÐºÑÐµÐ»ÐµÐ¹, IPS Ð¼Ð°Ñ‚Ñ€Ð¸Ñ†ÐµÐ¹ Ð½Ð° 5 Ð¼Ñ ', 'css/img/none.gif', '201$', '1 Ð³Ð¾Ð´'),
(5, 6, 8, 'Plotnik', '4Ð°2', 'Ð”ÐµÑ€ÐµÐ²ÑÐ½Ð½Ñ‹Ð¹ ÑÑ‚ÑƒÐ» ÑÐ¾ ÑÐ¿Ð¸Ð½ÐºÐ¾Ð¹ Ð¸ Ñ‡ÐµÑ‚Ñ‹Ñ€ÑŒÐ¼Ñ Ð½Ð¾Ð¶ÐºÐ°Ð¼Ð¸', 'css/img/none.gif', '45$', '2 Ð¼ÐµÑÑÑ†Ð°'),
(6, 6, 6, 'Mebelion', '5M2S', 'ÐœÑÐ³ÐºÐ¾Ðµ ÐºÐ¾Ð¶Ð°Ð½Ð½Ð¾Ðµ ÐºÑ€ÐµÑÐ»Ð¾ ÑÐ¾ ÑÐ¿Ð¸Ð½ÐºÐ¾Ð¹ Ð¸ Ð¿Ð¾Ð´Ð³Ð¾Ð»Ð¾Ð²Ð½Ð¸ÐºÐ¾Ð¼, Ð½Ð° ÐºÐ¾Ð»ÐµÑÐ¸ÐºÐ°Ñ…', 'css/img/none.gif', '110$', '10 Ð¼ÐµÑÑÑ†ÐµÐ²'),
(7, 6, 9, 'Edok', '6S4M', 'Ð”ÐµÑ€ÐµÐ²ÑÐ½Ð½Ñ‹Ð¹ ÑÑ‚Ð¾Ð» Ð½Ð° ÑˆÐµÑÑ‚ÑŒ Ð¿Ð¾ÑÐ°Ð´Ð¾Ñ‡Ð½Ñ‹Ñ… Ð¼ÐµÑÑ‚', 'css/img/none.gif', '200$', '22 Ð¼ÐµÑÑÑ†Ð°'),
(8, 6, 7, 'Simpson', '5MD1', 'ÐœÑÐ³ÐºÐ¸Ð¹ Ð´Ð¸Ð²Ð°Ð½ Ð½Ð° Ð¿ÑÑ‚ÑŒ Ð¿Ð¾ÑÐ°Ð´Ð¾Ñ‡Ð½Ñ‹Ñ… Ð¼ÐµÑÑ‚, Ñ€Ð°Ð·Ð´Ð²Ð¸Ð¶Ð½Ð¾Ð¹', 'css/img/none.gif', '310$', '1 Ð¼ÐµÑÑÑ†'),
(9, 6, 8, 'Taburet', '1TM', 'Ð”ÐµÑ€ÐµÐ²ÑÐ½Ð½Ð°Ñ Ñ‚Ð°Ð±ÑƒÑ€ÐµÑ‚ÐºÐ° Ð½Ð° Ñ‚Ñ€ÐµÑ… Ð½Ð¾Ð¶ÐºÐ°Ñ…', 'css/img/none.gif', '20$', '25 Ð¼ÐµÑÑÑ†ÐµÐ²'),
(10, 6, 6, 'Plotnik', '2KK', 'ÐšÑ€ÐµÑÐ»Ð¾-ÐºÐ°Ñ‡Ð°Ð»ÐºÐ° Ð´ÐµÑ€ÐµÐ²ÑÐ½Ð½Ð°Ñ, Ñ Ð¼ÑÐ³ÐºÐ¸Ð¼Ð¸ Ð¿Ð¾Ð´Ð»Ð¾ÐºÐ¾Ñ‚Ð½Ð¸ÐºÐ°Ð¼Ð¸, Ð¿Ð¾Ð´Ð³Ð¾Ð»Ð¾Ð²Ð½Ð¸ÐºÐ¾Ð¼ Ð¸ Ñ', 'css/img/none.gif', '160$', '12 Ð¼ÐµÑÑÑ†ÐµÐ²'),
(11, 1, 4, 'AMD', 'FX 8350', 'Ð’Ð¾ÑÑŒÐ¼Ð¸ ÑÐ´ÐµÑ€Ð½Ñ‹Ð¹ Ð¿Ñ€Ð¾Ñ†ÐµÑÑÐ¾Ñ€ Ñ Ñ‡Ð°ÑÑ‚Ð¾Ñ‚Ð¾Ð¹ 4 Ð“Ð³Ñ† Ð¸ ÐºÑÑˆÐ¾Ð¼ Ñ‚Ñ€ÐµÑ‚ÑŒÐµÐ³Ð¾ ÑƒÑ€Ð¾Ð²Ð½Ñ Ð² 8 Ðœ', 'css/img/none.gif', '210$', '12 Ð¼ÐµÑÑÑ†ÐµÐ²'),
(12, 1, 5, 'Nvidia', 'GTX 690', 'Ð”Ð²ÑƒÑ…Ñ‡Ð¸Ð¿Ð¾Ð²Ð°Ñ Ð²Ð¸Ð´ÐµÐ¾ÐºÐ°Ñ€Ñ‚Ð° Ñ Ð½Ð°Ð±Ð¾Ñ€Ñ‚Ð½Ð¾Ð¹ Ð¿Ð°Ð¼ÑÑ‚ÑŒÑŽ GDDR5 Ð½Ð° 6Ð“Ð³Ñ† Ð¸ Ñ‡Ð°ÑÑ‚Ð¾Ñ‚Ð¾Ð¹ Ð¿Ñ€Ð¾Ñ†', 'css/img/none.gif', '710$', '12 Ð¼ÐµÑÑÑ†ÐµÐ²'),
(13, 2, 3, 'A4-Tech', 'S121', 'ÐœÑƒÐ»ÑŒÑ‚Ð¸Ð¼ÐµÐ´Ð¸Ð° ÐºÐ»Ð°Ð²Ð¸Ð°Ñ‚ÑƒÑ€Ð° ÑÐ¾ ÑÐºÑ€Ð¾Ð»Ð»Ð¸Ð½Ð³Ð¾Ð¼ Ð¸ 130 ÐºÐ»Ð°Ð²Ð¸ÑˆÐ°Ð¼Ð¸', 'css/img/none.gif', '50$', '12 Ð¼ÐµÑÑÑ†ÐµÐ²'),
(14, 2, 1, 'Samsung', 'S24F350', '24-Ñ… Ð´ÑŽÐ¹Ð¼Ð¾Ð²Ñ‹Ð¹ Ð¼Ð¾Ð½Ð¸Ñ‚Ð¾Ñ€ Ñ Ñ€Ð°Ð·Ñ€ÐµÑˆÐµÐ½Ð¸ÐµÐ¼ 1920x1080 Ð¸ TN Ð¼Ð°Ñ‚Ñ€Ð¸Ñ†ÐµÐ¹ Ð½Ð° 2Ð¼Ñ', 'css/img/none.gif', '210$', '12 Ð¼ÐµÑÑÑ†ÐµÐ²'),
(15, 2, 5, 'AMD', 'HD 7970', 'ÐŸÐ¾Ð´Ð´ÐµÑ€Ð¶ÐºÐ° DX 11.1, Ñ‡Ð°ÑÑ‚Ð¾Ñ‚Ð° 1Ð“Ð³Ñ†, Ñ‡Ð°ÑÑ‚Ð¾Ñ‚Ð° Ñ€Ð°Ð±Ð¾Ñ‚Ñ‹ Ð¿Ð°Ð¼ÑÑ‚Ð¸ GDDR5 6Ð“Ð³Ñ†', 'css/img/none.gif', '410$', '12 Ð¼ÐµÑÑÑ†ÐµÐ²'),
(16, 7, 5, 'Nvidia', 'GTS 660Ti', '2 Ð“Ð± Ð¿Ð°Ð¼ÑÑ‚Ð¸ GDDR5 Ð½Ð° Ñ‡Ð°ÑÑ‚Ð¾Ñ‚Ðµ 5Ð“Ð³Ñ†, 1532-Ðµ ÑƒÐ½Ð¸Ð²ÐµÑ€ÑÐ°Ð»ÑŒÐ½Ñ‹Ðµ Ð¿Ñ€Ð¾Ñ†ÐµÑÑÐ¾Ñ€Ð½Ñ‹Ðµ ÐµÐ´Ð¸Ð½Ð¸Ñ†Ñ‹', 'css/img/none.gif', '310$', '12 Ð¼ÐµÑÑÑ†ÐµÐ²'),
(17, 2, 4, 'Intel', 'Core i5 2500K', '4-Ñ… ÑÐ´ÐµÑ€Ð½Ñ‹Ð¹ Ð¿Ñ€Ð¾Ñ†ÐµÑÑÐ¾Ñ€ Ñ Ñ‡Ð°ÑÑ‚Ð¾Ñ‚Ð¾Ð¹ Ð² 3.3 Ð“Ð³Ñ†, ÑÐ¾ ÑÐ²Ð¾Ð±Ð¾Ð´Ð½Ñ‹Ð¼ Ð¼Ð½Ð¾Ð¶Ð¸Ñ‚ÐµÐ»ÐµÐ¼ ', 'css/img/none.gif', '230$', '12 Ð¼ÐµÑÑÑ†ÐµÐ²'),
(18, 7, 1, 'Acer', 'L19NA', '19-Ñ‚Ð¸ Ð´ÑŽÐ¹Ð¼Ð¾Ð²Ñ‹Ð¹ ÑˆÐ¸Ñ€Ð¾ÐºÐ¾ÑÐºÑ€Ð°Ð½Ð½Ñ‹Ð¹ Ð¼Ð¾Ð½Ð¸Ñ‚Ð¾Ñ€ Ñ Ñ€Ð°Ð·Ñ€ÐµÑˆÐµÐ½Ð¸ÐµÐ¼ Ð² 1650Ñ…1050 px', 'css/img/none.gif', '110$', '12 Ð¼ÐµÑÑÑ†ÐµÐ²'),
(19, 2, 1, 'Asus', '27LK1', '27 Ð´ÑŽÐ¹Ð¼Ð¾Ð², Ñ€Ð°Ð·Ñ€ÐµÑˆÐµÐ½Ð¸Ðµ 2160Ñ…1366 Ð¿Ð¸ÐºÑÐµÐ»ÐµÐ¹ PLS Ð¼Ð°Ñ‚Ñ€Ð¸Ñ†Ð°, Ñ†Ð²ÐµÑ‚Ð¾Ð²Ð¾Ð¹ Ð¾Ñ…Ð²Ð°Ñ‚ 98% NTSC ', 'css/img/none.gif', '400$', '12 Ð¼ÐµÑÑÑ†ÐµÐ²'),
(20, 7, 4, 'Intel', 'Core i3 3200', '4-Ñ… Ð¿Ð¾Ñ‚Ð¾Ñ‡Ð½Ñ‹Ð¹ Ð¿Ñ€Ð¾Ñ†ÐµÑÑÐ¾Ñ€ Ñ Ð´Ð²ÑƒÐ¼Ñ ÑÐ´Ñ€Ð°Ð¼Ð¸ Ð½Ð° 3 Ð“Ð³Ñ†', 'css/img/none.gif', '130$', '12 Ð¼ÐµÑÑÑ†ÐµÐ²');

-- --------------------------------------------------------

--
-- Структура таблицы `product_type`
--

CREATE TABLE IF NOT EXISTS `product_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `product_type`
--

INSERT INTO `product_type` (`id`, `name`) VALUES
(6, 'ÐšÑ€ÐµÑÐ»Ð¾'),
(3, 'ÐšÐ»Ð°Ð²Ð¸Ð°Ñ‚ÑƒÑ€Ð°'),
(4, 'ÐŸÑ€Ð¾Ñ†ÐµÑÑÐ¾Ñ€'),
(8, 'Ð¡Ñ‚ÑƒÐ»'),
(9, 'Ð¡Ñ‚Ð¾Ð»'),
(1, 'ÐœÐ¾Ð½Ð¸Ñ‚Ð¾Ñ€'),
(5, 'Ð’Ð¸Ð´ÐµÐ¾ÐºÐ°Ñ€Ñ‚Ð°'),
(7, 'Ð”Ð¸Ð²Ð°Ð½');

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `host` varchar(45) DEFAULT NULL,
  `db` varchar(45) DEFAULT NULL,
  `user` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `primer` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `host`, `db`, `user`, `password`, `primer`) VALUES
(1, 'openserver', 'internet_sales', 'admin', 'admin', '6');

-- --------------------------------------------------------

--
-- Структура таблицы `shops`
--

CREATE TABLE IF NOT EXISTS `shops` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `tel` varchar(100) DEFAULT NULL,
  `site` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `shops`
--

INSERT INTO `shops` (`id`, `name`, `address`, `tel`, `site`, `email`) VALUES
(1, 'PC', 'Ð³. Ð‘Ð¸ÑˆÐºÐµÐº ÑƒÐ». Ð¡Ð¾Ð²ÐµÑ‚ÑÐºÐ°Ñ Ð´. 421', '996 (312) 34-23-24', 'www.pc.kg', 'admin@pc.kg'),
(2, 'Litech', 'Ð³. Ð‘Ð¸ÑˆÐºÐµÐº ÑƒÐ». Ð›ÐµÐ½Ð¸Ð½Ð° Ð´. 31', '996 (312) 23-63-36', 'www.litech.kg', 'admin@litech.kg'),
(6, 'Ð”Ð¸Ð²Ð°Ð½Ñ‹Ñ‡', 'Ð³. Ð‘Ð¸ÑˆÐºÐµÐº ÑƒÐ». Ð¡ÐµÐ²ÐµÑ€Ð½Ð°Ñ Ð´. 141', '996 (550) 24-54-24', 'www.divan.kg', 'manager@divan.kg'),
(7, 'Link', 'Ð³. Ð‘Ð¸ÑˆÐºÐµÐº ÑƒÐ». ÐšÐ¾Ð¼Ð¼ÑƒÐ½Ð°Ñ€Ð¾Ð² Ð´. 123', '996 (312) 64-68-56', 'www.link.kg', 'support@link.kg'),
(8, 'DualCom', 'Ð³. Ð‘Ð¸ÑˆÐºÐµÐº Ð¿Ñ€. Ð§ÑƒÐ¹ Ð´. 132', '996 (312) 67-34-21', 'www.dualcom.kg', 'admin@dualcom.kg'),
(9, 'TeraFlop', 'Ð³. ÐšÐ°Ð½Ñ‚ ÑƒÐ». Ð¡Ð¾Ð²ÐµÑ‚ÑÐºÐ°Ñ Ð´. 121', '(543) 34-12-9', 'www.teraflop.kg', 'manager@teraflop.kg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fio` varchar(255) NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `e_mail` varchar(255) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`,`fio`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `login_UNIQUE` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `fio`, `login`, `password`, `e_mail`, `type`) VALUES
(1, 'Ð®Ð·ÐµÑ€Ð¾Ð² Ð®Ð·ÐµÑ€ Ð®Ð·ÐµÑ€Ð¾Ð²Ð¸Ñ‡', 'user', 'Sln0mEOtLqa5g', 'user@user.rt', 'user'),
(2, 'Ð¨Ð°Ð¿Ð¾Ð²Ð°Ð»Ð¾Ð² ÐÐ»ÐµÐºÑÐ°Ð½Ð´Ñ€ ÐÐ»ÐµÐºÑÐ°Ð½Ð´Ñ€Ð¾Ð²Ð¸Ñ‡', 'admin', 'SlOPYt8/iovbQ', 'mail@shapovalov.org', 'admin'),
(4, 'Ð˜Ð²Ð°Ð½Ð¾Ð² Ð˜Ð²Ð°Ð½ Ð˜Ð²Ð°Ð½Ð¾Ð²Ð¸Ñ‡', 'asdf', 'SlhUmkcjpGI.6', 'asdf@mail.ru', 'user');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `deliveries`
--
ALTER TABLE `deliveries`
  ADD CONSTRAINT `delivery_to_user` FOREIGN KEY (`fio`) REFERENCES `orders` (`fio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `orders_to_deliveries` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `order_to_user` FOREIGN KEY (`fio`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_id_to_orders` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `shop_id_to_orders` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_to_type` FOREIGN KEY (`type_id`) REFERENCES `product_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `shop_to_products` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
