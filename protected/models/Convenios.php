<?php

/**
 * This is the model class for table "convenios".
 *
 * The followings are the available columns in table 'convenios':
 * @property string $idConvenio
 * @property string $nombreConvenio
 * @property string $fechaInicioConvenio
 * @property string $fechaCaducidadConvenio
 * @property string $objetivoConvenio
 * @property string $institucionUNET
 * @property string $urlConvenio
 * @property integer $clasificacionConvenios_idTipoConvenio
 * @property integer $tipoConvenios_idTipoConvenio
 * @property string $alcanceConvenios
 * @property integer $dependencias_idDependencia
 * @property string $convenios_idConvenio
 * @property integer $caducidadIndefinida
 *
 * The followings are the available model relations:
 * @property Actaintencion[] $actaintencions
 * @property ConvenioAportes[] $convenioAportes
 * @property ConvenioEstados[] $convenioEstadoses
 * @property Clasificacionconvenios $clasificacionConveniosIdTipoConvenio
 * @property Convenios $conveniosIdConvenio
 * @property Convenios[] $convenioses
 * @property Dependencias $dependenciasIdDependencia
 * @property Tipoconvenios $tipoConveniosIdTipoConvenio
 * @property Historicoresponsables[] $historicoresponsables
 * @property InstitucionConvenios[] $institucionConvenioses
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
			array('idConvenio, nombreConvenio', 'required'),
			array('clasificacionConvenios_idTipoConvenio, tipoConvenios_idTipoConvenio, dependencias_idDependencia, caducidadIndefinida', 'numerical', 'integerOnly'=>true),
			array('idConvenio, institucionUNET, convenios_idConvenio', 'length', 'max'=>50),
			array('nombreConvenio', 'length', 'max'=>200),
			array('urlConvenio', 'length', 'max'=>100),
			array('fechaInicioConvenio, fechaCaducidadConvenio, objetivoConvenio, alcanceConvenios', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idConvenio, nombreConvenio, fechaInicioConvenio, fechaCaducidadConvenio, objetivoConvenio, institucionUNET, urlConvenio, clasificacionConvenios_idTipoConvenio, tipoConvenios_idTipoConvenio, alcanceConvenios, dependencias_idDependencia, convenios_idConvenio, caducidadIndefinida', 'safe', 'on'=>'search'),
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
			'convenioAportes' => array(self::HAS_MANY, 'ConvenioAportes', 'convenios_idConvenio'),
			'convenioEstadoses' => array(self::HAS_MANY, 'ConvenioEstados', 'convenios_idConvenio'),
			'clasificacionConveniosIdTipoConvenio' => array(self::BELONGS_TO, 'Clasificacionconvenios', 'clasificacionConvenios_idTipoConvenio'),
			'conveniosIdConvenio' => array(self::BELONGS_TO, 'Convenios', 'convenios_idConvenio'),
			'convenioses' => array(self::HAS_MANY, 'Convenios', 'convenios_idConvenio'),
			'dependenciasIdDependencia' => array(self::BELONGS_TO, 'Dependencias', 'dependencias_idDependencia'),
			'tipoConveniosIdTipoConvenio' => array(self::BELONGS_TO, 'Tipoconvenios', 'tipoConvenios_idTipoConvenio'),
			'historicoresponsables' => array(self::HAS_MANY, 'Historicoresponsables', 'convenios_idConvenio'),
			'institucionConvenioses' => array(self::HAS_MANY, 'InstitucionConvenios', 'convenios_idConvenio'),
			'renovacionprorrogases' => array(self::HAS_MANY, 'Renovacionprorrogas', 'convenios_idConvenio'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idConvenio' => 'Id Convenio',
			'nombreConvenio' => 'Nombre Convenio',
			'fechaInicioConvenio' => 'Fecha Inicio Convenio',
			'fechaCaducidadConvenio' => 'Fecha Caducidad Convenio',
			'objetivoConvenio' => 'Objetivo Convenio',
			'institucionUNET' => 'Institucion Unet',
			'urlConvenio' => 'Url Convenio',
			'clasificacionConvenios_idTipoConvenio' => 'Clasificacion Convenios Id Tipo Convenio',
			'tipoConvenios_idTipoConvenio' => 'Tipo Convenios Id Tipo Convenio',
			'alcanceConvenios' => 'Alcance Convenios',
			'dependencias_idDependencia' => 'Dependencias Id Dependencia',
			'convenios_idConvenio' => 'Convenios Id Convenio',
			'caducidadIndefinida' => 'Caducidad Indefinida',
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
		$criteria->compare('fechaInicioConvenio',$this->fechaInicioConvenio,true);
		$criteria->compare('fechaCaducidadConvenio',$this->fechaCaducidadConvenio,true);
		$criteria->compare('objetivoConvenio',$this->objetivoConvenio,true);
		$criteria->compare('institucionUNET',$this->institucionUNET,true);
		$criteria->compare('urlConvenio',$this->urlConvenio,true);
		$criteria->compare('clasificacionConvenios_idTipoConvenio',$this->clasificacionConvenios_idTipoConvenio);
		$criteria->compare('tipoConvenios_idTipoConvenio',$this->tipoConvenios_idTipoConvenio);
		$criteria->compare('alcanceConvenios',$this->alcanceConvenios,true);
		$criteria->compare('dependencias_idDependencia',$this->dependencias_idDependencia);
		$criteria->compare('convenios_idConvenio',$this->convenios_idConvenio,true);
		$criteria->compare('caducidadIndefinida',$this->caducidadIndefinida);

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


		public static function maxId() {
	
// 
	  return Yii::app()->db->createCommand()
	    ->select('MAX(CAST(idConvenio as int))')
	    ->from('convenios')
	    ->queryScalar();
	}

}
