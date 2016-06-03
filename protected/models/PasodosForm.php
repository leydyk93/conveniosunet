<?php 
	class PasodosForm extends CFormModel{

		public $tipoconvenio;
		public $fechainicioconvenio;
		

		public function rules (){

			return array(
				array("tipoconvenio,fechainicioconvenio","required"),
				//safe se le coloca a los datos que no se quieren validar 
			);
		}
	}
 ?>