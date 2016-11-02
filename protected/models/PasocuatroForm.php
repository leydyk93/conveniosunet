<?php 
	class PasocuatroForm extends CFormModel{

		public $id_convenio_aporte;
		public $convenios_idConvenio;
		public $descripcion_aporte;
		public $monedas_idMoneda;
		public $valor;
		public $cantidad;
		

		public function rules (){

			return array(
				array("descripcion_aporte,monedas_idMoneda,valor,cantidad","safe"),
				//safe se le coloca a los datos que no se quieren validar 
			);
		}
		public function attributeLabels()
			{
				return array(
					'descripcion_aporte' => 'Descripcion',
					'monedas_idMoneda' => 'Moneda',
					'valor' => 'Valor Monetario',
					'cantidad' => 'Cantidad (unidades)',
					);
			}
	}
 ?>