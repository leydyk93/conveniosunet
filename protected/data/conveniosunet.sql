CREATE TABLE usuario (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(128) NOT NULL,
    clave VARCHAR(128) NOT NULL,
    correo VARCHAR(128) NOT NULL,
    fecha_creacion DATETIME NOT NULL 
);

INSERT INTO usuario (nombre, clave, correo, fecha_creacion) VALUES
(1, 'test1', 'pass1', 'test1@example.com', '2016-01-01 00:00:00'),
(2, 'leydy', '123', 'leydykm93@gmail.com', '2016-01-03 00:00:00');

CREATE TABLE clasificacion (
	cod_clasificacion VARCHAR(25) PRIMARY KEY NOT NULL,
	descripcion VARCHAR(100) NOT NULL
);
INSERT INTO clasificacion (cod_clasificacion, descripcion) VALUES
('M', 'Marco'),
('E', 'Especifico');

CREATE TABLE convenio (
	cod_convenio VARCHAR(50) PRIMARY KEY NOT NULL,
	nombre_convenio VARCHAR(100) NOT NULL,
	fecha_creacion DATETIME NOT NULL,
	fecha_caducidad DATETIME NOT NULL,
	institucion_UNET VARCHAR(50),
	objetivo_covenio text,
	cod_clasificacion VARCHAR(25),

	CONSTRAINT fk_clasificacion_convenio FOREIGN KEY (cod_clasificacion)
    REFERENCES clasificacion(cod_clasificacion)
);
INSERT INTO convenio (cod_convenio, nombre_convenio, fecha_creacion, fecha_caducidad, cod_clasificacion) VALUES
('1', 'ejemplo', '2016-01-01 00:00:00', '2017-01-01 00:00:00','M');