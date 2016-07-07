/*TABLA DE ROLES Y USUARIOS QUE YA TENEMOS CREADA CON LAS QUE HACEMOS LA AUTENTICACION*/
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
    foreign key (`IdRol`) references `roles` (`id`) on delete cascade on update cascade

);


INSERT INTO usuario (nombre, clave, correo, fecha_creacion,IdRol) VALUES ('admin', '1234', 'admin@example.com','2016/01/01','1');
INSERT INTO usuario (nombre, clave, correo, fecha_creacion,IdRol) VALUES ('leydy', '1234', 'leydy@example.com','2016/01/01','1');
INSERT INTO usuario (nombre, clave, correo, fecha_creacion,IdRol) VALUES ('tyson', '1234', 'tyson@example.com','2016/01/01','1');

 
/* TABLAS DE PRUEBA QUE CREAMOS PARA PROBAR LA GENERACIÓN DE LOS CRUD CON CLAVES COMPUESTAS
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
*/
/* DESDE AQUI SCRIPT PARA EL PROYECTO*/
-- -----------------------------------------------------
-- Table `mydb`.`clasificacionConvenios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS clasificacionConvenios (
  idClasificacionConvenio VARCHAR(10) NOT NULL,
  nombreClasificacionConvenio VARCHAR(150) NOT NULL,
  descripcionClasificacionConvenio VARCHAR(200) NOT NULL,
  PRIMARY KEY (idClasificacionConvenio));

INSERT INTO clasificacionConvenios (idClasificacionConvenio,nombreClasificacionConvenio, descripcionClasificacionConvenio) VALUES
('1', 'Academico',''),
 ('2', 'Intercambio', ''),
('3', 'Cultural','');

-- -----------------------------------------------------
-- Table `mydb`.`alcanceConvenios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS alcanceConvenios (
  idAlcanceConvenio VARCHAR(10) NOT NULL,
  descripcionAlcanceConvenio VARCHAR(50) NOT NULL,
  PRIMARY KEY (idAlcanceConvenio));

INSERT INTO alcanceConvenios (idAlcanceConvenio,descripcionAlcanceConvenio) VALUES
('1', 'General'),
 ('2', 'Especifico'),
('3', 'Mixto');


-- -----------------------------------------------------
-- Table `mydb`.`formaConvenios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS formaConvenios (
  idFormaConvenio VARCHAR(10) NOT NULL,
  descripcionFormaConvenio VARCHAR(50) NOT NULL,
  PRIMARY KEY (idFormaConvenio));

INSERT INTO formaConvenios (idFormaConvenio,descripcionFormaConvenio) VALUES
('1', 'Unica'),
 ('2', 'Bilateral'),
('3', 'Multilateral');

-- -----------------------------------------------------
-- Table `mydb`.`tiposInstituciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS tiposInstituciones (
  idTipoInstitucion VARCHAR(10) NOT NULL,
  nombreTipoInstitucion VARCHAR(50) NOT NULL,
  PRIMARY KEY (idTipoInstitucion));


INSERT INTO tiposInstituciones (idTipoInstitucion,nombreTipoInstitucion) VALUES
('1', 'Educativa'),
('2', 'Salud'),
('3', 'Economica'),
('4', 'Gubernamental');
-- -----------------------------------------------------
-- Table `mydb`.`paises`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS paises (
  idPais VARCHAR(10) NOT NULL,
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
  idEstado VARCHAR(10) NOT NULL,
  nombreEstado VARCHAR(100) NOT NULL,
  paises_idPais VARCHAR(10) NOT NULL,
  PRIMARY KEY (idEstado),
  CONSTRAINT fk_estados_paises
    FOREIGN KEY (paises_idPais)
    REFERENCES paises (idPais));

