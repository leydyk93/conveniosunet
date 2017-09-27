<?php

/**
 * .
 */
class ArchivoConvenio extends CFormModel
{
	public $titulo;
	public $archivec;
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are require
			//array("archivec","required"),
			array('titulo',
			 'match', 
			 'pattern'=>'/^[a-z0-9]+$/i',
			  'message'=>'Solo letras y numeros'),
			array('archivec',
				 'file',
				 'types'=>'pdf',
				 'wrongType'=>'El formato permitdo es pdf', 
				 'maxSize'=>1024*1024*1, 
				 'tooLarge'=>'archivo demasiado grande',
				 'allowEmpty'=> true, ),
			
		);
	}

	public function attributeLabels()
	{
		return array(
			
			'archivec'=>'archivec',
		);
	}

	
}