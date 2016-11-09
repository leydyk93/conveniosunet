<?php 
  $this->breadcrumbs=array(
	'Convenios'=>array('Subir Archivo'),
	'subir archivo',
);
 ?>

<h1>ESTA ES SUBIR ARCHIVO</h1>

<?php 
				     $form=$this->beginWidget('CActiveForm',
				        array(
				          'method' =>'POST',
				          'action' =>Yii::app()->createUrl('convenios/archivo'),
				          'enableClientValidation' => true,
				          'htmlOptions'=>array(
	                          'enctype'=>'multipart/form-data',
	                        ),
				          'clientOptions'=> array('validateOnSubmit'=>true),
				          
				          ));
				     ?>

				     <div class="row">

				     	<?php 
				     		     echo $form->labelEx($model,'titulo');
						         echo $form->textField($model,'titulo');
						         echo $form->error($model,'titulo');
				     	 ?>
				     	
				     </div>

				     <div class="row">
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
								));

						 echo $form->error($model,'documento');
						 ?>


						<?php 
							 echo CHtml::submitButton('Subir documento', array('class'=>'btn btn-conv btn-sm')); 
						 ?>
				     	
				     </div>

				        <?php 
				    	
				     	 $modelo->folder="01_Convenio1.pdf";
				      ?>

				      <a href="<?php  echo Yii::app()->request->baseUrl."/archivos/convenios/".$modelo->folder; ?>" download="convenioM234.pdf">descargar</a>

				     <?php $this->endWidget(); ?>