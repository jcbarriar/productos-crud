create table producto (
    id_producto serial not null primary key AUTO_INCREMENT,
    nombre varchar(100) not null,
    precio int not null
);

create table bodega (
    id_bodega serial not null primary key AUTO_INCREMENT,
    nombre varchar(100) not null
);