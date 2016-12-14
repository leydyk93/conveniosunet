CREATE TABLE IF NOT EXISTS archivosConvenios(
  idArchivo INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  convenios_idConvenio  VARCHAR(50) NOT NULL,
  titulo VARCHAR(120) NOT NULL,
  folder VARCHAR(120) NOT NULL,
  documento VARCHAR(120) NOT NULL
);

CREATE TABLE IF NOT EXISTS roles(
ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
NOMBRE VARCHAR(10)
);

INSERT INTO roles(NOMBRE) VALUES('Admin');
INSERT INTO roles(NOMBRE) VALUES('Usuario');

CREATE TABLE IF NOT EXISTS usuario (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(128) NOT NULL,
    clave VARCHAR(128) NOT NULL,
    correo VARCHAR(128) NOT NULL,
    fecha_creacion DATETIME NOT NULL,
    IdRol INT NOT NULL,
    foreign key (`IdRol`) references `roles` (`id`) on delete cascade on update cascade

);

INSERT INTO usuario (nombre, clave, correo, fecha_creacion,IdRol) VALUES ('admin', '1234', 'admin@example.com','2016/01/01','1');
INSERT INTO usuario (nombre, clave, correo, fecha_creacion,IdRol) VALUES ('leydy', '1234', 'leydy@example.com','2016/01/01','1');
INSERT INTO usuario (nombre, clave, correo, fecha_creacion,IdRol) VALUES ('tyson', '1234', 'tyson@example.com','2016/01/01','1');

-- -----------------------------------------------------
-- Table `mydb`.`clasificacionConvenios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS clasificacionConvenios (
  idClasificacionConvenio INT AUTO_INCREMENT NOT NULL,
  nombreClasificacionConvenio VARCHAR(150) NOT NULL,
  descripcionClasificacionConvenio VARCHAR(200) NOT NULL,
  PRIMARY KEY (idClasificacionConvenio));

INSERT INTO clasificacionConvenios (nombreClasificacionConvenio, descripcionClasificacionConvenio) VALUES
('Academico',''),
('Intercambio', ''),
('Cultural','');

-- -----------------------------------------------------
-- Table `mydb`.`tiposInstituciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS tiposInstituciones (
  idTipoInstitucion INT AUTO_INCREMENT NOT NULL,
  nombreTipoInstitucion VARCHAR(50) NOT NULL,
  PRIMARY KEY (idTipoInstitucion));

INSERT INTO tiposInstituciones (nombreTipoInstitucion) VALUES
('Educativa'),
('Salud'),
('Economica'),
('Gubernamental');
-- -----------------------------------------------------
-- Table `mydb`.`paises`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS paises (
  idPais INT AUTO_INCREMENT NOT NULL,
  nombrePais VARCHAR(100) NOT NULL,
  PRIMARY KEY (idPais));

