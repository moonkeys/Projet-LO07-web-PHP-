-- MySQL Script generated by MySQL Workbench
-- Tue Jun 12 15:16:16 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`compte`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`compte` ;

CREATE TABLE IF NOT EXISTS `mydb`.`compte` (
  `login` VARCHAR(45) NOT NULL,
  `mdp` VARCHAR(45) NOT NULL,
  `utilisateur` VARCHAR(45) NOT NULL,
  `id_utilisateur` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_utilisateur`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`evaluation`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`evaluation` ;

CREATE TABLE IF NOT EXISTS `mydb`.`evaluation` (
  `id_utilisateur` INT NOT NULL AUTO_INCREMENT,
  `note` FLOAT NULL,
  `avis` VARCHAR(250) NULL,
  PRIMARY KEY (`id_utilisateur`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`langues`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`langues` ;

CREATE TABLE IF NOT EXISTS `mydb`.`langues` (
  `id_langues` INT NOT NULL AUTO_INCREMENT,
  `langue` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_langues`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`revenu`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`revenu` ;

CREATE TABLE IF NOT EXISTS `mydb`.`revenu` (
  `mois` INT NULL,
  `trimestre` INT NULL,
  `année` INT NULL,
  `id_revenu` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_revenu`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`agenda`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`agenda` ;

CREATE TABLE IF NOT EXISTS `mydb`.`agenda` (
  `id_agenda` INT NOT NULL AUTO_INCREMENT,
  `heure_debut` VARCHAR(45) NULL,
  `date_debut` VARCHAR(45) NULL,
  `date_fin` VARCHAR(45) NULL,
  `heure_fin` VARCHAR(45) NULL,
  PRIMARY KEY (`id_agenda`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`langues_nounou`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`langues_nounou` ;

CREATE TABLE IF NOT EXISTS `mydb`.`langues_nounou` (
  `ref_nounou` INT NOT NULL,
  `ref_langues` INT NOT NULL,
  INDEX `fk_langues_nounou_langues1_idx` (`ref_langues` ASC),
  CONSTRAINT `fk_langues`
    FOREIGN KEY (`ref_langues`)
    REFERENCES `mydb`.`langues` (`id_langues`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`nounou`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`nounou` ;

CREATE TABLE IF NOT EXISTS `mydb`.`nounou` (
  `id_nounou` INT NOT NULL,
  `nom` VARCHAR(45) NOT NULL,
  `prenom` VARCHAR(45) NOT NULL,
  `ville` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `portable` VARCHAR(45) NOT NULL,
  `age` INT NOT NULL,
  `presentation` VARCHAR(250) NULL,
  `candidature` VARCHAR(45) NOT NULL,
  `photo` VARCHAR(100) NULL,
  `revenu` INT NOT NULL,
  `id_revenu` INT NOT NULL,
  `id_agenda` INT NOT NULL,
  `id_evaluation` INT NOT NULL,
  `langues_nounou_id_langues_nounou` INT NOT NULL,
  PRIMARY KEY (`revenu`, `id_revenu`, `id_agenda`, `id_evaluation`, `id_nounou`, `langues_nounou_id_langues_nounou`),
  INDEX `fk_revenu_idx` (`id_revenu` ASC),
  INDEX `fk_agenda_idx` (`id_agenda` ASC),
  INDEX `fk_evaluation_idx` (`id_evaluation` ASC),
  INDEX `fk_nounou_langues_nounou1_idx` (`langues_nounou_id_langues_nounou` ASC),
  CONSTRAINT `fk_revenu`
    FOREIGN KEY (`id_revenu`)
    REFERENCES `mydb`.`revenu` (`id_revenu`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_agenda`
    FOREIGN KEY (`id_agenda`)
    REFERENCES `mydb`.`agenda` (`id_agenda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_evaluation`
    FOREIGN KEY (`id_evaluation`)
    REFERENCES `mydb`.`evaluation` (`id_utilisateur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_langues_nounou`
    FOREIGN KEY (`langues_nounou_id_langues_nounou`)
    REFERENCES `mydb`.`langues_nounou` (`ref_nounou`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`enfant`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`enfant` ;

CREATE TABLE IF NOT EXISTS `mydb`.`enfant` (
  `prenom` VARCHAR(45) NOT NULL,
  `date_naissance` VARCHAR(45) NOT NULL,
  `restriction_alimentaire` VARCHAR(250) NULL,
  `id_enfant` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_enfant`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`parent`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`parent` ;

CREATE TABLE IF NOT EXISTS `mydb`.`parent` (
  `id_parent` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `ville` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `info_general` VARCHAR(250) NULL,
  `id_enfant` INT NOT NULL,
  PRIMARY KEY (`id_parent`, `id_enfant`),
  INDEX `fk_enfant_idx` (`id_enfant` ASC),
  CONSTRAINT `fk_enfant`
    FOREIGN KEY (`id_enfant`)
    REFERENCES `mydb`.`enfant` (`id_enfant`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
