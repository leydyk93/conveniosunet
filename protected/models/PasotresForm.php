<?php 
	class PasotresForm extends CFormModel{

		public $nro_acta;
		public $fecha_acta;
		public $url_acta;
		

		public function rules (){

			return array(
				array("nro_acta,fecha_acta,url_acta","required"),
				//safe se le coloca a los datos que no se quieren validar 
			);
		}
	}
 ?>