INSERT INTO paises (idPais,nombrePais) VALUES
('1', 'Antigua y Barbuda'), 
('2', 'Argentina'), 
('3', 'Bahamas'), 
('4' ,'Barbados'), 
('5' ,'Belice'), 
('6' ,'Bolivia'), 
('7' ,'Brasil'),
('8' ,'Canadá'), 
('9' ,'Chile'), 
('10', 'Colombia'), 
('11','Costa Rica'), 
('12', 'Cuba'), 
('13', 'Dominica'), 
('14', 'Ecuador'), 
('15', 'El Salvador'),
('16', 'Estados Unidos'), 
('17', 'Granada'), 
('18', 'Guatemala'), 
('19', 'Guyana'), 
('20', 'Haití'), 
('21', 'Honduras'), 
('22', 'Jamaica'), 
('23', 'México'), 
('24', 'Nicaragua'),
('25', 'Panamá'),
('26', 'Paraguay'), 
('27', 'Perú'), 
('28', 'República Dominicana'), 
('29', 'San Cristóbal y Nieves'), 
('30', 'San Vicente y las Granadinas'), 
('31', 'Santa Lucía'), 
('32', 'Surinam'), 
('33','Trinidad y Tobago'), 
('34','Uruguay'), 
('35', 'Venezuela'); 
-- -----------------------------------------------------
-- Table `mydb`.`estados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS estados (
  idEstado INT AUTO_INCREMENT NOT NULL,
  nombreEstado VARCHAR(100) NOT NULL,
  paises_idPais INT NOT NULL,
  PRIMARY KEY (idEstado),
  CONSTRAINT fk_estados_paises
    FOREIGN KEY (paises_idPais)
    REFERENCES paises (idPais));

INSERT INTO estados (nombreEstado,paises_idPais) VALUES
('Zulia', '35'), 
('Miranda', '35'), 
('Distrito Capital', '35'),  
('Carabobo', '35'), 
('Lara', '35'),  
('Aragua', '35'),  
('Bolívar', '35'), 
('Anzoátegui', '35'),  
('Táchira', '35'),   
('Sucre', '35'),   
('Falcón', '35'),   
('Portuguesa', '35'),    
('Monagas', '35'),   
('Mérida', '35'),   
('Barinas', '35'),   
('Guárico', '35'),   
('Trujillo', '35'),   
('Yaracuy', '35'),   
('Apure', '35'),   
('Nueva Esparta', '35'),   
('Vargas', '35'),   
('Cojedes', '35'),   
('Delta Amacuro', '35'),   
('Amazonas', '35'),
('Santiago de Chile','9');
-- -----------------------------------------------------
-- Table `mydb`.`instituciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS instituciones (
  idInstitucion INT AUTO_INCREMENT NOT NULL,
  nombreInstitucion VARCHAR(200) NOT NULL,
  siglasInstitucion VARCHAR(50) NULL,
  estados_idEstado INT NOT NULL,
  tiposInstituciones_idTipoInstitucion INT NOT NULL,
  PRIMARY KEY (idInstitucion),
  CONSTRAINT fk_instituciones_estados1
    FOREIGN KEY (estados_idEstado)
    REFERENCES estados (idEstado),
  CONSTRAINT fk_instituciones_tiposInstituciones1
    FOREIGN KEY (tiposInstituciones_idTipoInstitucion)
    REFERENCES tiposInstituciones (idTipoInstitucion));

INSERT INTO instituciones (nombreInstitucion,siglasInstitucion,estados_idEstado,tiposInstituciones_idTipoInstitucion) 
VALUES ('Universidad de los Andes','ULA','9','1'), 
('Universidad Central de Venezuela','UCV','3','1'), 
('Universidad Nacional Abierta','UNA','9','1'),
 ('Universidad de Chile','UCHILE','25','1');

-- -----------------------------------------------------
-- Table `mydb`.`tipoConvenios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS tipoConvenios (
  idTipoConvenio INT AUTO_INCREMENT NOT NULL,
  descripcionTipoConvenio VARCHAR(100) NOT NULL,
  PRIMARY KEY (idTipoConvenio));

INSERT INTO tipoConvenios (idTipoConvenio,descripcionTipoConvenio) VALUES
('1', 'Marco'),
('2', 'Especifico');
-- -----------------------------------------------------
-- Table `mydb`.`dependencias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS dependencias (
  idDependencia INT AUTO_INCREMENT NOT NULL,
  nombreDependencia VARCHAR(100) NULL,
  telefonoDependencia VARCHAR(50) NULL,
  PRIMARY KEY (idDependencia));

