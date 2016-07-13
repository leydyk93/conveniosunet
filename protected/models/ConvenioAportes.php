<?php

/**
 * This is the model class for table "convenio_aportes".
 *
 * The followings are the available columns in table 'convenio_aportes':
 * @property integer $id_convenio_aporte
 * @property string $convenios_idConvenio
 * @property integer $aportes_idAporte
 * @property string $valor
 * @property integer $monedas_idMoneda
 *
 * The followings are the available model relations:
 * @property Monedas $monedasIdMoneda
 * @property Aportes $aportesIdAporte
 * @property Convenios $conveniosIdConvenio
 */
class ConvenioAportes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'convenio_aportes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('convenios_idConvenio, aportes_idAporte, monedas_idMoneda', 'required'),
			array('aportes_idAporte, monedas_idMoneda', 'numerical', 'integerOnly'=>true),
			array('convenios_idConvenio', 'length', 'max'=>50),
			array('valor', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_convenio_aporte, convenios_idConvenio, aportes_idAporte, valor, monedas_idMoneda', 'safe', 'on'=>'search'),
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
			'monedasIdMoneda' => array(self::BELONGS_TO, 'Monedas', 'monedas_idMoneda'),
			'aportesIdAporte' => array(self::BELONGS_TO, 'Aportes', 'aportes_idAporte'),
			'conveniosIdConvenio' => array(self::BELONGS_TO, 'Convenios', 'convenios_idConvenio'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_convenio_aporte' => 'Id Convenio Aporte',
			'convenios_idConvenio' => 'Convenios Id Convenio',
			'aportes_idAporte' => 'Aportes Id Aporte',
			'valor' => 'Valor',
			'monedas_idMoneda' => 'Monedas Id Moneda',
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

		$criteria->compare('id_convenio_aporte',$this->id_convenio_aporte);
		$criteria->compare('convenios_idConvenio',$this->convenios_idConvenio,true);
		$criteria->compare('aportes_idAporte',$this->aportes_idAporte);
		$criteria->compare('valor',$this->valor,true);
		$criteria->compare('monedas_idMoneda',$this->monedas_idMoneda);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ConvenioAportes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
