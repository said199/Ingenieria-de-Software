create database examenFinal;
use examenFinal;
CREATE TABLE IF NOT EXISTS `examenFinal`.`usuario` (
  `usuario_id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NULL,
  `apellido` VARCHAR(255) NULL,
  `dni` VARCHAR(255) NULL,
  `fecha_nacimiento` DATETIME NULL,
  `correo_electronico` VARCHAR(255) NULL,
  `foto_perfil` BLOB NULL,
  `fecha_transaccion` DATETIME NULL,
  PRIMARY KEY (`usuario_id`))
ENGINE = InnoDB;