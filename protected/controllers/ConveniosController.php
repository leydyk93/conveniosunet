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

				'actions'=>array('index','view','pasodos','pasotres','pasocuatro','pasocinco','pasoseis','consultar','consultara','selectdos','autocomplete','guardardependencia'),

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
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{

		$conexion=Yii::app()->db;

		/*Este modelo almacena el resultado de la consulta por columna*/

		$resull= new ResultadoConvenios; //almacenar datos de ubicacion de la contraparte
		$resullResponsables= new ResultadoConvenios;
		$resullRespoContacto= new ResultadoConvenios;
		$resullRespUNET = new ResultadoConvenios;
		$resultados=null;

		/*Datos de la contraparte*/
		$consulta  ="SELECT c.nombreConvenio, inst.siglasInstitucion, inst.nombreInstitucion, tinst.nombreTipoInstitucion, edo.nombreEstado, ps.nombrePais FROM convenios c ";
		$consulta .="JOIN tipoconvenios tc ON tc.idTipoConvenio = c.tipoConvenios_idTipoConvenio ";
		$consulta .="JOIN institucion_convenios ic ON c.idConvenio = ic.convenios_idConvenio ";
		$consulta .="JOIN instituciones inst ON inst.idInstitucion = ic.instituciones_idInstitucion ";
		$consulta .="JOIN tiposInstituciones tinst ON tinst.idTipoInstitucion = inst.tiposInstituciones_idTipoInstitucion ";
		$consulta .="JOIN estados edo ON edo.idEstado = inst.estados_idEstado ";
		$consulta .="JOIN paises ps ON ps.idPais = edo.paises_idPais ";
		$consulta .="WHERE c.idConvenio = ".$id;

		$resultados=$conexion->createCommand($consulta)->query();

				$resultados->bindColumn(1,$resull->nombre_convenio); //nombre del convenio
				$resultados->bindColumn(2,$resull->fecha_inicio);    //siglas de la institucion
				$resultados->bindColumn(3,$resull->fecha_caducidad); //nombre de la Institucion
				$resultados->bindColumn(4,$resull->objetivo_convenio);//tipo de institucion
				$resultados->bindColumn(5,$resull->tipo_convenio);   //estado institucion
				$resultados->bindColumn(6,$resull->estado_actual_convenio); // nombre del pais 
 

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

        /*Datos de los responsables Legales de otras instituciones */ 
        $consultar="SELECT inst.siglasInstitucion, r.primerNombreResponsable, r.primerApellidoResponsable, r.correoElectronicoResponsable, r.telefonoResponsable, tr.descripcionTipoResponsable FROM responsables r "; 
        $consultar.="JOIN historicoresponsables hr ON r.idResponsable = hr.responsables_idResponsable ";
        $consultar.="JOIN institucion_convenios ic ON ic.idInstitucionConvenio = hr.institucion_convenios_idInstitucionConvenio ";
        $consultar.="JOIN convenios c ON c.idConvenio = ic.convenios_idConvenio ";
        $consultar.="JOIN instituciones inst ON inst.idInstitucion = ic.instituciones_idInstitucion ";
        $consultar.="JOIN tiporesponsable tr ON tr.idTipoResponsable = r.tipoResponsable_idTipoResponsable ";
        $consultar.="WHERE c.idConvenio = ".$id." and  upper(tr.descripcionTipoResponsable)='LEGAL'";

        $resultados3=$conexion->createCommand($consultar)->query();

         		$resultados3->bindColumn(1,$resullResponsables->nombre_convenio);  //siglas institucion
				$resultados3->bindColumn(2,$resullResponsables->fecha_inicio);     //primer nombre responsable
				$resultados3->bindColumn(3,$resullResponsables->fecha_caducidad);  //primer apellido de responsable
				$resultados3->bindColumn(4,$resullResponsables->objetivo_convenio);//correo electronico
				$resultados3->bindColumn(5,$resullResponsables->tipo_convenio);   //telefono
				$resultados3->bindColumn(6,$resullResponsables->estado_actual_convenio); // tipo de responsable
	


	 /*Datos de los responsables de  Contacto de otras instituciones*/ 
        $consultarc="SELECT inst.siglasInstitucion, r.primerNombreResponsable, r.primerApellidoResponsable, r.correoElectronicoResponsable, r.telefonoResponsable, tr.descripcionTipoResponsable FROM responsables r "; 
        $consultarc.="JOIN historicoresponsables hr ON r.idResponsable = hr.responsables_idResponsable ";
        $consultarc.="JOIN institucion_convenios ic ON ic.idInstitucionConvenio = hr.institucion_convenios_idInstitucionConvenio ";
        $consultarc.="JOIN convenios c ON c.idConvenio = ic.convenios_idConvenio ";
        $consultarc.="JOIN instituciones inst ON inst.idInstitucion = ic.instituciones_idInstitucion ";
        $consultarc.="JOIN tiporesponsable tr ON tr.idTipoResponsable = r.tipoResponsable_idTipoResponsable ";
        $consultarc.="WHERE c.idConvenio = ".$id." and  upper(tr.descripcionTipoResponsable)='CONTACTO'";

        $resultados4=$conexion->createCommand($consultarc)->query();

         		$resultados4->bindColumn(1,$resullRespoContacto->nombre_convenio);  //siglas institucion
				$resultados4->bindColumn(2,$resullRespoContacto->fecha_inicio);     //primer nombre responsable
				$resultados4->bindColumn(3,$resullRespoContacto->fecha_caducidad);  //primer apellido de responsable
				$resultados4->bindColumn(4,$resullRespoContacto->objetivo_convenio);//correo electronico
				$resultados4->bindColumn(5,$resullRespoContacto->tipo_convenio);   //telefono
				$resultados4->bindColumn(6,$resullRespoContacto->estado_actual_convenio); // tipo de responsable

		/*Datos de los responsables de la UNET*/

		 $consultarcUNET="SELECT r.primerNombreResponsable, r.primerApellidoResponsable, r.correoElectronicoResponsable, r.telefonoResponsable, tr.descripcionTipoResponsable FROM responsables r ";
		 $consultarcUNET.="JOIN historicoresponsables hr ON r.idResponsable = hr.responsables_idResponsable ";
		 $consultarcUNET.="JOIN convenios c ON c.idConvenio = hr.convenios_idConvenio ";
		 $consultarcUNET.="JOIN tiporesponsable tr ON tr.idTipoResponsable = r.tipoResponsable_idTipoResponsable ";
		 $consultarcUNET.="WHERE c.idConvenio = ".$id;

		     $resultados5=$conexion->createCommand($consultarcUNET)->query();

				$resultados5->bindColumn(1,$resullRespUNET->fecha_inicio);     //primer nombre responsable
				$resultados5->bindColumn(2,$resullRespUNET->fecha_caducidad);  //primer apellido de responsable
				$resultados5->bindColumn(3,$resullRespUNET->objetivo_convenio);//correo electronico
				$resultados5->bindColumn(4,$resullRespUNET->tipo_convenio);   //telefono
				$resultados5->bindColumn(5,$resullRespUNET->estado_actual_convenio); // tipo de responsable

	
 	
		$this->render('view',array(
			'model'=>$this->loadModel($id), /*Datos generales del convenio*/
			'resulConsulta'=>$resultados, 	/*contraparte ubicacion*/
			'resullInfo'=>$resull,			/*contraparte ubicacion*/
			'resulConResp'=>$resultados3,
			'resullResp'=>$resullResponsables,
			'resulRespCont'=>$resultados4,
			'resullRespC'=>$resullRespoContacto,
			'resulRespContUNET'=>$resultados5,
			'resullRespUNET'=>$resullRespUNET,
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



			if(isset($_POST["ajax"]) && $_POST["ajax"]==='form'){

	       		echo CActiveForm::validate($renovacion);
	       		Yii::app()->end();
             }

			if($renovacion->validate()){

				if($renovacion->save())
				 $this->redirect(array('renovar','id'=>$id));
				//echo $renovacion->convenios_idConvenio." ";
				//echo $renovacion->fechaFinProrroga." ";
	          	//echo $renovacion->observacionProrroga." ";
	          	//echo $renovacion->fechaRenovacion;
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

				if($modelestado->save())
				 $this->redirect(array('view','id'=>$id));

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
					$model_ic= new InstitucionConvenios;
					$model_ic->convenios_idConvenio=$_SESSION['idconvenio'];
					$model_ic->fechaIncorporacion=$_SESSION['fechainicioconvenio'];//la fecha de incorporacion es cuando inicia el convenio?
					$model_ic->instituciones_idInstitucion=$_SESSION['institucion'][$i];
					if($model_ic->save()){
						echo "guardo";
					}
					else{
						print_r($model_ic->getErrors());
					}
					# code...
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
				   $this->redirect(array('view','id'=>$model->idConvenio));


			}
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


	public function actionConsultara(){
   	
	$resultados=null;
	$resull3= new ResultadoConvenios;
//	   $valor=$_POST['anio'];

	   $conexion=Yii::app()->db;
    
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
				
				if(isset($_POST['anio']) && $_POST['anio']!=null){
				 $consulta .="and YEAR(c.fechaInicioConvenio)=".$_POST['anio']." ";	


				}

				if(isset($_POST['tipo'])){
					
						$ctipo=null;
						$suma=0;
						foreach ($_POST['tipo'] as $k => $row) {

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

				if(isset($_POST['clasificacion'])){

 					$cclasif=null;
 					$suma=0;
					foreach ($_POST['clasificacion'] as $k => $row) {

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

				if(isset($_POST['ambito'])&&$_POST['ambito']!=""){
						
						if($_POST['ambito']=="01"){
							$consulta .="and ps.idPais!=".'"35"'." ";	
						}
						if($_POST['ambito']=="02"){
							$consulta .="and ps.idPais=".'"35"'." ";	
						}
						if($_POST['ambito']=="03"){
							$consulta .="and edo.idEstado=".'"9"'." ";	
						}

				}

				if(isset($_POST['pais'])&&$_POST['pais']!=""){
						$consulta .="and ps.idPais=".$_POST['pais']." ";	
				}

				if(isset($_POST['tipoInstitucion'])){

					$ctinst=null;
					$suma=0;
					foreach ($_POST['tipoInstitucion'] as $k => $row) {
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

				if(isset($_POST['institucion'])&&$_POST['institucion']!=""){
				  		$consulta .="and inst.idInstitucion=".$_POST['institucion']." ";
				}

				if(isset($_POST['estadoConvenio'])){
					 $cestado=null;
					 $suma=0;
					 foreach ($_POST['estadoConvenio'] as $k => $row) {
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

				if(isset($_POST['fechav1'])&& $_POST['fechav1']!="" && isset($_POST['fechav2'])&& $_POST['fechav2']!=""){
					
  					$consulta .='and c.fechaCaducidadConvenio BETWEEN  '.'"'.$_POST['fechav1'].'"'.' AND '.'"'.$_POST['fechav2'].'"'.' ';

				}

				
				$resultados=$conexion->createCommand($consulta)->query();
				
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

		
     	$this->render('consultar',array(
     		'model'=>$formConsulta,
     		'tipoconve'=>$modelTipo,
     		'clasif'=>$modelClass,
     		'paisesconve'=>$modelPais,
     		'tiposinst'=>$modelTipoIns,
       		'institucionconve'=>$modelInst,
        	'estadoconve'=>$modelEdoConve
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

			public function actionAutocomplete($term) 
			{
			 $criteria = new CDbCriteria;
			 $criteria->compare('LOWER(primerApellidoResponsable)', strtolower($_GET['term']), true);
			 $criteria->compare('LOWER(primerNombreResponsable)', strtolower($_GET['term']), true, 'OR');
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
