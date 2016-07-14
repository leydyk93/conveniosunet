<?php

/**
 * This is the model class for table "historicoresponsables".
 *
 * The followings are the available columns in table 'historicoresponsables':
 * @property integer $idHistoricoResponsable
 * @property integer $responsables_idResponsable
 * @property string $convenios_idConvenio
 * @property integer $institucion_convenios_idInstitucionConvenio
 * @property string $fechaAsignacionResponsable
 * @property string $fechaRetiroResponsable
 *
 * The followings are the available model relations:
 * @property Convenios $conveniosIdConvenio
 * @property InstitucionConvenios $institucionConveniosIdInstitucionConvenio
 * @property Responsables $responsablesIdResponsable
 */
class Historicoresponsables extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'historicoresponsables';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('responsables_idResponsable, fechaAsignacionResponsable', 'required'),
			array('responsables_idResponsable, institucion_convenios_idInstitucionConvenio', 'numerical', 'integerOnly'=>true),
			array('convenios_idConvenio', 'length', 'max'=>50),
			array('fechaRetiroResponsable', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idHistoricoResponsable, responsables_idResponsable, convenios_idConvenio, institucion_convenios_idInstitucionConvenio, fechaAsignacionResponsable, fechaRetiroResponsable', 'safe', 'on'=>'search'),
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
			'institucionConveniosIdInstitucionConvenio' => array(self::BELONGS_TO, 'InstitucionConvenios', 'institucion_convenios_idInstitucionConvenio'),
			'responsablesIdResponsable' => array(self::BELONGS_TO, 'Responsables', 'responsables_idResponsable'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idHistoricoResponsable' => 'Id Historico Responsable',
			'responsables_idResponsable' => 'Responsables Id Responsable',
			'convenios_idConvenio' => 'Convenios Id Convenio',
			'institucion_convenios_idInstitucionConvenio' => 'Institucion Convenios Id Institucion Convenio',
			'fechaAsignacionResponsable' => 'Fecha Asignacion Responsable',
			'fechaRetiroResponsable' => 'Fecha Retiro Responsable',
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

		$criteria->compare('idHistoricoResponsable',$this->idHistoricoResponsable);
		$criteria->compare('responsables_idResponsable',$this->responsables_idResponsable);
		$criteria->compare('convenios_idConvenio',$this->convenios_idConvenio,true);
		$criteria->compare('institucion_convenios_idInstitucionConvenio',$this->institucion_convenios_idInstitucionConvenio);
		$criteria->compare('fechaAsignacionResponsable',$this->fechaAsignacionResponsable,true);
		$criteria->compare('fechaRetiroResponsable',$this->fechaRetiroResponsable,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Historicoresponsables the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
