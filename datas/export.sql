-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema php-oo-mvc-juin2
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema php-oo-mvc-juin2
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `php-oo-mvc-juin2` DEFAULT CHARACTER SET utf8 ;
USE `php-oo-mvc-juin2` ;

-- -----------------------------------------------------
-- Table `php-oo-mvc-juin2`.`util`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `php-oo-mvc-juin2`.`util` (
  `idutil` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `thelogin` VARCHAR(80) NOT NULL,
  `thename` VARCHAR(150) NOT NULL,
  `thepwd` CHAR(64) NOT NULL,
  `themail` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idutil`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `thelogin_UNIQUE` ON `php-oo-mvc-juin2`.`util` (`thelogin` ASC);


-- -----------------------------------------------------
-- Table `php-oo-mvc-juin2`.`article`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `php-oo-mvc-juin2`.`article` (
  `idarticle` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `thetitle` VARCHAR(200) NOT NULL,
  `thetext` TEXT NOT NULL,
  `thedate` DATETIME NULL DEFAULT NOW(),
  `utilIdutil` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idarticle`),
  CONSTRAINT `fk_article_util`
    FOREIGN KEY (`utilIdutil`)
    REFERENCES `php-oo-mvc-juin2`.`util` (`idutil`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_article_util_idx` ON `php-oo-mvc-juin2`.`article` (`utilIdutil` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
