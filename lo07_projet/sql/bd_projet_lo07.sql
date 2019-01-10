-- -----------------------------------------------------
-- Table `mydb`.`compte`
-- -----------------------------------------------------

CREATE TABLE `compte` (
  `login` VARCHAR(45) NOT NULL,
  `mdp` VARCHAR(45) NOT NULL,
  `utilisateur` VARCHAR(45) NOT NULL,
  `id_utilisateur` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_utilisateur`));


-- -----------------------------------------------------
-- Table `mydb`.`evaluation`
-- -----------------------------------------------------

CREATE TABLE `evaluation` (
  `id_utilisateur` INT NOT NULL AUTO_INCREMENT,
  `note` FLOAT NULL,
  `avis` VARCHAR(250) NULL,
  PRIMARY KEY (`id_utilisateur`));

-- -----------------------------------------------------
-- Table `mydb`.`langues`
-- -----------------------------------------------------

CREATE TABLE `langues` (
  `id_langues` INT NOT NULL,
  `langue` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_langues`));


-- -----------------------------------------------------
-- Table `mydb`.`langues_nounou`
-- -----------------------------------------------------
CREATE TABLE `langues_nounou` (
  `ref_nounou` INT NOT NULL,
  `ref_langues` INT NOT NULL,
  INDEX `fk_langues_idx` (`ref_langues` ASC),
  CONSTRAINT `fk_langues`
    FOREIGN KEY (`ref_langues`)
    REFERENCES `langues` (`id_langues`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);



-- -----------------------------------------------------
-- Table `mydb`.`revenu`
-- -----------------------------------------------------

CREATE TABLE `revenu` (
  `mois` INT NULL,
  `trimestre` INT NULL,
  `annee` INT NULL,
  `id_revenu` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_revenu`));


-- -----------------------------------------------------
-- Table `mydb`.`agenda`
-- -----------------------------------------------------

CREATE TABLE `agenda` (
  `id_nounou` INT NOT NULL,
  `id_parent` INT NULL,
   id_agenda INT NOT NULL AUTO_INCREMENT,
  `heure_debut` VARCHAR(45) NULL,
  `date` VARCHAR(45) NULL,
  `heure_fin` VARCHAR(45) NULL,
  PRIMARY KEY (`id_agenda`));


-- -----------------------------------------------------
-- Table `mydb`.`nounou`
-- -----------------------------------------------------

CREATE TABLE `nounou` (
  `id_nounou` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `prenom` VARCHAR(45) NOT NULL,
  `ville` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `portable` VARCHAR(45) NOT NULL,
  `age` INT NOT NULL,
  `presentation` VARCHAR(250) NULL,
  `candidature` VARCHAR(45) NOT NULL,
  `photo` VARCHAR(100) NULL,
  PRIMARY KEY (`id_nounou`),
);


-- -----------------------------------------------------
-- Table `mydb`.`enfant`
-- -----------------------------------------------------

CREATE TABLE `enfant` (
  `prenom` VARCHAR(45) NOT NULL,
  `nom` VARCHAR(45) NOT NULL,
  `date_naissance` VARCHAR(45) NOT NULL,
  `restriction_alimentaire` VARCHAR(250) NULL,
  `id_parent` INT NOT NULL,
   id_enfant INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_enfant`));


-- -----------------------------------------------------
-- Table `mydb`.`parent`
-- -----------------------------------------------------

CREATE TABLE `parent` (
  `id_parent` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `ville` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `info_general` VARCHAR(250) NULL,
  PRIMARY KEY (`id_parent`)
);


