-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema controle_matriculas
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `controle_matriculas` ;

-- -----------------------------------------------------
-- Schema controle_matriculas
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `controle_matriculas` DEFAULT CHARACTER SET utf8 ;
USE `controle_matriculas` ;

-- -----------------------------------------------------
-- Table `controle_matriculas`.`  alunos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `controle_matriculas`.`alunos` (
  `id` INT NOT NULL,
  `cpf` INT(11) NULL,
  `nome` VARCHAR(255) NULL,
  `email` VARCHAR(255) NULL,
  `fone` VARCHAR(45) NULL,
  `data_nascimento` DATE NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `controle_matriculas`.`cursos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `controle_matriculas`.`cursos` (
  `id` INT NOT NULL,
  `nome` VARCHAR(255) NULL,
  `requisito` VARCHAR(255) NULL,
  `carga_horaria` INT NULL,
  `preco` DECIMAL(10,2) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `controle_matriculas`.`instrutores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `controle_matriculas`.`instrutores` (
  `id` INT NOT NULL,
  `nome` VARCHAR(255) NULL,
  `email` VARCHAR(255) NULL,
  `valor_hora` DECIMAL(10,2) NULL,
  `certificados` VARCHAR(255) NULL,
  `instrutorescol` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `controle_matriculas`.`turmas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `controle_matriculas`.`turmas` (
  `id` INT NOT NULL,
  `data_inicio` DATE NULL,
  `data_final` DATE NULL,
  `carga_horaria` INT NULL,
  `instrutores_id` INT NOT NULL,
  `cursos_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_turmas_instrutores1_idx` (`instrutores_id` ASC) ,
  INDEX `fk_turmas_cursos1_idx` (`cursos_id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `controle_matriculas`.`matriculas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `controle_matriculas`.`matriculas` (
  `id` INT NOT NULL,
  `data_matricula` DATE NULL,
  `alunos_id` INT NOT NULL,
  `turmas_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_matriculas_  alunos_idx` (`  alunos_id` ASC) ,
  INDEX `fk_matriculas_turmas1_idx` (`turmas_id` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `controle_matriculas`.`escolas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `controle_matriculas`.`escolas` (
  `id` INT NOT NULL,
  `nome` VARCHAR(255) NULL,
  `endereco` VARCHAR(255) NULL,
  `razao_social` VARCHAR(255) NULL,
  `telefone` VARCHAR(45) NULL,
  `cep` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
