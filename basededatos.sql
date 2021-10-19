/* Creación de la base de datos */
create database tfg;
use tfg;

/* Creación del usuario con permisos sobre la base de datos.*/
create user 'luis'@'localhost' identified by '1234';
grant all privileges on tfg.* to 'luis'@'localhost';

/* Creación y alta de datos en las tablas: 
-  */

drop table if exists usuarios;
drop table if exists ropa;

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50)  NOT NULL,
  `email` varchar(100)  NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ;

CREATE TABLE `ropa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100)  NOT NULL,
  `imagen` mediumblob  NOT NULL,
  `tipo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
);