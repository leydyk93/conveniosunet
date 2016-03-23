<?php

/**
 * This is the model class for table "convenio".
 *
 * The followings are the available columns in table 'convenio':
 * @property string $cod_convenio
 * @property string $nombre_convenio
 * @property string $fecha_creacion
 * @property string $fecha_caducidad
 * @property string $institucion_UNET
 * @property string $objetivo_covenio
 * @property string $cod_clasificacion
 *
 * The followings are the available model relations:
 * @property Clasificacion $codClasificacion
 */
class Convenio extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'convenio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cod_convenio, nombre_convenio, fecha_creacion, fecha_caducidad', 'required'),
			array('cod_convenio, institucion_UNET', 'length', 'max'=>50),
			array('nombre_convenio', 'length', 'max'=>100),
			array('cod_clasificacion', 'length', 'max'=>25),
			array('objetivo_covenio', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('cod_convenio, nombre_convenio, fecha_creacion, fecha_caducidad, institucion_UNET, objetivo_covenio, cod_clasificacion', 'safe', 'on'=>'search'),
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
			'codClasificacion' => array(self::BELONGS_TO, 'Clasificacion', 'cod_clasificacion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cod_convenio' => 'Cod Convenio',
			'nombre_convenio' => 'Nombre Convenio',
			'fecha_creacion' => 'Fecha Creacion',
			'fecha_caducidad' => 'Fecha Caducidad',
			'institucion_UNET' => 'Institucion Unet',
			'objetivo_covenio' => 'Objetivo Covenio',
			'cod_clasificacion' => 'Cod Clasificacion',
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

		$criteria->compare('cod_convenio',$this->cod_convenio,true);
		$criteria->compare('nombre_convenio',$this->nombre_convenio,true);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('fecha_caducidad',$this->fecha_caducidad,true);
		$criteria->compare('institucion_UNET',$this->institucion_UNET,true);
		$criteria->compare('objetivo_covenio',$this->objetivo_covenio,true);
		$criteria->compare('cod_clasificacion',$this->cod_clasificacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Convenio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
