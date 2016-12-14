<?php

/**
 * This is the model class for table "clasificacionconvenios".
 *
 * The followings are the available columns in table 'clasificacionconvenios':
 * @property integer $idClasificacionConvenio
 * @property string $nombreClasificacionConvenio
 * @property string $descripcionClasificacionConvenio
 *
 * The followings are the available model relations:
 * @property Convenios[] $convenioses
 */
class Clasificacionconvenios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'clasificacionconvenios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombreClasificacionConvenio, descripcionClasificacionConvenio', 'required'),
			array('nombreClasificacionConvenio', 'length', 'max'=>150),
			array('descripcionClasificacionConvenio', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idClasificacionConvenio, nombreClasificacionConvenio, descripcionClasificacionConvenio', 'safe', 'on'=>'search'),
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
			'convenioses' => array(self::HAS_MANY, 'Convenios', 'clasificacionConvenios_idTipoConvenio'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idClasificacionConvenio' => 'Id Clasificacion Convenio',
			'nombreClasificacionConvenio' => 'Nombre Clasificacion ',
			'descripcionClasificacionConvenio' => 'Descripcion Clasificacion',
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

		$criteria->compare('idClasificacionConvenio',$this->idClasificacionConvenio);
		$criteria->compare('nombreClasificacionConvenio',$this->nombreClasificacionConvenio,true);
		$criteria->compare('descripcionClasificacionConvenio',$this->descripcionClasificacionConvenio,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Clasificacionconvenios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
