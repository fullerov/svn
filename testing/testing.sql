-- phpMyAdmin SQL Dump
-- version 3.5.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 06 2013 г., 09:20
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

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
(3, 2, 'T!', 'T!', NULL, 'N!', 'T!', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 2, 'fghdfg', 'dfgdf', NULL, 'fdg', 'dfgdfg', 'dfgdfg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(2, 3, 2, 2, 2, 8, 'Adfsdafsdf ', 'sdfsdf ', 2, 0, '2013-04-18', 3, 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- СВЯЗИ ТАБЛИЦЫ `schools`:
--   `city_id`
--       `cities` -> `id`
--   `user_id`
--       `users` -> `id`
--

--
-- Дамп данных таблицы `schools`
--

INSERT INTO `schools` (`id`, `city_id`, `user_id`, `name`, `address`, `about`, `tel`, `email`, `site`, `image`) VALUES
(2, 1, 5, 'Adasdasd', 'Aafdsfsd f324 3', 'asdasd', '234234', 'sdf@sdf.dfg', 'asdasfd.dfg', 'http://testing/css/img/no_img.gif');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- СВЯЗИ ТАБЛИЦЫ `school_classes`:
--   `school_id`
--       `schools` -> `id`
--

--
-- Дамп данных таблицы `school_classes`
--

INSERT INTO `school_classes` (`id`, `school_id`, `name`) VALUES
(2, 2, '1 А'),
(3, 2, '1 Б '),
(4, 2, '2 А'),
(5, 2, '2 Б'),
(6, 2, '1 А'),
(7, 2, '1 А'),
(8, 2, '1 А'),
(9, 2, '1 А'),
(10, 2, '1 А'),
(11, 2, '1 А'),
(12, 2, '1 А');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- СВЯЗИ ТАБЛИЦЫ `school_lessons`:
--   `class_id`
--       `school_classes` -> `id`
--

--
-- Дамп данных таблицы `school_lessons`
--

INSERT INTO `school_lessons` (`id`, `class_id`, `name`) VALUES
(2, 2, 'Математика'),
(3, 2, 'Русский язык');

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

-- --------------------------------------------------------

--
-- Структура таблицы `school_tests`
--

CREATE TABLE IF NOT EXISTS `school_tests` (
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
  KEY `itest_name_for_school` (`test_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- СВЯЗИ ТАБЛИЦЫ `school_tests`:
--   `test_id`
--       `school_test_name` -> `id`
--

-- --------------------------------------------------------

--
-- Структура таблицы `school_test_name`
--

CREATE TABLE IF NOT EXISTS `school_test_name` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` tinytext,
  `time_min` smallint(6) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `results` smallint(6) NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`id`,`user_id`,`country_id`,`city_id`,`school_id`,`class_id`,`lesson_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `iuser_for_school` (`user_id`),
  KEY `ilesson_for_school` (`lesson_id`),
  KEY `ilesson_to_school` (`school_id`),
  KEY `ilesson_to_city` (`city_id`),
  KEY `ilesson_to_country` (`country_id`),
  KEY `ilesson_to_class` (`class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- СВЯЗИ ТАБЛИЦЫ `school_test_name`:
--   `lesson_id`
--       `school_lessons` -> `id`
--   `city_id`
--       `cities` -> `id`
--   `class_id`
--       `school_classes` -> `id`
--   `country_id`
--       `countries` -> `id`
--   `school_id`
--       `schools` -> `id`
--   `user_id`
--       `users` -> `id`
--

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `host` varchar(255) DEFAULT NULL,
  `database` varchar(255) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `INT1_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_id` int(11) NOT NULL,
  `university_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `specialty_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `fio` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `tel` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`,`city_id`,`university_id`,`group_id`,`course_id`,`specialty_id`,`faculty_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `igroup_for_student` (`group_id`),
  KEY `icity_for_students` (`city_id`),
  KEY `iuniversity_to_student` (`university_id`),
  KEY `icourse_to_student` (`course_id`),
  KEY `ispec_to_student` (`specialty_id`),
  KEY `istud_to_faculty` (`faculty_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- СВЯЗИ ТАБЛИЦЫ `students`:
--   `city_id`
--       `cities` -> `id`
--   `course_id`
--       `university_courses` -> `id`
--   `group_id`
--       `university_groups` -> `id`
--   `specialty_id`
--       `univer_specialty` -> `id`
--   `faculty_id`
--       `faculties` -> `id`
--   `university_id`
--       `universities` -> `id`
--

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`id`, `city_id`, `university_id`, `group_id`, `course_id`, `specialty_id`, `faculty_id`, `fio`, `date`, `address`, `email`, `tel`) VALUES
(2, 1, 2, 4, 102, 99, 2, 'Студентов Студент Студентович', '2013-04-27', 'Asadsad 34', 'wer@sf.vb', '4234324666'),
(3, 1, 2, 4, 101, 99, 2, 'student', '2013-05-07', 'ASdasdas da423', 'student@student.xdf', '234234');

-- --------------------------------------------------------

--
-- Структура таблицы `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idtypes_UNIQUE` (`id`),
  UNIQUE KEY `type_UNIQUE` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `types`
--

INSERT INTO `types` (`id`, `name`) VALUES
(6, 'chief'),
(3, 'pupil'),
(2, 'student'),
(4, 'teacher'),
(1, 'user'),
(5, 'worker');

-- --------------------------------------------------------

--
-- Структура таблицы `universities`
--

CREATE TABLE IF NOT EXISTS `universities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `tel` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `site` varchar(255) DEFAULT NULL,
  `about` tinytext,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`city_id`,`user_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `icity_for_university` (`city_id`),
  KEY `iusers_to_univers` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- СВЯЗИ ТАБЛИЦЫ `universities`:
--   `city_id`
--       `cities` -> `id`
--   `user_id`
--       `users` -> `id`
--

--
-- Дамп данных таблицы `universities`
--

INSERT INTO `universities` (`id`, `city_id`, `user_id`, `name`, `address`, `tel`, `email`, `site`, `about`, `image`) VALUES
(2, 1, 5, 'Кыргызский Национальный Университет', 'Фрунзе 53', '234234234', 'info@university.kg', 'www.university.kg', 'КНУ им. Ж.Баласагына', 'http://testing/css/img/no_img.gif');

-- --------------------------------------------------------

--
-- Структура таблицы `university_courses`
--

CREATE TABLE IF NOT EXISTS `university_courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_id` int(11) NOT NULL,
  `course` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`,`faculty_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `ifaculty` (`faculty_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=112 ;

--
-- СВЯЗИ ТАБЛИЦЫ `university_courses`:
--   `faculty_id`
--       `faculties` -> `id`
--

--
-- Дамп данных таблицы `university_courses`
--

INSERT INTO `university_courses` (`id`, `faculty_id`, `course`) VALUES
(101, 2, 1),
(102, 2, 2),
(103, 2, 3),
(104, 2, 4),
(107, 3, 1),
(108, 3, 2),
(109, 3, 3),
(110, 3, 4),
(111, 2, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `university_groups`
--

CREATE TABLE IF NOT EXISTS `university_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `specialty_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `year` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id`,`specialty_id`,`course_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `ispecialty_students` (`specialty_id`),
  KEY `icourse_for_groups` (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- СВЯЗИ ТАБЛИЦЫ `university_groups`:
--   `course_id`
--       `university_courses` -> `id`
--   `specialty_id`
--       `univer_specialty` -> `id`
--

--
-- Дамп данных таблицы `university_groups`
--

INSERT INTO `university_groups` (`id`, `specialty_id`, `course_id`, `name`, `year`) VALUES
(3, 103, 107, 'ПИ 1-09', '2009'),
(4, 99, 102, 'ПИ 1-2-10', '2010');

-- --------------------------------------------------------

--
-- Структура таблицы `university_lessons`
--

CREATE TABLE IF NOT EXISTS `university_lessons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`group_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `igroup_for_lesson` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- СВЯЗИ ТАБЛИЦЫ `university_lessons`:
--   `group_id`
--       `university_groups` -> `id`
--

--
-- Дамп данных таблицы `university_lessons`
--

INSERT INTO `university_lessons` (`id`, `group_id`, `name`) VALUES
(1, 3, 'qweqwe'),
(2, 4, 'Математика');

-- --------------------------------------------------------

--
-- Структура таблицы `university_results`
--

CREATE TABLE IF NOT EXISTS `university_results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `univer_id` int(11) NOT NULL,
  `specialty_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `result` smallint(6) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time_min` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`,`test_id`,`student_id`,`univer_id`,`specialty_id`,`course_id`,`group_id`,`faculty_id`),
  UNIQUE KEY `iduniversity_results_UNIQUE` (`id`),
  KEY `itest_university` (`test_id`),
  KEY `istudent_result` (`student_id`),
  KEY `iunivers_to_results` (`univer_id`),
  KEY `spec_to_results` (`specialty_id`),
  KEY `course_to_results` (`course_id`),
  KEY `group_to_results` (`group_id`),
  KEY `ifac_to_results` (`faculty_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- СВЯЗИ ТАБЛИЦЫ `university_results`:
--   `course_id`
--       `university_courses` -> `id`
--   `group_id`
--       `university_groups` -> `id`
--   `faculty_id`
--       `faculties` -> `id`
--   `student_id`
--       `students` -> `id`
--   `test_id`
--       `university_test_name` -> `id`
--   `univer_id`
--       `universities` -> `id`
--   `specialty_id`
--       `univer_specialty` -> `id`
--

--
-- Дамп данных таблицы `university_results`
--

INSERT INTO `university_results` (`id`, `test_id`, `student_id`, `univer_id`, `specialty_id`, `course_id`, `group_id`, `faculty_id`, `result`, `date`, `time_min`) VALUES
(2, 2, 2, 2, 99, 102, 4, 2, 66, '2013-04-29', 0),
(3, 2, 3, 2, 99, 101, 4, 2, 0, '2013-05-01', 0),
(4, 3, 3, 2, 99, 101, 4, 2, 0, '2013-05-02', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `university_tests`
--

CREATE TABLE IF NOT EXISTS `university_tests` (
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
  KEY `iuniversity_test_name` (`test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- СВЯЗИ ТАБЛИЦЫ `university_tests`:
--   `test_id`
--       `university_test_name` -> `id`
--

--
-- Дамп данных таблицы `university_tests`
--

INSERT INTO `university_tests` (`id`, `test_id`, `question`, `answer`, `time_sec`, `var1`, `var2`, `var3`, `var4`, `var5`, `var6`, `var7`, `var8`, `var9`, `var10`, `var11`, `var12`, `var13`, `var14`, `var15`, `var16`, `var17`, `var18`, `var19`, `var20`, `var21`, `var22`, `var23`, `var24`, `var25`, `var26`, `var27`, `var28`, `var29`, `var30`) VALUES
(2, 2, '55-155=', '-100', NULL, '-55', '-100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 2, '8*-1=', '-8', NULL, '-1', '-8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 2, '5*1000=', '5000', NULL, '500', '5000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 3, 'fghfgh', 'fghfg', NULL, 'fgh', 'fghfgh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 3, 'fghfgh', 'fghfg', NULL, 'fgh', 'fghfgh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 3, 'hgh', 'fgh', NULL, 'fg', 'gf', 'hfgh', 'hfg', 'h', 'fgh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 3, 'hgh', 'fgh', NULL, 'fg', 'gf', 'hfgh', 'hfg', 'h', 'fgh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 3, 'hgh', 'fgh', NULL, 'fg', 'gf', 'hfgh', 'hfg', 'h', 'fgh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 3, 'sdfgdsgsdgf', 'sdfsdf', NULL, 'sdf', 'fdsfdsf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `university_test_name`
--

CREATE TABLE IF NOT EXISTS `university_test_name` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `university_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `specialty_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` tinytext,
  `time_min` smallint(6) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `results` smallint(6) NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`id`,`user_id`,`country_id`,`city_id`,`university_id`,`faculty_id`,`specialty_id`,`course_id`,`group_id`,`lesson_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `ilessons_for_students` (`lesson_id`),
  KEY `iuser_for_university` (`user_id`),
  KEY `iuser_to_country` (`country_id`),
  KEY `iuser_to_city` (`city_id`),
  KEY `iuser_to_univer` (`university_id`),
  KEY `iuser_to_faculty` (`faculty_id`),
  KEY `iuser_to_spec` (`specialty_id`),
  KEY `iuser_to_course` (`course_id`),
  KEY `iuser_to_group` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- СВЯЗИ ТАБЛИЦЫ `university_test_name`:
--   `lesson_id`
--       `university_lessons` -> `id`
--   `user_id`
--       `users` -> `id`
--   `city_id`
--       `cities` -> `id`
--   `country_id`
--       `countries` -> `id`
--   `course_id`
--       `university_courses` -> `id`
--   `faculty_id`
--       `faculties` -> `id`
--   `group_id`
--       `university_groups` -> `id`
--   `specialty_id`
--       `univer_specialty` -> `id`
--   `university_id`
--       `universities` -> `id`
--

--
-- Дамп данных таблицы `university_test_name`
--

INSERT INTO `university_test_name` (`id`, `user_id`, `country_id`, `city_id`, `university_id`, `faculty_id`, `specialty_id`, `course_id`, `group_id`, `lesson_id`, `name`, `description`, `time_min`, `rating`, `date`, `quantity`, `results`, `count`) VALUES
(2, 5, 2, 1, 2, 2, 99, 101, 4, 2, 'Арифметический тест', 'Тестовый арифметический тест', 2, 0, '2013-04-29', 3, 0, 0),
(3, 5, 2, 1, 2, 2, 99, 101, 4, 2, 'Ыываыва', 'ываыва', 2, 0, '2013-04-29', 6, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `univer_specialty`
--

CREATE TABLE IF NOT EXISTS `univer_specialty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`faculty_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `ifaculty_for_spec` (`faculty_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=104 ;

--
-- СВЯЗИ ТАБЛИЦЫ `univer_specialty`:
--   `faculty_id`
--       `faculties` -> `id`
--

--
-- Дамп данных таблицы `univer_specialty`
--

INSERT INTO `univer_specialty` (`id`, `faculty_id`, `name`) VALUES
(99, 2, 'Прикладная информатика'),
(100, 2, ' Информационные системы'),
(101, 2, ' Программная инженерия'),
(102, 3, 'Издательское дело'),
(103, 3, ' Периодические издания');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fio` varchar(255) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `tel` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `about` tinytext,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`country_id`,`city_id`,`type_id`),
  UNIQUE KEY `INT8_UNIQUE` (`id`),
  UNIQUE KEY `LONG VARCHAR_UNIQUE` (`login`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `icountry` (`country_id`),
  KEY `icity` (`city_id`),
  KEY `utype` (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- СВЯЗИ ТАБЛИЦЫ `users`:
--   `city_id`
--       `cities` -> `id`
--   `country_id`
--       `countries` -> `id`
--   `type_id`
--       `types` -> `id`
--

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `country_id`, `city_id`, `type_id`, `login`, `password`, `fio`, `email`, `tel`, `address`, `date`, `birthdate`, `about`, `image`) VALUES
(2, 1, 1, 1, 'user', 'w1Eyv54zQugeM', 'user user user', 'user@user.us', '435345345', 'ASDFsdfsdf 453', '2013-04-13', '1990-12-12', 'Биогрфии нет...', '/css/img/no_avatar.jpg'),
(3, 2, 2, 6, 'chief', 'w1XKwqdt5LMlw', 'chief chief chief', 'chief@chief.ch', '3453454335', 'Afasdfdf  3434', '2013-04-13', '0090-11-11', 'Биогрфии нет...', '/css/img/no_avatar.jpg'),
(4, 1, 1, 5, 'worker', 'w1PRQHIdbH1LM', 'worker', 'worker@worker.sd', '3434234234', 'Asdadasdas', '2013-04-14', '0099-12-12', 'Биогрфии нет...', '/css/img/no_avatar.jpg'),
(5, 2, 2, 4, 'teacher', 'w1ws.ehgdaVIs', 'teacher', 'teacher@teacher.ss', '324234234', 'Asaedwqe 242', '2013-04-15', '1970-12-16', 'Биогрфии нет...', '/css/img/no_avatar.jpg'),
(6, 1, 1, 2, 'student', 'w173Cs1.X2ZOU', 'student', 'student@student.xdf', '234234', 'ASdasdas da423', '2013-04-17', '1986-04-15', 'Биогрфии нет...', '/css/img/no_avatar.jpg'),
(7, 1, 3, 1, 'fdgdf', 'w1XJfzi4Z9TAU', 'gh', 'sdfsd@sdf.dfgh', '4534534', '534534', '2013-04-17', '2013-04-05', 'Биогрфии нет...', '/css/img/no_avatar.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `user_tests`
--

CREATE TABLE IF NOT EXISTS `user_tests` (
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
  KEY `iuser_test_name` (`test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- СВЯЗИ ТАБЛИЦЫ `user_tests`:
--   `test_id`
--       `user_test_name` -> `id`
--

--
-- Дамп данных таблицы `user_tests`
--

INSERT INTO `user_tests` (`id`, `test_id`, `question`, `answer`, `time_sec`, `var1`, `var2`, `var3`, `var4`, `var5`, `var6`, `var7`, `var8`, `var9`, `var10`, `var11`, `var12`, `var13`, `var14`, `var15`, `var16`, `var17`, `var18`, `var19`, `var20`, `var21`, `var22`, `var23`, `var24`, `var25`, `var26`, `var27`, `var28`, `var29`, `var30`) VALUES
(2, 2, 'a', 'a', NULL, 'as', 'a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 2, 's', 's', NULL, 'd', 's', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 3, '2-4=', '-2', NULL, '2', '3', '-2', '-3', '-4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 3, '5+5=', '10', NULL, '9', '8', '10', '8', '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 3, '8*2=', '16', NULL, '12', '18', '16', '14', '24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 3, '5*5=', '25', NULL, '26', '50', '25', '20', '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 3, '8-7=', '1', NULL, '1', '2', '3', '4', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 3, '7*7=', '49', NULL, '46', '52', '48', '49', '51', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 3, 'x=2-3\r\nx=', '-1', NULL, '1', '-1', '', '2', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 3, '8-4=', '4', NULL, '3', '7', '6', '5', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 3, '9-1=', '8', NULL, '10', '9', '8', '7', '11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 3, '10+100=', '110', NULL, '120', '100', '110', '90', '80', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 4, 'Ыывпывапвап вапр ва пва прп оо ап ропрвар варр?', '09', NULL, '09', '563453', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 4, 'Ыварвп про апуе  оапоаро вар ава рфцуке ыараправ ркен вр?', '654', NULL, '654', '54645', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 4, 'sdgvfdgvsd', 'fsdf', NULL, 'sdfsd', 'fsdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `user_test_name`
--

CREATE TABLE IF NOT EXISTS `user_test_name` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `theme_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` tinytext,
  `time_min` smallint(6) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `results` smallint(6) DEFAULT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`id`,`user_id`,`country_id`,`city_id`,`theme_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `iuser_themes` (`theme_id`),
  KEY `iuser_to_count` (`country_id`),
  KEY `iuser_to_cities` (`city_id`),
  KEY `iuser_for_user_tests` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- СВЯЗИ ТАБЛИЦЫ `user_test_name`:
--   `user_id`
--       `users` -> `id`
--   `theme_id`
--       `user_themes` -> `id`
--   `city_id`
--       `cities` -> `id`
--   `country_id`
--       `countries` -> `id`
--

--
-- Дамп данных таблицы `user_test_name`
--

INSERT INTO `user_test_name` (`id`, `user_id`, `country_id`, `city_id`, `theme_id`, `name`, `description`, `time_min`, `rating`, `date`, `quantity`, `results`, `count`) VALUES
(2, 2, 1, 1, 2, 'New test', 'fgdfgdfg', 2, NULL, '2013-04-18', 2, NULL, 0),
(3, 4, 1, 1, 3, 'Math test', 'Test mathematics', 5, NULL, '2013-04-19', 10, NULL, 0),
(4, 5, 2, 2, 2, 'Ффывфыв', 'фывфвфывфы', 2, NULL, '2013-04-29', 3, NULL, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `user_themes`
--

CREATE TABLE IF NOT EXISTS `user_themes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` tinytext,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `themes_UNIQUE` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `user_themes`
--

INSERT INTO `user_themes` (`id`, `name`, `description`) VALUES
(2, 'new theme', 'great'),
(3, 'math', 'math');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `iuser` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `icountry_for_city` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `comments_for_articles`
--
ALTER TABLE `comments_for_articles`
  ADD CONSTRAINT `icomments` FOREIGN KEY (`post_id`) REFERENCES `articles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `faculties`
--
ALTER TABLE `faculties`
  ADD CONSTRAINT `iuniversity` FOREIGN KEY (`univer_id`) REFERENCES `universities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `organizations`
--
ALTER TABLE `organizations`
  ADD CONSTRAINT `icity_for_org` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `iusers_to_org` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `org_employers`
--
ALTER TABLE `org_employers`
  ADD CONSTRAINT `iorg_for_employee` FOREIGN KEY (`org_id`) REFERENCES `organizations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `org_results`
--
ALTER TABLE `org_results`
  ADD CONSTRAINT `iemployee_result` FOREIGN KEY (`employee_id`) REFERENCES `org_employers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `itests_for_results` FOREIGN KEY (`test_id`) REFERENCES `org_test_name` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `result_to_org` FOREIGN KEY (`org_id`) REFERENCES `organizations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `org_tests`
--
ALTER TABLE `org_tests`
  ADD CONSTRAINT `org_test_name` FOREIGN KEY (`test_id`) REFERENCES `org_test_name` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `org_test_name`
--
ALTER TABLE `org_test_name`
  ADD CONSTRAINT `itheme_for_org` FOREIGN KEY (`theme_id`) REFERENCES `org_themes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `itheme_to_city` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `itheme_to_country` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `iuser_for_org` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `org_test_name_ibfk_1` FOREIGN KEY (`org_id`) REFERENCES `organizations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `pupils`
--
ALTER TABLE `pupils`
  ADD CONSTRAINT `icity_to_pupil` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `iclass` FOREIGN KEY (`class_id`) REFERENCES `school_classes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ischool_to_pupil` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `schools`
--
ALTER TABLE `schools`
  ADD CONSTRAINT `icountry_for_school` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `iuser_to_schools` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `school_classes`
--
ALTER TABLE `school_classes`
  ADD CONSTRAINT `ischool` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `school_lessons`
--
ALTER TABLE `school_lessons`
  ADD CONSTRAINT `iclass_for_lesson` FOREIGN KEY (`class_id`) REFERENCES `school_classes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `school_results`
--
ALTER TABLE `school_results`
  ADD CONSTRAINT `ipupil_result` FOREIGN KEY (`pupil_id`) REFERENCES `pupils` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `itest_for_school` FOREIGN KEY (`test_id`) REFERENCES `school_test_name` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `results_to_class` FOREIGN KEY (`class_id`) REFERENCES `school_classes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `results_to_lesseons` FOREIGN KEY (`lesson_id`) REFERENCES `school_lessons` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `result_to_schools` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `school_tests`
--
ALTER TABLE `school_tests`
  ADD CONSTRAINT `itest_name_for_school` FOREIGN KEY (`test_id`) REFERENCES `school_test_name` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `school_test_name`
--
ALTER TABLE `school_test_name`
  ADD CONSTRAINT `ilesson_for_school` FOREIGN KEY (`lesson_id`) REFERENCES `school_lessons` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ilesson_to_city` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ilesson_to_class` FOREIGN KEY (`class_id`) REFERENCES `school_classes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ilesson_to_country` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ilesson_to_school` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `iuser_for_school` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `icity_for_students` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `icourse_to_student` FOREIGN KEY (`course_id`) REFERENCES `university_courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `igroup_for_student` FOREIGN KEY (`group_id`) REFERENCES `university_groups` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ispec_to_student` FOREIGN KEY (`specialty_id`) REFERENCES `univer_specialty` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `istud_to_faculty` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `iuniversity_to_student` FOREIGN KEY (`university_id`) REFERENCES `universities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `universities`
--
ALTER TABLE `universities`
  ADD CONSTRAINT `icity_for_university` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `iusers_to_univers` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `university_courses`
--
ALTER TABLE `university_courses`
  ADD CONSTRAINT `ifaculty` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `university_groups`
--
ALTER TABLE `university_groups`
  ADD CONSTRAINT `icourse_for_groups` FOREIGN KEY (`course_id`) REFERENCES `university_courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ispecialty_students` FOREIGN KEY (`specialty_id`) REFERENCES `univer_specialty` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `university_lessons`
--
ALTER TABLE `university_lessons`
  ADD CONSTRAINT `igroup_for_lesson` FOREIGN KEY (`group_id`) REFERENCES `university_groups` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `university_results`
--
ALTER TABLE `university_results`
  ADD CONSTRAINT `course_to_results` FOREIGN KEY (`course_id`) REFERENCES `university_courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `group_to_results` FOREIGN KEY (`group_id`) REFERENCES `university_groups` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ifac_to_results` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `istudent_result` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `itest_university` FOREIGN KEY (`test_id`) REFERENCES `university_test_name` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `iunivers_to_results` FOREIGN KEY (`univer_id`) REFERENCES `universities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `spec_to_results` FOREIGN KEY (`specialty_id`) REFERENCES `univer_specialty` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `university_tests`
--
ALTER TABLE `university_tests`
  ADD CONSTRAINT `iuniversity_test_name` FOREIGN KEY (`test_id`) REFERENCES `university_test_name` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `university_test_name`
--
ALTER TABLE `university_test_name`
  ADD CONSTRAINT `ilessons_for_students` FOREIGN KEY (`lesson_id`) REFERENCES `university_lessons` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `iuser_for_university` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `iuser_to_city` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `iuser_to_country` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `iuser_to_course` FOREIGN KEY (`course_id`) REFERENCES `university_courses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `iuser_to_faculty` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `iuser_to_group` FOREIGN KEY (`group_id`) REFERENCES `university_groups` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `iuser_to_spec` FOREIGN KEY (`specialty_id`) REFERENCES `univer_specialty` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `iuser_to_univer` FOREIGN KEY (`university_id`) REFERENCES `universities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `univer_specialty`
--
ALTER TABLE `univer_specialty`
  ADD CONSTRAINT `ifaculty_for_spec` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `icity` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `icountry` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `utype` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `user_tests`
--
ALTER TABLE `user_tests`
  ADD CONSTRAINT `iuser_test_name` FOREIGN KEY (`test_id`) REFERENCES `user_test_name` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `user_test_name`
--
ALTER TABLE `user_test_name`
  ADD CONSTRAINT `iuser_for_user_tests` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `iuser_themes` FOREIGN KEY (`theme_id`) REFERENCES `user_themes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `iuser_to_cities` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `iuser_to_count` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
