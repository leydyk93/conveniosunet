<?php

class ConveniosController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';
	public $pasouno;
	
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions

				'actions'=>array('index','view','pasodos','pasotres','pasocuatro','pasocinco','pasoseis','consultar','consultara','selectdos','autocomplete','autocompletef','guardardependencia','guardarinstitucion','guardarresponsable'),

				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','renovar','cambiarEstado'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	*Realiza la consulta de los responsables de la UNET para un convenio 
	*@param entero $id que reperesta el convenio
	*/
	public function consultarResponsablesUNET($id){
		
		$conexion=Yii::app()->db;

		 $consultarcUNET="SELECT r.primerNombreResponsable, r.primerApellidoResponsable, r.correoElectronicoResponsable, r.telefonoResponsable, tr.descripcionTipoResponsable FROM responsables r ";
		 $consultarcUNET.="JOIN historicoresponsables hr ON r.idResponsable = hr.responsables_idResponsable ";
		 $consultarcUNET.="JOIN convenios c ON c.idConvenio = hr.convenios_idConvenio ";
		 $consultarcUNET.="JOIN tiporesponsable tr ON tr.idTipoResponsable = r.tipoResponsable_idTipoResponsable ";
		 $consultarcUNET.="WHERE c.idConvenio = ".$id;

		 $resultados=$conexion->createCommand($consultarcUNET)->query();

		 return $resultados;		
	}
		/**
	*Realiza la consulta de los responsables de la contraparte 
	*@param entero $id que reperesta el convenio
	*/
	public function consultarInstitucionesContraparte($id){

		 $conexion=Yii::app()->db;
		$consulta  ="SELECT inst.idInstitucion, inst.siglasInstitucion, inst.nombreInstitucion, tinst.nombreTipoInstitucion, edo.nombreEstado, ps.nombrePais FROM convenios c ";
		$consulta .="JOIN tipoconvenios tc ON tc.idTipoConvenio = c.tipoConvenios_idTipoConvenio ";
		$consulta .="JOIN institucion_convenios ic ON c.idConvenio = ic.convenios_idConvenio ";
		$consulta .="JOIN instituciones inst ON inst.idInstitucion = ic.instituciones_idInstitucion ";
		$consulta .="JOIN tiposInstituciones tinst ON tinst.idTipoInstitucion = inst.tiposInstituciones_idTipoInstitucion ";
		$consulta .="JOIN estados edo ON edo.idEstado = inst.estados_idEstado ";
		$consulta .="JOIN paises ps ON ps.idPais = edo.paises_idPais ";
		$consulta .="WHERE c.idConvenio = ".$id; 

		$resultados=$conexion->createCommand($consulta)->query();

		return $resultados;

	}
	public function ConsultarResponsablesPorInstitucion($id){

	   $conexion=Yii::app()->db;

	   $resulResponsablesC= new ResultadoConvenios;

		$consulta  ="SELECT inst.idInstitucion,inst.siglasInstitucion, inst.nombreInstitucion, tinst.nombreTipoInstitucion, edo.nombreEstado, ps.nombrePais, r.primerNombreResponsable, r.primerApellidoResponsable, r.correoElectronicoResponsable, r.telefonoResponsable, tr.descripcionTipoResponsable FROM responsables r ";
		$consulta .="JOIN historicoresponsables hr ON r.idResponsable = hr.responsables_idResponsable ";
		$consulta .="JOIN institucion_convenios ic ON ic.idInstitucionConvenio = hr.institucion_convenios_idInstitucionConvenio ";
		$consulta .="JOIN convenios c ON c.idConvenio = ic.convenios_idConvenio ";
		$consulta .="JOIN instituciones inst ON inst.idInstitucion = ic.instituciones_idInstitucion ";
		$consulta .="JOIN tiposInstituciones tinst ON tinst.idTipoInstitucion = inst.tiposInstituciones_idTipoInstitucion ";
		$consulta .="JOIN estados edo ON edo.idEstado = inst.estados_idEstado ";
		$consulta .="JOIN paises ps ON ps.idPais = edo.paises_idPais ";
		$consulta .="JOIN tiporesponsable tr ON tr.idTipoResponsable = r.tipoResponsable_idTipoResponsable ";
		$consulta .="WHERE c.idConvenio = ".$id;

			$resultadosResponContrap=$conexion->createCommand($consulta)->query();


		/*Datos de los responsables por institucion contraparte*/

 				$resultadosResponContrap->bindColumn(1,$resulResponsablesC->institucion);			//id institucion
 				$resultadosResponContrap->bindColumn(2,$resulResponsablesC->nombre_convenio); 		//Siglas de la institucion
				$resultadosResponContrap->bindColumn(3,$resulResponsablesC->tipo_convenio);    		//nombre de la institucion
				$resultadosResponContrap->bindColumn(4,$resulResponsablesC->objetivo_convenio); 		//tipo institucion
				$resultadosResponContrap->bindColumn(5,$resulResponsablesC->fecha_inicio);			//estado ubicacion 
				$resultadosResponContrap->bindColumn(6,$resulResponsablesC->fecha_caducidad);   		//pais 
				$resultadosResponContrap->bindColumn(7,$resulResponsablesC->estado_actual_convenio); 	// nombre del responsable
				$resultadosResponContrap->bindColumn(8,$resulResponsablesC->responsable_Unet); 		// Apellido del responsable
				$resultadosResponContrap->bindColumn(9,$resulResponsablesC->clasificacion); 			// Correo  del responsable
				$resultadosResponContrap->bindColumn(10,$resulResponsablesC->ambito); 					// telefono  del responsable
				$resultadosResponContrap->bindColumn(11,$resulResponsablesC->tipo_institucion); 		    // tipo Responsable  del responsabl 
			
			$reponsablesinst;
			$i=0;
			while((($resultadosResponContrap->read())!==false)){
					$responsable=new ResultadoConvenios();

					$responsable->institucion=$resulResponsablesC->institucion;
					$responsable->nombre_convenio=$resulResponsablesC->nombre_convenio;
					$responsable->nombre_convenio=$resulResponsablesC->tipo_convenio;
					$responsable->objetivo_convenio=$resulResponsablesC->objetivo_convenio;
					$responsable->fecha_inicio=$resulResponsablesC->fecha_inicio;
					$responsable->fecha_caducidad=$resulResponsablesC->fecha_caducidad;
					$responsable->estado_actual_convenio=$resulResponsablesC->estado_actual_convenio;
					$responsable->responsable_Unet=$resulResponsablesC->responsable_Unet;
					$responsable->clasificacion=$resulResponsablesC->clasificacion;
					$responsable->ambito=$resulResponsablesC->ambito;
					$responsable->tipo_institucion=$resulResponsablesC->tipo_institucion;

					$reponsablesinst[$i]=$responsable;
					$i=$i+1;
			}
			

				return $reponsablesinst;
	}


	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$conexion=Yii::app()->db;
		$resullRespUNET = new ResultadoConvenios;
		$resulContraparte= new ResultadoConvenios;
		$resulResponsablesC= new ResultadoConvenios;


			/*Datos de los responsables de la UNET*/		
		$resultadosResponUnet=$this->consultarResponsablesUNET($id);
				$resultadosResponUnet->bindColumn(1,$resullRespUNET->fecha_inicio);     		//primer nombre responsable
				$resultadosResponUnet->bindColumn(2,$resullRespUNET->fecha_caducidad);  		//primer apellido de responsable
				$resultadosResponUnet->bindColumn(3,$resullRespUNET->objetivo_convenio);		//correo electronico
				$resultadosResponUnet->bindColumn(4,$resullRespUNET->tipo_convenio);   			//telefono
				$resultadosResponUnet->bindColumn(5,$resullRespUNET->estado_actual_convenio); 	// tipo de responsable

		/*Datos de las instituciones contraparte*/
		$resultadosInstContrap=$this->consultarInstitucionesContraparte($id);

				$resultadosInstContrap->bindColumn(1,$resulContraparte->institucion); 			//id institucion
				$resultadosInstContrap->bindColumn(2,$resulContraparte->tipo_convenio);    		//Siglas de la institucion
				$resultadosInstContrap->bindColumn(3,$resulContraparte->objetivo_convenio); 	//nombre de la institucion	
				$resultadosInstContrap->bindColumn(4,$resulContraparte->fecha_inicio);			//tipo institucion
				$resultadosInstContrap->bindColumn(5,$resulContraparte->fecha_caducidad);   	//estado ubicacion 	
				$resultadosInstContrap->bindColumn(6,$resulContraparte->estado_actual_convenio); //pais 

	    /*Datos de los responsables por institucion contraparte*/			

 		$resultadosResponContrap=$this->ConsultarResponsablesPorInstitucion($id);

 		/*Buscando el estado actual recordar tomar en cuanta las prorrogas*/

	    $consultan  ="SELECT ec.nombreEstadoConvenio FROM convenios c ";
	    $consultan .="JOIN convenio_estados ce ON ce.convenios_idConvenio = c.idConvenio ";
	    $consultan .="JOIN estadoconvenios ec ON ce.estadoConvenios_idEstadoConvenio = ec.idEstadoConvenio ";
	    $consultan .="WHERE ce.fechaCambioEstado = ( ";
	    $consultan .="SELECT MAX( fechaCambioEstado ) FROM convenio_estados ";
	    $consultan .="WHERE convenios_idConvenio = c.idConvenio ) and c.idConvenio = ".$id;
		

		$resultados2=$conexion->createCommand($consultan)->query();

        $resultados2->bindColumn(1,$estador); //estado actual del convenio


         while(($row=$resultados2->read())!==false) { 
              $estado=$estador;
          }
 	
		$this->render('view',array(
			'model'=>$this->loadModel($id),				 /*Datos generales del convenio*/
			'resulRU'=>$resultadosResponUnet,  
			'resullRespUNET'=>$resullRespUNET,
			'resulRC'=>$resultadosInstContrap,
			'resullRespCONT'=>$resulContraparte,
			'InforRC'=>$resultadosResponContrap,
			'estado'=>$estado,
		));
	}
    /*Renovar es una nueva fecha de caducidad*/
	public function actionRenovar($id)
	{
		$model=$this->loadModel($id);

		$renovacion= new Renovacionprorrogas;

		$conexion=Yii::app()->db;
		$consultan  ="SELECT ec.nombreEstadoConvenio FROM convenios c ";
	    $consultan .="JOIN convenio_estados ce ON ce.convenios_idConvenio = c.idConvenio ";
	    $consultan .="JOIN estadoconvenios ec ON ce.estadoConvenios_idEstadoConvenio = ec.idEstadoConvenio ";
	    $consultan .="WHERE ce.fechaCambioEstado = ( ";
	    $consultan .="SELECT MAX( fechaCambioEstado ) FROM convenio_estados ";
	    $consultan .="WHERE convenios_idConvenio = c.idConvenio ) and c.idConvenio = ".$id;
		

		$resultados2=$conexion->createCommand($consultan)->query();

        $resultados2->bindColumn(1,$estador); //estado actual del convenio


         while(($row=$resultados2->read())!==false) { 
              $estado=$estador;
          }

		  
          if(isset($_POST["Renovacionprorrogas"])){
          	
          	$renovacion->attributes=$_POST["Renovacionprorrogas"];
			$renovacion->convenios_idConvenio=$id;
			$renovacion->fechaRenovacion=Date("Y-m-d");
			$renovacion->fechaCaducidadModificada=$model->fechaCaducidadConvenio;



			if(isset($_POST["ajax"]) && $_POST["ajax"]==='form'){

	       		echo CActiveForm::validate($renovacion);
	       		Yii::app()->end();
             }

			if($renovacion->validate()){

				$model->fechaCaducidadConvenio=$renovacion->fechaFinProrroga;

				if($renovacion->save()){

					if($model->save())
						$this->redirect(array('view','id'=>$id));

				}

			}

          }


		$this->render('renovar',array(
		 'model'=>$model,
		 'estado'=>$estado,
		 'renovar'=>$renovacion,
		 ));
	}
	/* nuevo estado al convenio*/
	public function actionCambiarEstado($id)
	{
		$model=$this->loadModel($id);
		$conexion=Yii::app()->db;
		
		$modelEdoConve=Estadoconvenios::model()->findAll(); //Busco los nombres de los estados 
		$modelDependencia=Dependencias::model()->findAll(); //Busco las dependencias
		$modelestado = new ConvenioEstados; // se le crea el formulario al modelo viaja por post
		
		$resull= new ResultadoConvenios;; //estado hallados en la base de datos


		$consultan  ="SELECT ec.nombreEstadoConvenio, ce.fechaCambioEstado, ce.numeroReporte, ce.observacionCambioEstado, d.nombreDependencia FROM convenios c ";
	    $consultan .="JOIN convenio_estados ce ON ce.convenios_idConvenio = c.idConvenio ";
	    $consultan .="JOIN estadoconvenios ec ON ce.estadoConvenios_idEstadoConvenio = ec.idEstadoConvenio ";	
	    $consultan .="JOIN dependencias d ON d.idDependencia=ce.dependencias_idDependencia "; 
	    $consultan .="WHERE  c.idConvenio = ".$id;
		

		$resultados=$conexion->createCommand($consultan)->query();

        $resultados->bindColumn(1,$resull->nombre_convenio);  //nombre del estado del convenio
        $resultados->bindColumn(2,$resull->fecha_inicio); //fecha cambio estado
		$resultados->bindColumn(3,$resull->fecha_caducidad); //nro reporte
		$resultados->bindColumn(4,$resull->objetivo_convenio); //observacion
		$resultados->bindColumn(5,$resull->tipo_convenio); //dependencia


		if(isset($_POST["ConvenioEstados"])){


			$modelestado->attributes=$_POST["ConvenioEstados"];
			//$modelestado->id_convenio_estado=10;
			$modelestado->convenios_idConvenio=$id;

			if($modelestado->validate()){

				/*if(empty($modelestado->dependencias_idDependencia)){
			      echo $modelestado->dependencias_idDependencia."JOJO"; /*No muestra por el join en la consulta pero si guarda*/
			 	
			 /*	 }*/

				if($modelestado->save())
				 $this->redirect(array('cambiarEstado','id'=>$id));

			}else{
				//echo "errores en el formulario";
			}

		}

		$this->render('cambiarEstado',array(
			'model'=>$model,
			'modeloE'=>$modelestado,
			'resultados'=>$resultados,
			'modelEdoBD'=>$resull,
			'modelEdo'=>$modelEdoConve,
			'modelDpcia'=>$modelDependencia,
			
			));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		//modelo para la tabla convenios 

		$model=new Convenios;

		$pasouno=new PasounoForm;

		$dep=new Dependencias;

		//logic del formulario 
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST["PasounoForm"])){
			$pasouno->attributes=$_POST["PasounoForm"];
			
			$count = Convenios::model()->countBySql("select COUNT(*) from convenios"); 
	  		$pasouno->idconvenio=$count+1;

			if($pasouno->validate()){

				$_SESSION['idconvenio']=$pasouno->idconvenio;
				$_SESSION['nombreconvenio']=$pasouno->nombreconvenio;
				$_SESSION['fechainicioconvenio']=$pasouno->fechainicio;
				$_SESSION['fechacaducidadconvenio']=$pasouno->fechacaducidad;
				$_SESSION['objetivo']=$pasouno->objetivo;
				$_SESSION['dependenciaconvenio']=$pasouno->dependencia;
				$_SESSION['tipo']=$pasouno->tipo;
				$_SESSION['estado']=$pasouno->estado;
				$_SESSION['clasificacion']=$pasouno->clasificacion;
				$_SESSION['alcance']=$pasouno->alcance;
				//$pasouno->idconvenio;
				//$pasouno->nombreconvenio;
			//	$this->redirect(array("create"));
		
				$this->redirect(array('convenios/pasodos',
				"idconvenio"=>$pasouno->idconvenio,
				));
			}
			}

			if (isset($_POST["Dependencias"])){
			$dep->attributes=$_POST["Dependencias"];

			if($dep->save()){

				echo "dependencia guardado";	
			}
			}

		$this->render('create',array(
			"pasouno"=>$pasouno,"dep"=>$dep
		));

	}
	public function actionPasodos($idconvenio){
		
		$model=new Convenios;
		$pasodos=new PasodosForm;
		$instituciones= new Instituciones;
		$paises = new Paises;
		$estados= new Estados;
		$responsable= new Responsables;
		
		if(isset($_POST["PasodosForm"])){

			$pasodos->attributes=$_POST["PasodosForm"];
			if($pasodos->validate()){

				$_SESSION['instanciaunet']=$pasodos->instanciaunet;
				$_SESSION['responsable_legal_unet']=$pasodos->responsable_legal_unet;
				$_SESSION['responsable_contacto_unet']=$pasodos->responsable_contacto_unet;
				//$_SESSION['institucion']=$pasodos->institucion;
				$_SESSION['instancia_contraparte']=$pasodos->instancia_contraparte;
				$_SESSION['responsable_legal_contraparte']=$pasodos->responsable_legal_contraparte;
				$_SESSION['responsable_contacto_contraparte']=$pasodos->responsable_contacto_contraparte;
				//en el paso tambien se llena la variable de sesioin de las instituciones (revisar esto )
				$this->redirect(array('convenios/pasotres',
				"idconvenio"=>$_SESSION['idconvenio']
				));
			}
		}

		$this->render('pasodos',array(
			"model"=>$model,"pasodos"=>$pasodos,"instituciones"=>$instituciones,"paises"=>$paises,"estados"=>$estados, "responsable"=>$responsable));


	}

	public function actionPasotres($idconvenio){

		$pasotres=new PasotresForm;

		if(isset($_POST["PasotresForm"])){
			$pasotres->attributes=$_POST["PasotresForm"];
			if($pasotres->validate()){

				$_SESSION['nro_acta']=$pasotres->nro_acta;
				$_SESSION['fecha_acta']=$pasotres->fecha_acta;
				$_SESSION['url_acta']=$pasotres->url_acta;
				$this->redirect(array('convenios/pasocuatro',"idconvenio"=>$_SESSION['idconvenio']));
			}
		}
		$this->render('pasotres',array("pasotres"=>$pasotres));

	}

	public function actionPasocuatro($idconvenio){

		$pasocuatro=new PasocuatroForm;

		if(isset($_POST["PasocuatroForm"])){
			$pasocuatro->attributes=$_POST["PasocuatroForm"];
			if($pasocuatro->validate()){

			//	$_SESSION['ventajas']=$pasocuatro->ventajas;
			//	$_SESSION['clasificacion']=$pasocuatro->clasificacion;
			//	$_SESSION['alcance']=$pasocuatro->alcance;
			//	$_SESSION['forma']=$pasocuatro->forma;
			//	$_SESSION['actividades']=$pasocuatro->actividades;
			//	$_SESSION['otras_instituciones']=$pasocuatro->otras_instituciones;
				$this->redirect(array('convenios/pasocinco',"idconvenio"=>$_SESSION['idconvenio']));
			}
		}

		$this->render('pasocuatro',array("pasocuatro"=>$pasocuatro));
	}

	public function actionPasocinco($idconvenio){

		$model= new Convenios;
		$model_ic= new InstitucionConvenios;
		$model_ce= new ConvenioEstados;
	

//-------------------------GUARDANDO EN LA TABLA CONVENIOS---------------------------------
		if (isset($_REQUEST['enviar'])) 
		{ 
			$model->idConvenio=$_SESSION['idconvenio'];
			$model->nombreConvenio=$_SESSION['nombreconvenio'];
			$model->fechaInicioConvenio=$_SESSION['fechainicioconvenio'];
			$model->fechaCaducidadConvenio=$_SESSION['fechacaducidadconvenio'];
			$model->objetivoConvenio=$_SESSION['objetivo'];
			$model->institucionUNET="UNET";
			$model->urlConvenio=$_SESSION['url_acta'];//colocar direccion del archivo real pdf 
			$model->clasificacionConvenios_idTipoConvenio=$_SESSION['clasificacion'];
			$model->tipoConvenios_idTipoConvenio=$_SESSION['tipo'];
			$model->alcanceConvenios=$_SESSION['alcance'];
			$model->dependencias_idDependencia=$_SESSION['dependenciaconvenio'];
			//$model->convenios_idConvenio=$_SESSION['idconvenio']; //aqui va el id si es especifico
			
			//Si guarda en la tabla convenios entonces guarde en la tabla Institución convenios
			if($model->save()){
//-----------------------------GUARDANDO EN INSTITUCIOIN CONVENIOS----------------------------
				for ($i=1; $i <count($_SESSION['institucion']) ; $i++) {

					$institucion_contraparte=explode('.',$_SESSION['institucion'][$i]);	

					$model_ic= new InstitucionConvenios;
					
					$model_hr1= new Historicoresponsables; //responsable legal
					$model_hr2= new Historicoresponsables;//responsable de contacto

					$model_ic->convenios_idConvenio=$_SESSION['idconvenio'];
					$model_ic->fechaIncorporacion=$_SESSION['fechainicioconvenio'];//la fecha de incorporacion es cuando inicia el convenio?
					$model_ic->instituciones_idInstitucion=$institucion_contraparte[0];

					if($model_ic->save()){
//------------------------------------------GUARDANDO EN HISTORICO DE RESPONSABLES-----CONTRAPARTE------------------//
						//buscando id de institucion
						
						$criteria= new CDbCriteria();
						$criteria->select='idInstitucionConvenio';
						$criteria->condition='instituciones_idInstitucion=:ins AND convenios_idConvenio=:conv';
						$criteria->params= array(':ins'=>$institucion_contraparte[0],':conv'=>$_SESSION['idconvenio']);
						$result= InstitucionConvenios::model()->find($criteria);
						echo $result['idInstitucionConvenio'];


						//guardando en historico de responsable
						//responsable legal
						$model_hr1->responsables_idResponsable=$institucion_contraparte[1];
						$model_hr1->institucion_convenios_idInstitucionConvenio=$result['idInstitucionConvenio'];
						$model_hr1->fechaAsignacionResponsable=$_SESSION['fechainicioconvenio']; //revisar fecha
						if($model_hr1->save()){
							echo "guardo responsable 1";
						}
						//responsable contacto
						$model_hr2->responsables_idResponsable=$institucion_contraparte[2];
						$model_hr2->institucion_convenios_idInstitucionConvenio=$result['idInstitucionConvenio'];
						$model_hr2->fechaAsignacionResponsable=$_SESSION['fechainicioconvenio']; //revisar fecha
						if($model_hr2->save()){
							echo "guardo responsable 2";
						}
						//echo "guardo";
					}
					else{
						print_r($model_ic->getErrors());
					}
					# code...
				}
//-----------------------------------------------GUARDANDO EN HISTORICO DE RESPONSABLES----- UNET------
					$model_hr3= new Historicoresponsables; //responsable legal 
					$model_hr3->responsables_idResponsable=$_SESSION['responsable_legal_unet'];
					$model_hr3->convenios_idConvenio=$_SESSION['idconvenio'];
					$model_hr3->fechaAsignacionResponsable=$_SESSION['fechainicioconvenio'];
					if($model_hr3->save()){
						echo "guardo responsable legal unet";
					}

					$model_hr4= new Historicoresponsables;//responsable de contacto
					$model_hr4->responsables_idResponsable=$_SESSION['responsable_contacto_unet'];
					$model_hr4->convenios_idConvenio=$_SESSION['idconvenio'];
					$model_hr4->fechaAsignacionResponsable=$_SESSION['fechainicioconvenio'];;
					if($model_hr4->save()){
						echo "guardo responsable contacto unet";
					}
//---------------------------------------------- GUARDANDO EN CONVENI-ESTADOS-------------------				
					$model_ce->convenios_idConvenio=$_SESSION['idconvenio'];
 					$model_ce->estadoConvenios_idEstadoConvenio=$_SESSION['estado'];
 					$model_ce->fechaCambioEstado=new CDbExpression('NOW()');
 					$model_ce->dependencias_idDependencia=$_SESSION['dependenciaconvenio'];
 					
 					if($model_ce->save()){
						echo "guardo";
					}
					else{
						print_r($model_ce->getErrors());
					}
	//--------------------------------------------GUARDANDO EN CONVENIO APORTES ---------------------------------------------			
				   for ($j=1; $j < count($_SESSION['aporte']); $j++) { 
				   	# code...
				   	$model_ca= new ConvenioAportes;
				   	$aporte_esp;
				   	$aporte_esp=explode('.',$_SESSION['aporte'][$j]);	
				    $model_ca->convenios_idConvenio=$_SESSION['idconvenio'];
				    $model_ca->descripcion_aporte=$aporte_esp[0];
				    $model_ca->monedas_idMoneda=$aporte_esp[1];
				    $model_ca->valor=$aporte_esp[2];
				    $model_ca->cantidad=$aporte_esp[3];
				    if($model_ca->save()){
				    	echo "guardo";
				    }
				    else{
				    	print_r($model_ca->getErrors());
				    }
				   }
//------------------------------------------GUARDANDO ACTA DE INTENCIÓN-----------------------------------
				   $acta = new Actaintencion;
				   
				   $acta->fechaActaIntencion=$_SESSION['fecha_acta'];
				   $acta->urlActaIntencion=$_SESSION['url_acta'];
				   $acta->convenios_idConvenio=$_SESSION['idconvenio'];
				   if($acta->save()){
				   		echo "guardo";
				   }
				   //redireccionando a la vista dle convenio 
				  // $this->redirect(array('view','id'=>$model->idConvenio));

			} //model->save
			else{
					print_r($model->getErrors());
			}
		}

		$this->render('pasocinco',array("model"=>$model));

	}

	public function actionPasoseis($idconvenio){
		$model= new Convenios;
		$model_ic= new InstitucionConvenios;
		$model_ce= new ConvenioEstados;
	
		if (isset($_REQUEST['enviar'])) 
		{ 
				$model->idConvenio=$_SESSION['idconvenio'];
				$model->nombreConvenio=$_SESSION['nombreconvenio'];
				$model->fechaCaducidadConvenio=$_SESSION['fechacaducidadconvenio'];
				$model->objetivoConvenio=$_SESSION['objetivo'];
				$model->institucionUNET=$_SESSION['institucion'];
				$model->urlConvenio=$_SESSION['url_acta'];
				$model->clasificacionConvenios_idTipoConvenio=$_SESSION['clasificacion'];
				$model->tipoConvenios_idTipoConvenio=$_SESSION['tipo'];
				$model->alcanceConvenios_idAlcanceConvenio=$_SESSION['alcance'];
				$model->formaConvenios_idFormaConvenio=$_SESSION['forma'];
				$model->dependencias_idDependencia=$_SESSION['dependenciaconvenio'];
				//$model->convenios_idConvenio=$_SESSION['idconvenio'];
				$model->fechaInicioConvenio=$_SESSION['fechainicioconvenio'];
				$model->ventajasBeneficiosConvenio=$_SESSION['ventajas'];

				echo $model->idConvenio;
				echo $model->nombreConvenio;
				echo $model->fechaInicioConvenio;
				echo $model->fechaCaducidadConvenio;
				echo $model->objetivoConvenio;
				echo $model->institucionUNET;
				echo $model->urlConvenio;
				echo $model->clasificacionConvenios_idTipoConvenio;
				echo $model->tipoConvenios_idTipoConvenio;
				echo $model->alcanceConvenios_idAlcanceConvenio;
				echo $model->formaConvenios_idFormaConvenio;
				echo $model->dependencias_idDependencia;
				//$model->convenios_idConvenio=$_SESSION['idconvenio'];
			
				//Guardando en la tabla convenios
				//if($model->validate()){}
 				if($model->save()){
				//	$this->redirect(array('view','id'=>$model->idConvenio));
 					//$model_ic->idInstitucionConvenio=$_SESSION['idconvenio'];
 					$model_ic->instituciones_idInstitucion=$_SESSION['institucion'];
 					$model_ic->convenios_idConvenio=$_SESSION['idconvenio'];
 					$model_ic->fechaIncorporacion=$_SESSION['fechainicioconvenio'];
 					//Guardando en la tabla institucion convenios
 					if($model_ic->save()){
 						//
 						
 						//$model_ce->id_convenio_estado=$_SESSION['idconvenio'];
 						$model_ce->convenios_idConvenio=$_SESSION['idconvenio'];
 						$model_ce->estadoConvenios_idEstadoConvenio=$_SESSION['estado'];
 						$model_ce->fechaCambioEstado=new CDbExpression('NOW()');
 						$model_ce->dependencias_idDependencia=$_SESSION['dependenciaconvenio']; //definir estado inicial y cual dependencia lo coloca
 						//Guardando en la tabla convenio estados 
 						if($model_ce->save()){
						$this->redirect(array('view','id'=>$model->idConvenio));
						}
						else{
							print_r($model_ce->getErrors());
						}

					}
					else{
						print_r($model_ic->getErrors());
					}
				}
				else{
					print_r($model->getErrors());
				}
		}

		$this->render('pasoseis',array("model"=>$model));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Convenios']))
		{
			$model->attributes=$_POST['Convenios'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idConvenio));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Convenios');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Convenios('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Convenios']))
			$model->attributes=$_GET['Convenios'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	public function RespuestaConsultaConvenios($criterio, $inicio=false, $nroconv=false){

			$resullC= new ResultadoConvenios;
			$conexion=Yii::app()->db;

			if($inicio!==false && $nroconv!==false){

				
				$consulta  = "SELECT DISTINCT c.nombreConvenio, c.fechaInicioConvenio, c.fechaCaducidadConvenio,c.objetivoConvenio,tc.descripcionTipoConvenio, ec.nombreEstadoConvenio, c.idConvenio, r.correoElectronicoResponsable FROM convenios c ";
				$consulta .= "JOIN tipoconvenios tc ON tc.idTipoConvenio = c.tipoConvenios_idTipoConvenio ";
				$consulta .= "JOIN convenio_estados ce ON ce.convenios_idConvenio=c.idConvenio ";
				$consulta .= "JOIN estadoconvenios ec ON ce.estadoConvenios_idEstadoConvenio=ec.idEstadoConvenio ";
				$consulta .= "JOIN institucion_convenios ic ON c.idConvenio = ic.convenios_idConvenio ";
				$consulta .= "JOIN instituciones inst ON inst.idInstitucion = ic.instituciones_idInstitucion ";
				$consulta .= "JOIN tiposinstituciones tinst ON  tinst.idTipoInstitucion = inst.tiposInstituciones_idTipoInstitucion ";
				$consulta .= "JOIN estados edo ON edo.idEstado = inst.estados_idEstado ";
				$consulta .= "JOIN paises ps ON ps.idPais=edo.paises_idPais ";
				$consulta .= "JOIN historicoresponsables hr ON c.idConvenio = hr.convenios_idConvenio ";
				$consulta .= "JOIN responsables r ON r.idResponsable  = hr.responsables_idResponsable ";
				$consulta .= "JOIN tiporesponsable tr ON tr.idTipoResponsable= r.tipoResponsable_idTipoResponsable ";
				$consulta .= "WHERE ce.fechaCambioEstado = (
							SELECT MAX( fechaCambioEstado ) 
							FROM convenio_estados
							WHERE convenios_idConvenio = c.idConvenio
							) and upper(tr.descripcionTipoResponsable) = 'CONTACTO' ";
				
				if(isset($criterio->anio) && $criterio->anio!=null){
				 $consulta .="and YEAR(c.fechaInicioConvenio)=".$criterio->anio." ";	
				 
				}
				if(isset($criterio->tipo_convenio)){
					
						$ctipo=null;
						$suma=0;
						foreach ($criterio->tipo_convenio as $k => $row) {

							if($row!=0){
								$ctipo=$row.",".$ctipo;

							}
							$suma=$row+$suma;
						}
						$ctipo=substr($ctipo, 0, -1);
	                   
					    if($suma!=0){     
					
					      $consulta .="and tc.idTipoConvenio IN (".$ctipo.") ";		
					    }
					
				}
				if(isset($criterio->clasificacion)){

 					$cclasif=null;
 					$suma=0;
					foreach ($criterio->clasificacion as $k => $row) {

						if($row!=0){
							$cclasif=$row.",".$cclasif;
						}
						$suma=$row+$suma;
					}
					$cclasif=substr($cclasif, 0, -1);

					 if($suma!=0){
					
				       $consulta .="and c.clasificacionConvenios_idTipoConvenio IN (".$cclasif.") ";	  
				    }

				}
				if(isset($criterio->ambito)){
						
						if($criterio->ambito=="01"){
							$consulta .="and ps.idPais!=".'"35"'." ";	
						}
						if($criterio->ambito=="02"){
							$consulta .="and ps.idPais=".'"35"'." ";	
						}
						if($criterio->ambito=="03"){
							$consulta .="and edo.idEstado=".'"9"'." ";	
						}	

				}
				if(isset($criterio->pais)&&$criterio->pais!=""){
						$consulta .="and ps.idPais=".$criterio->pais." ";
					
				}
				if(isset($criterio->tipo_institucion)){

					$ctinst=null;
					$suma=0;
					foreach ($criterio->tipo_institucion as $k => $row) {
						if($row!=0){
							$ctinst=$row.",".$ctinst;
						}
						$suma=$row+$suma;
					}
				    $ctinst=substr($ctinst, 0, -1);

				     if($suma!=0){
				   		$consulta .="and tinst.idTipoInstitucion IN (".$ctinst.") ";
				   	
				    }
				}
				if(isset($criterio->institucion)&&$criterio->institucion!=""){
				  		$consulta .="and inst.idInstitucion=".$criterio->institucion." ";
				  	
				}
				if(isset($criterio->estado_actual_convenio)){
					 $cestado=null;
					 $suma=0;
					 foreach ($criterio->estado_actual_convenio as $k => $row) {
					 	if($row!=0){
						$cestado=$row.",".$cestado;
						}
						$suma=$row+$suma;
					 }
					 $cestado=substr($cestado, 0, -1);

					 if($suma!=0){
					  $consulta .="and ec.idEstadoConvenio IN (".$cestado.") ";
				
					 }
				}
				if(isset($criterio->fecha_inicio)&& $criterio->fecha_inicio!="" && isset($criterio->fecha_caducidad)&& $criterio->fecha_caducidad!=""){
					
  					$consulta .='and c.fechaCaducidadConvenio BETWEEN  '.'"'.$criterio->fecha_inicio.'"'.' AND '.'"'.$criterio->fecha_caducidad.'"'.' ';
  				
				}


				 $consulta .=" limit ".$inicio.",".$nroconv;


			}else{

				$consulta  = "SELECT DISTINCT c.nombreConvenio, c.fechaInicioConvenio, c.fechaCaducidadConvenio,c.objetivoConvenio,tc.descripcionTipoConvenio, ec.nombreEstadoConvenio, c.idConvenio, r.correoElectronicoResponsable FROM convenios c ";
				$consulta .= "JOIN tipoconvenios tc ON tc.idTipoConvenio = c.tipoConvenios_idTipoConvenio ";
				$consulta .= "JOIN convenio_estados ce ON ce.convenios_idConvenio=c.idConvenio ";
				$consulta .= "JOIN estadoconvenios ec ON ce.estadoConvenios_idEstadoConvenio=ec.idEstadoConvenio ";
				$consulta .= "JOIN institucion_convenios ic ON c.idConvenio = ic.convenios_idConvenio ";
				$consulta .= "JOIN instituciones inst ON inst.idInstitucion = ic.instituciones_idInstitucion ";
				$consulta .= "JOIN tiposinstituciones tinst ON  tinst.idTipoInstitucion = inst.tiposInstituciones_idTipoInstitucion ";
				$consulta .= "JOIN estados edo ON edo.idEstado = inst.estados_idEstado ";
				$consulta .= "JOIN paises ps ON ps.idPais=edo.paises_idPais ";
				$consulta .= "JOIN historicoresponsables hr ON c.idConvenio = hr.convenios_idConvenio ";
				$consulta .= "JOIN responsables r ON r.idResponsable  = hr.responsables_idResponsable ";
				$consulta .= "JOIN tiporesponsable tr ON tr.idTipoResponsable= r.tipoResponsable_idTipoResponsable ";
				$consulta .= "WHERE ce.fechaCambioEstado = (
							SELECT MAX( fechaCambioEstado ) 
							FROM convenio_estados
							WHERE convenios_idConvenio = c.idConvenio
							) and upper(tr.descripcionTipoResponsable) = 'CONTACTO' ";
				
				if(isset($criterio->anio) && $criterio->anio!=null){
				 $consulta .="and YEAR(c.fechaInicioConvenio)=".$criterio->anio." ";	
				 
				}
				if(isset($criterio->tipo_convenio)){
					
						$ctipo=null;
						$suma=0;
						foreach ($criterio->tipo_convenio as $k => $row) {

							if($row!=0){
								$ctipo=$row.",".$ctipo;

							}
							$suma=$row+$suma;
						}
						$ctipo=substr($ctipo, 0, -1);
	                   
					    if($suma!=0){     
					
					      $consulta .="and tc.idTipoConvenio IN (".$ctipo.") ";		
					    }
					
				}
				if(isset($criterio->clasificacion)){

 					$cclasif=null;
 					$suma=0;
					foreach ($criterio->clasificacion as $k => $row) {

						if($row!=0){
							$cclasif=$row.",".$cclasif;
						}
						$suma=$row+$suma;
					}
					$cclasif=substr($cclasif, 0, -1);

					 if($suma!=0){
					
				       $consulta .="and c.clasificacionConvenios_idTipoConvenio IN (".$cclasif.") ";	  
				    }

				}
				if(isset($criterio->ambito)){
						
						if($criterio->ambito=="01"){
							$consulta .="and ps.idPais!=".'"35"'." ";	
						}
						if($criterio->ambito=="02"){
							$consulta .="and ps.idPais=".'"35"'." ";	
						}
						if($criterio->ambito=="03"){
							$consulta .="and edo.idEstado=".'"9"'." ";	
						}	

				}
				if(isset($criterio->pais)&&$criterio->pais!=""){
						$consulta .="and ps.idPais=".$criterio->pais." ";
					
				}
				if(isset($criterio->tipo_institucion)){

					$ctinst=null;
					$suma=0;
					foreach ($criterio->tipo_institucion as $k => $row) {
						if($row!=0){
							$ctinst=$row.",".$ctinst;
						}
						$suma=$row+$suma;
					}
				    $ctinst=substr($ctinst, 0, -1);

				     if($suma!=0){
				   		$consulta .="and tinst.idTipoInstitucion IN (".$ctinst.") ";
				   	
				    }
				}
				if(isset($criterio->institucion)&&$criterio->institucion!=""){
				  		$consulta .="and inst.idInstitucion=".$criterio->institucion." ";
				  	
				}
				if(isset($criterio->estado_actual_convenio)){
					 $cestado=null;
					 $suma=0;
					 foreach ($criterio->estado_actual_convenio as $k => $row) {
					 	if($row!=0){
						$cestado=$row.",".$cestado;
						}
						$suma=$row+$suma;
					 }
					 $cestado=substr($cestado, 0, -1);

					 if($suma!=0){
					  $consulta .="and ec.idEstadoConvenio IN (".$cestado.") ";
				
					 }
				}
				if(isset($criterio->fecha_inicio)&& $criterio->fecha_inicio!="" && isset($criterio->fecha_caducidad)&& $criterio->fecha_caducidad!=""){
					
  					$consulta .='and c.fechaCaducidadConvenio BETWEEN  '.'"'.$criterio->fecha_inicio.'"'.' AND '.'"'.$criterio->fecha_caducidad.'"'.' ';
  				
				}
		
			}
    
    			$resultados=$conexion->createCommand($consulta)->query();
    			return 	$resultados;
	}


	public function actionConsultara(){
   	
	$resultados=null;
	$resull3= new ResultadoConvenios;
	$BusquedaUsuario= new ResultadoConvenios; //almacena las variables que viajan por el post a traves de ajax
	$convxpag=2;
	$iniciopag=$_POST['inicio'];//la variable que viaja por ajax post para la paginacion
	$nuevoinicioPag=($iniciopag-1)*$convxpag;


	$BusquedaUsuario->anio=$_POST['anio'];
	$BusquedaUsuario->tipo_convenio=$_POST['tipo'];
	$BusquedaUsuario->clasificacion=$_POST['clasificacion'];
	$BusquedaUsuario->ambito=$_POST['ambito'];
	$BusquedaUsuario->pais=$_POST['pais'];
	$BusquedaUsuario->estado_actual_convenio=$_POST['estadoConvenio'];
	$BusquedaUsuario->tipo_institucion=$_POST['tipoInstitucion'];
	$BusquedaUsuario->institucion=$_POST['institucion'];
	$BusquedaUsuario->fecha_inicio=$_POST['fechav1'];
    $BusquedaUsuario->fecha_caducidad=$_POST['fechav2'];

  	$resulTotal=$this->RespuestaConsultaConvenios($BusquedaUsuario);
  	$totalConvenios=count($resulTotal);

  	$paginas=ceil($totalConvenios/$convxpag);
  	
  	$resultados=$this->RespuestaConsultaConvenios($BusquedaUsuario,$nuevoinicioPag,$convxpag);
  	//print_r($resultados);


  				$resultados->bindColumn(1,$resull3->nombre_convenio);
				$resultados->bindColumn(2,$resull3->fecha_inicio);
				$resultados->bindColumn(3,$resull3->fecha_caducidad);
				$resultados->bindColumn(4,$resull3->objetivo_convenio);
				$resultados->bindColumn(5,$resull3->tipo_convenio);
				$resultados->bindColumn(6,$resull3->estado_actual_convenio);
				$resultados->bindColumn(7,$resull3->id_convenio);
				$resultados->bindColumn(8,$resull3->responsable_Unet);
			
		
		   $text=" ";
		   while(($row=$resultados->read())!==false) { 
		   	$text.="<aside id='prueba' class='list-group-item'>";
	            $text.="<div class='row'>";
				   
	            $text.="<div class='col-sm-2'><p class='text-info'>".$resull3->tipo_convenio." "."</p></div>"; 
	            $text.="<div class='col-sm-10'><a href=".Yii::app()->createUrl('/convenios/view')."&id=".$resull3->id_convenio." >".$resull3->nombre_convenio."</a></div>";  
				$text.="</div>";    

				 $text.="<div class='row'>";
					 $text.="<div class='col-sm-8'>";
					 	$text.="<ul>";
						  $text.="<li> Fecha Inicio: ".$resull3->fecha_inicio."</li>";
						  $text.="<li> Fecha Caducidad: ".$resull3->fecha_caducidad."</li>";
						  $text.="<li> Objetivo: ".$resull3->objetivo_convenio."</li>";
						  $text.="<li> Estado: ".$resull3->estado_actual_convenio."</li>";
						  $text.="<li> Responsable Contacto: ".$resull3->responsable_Unet."</li>";
					 	$text.="</ul>";
					 $text.="</div>";


					  $text.="<div class='col-sm-4'>";
					 	$text.="<ul class='list-inline'>";
					 	if(strcmp($resull3->tipo_convenio,"Marco")==0){
					 	  $text.="<li><a href='' data-toggle='tooltip' title='Agregar Específico'><span class='glyphicon glyphicon-plus'></span><a/></li>";	
					 	}

					 	$text.="<li><a href="."'".$this->createUrl("/convenios/update")."&id=".$resull3->id_convenio."'"." data-toggle='tooltip' title='Editar'><span class='glyphicon glyphicon-pencil'></span></a></li>";
 						$text.="<li><a href="."'".$this->createUrl("/convenios/renovar")."&id=".$resull3->id_convenio."'"." data-toggle='tooltip' title='Renovar'><span class='glyphicon glyphicon-time'></span></a></li>";
 						$text.="<li><a href="."'".$this->createUrl("/convenios/cambiarEstado")."&id=".$resull3->id_convenio."'"." sdata-toggle='tooltip' title='Cambiar Estado'><span class='glyphicon glyphicon-refresh'></span></a></li>";
						$text.="<li><a href='' data-toggle='tooltip' title='Descargar'><span class='glyphicon glyphicon-cloud-download'></a></span></li>";
                        $text.="<li><a href='' data-toggle='tooltip' title='Eliminar'><span class='glyphicon glyphicon-trash'></span></a></li>"; 

						  
					 	$text.="</ul>";
					 $text.="</div>";


				 $text.="</div>";

			 $text.= "</aside>"; 
		    }	 
//				$text.='<nav aria-label="Page navigation"> ';
				$text.=' <ul class="pagination pagination-sm">';

				if($iniciopag>1){
					$valor=$iniciopag-1;
					$text.='<li >
					      <a href="javascript:void(0)" aria-label="Previous"  onclick="send('.$valor.')">
					        <span aria-hidden="true">&laquo;</span>
					      </a>
					    </li>';

				}else{
						$text.='<li class="disabled">
					      <a href="" aria-label="Previous">
					        <span aria-hidden="true">&laquo;</span>
					      </a>
					    </li>';
				}
			

			    for($i=1;$i<=$paginas;$i++){
			    	if($i==$iniciopag){
						$text.='<li class="active"><a  href="javascript:void(0)">'.$i.'</a></li>';
			    	}else{
				    	$text.='<li><a href="javascript:void(0)" onclick="send('.$i.')">'.$i.'</a></li>';
			    	}
			    }

			    if($iniciopag<$paginas){

			    		$valorn=$iniciopag+1;
			    		$text.='<li>
					      <a href="javascript:void(0)" aria-label="Next" onclick="send('.$valorn.')" >
					        <span aria-hidden="true">&raquo;</span>
					      </a>
					    </li>';

			    }else{

			    	$text.='<li class="disabled" >
					      <a href="javascript:void(0)" aria-label="Next" >
					        <span aria-hidden="true">&raquo;</span>
					      </a>
					    </li>';

			    }
   
			
				$text.='</ul>';
//				$text.='</nav>';

		echo $text;  		 
                               
 //echo Yii::app()->createUrl("site/informacion");    

	    /*

		foreach ($_POST['x1'] as $k => $v){
    		echo " ".$v." ";
		}*/
      
      // print_r($_POST['x1'][1]);

	
	}

	public function actionConsultar()
	{

		$modelConv=Convenios::model()->findAll();
		$modelTipo=Tipoconvenios::model()->findAll();
		$modelClass=Clasificacionconvenios::model()->findAll();
		$modelPais=Paises::model()->findAll();
		$modelTipoIns=Tiposinstituciones::model()->findAll();
        $modelInst=Instituciones::model()->findAll();
        $modelEdoConve=Estadoconvenios::model()->findAll();
		$formConsulta = new ConsultasConvenios;

		if(isset($_POST["ajax"]) && $_POST["ajax"]==='form'){

	       	echo CActiveForm::validate($formConsulta);
	       	Yii::app()->end();
        }

        /*El convenio tiene porroga? de ser asi la fecha de caducidad coresponde a la informacion de la tabla renovacionProrroga*/

            $conexion=Yii::app()->db;
				//$command = $conexion->createCommand('call ejemplo1()');
				//$command->execute(); 

				//print_r($command);


		
     	$this->render('consultar',array(
     		'model'=>$formConsulta,
     		'tipoconve'=>$modelTipo,
     		'clasif'=>$modelClass,
     		'paisesconve'=>$modelPais,
     		'tiposinst'=>$modelTipoIns,
       		'institucionconve'=>$modelInst,
        	'estadoconve'=>$modelEdoConve,
        	'resuldefecto'=>1,
     		));

	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Convenios the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Convenios::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Convenios $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='convenios-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionSelectdos(){
		$id_uno=$_POST['Paises']['idPais'];
		$lista=Estados::model()->findAll('paises_idPais=:id_uno',array(':id_uno'=>$id_uno));
		$lista=CHtml::listData($lista,'idEstado','nombreEstado');

	foreach ($lista as $valor => $descripcion) {
			echo CHtml::tag('option',array('value'=>$valor),CHtml::encode($descripcion), true);
		}
	}

	public function actionGuardardependencia(){

		$dependencia= new Dependencias;
		$dependencia->nombreDependencia=$_POST['nombre'];
		$dependencia->telefonoDependencia=$_POST['telefono'];		

			if($dependencia->save()){

				//echo $_POST['nombre'];
		 	    //echo $_POST['telefono'];
		 	    $lista= Dependencias::model()->findAll();
		 	    $lista=CHtml::listData($lista,'idDependencia','nombreDependencia');

				foreach ($lista as $valor => $descripcion) {
						echo CHtml::tag('option',array('value'=>$valor),CHtml::encode($descripcion), true);
				}	
			}	
			
	}

	public function actionGuardarinstitucion(){

		// echo("<script>console.log('Extension ".$e."');</script>"); 
		 echo("<script>console.log('Entrooo');</script>"); 
		 
		 $institucion= new Instituciones;
		 
		 if(isset($_POST["Instituciones"])){
			$institucion->attributes=$_POST["Instituciones"];
			$institucion->save();

			$lista= Instituciones::model()->findAll();
		 	$lista=CHtml::listData($lista,'idInstitucion','nombreInstitucion');

				foreach ($lista as $valor => $descripcion) {
						echo CHtml::tag('option',array('value'=>$valor),CHtml::encode($descripcion), true);
				}	
		 }
		
	}
	public function actionGuardarresponsable(){

		// echo("<script>console.log('Extension ".$e."');</script>"); 
		
		  echo("<script>console.log('Entrooo');</script>"); 
		 $responsable= new Responsables;
		 
		 if(isset($_POST["Responsables"])){
		 	 echo("<script>console.log('Existe el formulario');</script>"); 
			$responsable->attributes=$_POST["Responsables"];
			$responsable->instituciones_idInstitucion=$_COOKIE['cookinst'];

			 //echo("<script>console.log('Nombre ".$responsable->primerNombreResponsable."');</script>");  
			if($responsable->save()){
				 echo("<script>console.log('guardo');</script>"); 
			}
			else{
				//print_r("<script>console.log('Errores ".$$responsable->getErrors()."');</script>");
			}

			//$lista= Instituciones::model()->findAll();
		 	//$lista=CHtml::listData($lista,'idInstitucion','nombreInstitucion');

			//	foreach ($lista as $valor => $descripcion) {
			//			echo CHtml::tag('option',array('value'=>$valor),CHtml::encode($descripcion), true);
			//	}	
		 }
		
	}
