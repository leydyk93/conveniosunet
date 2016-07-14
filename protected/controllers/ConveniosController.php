<?php

class ConveniosController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/cargar';
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
				'actions'=>array('index','view','pasodos','pasotres','pasocuatro','pasocinco','pasoseis'),
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

		$resp=new Responsables;

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
				//$pasouno->idconvenio;
				//$pasouno->nombreconvenio;
			//	$this->redirect(array("create"));
		
				$this->redirect(array('convenios/pasodos',
				"idconvenio"=>$pasouno->idconvenio,
				));
			}
			}

			if (isset($_POST["Responsables"])){
			$resp->attributes=$_POST["Responsables"];

			if($resp->save()){

				echo "responsable guardado";	
			}
			}

		$this->render('create',array(
			"pasouno"=>$pasouno,"resp"=>$resp
		));

	}
	public function actionPasodos($idconvenio){
		
		$model=new Convenios;
		$pasodos=new PasodosForm;
		
		if(isset($_POST["PasodosForm"])){

			$pasodos->attributes=$_POST["PasodosForm"];
			if($pasodos->validate()){

				$_SESSION['instanciaunet']=$pasodos->instanciaunet;
				$_SESSION['responsableunet']=$pasodos->responsableunet;
				$_SESSION['institucion']=$pasodos->institucion;
				$_SESSION['instancia_contraparte']=$pasodos->instancia_contraparte;
				$_SESSION['responsable_contraparte']=$pasodos->responsable_contraparte;

				$this->redirect(array('convenios/pasotres',
				"idconvenio"=>$_SESSION['idconvenio']
				));
			}
		}

		$this->render('pasodos',array("model"=>$model,"pasodos"=>$pasodos));


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

				$_SESSION['ventajas']=$pasocuatro->ventajas;
				$_SESSION['clasificacion']=$pasocuatro->clasificacion;
				$_SESSION['alcance']=$pasocuatro->alcance;
				$_SESSION['forma']=$pasocuatro->forma;
				$_SESSION['actividades']=$pasocuatro->actividades;
				$_SESSION['otras_instituciones']=$pasocuatro->otras_instituciones;
				$this->redirect(array('convenios/pasocinco',"idconvenio"=>$_SESSION['idconvenio']));
			}
		}

		$this->render('pasocuatro',array("pasocuatro"=>$pasocuatro));
	}

	public function actionPasocinco($idconvenio){

		$pasocinco= new PasocincoForm;
		$model= new Convenios;

		if(isset($_POST["PasocincoForm"])){
			$pasocinco->attributes=$_POST["PasocincoForm"];
			if($pasocinco->validate()){

				$_SESSION['aporte']=$pasocinco->aporte;
				$_SESSION['moneda']=$pasocinco->moneda;
				$_SESSION['aporte_valor']=$pasocinco->aporte_valor;
				$_SESSION['presupuesto']=$pasocinco->presupuesto;
				$_SESSION['presupuesto_costo']=$pasocinco->presupuesto_costo;

				$this->redirect(array('convenios/pasoseis',"idconvenio"=>$_SESSION['idconvenio']));
				
		
			}
		}


		$this->render('pasocinco',array("pasocinco"=>$pasocinco));

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
 						//$this->redirect(array('view','id'=>$model->idConvenio));
 						
 						//$model_ce->id_convenio_estado=$_SESSION['idconvenio'];
 						$model_ce->convenios_idConvenio=$_SESSION['idconvenio'];
 						$model_ce->estadoConvenios_idEstadoConvenio=$_SESSION['estado'];
 						$model_ce->fechaCambioEstado=new CDbExpression('NOW()');
 						$model_ce->dependencias_idDependencia=$_SESSION['dependenciaconvenio'];
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
}
