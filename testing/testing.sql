-- phpMyAdmin SQL Dump
-- version 3.5.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 04 2013 г., 18:35
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `title`, `meta_description`, `meta_key`, `text`, `date`, `img`, `rating`, `votes`, `count`) VALUES
(11, 2, 'gggg', 'ggggggggggg', 'gggggggg', 'ggggggggg', '2013-04-02', 'http://testing/css/img/no_img.gif', 0, 0, 0),
(12, 2, 'gggg', 'ggggggggggg', 'gggggggg', 'ggggggggg', '2013-04-02', 'http://testing/css/img/no_img.gif', 0, 0, 0),
(13, 2, 'gggg', 'ggggggggggg', 'gggggggg', 'ggggggggg', '2013-04-02', 'http://testing/css/img/no_img.gif', 0, 0, 0),
(14, 2, 'yyyyy', 'yyyyyyyyyy', 'yyyyyyyyyy', 'yyyyyyyyyyyyyy', '2013-04-02', 'http://testing/css/img/no_img.gif', 0, 0, 0),
(15, 2, 'yyyyy', 'yyyyyyyyyy', 'yyyyyyyyyy', 'yyyyyyyyyyyyyy', '2013-04-02', 'http://testing/css/img/no_img.gif', 0, 0, 0),
(16, 2, 'yyyyy6777777777777', 'yyyyyyyyyy', 'yyyyyyyyyy', 'yyyyyyyyyyyyyy', '2013-04-02', 'http://testing/css/img/no_img.gif', 0, 0, 0),
(17, 5, '3333333', '33333333', '33333333', '333333333333', '2013-04-04', 'http://testing/css/img/no_img.gif', 0, 0, 0);

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
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `name`) VALUES
(1, 1, 'Moscow'),
(2, 2, 'Bishkek');

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
-- Дамп данных таблицы `comments_for_articles`
--

INSERT INTO `comments_for_articles` (`id`, `post_id`, `author`, `text`, `date`) VALUES
(2, 17, 'sss', 'uuu', '2013-04-04');

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
(2, 'Kyrgizstan'),
(1, 'Russia');

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

-- --------------------------------------------------------

--
-- Структура таблицы `organizations`
--

