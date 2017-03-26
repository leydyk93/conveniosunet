<?php 
		$this->pageTitle=Yii::app()->name . ' - informacion';
	$this->breadcrumbs=array(
		'Informacion',
	);

 ?>
 
<div class="container">
<h2>Formatos para establecer un convenio</h2>

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

<ol>
	<li class="list-group-item"> <p class="hFamilia">1- Acta de intención</p> 
		Documento que demuestra el interés de una institución de establecer un convenio, en él se especifican compromisos entre las partes
		
					<div class="text-right">
						<a href="<?php  echo Yii::app()->request->baseUrl."/archivos/formatos/acta.pdf" ?>" download="UNETactaIntencion.pdf"><span class="glyphicon glyphicon-arrow-down"></span>Descargar formato</a>
					</div>

                    <?php if(!Yii::app()->user->isGuest):?>
		 			
						<?php 
							echo $form->labelEx($model,'titulo',array('class'=>"modelArchivo"));
							echo $form->textField($model,'titulo',array('class'=>"modelArchivo", 'value'=>"1"));
							echo $form->error($model,'titulo');
					       
					     ?>
				    
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
						<?php  echo CHtml::submitButton('Actualizar', array('class'=>'btn btn-conv btn-sm')); ?>
				     	
				     <?php endif ?>

	</li>
	<li class="list-group-item"> <p class="hFamilia">2- Convenio Marco</p> 
		Tipo de acuerdo general que se realiza con instituciones, establece una estrecha relacion entre las partes, de un convenio marco se pueden derivar específicos
		<div class="text-right">
						<a href="<?php  echo Yii::app()->request->baseUrl."/archivos/formatos/convenioMarco.pdf" ?>" download="UNETconvenioMarco.pdf"><span class="glyphicon glyphicon-arrow-down"></span>Descargar formato</a>
		</div>
		   <?php if(!Yii::app()->user->isGuest):?>
		 			
						<?php 
							echo $form->labelEx($model,'titulo',array('class'=>"modelArchivo"));
							echo $form->textField($model,'titulo',array('class'=>"modelArchivo", 'value'=>"2"));
							echo $form->error($model,'titulo');
					       
					     ?>
				    
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
						<?php  echo CHtml::submitButton('Actualizar', array('class'=>'btn btn-conv btn-sm')); ?>
				     	
				     <?php endif ?>


	</li>
	<li class="list-group-item"> <p class="hFamilia">2- Convenio Específico</p>
		Es un acuerdo mas concreto entre las partes 
		<div class="text-right">Descargar formato
		<span class="glyphicon glyphicon-arrow-down"></span>
		</div>
	</li>
	
</ol>

	<h2>Aspectos Legales</h2>
<p>Normas y procedimientos</p>

 <?php $this->endWidget(); ?>

</div>

