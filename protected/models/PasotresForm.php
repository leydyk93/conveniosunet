<?php 
	class PasotresForm extends CFormModel{

		public $nro_acta;
		public $fecha_acta;
		public $url_acta;
		

		public function rules (){

			return array(
				array("nro_acta,fecha_acta,url_acta","safe"),
				//safe se le coloca a los datos que no se quieren validar 
			);
		}
		public function attributeLabels()
			{
				return array(
					'nro_acta' => 'Nro Acta Intencion',
					'fecha_acta' => 'Fecha del Acta',
					'url_acta' => 'Url del Acta',
					
					);
			}
	}
 ?>