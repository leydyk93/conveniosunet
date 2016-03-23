<?php

/**
 * This is the model class for table "instituciones".
 *
 * The followings are the available columns in table 'instituciones':
 * @property string $idInstitucion
 * @property string $nombre_institucion
 *
 * The followings are the available model relations:
 * @property Convenio[] $convenios
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
			array('idInstitucion, nombre_institucion', 'required'),
			array('idInstitucion', 'length', 'max'=>10),
			array('nombre_institucion', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idInstitucion, nombre_institucion', 'safe', 'on'=>'search'),
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
			'convenios' => array(self::MANY_MANY, 'Convenio', 'institucion_convenios(instituciones_idInstitucion, convenios_idConvenio)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idInstitucion' => 'Id Institucion',
			'nombre_institucion' => 'Nombre Institucion',
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

		$criteria->compare('idInstitucion',$this->idInstitucion,true);
		$criteria->compare('nombre_institucion',$this->nombre_institucion,true);

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
