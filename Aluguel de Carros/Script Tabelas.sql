-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema carro
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema carro
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `carro` ;
USE `carro` ;

-- -----------------------------------------------------
-- Table `carro`.`Cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carro`.`Cliente` (
  `idCliente` INT NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(30) NULL DEFAULT NULL,
  `CPF` VARCHAR(15) NOT NULL,
  `RG` VARCHAR(11) NOT NULL,
  `Endereco` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idCliente`),
  UNIQUE INDEX `idCliente_UNIQUE` (`idCliente` ASC),
  UNIQUE INDEX `Nome_UNIQUE` (`Nome` ASC),
  UNIQUE INDEX `CPF_UNIQUE` (`CPF` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `carro`.`Marca`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carro`.`Marca` (
  `N_marca` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`N_marca`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = geostd8;


-- -----------------------------------------------------
-- Table `carro`.`TipoModelo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carro`.`TipoModelo` (
  `Tipo` INT NOT NULL,
  `Nome_modelo` VARCHAR(45) NOT NULL,
  `Marca_N_marca` INT NOT NULL,
  PRIMARY KEY (`Tipo`, `Marca_N_marca`),
  INDEX `fk_TipoModelo_Marca1_idx` (`Marca_N_marca` ASC),
  CONSTRAINT `fk_TipoModelo_Marca1`
    FOREIGN KEY (`Marca_N_marca`)
    REFERENCES `carro`.`Marca` (`N_marca`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `carro`.`Cidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carro`.`Cidade` (
  `idCidade` INT NOT NULL,
  `Nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCidade`),
  UNIQUE INDEX `idCidade_UNIQUE` (`idCidade` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `carro`.`Filial`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carro`.`Filial` (
  `idFilial` INT NOT NULL AUTO_INCREMENT,
  `Cidade_idCidade` INT NOT NULL,
  `Nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idFilial`, `Cidade_idCidade`),
  INDEX `fk_Filial_Cidade1_idx` (`Cidade_idCidade` ASC),
  CONSTRAINT `fk_Filial_Cidade1`
    FOREIGN KEY (`Cidade_idCidade`)
    REFERENCES `carro`.`Cidade` (`idCidade`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `carro`.`Veiculo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carro`.`Veiculo` (
  `idVeiculo` INT NOT NULL AUTO_INCREMENT,
  `Placa` VARCHAR(45) NOT NULL,
  `Chassi` VARCHAR(45) NOT NULL,
  `KM` VARCHAR(45) NULL,
  `DH` TINYINT(1) NULL,
  `AR` TINYINT(1) NULL,
  `Vidro` TINYINT(1) NULL,
  `Trava` TINYINT(1) NULL,
  `Cor` VARCHAR(20) NULL,
  `Automatico` TINYINT(1) NULL,
  `TipoModelo_Tipo` INT NULL,
  `Filial_idFilial` INT NULL,
  `Disponivel` TINYINT(1) NULL,
  PRIMARY KEY (`idVeiculo`),
  INDEX `fk_Veiculo_TipoModelo1_idx` (`TipoModelo_Tipo` ASC),
  INDEX `fk_Veiculo_Filial1_idx` (`Filial_idFilial` ASC),
  CONSTRAINT `fk_Veiculo_TipoModelo1`
    FOREIGN KEY (`TipoModelo_Tipo`)
    REFERENCES `carro`.`TipoModelo` (`Tipo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Veiculo_Filial1`
    FOREIGN KEY (`Filial_idFilial`)
    REFERENCES `carro`.`Filial` (`idFilial`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `carro`.`Reserva`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `carro`.`Reserva` (
  `idReserva` INT NOT NULL AUTO_INCREMENT,
  `Data_Entrega` DATE NULL,
  `Data_Retirada` DATE NOT NULL,
  `Data_Prevista` DATE NULL,
  `Cliente_idCliente` INT NOT NULL,
  `Custo` INT NOT NULL,
  `Data` DATE NOT NULL,
  `Moto1` VARCHAR(60) NOT NULL,
  `Moto2` VARCHAR(60) NULL,
  `Veiculo_idVeiculo` INT NOT NULL,
  `Multa` VARCHAR(45) NULL,
  `Retirou` DATE NULL,
  PRIMARY KEY (`idReserva`),
  UNIQUE INDEX `idtable1_UNIQUE` (`idReserva` ASC),
  INDEX `fk_Reserva_Cliente1_idx` (`Cliente_idCliente` ASC),
  INDEX `fk_Reserva_Veiculo1_idx` (`Veiculo_idVeiculo` ASC),
  CONSTRAINT `fk_Reserva_Cliente1`
    FOREIGN KEY (`Cliente_idCliente`)
    REFERENCES `carro`.`Cliente` (`idCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Reserva_Veiculo1`
    FOREIGN KEY (`Veiculo_idVeiculo`)
    REFERENCES `carro`.`Veiculo` (`idVeiculo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