CREATE TABLE IF NOT EXISTS `organizations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `site` varchar(255) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `tel` varchar(100) DEFAULT NULL,
  `about` tinytext,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`city_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `icity_for_org` (`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `org_results`
--

CREATE TABLE IF NOT EXISTS `org_results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `result` smallint(6) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time_min` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`,`test_id`,`employee_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `itests_for_results` (`test_id`),
  KEY `iemployee_result` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `name` varchar(255) DEFAULT NULL,
  `description` tinytext,
  `time_min` smallint(6) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `results` smallint(6) NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`id`,`user_id`,`country_id`,`city_id`,`theme_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `iuser_for_org` (`user_id`),
  KEY `itheme_to_city` (`city_id`),
  KEY `itheme_to_country` (`country_id`),
  KEY `itheme_for_org` (`theme_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `org_themes`
--

CREATE TABLE IF NOT EXISTS `org_themes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_id` int(11) NOT NULL,
  `themes` varchar(255) DEFAULT NULL,
  `description` tinytext,
  PRIMARY KEY (`id`,`org_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `themes_UNIQUE` (`themes`),
  KEY `iorg_for_themes` (`org_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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

-- --------------------------------------------------------

--
-- Структура таблицы `schools`
--

CREATE TABLE IF NOT EXISTS `schools` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `about` tinytext,
  `tel` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `site` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`city_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `icountry_for_school` (`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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

-- --------------------------------------------------------

--
-- Структура таблицы `school_results`
--

CREATE TABLE IF NOT EXISTS `school_results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `pupil_id` int(11) NOT NULL,
  `result` smallint(6) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time_min` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`,`test_id`,`pupil_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `itest_for_school` (`test_id`),
  KEY `ipupil_result` (`pupil_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `fio` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `tel` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`,`city_id`,`university_id`,`group_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `igroup_for_student` (`group_id`),
  KEY `icity_for_students` (`city_id`),
  KEY `iuniversity_to_student` (`university_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `types`
--

INSERT INTO `types` (`id`, `name`) VALUES
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
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `tel` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `site` varchar(255) DEFAULT NULL,
  `about` tinytext,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`city_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `icity_for_university` (`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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

-- --------------------------------------------------------

--
-- Структура таблицы `university_results`
--

CREATE TABLE IF NOT EXISTS `university_results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `result` smallint(6) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time_min` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`,`test_id`,`student_id`),
  UNIQUE KEY `iduniversity_results_UNIQUE` (`id`),
  KEY `itest_university` (`test_id`),
  KEY `istudent_result` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `country_id`, `city_id`, `type_id`, `login`, `password`, `fio`, `email`, `tel`, `address`, `date`, `birthdate`, `about`, `image`) VALUES
(2, 2, 1, 1, 'qwerty', 'w1nTjJvSHS7Dw', 'qwerty', 'qwerty@qwerty.dd', '32123123', 'wefwf wer 4r', '2013-02-10', '1990-09-09', 'none', 'css/img/no_avatar.jpg'),
(3, 1, 1, 3, '55555', 'w1SZ3uX51IEZ6', '55555', '5555@sfses.dd', '312312', 'bgfg', '2013-02-10', '2000-01-01', 'none', 'css/img/no_avatar.jpg'),
(4, 2, 2, 3, '1111', 'w1VqyqrMOeMoA', '1111', '1111@wer.ee', '1111', '1111', '2013-02-10', '2000-01-01', 'none', 'css/img/no_avatar.jpg'),
(5, 2, 1, 3, 'sss', 'w1paFMoxJXucM', 'sss', 'sss@sss.ssss', '432424', 'dfgdfgd', '2013-02-26', '1990-01-01', 'none', 'css/img/no_avatar.jpg'),
(6, 2, 1, 3, 'aa', 'w1rumbHY4jioE', 'aa', 'aa@a.aa', '24234', '234234', '2013-02-26', '1990-10-10', 'none', 'css/img/no_avatar.jpg'),
(7, 2, 1, 3, 'a', 'w1UAUsw/oJk2c', 'a', 'qae@qwe.ee', '324234234', 'sdfsdf', '2013-02-26', '1990-01-01', 'none', 'css/img/no_avatar.jpg'),
(8, 2, 1, 3, 'ii', 'w16J8Cqz61mG2', 'ii', 'sadasd@sdf.dddd', '435435', '435345', '2013-02-26', '1990-09-09', 'none', 'css/img/no_avatar.jpg'),
(9, 2, 1, 3, 'pp', 'w1lG4chb0evpA', 'pp', 'pppp@ppp.rrrr', '6745645', 'ghf654645', '2013-02-26', '1990-01-01', 'none', 'css/img/no_avatar.jpg');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=125 ;

--
-- Дамп данных таблицы `user_tests`
--

INSERT INTO `user_tests` (`id`, `test_id`, `question`, `answer`, `time_sec`, `var1`, `var2`, `var3`, `var4`, `var5`, `var6`, `var7`, `var8`, `var9`, `var10`, `var11`, `var12`, `var13`, `var14`, `var15`, `var16`, `var17`, `var18`, `var19`, `var20`, `var21`, `var22`, `var23`, `var24`, `var25`, `var26`, `var27`, `var28`, `var29`, `var30`) VALUES
(2, 1, 'New Retest ли?', 'New R', NULL, 'New R', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 2, 'New Retest ли?', 'New R', NULL, 'New R', 'йцуйцу', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 3, 'New Retest ли?', 'New R', NULL, 'New R', '13', '14', '11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 3, 'New Retest ли?', 'New R', NULL, 'New R', '12', '10', '11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 3, 'New Retest ли?', 'New R', NULL, 'New R', '3', '2', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 3, 'New Retest ли?', 'New R', NULL, 'New R', '3', '-3', '-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, 4, 'New Retest ли?', 'New R', NULL, 'New R', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, 5, 'New Retest ли?', 'New R', NULL, 'New R', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, 5, 'New Retest ли?', 'New R', NULL, 'New R', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(92, 5, 'New Retest ли?', 'New R', NULL, 'New R', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, 10, 'New Retest ли?', 'New R', NULL, 'New R', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, 11, 'йцукенгшщщщщщыввв', 'ввв', NULL, 'ввв', 'вффц', 'вааа', 'врррр', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, 12, 'ee', 'ee', NULL, 'e', 'ee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, 12, 'e', 'e', NULL, 'e', 'ee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 12, '66', '66', NULL, '6', '66', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, 13, 'e', 'e', NULL, 'e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, 13, 'r', 'r', NULL, 'r', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, 13, 't', 't', NULL, 't', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(112, 10, 'sdfsdf', 'sdfsdf', NULL, 'sdfsdf', 'sdfsdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(113, 10, 'sdfsdf', 'sdfsdf', NULL, 'sdfsdf', 'sdfsdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(114, 10, 'sdfsdf', 'sdfsdf', NULL, 'sdfsdf', 'sdfsdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(115, 9, 'ghfghfghr4444444444', 'fghfgh', NULL, 'fghfgh', 'fghfgh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(116, 4, 'rrr', 'rrr', NULL, 'rrrrr', 'rrrrrrrrrr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(117, 4, 'rrr', 'rrr', NULL, 'rrrrr', 'rrrrrrrrrr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(118, 1, 'tyhrtyr', 'rt', NULL, 'rtrt', 'rtrtr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(119, 2, 'efsdf', 'sdf', NULL, 'sdfsdfsdf', 'sdfsdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(120, 1, 'rsdtf', 'werwer', NULL, 'wer', 'werwer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121, 1, 'gtdfg', 'dfgdfg', NULL, 'f', 'f', 'f', 'f', 'f', 'f', 'fsd', 'fsd', 'fsd', 'fsd', 'fsd', 'fsd', 'fsd', 'fsd', 'fsd', 'fsd', 'fsd', 'fsd', 'fsd', 'fsd', 'fsd', 'fsd', 'fsd', 'fsd', 'fsd', 'fsd', 'fsd', 'fsd', 'fsd', 'fsd'),
(122, 11, 'dfg', 'dfg', NULL, 'dfgdfg', 'dfgdfgdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(123, 15, 'jjjj', 'jjjjjjjjj', NULL, 'jjjjjjjjjj', 'jjjjjjjjjj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, 15, 'jkkkkk', 'kkkkkkkkkkk', NULL, 'kkkkkkkkkk', 'kkkkkkkkkkkkkkkk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Дамп данных таблицы `user_test_name`
--

INSERT INTO `user_test_name` (`id`, `user_id`, `country_id`, `city_id`, `theme_id`, `name`, `description`, `time_min`, `rating`, `date`, `quantity`, `results`, `count`) VALUES
(1, 2, 2, 1, 3, 'Тест', 'ТестТестТестТестТест', 2, NULL, '2013-03-21', 4, NULL, 0),
(2, 2, 2, 1, 1, 'йцуйцу', 'йцуйцу', 2, NULL, '2013-03-21', 2, NULL, 0),
(3, 2, 2, 1, 1, 'Арифметический тест', 'Это арифметический тест', 4, NULL, '2013-03-21', 4, NULL, 0),
(4, 2, 2, 1, 22, '77777', '77777777777777', 7, NULL, '2013-03-28', 80, NULL, 0),
(5, 2, 2, 1, 1, 'er', 'werewr', 3, NULL, '2013-03-28', 3, NULL, 0),
(9, 5, 2, 1, 38, 'Retest', 'RetestRetest', 3, NULL, '2013-03-30', 1, NULL, 0),
(10, 5, 2, 1, 37, 'New Retest', 'New Retest', 1, NULL, '2013-03-30', 1, NULL, 0),
(11, 5, 2, 1, 39, 'йцукенгшщщщщщ', 'йцукенгшщщщщщ', 4, NULL, '2013-03-31', 2, NULL, 0),
(12, 5, 2, 1, 1, 'ddd', 'ddd', 2, NULL, '2013-03-31', 3, NULL, 0),
(13, 5, 2, 1, 1, 'e', 'e', 1, NULL, '2013-03-31', 3, NULL, 0),
(14, 2, 2, 1, 1, 'jj', 'jjjjjjjjjjjjj', 2, NULL, '2013-04-03', 2, NULL, 0),
(15, 2, 2, 1, 1, 'kkk', 'kkkkkkkkkkkkkkkk', 2, NULL, '2013-04-03', 2, NULL, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Дамп данных таблицы `user_themes`
--

INSERT INTO `user_themes` (`id`, `name`, `description`) VALUES
(1, 'Psychological', 'psychological test'),
(2, 'Cogno', 'cogno test'),
(3, 'Auto', 'rewr'),
(6, 'Awww', 'erwqer'),
(9, 'PC', 'rr'),
(17, 'asd', 'asd'),
(19, 'sdsf', 'sdf'),
(21, 'nnnn', 'nnnnnnnnnnn'),
(22, 'Bfsdsd', 'asd'),
(23, 'Roboteest', 'dfg'),
(24, 'rtyrttyr', 'rtyrttyr'),
(25, 'Asdasdasdasd', 'Asdasdasdasd'),
(26, 'ASd32423', 'ASd32423'),
(27, '123412123asd', 's123412123asd'),
(28, 'sdfsdfsdf3', 'sdfsdfsdf3'),
(29, 'Математика', 'математический тест'),
(30, 'Уккку', 'уккку'),
(31, 'Буквенный', 'Тест букв'),
(32, 'йцуйцуйцуйцуйцу', 'йцуйцуйцу'),
(33, 'Ттттттт', 'Ттттттт'),
(34, 'Ттттттты', 'Ттттттты'),
(35, 'AMD', 'AMD'),
(36, 'NewsGreen', 'About forest'),
(37, 'Retest', 'Retest'),
(38, 'RetestRetest', 'RetestRetest'),
(39, 'йцукенннннн', 'уууу'),
(40, 'wwwwwwwwwwwwww', 'wwwwwwwwww');

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
  ADD CONSTRAINT `icity_for_org` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `itests_for_results` FOREIGN KEY (`test_id`) REFERENCES `org_test_name` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `iuser_for_org` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `org_themes`
--
ALTER TABLE `org_themes`
  ADD CONSTRAINT `iorg_for_themes` FOREIGN KEY (`org_id`) REFERENCES `organizations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `icountry_for_school` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `itest_for_school` FOREIGN KEY (`test_id`) REFERENCES `school_test_name` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `igroup_for_student` FOREIGN KEY (`group_id`) REFERENCES `university_groups` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `iuniversity_to_student` FOREIGN KEY (`university_id`) REFERENCES `universities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `universities`
--
ALTER TABLE `universities`
  ADD CONSTRAINT `icity_for_university` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `istudent_result` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `itest_university` FOREIGN KEY (`test_id`) REFERENCES `university_test_name` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
