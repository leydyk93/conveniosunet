<?php

/**
 * This is the model class for table "renovacionprorrogas".
 *
 * The followings are the available columns in table 'renovacionprorrogas':
 * @property integer $idRenovacionProrroga
 * @property string $fechaFinProrroga
 * @property string $observacionProrroga
 * @property string $convenios_idConvenio
 * @property string $fechaRenovacion
 * @property string $fechaCaducidadModificada
 *
 * The followings are the available model relations:
 * @property Convenios $conveniosIdConvenio
 */
class Renovacionprorrogas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'renovacionprorrogas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('convenios_idConvenio, fechaCaducidadModificada', 'required'),
			array('observacionProrroga', 'length', 'max'=>200),
			array('convenios_idConvenio', 'length', 'max'=>50),
			array('fechaFinProrroga, fechaRenovacion', 'safe'),
			array('fechaFinProrroga','ValidarAnio'),
			/*array('fechaFinProrroga',
				 'date', 
				 'format'=>'yyyy',
				 'message'=>'el formato es de año ejem:2016'),*/
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idRenovacionProrroga, fechaFinProrroga, observacionProrroga, convenios_idConvenio, fechaRenovacion, fechaCaducidadModificada', 'safe', 'on'=>'search'),
		);
	}

	public function ValidarAnio($attributes,$params){


	  $criteria=new CDbCriteria;
      $criteria->select='fechaCaducidadConvenio';  
      $criteria->condition='idConvenio=:convenio';
      $criteria->params=array(':convenio'=>$this->convenios_idConvenio);
      $convenio=convenios::model()->find($criteria);

      if($convenio->fechaCaducidadConvenio>$this->fechaFinProrroga){

      			$this->addError('fechaFinProrroga','debe ser superior a la fecha de vencimiento '.$convenio->fechaCaducidadConvenio);
      }

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
			'idRenovacionProrroga' => 'Id Renovacion Prorroga',
			'fechaFinProrroga' => 'Nueva Fecha Caducidad',
			'observacionProrroga' => 'Justificación',
			'convenios_idConvenio' => 'Convenios Id Convenio',
			'fechaRenovacion' => 'Fecha Renovacion',
			'fechaCaducidadModificada' => 'Fecha Caducidad Modificada',
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

		$criteria->compare('idRenovacionProrroga',$this->idRenovacionProrroga);
		$criteria->compare('fechaFinProrroga',$this->fechaFinProrroga,true);
		$criteria->compare('observacionProrroga',$this->observacionProrroga,true);
		$criteria->compare('convenios_idConvenio',$this->convenios_idConvenio,true);
		$criteria->compare('fechaRenovacion',$this->fechaRenovacion,true);
		$criteria->compare('fechaCaducidadModificada',$this->fechaCaducidadModificada,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Renovacionprorrogas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
