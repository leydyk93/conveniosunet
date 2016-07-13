<?php

/**
 * This is the model class for table "convenio_presupuestos".
 *
 * The followings are the available columns in table 'convenio_presupuestos':
 * @property integer $id_convenio_presupuesto
 * @property string $convenios_idConvenio
 * @property integer $presupuestos_idPresupuesto
 * @property double $costo
 *
 * The followings are the available model relations:
 * @property Convenios $conveniosIdConvenio
 * @property Presupuestos $presupuestosIdPresupuesto
 */
class ConvenioPresupuestos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'convenio_presupuestos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_convenio_presupuesto, convenios_idConvenio, presupuestos_idPresupuesto, costo', 'required'),
			array('id_convenio_presupuesto, presupuestos_idPresupuesto', 'numerical', 'integerOnly'=>true),
			array('costo', 'numerical'),
			array('convenios_idConvenio', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_convenio_presupuesto, convenios_idConvenio, presupuestos_idPresupuesto, costo', 'safe', 'on'=>'search'),
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
			'presupuestosIdPresupuesto' => array(self::BELONGS_TO, 'Presupuestos', 'presupuestos_idPresupuesto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_convenio_presupuesto' => 'Id Convenio Presupuesto',
			'convenios_idConvenio' => 'Convenios Id Convenio',
			'presupuestos_idPresupuesto' => 'Presupuestos Id Presupuesto',
			'costo' => 'Costo',
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

		$criteria->compare('id_convenio_presupuesto',$this->id_convenio_presupuesto);
		$criteria->compare('convenios_idConvenio',$this->convenios_idConvenio,true);
		$criteria->compare('presupuestos_idPresupuesto',$this->presupuestos_idPresupuesto);
		$criteria->compare('costo',$this->costo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ConvenioPresupuestos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
