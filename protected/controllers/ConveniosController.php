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

		//logic del formulario 
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST["PasounoForm"])){
			$pasouno->attributes=$_POST["PasounoForm"];

			if($pasouno->validate()){

				$_SESSION['idconvenio']=$pasouno->idconvenio;
				$_SESSION['nombreconvenio']=$pasouno->nombreconvenio;
				//$pasouno->idconvenio;
				//$pasouno->nombreconvenio;
			//	$this->redirect(array("create"));
		
				$this->redirect(array('convenios/pasodos',
				"idconvenio"=>$pasouno->idconvenio,
				));
			}
			}

		$this->render('create',array(
			"pasouno"=>$pasouno,
		));

	}
	public function actionPasodos($idconvenio){
		
		$model=new Convenios;
		$pasodos=new PasodosForm;
		
		if(isset($_POST["PasodosForm"])){

			$pasodos->attributes=$_POST["PasodosForm"];
			if($pasodos->validate()){
				$_SESSION['tipoconvenio']=$pasodos->tipoconvenio;
				$_SESSION['fechainicioconvenio']=$pasodos->fechainicioconvenio;

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

				$_SESSION['fechacaducidadconvenio']=$pasotres->fechacaducidadconvenio;
				$_SESSION['objetivoconvenio']=$pasotres->objetivoconvenio;
				$_SESSION['dependenciaconvenio']=$pasotres->dependenciaconvenio;
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

				$_SESSION['institucionconvenio']=$pasocuatro->institucionconvenio;
				$_SESSION['urlconvenio']=$pasocuatro->urlconvenio;
				$_SESSION['clasificacionconvenio']=$pasocuatro->clasificacionconvenio;
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

				$_SESSION['alcanceconvenio']=$pasocinco->alcanceconvenio;
				$_SESSION['formaconvenio']=$pasocinco->formaconvenio;
				$_SESSION['idmarcoconvenio']=$pasocinco->idmarcoconvenio;
				$this->redirect(array('convenios/pasoseis',"idconvenio"=>$_SESSION['idconvenio']));
				
		
			}
		}


		$this->render('pasocinco',array("pasocinco"=>$pasocinco));

	}

	public function actionPasoseis($idconvenio){
		$model= new Convenios;

	
		if (isset($_REQUEST['enviar'])) 
		{ 
				$model->idConvenio=$_SESSION['idconvenio'];
				$model->nombreConvenio=$_SESSION['nombreconvenio'];
				$model->fechaCaducidadConvenio=$_SESSION['fechacaducidadconvenio'];
				$model->objetivoConvenio=$_SESSION['objetivoconvenio'];
				$model->institucionUNET=$_SESSION['institucionconvenio'];
				$model->urlConvenio=$_SESSION['urlconvenio'];
				$model->clasificacionConvenios_idTipoConvenio=$_SESSION['clasificacionconvenio'];
				$model->tipoConvenios_idTipoConvenio=$_SESSION['tipoconvenio'];
				$model->alcanceConvenios_idAlcanceConvenio=$_SESSION['alcanceconvenio'];
				$model->formaConvenios_idFormaConvenio=$_SESSION['formaconvenio'];
				$model->dependencias_idDependencia=$_SESSION['dependenciaconvenio'];
				$model->convenios_idConvenio=$_SESSION['idmarcoconvenio'];
				$model->fechaInicioConvenio=$_SESSION['fechainicioconvenio'];
 				if($model->save())
					$this->redirect(array('view','id'=>$model->idConvenio));
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
