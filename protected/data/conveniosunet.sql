CREATE TABLE roles(
ID VARCHAR(10) NOT NULL PRIMARY KEY,
NOMBRE VARCHAR(10)
);

INSERT INTO roles(ID,NOMBRE) VALUES('1','Admin');
INSERT INTO roles(ID,NOMBRE) VALUES('2','Usuario');

CREATE TABLE usuario (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(128) NOT NULL,
    clave VARCHAR(128) NOT NULL,
    correo VARCHAR(128) NOT NULL,
    fecha_creacion DATETIME NOT NULL,
    IdRol VARCHAR(10) NOT NULL,
    foreign key (`IdRol`) references `roles` (`ID`) on delete cascade on update cascade
);

INSERT INTO usuario (nombre, clave, correo, fecha_creacion,IdRol) VALUES ('test1', 'pass1', 'test1@example.com','2016/01/01','2');
INSERT INTO usuario (nombre, clave, correo, fecha_creacion,IdRol) VALUES ('admin', '1234', 'admin@example.com','2016/01/01','1');
INSERT INTO usuario (nombre, clave, correo, fecha_creacion,IdRol) VALUES ('leydy', '1234', 'leydy@example.com','2016/01/01','1');
INSERT INTO usuario (nombre, clave, correo, fecha_creacion,IdRol) VALUES ('tyson', '1234', 'tyson@example.com','2016/01/01','1');


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

CREATE TABLE instituciones (
	idInstitucion VARCHAR(10) PRIMARY KEY NOT NULL,
	nombre_institucion VARCHAR(200) NOT NULL
);
CREATE TABLE institucion_convenios (
	 instituciones_idInstitucion VARCHAR(10) NOT NULL,
      convenios_idConvenio VARCHAR(50) NOT NULL,
      fechaIncorporacion DATETIME NOT NULL,
      PRIMARY KEY (instituciones_idInstitucion, convenios_idConvenio),
    FOREIGN KEY (instituciones_idInstitucion)
    REFERENCES instituciones (idInstitucion),
    FOREIGN KEY (convenios_idConvenio)
    REFERENCES convenio (cod_convenio)

);