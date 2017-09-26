<?php 
		$this->pageTitle=Yii::app()->name . ' - informacion';
	$this->breadcrumbs=array(
		'Informacion',
	);



 ?>
 

<div class="container">
<?php if(!Yii::app()->user->isGuest):?>
<h2>Actualizar formatos de los Archivos</h2>
<p>Seleccione el tipo de archivo que desea actualizar: </p>
    <?php 
				     $form=$this->beginWidget('CActiveForm',
				        array(
				          'method' =>'POST',
				          'action' =>Yii::app()->createUrl('site/informacion'),
				          'enableClientValidation' => true,
				          'htmlOptions'=>array(
	                          'enctype'=>'multipart/form-data',
	                        ),
				          'clientOptions'=> array('validateOnSubmit'=>true),
				          ));
	?>
	<ul>
	 <?php  
              echo $form->radioButtonList($model,'titulo',
			                  array("1"=>"1- Acta", "2"=>"2- Convenio Marco", "3"=>"3- Convenio Específico", "4"=>"4- Normas y Procedimientos"),
							  array('template'=>'<li class="list-group-item" > <p class="hFamilia">{input}{label}</p></li>', "separator" => ""));
        ?>
	 </ul>

	  <div class="text-right">

		 <label class="btn btn-conv btn-sm"> <span class="glyphicon glyphicon-open-file"></span>
						<?php 

						$this->widget('CMultiFileUpload',
							array(
								'model'=>$model,
								'name'=>'documento',
								'attribute'=>'documento',
								'accept'=> 'pdf',
								'denied'=>'El documento debe estar en formato PDF',
								'max'=>1,
								'duplicate'=>'archivo duplicado',
								 'htmlOptions'=>array(
                                    'style'=>"display: none;"     
                                  ),
								));

						   echo $form->error($model,'documento');
						 ?>
             </label>
        
				<?php 
							 echo CHtml::submitButton('Actualizar', array('class'=>'btn btn-conv btn-sm')); 
		         ?>
		</div>

 <?php $this->endWidget(); ?>

 <?php endif ?>

<h2>Formatos para establecer un convenio</h2>

<ol>
   	  
	   <li class="list-group-item"> <p class="hFamilia">1- Acta de intención</p> 
		Documento que demuestra el interés de una institución de establecer un convenio, en él se especifican compromisos entre las partes
		
					<div class="text-right">
						Descargar formato
						<a href="<?php  echo Yii::app()->request->baseUrl."/archivos/formatos/acta.pdf" ?>" download="UNETactaIntencion.pdf"><span class="glyphicon glyphicon-arrow-down"></span></a>
					</div>
                  

	</li>
	<li class="list-group-item"> <p class="hFamilia">2- Convenio Marco</p> 
		Tipo de acuerdo general que se realiza con instituciones, establece una estrecha relacion entre las partes, de un convenio marco se pueden derivar especificos
			<div class="text-right">
						Descargar formato
						<a href="<?php  echo Yii::app()->request->baseUrl."/archivos/formatos/convenioMarco.pdf" ?>" download="UNETconvenioMarco.pdf"><span class="glyphicon glyphicon-arrow-down"></span></a>
			</div>
	</li>
	<li class="list-group-item"> <p class="hFamilia">2- Convenio Específico</p>
		Es un acuerdo mas concreto entre las partes 
		<div class="text-right">
						Descargar formato
						<a href="<?php  echo Yii::app()->request->baseUrl."/archivos/formatos/convenioEspecifico.pdf" ?>" download="UNETconvenioEspecifico.pdf"><span class="glyphicon glyphicon-arrow-down"></span></a>
		</div>
	</li>
	
</ol>


	<h2>Aspectos Legales</h2>
	<ul>
		<li class="list-group-item"> <p class="hFamilia">Normas y Procedimientos</p>
		Si desea establecer un convenio con la UNET le invitamos a leer las normas y procedimientos 
		<div class="text-right">
						Descargar formato
						<a href="<?php  echo Yii::app()->request->baseUrl."/archivos/formatos/normasProcedimientos.pdf" ?>" download="UNETnormasProcedimientos.pdf"><span class="glyphicon glyphicon-arrow-down"></span></a>
		</div>
	</li>
	</ul>
</div>



