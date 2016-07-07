<?php 
	class PasocuatroForm extends CFormModel{

		public $ventajas;
		public $clasificacion;
		public $alcance;
		public $forma;
		public $actividades;
		public $otras_instituciones;
		

		public function rules (){

			return array(
				array("ventajas,clasificacion,alcance,forma,actividades,otras_instituciones","required"),
				//safe se le coloca a los datos que no se quieren validar 
			);
		}
	}
 ?>