<?php 
	class PasodosForm extends CFormModel{

		public $instanciaunet;
		public $responsableunet;
	//	public $pais;
	//	public $localidad;
	//	public $tipo_institucion;
		public $institucion;
		public $instancia_contraparte;
		public $responsable_contraparte;

		public function rules (){

			return array(
				array("instanciaunet,responsableunet,institucion,instancia_contraparte,responsable_contraparte","required"),
				//safe se le coloca a los datos que no se quieren validar 
			);
		}
		public function attributeLabels()
			{
				return array(
					'instanciaunet' => 'Instancia Unet',
					'responsableunet' => 'Responsable Unet',
					'institucion' => 'Contraparte',
					'instancia_contraparte' => 'instancia Contraparte',
					'responsable_contraparte' => 'Responsable Contraparte',
					);
			}
	}
 ?>