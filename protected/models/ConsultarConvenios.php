<?php

/**
 * ConsultarConvenio class.
 *  It is used by the 'convenioConsultar' action of 'SiteController'.
 */
class ConsultarConvenio extends CFormModel
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
		/*
		return array(
			
			// username and password are required
			array('username, password', 'required'),
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
			// password needs to be authenticated
			array('password', 'authenticate'),
			
		);
		*/
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