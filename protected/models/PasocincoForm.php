<?php 
	class PasocincoForm extends CFormModel{

		public $aporte;
		public $moneda;
		public $aporte_valor;
		public $presupuesto;
		public $presupuesto_costo;
		

		public function rules (){

			return array(
				array("aporte,moneda,aporte_valor,presupuesto,presupuesto_costo","required"),
				//safe se le coloca a los datos que no se quieren validar 
			);
		}
		public function attributeLabels()
			{
				return array(
					'aporte' => 'Aporte',
					'moneda' => 'Moneda',
					'aporte_valor' => 'Valor de Aporte',
					'presupuesto' => 'Presupuesto',
					'presupuesto_costo' => 'Costo de Presupuesto',
					);
			}
	}
 ?>