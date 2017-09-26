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
				
				$this->redirect($this->createUrl('convenios/consultar'));

				//$this->redirect($this->createUrl('site/convenioConsultar'));la consulta sin ajax y desde el controlador site
				
				//$this->redirect('index.php?r=site/page&view=consultarConvenio'); la estatica
				//$this->redirect(Yii::app()->user->returnUrl); la por defecto
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	public function actionConvenioConsultar(){

	
       $modelClass=Clasificacionconvenios::model()->findAll();
       $modelConv=Convenios::model()->findAll();
       $modelTipo=Tipoconvenios::model()->findAll();
       $modelPais=Paises::model()->findAll();
       $modelTipoIns=Tiposinstituciones::model()->findAll();
       $modelInst=Instituciones::model()->findAll();
       $modelEdoConve=Estadoconvenios::model()->findAll();
       
       $formConsulta = new ConsultasConvenios;
     
       $resull3= new ResultadoConvenios;

       
       $resultados=null;
      

      if(isset($_POST["ajax"]) && $_POST["ajax"]==='form'){

       	echo CActiveForm::validate($formConsulta);
       	Yii::app()->end();
        }

     			$conexion=Yii::app()->db;

				$consulta  = "SELECT DISTINCT c.nombreConvenio, c.fechaInicioConvenio, c.fechaCaducidadConvenio,c.objetivoConvenio,tc.descripcionTipoConvenio, ec.nombreEstadoConvenio, c.idConvenio FROM convenios c ";
				$consulta .= "JOIN tipoconvenios tc ON tc.idTipoConvenio = c.tipoConvenios_idTipoConvenio ";
				$consulta .= "JOIN convenio_estados ce ON ce.convenios_idConvenio=c.idConvenio ";
				$consulta .= "JOIN estadoconvenios ec ON ce.estadoConvenios_idEstadoConvenio=ec.idEstadoConvenio ";
				$consulta .= "WHERE ce.fechaCambioEstado = (
							SELECT MAX( fechaCambioEstado ) 
							FROM convenio_estados
							WHERE convenios_idConvenio = c.idConvenio
							) ORDER BY YEAR(ce.fechaCambioEstado) ";
     
      if(isset($_POST["ConsultasConvenios"]))
       {
       	$formConsulta->attributes=$_POST["ConsultasConvenios"];
          					
				$conexion=Yii::app()->db;


				$consulta  = "SELECT DISTINCT c.nombreConvenio, c.fechaInicioConvenio, c.fechaCaducidadConvenio,c.objetivoConvenio,tc.descripcionTipoConvenio, ec.nombreEstadoConvenio, c.idConvenio FROM convenios c ";
				$consulta .= "JOIN tipoconvenios tc ON tc.idTipoConvenio = c.tipoConvenios_idTipoConvenio ";
				$consulta .= "JOIN convenio_estados ce ON ce.convenios_idConvenio=c.idConvenio ";
				$consulta .= "JOIN estadoconvenios ec ON ce.estadoConvenios_idEstadoConvenio=ec.idEstadoConvenio ";
				$consulta .= "JOIN institucion_convenios ic ON c.idConvenio = ic.convenios_idConvenio ";
				$consulta .= "JOIN instituciones inst ON inst.idInstitucion = ic.instituciones_idInstitucion ";
				$consulta .= "JOIN tiposinstituciones tinst ON  tinst.idTipoInstitucion = inst.tiposInstituciones_idTipoInstitucion ";
				$consulta .= "JOIN estados edo ON edo.idEstado = inst.estados_idEstado ";
				$consulta .= "JOIN paises ps ON ps.idPais=edo.paises_idPais ";
				$consulta .= "WHERE ce.fechaCambioEstado = (
							SELECT MAX( fechaCambioEstado ) 
							FROM convenio_estados
							WHERE convenios_idConvenio = c.idConvenio
							) ";
				
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
				if(isset($_POST['ConsultasConvenios']['estadoConv'])&&$_POST['ConsultasConvenios']['estadoConv']!=null){
								  $cestado=null;
									foreach ($_POST['ConsultasConvenios']['estadoConv'] as $row) {
										$cestado=$row.",".$cestado;
									}
									$cestado=substr($cestado, 0, -1);

									$consulta .="and ec.idEstadoConvenio IN (".$cestado.") ";
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
				  
				  		$consulta .="and inst.idInstitucion=".$_POST['ConsultasConvenios']['institucion']." ";
				  
				}

                $consulta .="ORDER BY YEAR(ce.fechaCambioEstado) ";
						
			         
       	if(!$formConsulta->validate()){
       		$this->redirect($this->createUrl('site/convenioConsultar'));	
       	}

        }

       			$resultados=$conexion->createCommand($consulta)->query();
				
				$resultados->bindColumn(1,$resull3->nombre_convenio);
				$resultados->bindColumn(2,$resull3->fecha_inicio);
				$resultados->bindColumn(3,$resull3->fecha_caducidad);
				$resultados->bindColumn(4,$resull3->objetivo_convenio);
				$resultados->bindColumn(5,$resull3->tipo_convenio);
				$resultados->bindColumn(6,$resull3->estado_actual_convenio);
				$resultados->bindColumn(7,$resull3->id_convenio);

         

       $this->render('convenioConsultar',array('clasif'=>$modelClass,
       	'conve'=>$modelConv,
       	'tipoconve'=>$modelTipo,
       	'paisesconve'=>$modelPais,
       	'tiposinst'=>$modelTipoIns,
       	'institucionconve'=>$modelInst,
        'estadoconve'=>$modelEdoConve,
        'model'=>$formConsulta,
        'ojo'=>$resultados,
        'resultado3'=>$resull3
       	)); 
	}

	/* public function actionConvenioConsultar(){

	   $modelClass=Clasificacionconvenios::model()->findAll();
       $modelConv=Convenios::model()->findAll();
       $modelTipo=Tipoconvenios::model()->findAll();
       $modelPais=Paises::model()->findAll();
       $modelTipoIns=Tiposinstituciones::model()->findAll();
       $modelInst=Instituciones::model()->findAll();
       $modelEdoConve=Estadoconvenios::model()->findAll();

	   $formConsulta = new ConsultasConvenios;
	   $resull3= new ResultadoConvenios;

	   	$conexion=Yii::app()->db;

				$consulta  = "SELECT DISTINCT c.nombreConvenio, c.fechaInicioConvenio, c.fechaCaducidadConvenio,c.objetivoConvenio,tc.descripcionTipoConvenio, ec.nombreEstadoConvenio, c.idConvenio FROM convenios c ";
				$consulta .= "JOIN tipoconvenios tc ON tc.idTipoConvenio = c.tipoConvenios_idTipoConvenio ";
				$consulta .= "JOIN convenio_estados ce ON ce.convenios_idConvenio=c.idConvenio ";
				$consulta .= "JOIN estadoconvenios ec ON ce.estadoConvenios_idEstadoConvenio=ec.idEstadoConvenio ";
				$consulta .= "WHERE ce.fechaCambioEstado = (
							SELECT MAX( fechaCambioEstado ) 
							FROM convenio_estados
							WHERE convenios_idConvenio = c.idConvenio
							) ORDER BY YEAR(ce.fechaCambioEstado) ";

	   if(isset($_POST["ConsultasConvenios"]))
    	{
 
 
        $formConsulta->attributes=$_POST["ConsultasConvenios"];
        if( $formConsulta->validate())
        {

        	$conexion=Yii::app()->db;


				$consulta  = "SELECT DISTINCT c.nombreConvenio, c.fechaInicioConvenio, c.fechaCaducidadConvenio,c.objetivoConvenio,tc.descripcionTipoConvenio, ec.nombreEstadoConvenio, c.idConvenio FROM convenios c ";
				$consulta .= "JOIN tipoconvenios tc ON tc.idTipoConvenio = c.tipoConvenios_idTipoConvenio ";
				$consulta .= "JOIN convenio_estados ce ON ce.convenios_idConvenio=c.idConvenio ";
				$consulta .= "JOIN estadoconvenios ec ON ce.estadoConvenios_idEstadoConvenio=ec.idEstadoConvenio ";
				$consulta .= "JOIN institucion_convenios ic ON c.idConvenio = ic.convenios_idConvenio ";
				$consulta .= "JOIN instituciones inst ON inst.idInstitucion = ic.instituciones_idInstitucion ";
				$consulta .= "JOIN tiposinstituciones tinst ON  tinst.idTipoInstitucion = inst.tiposInstituciones_idTipoInstitucion ";
				$consulta .= "JOIN estados edo ON edo.idEstado = inst.estados_idEstado ";
				$consulta .= "JOIN paises ps ON ps.idPais=edo.paises_idPais ";
				$consulta .= "WHERE ce.fechaCambioEstado = (
							SELECT MAX( fechaCambioEstado ) 
							FROM convenio_estados
							WHERE convenios_idConvenio = c.idConvenio
							) ";
				
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
				if(isset($_POST['ConsultasConvenios']['estadoConv'])&&$_POST['ConsultasConvenios']['estadoConv']!=null){
								  $cestado=null;
									foreach ($_POST['ConsultasConvenios']['estadoConv'] as $row) {
										$cestado=$row.",".$cestado;
									}
									$cestado=substr($cestado, 0, -1);

									$consulta .="and ec.idEstadoConvenio IN (".$cestado.") ";
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
				  
				  		$consulta .="and inst.idInstitucion=".$_POST['ConsultasConvenios']['institucion']." ";
				  
				}

                $consulta .="ORDER BY YEAR(ce.fechaCambioEstado) ";
						

           // form inputs are valid, do something here
           print_r($_REQUEST);
           return;
 
        }
      }

      	$resultados=$conexion->createCommand($consulta)->query();
				
				$resultados->bindColumn(1,$resull3->nombre_convenio);
				$resultados->bindColumn(2,$resull3->fecha_inicio);
				$resultados->bindColumn(3,$resull3->fecha_caducidad);
				$resultados->bindColumn(4,$resull3->objetivo_convenio);
				$resultados->bindColumn(5,$resull3->tipo_convenio);
				$resultados->bindColumn(6,$resull3->estado_actual_convenio);
				$resultados->bindColumn(7,$resull3->id_convenio);

      $this->render('convenioConsultar',array('clasif'=>$modelClass,
       	'conve'=>$modelConv,
       	'tipoconve'=>$modelTipo,
       	'paisesconve'=>$modelPais,
       	'tiposinst'=>$modelTipoIns,
       	'institucionconve'=>$modelInst,
        'estadoconve'=>$modelEdoConve,
        'model'=>$formConsulta,
        'ojo'=>$resultados,
        'resultado3'=>$resull3
       	)); 
       
	}*/

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
		
	    $model = new ArchivosForm;
		$modelo=new Formatos;
		$msg ="";

		if(isset($_POST["ArchivosForm"])){
			$model->attributes=$_POST["ArchivosForm"];
			$documento=CUploadedFile::getInstancesByName('documento');
			$path = Yii::getPathOfAlias('webroot').'/archivos/formatos/';		

			if(count($documento)===0){

				$msg="<strong class='text-error'>Error, No ha seleccionado el archivo</strong>";

			}else if(!$model->validate()){	
				$msg="<strong class='text-error'>Error, al enviar en formulario</strong>";	
			}else{

				switch ($model->titulo) {
					case '1':
							
								foreach ($documento as $doc => $i) {
										$aleatorio=rand(10000,99999);
										$docu=$aleatorio."-".$i->name;
										$modelo->NOMBRE=$docu;
										//$modelo->save();
									$i->saveAs($path.$docu);
							//	rename(Yii::app()->request->baseUrl."/archivos/formatos/".$docu,Yii::app()->request->baseUrl."/archivos/formatos/acta.pdf");
								rename($path.$docu,$path."acta.pdf");
									}	
							
						break;
						case '2':
								foreach ($documento as $doc => $i) {
										$aleatorio=rand(10000,99999);
										$docu=$aleatorio."-".$i->name;
										$modelo->NOMBRE=$docu;
										//$modelo->save();
									    $i->saveAs($path.$docu);
							//	rename(Yii::app()->request->baseUrl."/archivos/formatos/".$docu,Yii::app()->request->baseUrl."/archivos/formatos/acta.pdf");
								rename($path.$docu,$path."convenioMarco.pdf");
									}	
						  		
						break;

						case '3':
								foreach ($documento as $doc => $i) {
										$aleatorio=rand(10000,99999);
										$docu=$aleatorio."-".$i->name;
										$modelo->NOMBRE=$docu;
										//$modelo->save();
									$i->saveAs($path.$docu);
							//	rename(Yii::app()->request->baseUrl."/archivos/formatos/".$docu,Yii::app()->request->baseUrl."/archivos/formatos/acta.pdf");
								rename($path.$docu,$path."convenioEspecifico.pdf");
									}	
						  		
						break;

							case '4':
								foreach ($documento as $doc => $i) {
										$aleatorio=rand(10000,99999);
										$docu=$aleatorio."-".$i->name;
										$modelo->NOMBRE=$docu;
										//$modelo->save();
									$i->saveAs($path.$docu);
							//	rename(Yii::app()->request->baseUrl."/archivos/formatos/".$docu,Yii::app()->request->baseUrl."/archivos/formatos/acta.pdf");
								rename($path.$docu,$path."normasProcedimientos.pdf");
									}	
						  		
						break;
					
					default:
						# code...
						break;
				}
						
			}

		}
		$this->render('informacion',array('model'=>$model));	
	}
}
