<?php

class ConvenioEstadosController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','cambiarEstado'),
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

	public function actionCambiarEstado($id)
	{
		$model=$this->loadModelCambiarEstdo($id);
		
		$modelEdoConve=Estadoconvenios::model()->findAll('idEstadoConvenio!=:idEstadoConvenio', array(':idEstadoConvenio'=>5)); //Busco los nombres de los estados que sean diferentes a aprobado
		
		$estadosCovenio = ConvenioEstados::model()->findAll('convenios_idConvenio=:convenios_idConvenio', array(':convenios_idConvenio'=>$id)); /*Todos los estados por los cuales ha pasado el convenio*/

		$modelDependencia=Dependencias::model()->findAll(); 
		$modelestado = new ConvenioEstados; 

	    if(isset($_POST['ConvenioEstados']))
		 {
		 	$modelestado->convenios_idConvenio=$id;
			$modelestado->attributes=$_POST['ConvenioEstados'];
			if($modelestado->save())
				$this->redirect(array('cambiarEstado','id'=>$modelestado->convenios_idConvenio));
		 }

			$this->render('cambiarEstado',array(
			'model'=>$model,
			'modeloE'=>$modelestado,
			'modelEdo'=>$modelEdoConve,
			'modelDpcia'=>$modelDependencia,
			'estadosConv'=>$estadosCovenio
			));

	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new ConvenioEstados;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ConvenioEstados']))
		{
			$model->attributes=$_POST['ConvenioEstados'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_convenio_estado));
		}

		$this->render('create',array(
			'model'=>$model,
		));

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

		if(isset($_POST['ConvenioEstados']))
		{
			$model->attributes=$_POST['ConvenioEstados'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_convenio_estado));
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
		$dataProvider=new CActiveDataProvider('ConvenioEstados');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin($id)
	{
		
		//$model=ConvenioEstados::model()->findAll('convenios_idConvenio=:idConvenio', array(':idConvenio'=>$id)); 
		$model=new ConvenioEstados('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ConvenioEstados']))
			$model->attributes=$_GET['ConvenioEstados'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ConvenioEstados the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ConvenioEstados::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}


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

	/**
	 * Performs the AJAX validation.
	 * @param ConvenioEstados $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='convenio-estados-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
