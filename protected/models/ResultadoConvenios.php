<?php

/**
 * resultadoConvenio class.
 *  it is used for to show the results of a query. 
 */
class ResultadoConvenios extends CFormModel
{
	public $nombre_convenio;
	public $tipo_convenio;
	public $objetivo_convenio;
	public $fecha_inicio;
	public $fecha_caducidad;
	public $fecha_estado_actual;
	public $estado_actual_convenio;
	public $responsable_Unet;


	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		
		return array(
			

		);
		
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{		
		return array(
			 'nombre_convenio'=>'Nombre Convenio',
			 
		);
	}

	
}