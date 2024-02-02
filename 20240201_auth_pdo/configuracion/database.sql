CREATE TABLE `test`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `correo` VARCHAR(45) NULL,
  `contraseña` TEXT(300) NULL,
  `info` VARCHAR(250) NULL,
  PRIMARY KEY (`id`));
--------------------------------------------------------------
CREATE TABLE `test`.`preferencias` (
`id_preferencia` INT NOT NULL AUTO_INCREMENT,
`id_usuario` INT NOT NULL,
`ciudad` VARCHAR(100) NULL,
PRIMARY KEY (`id_preferencia`),
FOREIGN KEY (`id_usuario`) REFERENCES `usuariosdaw`(`id`)
);