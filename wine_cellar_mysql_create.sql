-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema wine_cellar
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `wine_cellar` ;

-- -----------------------------------------------------
-- Schema wine_cellar
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `wine_cellar` DEFAULT CHARACTER SET utf8 ;
USE `wine_cellar` ;

-- -----------------------------------------------------
-- Table `wine_cellar`.`regions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wine_cellar`.`regions` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `region_name` VARCHAR(100) NOT NULL,
  `country` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wine_cellar`.`appellations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wine_cellar`.`appellations` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `country` VARCHAR(45) NOT NULL,
  `region_id` INT(11) NOT NULL,
  `app_name` VARCHAR(45) NOT NULL,
  `common_flg` CHAR(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_appellation_region_idx` (`region_id` ASC),
  CONSTRAINT `fk_appellation_region`
    FOREIGN KEY (`region_id`)
    REFERENCES `wine_cellar`.`regions` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wine_cellar`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wine_cellar`.`user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(25) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password_hash` VARCHAR(60) NOT NULL,
  `auth_key` VARCHAR(32) NOT NULL,
  `confirmed_at` INT(11) NULL DEFAULT NULL,
  `unconfirmed_email` VARCHAR(255) NULL DEFAULT NULL,
  `blocked_at` INT(11) NULL DEFAULT NULL,
  `registration_ip` VARCHAR(45) NULL DEFAULT NULL,
  `flags` INT(11) NOT NULL DEFAULT '0',
  `created_at` INT(11) NOT NULL,
  `updated_at` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `user_unique_username` (`username` ASC),
  UNIQUE INDEX `user_unique_email` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wine_cellar`.`cellars`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wine_cellar`.`cellars` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `owner_id` INT(11) NOT NULL,
  `cellar_name` VARCHAR(45) NOT NULL,
  `created_at` INT(11) NULL DEFAULT NULL,
  `default_cellar_loc_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_5_idx` (`owner_id` ASC),
  CONSTRAINT `fk_5`
    FOREIGN KEY (`owner_id`)
    REFERENCES `wine_cellar`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wine_cellar`.`varietals`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wine_cellar`.`varietals` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `varietal_name` VARCHAR(45) NOT NULL,
  `common_flg` CHAR(1) NOT NULL,
  `varietal_type` VARCHAR(10) NULL DEFAULT NULL,
  `description` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wine_cellar`.`wineries`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wine_cellar`.`wineries` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `winery_name` VARCHAR(45) NOT NULL,
  `default_appellation_id` INT(11) NULL DEFAULT NULL,
  `phone` VARCHAR(12) NULL DEFAULT NULL,
  `proprietor_name` VARCHAR(45) NULL DEFAULT NULL,
  `winemaker_name` VARCHAR(45) NULL DEFAULT NULL,
  `website` VARCHAR(128) NULL DEFAULT NULL,
  `description` VARCHAR(255) NULL DEFAULT NULL,
  `created_at` INT(11) NULL DEFAULT NULL,
  `updated_at` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `default_appellation_idx` (`default_appellation_id` ASC),
  CONSTRAINT `fk_winery_appellation`
    FOREIGN KEY (`default_appellation_id`)
    REFERENCES `wine_cellar`.`appellations` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wine_cellar`.`wines`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wine_cellar`.`wines` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `wine_name` VARCHAR(45) NOT NULL,
  `winery_id` INT(11) NOT NULL,
  `appellation_id` INT(11) NOT NULL,
  `wine_year` VARCHAR(4) NOT NULL,
  `wine_varietal_id` INT(11) NOT NULL,
  `bottle_size` VARCHAR(15) NOT NULL,
  `upc_barcode` VARCHAR(30) NULL DEFAULT NULL,
  `description` VARCHAR(255) NULL DEFAULT NULL,
  `overall_rating` INT(11) NULL DEFAULT NULL,
  `created_at` INT(11) NULL DEFAULT NULL,
  `updated_at` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_wines_winery_idx` (`winery_id` ASC),
  INDEX `fk_wines_appellation_idx` (`appellation_id` ASC),
  INDEX `fk_wiines_varietal_idx` (`wine_varietal_id` ASC),
  CONSTRAINT `fk_wiines_varietal`
    FOREIGN KEY (`wine_varietal_id`)
    REFERENCES `wine_cellar`.`varietals` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_wines_appellation`
    FOREIGN KEY (`appellation_id`)
    REFERENCES `wine_cellar`.`appellations` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_wines_winery`
    FOREIGN KEY (`winery_id`)
    REFERENCES `wine_cellar`.`wineries` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wine_cellar`.`locations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wine_cellar`.`locations` (
  `id` INT NOT NULL,
  `cellar_id` INT NOT NULL,
  `loc_name` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_3_idx` (`cellar_id` ASC),
  CONSTRAINT `fk_3`
    FOREIGN KEY (`cellar_id`)
    REFERENCES `wine_cellar`.`cellars` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wine_cellar`.`cellarwines`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wine_cellar`.`cellarwines` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `cellar_id` INT(11) NOT NULL,
  `wine_id` INT(11) NOT NULL,
  `quantity` INT(11) NOT NULL,
  `rating` INT(11) NULL DEFAULT NULL,
  `created_at` INT(11) NULL DEFAULT NULL,
  `updated_at` INT(11) NULL DEFAULT NULL,
  `cost` DECIMAL(10,2) NULL DEFAULT NULL,
  `cellar_loc_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_cellar_wines_wine_idx` (`wine_id` ASC),
  INDEX `fk_cellar_wines_cellar_idx` (`cellar_id` ASC),
  INDEX `fk_6_idx` (`cellar_loc_id` ASC),
  CONSTRAINT `fk_cellar_wines_cellar`
    FOREIGN KEY (`cellar_id`)
    REFERENCES `wine_cellar`.`cellars` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_cellar_wines_wine`
    FOREIGN KEY (`wine_id`)
    REFERENCES `wine_cellar`.`wines` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_6`
    FOREIGN KEY (`cellar_loc_id`)
    REFERENCES `wine_cellar`.`locations` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wine_cellar`.`orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wine_cellar`.`orders` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `qty` INT(11) NOT NULL,
  `price_per_unit` DECIMAL(10,2) NOT NULL,
  `wine_id` INT(11) NOT NULL,
  `user_id` INT(11) NOT NULL,
  `order_dt` DATE NOT NULL,
  `ordered_from` VARCHAR(45) NULL,
  `futures_flg` CHAR(1) NOT NULL DEFAULT 'Y',
  `exp_delivery_dt` DATE NULL,
  `delivery_location` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_4_idx` (`wine_id` ASC),
  INDEX `fk_2_idx` (`user_id` ASC),
  CONSTRAINT `fk_4`
    FOREIGN KEY (`wine_id`)
    REFERENCES `wine_cellar`.`wines` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_2`
    FOREIGN KEY (`user_id`)
    REFERENCES `wine_cellar`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wine_cellar`.`comments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wine_cellar`.`comments` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL,
  `wine_id` INT(11) NOT NULL,
  `comment` TEXT NOT NULL,
  `created_at` INT(11) NULL,
  `updated_at` INT(11) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_comment_wine_idx` (`wine_id` ASC),
  INDEX `fk_9_idx` (`user_id` ASC),
  CONSTRAINT `fk_comment_wine`
    FOREIGN KEY (`wine_id`)
    REFERENCES `wine_cellar`.`wines` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_9`
    FOREIGN KEY (`user_id`)
    REFERENCES `wine_cellar`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wine_cellar`.`migration`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wine_cellar`.`migration` (
  `version` VARCHAR(180) NOT NULL,
  `apply_time` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`version`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `wine_cellar`.`profile`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wine_cellar`.`profile` (
  `user_id` INT(11) NOT NULL,
  `name` VARCHAR(255) NULL DEFAULT NULL,
  `public_email` VARCHAR(255) NULL DEFAULT NULL,
  `gravatar_email` VARCHAR(255) NULL DEFAULT NULL,
  `gravatar_id` VARCHAR(32) NULL DEFAULT NULL,
  `location` VARCHAR(255) NULL DEFAULT NULL,
  `website` VARCHAR(255) NULL DEFAULT NULL,
  `bio` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk_user_profile`
    FOREIGN KEY (`user_id`)
    REFERENCES `wine_cellar`.`user` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `wine_cellar`.`social_account`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wine_cellar`.`social_account` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NULL DEFAULT NULL,
  `provider` VARCHAR(255) NOT NULL,
  `client_id` VARCHAR(255) NOT NULL,
  `data` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `account_unique` (`provider` ASC, `client_id` ASC),
  INDEX `fk_user_account` (`user_id` ASC),
  CONSTRAINT `fk_user_account`
    FOREIGN KEY (`user_id`)
    REFERENCES `wine_cellar`.`user` (`id`)
    ON DELETE CASCADE
    ON UPDATE RESTRICT)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `wine_cellar`.`token`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wine_cellar`.`token` (
  `user_id` INT(11) NOT NULL,
  `code` VARCHAR(32) NOT NULL,
  `created_at` INT(11) NOT NULL,
  `type` SMALLINT(6) NOT NULL,
  UNIQUE INDEX `token_unique` (`user_id` ASC, `code` ASC, `type` ASC),
  CONSTRAINT `fk_user_token`
    FOREIGN KEY (`user_id`)
    REFERENCES `wine_cellar`.`user` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `wine_cellar`.`cellarusers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wine_cellar`.`cellarusers` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `cellar_id` INT(11) NOT NULL,
  `user_id` INT(11) NOT NULL,
  `permission` VARCHAR(10) NOT NULL DEFAULT 'NONE' COMMENT 'Possible Permission values = \'NONE\', \'USER\', \'ADMIN\'',
  INDEX `fk__idx` (`cellar_id` ASC),
  INDEX `fk_1_idx` (`user_id` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_`
    FOREIGN KEY (`cellar_id`)
    REFERENCES `wine_cellar`.`cellars` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_1`
    FOREIGN KEY (`user_id`)
    REFERENCES `wine_cellar`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wine_cellar`.`attach_file`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wine_cellar`.`attach_file` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `model` VARCHAR(255) NOT NULL,
  `itemId` INT(11) NOT NULL,
  `hash` VARCHAR(255) NOT NULL,
  `size` INT(11) NOT NULL,
  `type` VARCHAR(255) NOT NULL,
  `mime` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `file_model` (`model` ASC),
  INDEX `file_item_id` (`itemId` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `wine_cellar`.`app_config`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wine_cellar`.`app_config` (
  `id` INT NOT NULL,
  `wotd_id` INT NOT NULL,
  `wotd_dt` DATETIME NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

USE `wine_cellar`;

DELIMITER $$
USE `wine_cellar`$$
CREATE
DEFINER=`jim`@`localhost`
TRIGGER `wine_cellar`.`cellarwines_AINS`
AFTER INSERT ON `wine_cellar`.`cellarwines`
FOR EACH ROW
begin
	UPDATE wines SET overall_rating = 
	(SELECT avg( rating )
		FROM cellarwines
		WHERE wine_id = NEW.wine_id)
	WHERE wines.id = NEW.wine_id;
end$$

USE `wine_cellar`$$
CREATE
DEFINER=`jim`@`localhost`
TRIGGER `wine_cellar`.`cellarwines_AUPD`
AFTER UPDATE ON `wine_cellar`.`cellarwines`
FOR EACH ROW
begin
	UPDATE wines SET overall_rating = 
	(SELECT avg( rating )
		FROM cellarwines
		WHERE wine_id = NEW.wine_id)
	WHERE wines.id = NEW.wine_id;
end$$


DELIMITER ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
