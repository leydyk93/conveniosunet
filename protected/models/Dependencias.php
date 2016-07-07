<?php

/**
 * This is the model class for table "dependencias".
 *
 * The followings are the available columns in table 'dependencias':
 * @property string $idDependencia
 * @property string $nombreDependencia
 * @property string $telefonoDependencia
 *
 * The followings are the available model relations:
 * @property ConvenioEstados[] $convenioEstadoses
 * @property Convenios[] $convenioses
 * @property Responsables[] $responsables
 */
class Dependencias extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dependencias';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idDependencia', 'required'),
			array('idDependencia', 'length', 'max'=>10),
			array('nombreDependencia', 'length', 'max'=>100),
			array('telefonoDependencia', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idDependencia, nombreDependencia, telefonoDependencia', 'safe', 'on'=>'search'),
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
			'convenioEstadoses' => array(self::HAS_MANY, 'ConvenioEstados', 'dependencias_idDependencia'),
			'convenioses' => array(self::HAS_MANY, 'Convenios', 'dependencias_idDependencia'),
			'responsables' => array(self::HAS_MANY, 'Responsables', 'dependencias_idDependencia'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idDependencia' => 'Id Dependencia',
			'nombreDependencia' => 'Nombre Dependencia',
			'telefonoDependencia' => 'Telefono Dependencia',
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

		$criteria->compare('idDependencia',$this->idDependencia,true);
		$criteria->compare('nombreDependencia',$this->nombreDependencia,true);
		$criteria->compare('telefonoDependencia',$this->telefonoDependencia,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Dependencias the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
