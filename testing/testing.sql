-- phpMyAdmin SQL Dump
-- version 3.5.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 13 2013 г., 19:16
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
(2, 3, 'Qwerty ', 'Qwerty ', 'qwerty, qwerty ', 'Qwerty qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty   qwerty  v', '2013-04-13', 'http://testing/css/img/no_img.gif', 0, 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

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
(2, 2, 'Moskow');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- СВЯЗИ ТАБЛИЦЫ `comments_for_articles`:
--   `post_id`
--       `articles` -> `id`
--

--
-- Дамп данных таблицы `comments_for_articles`
--

INSERT INTO `comments_for_articles` (`id`, `post_id`, `author`, `text`, `date`) VALUES
(2, 2, 'chief', 'QWe!', '2013-04-13');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- СВЯЗИ ТАБЛИЦЫ `faculties`:
--   `univer_id`
--       `universities` -> `id`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

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
(5, 1, 3, 'Qwewre', 'ASdfas das 23 ', 'www.gdfg.df', 'awe@rrsdf.dfg', '324234234', 'ASasdasdasd', 'http://testing/css/img/no_img.gif'),
(6, 2, 3, 'ASdasdas ', 'ASdasd 23423', 'www.asd.wd', 'asas@asdf.df', '3424324', 'sad asd asd asd', 'http://testing/css/img/no_img.gif'),
(7, 2, 3, 'Dfdsfsdfsd ', 'ASdfsasad as3 33', 'www.sdf.df', 'sdf@sdfg.sd', '45435435', 'sdf sdf sdf dsfsdf ', 'http://testing/css/img/no_img.gif');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- СВЯЗИ ТАБЛИЦЫ `org_employers`:
--   `org_id`
--       `organizations` -> `id`
--

--
-- Дамп данных таблицы `org_employers`
--

INSERT INTO `org_employers` (`id`, `org_id`, `fio`, `address`, `date`, `email`, `tel`) VALUES
(4, 5, 'Asd asd  asdf ', 'Awer wer 342', '2013-04-13', 'rwer@dfg.dd', '234234234');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- СВЯЗИ ТАБЛИЦЫ `org_tests`:
--   `test_id`
--       `org_test_name` -> `id`
--

--
-- Дамп данных таблицы `org_tests`
--

INSERT INTO `org_tests` (`id`, `test_id`, `question`, `answer`, `time_sec`, `var1`, `var2`, `var3`, `var4`, `var5`, `var6`, `var7`, `var8`, `var9`, `var10`, `var11`, `var12`, `var13`, `var14`, `var15`, `var16`, `var17`, `var18`, `var19`, `var20`, `var21`, `var22`, `var23`, `var24`, `var25`, `var26`, `var27`, `var28`, `var29`, `var30`) VALUES
(2, 2, '2', '2', NULL, '2', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 2, '5', '5', NULL, '6', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 2, '9', '9', NULL, '9', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 3, 'ASD', 'asd', NULL, 'asd', 'asdq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 3, 'asdq', 'asdq', NULL, 'asd', 'asdq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

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
(2, 3, 2, 2, 4, 7, 'ASd', 'Asdasd55', 25, 0, '2013-04-13', 3, 0, 0),
(3, 3, 2, 2, 5, 6, 'ASDfad ', 'AS asd', 2, 0, '2013-04-13', 2, 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `org_themes`
--

INSERT INTO `org_themes` (`id`, `themes`, `description`) VALUES
(2, 'Newtest', 'New about'),
(4, 'Math', 'Asfsdf'),
(5, 'Phys', 'sdf');

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
  `fio` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `tel` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`,`city_id`,`university_id`,`group_id`,`course_id`,`specialty_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `igroup_for_student` (`group_id`),
  KEY `icity_for_students` (`city_id`),
  KEY `iuniversity_to_student` (`university_id`),
  KEY `icourse_to_student` (`course_id`),
  KEY `ispec_to_student` (`specialty_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
--   `university_id`
--       `universities` -> `id`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- СВЯЗИ ТАБЛИЦЫ `universities`:
--   `city_id`
--       `cities` -> `id`
--   `user_id`
--       `users` -> `id`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- СВЯЗИ ТАБЛИЦЫ `university_courses`:
--   `faculty_id`
--       `faculties` -> `id`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- СВЯЗИ ТАБЛИЦЫ `university_groups`:
--   `course_id`
--       `university_courses` -> `id`
--   `specialty_id`
--       `univer_specialty` -> `id`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- СВЯЗИ ТАБЛИЦЫ `university_lessons`:
--   `group_id`
--       `university_groups` -> `id`
--

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
  `result` smallint(6) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time_min` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`,`test_id`,`student_id`,`univer_id`,`specialty_id`,`course_id`,`group_id`),
  UNIQUE KEY `iduniversity_results_UNIQUE` (`id`),
  KEY `itest_university` (`test_id`),
  KEY `istudent_result` (`student_id`),
  KEY `iunivers_to_results` (`univer_id`),
  KEY `spec_to_results` (`specialty_id`),
  KEY `course_to_results` (`course_id`),
  KEY `group_to_results` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- СВЯЗИ ТАБЛИЦЫ `university_results`:
--   `course_id`
--       `university_courses` -> `id`
--   `group_id`
--       `university_groups` -> `id`
--   `student_id`
--       `students` -> `id`
--   `test_id`
--       `university_test_name` -> `id`
--   `univer_id`
--       `universities` -> `id`
--   `specialty_id`
--       `univer_specialty` -> `id`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- СВЯЗИ ТАБЛИЦЫ `university_tests`:
--   `test_id`
--       `university_test_name` -> `id`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- СВЯЗИ ТАБЛИЦЫ `univer_specialty`:
--   `faculty_id`
--       `faculties` -> `id`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

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
(3, 2, 2, 6, 'chief', 'w1XKwqdt5LMlw', 'chief chief chief', 'chief@chief.ch', '3453454335', 'Afasdfdf  3434', '2013-04-13', '0090-11-11', 'Биогрфии нет...', '/css/img/no_avatar.jpg');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- СВЯЗИ ТАБЛИЦЫ `user_tests`:
--   `test_id`
--       `user_test_name` -> `id`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

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
