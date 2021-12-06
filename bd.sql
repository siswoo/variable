DROP DATABASE IF EXISTS variable1;
CREATE DATABASE variable1;
USE variable1;

DROP TABLE IF EXISTS documento_tipo;
CREATE TABLE documento_tipo (
	id INT AUTO_INCREMENT,
	nombre VARCHAR(250) NOT NULL,
	PRIMARY KEY (id)
); ALTER TABLE documento_tipo CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO documento_tipo (nombre) VALUES 
('Documento de identidad'),
('Pasaporte'),
('PEP');

DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios (
	id INT AUTO_INCREMENT,
	nombre VARCHAR(250) NOT NULL,
	documento_tipo INT NOT NULL,
	documento_numero VARCHAR(250) NOT NULL,
	telefono VARCHAR(250) NOT NULL,
	correo VARCHAR(250) NOT NULL,
	usuario VARCHAR(250) NOT NULL,
	clave VARCHAR(250) NOT NULL,
	estatus INT NOT NULL,
	permisos INT NOT NULL,
	fecha_creacion DATE NOT NULL,
	PRIMARY KEY (id)
); ALTER TABLE usuarios CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO usuarios (nombre,documento_tipo,documento_numero,telefono,correo,usuario,clave,estatus,permisos,fecha_creacion) VALUES 
('Juan Maldonado',3,'9559487081993','3016984868','juanmaldonado.co@gmail.com','juan1','e1f2e2d4f6598c43c2a45d2bd3acb7be',1,1,'2021-11-17'),
('Erick Ballesteros',1,'1070620278','3148597354','jefeimd@camaleonmg.com','erick1','71b3b26aaa319e0cdf6fdb8429c112b0',1,1,'2021-11-17');
