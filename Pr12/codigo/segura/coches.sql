drop database coches if exists;
create database coches if not exists;

use coches;

create table coche(id_coche int primary key,marca varchar(25),modelo varchar(50),precio float,fecha_fabricacion date);

insert into coche values(1,"bmw","serie 1",200000.00,2020-01-15);
insert into coche values(2,"bmw","serie 3",200000.00,2019-07-25);