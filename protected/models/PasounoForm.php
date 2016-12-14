<?php 
	class PasounoForm extends CFormModel{

		public $idconvenio;
		public $tipo;
		public $nombreconvenio;
		public $fechainicio;
		public $fechacaducidad;
		public $objetivo;
		public $dependencia;
		public $estado;
		public $alcance;
		public $clasificacion; 
		public $idmarco;

		public function rules (){

			return array(
				array("tipo,nombreconvenio,fechainicio,fechacaducidad,objetivo,estado,clasificacion","required"),
				array('nombreconvenio','match','pattern'=>'/^[a-záéíóúàèìòùäëïöüñ\s]+$/i','message'=>'el tipo de datos introducido es incorrecto' ),
				array('nombreconvenio','length','max'=>200,'tooLong'=>'Maximo 200 caracteres'),
				array('fechainicio','date','format'=>'yyyy-mm-dd','message'=>'Debe introducir un formato de fecha ejem 2016-01-01'),
				array('fechacaducidad','date','format'=>'yyyy-mm-dd','message'=>'Debe introducir un formato de fecha ejem 2016-01-01'),
				array('objetivo','length','max'=>300,'tooLong'=>'Maximo 300 caracteres'),
				array('alcance','length','max'=>300,'tooLong'=>'Maximo 300 caracteres'),
				
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
					'alcance'=>'Alcance',
					'clasificacion'=>'Clasificacion',
				);
			}
		public function comprobar_email($attributes, $params){

			$email= array('m@mail.com','p@mail.com');

				foreach ($email as  $value) {
					if($this->email==$e){
						$this->addError('email','email no disponible');
						break;
					}
					# code...
				}
		}
	}
 ?>