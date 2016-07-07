<?php

/**
 * ConsultarConvenio class.
 *  It is used by the 'convenioConsultar' action of 'SiteController'.
 */
class ConsultasConvenios extends CFormModel
{
	public $anio;
	public $tipo;
	public $clasificacion;
	public $pais;
	public $tipo_institucion;
	public $institucion;
	public $estadoConv;
	public $responsable;
	public $contraparte;

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
			array('anio',
				'match',
				'pattern'=>'/^[0-9]+$/',
				'message'=>'El formato es de año ejem: 2016'
				),
			/*array('anio',
				  'length',
				  'min'=>4,
				  'tooShort'=>'El año no es valido'
				),*/
			array('anio','ValidarAnio'),

		);
		
	}

	public function ValidarAnio($attributes,$params){

		/*$anios=convenios::model()->findAll();*/
		$anios=array('2010','2011','2012');

		foreach ($anios as $a) {
			if($this->anio==$a){
				$this->addError('anio','año encontrado en la base de datos');
			}
		}

	}
	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{		
		return array(
			 'anio'=>'Año',
			 'tipo'=>'Tipo de convenio',
			 'clasificacion'=>'Clasificacion del Convenio',
			 'pais'=>'Pais',
			 'tipo_institucion'=>'Tipo de Institución',
			 'institucion'=>'Institución',
			 'estadoConv'=>'Estado del convenio',
			 'responsable'=>'Responsable',
			 'contraparte'=>'Datos de la Contraparte',
		);
	}

	
}