INSERT INTO dependencias (nombreDependencia,telefonoDependencia) VALUES
('Rectorado','0276-3335553'),
('Secretaria','0276-4445552'),
('Docencia','0276-3234567');
-- ------------------
-- -----------------------------------------------------
-- Table `mydb`.`convenios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS convenios (
  idConvenio VARCHAR(50) NOT NULL,
  nombreConvenio VARCHAR(200) NOT NULL,
  fechaInicioConvenio DATE NOT NULL,
  fechaCaducidadConvenio DATE NOT NULL,
  objetivoConvenio TEXT NOT NULL,
  institucionUNET VARCHAR(50) NOT NULL,
  urlConvenio VARCHAR(100) NOT NULL,
  clasificacionConvenios_idTipoConvenio INT NOT NULL,
  tipoConvenios_idTipoConvenio INT NOT NULL,
  alcanceConvenios TEXT NOT NULL,
  dependencias_idDependencia INT NOT NULL,
  convenios_idConvenio VARCHAR(50)  NULL, 


  PRIMARY KEY (idConvenio),
  CONSTRAINT fk_convenios_clasificacionConvenios1
    FOREIGN KEY (clasificacionConvenios_idTipoConvenio)
    REFERENCES clasificacionConvenios (idClasificacionConvenio),
  CONSTRAINT fk_convenios_tipoConvenios1
    FOREIGN KEY (tipoConvenios_idTipoConvenio)
    REFERENCES tipoConvenios (idTipoConvenio),
  CONSTRAINT fk_convenios_dependencias1
    FOREIGN KEY (dependencias_idDependencia)
    REFERENCES dependencias (idDependencia),
  CONSTRAINT fk_convenios_convenios1
    FOREIGN KEY (convenios_idConvenio)
    REFERENCES convenios (idConvenio));

INSERT INTO convenios (idConvenio,nombreConvenio,fechaInicioConvenio,fechaCaducidadConvenio,
                       objetivoConvenio,institucionUNET,urlConvenio,clasificacionConvenios_idTipoConvenio,
                       tipoConvenios_idTipoConvenio,alcanceConvenios,/*formaConvenios_idFormaConvenio,*/
                        dependencias_idDependencia,convenios_idConvenio) VALUES
('04', 'convenio 4','2014/01/01','2018/01/01','ejemplo 4','Universidad Nacional Experimental del Tachira','www.unet.edu.ve/convenio4/djndkjaskd.pdf','2','1','jknjnfkvm','1',null),
('01', 'convenio 1','2015/01/01','2016/01/01','ejemplo 1','Universidad Nacional Experimental del Tachira','www.unet.edu.ve/convenio1/djndkjaskd.pdf','2','1','lfklekfle','1',null),
('02', 'convenio 2','2014/01/01','2015/01/01','ejemplo 2','Universidad Nacional Experimental del Tachira','www.unet.edu.ve/convenio1/djndkjaskd.pdf','2','1','fmkmfkkfm','1',null),
('03', 'convenio 3','2015/02/01','2017/01/01','ejemplo 3','Universidad Nacional Experimental del Tachira','www.unet.edu.ve/convenio3/djndkjaskd.pdf','1','2','fmkmfkkfm','2','01');

INSERT INTO convenios (idConvenio,nombreConvenio) VALUES
('5', 'convenio 5'),
('6', 'convenio 6'),
('7', 'convenio 7');


ALTER TABLE convenios
ADD caducidadIndefinida BOOLEAN NULL;

ALTER TABLE convenios
MODIFY fechaInicioConvenio DATE NULL;

ALTER TABLE convenios
MODIFY fechaCaducidadConvenio DATE NULL;

ALTER TABLE convenios
MODIFY objetivoConvenio TEXT NULL;

ALTER TABLE convenios
MODIFY institucionUNET VARCHAR(50) NULL;

ALTER TABLE convenios
MODIFY urlConvenio VARCHAR(100) NULL;

ALTER TABLE convenios
MODIFY clasificacionConvenios_idTipoConvenio INT NULL;

ALTER TABLE convenios
MODIFY tipoConvenios_idTipoConvenio INT NULL;

ALTER TABLE convenios
MODIFY alcanceConvenios TEXT NULL;

ALTER TABLE convenios
MODIFY dependencias_idDependencia INT NULL;

-- -----------------------------------------------------
-- Table  mydb . tipoResponsable
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS tipoResponsable (
  idTipoResponsable INT AUTO_INCREMENT NOT NULL,
  descripcionTipoResponsable VARCHAR(50) NOT NULL,
  PRIMARY KEY (idTipoResponsable));

INSERT INTO tipoResponsable (descripcionTipoResponsable) VALUES
('Legal'),
('Contacto');
-- -----------------------------------------------------
-- Table  mydb . responsables 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS  responsables  (
   idResponsable  INT AUTO_INCREMENT NOT NULL,
   primerNombreResponsable  VARCHAR(40) NOT NULL,
   segundoNombreResponsable VARCHAR(40) NULL,
   primerApellidoResponsable VARCHAR(60) NOT NULL,
   segundoApellidoResponsable VARCHAR(60) NULL,
   correoElectronicoResponsable  VARCHAR(100) NULL,
   telefonoResponsable  VARCHAR(50) NULL,
   instituciones_idInstitucion  INT NOT NULL,
   dependencias_idDependencia  INT NOT NULL,
   tipoResponsable_idTipoResponsable INT NOT NULL,
  PRIMARY KEY ( idResponsable ),
  CONSTRAINT  fk_responsables_instituciones1 
    FOREIGN KEY ( instituciones_idInstitucion )
    REFERENCES  instituciones  ( idInstitucion ),
  CONSTRAINT  fk_responsables_dependencias1 
    FOREIGN KEY ( dependencias_idDependencia )
    REFERENCES   dependencias  ( idDependencia ),
  CONSTRAINT  fk_responsables_tipoResponsable1 
    FOREIGN KEY ( tipoResponsable_idTipoResponsable )
    REFERENCES   tipoResponsable  ( idTipoResponsable ));


ALTER TABLE  responsables
 CHANGE  dependencias_idDependencia  dependencias_idDependencia INT( 11 ) NULL;

 ALTER TABLE  responsables
 CHANGE  instituciones_idInstitucion instituciones_idInstitucion INT( 11 ) NULL;


INSERT INTO responsables ( primerApellidoResponsable,   segundoApellidoResponsable,primerNombreResponsable,segundoNombreResponsable,
correoElectronicoResponsable, telefonoResponsable, instituciones_idInstitucion,dependencias_idDependencia,tipoResponsable_idTipoResponsable) 
VALUES
('Ostos','Casanova','Raúl', 'Alberto','raul.ostos@unet.edu.ve','04247564321',NULL,'1','1'),
("Mcdowell","Klein","Cleo","Lenore","dolor.vitae@unet.edu.ve","04247121737",NULL,NULL,'2'),
("Cole","Maldonado","Wanda","Hamish","varius.orci@unet.edu.ve","2735111834",NULL,NULL,'2'),
("Bonner","Nieves","Dalton","Jeanette","hendrerit.neque.In@unet.edu.ve","8082892872",NULL,NULL,'2'),
("Beach","Wolf","Castor","Jerome","auctor@unet.edu.ve","4426781178",NULL,NULL,'2'),
("Serrano","Hoffman","Herman","Kenyon","Praesent@unet.edu.ve","5431902095",NULL,NULL,'2'),
("Moon","Frederick","Emery","Hollee","et@unet.edu.ve","8328406922",NULL,NULL,'2'),

('Bonucci', 'Rossini', 'Mario', '','mario.rossini@ula.edu.ve','04246542390','1','1','1'),
('Galaviz','Ramírez','Alba' ,'Lorenia' ,'LR@ula.edu.ve','9194659053','1',NULL,'2'),
('Ayala' ,'Jiménez' ,'Sandra', 'Walkyria','WalkJ@ula.edu.ve','04262657890','1',NULL,'2'),
("Castillo","Alston","Brett","Deacon","dapibus.quam@ula.edu.ve","7506074776",'1',NULL,'2'),

('García', 'Arocha','Cecilia','','cecilia.garcia@ucv.edu.ve','02125689324','2','1','1'),
('Galdámez', 'Blanco', 'Arturo','Galindo','AB@ucv.edu.ve','04143869132','2',NULL,'2'),
('Durán','San Vicente', 'Raúl', 'Edmundo','EdmRaul@ucv.edu.ve','04123789041','2',NULL,'2'),
("Harvey","Mendoza","Genevieve","Kiona","Quisque.ornare@ucv.edu.ve","1337660836",'2',NULL,'2'),

('Castro', 'Pereira','Manuel','','Manuel.pereira@una.edu.ve','04147289051','3','1','1'),
('Cordero', 'Morales', 'María de los Ángeles','','MM@una.edu.ve','04163764567','3',NULL,'2'),
('Espinosa','Hernández','Delia','Katherine','DEspinos@una.edu.ve','04247890456','3',NULL,'2'),
("Branch","Estes","Cadman","Jack","Nulla.facilisi@una.edu.ve","5919754616",'3',NULL,'2'),


( 'Vivaldi','','Ennio','','Ennio.Vivaldi@uchile.edu.cl','5688898992','4','1','1'),
('Coria', 'Martínez', 'Gabriel','Alejandro','GaboA@uchile.edu.cl','04125247654','4',NULL,'2'),
("Sanford","Armstrong","May","Ima","Duis.a@uchile.edu.cl","7925752065",'4',NULL,'2');

-- --------------

-- -----------------------------------------------------
-- Table  mydb . estadoConvenios 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS  estadoConvenios  (
   idEstadoConvenio  INT AUTO_INCREMENT NOT NULL,
   nombreEstadoConvenio  VARCHAR(100) NOT NULL,
   descripcionEstadoConvenio  VARCHAR(100) NOT NULL,
  PRIMARY KEY ( idEstadoConvenio ));

INSERT INTO estadoConvenios (nombreEstadoConvenio,descripcionEstadoConvenio) VALUES
('Memo S.C Juridica',''),
('Memo R.C Juridica',''),
('Resolucion C.U Nro1',''),
('Memo DICIPREP',''),
('Resolucion C.U Aprobado','');

-- -----------------------------------------------------
-- Table    monedas 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS monedas ( 
  idMoneda INT AUTO_INCREMENT NOT NULL, 
  descripcionMoneda VARCHAR(50) NULL,
   PRIMARY KEY ( idMoneda ));

INSERT INTO `monedas` (`idMoneda`, `descripcionMoneda`) VALUES ('1', 'Bolivares'), ('2', 'Dolares');

-- -----------------------------------------------------
-- Table    actaIntencion 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS    actaIntencion  (
   idActaIntencion  INT AUTO_INCREMENT NOT NULL,
   fechaActaIntencion  DATE NULL,
   urlActaIntencion  VARCHAR(200) NULL,
   convenios_idConvenio  VARCHAR(50) NOT NULL,
  PRIMARY KEY ( idActaIntencion ),
  INDEX  fk_actaIntencion_convenios1_idx  ( convenios_idConvenio  ASC),
  CONSTRAINT  fk_actaIntencion_convenios1 
    FOREIGN KEY ( convenios_idConvenio )
    REFERENCES    convenios  ( idConvenio )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

-- -----------------------------------------------------
-- Table    renovacionProrrogas 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS    renovacionProrrogas  (
   idRenovacionProrroga  INT AUTO_INCREMENT NOT NULL,
   fechaFinProrroga  DATE NULL,
   observacionProrroga  VARCHAR(200) NULL,
   convenios_idConvenio  VARCHAR(50) NOT NULL,
  PRIMARY KEY ( idRenovacionProrroga ),
  INDEX  fk_renovacionProrrogas_convenios1_idx  ( convenios_idConvenio  ASC),
  CONSTRAINT  fk_renovacionProrrogas_convenios1 
    FOREIGN KEY ( convenios_idConvenio )
    REFERENCES    convenios  ( idConvenio )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

ALTER TABLE renovacionProrrogas ADD fechaRenovacion DATE NULL;
ALTER TABLE renovacionProrrogas ADD fechaCaducidadModificada DATE NOT NULL;
-- -----------------------------------------------------
-- Table    institucion_convenios 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS    institucion_convenios  (
   idInstitucionConvenio INT AUTO_INCREMENT NOT NULL,
   instituciones_idInstitucion  INT NOT NULL,
   convenios_idConvenio  VARCHAR(50) NOT NULL,
   fechaIncorporacion  DATE NOT NULL,
  PRIMARY KEY ( idInstitucionConvenio ),
  INDEX  fk_instituciones_has_convenios_convenios1_idx  ( convenios_idConvenio  ASC),
  INDEX  fk_instituciones_has_convenios_instituciones1_idx  ( instituciones_idInstitucion  ASC),
  CONSTRAINT  fk_instituciones_has_convenios_instituciones1 
    FOREIGN KEY ( instituciones_idInstitucion )
    REFERENCES    instituciones  ( idInstitucion )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT  fk_instituciones_has_convenios_convenios1 
    FOREIGN KEY ( convenios_idConvenio )
    REFERENCES    convenios  ( idConvenio )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT uk_institucion_convenios  UNIQUE (instituciones_idInstitucion,convenios_idConvenio)
    );

INSERT INTO institucion_convenios (instituciones_idInstitucion,convenios_idConvenio, fechaIncorporacion) VALUES
('1','01','2016/01/01'),
('2','01','2016/01/01'),
('1','02','2016/01/01'),
('3','02','2016/01/01'),
('1','03','2016/01/01'),
('4','04','2016/01/01');

-- -----------------------------------------------------
-- Table    historicoResponsables 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS   historicoResponsables  (
   idHistoricoResponsable  INT AUTO_INCREMENT NOT NULL,
   responsables_idResponsable  INT NOT NULL,
   convenios_idConvenio  VARCHAR(50) NULL,
   institucion_convenios_idInstitucionConvenio INT NULL,
   fechaAsignacionResponsable  DATE NOT NULL,
   fechaRetiroResponsable  DATE NULL,
   PRIMARY KEY ( idHistoricoResponsable ),
    INDEX  fk_historicoResponsables_responsables1_idx  ( responsables_idResponsable  ASC),
  INDEX  fk_historicoResponsables_convenios1_idx  ( convenios_idConvenio  ASC),
  INDEX  fk_historicoResponsables_institucion_convenios1_idx  (institucion_convenios_idInstitucionConvenio ASC),
    CONSTRAINT  fk_historicoResponsables_responsables1 
    FOREIGN KEY ( responsables_idResponsable )
    REFERENCES    responsables  ( idResponsable )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
      CONSTRAINT  fk_historicoResponsables_convenios1 
    FOREIGN KEY ( convenios_idConvenio )
    REFERENCES    convenios  ( idConvenio )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
     CONSTRAINT  fk_historicoResponsables_institucion_convenios1 
    FOREIGN KEY ( institucion_convenios_idInstitucionConvenio )
    REFERENCES    institucion_convenios  ( idInstitucionConvenio )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION

  );

ALTER TABLE historicoresponsables ADD CONSTRAINT chk_historicoResponsables CHECK((convenios_idConvenio IS NULL  AND institucion_convenios_idInstitucionConvenio IS NOT NULL ) OR 
          (convenios_idConvenio IS NOT NULL  AND institucion_convenios_idInstitucionConvenio IS NULL));


INSERT INTO historicoResponsables( responsables_idResponsable,convenios_idConvenio,institucion_convenios_idInstitucionConvenio,fechaAsignacionResponsable, fechaRetiroResponsable) VALUES
/*responsable legal y de cotacto por parte de la UNET convenio 1*/
('1','01',NULL,'2015/01/01',NULL),
('2','01',NULL,'2015/01/01',NULL),
/*Responsable legal y de contacto por parte de la ULA convenio 1*/
('8',NULL,'1','2015/01/01',NULL),
('9',NULL,'1','2015/01/01',NULL),
/*Responsable legal y de contacto por parte de la UCV convenio 1*/
('12',NULL,'2','2015/01/01',NULL),
('13',NULL,'2','2015/01/01',NULL),
/*responsable legal y de cotacto por parte de la UNET convenio 2*/
('1','02',NULL,'2014/01/01',NULL),
('3','02',NULL,'2014/01/01',NULL),
/*responsable legal y de cotacto por parte de la ULA convenio 2*/
('8',NULL,'3','2014/01/01',NULL),
('10',NULL,'3','2014/01/01',NULL),
/*responsable legal y de cotacto por parte de la UNA convenio 2*/
('16',NULL,'4','2014/01/01',NULL),
('17',NULL,'4','2014/01/01',NULL),
/*responsable legal y de cotacto por parte de la UNET convenio 3*/
('1','03',NULL,'2015/02/01',NULL),
('4','03',NULL,'2015/02/01',NULL),
/*responsable legal y de cotacto por parte de la ULA convenio 3*/
('8',NULL,'5','2015/01/01',NULL),
('11',NULL,'5','2015/01/01',NULL),
/*responsable legal y de cotacto por parte de la UNET convenio 4*/
('1','04',NULL,'2014/01/01',NULL),
('5','04',NULL,'2014/01/01',NULL),
/*responsable legal y de cotacto por parte de la UCHILE convenio 4*/
('20',NULL,'6','2014/01/01',NULL),
('21',NULL,'6','2014/01/01',NULL);

-- -----------------------------------------------------
-- Table    convenio_Estados 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS    convenio_Estados  (
   id_convenio_estado INT AUTO_INCREMENT NOT NULL,
   convenios_idConvenio  VARCHAR(50) NOT NULL,
   estadoConvenios_idEstadoConvenio  INT NOT NULL,
   fechaCambioEstado  DATE NOT NULL,
   numeroReporte  VARCHAR(10) NULL,
   observacionCambioEstado  TEXT NULL,
   dependencias_idDependencia  INT NULL,
  PRIMARY KEY ( id_convenio_estado ),
  INDEX  fk_convenios_has_estadoConvenios_estadoConvenios1_idx  ( estadoConvenios_idEstadoConvenio  ASC),
  INDEX  fk_convenios_has_estadoConvenios_convenios1_idx  ( convenios_idConvenio  ASC),
  INDEX  fk_convenio_Estados_dependencias1_idx  ( dependencias_idDependencia  ASC),
  CONSTRAINT  fk_convenios_has_estadoConvenios_convenios1 
    FOREIGN KEY ( convenios_idConvenio )
    REFERENCES    convenios  ( idConvenio )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT  fk_convenios_has_estadoConvenios_estadoConvenios1 
    FOREIGN KEY ( estadoConvenios_idEstadoConvenio )
    REFERENCES    estadoConvenios  ( idEstadoConvenio )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT  fk_convenio_Estados_dependencias1 
    FOREIGN KEY ( dependencias_idDependencia )
    REFERENCES    dependencias  ( idDependencia )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    CONSTRAINT uk_convenio_estados  UNIQUE (convenios_idConvenio,id_convenio_estado)
    );


INSERT INTO convenio_Estados (convenios_idConvenio,estadoConvenios_idEstadoConvenio,fechaCambioEstado,dependencias_idDependencia) VALUES
/*('01','1','2015/02/02','2'),
('01','2','2015/03/02','2'),
('01','3','2015/03/5','1'),
('01','4','2015/03/6','1'),
('01','5','2015/03/10','1'),
('02','1','2014/02/02','2'),
('02','2','2014/03/02','2'),
('02','3','2014/03/5','1'),
('02','4','2014/03/6','1'),
('02','5','2014/03/12','1'),
('03','5','2015/03/10','1'),
('04','4','2015/03/10','1');*/
/*Estos son los convenios de los cuales conocemos todo por lo tanto deben estar aprobados*/
('01','5','2015/02/02','1'),
('02','5','2014/02/02','1'),
('03','5','2015/03/10','1'),
('04','5','2015/03/10','1'),
/*estado diferente de aporbado*/
('5','1','2016/01/20','1'),
('6','1','2016/02/10','1'),
('7','1','2016/03/12','1');



-- -----------------------------------------------------
-- Table    convenio_aportes 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS    convenio_aportes  (
   id_convenio_aporte INT AUTO_INCREMENT NOT NULL,
   convenios_idConvenio  VARCHAR(50) NOT NULL,
   descripcion_aporte VARCHAR(100) NOT NULL,
   monedas_idMoneda  INT NULL,
   valor  VARCHAR(45) NULL,
   cantidad INT NULL,

  PRIMARY KEY ( id_convenio_aporte),
  INDEX  fk_convenios_has_aportes_convenios1_idx  ( convenios_idConvenio  ASC),
  INDEX  fk_convenio_aportes_monedas1_idx  ( monedas_idMoneda  ASC),
  
  CONSTRAINT  fk_convenios_has_aportes_convenios1 
    FOREIGN KEY ( convenios_idConvenio )
    REFERENCES    convenios  ( idConvenio )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT  fk_convenio_aportes_monedas1 
    FOREIGN KEY ( monedas_idMoneda )
    REFERENCES    monedas  ( idMoneda )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
   );