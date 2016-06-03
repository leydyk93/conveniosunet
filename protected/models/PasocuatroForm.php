<?php 
	class PasocuatroForm extends CFormModel{

		public $institucionconvenio;
		public $urlconvenio;
		public $clasificacionconvenio;
		

		public function rules (){

			return array(
				array("institucionconvenio,urlconvenio,clasificacionconvenio","required"),
				//safe se le coloca a los datos que no se quieren validar 
			);
		}
	}
 ?>