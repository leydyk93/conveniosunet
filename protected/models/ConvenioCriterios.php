<?php

/**
 * This is the model class for table "convenio_criterios".
 *
 * The followings are the available columns in table 'convenio_criterios':
 * @property integer $id_convenio_criterios
 * @property integer $informes_idInforme
 * @property integer $criterios_idCriterio
 * @property integer $unidades_idUnidad
 *
 * The followings are the available model relations:
 * @property Unidades $unidadesIdUnidad
 * @property Criterios $criteriosIdCriterio
 * @property Informes $informesIdInforme
 */
class ConvenioCriterios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'convenio_criterios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('informes_idInforme, criterios_idCriterio, unidades_idUnidad', 'required'),
			array('informes_idInforme, criterios_idCriterio, unidades_idUnidad', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_convenio_criterios, informes_idInforme, criterios_idCriterio, unidades_idUnidad', 'safe', 'on'=>'search'),
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
			'unidadesIdUnidad' => array(self::BELONGS_TO, 'Unidades', 'unidades_idUnidad'),
			'criteriosIdCriterio' => array(self::BELONGS_TO, 'Criterios', 'criterios_idCriterio'),
			'informesIdInforme' => array(self::BELONGS_TO, 'Informes', 'informes_idInforme'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_convenio_criterios' => 'Id Convenio Criterios',
			'informes_idInforme' => 'Informes Id Informe',
			'criterios_idCriterio' => 'Criterios Id Criterio',
			'unidades_idUnidad' => 'Unidades Id Unidad',
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

		$criteria->compare('id_convenio_criterios',$this->id_convenio_criterios);
		$criteria->compare('informes_idInforme',$this->informes_idInforme);
		$criteria->compare('criterios_idCriterio',$this->criterios_idCriterio);
		$criteria->compare('unidades_idUnidad',$this->unidades_idUnidad);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ConvenioCriterios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
