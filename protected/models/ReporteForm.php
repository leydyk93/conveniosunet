<?php

/**
 * .
 */
class ReporteForm extends CFormModel
{
	public $titulo;
	public $descripcion;
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			
			/*array('titulo',"required",'message'=>'titulo no puede estar vacio'),
			array('titulo',
			 'match', 
			 'pattern'=>'/^[a-z0-9]+$/i',
			  'message'=>'Solo letras y numeros'),
			array('descripcion',
			 'match', 
			 'pattern'=>'/^[a-z0-9]+$/i',
			  'message'=>'Solo letras y numeros'),*/	 
			
		);
	}

	
}