<?php

/**
 * This is the model class for table "actaintencion".
 *
 * The followings are the available columns in table 'actaintencion':
 * @property integer $idActaIntencion
 * @property string $fechaActaIntencion
 * @property string $urlActaIntencion
 * @property string $convenios_idConvenio
 *
 * The followings are the available model relations:
 * @property Convenios $conveniosIdConvenio
 */
class Actaintencion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'actaintencion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('convenios_idConvenio', 'required'),
			array('urlActaIntencion', 'length', 'max'=>200),
			array('convenios_idConvenio', 'length', 'max'=>50),
			array('fechaActaIntencion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idActaIntencion, fechaActaIntencion, urlActaIntencion, convenios_idConvenio', 'safe', 'on'=>'search'),
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
			'conveniosIdConvenio' => array(self::BELONGS_TO, 'Convenios', 'convenios_idConvenio'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idActaIntencion' => 'Id Acta Intencion',
			'fechaActaIntencion' => 'Fecha Acta Intencion',
			'urlActaIntencion' => 'Url Acta Intencion',
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

		$criteria->compare('idActaIntencion',$this->idActaIntencion);
		$criteria->compare('fechaActaIntencion',$this->fechaActaIntencion,true);
		$criteria->compare('urlActaIntencion',$this->urlActaIntencion,true);
		$criteria->compare('convenios_idConvenio',$this->convenios_idConvenio,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Actaintencion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
