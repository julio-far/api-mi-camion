create database mi_camion;
use mi_camion;

create table piloto(
    id int primary key auto_increment,
    nombre varchar(100),
    dpi varchar(12) unique,
    licencia varchar(12) unique,
    telefono varchar(12)
);

create table vehiculo(
    id int PRIMARY KEY auto_increment,
    modelo varchar(100),
    marca varchar(100),
    placa varchar(100),
    kilometraje varchar(100),
    record_servicio int,
    estado boolean
);

CREATE TABLE vehiculo_asignado(
    id int PRIMARY KEY auto_increment,
    piloto_id int,
    vehiculo_id int,
    comentario_vehiculo text,
    comentario_piloto text,
    estado boolean DEFAULT true,
    fecha_asignacion date,
    fecha_baja date not null,
    FOREIGN KEY (vehiculo_id) REFERENCES vehiculo(id),
    FOREIGN KEY (piloto_id) REFERENCES piloto(id)
);

CREATE TABLE viaje(
    id int PRIMARY KEY auto_increment,
    piloto_id int,
    estado ENUM('PENDIENTE', 'BODEGA', 'EN_CAMINO', 'ENTREGADO') DEFAULT 'PENDIENTE',
    fecha_salida date,
    fecha_regreso date,
    FOREIGN KEY (piloto_id) REFERENCES piloto(id)
);

CREATE TABLE cliente(
    id int PRIMARY KEY auto_increment,
    nombre varchar(100),
    dpi varchar(15) unique,
    estado boolean
);

CREATE TABLE producto(
    id int PRIMARY KEY auto_increment,
    viaje_id int,
    nombre varchar(100),
    descripcion text,
    FOREIGN KEY (viaje_id) REFERENCES viaje(id)
);
