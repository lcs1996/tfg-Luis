/* Creación de la base de datos */
create database tfg;
use tfg;

/* Creación del usuario con permisos sobre la base de datos.*/
create user 'luis'@'localhost' identified by '1234';
grant all privileges on tfg.* to 'luis'@'localhost';

/* Creación y alta de datos en las tablas: */

drop table if exists usuarios;
drop table if exists imagenes;

CREATE TABLE `usuarios` ( `id` INT NOT NULL AUTO_INCREMENT , 
`nombre` VARCHAR(30) NOT NULL , 
`usuario` VARCHAR(30) NOT NULL , 
`email` VARCHAR(100) NOT NULL , 
`contrasena` VARCHAR(30) NOT NULL , 
PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `imagenes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100),
  `nombre` varchar(30),
  `categoria` varchar(100),
  `imagen` mediumblob,
  `tipo` varchar(100),
  PRIMARY KEY (`id`)
);

CREATE TABLE `img_favs` (
  `id` int(11),
  PRIMARY KEY (`id`)
);

CREATE TABLE `img_cal` (
  `id` int(11),
  `fecha` date,
  PRIMARY KEY (`id`)
);
