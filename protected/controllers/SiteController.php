<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect($this->createUrl('site/convenioConsultar'));	
				//$this->redirect('index.php?r=site/convenioConsultar');
				//$this->redirect('index.php?r=site/page&view=consultarConvenio'); la estatica
				//$this->redirect(Yii::app()->user->returnUrl); la por defecto
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	public function actionConvenioConsultar(){

	
       $modelClass=clasificacionconvenios::model()->findAll();
       $modelConv=convenios::model()->findAll();
       $modelTipo=tipoconvenios::model()->findAll();
       $modelPais=paises::model()->findAll();
       $modelTipoIns=tiposinstituciones::model()->findAll();
       $modelInst=instituciones::model()->findAll();
       $modelEdoConve=estadoconvenios::model()->findAll();
       
       $formConsulta = new ConsultasConvenios;
       $resull= new convenios;


       if(isset($_POST["ajax"]) && $_POST["ajax"]==='form'){

       	echo CActiveForm::validate($formConsulta);
       	Yii::app()->end();
        }
     
      if(isset($_POST["ConsultasConvenios"]))
       {
       	$formConsulta->attributes=$_POST["ConsultasConvenios"];

       	if(isset($formConsulta->anio)){

       		$criteria=new CDbCriteria;
			$criteria->select='idConvenio,nombreConvenio,fechaInicioConvenio,fechaCaducidadConvenio';  // seleccionar solo la columna 'cod'
			$criteria->condition='YEAR(fechaInicioConvenio)=:fechaInicioConvenio';
			$criteria->params=array(':fechaInicioConvenio'=>$formConsulta->anio);
			$resull=convenios::model()->find($criteria); 

       	}
                
       	if(!$formConsulta->validate()){
       		$this->redirect($this->createUrl('site/convenioConsultar'));	
       	}

       }

       $this->render('convenioConsultar',array('clasif'=>$modelClass,
       	'conve'=>$modelConv,
       	'tipoconve'=>$modelTipo,
       	'paisesconve'=>$modelPais,
       	'tiposinst'=>$modelTipoIns,
       	'institucionconve'=>$modelInst,
        'estadoconve'=>$modelEdoConve,
        'model'=>$formConsulta,
        'resultado'=>$resull
       	));


             
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		
		$this->redirect(Yii::app()->homeUrl);
	}

	public function actionConfiguracion(){
		$this->render('configuracion');
	}

	public function actionInformacion(){
		$this->render('informacion');
	}
}