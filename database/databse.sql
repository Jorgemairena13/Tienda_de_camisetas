CREATE DATABASE IF NOT EXISTS tienda_ropa;

USE tienda_ropa;

CREATE TABLE IF NOT EXISTS usuarios(
id   int(255) auto_increment not null,
nombre varchar(100) not null,
apellidos varchar(255),
email varchar(255) not null,
password varchar(255) not null,
rol varchar(20),
imagen varchar(255),

CONSTRAINT pk_usuarios PRIMARY KEY(id),
CONSTRAINT uq_email UNIQUE(email),

)ENGINE=InnoDB;

INSERT INTO usuarios values(null,'Admin','Admin','admin@admin.com','contraseña','admin',null);


CREATE TABLE categorias(
id   int(255) auto_increment not null,
nombre varchar(100) not null,

CONSTRAINT pk_categorias PRIMARY KEY(id),

)ENGINE=InnoDB;

INSERT INTO categorias values(null,'Manga corta');
INSERT INTO categorias values(null,'Tirantes');
INSERT INTO categorias values(null,'Manga larga');
INSERT INTO categorias values(null,'Sudaderas');

CREATE TABLE productos(
id   int(255) auto_increment not null,
categoria_id int(255) not null,
nombre varchar(100) not null,
descripcion text,
precio float(100,2),
stock int(255) not null,
oferta varchar(2),
fecha date not null ,
imagen varchar(255),

CONSTRAINT pk_productos PRIMARY KEY(id),
CONSTRAINT fk_categoria FOREIGN KEY(categoria_id) REFERENCES categorias(id)

)ENGINE=InnoDB;



CREATE TABLE pedidos(
id          int(255) auto_increment not null,
usuario_id  int(255) not null,
provincia   varchar(100) not null,
localidad   varchar(100) not null,
direccion   varchar(255) not null,
coste       float(200,2) not null,
estado      varchar(20) not null,
fecha       date,
hora        time,

CONSTRAINT pk_pedidos PRIMARY KEY(id),
CONSTRAINT fk_pedido_usuario FOREIGN KEY(usuario_id) REFERENCES usuarios(id)

)ENGINE=InnoDB;



CREATE TABLE lineas_pedidos(
id          int(255) auto_increment not null,
pedido_id   int(255) not null,
producto_id   int(255) not null,


CONSTRAINT pk_lineas_pedidos PRIMARY KEY(id),
CONSTRAINT fk_linea_pedido FOREIGN KEY(pedido_id) REFERENCES pedidos(id)
CONSTRAINT fk_linea_producto FOREIGN KEY(producto_id) REFERENCES producto(id)

)ENGINE=InnoDB;


