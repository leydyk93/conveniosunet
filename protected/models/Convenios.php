<?php

/**
 * This is the model class for table "convenios".
 *
 * The followings are the available columns in table 'convenios':
 * @property string $idConvenio
 * @property string $nombreConvenio
 * @property string $fechaCaducidadConvenio
 * @property string $objetivoConvenio
 * @property string $institucionUNET
 * @property string $urlConvenio
 * @property string $clasificacionConvenios_idTipoConvenio
 * @property string $tipoConvenios_idTipoConvenio
 * @property string $alcanceConvenios_idAlcanceConvenio
 * @property string $formaConvenios_idFormaConvenio
 * @property string $dependencias_idDependencia
 * @property string $convenios_idConvenio
 *
 * The followings are the available model relations:
 * @property Actaintencion[] $actaintencions
 * @property Actividades[] $actividades
 * @property Aportes[] $aportes
 * @property Estadoconvenios[] $estadoconvenioses
 * @property Presupuestos[] $presupuestoses
 * @property Alcanceconvenios $alcanceConveniosIdAlcanceConvenio
 * @property Clasificacionconvenios $clasificacionConveniosIdTipoConvenio
 * @property Convenios $conveniosIdConvenio
 * @property Convenios[] $convenioses
 * @property Dependencias $dependenciasIdDependencia
 * @property Formaconvenios $formaConveniosIdFormaConvenio
 * @property Tipoconvenios $tipoConveniosIdTipoConvenio
 * @property Historicoresponsables[] $historicoresponsables
 * @property Informes[] $informes
 * @property Instituciones[] $instituciones
 * @property Renovacionprorrogas[] $renovacionprorrogases
 */
class Convenios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'convenios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idConvenio, nombreConvenio, fechaCaducidadConvenio, objetivoConvenio, institucionUNET, urlConvenio, clasificacionConvenios_idTipoConvenio, tipoConvenios_idTipoConvenio, alcanceConvenios_idAlcanceConvenio, formaConvenios_idFormaConvenio, dependencias_idDependencia, convenios_idConvenio', 'required'),
			array('idConvenio, institucionUNET, convenios_idConvenio', 'length', 'max'=>50),
			array('nombreConvenio', 'length', 'max'=>200),
			array('urlConvenio', 'length', 'max'=>100),
			array('clasificacionConvenios_idTipoConvenio, tipoConvenios_idTipoConvenio, alcanceConvenios_idAlcanceConvenio, formaConvenios_idFormaConvenio, dependencias_idDependencia', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idConvenio, nombreConvenio, fechaCaducidadConvenio, objetivoConvenio, institucionUNET, urlConvenio, clasificacionConvenios_idTipoConvenio, tipoConvenios_idTipoConvenio, alcanceConvenios_idAlcanceConvenio, formaConvenios_idFormaConvenio, dependencias_idDependencia, convenios_idConvenio', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'actaintencions' => array(self::HAS_MANY, 'Actaintencion', 'convenios_idConvenio'),
			'actividades' => array(self::MANY_MANY, 'Actividades', 'convenio_actividades(convenios_idConvenio, actividades_idActividad)'),
			'aportes' => array(self::MANY_MANY, 'Aportes', 'convenio_aportes(convenios_idConvenio, aportes_idAporte)'),
			'estadoconvenioses' => array(self::MANY_MANY, 'Estadoconvenios', 'convenio_estados(convenios_idConvenio, estadoConvenios_idEstadoConvenio)'),
			'presupuestoses' => array(self::MANY_MANY, 'Presupuestos', 'convenio_presupuestos(convenios_idConvenio, presupuestos_idPresupuesto)'),
			'alcanceConveniosIdAlcanceConvenio' => array(self::BELONGS_TO, 'Alcanceconvenios', 'alcanceConvenios_idAlcanceConvenio'),
			'clasificacionConveniosIdTipoConvenio' => array(self::BELONGS_TO, 'Clasificacionconvenios', 'clasificacionConvenios_idTipoConvenio'),
			'conveniosIdConvenio' => array(self::BELONGS_TO, 'Convenios', 'convenios_idConvenio'),
			'convenioses' => array(self::HAS_MANY, 'Convenios', 'convenios_idConvenio'),
			'dependenciasIdDependencia' => array(self::BELONGS_TO, 'Dependencias', 'dependencias_idDependencia'),
			'formaConveniosIdFormaConvenio' => array(self::BELONGS_TO, 'Formaconvenios', 'formaConvenios_idFormaConvenio'),
			'tipoConveniosIdTipoConvenio' => array(self::BELONGS_TO, 'Tipoconvenios', 'tipoConvenios_idTipoConvenio'),
			'historicoresponsables' => array(self::HAS_MANY, 'Historicoresponsables', 'convenios_idConvenio'),
			'informes' => array(self::HAS_MANY, 'Informes', 'convenios_idConvenio'),
			'instituciones' => array(self::MANY_MANY, 'Instituciones', 'institucion_convenios(convenios_idConvenio, instituciones_idInstitucion)'),
			'renovacionprorrogases' => array(self::HAS_MANY, 'Renovacionprorrogas', 'convenios_idConvenio'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idConvenio' => 'Codigo: ',
			'nombreConvenio' => 'Nombre: ',
			'fechaCaducidadConvenio' => 'Fecha Caducidad: ',
			'objetivoConvenio' => 'Objeto: ',
			'institucionUNET' => 'Institucion: ',
			'urlConvenio' => 'Url: ',
			'clasificacionConvenios_idTipoConvenio' => 'Clasificacion: ',
			'tipoConvenios_idTipoConvenio' => 'Tipo: ',
			'alcanceConvenios_idAlcanceConvenio' => 'Alcance: ',
			'formaConvenios_idFormaConvenio' => 'Forma: ',
			'dependencias_idDependencia' => 'Dependencia: ',
			'convenios_idConvenio' => 'Convenios Id Convenio',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idConvenio',$this->idConvenio,true);
		$criteria->compare('nombreConvenio',$this->nombreConvenio,true);
		$criteria->compare('fechaCaducidadConvenio',$this->fechaCaducidadConvenio,true);
		$criteria->compare('objetivoConvenio',$this->objetivoConvenio,true);
		$criteria->compare('institucionUNET',$this->institucionUNET,true);
		$criteria->compare('urlConvenio',$this->urlConvenio,true);
		$criteria->compare('clasificacionConvenios_idTipoConvenio',$this->clasificacionConvenios_idTipoConvenio,true);
		$criteria->compare('tipoConvenios_idTipoConvenio',$this->tipoConvenios_idTipoConvenio,true);
		$criteria->compare('alcanceConvenios_idAlcanceConvenio',$this->alcanceConvenios_idAlcanceConvenio,true);
		$criteria->compare('formaConvenios_idFormaConvenio',$this->formaConvenios_idFormaConvenio,true);
		$criteria->compare('dependencias_idDependencia',$this->dependencias_idDependencia,true);
		$criteria->compare('convenios_idConvenio',$this->convenios_idConvenio,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Convenios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
