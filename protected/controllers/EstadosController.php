<?php

class EstadosController extends Controller
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
				'actions'=>array('index','view','selectPaisAmbito'),
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
		$model=new Estados;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Estados']))
		{
			$model->attributes=$_POST['Estados'];
			if($model->save()){
				$this->guardarBitacora(1, 10);
				$this->redirect(array('admin'));
			}
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

		if(isset($_POST['Estados']))
		{
			$model->attributes=$_POST['Estados'];
			if($model->save()){
				$this->guardarBitacora(2, 10);
				$this->redirect(array('admin'));
				//$this->redirect(array('view','id'=>$model->idEstado));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionSelectPaisAmbito(){
		
		//$valor ="<script>console.log('AQUI');</script>";
		//echo $valor;

		if($_POST['ambito']=="01"){
			$data=Paises::model()->findAll('idPais!=:idPais',array(':idPais'=>"35"));
			 //echo "<option value=''>Todos</option>";
		}else if($_POST['ambito']=="02" || $_POST['ambito']=="03"){
			$data=Paises::model()->findAll('idPais=:idPais',array(':idPais'=>"35"));
		}else{
			$data=Paises::model()->findAll();
			 //echo "<option value=''>Todos</option>";
		}

		 $data=CHtml::listData($data,'idPais','nombrePais');
 		echo "<option value=''>Todos</option>";
		   foreach($data as $value=>$nombrePais)
		   echo CHtml::tag('option', array('value'=>$value),CHtml::encode($nombrePais),true);
   }

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();
		$this->guardarBitacora(3, 10);
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
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

	/**
	 * Lists all models.
	 */
	/*public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Estados');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));

	}*/

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Estados('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Estados']))
			$model->attributes=$_GET['Estados'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Estados the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Estados::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Estados $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='estados-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