INSERT INTO estados (idEstado,nombreEstado,paises_idPais) VALUES
('135', 'Zulia', '35'), 
('235', 'Miranda', '35'), 
('335', 'Distrito Capital', '35'),  
('435', 'Carabobo', '35'), 
('535','Lara', '35'),  
('635','Aragua', '35'),  
('735','Bolívar', '35'), 
('835','Anzoátegui', '35'),  
('935','Táchira', '35'),   
('1035','Sucre', '35'),   
('1135','Falcón', '35'),   
('1235','Portuguesa', '35'),    
('1335','Monagas', '35'),   
('1435','Mérida', '35'),   
('1535','Barinas', '35'),   
('1635','Guárico', '35'),   
('1735','Trujillo', '35'),   
('1835','Yaracuy', '35'),   
('1935','Apure', '35'),   
('2035','Nueva Esparta', '35'),   
('2135','Vargas', '35'),   
('2235','Cojedes', '35'),   
('2335','Delta Amacuro', '35'),   
('2435', 'Amazonas', '35'),
('19','Santiago de Chile','9');
-- -----------------------------------------------------
-- Table `mydb`.`instituciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS instituciones (
  idInstitucion VARCHAR(10) NOT NULL,
  nombreInstitucion VARCHAR(200) NOT NULL,
  siglasInstitucion VARCHAR(50) NULL,
  estados_idEstado VARCHAR(10) NOT NULL,
  tiposInstituciones_idTipoInstitucion VARCHAR(10) NOT NULL,
  PRIMARY KEY (idInstitucion),
  CONSTRAINT fk_instituciones_estados1
    FOREIGN KEY (estados_idEstado)
    REFERENCES estados (idEstado),
  CONSTRAINT fk_instituciones_tiposInstituciones1
    FOREIGN KEY (tiposInstituciones_idTipoInstitucion)
    REFERENCES tiposInstituciones (idTipoInstitucion));

INSERT INTO instituciones (idInstitucion,nombreInstitucion,siglasInstitucion,estados_idEstado,tiposInstituciones_idTipoInstitucion) VALUES
('1','Universidad de los Andes','ULA','935','1'),
('2','Universidad Central de Venezuela','UCV','335','1'),
('3','Universidad Nacional Abierta','UNA','335','1')
('4','Universidad de Chile','UCHILE','19','1');

-- -----------------------------------------------------
-- Table `mydb`.`tipoConvenios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS tipoConvenios (
  idTipoConvenio VARCHAR(10) NOT NULL,
  descripcionTipoConvenio VARCHAR(100) NOT NULL,
  PRIMARY KEY (idTipoConvenio));

INSERT INTO tipoConvenios (idTipoConvenio,descripcionTipoConvenio) VALUES
('1', 'Marco'),
('2', 'Especifico');
-- -----------------------------------------------------
-- Table `mydb`.`dependencias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS dependencias (
  idDependencia VARCHAR(10) NOT NULL,
  nombreDependencia VARCHAR(100) NULL,
  telefonoDependencia VARCHAR(50) NULL,
  PRIMARY KEY (idDependencia));

INSERT INTO dependencias (idDependencia,nombreDependencia,telefonoDependencia) VALUES
('1', 'Rectorado','0276-3335553'),
('2', 'Secretaria','0276-4445552'),
('3', 'Docencia','0276-3234567');
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
  clasificacionConvenios_idTipoConvenio VARCHAR(10) NOT NULL,
  tipoConvenios_idTipoConvenio VARCHAR(10) NOT NULL,
  alcanceConvenios_idAlcanceConvenio VARCHAR(10) NOT NULL,
  formaConvenios_idFormaConvenio VARCHAR(10) NOT NULL,
  dependencias_idDependencia VARCHAR(10) NOT NULL,
  convenios_idConvenio VARCHAR(50)  NULL, /*Este atributo puede ser nulo*/


  PRIMARY KEY (idConvenio),
  CONSTRAINT fk_convenios_clasificacionConvenios1
    FOREIGN KEY (clasificacionConvenios_idTipoConvenio)
    REFERENCES clasificacionConvenios (idClasificacionConvenio),
  CONSTRAINT fk_convenios_tipoConvenios1
    FOREIGN KEY (tipoConvenios_idTipoConvenio)
    REFERENCES tipoConvenios (idTipoConvenio),
  CONSTRAINT fk_convenios_alcanceConvenios1
    FOREIGN KEY (alcanceConvenios_idAlcanceConvenio)
    REFERENCES alcanceConvenios(idAlcanceConvenio),
  CONSTRAINT fk_convenios_formaConvenios1
    FOREIGN KEY (formaConvenios_idFormaConvenio)
    REFERENCES formaConvenios (idFormaConvenio),
CONSTRAINT fk_convenios_dependencias1
    FOREIGN KEY (dependencias_idDependencia)
    REFERENCES dependencias (idDependencia),
  CONSTRAINT fk_convenios_convenios1
    FOREIGN KEY (convenios_idConvenio)
    REFERENCES convenios (idConvenio));

ALTER TABLE `convenios` ADD `ventajasBeneficiosConvenio` TEXT NOT NULL AFTER `objetivoConvenio`;
ALTER TABLE `convenios` CHANGE `fechaCaducidadConvenio` `fechaCaducidadConvenio` DATE NOT NULL;
ALTER TABLE `convenios` CHANGE `fechaInicioConvenio` `fechaInicioConvenio` DATE NOT NULL;

INSERT INTO convenios (idConvenio,nombreConvenio,fechaInicioConvenio,fechaCaducidadConvenio,
                       objetivoConvenio,institucionUNET,urlConvenio,clasificacionConvenios_idTipoConvenio,
                       tipoConvenios_idTipoConvenio,alcanceConvenios_idAlcanceConvenio,formaConvenios_idFormaConvenio,
                        dependencias_idDependencia,convenios_idConvenio) VALUES
('01', 'convenio 1','2015/01/01','2016/01/01','ejemplo 1','Universidad Nacional Experimental del Tachira','www.unet.edu.ve/convenio1/djndkjaskd.pdf','2','1','1','2','1',null),
('02', 'convenio 2','2014/01/01','2015/01/01','ejemplo 2','Universidad Nacional Experimental del Tachira','www.unet.edu.ve/convenio1/djndkjaskd.pdf','2','1','1','2','1',null);
('03', 'convenio 3','2015/02/01','2017/01/01','ejemplo 3','Universidad Nacional Experimental del Tachira','www.unet.edu.ve/convenio3/djndkjaskd.pdf','1','2','2','2','2','01'),
-- -----------------------------------------------------
-- Table `mydb`.`actividades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS actividades (
  idActividad VARCHAR(10) NOT NULL,
  descripcionActividad VARCHAR(200) NULL,
  PRIMARY KEY (idActividad));
