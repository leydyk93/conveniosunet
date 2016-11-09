<?php

/**
 * This is the model class for table "responsables".
 *
 * The followings are the available columns in table 'responsables':
 * @property integer $idResponsable
 * @property string $primerNombreResponsable
 * @property string $segundoNombreResponsable
 * @property string $primerApellidoResponsable
 * @property string $segundoApellidoResponsable
 * @property string $correoElectronicoResponsable
 * @property string $telefonoResponsable
 * @property integer $instituciones_idInstitucion
 * @property integer $dependencias_idDependencia
 * @property integer $tipoResponsable_idTipoResponsable
 *
 * The followings are the available model relations:
 * @property Historicoresponsables[] $historicoresponsables
 * @property Dependencias $dependenciasIdDependencia
 * @property Instituciones $institucionesIdInstitucion
 * @property Tiporesponsable $tipoResponsableIdTipoResponsable
 */
class Responsables extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'responsables';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idResponsable, telefonoResponsable,correoElectronicoResponsable,primerNombreResponsable, primerApellidoResponsable, dependencias_idDependencia, tipoResponsable_idTipoResponsable', 'required'),
			array('instituciones_idInstitucion, dependencias_idDependencia, tipoResponsable_idTipoResponsable', 'numerical', 'integerOnly'=>true),
			array('primerNombreResponsable, segundoNombreResponsable', 'length', 'max'=>40),
			array('primerApellidoResponsable, segundoApellidoResponsable', 'length', 'max'=>60),
			array('correoElectronicoResponsable', 'length', 'max'=>100),
			array('correoElectronicoResponsable', 'email'),
			array('telefonoResponsable', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idResponsable, primerNombreResponsable, segundoNombreResponsable, primerApellidoResponsable, segundoApellidoResponsable, correoElectronicoResponsable, telefonoResponsable, instituciones_idInstitucion, dependencias_idDependencia, tipoResponsable_idTipoResponsable', 'safe', 'on'=>'search'),
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
			'historicoresponsables' => array(self::HAS_MANY, 'Historicoresponsables', 'responsables_idResponsable'),
			'dependenciasIdDependencia' => array(self::BELONGS_TO, 'Dependencias', 'dependencias_idDependencia'),
			'institucionesIdInstitucion' => array(self::BELONGS_TO, 'Instituciones', 'instituciones_idInstitucion'),
			'tipoResponsableIdTipoResponsable' => array(self::BELONGS_TO, 'Tiporesponsable', 'tipoResponsable_idTipoResponsable'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idResponsable' => 'Cedula',
			'primerNombreResponsable' => 'Primer Nombre',
			'segundoNombreResponsable' => 'Segundo Nombre',
			'primerApellidoResponsable' => 'Primer Apellido',
			'segundoApellidoResponsable' => 'Segundo Apellido',
			'correoElectronicoResponsable' => 'Correo Electronico',
			'telefonoResponsable' => 'Telefono',
			'instituciones_idInstitucion' => 'Instituciones',
			'dependencias_idDependencia' => 'Dependencias',
			'tipoResponsable_idTipoResponsable' => 'Tipo Responsable',
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

		$criteria->compare('idResponsable',$this->idResponsable);
		$criteria->compare('primerNombreResponsable',$this->primerNombreResponsable,true);
		$criteria->compare('segundoNombreResponsable',$this->segundoNombreResponsable,true);
		$criteria->compare('primerApellidoResponsable',$this->primerApellidoResponsable,true);
		$criteria->compare('segundoApellidoResponsable',$this->segundoApellidoResponsable,true);
		$criteria->compare('correoElectronicoResponsable',$this->correoElectronicoResponsable,true);
		$criteria->compare('telefonoResponsable',$this->telefonoResponsable,true);
		$criteria->compare('instituciones_idInstitucion',$this->instituciones_idInstitucion);
		$criteria->compare('dependencias_idDependencia',$this->dependencias_idDependencia);
		$criteria->compare('tipoResponsable_idTipoResponsable',$this->tipoResponsable_idTipoResponsable);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Responsables the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
