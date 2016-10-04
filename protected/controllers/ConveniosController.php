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
				'actions'=>array('index','view','pasodos','pasotres','pasocuatro','pasocinco','pasoseis','consultar','selectdos','autocomplete'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
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

	public function actionConsultar()
	{
	   $this->render('consultar');	
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
