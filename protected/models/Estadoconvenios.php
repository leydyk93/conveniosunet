<?php

/**
 * This is the model class for table "estadoconvenios".
 *
 * The followings are the available columns in table 'estadoconvenios':
 * @property string $idEstadoConvenio
 * @property string $nombreEstadoConvenio
 * @property string $descripcionEstadoConvenio
 *
 * The followings are the available model relations:
 * @property Convenios[] $convenioses
 */
class Estadoconvenios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'estadoconvenios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idEstadoConvenio, nombreEstadoConvenio, descripcionEstadoConvenio', 'required'),
			array('idEstadoConvenio', 'length', 'max'=>10),
			array('nombreEstadoConvenio, descripcionEstadoConvenio', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idEstadoConvenio, nombreEstadoConvenio, descripcionEstadoConvenio', 'safe', 'on'=>'search'),
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
			'convenioses' => array(self::MANY_MANY, 'Convenios', 'convenio_estados(estadoConvenios_idEstadoConvenio, convenios_idConvenio)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idEstadoConvenio' => 'Id Estado Convenio',
			'nombreEstadoConvenio' => 'Nombre Estado Convenio',
			'descripcionEstadoConvenio' => 'Descripcion Estado Convenio',
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

		$criteria->compare('idEstadoConvenio',$this->idEstadoConvenio,true);
		$criteria->compare('nombreEstadoConvenio',$this->nombreEstadoConvenio,true);
		$criteria->compare('descripcionEstadoConvenio',$this->descripcionEstadoConvenio,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Estadoconvenios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
