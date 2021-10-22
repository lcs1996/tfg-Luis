/* Creación de la base de datos */
create database tfg;
use tfg;

/* Creación del usuario con permisos sobre la base de datos.*/
create user 'luis'@'localhost' identified by '1234';
grant all privileges on tfg.* to 'luis'@'localhost';

/* Creación y alta de datos en las tablas: 
-  */

drop table if exists usuarios;
drop table if exists imagenes;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50)  NOT NULL,
  `email` varchar(100)  NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ;

CREATE TABLE `imagenes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `nombre` varchar(100)  NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `imagen` mediumblob  NOT NULL,
  `tipo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `img_favs` (
  `id` int(11)
);

CREATE TABLE `add_calendario` (
  id int(11),
  fecha date
);