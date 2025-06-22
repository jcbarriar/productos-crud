create database if not exists productos_crud default character set utf8mb4 collate utf8mb4_spanish_ci;
use productos_crud;

create table producto (
    id_producto serial not null primary key AUTO_INCREMENT,
    nombre varchar(100) not null,
    precio int not null
);

create table bodega (
    id_bodega serial not null primary key AUTO_INCREMENT,
    nombre varchar(100) not null
);

create table stock (
    id_bodega bigint unsigned not null,
    id_producto bigint unsigned not null,
    cantidad int not null,
    FOREIGN KEY (id_producto) REFERENCES producto(id_producto),
    FOREIGN KEY (id_bodega) REFERENCES bodega(id_bodega)
);