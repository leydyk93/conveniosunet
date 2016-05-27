<?php

/**
 * ConsultarConvenio class.
 *  It is used by the 'convenioConsultar' action of 'SiteController'.
 */
class ConsultasConvenios extends CFormModel
{
	public $anio;
	public $tipo;
	public $pais;
	public $tipo_institucion;
	public $institucion;
	public $estadoConv;
	public $responsable;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		
		return array(
			
			// username and password are required
			array('anio, tipo', 'required'),
			
			
		);
		
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		/*
		return array(
			'rememberMe'=>'Remember me next time',
		);*/
	}

	
}