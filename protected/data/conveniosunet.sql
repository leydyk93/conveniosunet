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
    foreign key (`IdRol`) references `roles` (`ID`) on delete cascade on update cascade

);

INSERT INTO usuario (nombre, clave, correo, fecha_creacion,IdRol) VALUES ('test1', 'pass1', 'test1@example.com','2016/01/01','2');
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
-- -----------------------------------------------------
-- Table `mydb`.`alcanceConvenios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS alcanceConvenios (
  idAlcanceConvenio VARCHAR(10) NOT NULL,
  descripcionAlcanceConvenio VARCHAR(50) NOT NULL,
  PRIMARY KEY (idAlcanceConvenio));
-- -----------------------------------------------------
-- Table `mydb`.`formaConvenios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS formaConvenios (
  idFormaConvenio VARCHAR(10) NOT NULL,
  descripcionFormaConvenio VARCHAR(50) NOT NULL,
  PRIMARY KEY (idFormaConvenio));

-- -----------------------------------------------------
-- Table `mydb`.`tiposInstituciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS tiposInstituciones (
  idTipoInstitucion VARCHAR(10) NOT NULL,
  nombreTipoInstitucion VARCHAR(50) NOT NULL,
  PRIMARY KEY (idTipoInstitucion));
-- -----------------------------------------------------
-- Table `mydb`.`paises`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS paises (
  idPais VARCHAR(10) NOT NULL,
  nombrePais VARCHAR(100) NOT NULL,
  PRIMARY KEY (idPais));
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
-- -----------------------------------------------------
-- Table `mydb`.`instituciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS instituciones (
  idInstitucion VARCHAR(10) NOT NULL,
  nombreInstitucion VARCHAR(200) NOT NULL,
  estados_idEstado VARCHAR(10) NOT NULL,
  tiposInstituciones_idTipoInstitucion VARCHAR(10) NOT NULL,
  PRIMARY KEY (idInstitucion),
  CONSTRAINT fk_instituciones_estados1
    FOREIGN KEY (estados_idEstado)
    REFERENCES estados (idEstado),
  CONSTRAINT fk_instituciones_tiposInstituciones1
    FOREIGN KEY (tiposInstituciones_idTipoInstitucion)
    REFERENCES tiposInstituciones (idTipoInstitucion));
-- -----------------------------------------------------
-- Table `mydb`.`tipoConvenios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS tipoConvenios (
  idTipoConvenio VARCHAR(10) NOT NULL,
  descripcionTipoConvenio VARCHAR(100) NOT NULL,
  PRIMARY KEY (idTipoConvenio));
-- -----------------------------------------------------
-- Table `mydb`.`dependencias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS dependencias (
  idDependencia VARCHAR(10) NOT NULL,
  nombreDependencia VARCHAR(100) NULL,
  telefonoDependencia VARCHAR(50) NULL,
  PRIMARY KEY (idDependencia));