//*****************************************FUNCIONES DE AUTOCOMPLETADO**********************************************
			public function actionAutocomplete($term) 
			{
			 $criteria = new CDbCriteria;
			 $criteria->compare('LOWER(primerApellidoResponsable)', strtolower($_GET['term']), true);

			 $criteria->compare('LOWER(primerNombreResponsable)', strtolower($_GET['term']), true, 'OR');
			 $criteria->addCondition('instituciones_idInstitucion IS NULL');
			 $criteria->order = 'primerApellidoResponsable';
			 $criteria->limit = 30; 
			 $data = Responsables::model()->findAll($criteria);

			 if (!empty($data))
			 {
			  $arr = array();
			  foreach ($data as $item) {
			   $arr[] = array(
			    'id' => $item->idResponsable,
			    'value' => $item->primerApellidoResponsable.' '.$item->primerNombreResponsable,
			    'label' => $item->primerApellidoResponsable.' '.$item->primerNombreResponsable,
			   );
			  }
			 }
			 else
			 {
			  $arr = array();
			  $arr[] = array(
			   'id' => '',
			   'value' => 'No se han encontrado resultados para su búsqueda',
			   'label' => 'No se han encontrado resultados para su búsqueda',
			  );
			 }
			  
			 echo CJSON::encode($arr);
			}
			public function actionAutocompletef($term) 
			{
			 $criteria = new CDbCriteria;
			 $criteria->compare('LOWER(primerApellidoResponsable)', strtolower($_GET['term']), true);

			 $criteria->compare('LOWER(primerNombreResponsable)', strtolower($_GET['term']), true, 'OR');
			  $criteria->compare('instituciones_idInstitucion', $_COOKIE['cookinst'], true,'AND');
			// $criteria->condition="instituciones_idInstitucion=:col_inst";
			 //$criteria->params=array(':col_inst'=>$_COOKIE['cookinst']);
			 $criteria->order = 'primerApellidoResponsable';
			 $criteria->limit = 30; 
			 $data = Responsables::model()->findAll($criteria);

			 if (!empty($data))
			 {
			  $arr = array();
			  foreach ($data as $item) {
			   $arr[] = array(
			    'id' => $item->idResponsable,
			    'value' => $item->primerApellidoResponsable.' '.$item->primerNombreResponsable,
			    'label' => $item->primerApellidoResponsable.' '.$item->primerNombreResponsable,
			   );
			  }
			 }
			 else
			 {
			  $arr = array();
			  $arr[] = array(
			   'id' => '',
			   'value' => 'No se han encontrado resultados para su búsqueda',
			   'label' => 'No se han encontrado resultados para su búsqueda',
			  );
			 }
			  
			 echo CJSON::encode($arr);
			}

}
