<?php

/**
 * This is the model class for table "instituciones".
 *
 * The followings are the available columns in table 'instituciones':
 * @property integer $idInstitucion
 * @property string $nombreInstitucion
 * @property string $siglasInstitucion
 * @property integer $estados_idEstado
 * @property integer $tiposInstituciones_idTipoInstitucion
 *
 * The followings are the available model relations:
 * @property InstitucionConvenios[] $institucionConvenioses
 * @property Estados $estadosIdEstado
 * @property Tiposinstituciones $tiposInstitucionesIdTipoInstitucion
 * @property Responsables[] $responsables
 */
class Instituciones extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'instituciones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombreInstitucion, estados_idEstado, tiposInstituciones_idTipoInstitucion', 'required'),
			array('estados_idEstado, tiposInstituciones_idTipoInstitucion', 'numerical', 'integerOnly'=>true),
			array('nombreInstitucion', 'length', 'max'=>200),
			array('siglasInstitucion', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idInstitucion, nombreInstitucion, siglasInstitucion, estados_idEstado, tiposInstituciones_idTipoInstitucion', 'safe', 'on'=>'search'),
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
			'institucionConvenioses' => array(self::HAS_MANY, 'InstitucionConvenios', 'instituciones_idInstitucion'),
			'estadosIdEstado' => array(self::BELONGS_TO, 'Estados', 'estados_idEstado'),
			'tiposInstitucionesIdTipoInstitucion' => array(self::BELONGS_TO, 'Tiposinstituciones', 'tiposInstituciones_idTipoInstitucion'),
			'responsables' => array(self::HAS_MANY, 'Responsables', 'instituciones_idInstitucion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idInstitucion' => 'Id Institucion',
			'nombreInstitucion' => 'Nombre Institucion',
			'siglasInstitucion' => 'Siglas Institucion',
			'estados_idEstado' => 'Estado ',
			'tiposInstituciones_idTipoInstitucion' => 'Tipo Institucion',
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

		$criteria->compare('idInstitucion',$this->idInstitucion);
		$criteria->compare('nombreInstitucion',$this->nombreInstitucion,true);
		$criteria->compare('siglasInstitucion',$this->siglasInstitucion,true);
		$criteria->compare('estados_idEstado',$this->estados_idEstado);
		$criteria->compare('tiposInstituciones_idTipoInstitucion',$this->tiposInstituciones_idTipoInstitucion);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Instituciones the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