-- -----------------------------------------------------
-- Table  mydb . responsables 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS  responsables  (
   idResponsable  VARCHAR(10) NOT NULL,
   primerNombreResponsable  VARCHAR(40) NOT NULL,
   segundoNombreResponsable VARCHAR(40) NULL,
   primerApellidoResponsable VARCHAR(60) NOT NULL,
   segundoApellidoResponsable VARCHAR(60) NULL,
   correoElectronicoResponsable  VARCHAR(100) NULL,
   telefonoResponsable  VARCHAR(50) NULL,
   instituciones_idInstitucion  VARCHAR(10) NOT NULL,
   dependencias_idDependencia  VARCHAR(10) NOT NULL,
  PRIMARY KEY ( idResponsable ),
  CONSTRAINT  fk_responsables_instituciones1 
    FOREIGN KEY ( instituciones_idInstitucion )
    REFERENCES  instituciones  ( idInstitucion ),
  CONSTRAINT  fk_responsables_dependencias1 
    FOREIGN KEY ( dependencias_idDependencia )
    REFERENCES   dependencias  ( idDependencia ));
-- -----------------------------------------------------
-- Table  mydb . estadoConvenios 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS  estadoConvenios  (
   idEstadoConvenio  VARCHAR(10) NOT NULL,
   nombreEstadoConvenio  VARCHAR(100) NOT NULL,
   descripcionEstadoConvenio  VARCHAR(100) NOT NULL,
  PRIMARY KEY ( idEstadoConvenio ));

INSERT INTO estadoConvenios (idEstadoConvenio,nombreEstadoConvenio,descripcionEstadoConvenio) VALUES
('1', 'Memo S.C Juridica',''),
('2', 'Memo R.C Juridica',''),
('3', 'Resolucion C.U Nro1',''),
('4', 'Memo DICIPREP',''),
('5', 'Resolucion C.U Aprobado','');


-- -----------------------------------------------------
-- Table    presupuestos 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS    presupuestos  (
   idPresupuesto  VARCHAR(10) NOT NULL,
   descripcionPresupuesto  VARCHAR(50) NULL,
  PRIMARY KEY ( idPresupuesto ));
-- -----------------------------------------------------
-- Table    unidades 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS    unidades  (
   idUnidad  VARCHAR(10) NOT NULL,
   descripcionUnidad  VARCHAR(100) NULL,
  PRIMARY KEY ( idUnidad ));
