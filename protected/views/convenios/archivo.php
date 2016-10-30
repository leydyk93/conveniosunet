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
				    	 /*echo $modelo->convenios_idConvenio." ";
						 echo $modelo->titulo." ";
						 echo $modelo->folder." ";
						 echo $modelo->documento." ";*/

						 //CHtml::link("Link Doc.", "http://".$_SERVER["SERVER_NAME"].Yii::app()->request->baseUrl."/images/upload/".$data->link_doc)
						 		//CHtml::link("Link Doc.", "http://".$_SERVER["SERVER_NAME"].Yii::app()->request->baseUrl."/convenios/prueba/".$data->link_doc);
						 //	echo  "ASI APARECE".Yii::getPathOfAlias('webroot');
						 		echo Yii::app()->request->baseUrl."/archivos/convenios/".$modelo->folder."/".$modelo->documento;
				      ?>


				      <a href="<?php  echo Yii::app()->request->baseUrl."/archivos/convenios/".$modelo->folder."/".$modelo->documento; ?>" download="convenioM234.pdf">descargar</a>

				     
	
				     
				  


				     <?php $this->endWidget(); ?>