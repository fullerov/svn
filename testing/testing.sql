-- phpMyAdmin SQL Dump
-- version 3.5.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 29 2013 г., 13:22
-- Версия сервера: 5.5.30-log
-- Версия PHP: 5.4.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `testing`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `text` longtext,
  `date` date DEFAULT NULL,
  `img` tinytext,
  `rating` int(11) DEFAULT NULL,
  `votes` int(11) DEFAULT NULL,
  `count` int(15) NOT NULL,
  PRIMARY KEY (`id`,`user_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `iuser` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- СВЯЗИ ТАБЛИЦЫ `articles`:
--   `user_id`
--       `users` -> `id`
--

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `title`, `meta_description`, `meta_key`, `text`, `date`, `img`, `rating`, `votes`, `count`) VALUES
(2, 3, 'Test article', 'About article', 'sdf df sdf dfs', 'Text text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text  text ', '2013-04-18', 'http://testing/css/img/no_img.gif', 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`country_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `icountry_for_city` (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- СВЯЗИ ТАБЛИЦЫ `cities`:
--   `country_id`
--       `countries` -> `id`
--

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `name`) VALUES
(1, 1, 'Bishkek'),
(2, 2, 'Moskow'),
(3, 1, 'Osh'),
(4, 1, 'Talas');

-- --------------------------------------------------------

--
-- Структура таблицы `comments_for_articles`
--

CREATE TABLE IF NOT EXISTS `comments_for_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `text` tinytext,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`,`post_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `icomments` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- СВЯЗИ ТАБЛИЦЫ `comments_for_articles`:
--   `post_id`
--       `articles` -> `id`
--

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idcountries_UNIQUE` (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'Kyrgizastan'),
(2, 'Russia');

-- --------------------------------------------------------

--
-- Структура таблицы `faculties`
--

CREATE TABLE IF NOT EXISTS `faculties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `univer_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`univer_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `iuniversity` (`univer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- СВЯЗИ ТАБЛИЦЫ `faculties`:
--   `univer_id`
--       `universities` -> `id`
--

--
-- Дамп данных таблицы `faculties`
--

INSERT INTO `faculties` (`id`, `univer_id`, `name`) VALUES
(2, 2, 'Факультет информационных и коммуникационных технологий'),
(3, 2, 'Факультет журналистики');

-- --------------------------------------------------------

--
-- Структура таблицы `organizations`
--

CREATE TABLE IF NOT EXISTS `organizations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `site` varchar(255) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `tel` varchar(100) DEFAULT NULL,
  `about` tinytext,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`city_id`,`user_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `icity_for_org` (`city_id`),
  KEY `iusers_to_org` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- СВЯЗИ ТАБЛИЦЫ `organizations`:
--   `city_id`
--       `cities` -> `id`
--   `user_id`
--       `users` -> `id`
--

--
-- Дамп данных таблицы `organizations`
--

INSERT INTO `organizations` (`id`, `city_id`, `user_id`, `name`, `address`, `site`, `email`, `tel`, `about`, `image`) VALUES
(8, 3, 3, 'New Org', 'Asdfsdf d 232', 'www.gfh.sdf', 'sdfgsf@sg.d', '34234234', 'About org!', 'http://testing/css/img/no_img.gif');

-- --------------------------------------------------------

--
-- Структура таблицы `org_employers`
--

CREATE TABLE IF NOT EXISTS `org_employers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(11) NOT NULL,
  `fio` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `tel` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`,`org_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `iorg_for_employee` (`org_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- СВЯЗИ ТАБЛИЦЫ `org_employers`:
--   `org_id`
--       `organizations` -> `id`
--

--
-- Дамп данных таблицы `org_employers`
--

INSERT INTO `org_employers` (`id`, `org_id`, `fio`, `address`, `date`, `email`, `tel`) VALUES
(7, 8, 'Иванов Иван Иванович', 'Asdasdas 324', '2013-04-18', 'asdf@dg.fgh', '234234234');

-- --------------------------------------------------------

--
-- Структура таблицы `org_results`
--

CREATE TABLE IF NOT EXISTS `org_results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `result` smallint(6) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time_min` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`,`test_id`,`employee_id`,`org_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `itests_for_results` (`test_id`),
  KEY `iemployee_result` (`employee_id`),
  KEY `result_to_org` (`org_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- СВЯЗИ ТАБЛИЦЫ `org_results`:
--   `employee_id`
--       `org_employers` -> `id`
--   `test_id`
--       `org_test_name` -> `id`
--   `org_id`
--       `organizations` -> `id`
--

-- --------------------------------------------------------

--
-- Структура таблицы `org_tests`
--

CREATE TABLE IF NOT EXISTS `org_tests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `question` tinytext,
  `answer` varchar(255) DEFAULT NULL,
  `time_sec` smallint(6) DEFAULT NULL,
  `var1` varchar(255) DEFAULT NULL,
  `var2` varchar(255) DEFAULT NULL,
  `var3` varchar(255) DEFAULT NULL,
  `var4` varchar(255) DEFAULT NULL,
  `var5` varchar(255) DEFAULT NULL,
  `var6` varchar(255) DEFAULT NULL,
  `var7` varchar(255) DEFAULT NULL,
  `var8` varchar(255) DEFAULT NULL,
  `var9` varchar(255) DEFAULT NULL,
  `var10` varchar(255) DEFAULT NULL,
  `var11` varchar(255) DEFAULT NULL,
  `var12` varchar(255) DEFAULT NULL,
  `var13` varchar(255) DEFAULT NULL,
  `var14` varchar(255) DEFAULT NULL,
  `var15` varchar(255) DEFAULT NULL,
  `var16` varchar(255) DEFAULT NULL,
  `var17` varchar(255) DEFAULT NULL,
  `var18` varchar(255) DEFAULT NULL,
  `var19` varchar(255) DEFAULT NULL,
  `var20` varchar(255) DEFAULT NULL,
  `var21` varchar(255) DEFAULT NULL,
  `var22` varchar(255) DEFAULT NULL,
  `var23` varchar(255) DEFAULT NULL,
  `var24` varchar(255) DEFAULT NULL,
  `var25` varchar(255) DEFAULT NULL,
  `var26` varchar(255) DEFAULT NULL,
  `var27` varchar(255) DEFAULT NULL,
  `var28` varchar(255) DEFAULT NULL,
  `var29` varchar(255) DEFAULT NULL,
  `var30` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`test_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `org_test_name` (`test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- СВЯЗИ ТАБЛИЦЫ `org_tests`:
--   `test_id`
--       `org_test_name` -> `id`
--

--
-- Дамп данных таблицы `org_tests`
--

INSERT INTO `org_tests` (`id`, `test_id`, `question`, `answer`, `time_sec`, `var1`, `var2`, `var3`, `var4`, `var5`, `var6`, `var7`, `var8`, `var9`, `var10`, `var11`, `var12`, `var13`, `var14`, `var15`, `var16`, `var17`, `var18`, `var19`, `var20`, `var21`, `var22`, `var23`, `var24`, `var25`, `var26`, `var27`, `var28`, `var29`, `var30`) VALUES
(2, 2, 'A!', 'A!', NULL, 'A!', 'B!', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 2, 'T!', 'T!', NULL, 'N!', 'T!', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `org_test_name`
--

CREATE TABLE IF NOT EXISTS `org_test_name` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `theme_id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` tinytext,
  `time_min` smallint(6) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `results` smallint(6) NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`id`,`user_id`,`country_id`,`city_id`,`theme_id`,`org_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `iuser_for_org` (`user_id`),
  KEY `itheme_to_city` (`city_id`),
  KEY `itheme_to_country` (`country_id`),
  KEY `itheme_for_org` (`theme_id`),
  KEY `org_test_name_ibfk_1` (`org_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- СВЯЗИ ТАБЛИЦЫ `org_test_name`:
--   `theme_id`
--       `org_themes` -> `id`
--   `city_id`
--       `cities` -> `id`
--   `country_id`
--       `countries` -> `id`
--   `user_id`
--       `users` -> `id`
--   `org_id`
--       `organizations` -> `id`
--

--
-- Дамп данных таблицы `org_test_name`
--

INSERT INTO `org_test_name` (`id`, `user_id`, `country_id`, `city_id`, `theme_id`, `org_id`, `name`, `description`, `time_min`, `rating`, `date`, `quantity`, `results`, `count`) VALUES
(2, 3, 2, 2, 2, 8, 'Adfsdafsdf ', 'sdfsdf ', 2, 0, '2013-04-18', 2, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `org_themes`
--

CREATE TABLE IF NOT EXISTS `org_themes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `themes` varchar(255) DEFAULT NULL,
  `description` tinytext,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `themes_UNIQUE` (`themes`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `org_themes`
--

INSERT INTO `org_themes` (`id`, `themes`, `description`) VALUES
(2, 'asdasd', 'asdasd');

-- --------------------------------------------------------

--
-- Структура таблицы `pupils`
--

CREATE TABLE IF NOT EXISTS `pupils` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `fio` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `tel` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`,`city_id`,`school_id`,`class_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `iclass` (`class_id`),
  KEY `ischool_to_pupil` (`school_id`),
  KEY `icity_to_pupil` (`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- СВЯЗИ ТАБЛИЦЫ `pupils`:
--   `city_id`
--       `cities` -> `id`
--   `class_id`
--       `school_classes` -> `id`
--   `school_id`
--       `schools` -> `id`
--

-- --------------------------------------------------------

--
-- Структура таблицы `schools`
--

CREATE TABLE IF NOT EXISTS `schools` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `about` tinytext,
  `tel` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `site` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`city_id`,`user_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `icountry_for_school` (`city_id`),
  KEY `iuser_to_schools` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- СВЯЗИ ТАБЛИЦЫ `schools`:
--   `city_id`
--       `cities` -> `id`
--   `user_id`
--       `users` -> `id`
--

-- --------------------------------------------------------

--
-- Структура таблицы `school_classes`
--

CREATE TABLE IF NOT EXISTS `school_classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `school_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`,`school_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `ischool` (`school_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- СВЯЗИ ТАБЛИЦЫ `school_classes`:
--   `school_id`
--       `schools` -> `id`
--

-- --------------------------------------------------------

--
-- Структура таблицы `school_lessons`
--

CREATE TABLE IF NOT EXISTS `school_lessons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`class_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `iclass_for_lesson` (`class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- СВЯЗИ ТАБЛИЦЫ `school_lessons`:
--   `class_id`
--       `school_classes` -> `id`
--

-- --------------------------------------------------------

--
-- Структура таблицы `school_results`
--

CREATE TABLE IF NOT EXISTS `school_results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `pupil_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `result` smallint(6) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time_min` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`,`test_id`,`pupil_id`,`school_id`,`class_id`,`lesson_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `itest_for_school` (`test_id`),
  KEY `ipupil_result` (`pupil_id`),
  KEY `result_to_schools` (`school_id`),
  KEY `results_to_class` (`class_id`),
  KEY `results_to_lesseons` (`lesson_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- СВЯЗИ ТАБЛИЦЫ `school_results`:
--   `pupil_id`
--       `pupils` -> `id`
--   `test_id`
--       `school_test_name` -> `id`
--   `class_id`
--       `school_classes` -> `id`
--   `lesson_id`
--       `school_lessons` -> `id`
--   `school_id`
--       `schools` -> `id`
--
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru" dir="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="icon" href="./favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon" />
    <title>phpMyAdmin</title>
    <link rel="stylesheet" type="text/css" href="phpmyadmin.css.php?server=1&amp;token=f636eebeb84df889689d015de83827b2&amp;js_frame=right&amp;nocache=5451950900" />
    <link rel="stylesheet" type="text/css" href="print.css" media="print" />
    <link rel="stylesheet" type="text/css" href="./themes/pmahomme/jquery/jquery-ui-1.8.16.custom.css" />
    <meta name="robots" content="noindex,nofollow" />
<script src="./js/cross_framing_protection.js?ts=1359376848" type="text/javascript"></script>
<script src="./js/jquery/jquery-1.6.2.js?ts=1359376848" type="text/javascript"></script>
<script src="./js/jquery/jquery-ui-1.8.16.custom.js?ts=1359376848" type="text/javascript"></script>
<script src="./js/update-location.js?ts=1359376848" type="text/javascript"></script>
<script src="./js/functions.js?ts=1359376848" type="text/javascript"></script>
<script src="./js/jquery/jquery.qtip-1.0.0-rc3.js?ts=1359376848" type="text/javascript"></script>
<script src="./js/messages.php?lang=ru&amp;db=testing&amp;token=f636eebeb84df889689d015de83827b2" type="text/javascript"></script>
<script src="./js/get_image.js.php?theme=pmahomme" type="text/javascript"></script>
<script type="text/javascript">
// <![CDATA[
if (typeof(parent.document) != 'undefined' && typeof(parent.document) != 'unknown'
    && typeof(parent.document.title) == 'string') {
    parent.document.title = 'localhost / 127.0.0.1 / testing / school_tests | phpMyAdmin 3.5.6';
}
// ]]>
</script>
        <meta name="OBGZip" content="true" />
                <!--[if IE 6]>
        <style type="text/css">
        /* <![CDATA[ */
        html {
            overflow-y: scroll;
        }
        /* ]]> */
        </style>
        <![endif]-->
    </head>

    <body>
        <div id='floating_menubar'></div>
<div id='serverinfo'>
<img src="themes/dot.gif" title="" alt="" class="icon ic_s_host item" />
<a href="main.php?token=f636eebeb84df889689d015de83827b2" class="item">127.0.0.1:3306</a>
<span class='separator item'>&nbsp;»</span>
<img src="themes/dot.gif" title="" alt="" class="icon ic_s_db item" />
<a href="db_structure.php?db=testing&amp;token=f636eebeb84df889689d015de83827b2" class="item">testing</a>
<span class='separator item'>&nbsp;»</span>
<img src="themes/dot.gif" title="" alt="" class="icon ic_s_tbl item" />
<a href="sql.php?db=testing&amp;table=school_tests&amp;token=f636eebeb84df889689d015de83827b2" class="item">school_tests</a>
<div class="error">Не удалось сохранить последнюю таблицу <br /><br /> #1053 - Server shutdown in progress</div><div class="clearfloat"></div></div>
<!-- PMA-SQL-ERROR -->
    <div class="error"><h1>Ошибка</h1>
    <p><strong>SQL-запрос:</strong>
<a href="tbl_sql.php?sql_query=SHOW+TABLE+STATUS+FROM+%60testing%60+LIKE+%27school_tests%27&amp;show_query=1&amp;db=testing&amp;table=school_tests&amp;token=f636eebeb84df889689d015de83827b2"><span class="nowrap"><img src="themes/dot.gif" title="Изменить" alt="Изменить" class="icon ic_b_edit" /></span></a>    </p>
    <p>
        <span class="syntax"><span class="inner_sql"><a href="./url.php?url=http%3A%2F%2Fdev.mysql.com%2Fdoc%2Frefman%2F5.5%2Fen%2Fshow.html&amp;token=f636eebeb84df889689d015de83827b2" target="mysql_doc"><span class="syntax_alpha syntax_alpha_reservedWord">SHOW</span></a>  <span class="syntax_alpha syntax_alpha_reservedWord">TABLE</span>  <span class="syntax_alpha syntax_alpha_reservedWord">STATUS</span>  <span class="syntax_alpha syntax_alpha_reservedWord">FROM</span>  <span class="syntax_quote syntax_quote_backtick">`testing`</span>  <a href="./url.php?url=http%3A%2F%2Fdev.mysql.com%2Fdoc%2Frefman%2F5.5%2Fen%2Fstring-comparison-functions.html%23operator_like&amp;token=f636eebeb84df889689d015de83827b2" target="mysql_doc"><span class="syntax_alpha syntax_alpha_reservedWord">LIKE</span></a>  <span class="syntax_quote syntax_quote_single">'school_tests'</span></span></span>
    </p>
<p>
    <strong>Ответ MySQL: </strong><a href="./url.php?url=http%3A%2F%2Fdev.mysql.com%2Fdoc%2Frefman%2F5.5%2Fen%2Ferror-messages-server.html&amp;token=f636eebeb84df889689d015de83827b2" target="mysql_doc"><img src="themes/dot.gif" title="Документация" alt="Документация" class="icon ic_b_help" /></a>
</p>
<code>
#2006 - MySQL server has gone away
</code><br />
</div><script type="text/javascript">
//<![CDATA[
$(document).ready(function() {
// updates current settings
if (window.parent.setAll) {
    window.parent.setAll('ru', 'utf8_general_ci', '1', 'testing', 'school_tests', 'f636eebeb84df889689d015de83827b2');
}
    // set current db, table and sql query in the querywindow
if (window.parent.reload_querywindow) {
    window.parent.reload_querywindow(
        'testing',
        'school_tests',
        '');
}
    
if (window.parent.frame_content) {
    // reset content frame name, as querywindow needs to set a unique name
    // before submitting form data, and navigation frame needs the original name
    if (typeof(window.parent.frame_content.name) != 'undefined'
     && window.parent.frame_content.name != 'frame_content') {
        window.parent.frame_content.name = 'frame_content';
    }
    if (typeof(window.parent.frame_content.id) != 'undefined'
     && window.parent.frame_content.id != 'frame_content') {
        window.parent.frame_content.id = 'frame_content';
    }
    //window.parent.frame_content.setAttribute('name', 'frame_content');
    //window.parent.frame_content.setAttribute('id', 'frame_content');
}
});

//]]>
</script>
</body>
</html>
