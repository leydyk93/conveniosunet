<?php 
	class PasotresForm extends CFormModel{

		public $fechacaducidadconvenio;
		public $objetivoconvenio;
		public $dependenciaconvenio;
		

		public function rules (){

			return array(
				array("fechacaducidadconvenio,objetivoconvenio,dependenciaconvenio","required"),
				//safe se le coloca a los datos que no se quieren validar 
			);
		}
	}
 ?>