-- -----------------------------------------------------
-- Table `mydb`.`convenios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS convenios (
  idConvenio VARCHAR(50) NOT NULL,
  nombreConvenio VARCHAR(200) NOT NULL,
  fechaCaducidadConvenio DATETIME NOT NULL,
  objetivoConvenio TEXT NOT NULL,
  institucionUNET VARCHAR(50) NOT NULL,
  urlConvenio VARCHAR(100) NOT NULL,
  clasificacionConvenios_idTipoConvenio VARCHAR(10) NOT NULL,
  tipoConvenios_idTipoConvenio VARCHAR(10) NOT NULL,
  alcanceConvenios_idAlcanceConvenio VARCHAR(10) NOT NULL,
  formaConvenios_idFormaConvenio VARCHAR(10) NOT NULL,
  dependencias_idDependencia VARCHAR(10) NOT NULL,
  convenios_idConvenio VARCHAR(50) NOT NULL,

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
   nombreResponsable  VARCHAR(100) NULL,
   correoElectronicoResponsable  VARCHAR(100) NULL,
   telefonoResponsable  VARCHAR(50) NULL,
   instituciones_idInstitucion  VARCHAR(10) NOT NULL,
   dependencias_idDependencia  VARCHAR(10) NOT NULL,
  PRIMARY KEY ( idResponsable ,  dependencias_idDependencia ),
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
   instituciones_idInstitucion  VARCHAR(10) NOT NULL,
   convenios_idConvenio  VARCHAR(50) NOT NULL,
   fechaIncorporacion  DATETIME NOT NULL,
  PRIMARY KEY ( instituciones_idInstitucion ,  convenios_idConvenio ),
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
    ON UPDATE NO ACTION);

-- -----------------------------------------------------
-- Table    historicoResponsables 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS    historicoResponsables  (
   idHistoricoResponsables  VARCHAR(10) NOT NULL,
   responsables_idResponsable  VARCHAR(10) NOT NULL,
   convenios_idConvenio  VARCHAR(50) NULL,
   institucion_convenios_instituciones_idInstitucion  VARCHAR(10) NULL,
   institucion_convenios_convenios_idConvenio  VARCHAR(50) NULL,
   fechaAsignacionResponsable  DATETIME NOT NULL,
   fechaRetiroResponsable  DATETIME NULL,
  PRIMARY KEY ( idHistoricoResponsables ),
  INDEX  fk_historicoResponsables_responsables1_idx  ( responsables_idResponsable  ASC),
  INDEX  fk_historicoResponsables_convenios1_idx  ( convenios_idConvenio  ASC),
  INDEX  fk_historicoResponsables_institucion_convenios1_idx  ( institucion_convenios_instituciones_idInstitucion  ASC,  institucion_convenios_convenios_idConvenio  ASC),
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
    FOREIGN KEY ( institucion_convenios_instituciones_idInstitucion  ,  institucion_convenios_convenios_idConvenio )
    REFERENCES    institucion_convenios  ( instituciones_idInstitucion  ,  convenios_idConvenio )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
-- -----------------------------------------------------
-- Table    convenio_Estados 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS    convenio_Estados  (
   convenios_idConvenio  VARCHAR(50) NOT NULL,
   estadoConvenios_idEstadoConvenio  VARCHAR(10) NOT NULL,
   fechaCambioEstado  DATETIME NOT NULL,
   numeroReporte  VARCHAR(10) NULL,
   observacionCambioEstado  TEXT NULL,
   dependencias_idDependencia  VARCHAR(10) NOT NULL,
  PRIMARY KEY ( convenios_idConvenio ,  estadoConvenios_idEstadoConvenio ),
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
    ON UPDATE NO ACTION);
-- -----------------------------------------------------
-- Table    convenio_actividades 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS    convenio_actividades  (
   convenios_idConvenio  VARCHAR(50) NOT NULL,
   actividades_idActividad  VARCHAR(10) NOT NULL,
  PRIMARY KEY ( convenios_idConvenio ,  actividades_idActividad ),
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
    ON UPDATE NO ACTION);
-- -----------------------------------------------------
-- Table    convenio_presupuestos 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS    convenio_presupuestos  (
   convenios_idConvenio  VARCHAR(50) NOT NULL,
   presupuestos_idPresupuesto  VARCHAR(10) NOT NULL,
   costo  DOUBLE NOT NULL,
  PRIMARY KEY ( convenios_idConvenio ,  presupuestos_idPresupuesto ),
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
    ON UPDATE NO ACTION);
-- -----------------------------------------------------
-- Table    convenio_aportes 
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS    convenio_aportes  (
   convenios_idConvenio  VARCHAR(50) NOT NULL,
   aportes_idAporte  VARCHAR(10) NOT NULL,
   valor  VARCHAR(45) NULL,
   monedas_idMoneda  INT NOT NULL,
  PRIMARY KEY ( convenios_idConvenio ,  aportes_idAporte ),
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
    ON UPDATE NO ACTION);
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
