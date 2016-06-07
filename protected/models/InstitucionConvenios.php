<?php

/**
 * This is the model class for table "institucion_convenios".
 *
 * The followings are the available columns in table 'institucion_convenios':
 * @property string $idInstitucionConvenio
 * @property string $instituciones_idInstitucion
 * @property string $convenios_idConvenio
 * @property string $fechaIncorporacion
 *
 * The followings are the available model relations:
 * @property Historicoresponsables[] $historicoresponsables
 * @property Instituciones $institucionesIdInstitucion
 * @property Convenios $conveniosIdConvenio
 */
class InstitucionConvenios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'institucion_convenios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idInstitucionConvenio, instituciones_idInstitucion, convenios_idConvenio, fechaIncorporacion', 'required'),
			array('idInstitucionConvenio, instituciones_idInstitucion', 'length', 'max'=>10),
			array('convenios_idConvenio', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idInstitucionConvenio, instituciones_idInstitucion, convenios_idConvenio, fechaIncorporacion', 'safe', 'on'=>'search'),
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
			'historicoresponsables' => array(self::HAS_MANY, 'Historicoresponsables', 'institucion_convenios_idInstitucionConvenio'),
			'institucionesIdInstitucion' => array(self::BELONGS_TO, 'Instituciones', 'instituciones_idInstitucion'),
			'conveniosIdConvenio' => array(self::BELONGS_TO, 'Convenios', 'convenios_idConvenio'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idInstitucionConvenio' => 'Id Institucion Convenio',
			'instituciones_idInstitucion' => 'Instituciones Id Institucion',
			'convenios_idConvenio' => 'Convenios Id Convenio',
			'fechaIncorporacion' => 'Fecha Incorporacion',
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

		$criteria->compare('idInstitucionConvenio',$this->idInstitucionConvenio,true);
		$criteria->compare('instituciones_idInstitucion',$this->instituciones_idInstitucion,true);
		$criteria->compare('convenios_idConvenio',$this->convenios_idConvenio,true);
		$criteria->compare('fechaIncorporacion',$this->fechaIncorporacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return InstitucionConvenios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
