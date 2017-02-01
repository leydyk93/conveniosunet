<?php

/**
 * This is the model class for table "operaciones".
 *
 * The followings are the available columns in table 'operaciones':
 * @property integer $idOperacion
 * @property string $fecha
 * @property integer $usuario_id
 * @property integer $tipoOperaciones_idTipoOperacion
 * @property integer $modulos_idModulo
 *
 * The followings are the available model relations:
 * @property Usuario $usuario
 * @property Tipooperaciones $tipoOperacionesIdTipoOperacion
 * @property Modulos $modulosIdModulo
 */
class Operaciones extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'operaciones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha, usuario_id, tipoOperaciones_idTipoOperacion, modulos_idModulo', 'required'),
			array('usuario_id, tipoOperaciones_idTipoOperacion, modulos_idModulo', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idOperacion, fecha, usuario_id, tipoOperaciones_idTipoOperacion, modulos_idModulo', 'safe', 'on'=>'search'),
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
			'usuario' => array(self::BELONGS_TO, 'Usuario', 'usuario_id'),
			'tipoOperacionesIdTipoOperacion' => array(self::BELONGS_TO, 'Tipooperaciones', 'tipoOperaciones_idTipoOperacion'),
			'modulosIdModulo' => array(self::BELONGS_TO, 'Modulos', 'modulos_idModulo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idOperacion' => 'Id Operacion',
			'fecha' => 'Fecha',
			'usuario_id' => 'Usuario',
			'tipoOperaciones_idTipoOperacion' => 'Tipo Operaciones Id Tipo Operacion',
			'modulos_idModulo' => 'Modulos Id Modulo',
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

		$criteria->compare('idOperacion',$this->idOperacion);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('usuario_id',$this->usuario_id);
		$criteria->compare('tipoOperaciones_idTipoOperacion',$this->tipoOperaciones_idTipoOperacion);
		$criteria->compare('modulos_idModulo',$this->modulos_idModulo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Operaciones the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
