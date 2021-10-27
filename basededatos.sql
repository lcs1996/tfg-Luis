/* Creación de la base de datos */
create database tfg;
use tfg;

/* Creación del usuario con permisos sobre la base de datos.*/
create user 'luis'@'localhost' identified by '1234';
grant all privileges on tfg.* to 'luis'@'localhost';

/* Creación y alta de datos en las tablas: */

drop table if exists usuarios;
drop table if exists imagenes;

CREATE TABLE `Usuarios` (
  `id` int(11),
  `nombre` varchar(30),
  `email` varchar(100),
  `contraseña` varchar(30)
);

CREATE TABLE `Imagenes` (
  `id` int(11),
  `email` varchar(100),
  `nombre` varchar(30),
  `categoria` varchar(100),
  `imagen` mediumblob,
  `tipo` varchar(100)
);

CREATE TABLE `img_favs` (
  `id` int(11)
);

CREATE TABLE `img_cal` (
  `id` int(11),
  `fecha` date
);