-- -----------------------------------------------------
-- Table    aportes 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS    aportes  (
   idAporte  VARCHAR(10) NOT NULL,
   descripcionAporte  VARCHAR(50) NULL,
  PRIMARY KEY ( idAporte ));
-- -----------------------------------------------------
-- Table    monedas 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS    monedas  (
   idMoneda  INT NOT NULL,
   descripcionMoneda  VARCHAR(50) NULL,
  PRIMARY KEY ( idMoneda ));

INSERT INTO `monedas` (`idMoneda`, `descripcionMoneda`) VALUES ('1', 'Bolivares'), ('2', 'Dolares');
-- -----------------------------------------------------
-- Table    actaIntencion 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS    actaIntencion  (
   idActaIntencion  VARCHAR(10) NOT NULL,
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
   idRenovacionProrroga  VARCHAR(10) NOT NULL,
   fechaInicioProrroga  DATE NULL,
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
-- -----------------------------------------------------
-- Table    institucion_convenios 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS    institucion_convenios  (
   idInstitucionConvenio VARCHAR(10) NOT NULL,
   instituciones_idInstitucion  VARCHAR(10) NOT NULL,
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

INSERT INTO institucion_convenios (idInstitucionConvenio,instituciones_idInstitucion,convenios_idConvenio, fechaIncorporacion) VALUES
('101', '1','01','2016/01/01'),
('201', '2','01','2016/01/01'),
('102', '1','02','2016/01/01'),
('202', '3','02','2016/01/01'),
('103', '1','03','2016/01/01');





-- -----------------------------------------------------
-- Table    historicoResponsables 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS   historicoResponsables  (
   idHistoricoResponsable  VARCHAR(10) NOT NULL,
   responsables_idResponsable  VARCHAR(10) NOT NULL,
   convenios_idConvenio  VARCHAR(50) NULL,
   institucion_convenios_idInstitucionConvenio VARCHAR(10) NULL,
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
    ON UPDATE NO ACTION,
  CONSTRAINT uk_historicoResponsables  UNIQUE (convenios_idConvenio,institucion_convenios_idInstitucionConvenio),
  CONSTRAINT chk_historicoResponsables CHECK((convenios_idConvenio IS NULL  AND institucion_convenios_idInstitucionConvenio IS NOT NULL ) OR 
          (convenios_idConvenio IS NOT NULL  AND institucion_convenios_idInstitucionConvenio IS NULL)
          )
  );
-- -----------------------------------------------------
-- Table    convenio_Estados 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS    convenio_Estados  (
   id_convenio_estado VARCHAR(10) NOT NULL,
   convenios_idConvenio  VARCHAR(50) NOT NULL,
   estadoConvenios_idEstadoConvenio  VARCHAR(10) NOT NULL,
   fechaCambioEstado  DATE NOT NULL,
   numeroReporte  VARCHAR(10) NULL,
   observacionCambioEstado  TEXT NULL,
   dependencias_idDependencia  VARCHAR(10) NULL,
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


INSERT INTO convenio_Estados (id_convenio_estado,convenios_idConvenio,estadoConvenios_idEstadoConvenio,fechaCambioEstado,dependencias_idDependencia) VALUES
('101','01','1','2015/02/02','2'),
('201','01','2','2015/03/02','2'),
('301','01','3','2015/03/5','1'),
('401','01','4','2015/03/6','1'),
('501','01','5','2015/03/10','1'),
('102','02','1','2014/02/02','2'),
('202','02','2','2014/03/02','2'),
('302','02','3','2014/03/5','1'),
('402','02','4','2014/03/6','1'),
('502','02','5','2014/03/12','1'),
('103','03','5','2015/03/10','1');


-- -----------------------------------------------------
-- Table    convenio_actividades 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS    convenio_actividades  (
   id_convenio_actividades VARCHAR(10) NOT NULL,
   convenios_idConvenio  VARCHAR(50) NOT NULL,
   actividades_idActividad  VARCHAR(10) NOT NULL,
  PRIMARY KEY (id_convenio_actividades),
  INDEX  fk_convenios_has_actividades_actividades1_idx  ( actividades_idActividad  ASC),
  INDEX  fk_convenios_has_actividades_convenios1_idx  ( convenios_idConvenio  ASC),
  CONSTRAINT  fk_convenios_has_actividades_convenios1 
    FOREIGN KEY ( convenios_idConvenio )
    REFERENCES    convenios  ( idConvenio )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT  fk_convenios_has_actividades_actividades1 
    FOREIGN KEY ( actividades_idActividad )
    REFERENCES    actividades  ( idActividad )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    CONSTRAINT uk_convenio_actividades  UNIQUE (convenios_idConvenio,actividades_idActividad));
-- -----------------------------------------------------
-- Table    convenio_presupuestos 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS    convenio_presupuestos  (
   id_convenio_presupuesto VARCHAR (10) NOT NULL,
   convenios_idConvenio  VARCHAR(50) NOT NULL,
   presupuestos_idPresupuesto  VARCHAR(10) NOT NULL,
   costo  DOUBLE NOT NULL,
  PRIMARY KEY (id_convenio_presupuesto),
  INDEX  fk_convenios_has_presupuestos_presupuestos1_idx  ( presupuestos_idPresupuesto  ASC),
  INDEX  fk_convenios_has_presupuestos_convenios1_idx  ( convenios_idConvenio  ASC),
  CONSTRAINT  fk_convenios_has_presupuestos_convenios1 
    FOREIGN KEY ( convenios_idConvenio )
    REFERENCES    convenios  ( idConvenio )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT  fk_convenios_has_presupuestos_presupuestos1 
    FOREIGN KEY ( presupuestos_idPresupuesto )
    REFERENCES    presupuestos  ( idPresupuesto )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    CONSTRAINT uk_convenio_presupuesto  UNIQUE (convenios_idConvenio,presupuestos_idPresupuesto));
-- -----------------------------------------------------
-- Table    convenio_aportes 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS    convenio_aportes  (
   id_convenio_aporte VARCHAR(10) NOT NULL,
   convenios_idConvenio  VARCHAR(50) NOT NULL,
   aportes_idAporte  VARCHAR(10) NOT NULL,
   valor  VARCHAR(45) NULL,
   monedas_idMoneda  INT NOT NULL,
  PRIMARY KEY ( id_convenio_aporte),
  INDEX  fk_convenios_has_aportes_aportes1_idx  ( aportes_idAporte  ASC),
  INDEX  fk_convenios_has_aportes_convenios1_idx  ( convenios_idConvenio  ASC),
  INDEX  fk_convenio_aportes_monedas1_idx  ( monedas_idMoneda  ASC),
  
  CONSTRAINT  fk_convenios_has_aportes_convenios1 
    FOREIGN KEY ( convenios_idConvenio )
    REFERENCES    convenios  ( idConvenio )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT  fk_convenios_has_aportes_aportes1 
    FOREIGN KEY ( aportes_idAporte )
    REFERENCES    aportes  ( idAporte )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT  fk_convenio_aportes_monedas1 
    FOREIGN KEY ( monedas_idMoneda )
    REFERENCES    monedas  ( idMoneda )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    CONSTRAINT uk_convenio_aporte  UNIQUE (convenios_idConvenio,aportes_idAporte));
  
-- -----------------------------------------------------
-- Table    informes 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS    informes  (
   idInforme  VARCHAR(10) NOT NULL,
   convenios_idConvenio  VARCHAR(50) NOT NULL,
  PRIMARY KEY ( idInforme ),
  INDEX  fk_informes_convenios1_idx  ( convenios_idConvenio  ASC),
  CONSTRAINT  fk_informes_convenios1 
    FOREIGN KEY ( convenios_idConvenio )
    REFERENCES    convenios  ( idConvenio )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
-- -----------------------------------------------------
-- Table    criterios 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS    criterios  (
   idCriterio  VARCHAR(10) NOT NULL,
   descripcionCriterio  VARCHAR(50) NOT NULL,
  PRIMARY KEY ( idCriterio ));
-- -----------------------------------------------------
-- Table    convenio_criterios 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS    convenio_criterios  (
   informes_idInforme  VARCHAR(10) NOT NULL,
   criterios_idCriterio  VARCHAR(10) NOT NULL,
   unidades_idUnidad  VARCHAR(10) NOT NULL,
  PRIMARY KEY ( informes_idInforme ,  criterios_idCriterio ),
  INDEX  fk_informes_has_criterios_criterios1_idx  ( criterios_idCriterio  ASC),
  INDEX  fk_informes_has_criterios_informes1_idx  ( informes_idInforme  ASC),
  INDEX  fk_convenio_criterios_unidades1_idx  ( unidades_idUnidad  ASC),
  CONSTRAINT  fk_informes_has_criterios_informes1 
    FOREIGN KEY ( informes_idInforme )
    REFERENCES    informes  ( idInforme )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT  fk_informes_has_criterios_criterios1 
    FOREIGN KEY ( criterios_idCriterio )
    REFERENCES    criterios  ( idCriterio )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT  fk_convenio_criterios_unidades1 
    FOREIGN KEY ( unidades_idUnidad )
    REFERENCES    unidades  ( idUnidad )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
/* INSERSIONES*/
INSERT INTO `tipoconvenios` (`idTipoConvenio`, `descripcionTipoConvenio`) VALUES ('1', 'marco');
INSERT INTO `tipoconvenios` (`idTipoConvenio`, `descripcionTipoConvenio`) VALUES ('2', 'especifico');

INSERT INTO `clasificacionconvenios` (`idClasificacionConvenio`, `nombreClasificacionConvenio`, `descripcionClasificacionConvenio`) VALUES ('1', 'academico', '');
INSERT INTO `clasificacionconvenios` (`idClasificacionConvenio`, `nombreClasificacionConvenio`, `descripcionClasificacionConvenio`) VALUES ('2', 'cultural', '');

INSERT INTO `alcanceconvenios` (`idAlcanceConvenio`, `descripcionAlcanceConvenio`) VALUES ('1', 'Global');
INSERT INTO `alcanceconvenios` (`idAlcanceConvenio`, `descripcionAlcanceConvenio`) VALUES ('2', 'Local');

INSERT INTO `formaconvenios` (`idFormaConvenio`, `descripcionFormaConvenio`) VALUES ('1', 'Unilateral');
INSERT INTO `formaconvenios` (`idFormaConvenio`, `descripcionFormaConvenio`) VALUES ('2', 'Bilateral');

/*AUTO INCREMENT ESTE NO */
ALTER TABLE `institucion_convenios` CHANGE `idInstitucionConvenio` `idInstitucionConvenio` VARCHAR(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL AUTO_INCREMENT;

/*Pruebas de consultas*/

/*$criteria=new CDbCriteria;
      $criteria->select='idConvenio,nombreConvenio,fechaInicioConvenio,fechaCaducidadConvenio,objetivoConvenio';  
      $criteria->condition='YEAR(fechaInicioConvenio)=:fechaInicioConvenio';
      $criteria->params=array(':fechaInicioConvenio'=>$formConsulta->anio);
      $resull=convenios::model()->findAll($criteria);
*/
/* otra opcion para buscar ya que al obtener los datos de un modelo que no era convenios como los paso
      a la vista. Imposible.aunque si puedo hacer join. :/ 
      $criteria=new CDbCriteria;
      $criteria->select='idConvenio,nombreConvenio,fechaInicioConvenio,fechaCaducidadConvenio,objetivoConvenio, tipoConvenios_idTipoConvenio,tp.descripcionTipoConvenio';
      $criteria->join='INNER JOIN tipoconvenios tp ON tp.idTipoConvenio = tipoConvenios_idTipoConvenio';  
      $criteria->condition='YEAR(fechaInicioConvenio)=:fechaInicioConvenio';
      $criteria->params=array(':fechaInicioConvenio'=>$formConsulta->anio);
      $resull=convenios::model()->find($criteria);*/


    /*Para obtener el tipo. $resull2=tipoconvenios::model()->find('idTipoConvenio=:idTipoConvenio', array(':idTipoConvenio'=>$resull->tipoConvenios_idTipoConvenio));

/*validar que la fecha de los cambios de estado esten entre la fecha de inscripcion del convenio y la fecha de 
caducidad ojo con esto*/


 /* $consulta  = "SELECT c.nombreConvenio, c.fechaInicioConvenio, c.fechaCaducidadConvenio, tc.descripcionTipoConvenio, ec.nombreEstadoConvenio FROM convenios c ";
        $consulta .= "JOIN tipoconvenios tc ON tc.idTipoConvenio = c.tipoConvenios_idTipoConvenio ";
        $consulta .= "JOIN convenio_estados ce ON ce.convenios_idConvenio=c.idConvenio ";
        $consulta .= "JOIN estadoconvenios ec ON ce.estadoConvenios_idEstadoConvenio=ec.idEstadoConvenio ";
        $consulta .= "WHERE ce.fechaCambioEstado = (
              SELECT MAX( fechaCambioEstado ) 
              FROM convenio_estados
              WHERE convenios_idConvenio = c.idConvenio
              ) and c.idConvenio IN (".$rest.")";

*/
SELECT c.nombreConvenio, ec.nombreEstadoConvenio
FROM convenios c
join convenio_estados ce ON ce.convenios_idConvenio=c.idConvenio
join estadoconvenios ec ON ce.estadoConvenios_idEstadoConvenio=ec.idEstadoConvenio;

SELECT MAX(ce.fechaCambioEstado),c.nombreConvenio, ec.nombreEstadoConvenio
FROM convenios c
join convenio_estados ce ON ce.convenios_idConvenio=c.idConvenio
join estadoconvenios ec ON ce.estadoConvenios_idEstadoConvenio=ec.idEstadoConvenio;

SELECT MAX(ce.fechaCambioEstado),c.nombreConvenio, ec.nombreEstadoConvenio
FROM convenios c
join convenio_estados ce ON ce.convenios_idConvenio=c.idConvenio
join estadoconvenios ec ON ce.estadoConvenios_idEstadoConvenio=ec.idEstadoConvenio
where c.idConvenio="01";

SELECT MAX( ce.fechaCambioEstado ) , c.nombreConvenio, tc.descripcionTipoConvenio, ec.nombreEstadoConvenio
FROM convenios c
JOIN tipoconvenios tc ON tc.idTipoConvenio=c.tipoConvenios_idTipoConvenio
JOIN convenio_estados ce ON ce.convenios_idConvenio = c.idConvenio
JOIN estadoconvenios ec ON ce.estadoConvenios_idEstadoConvenio = ec.idEstadoConvenio
WHERE c.idConvenio =  "01"

SELECT c.nombreConvenio, tc.descripcionTipoConvenio, c.fechaInicioConvenio, c.fechaCaducidadConvenio, c.objetivoConvenio, ec.nombreEstadoConvenio
FROM convenios c
JOIN tipoconvenios tc ON tc.idTipoConvenio = c.tipoConvenios_idTipoConvenio
JOIN convenio_estados ce ON ce.convenios_idConvenio = c.idConvenio
JOIN estadoconvenios ec ON ce.estadoConvenios_idEstadoConvenio = ec.idEstadoConvenio

la subconsulta jeje REVISAR. 

SELECT c.nombreConvenio, c.fechaInicioConvenio, c.fechaCaducidadConvenio, tc.descripcionTipoConvenio, ec.nombreEstadoConvenio, 
inst.siglasInstitucion, tinst.nombreTipoInstitucion, edo.nombreEstado, ps.nombrePais
FROM convenios c
JOIN tipoconvenios tc ON tc.idTipoConvenio = c.tipoConvenios_idTipoConvenio
JOIN convenio_estados ce ON ce.convenios_idConvenio = c.idConvenio
JOIN estadoconvenios ec ON ce.estadoConvenios_idEstadoConvenio = ec.idEstadoConvenio
JOIN institucion_convenios ic ON c.idConvenio = ic.convenios_idConvenio
JOIN instituciones inst ON inst.idInstitucion=ic.instituciones_idInstitucion
JOIN tiposInstituciones tinst ON  tinst.idTipoInstitucion=inst.tiposInstituciones_idTipoInstitucion 
JOIN estados edo ON edo.idEstado = inst.estados_idEstado
JOIN paises ps ON ps.idPais=edo.paises_idPais
WHERE ce.fechaCambioEstado = (

SELECT MAX( fechaCambioEstado ) 
FROM convenio_estados
WHERE convenios_idConvenio = c.idConvenio
)

SELECT c.nombreConvenio, tc.descripcionTipoConvenio, c.fechaInicioConvenio, c.fechaCaducidadConvenio, c.objetivoConvenio, ec.nombreEstadoConvenio
FROM convenios c
JOIN tipoconvenios tc ON tc.idTipoConvenio = c.tipoConvenios_idTipoConvenio
JOIN convenio_estados ce ON ce.convenios_idConvenio = c.idConvenio
JOIN estadoconvenios ec ON ce.estadoConvenios_idEstadoConvenio = ec.idEstadoConvenio
WHERE ce.fechaCambioEstado = (

SELECT MAX( fechaCambioEstado ) 
FROM convenio_estados
WHERE convenios_idConvenio = c.idConvenio
) and  c.idConvenio IN ("01","03");


