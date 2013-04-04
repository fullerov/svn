SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `testing` ;
CREATE SCHEMA IF NOT EXISTS `testing` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `testing` ;

-- -----------------------------------------------------
-- Table `testing`.`settings`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `testing`.`settings` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `host` VARCHAR(255) NULL ,
  `database` VARCHAR(255) NULL ,
  `user` VARCHAR(255) NULL ,
  `password` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `INT1_UNIQUE` (`id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `testing`.`countries`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `testing`.`countries` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `idcountries_UNIQUE` (`id` ASC) ,
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `testing`.`cities`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `testing`.`cities` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `country_id` INT NOT NULL ,
  `name` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`, `country_id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `icountry_for_city` (`country_id` ASC) ,
  CONSTRAINT `icountry_for_city`
    FOREIGN KEY (`country_id` )
    REFERENCES `testing`.`countries` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `testing`.`types`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `testing`.`types` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `idtypes_UNIQUE` (`id` ASC) ,
  UNIQUE INDEX `type_UNIQUE` (`name` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `testing`.`users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `testing`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `country_id` INT NOT NULL ,
  `city_id` INT NOT NULL ,
  `type_id` INT NOT NULL ,
  `login` VARCHAR(255) NULL ,
  `password` VARCHAR(255) NULL ,
  `fio` VARCHAR(255) NULL ,
  `email` VARCHAR(150) NULL ,
  `tel` VARCHAR(100) NULL ,
  `address` VARCHAR(255) NULL ,
  `date` DATE NULL ,
  `birthdate` DATE NULL ,
  `about` TINYTEXT NULL ,
  `image` VARCHAR(255) NULL ,
  UNIQUE INDEX `INT8_UNIQUE` (`id` ASC) ,
  PRIMARY KEY (`id`, `country_id`, `city_id`, `type_id`) ,
  UNIQUE INDEX `LONG VARCHAR_UNIQUE` (`login` ASC) ,
  INDEX `icountry` (`country_id` ASC) ,
  INDEX `icity` (`city_id` ASC) ,
  INDEX `utype` (`type_id` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) ,
  CONSTRAINT `icountry`
    FOREIGN KEY (`country_id` )
    REFERENCES `testing`.`countries` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `icity`
    FOREIGN KEY (`city_id` )
    REFERENCES `testing`.`cities` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `utype`
    FOREIGN KEY (`type_id` )
    REFERENCES `testing`.`types` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `testing`.`articles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `testing`.`articles` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NOT NULL ,
  `title` VARCHAR(45) NULL ,
  `meta_description` VARCHAR(255) NULL ,
  `meta_key` VARCHAR(255) NULL ,
  `text` LONGTEXT NULL ,
  `date` DATE NULL ,
  `img` TINYTEXT NULL ,
  `rating` INT NULL ,
  `votes` INT NULL ,
  PRIMARY KEY (`id`, `user_id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `iuser` (`user_id` ASC) ,
  CONSTRAINT `iuser`
    FOREIGN KEY (`user_id` )
    REFERENCES `testing`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `testing`.`comments_for_articles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `testing`.`comments_for_articles` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `post_id` INT NOT NULL ,
  `author` VARCHAR(255) NULL ,
  `text` TINYTEXT NULL ,
  `date` DATE NULL ,
  PRIMARY KEY (`id`, `post_id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `icomments` (`post_id` ASC) ,
  CONSTRAINT `icomments`
    FOREIGN KEY (`post_id` )
    REFERENCES `testing`.`articles` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `testing`.`universities`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `testing`.`universities` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `city_id` INT NOT NULL ,
  `name` VARCHAR(255) NULL ,
  `address` VARCHAR(255) NULL ,
  `tel` VARCHAR(100) NULL ,
  `email` VARCHAR(150) NULL ,
  `site` VARCHAR(255) NULL ,
  `about` TINYTEXT NULL ,
  `image` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`, `city_id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `icity_for_university` (`city_id` ASC) ,
  CONSTRAINT `icity_for_university`
    FOREIGN KEY (`city_id` )
    REFERENCES `testing`.`cities` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `testing`.`faculties`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `testing`.`faculties` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `univer_id` INT NOT NULL ,
  `name` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`, `univer_id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `iuniversity` (`univer_id` ASC) ,
  CONSTRAINT `iuniversity`
    FOREIGN KEY (`univer_id` )
    REFERENCES `testing`.`universities` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `testing`.`univer_specialty`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `testing`.`univer_specialty` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `faculty_id` INT NOT NULL ,
  `name` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`, `faculty_id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `ifaculty_for_spec` (`faculty_id` ASC) ,
  CONSTRAINT `ifaculty_for_spec`
    FOREIGN KEY (`faculty_id` )
    REFERENCES `testing`.`faculties` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `testing`.`university_courses`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `testing`.`university_courses` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `faculty_id` INT NOT NULL ,
  `course` SMALLINT NULL ,
  PRIMARY KEY (`id`, `faculty_id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `ifaculty` (`faculty_id` ASC) ,
  CONSTRAINT `ifaculty`
    FOREIGN KEY (`faculty_id` )
    REFERENCES `testing`.`faculties` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `testing`.`university_groups`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `testing`.`university_groups` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `specialty_id` INT NOT NULL ,
  `course_id` INT NOT NULL ,
  `name` VARCHAR(255) NULL ,
  `year` VARCHAR(6) NULL ,
  PRIMARY KEY (`id`, `specialty_id`, `course_id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `ispecialty_students` (`specialty_id` ASC) ,
  INDEX `icourse_for_groups` (`course_id` ASC) ,
  CONSTRAINT `ispecialty_students`
    FOREIGN KEY (`specialty_id` )
    REFERENCES `testing`.`univer_specialty` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `icourse_for_groups`
    FOREIGN KEY (`course_id` )
    REFERENCES `testing`.`university_courses` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `testing`.`students`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `testing`.`students` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `city_id` INT NOT NULL ,
  `university_id` INT NOT NULL ,
  `group_id` INT NOT NULL ,
  `fio` VARCHAR(255) NULL ,
  `date` DATE NULL ,
  `address` VARCHAR(255) NULL ,
  `email` VARCHAR(150) NULL ,
  `tel` VARCHAR(100) NULL ,
  PRIMARY KEY (`id`, `city_id`, `university_id`, `group_id`) ,
  INDEX `igroup_for_student` (`group_id` ASC) ,
  INDEX `icity_for_students` (`city_id` ASC) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `iuniversity_to_student` (`university_id` ASC) ,
  CONSTRAINT `igroup_for_student`
    FOREIGN KEY (`group_id` )
    REFERENCES `testing`.`university_groups` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `icity_for_students`
    FOREIGN KEY (`city_id` )
    REFERENCES `testing`.`cities` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `iuniversity_to_student`
    FOREIGN KEY (`university_id` )
    REFERENCES `testing`.`universities` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `testing`.`university_lessons`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `testing`.`university_lessons` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `group_id` INT NOT NULL ,
  `name` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`, `group_id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `igroup_for_lesson` (`group_id` ASC) ,
  CONSTRAINT `igroup_for_lesson`
    FOREIGN KEY (`group_id` )
    REFERENCES `testing`.`university_groups` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `testing`.`university_test_name`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `testing`.`university_test_name` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NOT NULL ,
  `country_id` INT NOT NULL ,
  `city_id` INT NOT NULL ,
  `university_id` INT NOT NULL ,
  `faculty_id` INT NOT NULL ,
  `specialty_id` INT NOT NULL ,
  `course_id` INT NOT NULL ,
  `group_id` INT NOT NULL ,
  `lesson_id` INT NOT NULL ,
  `name` VARCHAR(255) NULL ,
  `description` TINYTEXT NULL ,
  `time_min` SMALLINT NULL ,
  `rating` INT NULL ,
  `date` DATE NULL ,
  PRIMARY KEY (`id`, `user_id`, `country_id`, `city_id`, `university_id`, `faculty_id`, `specialty_id`, `course_id`, `group_id`, `lesson_id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `ilessons_for_students` (`lesson_id` ASC) ,
  INDEX `iuser_for_university` (`user_id` ASC) ,
  INDEX `iuser_to_country` (`country_id` ASC) ,
  INDEX `iuser_to_city` (`city_id` ASC) ,
  INDEX `iuser_to_univer` (`university_id` ASC) ,
  INDEX `iuser_to_faculty` (`faculty_id` ASC) ,
  INDEX `iuser_to_spec` (`specialty_id` ASC) ,
  INDEX `iuser_to_course` (`course_id` ASC) ,
  INDEX `iuser_to_group` (`group_id` ASC) ,
  CONSTRAINT `ilessons_for_students`
    FOREIGN KEY (`lesson_id` )
    REFERENCES `testing`.`university_lessons` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `iuser_for_university`
    FOREIGN KEY (`user_id` )
    REFERENCES `testing`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `iuser_to_country`
    FOREIGN KEY (`country_id` )
    REFERENCES `testing`.`countries` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `iuser_to_city`
    FOREIGN KEY (`city_id` )
    REFERENCES `testing`.`cities` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `iuser_to_univer`
    FOREIGN KEY (`university_id` )
    REFERENCES `testing`.`universities` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `iuser_to_faculty`
    FOREIGN KEY (`faculty_id` )
    REFERENCES `testing`.`faculties` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `iuser_to_spec`
    FOREIGN KEY (`specialty_id` )
    REFERENCES `testing`.`univer_specialty` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `iuser_to_course`
    FOREIGN KEY (`course_id` )
    REFERENCES `testing`.`university_courses` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `iuser_to_group`
    FOREIGN KEY (`group_id` )
    REFERENCES `testing`.`university_groups` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `testing`.`university_results`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `testing`.`university_results` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `test_id` INT NOT NULL ,
  `student_id` INT NOT NULL ,
  `result` SMALLINT NULL ,
  `date` DATE NULL ,
  `time_min` SMALLINT NULL ,
  PRIMARY KEY (`id`, `test_id`, `student_id`) ,
  UNIQUE INDEX `iduniversity_results_UNIQUE` (`id` ASC) ,
  INDEX `itest_university` (`test_id` ASC) ,
  INDEX `istudent_result` (`student_id` ASC) ,
  CONSTRAINT `itest_university`
    FOREIGN KEY (`test_id` )
    REFERENCES `testing`.`university_test_name` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `istudent_result`
    FOREIGN KEY (`student_id` )
    REFERENCES `testing`.`students` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `testing`.`schools`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `testing`.`schools` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `city_id` INT NOT NULL ,
  `name` VARCHAR(255) NULL ,
  `address` VARCHAR(255) NULL ,
  `about` TINYTEXT NULL ,
  `tel` VARCHAR(100) NULL ,
  `email` VARCHAR(150) NULL ,
  `site` VARCHAR(255) NULL ,
  `image` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`, `city_id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `icountry_for_school` (`city_id` ASC) ,
  CONSTRAINT `icountry_for_school`
    FOREIGN KEY (`city_id` )
    REFERENCES `testing`.`cities` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `testing`.`school_classes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `testing`.`school_classes` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `school_id` INT NOT NULL ,
  `name` VARCHAR(100) NULL ,
  PRIMARY KEY (`id`, `school_id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `ischool` (`school_id` ASC) ,
  CONSTRAINT `ischool`
    FOREIGN KEY (`school_id` )
    REFERENCES `testing`.`schools` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `testing`.`school_lessons`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `testing`.`school_lessons` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `class_id` INT NOT NULL ,
  `name` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`, `class_id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `iclass_for_lesson` (`class_id` ASC) ,
  CONSTRAINT `iclass_for_lesson`
    FOREIGN KEY (`class_id` )
    REFERENCES `testing`.`school_classes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `testing`.`school_test_name`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `testing`.`school_test_name` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NOT NULL ,
  `country_id` INT NOT NULL ,
  `city_id` INT NOT NULL ,
  `school_id` INT NOT NULL ,
  `class_id` INT NOT NULL ,
  `lesson_id` INT NOT NULL ,
  `name` VARCHAR(255) NULL ,
  `description` TINYTEXT NULL ,
  `time_min` SMALLINT NULL ,
  `rating` INT NULL ,
  `date` DATE NULL ,
  PRIMARY KEY (`id`, `user_id`, `country_id`, `city_id`, `school_id`, `class_id`, `lesson_id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `iuser_for_school` (`user_id` ASC) ,
  INDEX `ilesson_for_school` (`lesson_id` ASC) ,
  INDEX `ilesson_to_school` (`school_id` ASC) ,
  INDEX `ilesson_to_city` (`city_id` ASC) ,
  INDEX `ilesson_to_country` (`country_id` ASC) ,
  INDEX `ilesson_to_class` (`class_id` ASC) ,
  CONSTRAINT `iuser_for_school`
    FOREIGN KEY (`user_id` )
    REFERENCES `testing`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `ilesson_for_school`
    FOREIGN KEY (`lesson_id` )
    REFERENCES `testing`.`school_lessons` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `ilesson_to_school`
    FOREIGN KEY (`school_id` )
    REFERENCES `testing`.`schools` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `ilesson_to_city`
    FOREIGN KEY (`city_id` )
    REFERENCES `testing`.`cities` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `ilesson_to_country`
    FOREIGN KEY (`country_id` )
    REFERENCES `testing`.`countries` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `ilesson_to_class`
    FOREIGN KEY (`class_id` )
    REFERENCES `testing`.`school_classes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `testing`.`pupils`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `testing`.`pupils` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `city_id` INT NOT NULL ,
  `school_id` INT NOT NULL ,
  `class_id` INT NOT NULL ,
  `fio` VARCHAR(255) NULL ,
  `address` VARCHAR(255) NULL ,
  `date` DATE NULL ,
  `tel` VARCHAR(100) NULL ,
  `email` VARCHAR(150) NULL ,
  PRIMARY KEY (`id`, `city_id`, `school_id`, `class_id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `iclass` (`class_id` ASC) ,
  INDEX `ischool_to_pupil` (`school_id` ASC) ,
  INDEX `icity_to_pupil` (`city_id` ASC) ,
  CONSTRAINT `iclass`
    FOREIGN KEY (`class_id` )
    REFERENCES `testing`.`school_classes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `ischool_to_pupil`
    FOREIGN KEY (`school_id` )
    REFERENCES `testing`.`schools` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `icity_to_pupil`
    FOREIGN KEY (`city_id` )
    REFERENCES `testing`.`cities` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `testing`.`school_results`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `testing`.`school_results` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `test_id` INT NOT NULL ,
  `pupil_id` INT NOT NULL ,
  `result` SMALLINT NULL ,
  `date` DATE NULL ,
  `time_min` SMALLINT NULL ,
  PRIMARY KEY (`id`, `test_id`, `pupil_id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `itest_for_school` (`test_id` ASC) ,
  CONSTRAINT `itest_for_school`
    FOREIGN KEY (`test_id` )
    REFERENCES `testing`.`school_test_name` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `ipupil_result`
    FOREIGN KEY (`pupil_id` )
    REFERENCES `testing`.`pupils` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `testing`.`school_tests`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `testing`.`school_tests` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `test_id` INT NOT NULL ,
  `question` TINYTEXT NULL ,
  `answer` VARCHAR(255) NULL ,
  `time_sec` SMALLINT NULL ,
  `var1` VARCHAR(255) NULL ,
  `var2` VARCHAR(255) NULL ,
  `var3` VARCHAR(255) NULL ,
  `var4` VARCHAR(255) NULL ,
  `var5` VARCHAR(255) NULL ,
  `var6` VARCHAR(255) NULL ,
  `var7` VARCHAR(255) NULL ,
  `var8` VARCHAR(255) NULL ,
  `var9` VARCHAR(255) NULL ,
  `var10` VARCHAR(255) NULL ,
  `var11` VARCHAR(255) NULL ,
  `var12` VARCHAR(255) NULL ,
  `var13` VARCHAR(255) NULL ,
  `var14` VARCHAR(255) NULL ,
  `var15` VARCHAR(255) NULL ,
  `var16` VARCHAR(255) NULL ,
  `var17` VARCHAR(255) NULL ,
  `var18` VARCHAR(255) NULL ,
  `var19` VARCHAR(255) NULL ,
  `var20` VARCHAR(255) NULL ,
  `var21` VARCHAR(255) NULL ,
  `var22` VARCHAR(255) NULL ,
  `var23` VARCHAR(255) NULL ,
  `var24` VARCHAR(255) NULL ,
  `var25` VARCHAR(255) NULL ,
  `var26` VARCHAR(255) NULL ,
  `var27` VARCHAR(255) NULL ,
  `var28` VARCHAR(255) NULL ,
  `var29` VARCHAR(255) NULL ,
  `var30` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`, `test_id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `itest_name_for_school` (`test_id` ASC) ,
  CONSTRAINT `itest_name_for_school`
    FOREIGN KEY (`test_id` )
    REFERENCES `testing`.`school_test_name` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `testing`.`organizations`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `testing`.`organizations` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `city_id` INT NOT NULL ,
  `name` VARCHAR(255) NULL ,
  `address` VARCHAR(255) NULL ,
  `site` VARCHAR(255) NULL ,
  `email` VARCHAR(150) NULL ,
  `tel` VARCHAR(100) NULL ,
  `about` TINYTEXT NULL ,
  `image` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`, `city_id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `icity_for_org` (`city_id` ASC) ,
  CONSTRAINT `icity_for_org`
    FOREIGN KEY (`city_id` )
    REFERENCES `testing`.`cities` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `testing`.`org_themes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `testing`.`org_themes` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `org_id` INT NOT NULL ,
  `themes` VARCHAR(255) NULL ,
  `description` TINYTEXT NULL ,
  PRIMARY KEY (`id`, `org_id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `iorg_for_themes` (`org_id` ASC) ,
  UNIQUE INDEX `themes_UNIQUE` (`themes` ASC) ,
  CONSTRAINT `iorg_for_themes`
    FOREIGN KEY (`org_id` )
    REFERENCES `testing`.`organizations` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `testing`.`org_test_name`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `testing`.`org_test_name` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NOT NULL ,
  `country_id` INT NOT NULL ,
  `city_id` INT NOT NULL ,
  `theme_id` INT NOT NULL ,
  `name` VARCHAR(255) NULL ,
  `description` TINYTEXT NULL ,
  `time_min` SMALLINT NULL ,
  `rating` INT NULL ,
  `date` DATE NULL ,
  PRIMARY KEY (`id`, `user_id`, `country_id`, `city_id`, `theme_id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `iuser_for_org` (`user_id` ASC) ,
  INDEX `itheme_to_city` (`city_id` ASC) ,
  INDEX `itheme_to_country` (`country_id` ASC) ,
  CONSTRAINT `iuser_for_org`
    FOREIGN KEY (`user_id` )
    REFERENCES `testing`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `itheme_for_org`
    FOREIGN KEY (`theme_id` )
    REFERENCES `testing`.`org_themes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `itheme_to_city`
    FOREIGN KEY (`city_id` )
    REFERENCES `testing`.`cities` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `itheme_to_country`
    FOREIGN KEY (`country_id` )
    REFERENCES `testing`.`countries` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `testing`.`org_employers`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `testing`.`org_employers` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `org_id` INT NOT NULL ,
  `fio` VARCHAR(255) NULL ,
  `address` VARCHAR(255) NULL ,
  `date` DATE NULL ,
  `email` VARCHAR(150) NULL ,
  `tel` VARCHAR(100) NULL ,
  PRIMARY KEY (`id`, `org_id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `iorg_for_employee` (`org_id` ASC) ,
  CONSTRAINT `iorg_for_employee`
    FOREIGN KEY (`org_id` )
    REFERENCES `testing`.`organizations` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `testing`.`org_results`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `testing`.`org_results` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `test_id` INT NOT NULL ,
  `employee_id` INT NOT NULL ,
  `result` SMALLINT NULL ,
  `date` DATE NULL ,
  `time_min` SMALLINT NULL ,
  PRIMARY KEY (`id`, `test_id`, `employee_id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `itests_for_results` (`test_id` ASC) ,
  INDEX `iemployee_result` (`employee_id` ASC) ,
  CONSTRAINT `itests_for_results`
    FOREIGN KEY (`test_id` )
    REFERENCES `testing`.`org_test_name` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `iemployee_result`
    FOREIGN KEY (`employee_id` )
    REFERENCES `testing`.`org_employers` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `testing`.`user_themes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `testing`.`user_themes` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NULL ,
  `description` TINYTEXT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  UNIQUE INDEX `themes_UNIQUE` (`name` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `testing`.`user_test_name`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `testing`.`user_test_name` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NOT NULL ,
  `country_id` INT NOT NULL ,
  `city_id` INT NOT NULL ,
  `theme_id` INT NOT NULL ,
  `name` VARCHAR(255) NULL ,
  `description` TINYTEXT NULL ,
  `time_min` SMALLINT NULL ,
  `rating` INT NULL ,
  `date` DATE NULL ,
  `quantity` INT NULL ,
  `results` SMALLINT NULL ,
  PRIMARY KEY (`id`, `user_id`, `country_id`, `city_id`, `theme_id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `iuser_themes` (`theme_id` ASC) ,
  INDEX `iuser_to_count` (`country_id` ASC) ,
  INDEX `iuser_to_cities` (`city_id` ASC) ,
  CONSTRAINT `iuser_themes`
    FOREIGN KEY (`theme_id` )
    REFERENCES `testing`.`user_themes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `iuser_for_user_tests`
    FOREIGN KEY (`user_id` )
    REFERENCES `testing`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `iuser_to_count`
    FOREIGN KEY (`country_id` )
    REFERENCES `testing`.`countries` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `iuser_to_cities`
    FOREIGN KEY (`city_id` )
    REFERENCES `testing`.`cities` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `testing`.`user_tests`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `testing`.`user_tests` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `test_id` INT NOT NULL ,
  `question` TINYTEXT NULL ,
  `answer` VARCHAR(255) NULL ,
  `time_sec` SMALLINT NULL ,
  `var1` VARCHAR(255) NULL ,
  `var2` VARCHAR(255) NULL ,
  `var3` VARCHAR(255) NULL ,
  `var4` VARCHAR(255) NULL ,
  `var5` VARCHAR(255) NULL ,
  `var6` VARCHAR(255) NULL ,
  `var7` VARCHAR(255) NULL ,
  `var8` VARCHAR(255) NULL ,
  `var9` VARCHAR(255) NULL ,
  `var10` VARCHAR(255) NULL ,
  `var11` VARCHAR(255) NULL ,
  `var12` VARCHAR(255) NULL ,
  `var13` VARCHAR(255) NULL ,
  `var14` VARCHAR(255) NULL ,
  `var15` VARCHAR(255) NULL ,
  `var16` VARCHAR(255) NULL ,
  `var17` VARCHAR(255) NULL ,
  `var18` VARCHAR(255) NULL ,
  `var19` VARCHAR(255) NULL ,
  `var20` VARCHAR(255) NULL ,
  `var21` VARCHAR(255) NULL ,
  `var22` VARCHAR(255) NULL ,
  `var23` VARCHAR(255) NULL ,
  `var24` VARCHAR(255) NULL ,
  `var25` VARCHAR(255) NULL ,
  `var26` VARCHAR(255) NULL ,
  `var27` VARCHAR(255) NULL ,
  `var28` VARCHAR(255) NULL ,
  `var29` VARCHAR(255) NULL ,
  `var30` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`, `test_id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `iuser_test_name` (`test_id` ASC) ,
  CONSTRAINT `iuser_test_name`
    FOREIGN KEY (`test_id` )
    REFERENCES `testing`.`user_test_name` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `testing`.`org_tests`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `testing`.`org_tests` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `test_id` INT NOT NULL ,
  `question` TINYTEXT NULL ,
  `answer` VARCHAR(255) NULL ,
  `time_sec` SMALLINT NULL ,
  `var1` VARCHAR(255) NULL ,
  `var2` VARCHAR(255) NULL ,
  `var3` VARCHAR(255) NULL ,
  `var4` VARCHAR(255) NULL ,
  `var5` VARCHAR(255) NULL ,
  `var6` VARCHAR(255) NULL ,
  `var7` VARCHAR(255) NULL ,
  `var8` VARCHAR(255) NULL ,
  `var9` VARCHAR(255) NULL ,
  `var10` VARCHAR(255) NULL ,
  `var11` VARCHAR(255) NULL ,
  `var12` VARCHAR(255) NULL ,
  `var13` VARCHAR(255) NULL ,
  `var14` VARCHAR(255) NULL ,
  `var15` VARCHAR(255) NULL ,
  `var16` VARCHAR(255) NULL ,
  `var17` VARCHAR(255) NULL ,
  `var18` VARCHAR(255) NULL ,
  `var19` VARCHAR(255) NULL ,
  `var20` VARCHAR(255) NULL ,
  `var21` VARCHAR(255) NULL ,
  `var22` VARCHAR(255) NULL ,
  `var23` VARCHAR(255) NULL ,
  `var24` VARCHAR(255) NULL ,
  `var25` VARCHAR(255) NULL ,
  `var26` VARCHAR(255) NULL ,
  `var27` VARCHAR(255) NULL ,
  `var28` VARCHAR(255) NULL ,
  `var29` VARCHAR(255) NULL ,
  `var30` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`, `test_id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `org_test_name` (`test_id` ASC) ,
  CONSTRAINT `org_test_name`
    FOREIGN KEY (`test_id` )
    REFERENCES `testing`.`org_test_name` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `testing`.`university_tests`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `testing`.`university_tests` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `test_id` INT NOT NULL ,
  `question` TINYTEXT NULL ,
  `answer` VARCHAR(255) NULL ,
  `time_sec` SMALLINT NULL ,
  `var1` VARCHAR(255) NULL ,
  `var2` VARCHAR(255) NULL ,
  `var3` VARCHAR(255) NULL ,
  `var4` VARCHAR(255) NULL ,
  `var5` VARCHAR(255) NULL ,
  `var6` VARCHAR(255) NULL ,
  `var7` VARCHAR(255) NULL ,
  `var8` VARCHAR(255) NULL ,
  `var9` VARCHAR(255) NULL ,
  `var10` VARCHAR(255) NULL ,
  `var11` VARCHAR(255) NULL ,
  `var12` VARCHAR(255) NULL ,
  `var13` VARCHAR(255) NULL ,
  `var14` VARCHAR(255) NULL ,
  `var15` VARCHAR(255) NULL ,
  `var16` VARCHAR(255) NULL ,
  `var17` VARCHAR(255) NULL ,
  `var18` VARCHAR(255) NULL ,
  `var19` VARCHAR(255) NULL ,
  `var20` VARCHAR(255) NULL ,
  `var21` VARCHAR(255) NULL ,
  `var22` VARCHAR(255) NULL ,
  `var23` VARCHAR(255) NULL ,
  `var24` VARCHAR(255) NULL ,
  `var25` VARCHAR(255) NULL ,
  `var26` VARCHAR(255) NULL ,
  `var27` VARCHAR(255) NULL ,
  `var28` VARCHAR(255) NULL ,
  `var29` VARCHAR(255) NULL ,
  `var30` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`, `test_id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `iuniversity_test_name` (`test_id` ASC) ,
  CONSTRAINT `iuniversity_test_name`
    FOREIGN KEY (`test_id` )
    REFERENCES `testing`.`university_test_name` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
