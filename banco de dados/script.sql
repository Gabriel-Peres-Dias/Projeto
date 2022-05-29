-- MySQL Script generated by MySQL Workbench
-- Tue May 24 09:56:50 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema projetodb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema projetodb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema projetodb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `projetodb` DEFAULT CHARACTER SET latin1 ;
USE `projetodb` ;

-- -----------------------------------------------------
-- Table `projetodb`.`perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projetodb`.`perfil` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `perfil` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `projetodb`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projetodb`.`cliente` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `cpf` VARCHAR(11) NOT NULL,
  `nomeC` VARCHAR(90) NOT NULL,
  `emailC` VARCHAR(90) NOT NULL,
  `enderecoC` VARCHAR(90) NOT NULL,
  `telefoneC` VARCHAR(90) NOT NULL,
  `perfil_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `cliente_ibfk_1` (`perfil_id` ASC) ,
  CONSTRAINT `cliente_ibfk_1`
    FOREIGN KEY (`perfil_id`)
    REFERENCES `projetodb`.`perfil` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `projetodb`.`servico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projetodb`.`servico` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `tira_risco` INT(11) NOT NULL,
  `revitalizacao_pintura` INT(11) NOT NULL,
  `polimento_cristalizado` INT(11) NOT NULL,
  `micro_pintura` INT(11) NOT NULL,
  `polimento_farol` INT(11) NOT NULL,
  `pintura_geral` INT(11) NOT NULL,
  `horario` TIME NOT NULL,
  `dia` DATE NOT NULL,
  `cliente_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `servico_ibfk_1` (`cliente_id` ASC),
  CONSTRAINT `servico_ibfk_1`
    FOREIGN KEY (`cliente_id`)
    REFERENCES `projetodb`.`cliente` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `projetodb`.`orcamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projetodb`.`orcamento` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `valor` DOUBLE NOT NULL,
  `servico_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `orcamento_ibfk_1` (`servico_id` ASC) ,
  CONSTRAINT `orcamento_ibfk_1`
    FOREIGN KEY (`servico_id`)
    REFERENCES `projetodb`.`servico` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `projetodb`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projetodb`.`usuario` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `matricula` VARCHAR(6) NOT NULL,
  `nome` VARCHAR(90) NOT NULL,
  `endereco` VARCHAR(90) NOT NULL,
  `email` VARCHAR(90) NOT NULL,
  `telefone` VARCHAR(90) NOT NULL,
  `senha` VARCHAR(90) NOT NULL,
  `perfil_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `usuario_ibfk_1` (`perfil_id` ASC) ,
  CONSTRAINT `usuario_ibfk_1`
    FOREIGN KEY (`perfil_id`)
    REFERENCES `projetodb`.`perfil` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

INSERT INTO perfil(perfil) VALUES ('administrador'),('cliente');


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
