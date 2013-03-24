-- phpMyAdmin SQL Dump
-- version 3.5.0
-- http://www.phpmyadmin.net
--
-- Хост: openserver:3306
-- Время создания: Июн 01 2012 г., 09:33
-- Версия сервера: 5.5.22-log
-- Версия PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `graph`
--

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `horiz` int(12) NOT NULL,
  `vert` int(12) NOT NULL,
  `up` varchar(35) NOT NULL,
  `down` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `horiz`, `vert`, `up`, `down`) VALUES
(1, 19, -11, '0.292893', '0.292893'),
(2, 19, -11, '0.292893', '0.292893');

-- --------------------------------------------------------

--
-- Структура таблицы `values`
--

CREATE TABLE IF NOT EXISTS `values` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `values`
--

INSERT INTO `values` (`id`, `value`) VALUES
(1, 'sin(x)+cos(6*x); x/2-cot(x)-10'),
(2, 'x^4+sin(x); x^e+rand');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
