-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema duosystem
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema duosystem
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `duosystem` DEFAULT CHARACTER SET latin1 ;
USE `duosystem` ;

-- -----------------------------------------------------
-- Table `duosystem`.`status_atividades`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `duosystem`.`status_atividades` ;

CREATE TABLE IF NOT EXISTS `duosystem`.`status_atividades` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `descricao` VARCHAR(255) CHARACTER SET 'utf8mb4' NOT NULL COMMENT '',
  `situacao` TINYINT(4) NOT NULL COMMENT '',
  `created_at` TIMESTAMP NULL DEFAULT NULL COMMENT '',
  `updated_at` TIMESTAMP NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8mb4;

CREATE INDEX `INDEX_STATUS_ID` ON `duosystem`.`status_atividades` (`id` ASC)  COMMENT '';


-- -----------------------------------------------------
-- Table `duosystem`.`atividades`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `duosystem`.`atividades` ;

CREATE TABLE IF NOT EXISTS `duosystem`.`atividades` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `nome` VARCHAR(255) CHARACTER SET 'utf8mb4' NOT NULL COMMENT '',
  `descricao` TEXT CHARACTER SET 'utf8mb4' NOT NULL COMMENT '',
  `dt_inicio` DATE NOT NULL COMMENT '',
  `dt_fim` DATE NULL COMMENT '',
  `status_id` INT(10) UNSIGNED NOT NULL COMMENT '',
  `situacao` TINYINT(4) NOT NULL DEFAULT 1 COMMENT '',
  `created_at` TIMESTAMP NULL COMMENT '',
  `updated_at` TIMESTAMP NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  CONSTRAINT `FK_status_id`
    FOREIGN KEY (`status_id`)
    REFERENCES `duosystem`.`status_atividades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 21
DEFAULT CHARACTER SET = utf8mb4
PACK_KEYS = DEFAULT;

CREATE INDEX `INDEX_ATIVIDADES_STATUS_ID` ON `duosystem`.`atividades` (`status_id` ASC)  COMMENT '';

CREATE INDEX `INDEX_ATIVIDADES_SITUACAO` ON `duosystem`.`atividades` (`situacao` ASC)  COMMENT '';


-- -----------------------------------------------------
-- Table `duosystem`.`migrations`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `duosystem`.`migrations` ;

CREATE TABLE IF NOT EXISTS `duosystem`.`migrations` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `migration` VARCHAR(255) CHARACTER SET 'utf8mb4' NOT NULL COMMENT '',
  `batch` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = MyISAM
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

INSERT INTO `status_atividades` VALUES (1,'Pendente',1,'2017-06-07 20:44:13','2017-06-07 20:44:13'),(2,'Em Desenvolvimento',1,'2017-06-07 20:44:13','2017-06-07 20:44:13'),(3,'Em Teste',1,'2017-06-07 20:44:13','2017-06-07 20:44:13'),(4,'Concluído',1,'2017-06-07 20:44:13','2017-06-07 20:44:13');

DELIMITER $$
CREATE PROCEDURE Verificar_quantidade_atividades_pendentes (OUT quantidade INT)
BEGIN
	SELECT COUNT(*) INTO quantidade FROM atividades WHERE status_id = 1;	
END $$
DELIMITER ;


