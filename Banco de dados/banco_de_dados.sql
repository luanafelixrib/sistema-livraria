SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema biblioteca
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `biblioteca` DEFAULT CHARACTER SET utf8 ;
USE `biblioteca` ;

-- -----------------------------------------------------
-- Table `biblioteca`.`genero`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`genero` (
  `id_genero` INT NOT NULL AUTO_INCREMENT,
  `nome_genero` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_genero`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `biblioteca`.`livro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`livro` (
  `id_livro` INT NOT NULL AUTO_INCREMENT,
  `titulo_livro` VARCHAR(255) NOT NULL,
  `autor_livro` VARCHAR(100) NULL COMMENT 'O autor é mantido como um campo de texto simples no livro.',
  `isbn_livro` VARCHAR(20) NULL UNIQUE, -- ISBN costuma ser único
  `ano_publicacao` INT NULL,
  `genero_id_genero` INT NOT NULL,
  PRIMARY KEY (`id_livro`),
  INDEX `fk_livro_genero_idx` (`genero_id_genero` ASC) ,
  CONSTRAINT `fk_livro_genero`
    FOREIGN KEY (`genero_id_genero`)
    REFERENCES `biblioteca`.`genero` (`id_genero`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `biblioteca`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`usuario` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `nome_usuario` VARCHAR(100) NOT NULL,
  `cpf_usuario` CHAR(11) NOT NULL UNIQUE,
  `email_usuario` VARCHAR(100) NULL,
  `dt_nasc_usuario` DATE NULL,
  `fone_usuario` VARCHAR(20) NULL,
  `endereco_usuario` VARCHAR(255) NULL,
  PRIMARY KEY (`id_usuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `biblioteca`.`bibliotecario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`bibliotecario` (
  `id_bibliotecario` INT NOT NULL AUTO_INCREMENT,
  `nome_bibliotecario` VARCHAR(100) NOT NULL,
  `cpf_bibliotecario` CHAR(11) NOT NULL UNIQUE,
  `email_bibliotecario` VARCHAR(100) NULL,
  `fone_bibliotecario` VARCHAR(20) NULL,
  PRIMARY KEY (`id_bibliotecario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `biblioteca`.`emprestimo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`emprestimo` (
  `id_emprestimo` INT NOT NULL AUTO_INCREMENT,
  `data_emprestimo` DATE NOT NULL,
  `data_devolucao_prevista` DATE NOT NULL,
  `data_devolucao_real` DATE NULL,
  `usuario_id_usuario` INT NOT NULL,
  `livro_id_livro` INT NOT NULL,
  `bibliotecario_id_bibliotecario` INT NOT NULL,
  PRIMARY KEY (`id_emprestimo`),
  
  CONSTRAINT `fk_emprestimo_usuario1`
    FOREIGN KEY (`usuario_id_usuario`)
    REFERENCES `biblioteca`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_emprestimo_livro1`
    FOREIGN KEY (`livro_id_livro`)
    REFERENCES `biblioteca`.`livro` (`id_livro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_emprestimo_bibliotecario1`
    FOREIGN KEY (`bibliotecario_id_bibliotecario`)
    REFERENCES `biblioteca`.`bibliotecario` (`id_bibliotecario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;