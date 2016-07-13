<?php

/**
 * This is the model class for table "convenio_estados".
 *
 * The followings are the available columns in table 'convenio_estados':
 * @property integer $id_convenio_estado
 * @property string $convenios_idConvenio
 * @property integer $estadoConvenios_idEstadoConvenio
 * @property string $fechaCambioEstado
 * @property string $numeroReporte
 * @property string $observacionCambioEstado
 * @property integer $dependencias_idDependencia
 *
 * The followings are the available model relations:
 * @property Dependencias $dependenciasIdDependencia
 * @property Convenios $conveniosIdConvenio
 * @property Estadoconvenios $estadoConveniosIdEstadoConvenio
 */
class ConvenioEstados extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'convenio_estados';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('convenios_idConvenio, estadoConvenios_idEstadoConvenio, fechaCambioEstado', 'required'),
			array('estadoConvenios_idEstadoConvenio, dependencias_idDependencia', 'numerical', 'integerOnly'=>true),
			array('convenios_idConvenio', 'length', 'max'=>50),
			array('numeroReporte', 'length', 'max'=>10),
			array('observacionCambioEstado', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_convenio_estado, convenios_idConvenio, estadoConvenios_idEstadoConvenio, fechaCambioEstado, numeroReporte, observacionCambioEstado, dependencias_idDependencia', 'safe', 'on'=>'search'),
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
			'dependenciasIdDependencia' => array(self::BELONGS_TO, 'Dependencias', 'dependencias_idDependencia'),
			'conveniosIdConvenio' => array(self::BELONGS_TO, 'Convenios', 'convenios_idConvenio'),
			'estadoConveniosIdEstadoConvenio' => array(self::BELONGS_TO, 'Estadoconvenios', 'estadoConvenios_idEstadoConvenio'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_convenio_estado' => 'Id Convenio Estado',
			'convenios_idConvenio' => 'Convenios Id Convenio',
			'estadoConvenios_idEstadoConvenio' => 'Estado Convenios Id Estado Convenio',
			'fechaCambioEstado' => 'Fecha Cambio Estado',
			'numeroReporte' => 'Numero Reporte',
			'observacionCambioEstado' => 'Observacion Cambio Estado',
			'dependencias_idDependencia' => 'Dependencias Id Dependencia',
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

		$criteria->compare('id_convenio_estado',$this->id_convenio_estado);
		$criteria->compare('convenios_idConvenio',$this->convenios_idConvenio,true);
		$criteria->compare('estadoConvenios_idEstadoConvenio',$this->estadoConvenios_idEstadoConvenio);
		$criteria->compare('fechaCambioEstado',$this->fechaCambioEstado,true);
		$criteria->compare('numeroReporte',$this->numeroReporte,true);
		$criteria->compare('observacionCambioEstado',$this->observacionCambioEstado,true);
		$criteria->compare('dependencias_idDependencia',$this->dependencias_idDependencia);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ConvenioEstados the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
