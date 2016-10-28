<?php 
	class PasodosForm extends CFormModel{

		public $instanciaunet;
		public $responsable_legal_unet;
		public $responsable_contacto_unet;
	//	public $pais;
	//	public $localidad;
	//	public $tipo_institucion;
		public $institucion;

		public $responsable_legal_contraparte;
		public $responsable_contacto_contraparte;

		public function rules (){

			return array(
				array("instanciaunet,responsable_legal_unet,responsable_contacto_unet,institucion,responsable_legal_contraparte,responsable_contacto_contraparte","required"),
				//safe se le coloca a los datos que no se quieren validar 
			);
		}
		public function attributeLabels()
			{
				return array(
					'instanciaunet' => 'Instancia Unet',
					'responsable_legal_unet' => 'Responsable Legal',
					'responsable_contacto_unet'=> 'Responsable de Contacto',
					'institucion' => 'Contraparte',

					'responsable_legal_contraparte' => 'Responsable Legal',
					'responsable_contacto_contraparte' => 'Responsable de Contacto',
					);
			}
	}
 ?>