USE mysql;

CREATE DATABASE IF NOT EXISTS srcsti;
USE srcsti;

DROP USER IF EXISTS "srcsti_SelectO"@"*";

DROP USER IF EXISTS "srcsti_Modify"@"*";
DROP USER IF EXISTS "srcsti_root"@"*";
DROP USER IF EXISTS "srcsti_root"@"localhost";
CREATE USER "srcsti_root"@"localhost" IDENTIFIED BY 'sabeNoMeAcuerdo-';
REVOKE ALL PRIVILEGES ON *.* FROM "srcsti_root"@"localhost";
GRANT USAGE, SELECT, INSERT, DELETE, UPDATE ON srcsti.* TO "srcsti_root" @"localhost";

DROP USER IF EXISTS "srcsti_Root"@"*";

DROP TABLE IF EXISTS reporte;
DROP TABLE IF EXISTS aula;
DROP TABLE IF EXISTS laboratorio;
DROP TABLE IF EXISTS cubiculo;
DROP TABLE IF EXISTS area;

DROP TABLE IF EXISTS instructor;

DROP TABLE IF EXISTS usuario;
CREATE TABLE usuario(
    idUsuario INT NOT NULL AUTO_INCREMENT,
    usuario varchar(50) NOT NULL UNIQUE,
    contraseña varchar(50) NOT NULL,
    tipo varchar(50) NOT NULL,
    nombre varchar(100) NOT NULL,
    apellido varchar(100) NOT NULL,
    PRIMARY KEY (idUsuario)
);
INSERT INTO usuario(usuario,contraseña,tipo,nombre,apellido) values('Csti','AdminCsti123','Administrador','','');


CREATE TABLE instructor(
    idInstructor INT NOT NULL AUTO_INCREMENT,
    nombre varchar(100) NOT NULL,
    apellidoP varchar(100) NOT NULL,
    apellidoM varchar(100) NOT NULL,
    tipo varchar(20) NOT NULL,
    carrera varchar(60) NOT NULL,
    activo int NOT NULL,
    PRIMARY KEY (idInstructor)
);
INSERT INTO instructor(nombre,apellidoP,apellidoM,tipo,carrera,activo) VALUES('Ivan Alejandro','Chavez','Morales','Administrativo','ISI','1');

CREATE TABLE area(
    idArea INT NOT NULL AUTO_INCREMENT,
    edificio varchar(2) NOT NULL,
    numero varchar(3) NOT NULL,
    horasLibre varchar(255),
    PRIMARY KEY (idArea)
);
INSERT INTO area(edificio,numero,horasLibre) VALUES('5G','204','10:00am');

CREATE TABLE aula(
    idArea INT NOT NULL,
    computadora INT NOT NULL,
    proyector INT NOT NULL,
    FOREIGN KEY (idArea) REFERENCES area(idArea)
);


CREATE TABLE laboratorio(
    idArea INT NOT NULL,
    cantidadComputadoras INT NOT NULL,
    proyector INT NOT NULL,
    FOREIGN KEY (idArea) REFERENCES area(idArea)
);
INSERT INTO laboratorio(idArea,cantidadComputadoras,proyector) VALUES(1,20,1);

CREATE TABLE cubiculo(
    idArea INT NOT NULL,
    idInstructor INT NOT NULL,
    FOREIGN KEY (idArea) REFERENCES area(idArea),
    FOREIGN KEY (idInstructor) REFERENCES instructor(idInstructor)
);

CREATE TABLE reporte(
    idReporte varchar(9) NOT NULL,
    idArea INT NOT NULL,
    idInstructor INT NOT NULL,
    idUsuario INT NOT NULL,
    problema varchar(255) NOT NULL,
    solucion varchar(255) NOT NULL,
    estado INT NOT NULL,
    PRIMARY KEY (idReporte),
    FOREIGN KEY (idArea) REFERENCES area(idArea),
    FOREIGN KEY (idInstructor) REFERENCES instructor(idInstructor),
    FOREIGN KEY (idUsuario) REFERENCES usuario(idUsuario)
);
INSERT INTO reporte(idReporte,idArea,idInstructor,idUsuario,problema,solucion,estado) VALUES(1,1,1,1,'no hay','ninguna',1),(2,1,1,1,'tampoco hay','ninguna otra ve',1);
