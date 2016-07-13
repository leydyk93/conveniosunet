<?php

/**
 * This is the model class for table "tipoconvenios".
 *
 * The followings are the available columns in table 'tipoconvenios':
 * @property integer $idTipoConvenio
 * @property string $descripcionTipoConvenio
 *
 * The followings are the available model relations:
 * @property Convenios[] $convenioses
 */
class Tipoconvenios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tipoconvenios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('descripcionTipoConvenio', 'required'),
			array('descripcionTipoConvenio', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idTipoConvenio, descripcionTipoConvenio', 'safe', 'on'=>'search'),
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
			'convenioses' => array(self::HAS_MANY, 'Convenios', 'tipoConvenios_idTipoConvenio'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idTipoConvenio' => 'Id Tipo Convenio',
			'descripcionTipoConvenio' => 'Descripcion Tipo Convenio',
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

		$criteria->compare('idTipoConvenio',$this->idTipoConvenio);
		$criteria->compare('descripcionTipoConvenio',$this->descripcionTipoConvenio,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tipoconvenios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
