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

				'actions'=>array('index','view','archivo','pasodos','pasotres','pasocuatro','pasocinco','pasoseis','consultar','consultara','selectdos','autocomplete','autocompletef','guardarinstitucion','guardarresponsable','guardararchivo','validacionautocomplete','prueba','updateajax','reporte','guardardependencia','ConstruirReporte','createEspecifico','updateConvenio','guardarclasificacion','guardarestado','reiniciarvariables'),

				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','renovar','cambiarEstado','conveniosEspera','selectEstado','buscarConveniosV','eliminarec', 'eliminarEstado'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','eliminar'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	/**
	*Realiza la consulta de los responsables de la UNET para un convenio 
	*@param entero $id que representa el convenio
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
		$consulta .="JOIN tiposinstituciones tinst ON tinst.idTipoInstitucion = inst.tiposInstituciones_idTipoInstitucion ";
		$consulta .="JOIN estados edo ON edo.idEstado = inst.estados_idEstado ";
		$consulta .="JOIN paises ps ON ps.idPais = edo.paises_idPais ";
		$consulta .="WHERE c.idConvenio = ".$id; 

		$resultados=$conexion->createCommand($consulta)->query();

		return $resultados;

	}
	/**
	*Realiza la consulta de los responsables por institucion contraparte
	*@param entero $id que representa el convenio
	*/
	public function ConsultarResponsablesPorInstitucion($id){

	   $conexion=Yii::app()->db;

	   $resulResponsablesC= new ResultadoConvenios;

		$consulta  ="SELECT inst.idInstitucion,inst.siglasInstitucion, inst.nombreInstitucion, tinst.nombreTipoInstitucion, edo.nombreEstado, ps.nombrePais, r.primerNombreResponsable, r.primerApellidoResponsable, r.correoElectronicoResponsable, r.telefonoResponsable, tr.descripcionTipoResponsable FROM responsables r ";
		$consulta .="JOIN historicoresponsables hr ON r.idResponsable = hr.responsables_idResponsable ";
		$consulta .="JOIN institucion_convenios ic ON ic.idInstitucionConvenio = hr.institucion_convenios_idInstitucionConvenio ";
		$consulta .="JOIN convenios c ON c.idConvenio = ic.convenios_idConvenio ";
		$consulta .="JOIN instituciones inst ON inst.idInstitucion = ic.instituciones_idInstitucion ";
		$consulta .="JOIN tiposinstituciones tinst ON tinst.idTipoInstitucion = inst.tiposInstituciones_idTipoInstitucion ";
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

		$model=$this->loadModelView($id);

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

		$this->render('view',array(
			'model'=>$model,				 /*Datos generales del convenio*/
			'resulRU'=>$resultadosResponUnet,  
			'resullRespUNET'=>$resullRespUNET,
			'resulRC'=>$resultadosInstContrap,
			'resullRespCONT'=>$resulContraparte,
			'InforRC'=>$resultadosResponContrap,
			//'estado'=>$estado,
		));
	}
    /*Renovar es una nueva fecha de caducidad*/
	public function actionRenovar($id)
	{
		$model=$this->loadModel($id);

		$renovacion= new Renovacionprorrogas;

		/*$conexion=Yii::app()->db;
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
          }*/

		  
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
						$this->guardarBitacora(4, 1);
					if($model->save())
						$this->redirect(array('view','id'=>$id));

				}

			}

          }

		$this->render('renovar',array(
		 'model'=>$model,
		 //'estado'=>$estado,
		 'renovar'=>$renovacion,
		 ));
	}
	/* nuevo estado al convenio*/
   public function actionCambiarEstado($id)
	{
		$model=$this->loadModelCambiarEstdo($id);
		$modelEdoConve=Estadoconvenios::model()->findAll('idEstadoConvenio!=:idEstadoConvenio', array(':idEstadoConvenio'=>5)); //Busco los nombres de los estados que sean diferentes a aprobado
		
		$estadosCovenio = ConvenioEstados::model()->findAll('convenios_idConvenio=:convenios_idConvenio', array(':convenios_idConvenio'=>$id)); /*Todos los estados por los cuales ha pasado el convenio*/

		$modelDependencia=Dependencias::model()->findAll(); 
		$modelestado = new ConvenioEstados; 

		if(isset($_POST["ConvenioEstados"])){

			$modelestado->attributes=$_POST["ConvenioEstados"];			
			$modelestado->convenios_idConvenio=$id;

			//if($modelestado->validate()){

				if($modelestado->save())//{
					$this->redirect(array('conveniosEspera'));
				 //this->redirect(array('cambiarEstado','id'=>$id));
				 //$this->guardarBitacora(5, 1);
				 //$this->redirect(array('conveniosEspera'));
				 
			//	}
			//}
		}

			$this->render('cambiarEstado',array(
			'model'=>$model,
			'modeloE'=>$modelestado,
			'modelEdo'=>$modelEdoConve,
			'modelDpcia'=>$modelDependencia,
			'estadosConv'=>$estadosCovenio,
			
			));

	}

	public function actionCambiarEsta($id)
	{
		//$model=$this->loadModel($id);

		$model=$this->loadModelCambiarEstdo($id);
		

		$modelEdoConve=Estadoconvenios::model()->findAll('idEstadoConvenio!=:idEstadoConvenio', array(':idEstadoConvenio'=>5)); //Busco los nombres de los estados 
		$modelDependencia=Dependencias::model()->findAll(); //Busco las dependencias
		$modelestado = new ConvenioEstados; // se le crea el formulario al modelo viaja por post

		$modelArchivoConv= new ArchivosForm; //subir el archivo del convenio

		$estado=0; $archivo=0;


		if(isset($_POST["ConvenioEstados"])){

			$modelestado->attributes=$_POST["ConvenioEstados"];			
			$modelestado->convenios_idConvenio=$id;

			if($modelestado->validate()){

				/*if(empty($modelestado->dependencias_idDependencia)){
			      echo $modelestado->dependencias_idDependencia."JOJO"; /*No muestra por el join en la consulta pero si guarda*/
			 	
			 /*	 }*/

				if($modelestado->save())
				 $this->redirect(array('conveniosEspera'));
				
				/*$modelestado->save(); 
				$estado=1;*/

			}else{
				//echo "errores en el formulario";
			}

		}
		/*if(isset($_POST["ArchivosForm"])){

		
			$modelArchivoConv->attributes=$_POST["ArchivosForm"];

			$modelArchivoConv->titulo="convenios";	
			
			$documento=CUploadedFile::getInstancesByName('documento');

			
			if(count($documento)===0){
				//no ha subido ningun archivo
			}else if(!$modelArchivoConv->validate()){
				//informacion invalida
			}else{
				
				$path = Yii::getPathOfAlias('webroot').'/archivos/'.$modelArchivoConv->titulo."/";
				
				foreach ($documento as $doc => $i) {
				 					
					$docu=$model->idConvenio."_".$i->name;

					$model->urlConvenio=Yii::app()->request->baseUrl."/archivos/convenios/".$docu;

					$i->saveAs($path.$docu);
				}

				//echo $model->urlConvenio;
				//Actualizamos el Url del convenio
				$model->save();
				$archivo=1;
			}

		}*/	

		/*if($archivo==1&&$estado==1){
				 $this->redirect(array('cambiarEstado','id'=>$id));
				//echo "guardar los dos modelos";
		}else if($archivo==1){
				  $this->redirect(array('cambiarEstado','id'=>$id));
			//echo "Guardar solo archivo";
		}else if($estado==1){
				 $this->redirect(array('cambiarEstado','id'=>$id));
			//echo "Guardar solo estado";
		}else{
			//echo "Ninguno";
		} */

		$this->render('cambiarEstado',array(
			'model'=>$model,
			'modeloE'=>$modelestado,
			//'resultados'=>$resultados,
			//'modelEdoBD'=>$resull,
			'modelEdo'=>$modelEdoConve,
			'modelDpcia'=>$modelDependencia,
			'modelArchivoConv'=>$modelArchivoConv,
			
			));
	}
	/**
	 * Creates a new model de convenio especifico.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdateconvenio($id)
	{
		//modelo para la tabla convenios 
		$model=new Convenios;

		$pasouno=new PasounoForm;

		$dep=new Dependencias;

		$clas= new Clasificacionconvenios;

		$est= new Estadoconvenios;

		$model_ce= new ConvenioEstados;

//**************************************** PARA ACTUALIZAR UN CONVENIO **********************///
		//Cargando modelo inicial de convenios
		$model=$this->loadModel($id);
		$_SESSION["isNewRecord"]=1;
		//igualando las variables de sesión a los valores precargados del convenio.
				$_SESSION['nombreconvenio']=$model->nombreConvenio;
				$_SESSION['fechainicioconvenio']=$model->fechaInicioConvenio;
				$_SESSION['fechacaducidadconvenio']=$model->fechaCaducidadConvenio;
				$_SESSION['objetivo']=$model->objetivoConvenio;
				$_SESSION['dependenciaconvenio']=$model->dependencias_idDependencia;
				$_SESSION['tipo']=$model->tipoConvenios_idTipoConvenio;
				
				$fecha=Yii::app()->db->createCommand()
	                  ->select('MAX(fechaCambioEstado)')
	                  ->from('convenio_estados')
	                  ->where('convenios_idConvenio='+$id)
	                  ->queryScalar();
				
				$estado=Yii::app()->db->createCommand()
	                  ->select('estadoConvenios_idEstadoConvenio')
	                  ->from('convenio_estados')
	                  ->where('convenios_idConvenio='+$id+'and fechaCambioEstado='+$fecha)
	                  ->queryScalar();

	            $_SESSION['estado']=$estado;
				$_SESSION['alcance']=$model->alcanceConvenios;


		//Si le dio siguiente igualo las variables de sesión
		if (isset($_POST["PasounoForm"])){
			$pasouno->attributes=$_POST["PasounoForm"];
			

	
	  			echo("<script>console.log(".$pasouno->nombreconvenio.");</script>"); 
				//$_SESSION['idconvenio']=$pasouno->idconvenio;
				$_SESSION['nombreconvenio']=$pasouno->nombreconvenio;
				$_SESSION['fechainicioconvenio']=$pasouno->fechainicio;
				$_SESSION['fechacaducidadconvenio']=$pasouno->fechacaducidad;
				$_SESSION['objetivo']=$pasouno->objetivo;
				$_SESSION['dependenciaconvenio']=$pasouno->dependencia;
				$_SESSION['tipo']=$pasouno->tipo;
				$_SESSION['estado']=$pasouno->estado;
				$_SESSION['clasificacion']=$pasouno->clasificacion;
				$_SESSION['alcance']=$pasouno->alcance;


				if($pasouno->validate()){

						//-------------------------GUARDANDO EN LA TABLA CONVENIOS---------------------------------
					if (isset($_REQUEST['enviar'])) 
					{ 
						
						$model->nombreConvenio=$_SESSION['nombreconvenio'];
						$model->fechaInicioConvenio=$_SESSION['fechainicioconvenio'];
						$model->fechaCaducidadConvenio=$_SESSION['fechacaducidadconvenio'];
						$model->objetivoConvenio=$_SESSION['objetivo'];
						$model->institucionUNET="UNET";
						$model->urlConvenio="Sin Archivo";//colocar direccion del archivo real pdf 
						$model->clasificacionConvenios_idTipoConvenio=$_SESSION['clasificacion'];
						$model->tipoConvenios_idTipoConvenio=$_SESSION['tipo'];
						$model->alcanceConvenios=$_SESSION['alcance'];
						$model->dependencias_idDependencia=$_SESSION['dependenciaconvenio'];
						if(isset($_SESSION['idpapa']))
						$model->convenios_idConvenio=$_SESSION['idpapa']; //aqui va el id si es especifico
						
						//Si guarda en la tabla convenios entonces guarde en la tabla Institución convenios
						if($model->save()){


							$model_ce->convenios_idConvenio=$id;
							$model_ce->estadoConvenios_idEstadoConvenio=$_SESSION['estado'];
		 					$model_ce->fechaCambioEstado=new CDbExpression('NOW()');
		 					$model_ce->dependencias_idDependencia=$_SESSION['dependenciaconvenio'];

		 					if($model_ce->save()) 
								$this->redirect(array('view','id'=>$model->idConvenio));
						}

						//---------------------------------------------- GUARDANDO EN CONVENI-ESTADOS-------------------		 					
					}
					else{

						$this->redirect(array('convenios/pasodos',
						"idconvenio"=>$pasouno->idconvenio,
						));
					}
				}
			}
			

			if (isset($_POST["Dependencias"])){
			$dep->attributes=$_POST["Dependencias"];

			if($dep->save()){

				echo "dependencia guardado";	
			}
			}

		$this->render('update',array(
			"pasouno"=>$pasouno,"dep"=>$dep,"clas"=>$clas,"est"=>$est , "model"=>$model
		));


	}
	/**
	 * Creates a new model de convenio especifico.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreateEspecifico($id)
	{
		//modelo para la tabla convenios 
		$model=new Convenios;

		$pasouno=new PasounoForm;

		$dep=new Dependencias;

		//logic del formulario 
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$pasouno->idmarco=$id;

		if(isset($_POST['ajax'])&& $_POST['ajax']==='pasouno'){
			echo CActiveForm::validate($pasouno);
			Yii::app()->end();
		}

		if (isset($_POST["PasounoForm"])){
			$pasouno->attributes=$_POST["PasounoForm"];
			
			$count = Convenios::model()->countBySql("select COUNT(*) from convenios"); 
	  		$pasouno->idconvenio=$count+1;
	  		$_SESSION['idpapa']=$id;

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
			
				if($pasouno->validate()){
					$this->redirect(array('convenios/pasodos',
					"idconvenio"=>$pasouno->idconvenio,
					));
				}
			}
			}

			if (isset($_POST["Dependencias"])){
			$dep->attributes=$_POST["Dependencias"];

			if($dep->save()){

				echo "dependencia guardado";	
			}
			}
		$_SESSION['tipo']="2";
		$this->render('create',array(
			"pasouno"=>$pasouno,"dep"=>$dep
		));

	}
	public function actionCreate()
	{
		//modelo para la tabla convenios 
		$model=new Convenios;

		$pasouno=new PasounoForm;

		$dep=new Dependencias;

		$clas= new Clasificacionconvenios;

		$est= new Estadoconvenios;

		$model_ce= new ConvenioEstados;
		$_SESSION["isNewRecord"]=0;



		//logic del formulario 
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ajax'])&& $_POST['ajax']==='pasouno'){
			echo CActiveForm::validate($pasouno);
			Yii::app()->end();
		}

		

		
		if (isset($_POST["PasounoForm"])){
			$pasouno->attributes=$_POST["PasounoForm"];
			
			//$count = Convenios::model()->countBySql("select COUNT(*) from convenios"); 
	  		//$pasouno->idconvenio=$count+1;
			$count= Convenios::model()->maxId();
			$pasouno->idconvenio=$count+1;

	
	  			echo("<script>console.log(".$pasouno->nombreconvenio.");</script>"); 
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
			
				if($pasouno->validate()){

						//-------------------------GUARDANDO EN LA TABLA CONVENIOS---------------------------------
					if (isset($_REQUEST['enviar'])) 
					{ 
						$model->idConvenio=$_SESSION['idconvenio'];
						$model->nombreConvenio=$_SESSION['nombreconvenio'];
						$model->fechaInicioConvenio=$_SESSION['fechainicioconvenio'];
						$model->fechaCaducidadConvenio=$_SESSION['fechacaducidadconvenio'];
						$model->objetivoConvenio=$_SESSION['objetivo'];
						$model->institucionUNET="UNET";
						$model->urlConvenio="Sin Archivo";//colocar direccion del archivo real pdf 
						$model->clasificacionConvenios_idTipoConvenio=$_SESSION['clasificacion'];
						$model->tipoConvenios_idTipoConvenio=$_SESSION['tipo'];
						$model->alcanceConvenios=$_SESSION['alcance'];
						$model->dependencias_idDependencia=$_SESSION['dependenciaconvenio'];
						if(isset($_SESSION['idpapa']))
						$model->convenios_idConvenio=$_SESSION['idpapa']; //aqui va el id si es especifico
						
						//Si guarda en la tabla convenios entonces guarde en la tabla Institución convenios
						if($model->save()){

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

							$this->redirect(array('convenios/conveniosEspera'));
						}

						//---------------------------------------------- GUARDANDO EN CONVENI-ESTADOS-------------------	

							
		 					
					}
					else{

						$this->redirect(array('convenios/pasodos',
						"idconvenio"=>$pasouno->idconvenio,
						));
					}
				}
			}
			

			if (isset($_POST["Dependencias"])){
			$dep->attributes=$_POST["Dependencias"];

			if($dep->save()){

				echo "dependencia guardado";	
			}
			}

		$this->render('create',array(
			"pasouno"=>$pasouno,"dep"=>$dep,"clas"=>$clas,"est"=>$est
		));

	}
	public function actionPasodos($idconvenio){
		
		$model=new Convenios;
		$pasodos=new PasodosForm;
		$instituciones= new Instituciones;
		$paises = new Paises;
		$estados= new Estados;
		$responsable= new Responsables;

	if(isset($_POST['ajax'])&& $_POST['ajax']==='pasodos'){
			echo CActiveForm::validate($pasodos);
			Yii::app()->end();
		}
		
		if(isset($_POST["PasodosForm"])){

			$pasodos->attributes=$_POST["PasodosForm"];
			if($pasodos->validate()){
//comentario
				//$_SESSION['instanciaunet']=$pasodos->instanciaunet;
				$_SESSION['responsable_legal_unet']=$pasodos->responsable_legal_unet;
				$_SESSION['responsable_contacto_unet']=$pasodos->responsable_contacto_unet;
				//$_SESSION['institucion']=$pasodos->institucion;
				//$_SESSION['instanciaunet_contraparte']=$pasodos->instancia_contraparte;
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
		$modelArchivo= new ArchivosForm;

		if(isset($_POST["PasotresForm"])){
			$pasotres->attributes=$_POST["PasotresForm"];
			if($pasotres->validate()){

				$_SESSION['nro_acta']=$pasotres->nro_acta;
				$_SESSION['fecha_acta']=$pasotres->fecha_acta;
				$_SESSION['url_acta']=$pasotres->url_acta;
				echo "existe paso tres";
				//
			}
		}
		if(isset($_POST["ArchivosForm"])){
			$modelArchivo->attributes=$_POST["ArchivosForm"];

			$modelArchivo->titulo="actaIntencion";	// este es el nombre de la carpeta donde se almacenara el acta
			
			$documento=CUploadedFile::getInstancesByName('documento');	//este es el documento como tal. 

			if(count($documento)===0){
				//no ha subido ningun archivo
			}else if(!$modelArchivo->validate()){
				//informacion invalida
			}else{

				//creo la direccion donde se almacenrá
				$path = Yii::getPathOfAlias('webroot').'/archivos/'.$modelArchivo->titulo."/";

				foreach ($documento as $doc => $i) {
				 					
					$docu="Acta-".$i->name;

					$_SESSION['url_acta']=Yii::app()->request->baseUrl."/archivos/convenios/".$docu;

					//$model->urlConvenio=$path.$docu;

					$i->saveAs($path.$docu);

				}



			}

				//echo "existe formularioi de archivo";
				//echo $modelArchivo->titulo;
				$this->redirect(array('convenios/pasocuatro',"idconvenio"=>$_SESSION['idconvenio']));
		}

		$this->render('pasotres',array("pasotres"=>$pasotres,"modelArchivo"=>$modelArchivo));

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
			$model->urlConvenio="Sin Archivo";//colocar direccion del archivo real pdf 
			$model->clasificacionConvenios_idTipoConvenio=$_SESSION['clasificacion'];
			$model->tipoConvenios_idTipoConvenio=$_SESSION['tipo'];
			$model->alcanceConvenios=$_SESSION['alcance'];
			$model->dependencias_idDependencia=$_SESSION['dependenciaconvenio'];
			if(isset($_SESSION['idpapa']))
			$model->convenios_idConvenio=$_SESSION['idpapa']; //aqui va el id si es especifico
			
			//Si guarda en la tabla convenios entonces guarde en la tabla Institución convenios
			if($model->save()){

				echo "Guardo en convenios";
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
						echo "Guardo en institucion";
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
				   if(count($_SESSION['aporte'])>1){
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
				   }
//------------------------------------------GUARDANDO ACTA DE INTENCIÓN-----------------------------------
				  if($_SESSION['fecha_acta']!=""){
						   $acta = new Actaintencion;
						   
						   $acta->fechaActaIntencion=$_SESSION['fecha_acta'];
						   $acta->urlActaIntencion=$_SESSION['url_acta'];
						   $acta->convenios_idConvenio=$_SESSION['idconvenio'];
						   if($acta->save()){
						   		echo "guardo";
						   }
				   }
				    //***************************REINICIANDO VARIABLES DE SESION********************************
				   $_SESSION['idconvenio']="";
				   $_SESSION['tipo']="";
	 			   $_SESSION['nombreconvenio']="";
				   $_SESSION['fechainicioconvenio']="";
				   $_SESSION['fechacaducidadconvenio']="";
				   $_SESSION['objetivo']="";
				   $_SESSION['dependenciaconvenio']="";
				   $_SESSION['estado']="";
				   $_SESSION['clasificacion']="";
				   $_SESSION['alcance']="";
				   $_SESSION['instanciaunet']="";
				   $_SESSION['responsable_legal_unet']="";
				   $_SESSION['responsable_contacto_unet']="";
				   $_SESSION['institucion']="";
				   $_SESSION['responsable_legal_contraparte']="";
				   $_SESSION['responsable_contacto_contraparte']="";
				   $_SESSION['nro_acta']="";
				   $_SESSION['fecha_acta']="";
				   $_SESSION['url_acta']="";
				   $_SESSION['aporte']="";
				    
                    $value=0;
                    $value1="";
                    setcookie("responsable_legal_unet", $value1);
                    setcookie("responsable_contacto_unet",$value1);


				   //redireccionando a la vista dle convenio 
				   $this->redirect(array('view','id'=>$model->idConvenio));


				  


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
	
	/*public function actionDelete($id)
	{
		// delete the row from the database table
		$this->loadModel($id)->delete();	
		
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}*/

	/**
	 * Deletes a particular model de convenioEstados
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */

	public function actionEliminarec($id){

	    $conv=convenios::model()->FindAll('convenios_idConvenio=:convenios_idConvenio',array(':convenios_idConvenio'=>$id));			

		if(empty($conv)){	
			$ai=Actaintencion::model()->deleteAll('convenios_idConvenio=:convenios_idConvenio',array(':convenios_idConvenio'=>$id));	
			$rp=Renovacionprorrogas::model()->deleteAll('convenios_idConvenio=:convenios_idConvenio',array(':convenios_idConvenio'=>$id));
			$hr=Historicoresponsables::model()->deleteAll('convenios_idConvenio=:convenios_idConvenio',array(':convenios_idConvenio'=>$id)); //Elimino los responsables por parte de la UNET	
			//eliminar los responsables de las instituciones contraparte,busco las instituciones contraparte 
			$ic=InstitucionConvenios::model()->FindAll('convenios_idConvenio=:convenios_idConvenio',array(':convenios_idConvenio'=>$id));

				foreach ($ic as $key => $value) {
					$hrc=Historicoresponsables::model()->deleteAll('institucion_convenios_idInstitucionConvenio=:institucion_convenios_idInstitucionConvenio',array(':institucion_convenios_idInstitucionConvenio'=>$value->idInstitucionConvenio)); 
				}

			$ic=InstitucionConvenios::model()->deleteAll('convenios_idConvenio=:convenios_idConvenio',array(':convenios_idConvenio'=>$id));		
			$ec=ConvenioEstados::model()->deleteAll('convenios_idConvenio=:convenios_idConvenio',array(':convenios_idConvenio'=>$id));	
			
			$this->loadModel($id)->delete();

			 $this->guardarBitacora(3, 1);
		

		}

		$this->redirect(array('conveniosEspera'));

	}

	/*
	*Eliminar el estado de un convenio 
	*/

	public function actionEliminarEstado($id){

	    $model=ConvenioEstados::model()->findByPk($id);

	    $model->delete();

	    $this->redirect(array('cambiarEstado','id'=>$model->convenios_idConvenio));

		//$this->redirect(array('conveniosEspera'));

	}



	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */

	public function actionEliminar($id){

		//verificar primero que el convenio que se va a eliminar no tenga dependiantes, es decir convenios especificos
		$conv=convenios::model()->FindAll('convenios_idConvenio=:convenios_idConvenio',array(':convenios_idConvenio'=>$id));			

		if(empty($conv)){	
			$ai=Actaintencion::model()->deleteAll('convenios_idConvenio=:convenios_idConvenio',array(':convenios_idConvenio'=>$id));	
			$rp=Renovacionprorrogas::model()->deleteAll('convenios_idConvenio=:convenios_idConvenio',array(':convenios_idConvenio'=>$id));
			$hr=Historicoresponsables::model()->deleteAll('convenios_idConvenio=:convenios_idConvenio',array(':convenios_idConvenio'=>$id)); //Elimino los responsables por parte de la UNET	
			//eliminar los responsables de las instituciones contraparte,busco las instituciones contraparte 
			$ic=InstitucionConvenios::model()->FindAll('convenios_idConvenio=:convenios_idConvenio',array(':convenios_idConvenio'=>$id));

				foreach ($ic as $key => $value) {
					$hrc=Historicoresponsables::model()->deleteAll('institucion_convenios_idInstitucionConvenio=:institucion_convenios_idInstitucionConvenio',array(':institucion_convenios_idInstitucionConvenio'=>$value->idInstitucionConvenio)); 
				}

			$ic=InstitucionConvenios::model()->deleteAll('convenios_idConvenio=:convenios_idConvenio',array(':convenios_idConvenio'=>$id));		
			$ec=ConvenioEstados::model()->deleteAll('convenios_idConvenio=:convenios_idConvenio',array(':convenios_idConvenio'=>$id));	
			
			$this->loadModel($id)->delete();

			 $this->guardarBitacora(3, 1);
		

		}

		$this->redirect(array('consultar'));

	}

	/**
	 * Almacena la accion del usuario en la taba operaciones 
	 * @param integer $tipoOperacion hacer referencia a la accion que realizo el usuario 
	 * @param integer $modulo hace referencia a la tabla en la cual se realiza la accion
	 */
	public function guardarBitacora($tipoOperacion, $modulo){

			$operacion=new operaciones;
			$operacion->fecha= date("Y-m-d");
			$operacion->usuario_id=Yii::app()->user->id;
			$operacion->tipoOperaciones_idTipoOperacion=$tipoOperacion;
			$operacion->modulos_idModulo=$modulo;
			$operacion->save();

	}

	public function actionArchivo(){

		$model= new ArchivosForm;
		$modelo=new Archivosconvenios;
		$msg ="";

		

		if(isset($_POST["ArchivosForm"])){

			

			$model->attributes=$_POST["ArchivosForm"];	

		

			$documento=CUploadedFile::getInstancesByName('documento');		

			print_r($documento);

			if(count($documento)===0){

				$msg="<strong class='text-error'>Error, No ha seleccionado el archivo</strong>";

			}else if(!$model->validate()){	
				$msg="<strong class='text-error'>Error, al enviar en formulario</strong>";	
			}else{

				$folder=strtolower($model->titulo);
				$buscar=array(' ');
				$reemplazar=array('-');

				$folder=str_replace($buscar, $reemplazar, $folder);

				$path = Yii::getPathOfAlias('webroot').'/archivos/convenios/'.$folder.'/';
				
				echo $path;
				if(!is_dir($path)){
					mkdir($path,0,true);
					chmod($path,0755);	
				
				}

				foreach ($documento as $doc => $i) {
						$aleatorio=rand(10000,99999);
						$docu=$aleatorio."-".$i->name;

					$modelo->convenios_idConvenio=1;
					$modelo->titulo=$model->titulo;
					$modelo->folder=$folder;
					$modelo->documento=$docu;

					$modelo->save();

					$i->saveAs($path.$docu);

					}					

		
			}

		}

		$this->render('archivo',array('model'=>$model,'modelo'=>$modelo));


	}

	/**
	 * Lists all models.
	 */
	/*public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Convenios');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}*/
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
				$consulta=$this->consultaBase();

				if(isset($criterio->anio) && $criterio->anio!=null){
				 $consulta .="and YEAR(c.fechaInicioConvenio)=".$criterio->anio." ";	
				 
				}
				if(isset($criterio->tipo_convenio)&&$criterio->tipo_convenio!=null){
					
					$ctipo=null;
					foreach ($criterio->tipo_convenio as $row) {
						$ctipo=$row.",".$ctipo;
					}
					$ctipo=substr($ctipo, 0, -1);

					$consulta .="and tc.idTipoConvenio IN (".$ctipo.") ";	
					
				}
					if(isset($criterio->clasificacion)&&$criterio->clasificacion!=null){
				  $cclasif=null;
					foreach ($criterio->clasificacion as $row) {
						$cclasif=$row.",".$cclasif;
					}
					$cclasif=substr($cclasif, 0, -1);
				
					$consulta .="and c.clasificacionConvenios_idTipoConvenio IN (".$cclasif.") ";		
		}
		if(isset($criterio->ambito)&&$criterio->ambito!=null){
  					
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

		if(isset($criterio->pais)&&$criterio->pais!=null){
  					
  				$consulta .="and ps.idPais=".$criterio->pais." ";	
		}

		if(isset($criterio->tipo_institucion)&&$criterio->tipo_institucion!=null){
								$ctinst=null;
									foreach ($criterio->tipo_institucion as $row) {
										$ctinst=$row.",".$ctinst;
									}
									$ctinst=substr($ctinst, 0, -1);

									$consulta .="and tinst.idTipoInstitucion IN (".$ctinst.") ";
		}	

		if(isset($criterio->institucion)&&$criterio->institucion!=null){
				  
				  	$inst=$criterio->institucion;
				  	$consulta .="and inst.idInstitucion=".$criterio->institucion." ";
		}

		if(isset($criterio->estado_actual_convenio)&&$criterio->estado_actual_convenio!=null){
								 	$cestado=null;
									foreach ($criterio->estado_actual_convenio as $row) {
										$cestado=$row.",".$cestado;
									}
									$cestado=substr($cestado, 0, -1);

									$consulta .="and ec.idEstadoConvenio IN (".$cestado.") ";
		}
		if(isset($criterio->fecha_inicio)&& $criterio->fecha_inicio!="" && isset($criterio->fecha_caducidad)&& $criterio->fecha_caducidad!=""){
					
  					$consulta .='and c.fechaCaducidadConvenio BETWEEN  '.'"'.$criterio->fecha_inicio.'"'.' AND '.'"'.$criterio->fecha_caducidad.'"'.' ';
		}

			switch ($criterio->orden) {
						case '1':
							$consulta .="ORDER BY c.fechaInicioConvenio DESC ";	
							//$consulta .="ORDER BY c.fechaInicioConvenio ASC";	
							break;
						case '2':
							$consulta .="ORDER BY c.fechaCaducidadConvenio ";	
							break;
						case '3':
							 $consulta .="ORDER BY c.nombreConvenio ";	
							break;
					
						default:
							
							break;
			}

			if($inicio!==false && $nroconv!==false){				 
				 $consulta .=" limit ".$inicio.",".$nroconv." ";
			}
    
    			$resultados=$conexion->createCommand($consulta)->query();
    			return 	$resultados;	
	}

	
	public function actionConsultara(){

	$resultados=null;
	$resull3= new ResultadoConvenios;
	$BusquedaUsuario= new ResultadoConvenios; //almacena las variables que viajan por el post a traves de ajax
	$convxpag=3;
	$iniciopag=$_POST['ConsultasConvenios']['inicio'];//la variable que viaja por ajax post para la paginacion
	$nuevoinicioPag=($iniciopag-1)*$convxpag;


	$BusquedaUsuario->anio=$_POST['ConsultasConvenios']['anio'];
	$BusquedaUsuario->tipo_convenio=$_POST['ConsultasConvenios']['tipo'];
	$BusquedaUsuario->clasificacion=$_POST['ConsultasConvenios']['clasificacion'];
	$BusquedaUsuario->ambito=$_POST['ConsultasConvenios']['ambitoGeografico'];
	$BusquedaUsuario->pais=$_POST['ConsultasConvenios']['pais'];
	//$BusquedaUsuario->estado_actual_convenio=$_POST['estadoConvenio'];
	$BusquedaUsuario->tipo_institucion=$_POST['ConsultasConvenios']['tipo_institucion'];
	$BusquedaUsuario->institucion=$_POST['ConsultasConvenios']['institucion'];
	$BusquedaUsuario->fecha_inicio=$_POST['ConsultasConvenios']['fechaVencimiento1'];
    $BusquedaUsuario->fecha_caducidad=$_POST['ConsultasConvenios']['fechaVencimiento2'];
    $BusquedaUsuario->orden=$_POST['ConsultasConvenios']['order'];

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
				//$resultados->bindColumn(6,$resull3->estado_actual_convenio);
				$resultados->bindColumn(6,$resull3->id_convenio);
				$resultados->bindColumn(7,$resull3->responsable_Unet);
				$resultados->bindColumn(8,$resull3->url);

		$this->renderPartial('_conveniosConsulta',
			array('resultados'=>$resultados,
				  'resull3'=>$resull3,
				  'iniciopag'=>$iniciopag,
				  'paginas'=>$paginas,

			), false, true);	                              
	}

	public function actionConsultar()
	{
		$modelConv=Convenios::model()->findAll();
		$modelTipo=Tipoconvenios::model()->findAll();
		$modelClass=Clasificacionconvenios::model()->findAll();
		$modelPais=Paises::model()->findAll();
		$modelTipoIns=Tiposinstituciones::model()->findAll();
        $modelInst=Instituciones::model()->findAll('idInstitucion!=:idInstitucion',array(':idInstitucion'=>"6"));
        $modelEdoConve=Estadoconvenios::model()->findAll();
		$formConsulta = new ConsultasConvenios;

		if(isset($_POST["ajax"]) && $_POST["ajax"]==='form'){

	       	echo CActiveForm::validate($formConsulta);
	       	Yii::app()->end();
        }
       		//intentando llamar un procedimiento de la Base de datos
            //$conexion=Yii::app()->db;
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

	/*
	retorna los convenios aprobados se usa en la vista reportes y en la vista consultar
	*/
	protected function consultaBase(){

				$consulta  = "SELECT DISTINCT c.nombreConvenio, c.fechaInicioConvenio, c.fechaCaducidadConvenio,c.objetivoConvenio,tc.descripcionTipoConvenio, /*ec.nombreEstadoConvenio,*/ c.idConvenio, r.correoElectronicoResponsable, c.urlConvenio FROM convenios c ";
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
							WHERE convenios_idConvenio = c.idConvenio and  estadoConvenios_idEstadoConvenio = '5' 
							) and upper(tr.descripcionTipoResponsable) = 'CONTACTO' ";	
				
		
		return $consulta;

	}

	public function actionConstruirReporte(){

		$modelConv=Convenios::model()->findAll();
		$modelTipo=Tipoconvenios::model()->findAll();
		$modelClass=Clasificacionconvenios::model()->findAll();
		$modelPais=Paises::model()->findAll();
		$modelTipoIns=Tiposinstituciones::model()->findAll();
        //$modelInst=Instituciones::model()->findAll();
        $modelInst=instituciones::model()->findAll('idInstitucion!=:idInstitucion',array(':idInstitucion'=>"6"));
        $modelEdoConve=Estadoconvenios::model()->findAll();
		$formConsulta = new ConsultasConvenios;
		

		if(isset($_POST["ajax"]) && $_POST["ajax"]==='form'){

	       	echo CActiveForm::validate($formConsulta);
	       	Yii::app()->end();
        }
		
     	$this->render('construirReporte',array(
     		'model'=>$formConsulta,
     		'tipoconve'=>$modelTipo,
     		'clasif'=>$modelClass,
     		'paisesconve'=>$modelPais,
     		'tiposinst'=>$modelTipoIns,
       		'institucionconve'=>$modelInst,
        	'estadoconve'=>$modelEdoConve,
        	
     		));

	}

	public function actionReporte(){

		$convenio= new ResultadoConvenios;
	    $formConsulta = new ConsultasConvenios;
		$formConsulta->attributes=$_POST["ConsultasConvenios"]; 

		$conexion=Yii::app()->db;

		$consulta=$this->consultaBase();
		
		/*Condiciones para la consulta*/
	    if(isset($formConsulta->anio) && $formConsulta->anio!=null){
				$consulta .="and YEAR(c.fechaInicioConvenio)=".$formConsulta->anio." ";	
	    
		}

		if(isset($_POST['ConsultasConvenios']['tipo'])&&$_POST['ConsultasConvenios']['tipo']!=null){
					$ctipo=null;
					foreach ($_POST['ConsultasConvenios']['tipo'] as $row) {
						$ctipo=$row.",".$ctipo;
					}
					$ctipo=substr($ctipo, 0, -1);

					$consulta .="and tc.idTipoConvenio IN (".$ctipo.") ";		
		}	

		if(isset($_POST['ConsultasConvenios']['clasificacion'])&&$_POST['ConsultasConvenios']['clasificacion']!=null){
				  $cclasif=null;
					foreach ($_POST['ConsultasConvenios']['clasificacion'] as $row) {
						$cclasif=$row.",".$cclasif;
					}
					$cclasif=substr($cclasif, 0, -1);
				
					$consulta .="and c.clasificacionConvenios_idTipoConvenio IN (".$cclasif.") ";		
		}
		if(isset($_POST['ConsultasConvenios']['ambitoGeografico'])&&$_POST['ConsultasConvenios']['ambitoGeografico']!=null){
  					
  						if($_POST['ConsultasConvenios']['ambitoGeografico']=="01"){
							$consulta .="and ps.idPais!=".'"35"'." ";	
						
						}
						if($_POST['ConsultasConvenios']['ambitoGeografico']=="02"){
							$consulta .="and ps.idPais=".'"35"'." ";	
						}
						if($_POST['ConsultasConvenios']['ambitoGeografico']=="03"){
							$consulta .="and edo.idEstado=".'"9"'." ";	
						}	
  					
		}	

		if(isset($_POST['ConsultasConvenios']['pais'])&&$_POST['ConsultasConvenios']['pais']!=null){
  					
  				$consulta .="and ps.idPais=".$_POST['ConsultasConvenios']['pais']." ";	
		}

		if(isset($_POST['ConsultasConvenios']['tipo_institucion'])&&$_POST['ConsultasConvenios']['tipo_institucion']!=null){
								$ctinst=null;
									foreach ($_POST['ConsultasConvenios']['tipo_institucion'] as $row) {
										$ctinst=$row.",".$ctinst;
									}
									$ctinst=substr($ctinst, 0, -1);

									$consulta .="and tinst.idTipoInstitucion IN (".$ctinst.") ";
		}	

		if(isset($_POST['ConsultasConvenios']['institucion'])&&$_POST['ConsultasConvenios']['institucion']!=null){
				  
				  	$inst=$_POST['ConsultasConvenios']['institucion'];
				  	$consulta .="and inst.idInstitucion=".$_POST['ConsultasConvenios']['institucion']." ";
		}

		if(isset($_POST['ConsultasConvenios']['estadoConv'])&&$_POST['ConsultasConvenios']['estadoConv']!=null){
								 	$cestado=null;
									foreach ($_POST['ConsultasConvenios']['estadoConv'] as $row) {
										$cestado=$row.",".$cestado;
									}
									$cestado=substr($cestado, 0, -1);

									$consulta .="and ec.idEstadoConvenio IN (".$cestado.") ";
		}
		if(isset($_POST['ConsultasConvenios']['fechaVencimiento1'])&& $_POST['ConsultasConvenios']['fechaVencimiento1']!="" && isset($_POST['ConsultasConvenios']['fechaVencimiento2'])&& $_POST['ConsultasConvenios']['fechaVencimiento1']!=""){
					
  					$consulta .='and c.fechaCaducidadConvenio BETWEEN  '.'"'.$_POST['ConsultasConvenios']['fechaVencimiento1'].'"'.' AND '.'"'.$_POST['ConsultasConvenios']['fechaVencimiento2'].'"'.' ';
		}

			switch ($_POST['ConsultasConvenios']['order']) {
						case '1':
							$consulta .="ORDER BY c.fechaInicioConvenio DESC ";	
							//$consulta .="ORDER BY c.fechaInicioConvenio ASC";	
							break;
						case '2':
							$consulta .="ORDER BY c.fechaCaducidadConvenio ";	
							break;
						case '3':
							 $consulta .="ORDER BY c.nombreConvenio ";	
							break;
					
						default:
							
							break;
			}

		 //$consulta .="ORDER BY c.fechaInicioConvenio DESC ";	

		        $resultados=$conexion->createCommand($consulta)->query();

				$resultados->bindColumn(1,$convenio->nombre_convenio);
				$resultados->bindColumn(2,$convenio->fecha_inicio);
				$resultados->bindColumn(3,$convenio->fecha_caducidad);
				$resultados->bindColumn(4,$convenio->objetivo_convenio);
				$resultados->bindColumn(5,$convenio->tipo_convenio);
				//$resultados->bindColumn(6,$convenio->estado_actual_convenio);
				$resultados->bindColumn(6,$convenio->id_convenio);
				$resultados->bindColumn(7,$convenio->responsable_Unet);		

			
        $this->renderPartial('_conveniosReporte',array('resultados'=>$resultados,'model'=>$convenio), false, true);
         
	}

	/**
	 * Muestra los convenios en espera de aprobacion 
	 * @param no tiene
	 */

	public function actionconveniosEspera(){

		//$modelEdoConve=Estadoconvenios::model()->findAll();
		$modelEdoConve=Estadoconvenios::model()->findAll('idEstadoConvenio!=:idEstadoConvenio', array(':idEstadoConvenio'=>5));
		$formConsulta = new ConsultasConvenios;

		/*if(isset($_POST["ajax"]) && $_POST["ajax"]==='form'){

	       	echo CActiveForm::validate($formConsulta);
	       	Yii::app()->end();
        }*/

		$this->render('conveniosEspera', array('estadoconve'=>$modelEdoConve, 'model'=>$formConsulta, 'resuldefecto'=>1));
	}

	/**
	 * Returns los convenios cuyo estado es diferente de aprobado
	 * @param sin parametros
	 * @return Convenios con estado diferente de aprobado
	 */

	public function ConsultarEstado(){

				$consulta  = "SELECT DISTINCT c.nombreConvenio, ec.nombreEstadoConvenio, c.idConvenio FROM convenios c ";
				$consulta .= "JOIN convenio_estados ce ON ce.convenios_idConvenio=c.idConvenio ";
				$consulta .= "JOIN estadoconvenios ec ON ce.estadoConvenios_idEstadoConvenio=ec.idEstadoConvenio ";
				$consulta .= "WHERE ce.fechaCambioEstado = (
							SELECT MAX( fechaCambioEstado ) 
							FROM convenio_estados
							WHERE convenios_idConvenio = c.idConvenio
							) and ec.idEstadoConvenio!="."'5' ";

				
		return $consulta;	
	}

	/**
	 * action ajax que se ejecuta al consultar los estados de los convenios en espera
	 * Llama a la funcion Consultar estado y procesa sus resultados que luego actualiza renderizando 
	 * parcialmente la vista conveniosEnProceso
	 * @param no tiene
	 */

	public function busquedaConveniosNoAprobados($criterio, $inicio=false, $nroconv=false){
			$conexion=Yii::app()->db;
			$consulta=$this->ConsultarEstado();

			if(isset($criterio)&&$criterio!=null){
								 	$cestado=null;
									foreach ($criterio as $row) {
										$cestado=$row.",".$cestado;
									}
									$cestado=substr($cestado, 0, -1);

								    $consulta .="and ec.idEstadoConvenio IN (".$cestado.") ";
			}

			if($inicio!==false && $nroconv!==false){				 
				 $consulta .=" limit ".$inicio.",".$nroconv." ";
			}

			$resultados=$conexion->createCommand($consulta)->query();
    			return 	$resultados;

	}

	/*
	*Permite hallar los convenios que estan a punto de vencerse
	*/

	public function actionbuscarConveniosV(){

		$hoy=date("Y-m-d");
		$tresMeses=date("Y-m-d", strtotime("3months"));
		//$tresMeses=date("Y-m-d", strtotime("2years"));

		//$convenios=Convenios::model()->findAll('fechaCaducidadConvenio BETWEEN :hoy AND :tresmeses', 
   		//array(':hoy'=> $hoy,':tresmeses'=>$tresMeses));

   		$criteria=new CDbCriteria;
		$criteria->select='*';  
		$criteria->join='INNER JOIN convenio_estados ce ON ce.convenios_idConvenio = idConvenio';
		$criteria->condition='fechaCaducidadConvenio BETWEEN :hoy AND :tresmeses AND ce.estadoConvenios_idEstadoConvenio=:aprobado';
		$criteria->params=array(':hoy'=> $hoy,':tresmeses'=>$tresMeses, ':aprobado'=>'5');
		$convenios=Convenios::model()->findAll($criteria);

   		 /*foreach($convenios as $key=>$value){
   		 	echo $value->idConvenio;	
   		 }*/
		/*echo "HOLA".rand(0,100)." ".$hoy." ".$tresMeses;*/
			$this->renderPartial('_conveniosPorVencer',array('convenios'=>$convenios,), false, true);
	}
	public function actionselectEstado(){

		$convenio= new ResultadoConvenios;
	    $formConsulta = new ConsultasConvenios;
		$formConsulta->attributes=$_POST["ConsultasConvenios"]; 

		$convxpag=4;
		$iniciopag=$_POST['ConsultasConvenios']['inicio'];
		$nuevoinicioPag=($iniciopag-1)*$convxpag;

		$estadosc=$_POST['ConsultasConvenios']['estadoConv'];

		$resulTotal=$this->busquedaConveniosNoAprobados($estadosc); 
  	    $totalConvenios=count($resulTotal);

  	    $paginas=ceil($totalConvenios/$convxpag);
  	
  	    $resultados=$this->busquedaConveniosNoAprobados($estadosc,$nuevoinicioPag,$convxpag);

		$resultados->bindColumn(1,$convenio->nombre_convenio);
		$resultados->bindColumn(2,$convenio->estado_actual_convenio);
		$resultados->bindColumn(3,$convenio->id_convenio);
		
		$this->renderPartial('_conveniosEnProceso',array('resultados'=>$resultados,'model'=>$convenio,'iniciopag'=>$iniciopag, 'paginas'=>$paginas,), false, true);
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
	 * Returns el modelo de acuerdo al Id que llega por GET
	 * If el estado del convenio es aporbado no permite el cambio de estado
	 * @param integer $id the ID of the model to be loaded
	 * @return Convenios the loaded model
	 * @throws CHttpException
	 */

	public function loadModelCambiarEstdo($id)
	{
		$model=Convenios::model()->findByPk($id);
		if($model===null){
			throw new CHttpException(404,'The requested page does not exist.');
		}else{
			//verificamos si el estado del convenio es no aprobado
			$modelestado = ConvenioEstados::model()->find('convenios_idConvenio=:convenios_idConvenio AND estadoConvenios_idEstadoConvenio!=:estadoConvenios_idEstadoConvenio', array(':convenios_idConvenio'=>$id, ':estadoConvenios_idEstadoConvenio'=>'5'));
	
			if($modelestado===null){
				$model=null;
			}

		}

		if($model===null){
			throw new CHttpException(404,'The requested page does not exist.');
		}
			
		return $model;
	}

		public function loadModelView($id)
		{
			$model=Convenios::model()->findByPk($id);
			if($model===null){
				throw new CHttpException(404,'The requested page does not exist.');
			}else{
				//verificamos si el estado del convenio es no aprobado
				$modelview = ConvenioEstados::model()->find('convenios_idConvenio=:convenios_idConvenio AND estadoConvenios_idEstadoConvenio=:estadoConvenios_idEstadoConvenio', array(':convenios_idConvenio'=>$id, ':estadoConvenios_idEstadoConvenio'=>'5'));
		
				if($modelview===null){
					$model=null;
				}

			}

			if($model===null){
				throw new CHttpException(404,'The requested page does not exist.');
			}
				
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

		echo("<script>console.log('Entrooo');</script>"); 
		$dependencia= new Dependencias;

		if(isset($_POST["Dependencias"])){
			$dependencia->attributes=$_POST["Dependencias"];

			if($dependencia->save()){
			//$dependencia->save();
			echo "Dependencia guardada con exito ";
			 setcookie("gdependencia","1");
			}
			else{
				setcookie("gdependencia","0"); 
				
			}

				$lista= Dependencias::model()->findAll();
		 	    $lista=CHtml::listData($lista,'idDependencia','nombreDependencia');

				foreach ($lista as $valor => $descripcion) {
						echo CHtml::tag('option',array('value'=>$valor),CHtml::encode($descripcion), true);
				}	
		}
		
	}
public function actionGuardarclasificacion(){

		echo("<script>console.log('Entro clasificacion');</script>"); 
		$clasificacion= new Clasificacionconvenios;

		if(isset($_POST["Clasificacionconvenios"])){
			$clasificacion->attributes=$_POST["Clasificacionconvenios"];

			if($clasificacion->save()){
			//$dependencia->save();
			echo "Clasificacion Guardadda con exito ";
			 setcookie("gclasificacion","1");
			}
			else{
				setcookie("gclasificacion","0"); 
				
			}

				$lista= Clasificacionconvenios::model()->findAll();
		 	    $lista=CHtml::listData($lista,'idClasificacionConvenio','nombreClasificacionConvenio');

				foreach ($lista as $valor => $descripcion) {
						echo CHtml::tag('option',array('value'=>$valor),CHtml::encode($descripcion), true);
				}	
		}
		
	}
public function actionGuardarestado(){

		echo("<script>console.log('Entro estado');</script>"); 
		$estado= new Estadoconvenios;

		if(isset($_POST["Estadoconvenios"])){
			$estado->attributes=$_POST["Estadoconvenios"];

			if($estado->save()){
			//$dependencia->save();
			echo "Estado Guardadda con exito ";
			 setcookie("gestado","1");
			}
			else{
				setcookie("gestado","0"); 
				
			}

				$lista= Estadoconvenios::model()->findAll();
		 	    $lista=CHtml::listData($lista,'idEstadoConvenio','nombreEstadoConvenio');

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

			if($institucion->save()){
				 setcookie("ginstitucion","1");
			}
			else{
				 setcookie("gresponsable","0");
			}

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
		  echo "<br>";
		  echo("<script>console.log(".$_COOKIE['cookinst'].");</script>"); 
		 $responsable= new Responsables;
		 
			$resp=Responsables::model()->findAll();
		// if(isset($_POST['ajax'])&&$_POST['ajax']=='formresp'){

		 //	echo CActiveForm::validate($responsable);
		 	//Yii::app()->end();
		 //}

		 if(isset($_POST["Responsables"])){
		 				  echo("<script>console.log('Existe Responsable');</script>"); 
		  }
		  $responsable->attributes=$_POST["Responsables"];
		  $responsable->instituciones_idInstitucion=$_COOKIE['cookinst'];
		   echo("<script>console.log('Id: ".$responsable->idResponsable."');</script>"); 
		   echo("<script>console.log('Primer Nombre: ".$responsable->primerNombreResponsable."');</script>"); 
		   echo("<script>console.log('Segundo Nombre: ".$responsable->segundoNombreResponsable."');</script>"); 
		   echo("<script>console.log('Primer Apellido: ".$responsable->primerApellidoResponsable."');</script>"); 
		   echo("<script>console.log('Segundo Apellido: ".$responsable->segundoApellidoResponsable."');</script>"); 
		   echo("<script>console.log('Correo electronico: ".$responsable->correoElectronicoResponsable."');</script>"); 
		   echo("<script>console.log('Telefono: ".$responsable->telefonoResponsable."');</script>"); 
		   echo("<script>console.log('Institucion: ".$responsable->instituciones_idInstitucion."');</script>");
		   echo("<script>console.log('Dependencia: ".$responsable->dependencias_idDependencia."');</script>"); 
		   echo("<script>console.log('Tipo: ".$responsable->tipoResponsable_idTipoResponsable."');</script>");   
			if($responsable->validate()){
				$responsable->save();
				 echo("<script>console.log('guardo');</script>"); 
				  setcookie("gresponsable","1");
			}
			else{
				foreach ($resp as  $value) {
					if($responsable->correoElectronicoResponsable==$value->correoElectronicoResponsable){
						setcookie("gresponsable","3");
						$variable=1;
						break;
						//echo("<script>console.log('Correo ya existe');</script>"); 
					//	$variable=1;						
					}

			}
			if($variable!=1){
				setcookie("gresponsable","0");
			}
		}
		 /*desde aqui 
		
			

			 echo("<script>console.log('Institucion: ".$responsable->instituciones_idInstitucion."');</script>");  
			if($responsable->save()){
//
				 setcookie("gresponsable","1");
				 echo("<script>console.log('guardo');</script>"); 
			}
			else{
				 setcookie("gresponsable","0");
				  echo("<script>console.log('Echoo');</script>"); 
				 //print_r("<script>console.log(".$responsable->getErrors().");</script>");
			}

			//$lista= Instituciones::model()->findAll();
		 	//$lista=CHtml::listData($lista,'idInstitucion','nombreInstitucion');

			//	foreach ($lista as $valor => $descripcion) {
			//			echo CHtml::tag('option',array('value'=>$valor),CHtml::encode($descripcion), true);
			// 	}	
		 }
		hasta aqui*/
	}
//*****************************************FUNCIONES DE AUTOCOMPLETADO**********************************************
			public function actionAutocomplete($term) 
			{
			 $criteria = new CDbCriteria;
			 $criteria->compare('CONCAT(CONCAT(LOWER(primerApellidoResponsable)," "),primerNombreResponsable)', strtolower($_GET['term']), true);
			 $criteria->compare('CONCAT(CONCAT(LOWER(primerNombreResponsable)," "),primerApellidoResponsable)', strtolower($_GET['term']), true, 'OR');
			 $criteria->compare('instituciones_idInstitucion',6, true,'AND');
			// $criteria->addCondition('instituciones_idInstitucion IS NULL');
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
			    'label' => $item->primerApellidoResponsable.' '.$item->primerNombreResponsable.' ('.$item->idResponsable.')',
			   );

			  }

			 }
			 else
			 {
			  $arr = array();
			  $arr[] = array(
			   'id' => ' ',
			   'value' => 'No se han encontrado resultados para su búsqueda',
			   'label' => 'No se han encontrado resultados para su búsqueda',
			  );
			 }
			  
			 echo CJSON::encode($arr);
			}
			public function actionAutocompletef($term) 
			{
			 $criteria = new CDbCriteria;
			$criteria->compare('CONCAT(CONCAT(LOWER(primerApellidoResponsable)," "),primerNombreResponsable)', strtolower($_GET['term']), true);
			 $criteria->compare('CONCAT(CONCAT(LOWER(primerNombreResponsable)," "),primerApellidoResponsable)', strtolower($_GET['term']), true, 'OR');			// $criteria->compare('LOWER(primerNombreResponsable)'.' '.'LOWER(primerApellidoResponsable)', strtolower($_GET['term']), true, 'OR');
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
			    'label' => $item->primerApellidoResponsable.' '.$item->primerNombreResponsable.' ('.$item->idResponsable.')',
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
			
			public function actionValidacionautocomplete(){

				if(isset($_POST['widget'])){
					$campo_widget=explode(' ', $_POST['widget']);

				}
					//echo $_POST['widget'];

				$criteria= new CDbCriteria();
				$criteria->select='idResponsable';
				$criteria->condition='CONCAT(CONCAT(primerApellidoResponsable," "),primerNombreResponsable)=:ins OR CONCAT(CONCAT(primerNombreResponsable," "),primerApellidoResponsable)=:ins ';
				$criteria->params= array(':ins'=>$_POST['widget']);
				$result= Responsables::model()->findAll($criteria);
				
					if(count($result)==1){
								foreach ($result as $key => $resultado) {
									echo $resultado->idResponsable;
				//	echo " ";
								}
					}
				
					if(count($result)>1){
						echo "varios resultados para el mismo nombre seleccione de la lista autocompletada";
					}
					if(count($result)<1){
						echo "El nombre indicado no existe en la base de datos. Agregue un nuevo responsable";
					}

      			//echo  "Nombre".	$resul->primerNombreResponsable;	
      			
      				# code...
      		//	foreach ($resul as $key => $resultado) {
      				# code...
      		//		echo $resultado->primerNombreResponsable;
      		//	}
      					
			}

			public function actionreiniciarVariables(){

					 $_SESSION['idconvenio']="";
				   $_SESSION['tipo']="";
	 			   $_SESSION['nombreconvenio']="";
				   $_SESSION['fechainicioconvenio']="";
				   $_SESSION['fechacaducidadconvenio']="";
				   $_SESSION['objetivo']="";
				   $_SESSION['dependenciaconvenio']="";
				   $_SESSION['estado']="";
				   $_SESSION['clasificacion']="";
				   $_SESSION['alcance']="";
				   $_SESSION['instanciaunet']="";
				   $_SESSION['responsable_legal_unet']="";
				   $_SESSION['responsable_contacto_unet']="";
				   $_SESSION['institucion']="";
				   $_SESSION['responsable_legal_contraparte']="";
				   $_SESSION['responsable_contacto_contraparte']="";
				   $_SESSION['nro_acta']="";
				   $_SESSION['fecha_acta']="";
				   $_SESSION['url_acta']="";
				   $_SESSION['aporte']="";
				    
                    $value=0;
                    $value1="";
                    setcookie("responsable_legal_unet", $value1);
                    setcookie("responsable_contacto_unet",$value1);


			}

}


	