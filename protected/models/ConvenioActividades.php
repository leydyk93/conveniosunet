<?php

/**
 * This is the model class for table "convenio_actividades".
 *
 * The followings are the available columns in table 'convenio_actividades':
 * @property integer $id_convenio_actividades
 * @property string $convenios_idConvenio
 * @property integer $actividades_idActividad
 *
 * The followings are the available model relations:
 * @property Actividades $actividadesIdActividad
 * @property Convenios $conveniosIdConvenio
 */
class ConvenioActividades extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'convenio_actividades';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('convenios_idConvenio, actividades_idActividad', 'required'),
			array('actividades_idActividad', 'numerical', 'integerOnly'=>true),
			array('convenios_idConvenio', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_convenio_actividades, convenios_idConvenio, actividades_idActividad', 'safe', 'on'=>'search'),
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
			'actividadesIdActividad' => array(self::BELONGS_TO, 'Actividades', 'actividades_idActividad'),
			'conveniosIdConvenio' => array(self::BELONGS_TO, 'Convenios', 'convenios_idConvenio'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_convenio_actividades' => 'Id Convenio Actividades',
			'convenios_idConvenio' => 'Convenios Id Convenio',
			'actividades_idActividad' => 'Actividades Id Actividad',
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

		$criteria->compare('id_convenio_actividades',$this->id_convenio_actividades);
		$criteria->compare('convenios_idConvenio',$this->convenios_idConvenio,true);
		$criteria->compare('actividades_idActividad',$this->actividades_idActividad);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ConvenioActividades the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
