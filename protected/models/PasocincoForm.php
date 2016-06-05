<?php 
	class PasocincoForm extends CFormModel{

		public $alcanceconvenio;
		public $formaconvenio;
		public $idmarcoconvenio;
		

		public function rules (){

			return array(
				array("alcanceconvenio,formaconvenio,idmarcoconvenio","required"),
				//safe se le coloca a los datos que no se quieren validar 
			);
		}
	}
 ?>