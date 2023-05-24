SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
SET GLOBAL sql_mode='';
-- -----------------------------------------------------
-- Schema proyectohotel
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
DROP database IF EXISTS `echotel`;
CREATE SCHEMA IF NOT EXISTS `echotel`;
USE `echotel` ;

-- -----------------------------------------------------
-- Table `mydb`.`juego`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS juego (
  `idJuego` INT NOT NULL,
  `Nombre` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idJuego`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tipoUsuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS  tipoUsuario (
  `idTipoUsuario` int NOT NULL AUTO_INCREMENT,
  `nomDescriptiu` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTipoUsuario`))
ENGINE = InnoDB;
ALTER TABLE tipoUsuario MODIFY  `idTipoUsuario` int (11) NOT NULL AUTO_INCREMENT;


-------------------------------
-- Table `mydb`.`usuario`
-- -----------------------------------------------------
CREATE TABLE if not exists usuario (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `Correo` VARCHAR(45) NOT NULL,
  `Nombre` VARCHAR(45),
  `Apellido` VARCHAR(45),
  `Contrasena` VARCHAR(64) NOT NULL,
  `NombreUsuario` VARCHAR(45) NOT NULL,
  `PP` varchar(255) NOT NULL default '/hotelsostenible/media/imgUsers/profileIcon.jpg',
  `TipoUsuario` INT  default 3 NOT NULL,
  PRIMARY KEY (`idUsuario`, `TipoUsuario`),

    FOREIGN KEY (`TipoUsuario`) 
    REFERENCES  tipoUsuario (`idTipoUsuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`puntuacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS  `puntuacion` (
  `Usuario_idUsuario` int NOT NULL,
  `Juego_idJuego` int NOT NULL,
  `Puntuacion` int DEFAULT NULL,
  `TiempoJuego` int DEFAULT NULL,
  `FechaHora` datetime DEFAULT NULL,
  PRIMARY KEY (`Usuario_idUsuario`,`Juego_idJuego`),
  KEY `Juego_idJuego` (`Juego_idJuego`),
  CONSTRAINT `puntuacion_ibfk_1` FOREIGN KEY (`Juego_idJuego`) REFERENCES `juego` (`idJuego`),
  CONSTRAINT `puntuacion_ibfk_2` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


INSERT INTO  tipoUsuario ( `nomDescriptiu`)
VALUES ("Admin"),
		("SuperAdmin"),
		( "Normal");

select * from usuario;
select * from TipoUsuario;

/* USUARIO SUPER ADMIN (Contraseña=123)*/ 
INSERT INTO `usuario` (`Correo`, `Nombre`, `Apellido`, `Contrasena`, `NombreUsuario`, `TipoUsuario`) 
VALUES ( 'superadmin@gmail.com', 'SuperAdmin', 'SuperAdmin', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'SuperAdmin',  '2'); 

/* EJEMPLO USUARIO ADMIN (Contraseña=123)*/ 
INSERT INTO `usuario` (`Correo`, `Nombre`, `Apellido`, `Contrasena`, `NombreUsuario`, `TipoUsuario`) 
VALUES ('admin@gmail.com', 'Admin', 'Admin', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Admin', '1');



/* EJEMPLO USUARIOS (Contraseña=123)*/


INSERT INTO `usuario` ( `Correo`, `Nombre`, `Apellido`, `Contrasena`, `NombreUsuario`, `TipoUsuario`) 
VALUES ( 'pol@gmail.com', 'Pol', 'Pol', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Pol1', '3');
/*
INSERT INTO `usuario` ( `Correo`, `Nombre`, `Apellido`, `Contrasena`, `NombreUsuario`,  `TipoUsuario`) 
VALUES ('jose@gmail.com', 'Jose', 'Jose', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Jose1', '3');

INSERT INTO `usuario` (`idUsuario`, `Correo`, `Nombre`, `Apellido`, `Contrasena`, `NombreUsuario`, `TipoUsuario`) 
VALUES (NULL, 'sergio@gmail.com', 'Sergio', 'Sergio', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Sergio1', '3');
*/


Insert into juego values (1,'Juego 1');
Insert into juego values (2,'Juego 2');
Insert into juego values (3,'Juego 3');
Insert into juego values (4,'Juego 4');

select * from usuario;