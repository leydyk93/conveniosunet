<?php

/**
 * This is the model class for table "estados".
 *
 * The followings are the available columns in table 'estados':
 * @property integer $idEstado
 * @property string $nombreEstado
 * @property integer $paises_idPais
 *
 * The followings are the available model relations:
 * @property Paises $paisesIdPais
 * @property Instituciones[] $instituciones
 */
class Estados extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'estados';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombreEstado, paises_idPais', 'required'),
			array('paises_idPais', 'numerical', 'integerOnly'=>true),
			array('nombreEstado', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idEstado, nombreEstado, paises_idPais', 'safe', 'on'=>'search'),
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
			'paisesIdPais' => array(self::BELONGS_TO, 'Paises', 'paises_idPais'),
			'instituciones' => array(self::HAS_MANY, 'Instituciones', 'estados_idEstado'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idEstado' => 'Id Estado',
			'nombreEstado' => 'Nombre Estado',
			'paises_idPais' => 'Paises Id Pais',
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

		$criteria->compare('idEstado',$this->idEstado);
		$criteria->compare('nombreEstado',$this->nombreEstado,true);
		$criteria->compare('paises_idPais',$this->paises_idPais);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Estados the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
