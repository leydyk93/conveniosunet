<?php

class InstitucionesController extends Controller
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
				'actions'=>array('index','view','selectInstitucionesPorPais','SelectInstitucionPorAmbito'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','selectEstado', 'selectTipoInstitucion'),
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
	 * Permite listar a traves de AJAX Los estados a partir del pais
	 * este metodo es usado en la vista de configuracion
	 */
	public function actionSelectEstado(){
		
		 $data=Estados::model()->findAll('paises_idPais=:paises_idPais', 
   		array(':paises_idPais'=>(int) $_POST['idPais']));

		  $data=CHtml::listData($data,'idEstado','nombreEstado');
 
		   echo "<option value=''>Seleccione Estado</option>";
		   foreach($data as $value=>$nombreEstado)
		   echo CHtml::tag('option', array('value'=>$value),CHtml::encode($nombreEstado),true);

   }

   /**
	 * Permite listar a traves de AJAX las instituciones a partir del ambito seleccionado
	 * este metodo es usado en la vista construirReporte y consultar
	 */
   public function actionSelectInstitucionPorAmbito(){
		
		if($_POST['ambito']=="01"){

		$criteria=new CDbCriteria;
		$criteria->select='*';  
		$criteria->join='INNER JOIN estados e ON e.idEstado = estados_idEstado'; 
		$criteria->condition='e.paises_idPais!=:idPais and idInstitucion!=:idInstitucion';
		$criteria->params=array(':idPais'=>"35", ':idInstitucion'=>"6");
		$data=instituciones::model()->findAll($criteria);
			
		}else if($_POST['ambito']=="02"){

		$criteria=new CDbCriteria;
		$criteria->select='*';  
		$criteria->join='INNER JOIN estados e ON e.idEstado = estados_idEstado'; 
		$criteria->condition='e.paises_idPais=:idPais and idInstitucion!=:idInstitucion';
		$criteria->params=array(':idPais'=>"35", ':idInstitucion'=>"6");
		$data=instituciones::model()->findAll($criteria);
			
		}else if($_POST['ambito']=="03"){
			$data=instituciones::model()->findAll('estados_idEstado=:estados_idEstado and idInstitucion!=:idInstitucion',array(':estados_idEstado'=>"9", ':idInstitucion'=>"6"));
		}else{
			$data=instituciones::model()->findAll();
		}
	 	 $data=CHtml::listData($data,'idInstitucion','nombreInstitucion');
		  echo "<option value=''>Todos</option>";
		   foreach($data as $value=>$nombreInstitucion)
		   echo CHtml::tag('option', array('value'=>$value),CHtml::encode($nombreInstitucion),true);
   }

   /**
	 * Permite listar a traves de AJAX las instituciones a partir del pais seleccionado
	 * este metodo es usado en la vista construirReporte y consultar
	 */
   	public function actionSelectInstitucionesPorPais(){
		
		//$valor ="<script>console.log( 'HOLA' );</script>";
		//echo $valor;
		if($_POST['pais']==""){
			$data=instituciones::model()->findAll('idInstitucion!=:idInstitucion', array(':idInstitucion'=>"6"));	
		}else{
			$criteria=new CDbCriteria;
			$criteria->select='*';  
			$criteria->join='INNER JOIN estados e ON e.idEstado = estados_idEstado'; 
			$criteria->condition='e.paises_idPais=:idPais and idInstitucion!=:idInstitucion';
			$criteria->params=array(':idPais'=>(int) $_POST['pais'], ':idInstitucion'=>"6");
			$data=instituciones::model()->findAll($criteria);
		}

		  $data=CHtml::listData($data,'idInstitucion','nombreInstitucion');
		   echo "<option value=''>Todos</option>";
		   foreach($data as $value=>$nombreInstitucion)
		   echo CHtml::tag('option', array('value'=>$value),CHtml::encode($nombreInstitucion),true);

   }

	/**
	 * Permite listar a traves de AJAX las instituciones a partir del tipo y del estado(ubicacion)
	 * este metodo es usado en la vista de configuracion
	 */
   public function actionSelectTipoInstitucion(){
   		
		   $data=Instituciones::model()->findAll('tiposInstituciones_idTipoInstitucion=:tiposInstituciones_idTipoInstitucion AND estados_idEstado=:estados_idEstado',
   		   array(':tiposInstituciones_idTipoInstitucion'=>(int) $_POST['idTipoInstitucion'] , ':estados_idEstado'=>(int) $_POST['idEstadox'] ));
		 
		  $data=CHtml::listData($data,'idInstitucion','nombreInstitucion');
		   echo "<option value=''>Seleccione Institucion</option>";
		   
		   foreach($data as $value=>$nombreInstitucion)
		   echo CHtml::tag('option', array('value'=>$value),CHtml::encode($nombreInstitucion),true);
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
		$model=new Instituciones;
		$pais = new Paises;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Instituciones']))
		{
			$model->attributes=$_POST['Instituciones'];
			if($model->save()){
				$this->guardarBitacora(1, 9);
				$this->redirect(array('admin'));
				//$this->redirect(array('view','id'=>$model->idInstitucion));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'pais'=>$pais,
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
		$pais = new Paises;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Instituciones']))
		{
			$model->attributes=$_POST['Instituciones'];
			if($model->save()){
				$this->guardarBitacora(2, 9);
				$this->redirect(array('admin'));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'pais'=>$pais,
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
		$this->guardarBitacora(3, 9);
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
		$dataProvider=new CActiveDataProvider('Instituciones');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}*/

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Instituciones('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Instituciones']))
			$model->attributes=$_GET['Instituciones'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Instituciones the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Instituciones::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Instituciones $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='instituciones-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
