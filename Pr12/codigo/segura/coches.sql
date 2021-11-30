drop database coches if exists;
create database coches if not exists;

use coches;

create table coche(id_coche int,nombre varchar(50),precio float,fecha_fabricacion date);

inser into coche values