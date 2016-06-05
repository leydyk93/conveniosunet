<?php 
	class PasounoForm extends CFormModel{

		public $idconvenio;
		public $nombreconvenio;

		public function rules (){

			return array(
				array("idconvenio,nombreconvenio","required"),
				//safe se le coloca a los datos que no se quieren validar 
			);
		}
	}
 ?>