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
       //$resull2= new tipoconvenios;

       $resull3= new ResultadoConvenios;
       $resultados=null;
       $n=null;


       if(isset($_POST["ajax"]) && $_POST["ajax"]==='form'){

       	echo CActiveForm::validate($formConsulta);
       	Yii::app()->end();
        }
     
      if(isset($_POST["ConsultasConvenios"]))
       {
       	$formConsulta->attributes=$_POST["ConsultasConvenios"];

       	if(isset($formConsulta->anio)){

       		$criteria=new CDbCriteria;
			$criteria->select='idConvenio,nombreConvenio,fechaInicioConvenio,fechaCaducidadConvenio,objetivoConvenio';  
			$criteria->condition='YEAR(fechaInicioConvenio)=:fechaInicioConvenio';
			$criteria->params=array(':fechaInicioConvenio'=>$formConsulta->anio);
			$resull=convenios::model()->findAll($criteria);


			/* otra opcion para buscar ya que al obtener los datos de un modelo que no era convenios como los paso
			a la vista. Imposible.aunque si puedo hacer join. :/ 
			$criteria=new CDbCriteria;
			$criteria->select='idConvenio,nombreConvenio,fechaInicioConvenio,fechaCaducidadConvenio,objetivoConvenio, tipoConvenios_idTipoConvenio,tp.descripcionTipoConvenio';
			$criteria->join='INNER JOIN tipoconvenios tp ON tp.idTipoConvenio = tipoConvenios_idTipoConvenio';  
			$criteria->condition='YEAR(fechaInicioConvenio)=:fechaInicioConvenio';
			$criteria->params=array(':fechaInicioConvenio'=>$formConsulta->anio);
			$resull=convenios::model()->find($criteria);*/


			//Para obtener el tipo. $resull2=tipoconvenios::model()->find('idTipoConvenio=:idTipoConvenio', array(':idTipoConvenio'=>$resull->tipoConvenios_idTipoConvenio));

            if($resull!=null){

				 $cadena=null;
				 foreach($resull as $row) { 
				   $cadena=$row->idConvenio.",".$cadena; 
				  }
				  $rest = substr($cadena, 0, -1);
				
				
				$conexion=Yii::app()->db;

				$consulta  = "SELECT c.nombreConvenio, c.fechaInicioConvenio, c.fechaCaducidadConvenio, tc.descripcionTipoConvenio, ec.nombreEstadoConvenio FROM convenios c ";
				$consulta .= "JOIN tipoconvenios tc ON tc.idTipoConvenio = c.tipoConvenios_idTipoConvenio ";
				$consulta .= "JOIN convenio_estados ce ON ce.convenios_idConvenio=c.idConvenio ";
				$consulta .= "JOIN estadoconvenios ec ON ce.estadoConvenios_idEstadoConvenio=ec.idEstadoConvenio ";
				$consulta .= "WHERE ce.fechaCambioEstado = (
							SELECT MAX( fechaCambioEstado ) 
							FROM convenio_estados
							WHERE convenios_idConvenio = c.idConvenio
							) and c.idConvenio IN (".$rest.")";
				$resultados=$conexion->createCommand($consulta)->query();
				
				$resultados->bindColumn(1,$resull3->nombre_convenio);
				$resultados->bindColumn(2,$resull3->fecha_inicio);
				$resultados->bindColumn(3,$resull3->fecha_caducidad);
				$resultados->bindColumn(4,$resull3->tipo_convenio);
				$resultados->bindColumn(5,$resull3->estado_actual_convenio);

				/*
				$consulta="SELECT  c.nombreConvenio b1, c.fechaInicioConvenio b2, c.fechaCaducidadConvenio, c.objetivoConvenio, ec.nombreEstadoConvenio, tc.descripcionTipoConvenio FROM convenios c ";
		        $consulta .= "JOIN convenio_estados ce ON ce.convenios_idConvenio=c.idConvenio ";
		        $consulta .= "JOIN tipoconvenios tc ON tc.idTipoConvenio = c.tipoConvenios_idTipoConvenio ";
		        $consulta .= "JOIN estadoconvenios ec ON ce.estadoConvenios_idEstadoConvenio=ec.idEstadoConvenio ";
				$consulta .= "WHERE c.idConvenio IN (".$rest.")";
				
				
		        
				$resultados=$conexion->createCommand($consulta)->query();


				$resultados->bindColumn(1,$resull3->fecha_estado_actual);
				$resultados->bindColumn(2,$resull3->nombre_convenio);
				$resultados->bindColumn(3,$resull3->fecha_inicio);
				$resultados->bindColumn(4,$resull3->fecha_caducidad);
				$resultados->bindColumn(5,$resull3->objetivo_convenio);
				$resultados->bindColumn(6,$resull3->estado_actual_convenio);
				$resultados->bindColumn(7,$resull3->tipo_convenio);
*/
       	  }
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
        'resultado'=>$resull,
        'ojo'=>$resultados,
        'resultado3'=>$resull3
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