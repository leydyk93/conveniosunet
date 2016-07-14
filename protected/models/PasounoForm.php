<?php 
	class PasounoForm extends CFormModel{

		public $idconvenio;
		public $tipo;
		public $nombreconvenio;
		public $fechainicio;
		public $fechacaducidad;
		public $objetivo;
		public $dependencia;
		PUBLIC $estado;

		public function rules (){

			return array(
				array("idconvenio,tipo,nombreconvenio,fechainicio,fechacaducidad,objetivo,dependencia,estado","required"),
				//safe se le coloca a los datos que no se quieren validar 
			);
		}
		public function attributeLabels()
			{
				return array(
					'idconvenio' => 'Id de Convenio',
					'tipo' => 'Tipo',
					'nombreconvenio' => 'Nombre de Convenio',
					'fechainicio' => 'Fecha de Inicio',
					'fechacaducidad' => 'Fecha de Caducidad',
					'objetivo' => 'Objetivo',
					'dependencia' => 'dependencia',
					'estado' => 'Estado Inicial',
				);
			}
	}
 ?>