<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Iniciar sesion',
);
?>

<div class="row">
 <div class="col-md-6 col-md-offset-3">
 	<div class="panel panel-default">

 		<!--<div id="tituloIs" class="panel-heading text-center">Iniciar Sesion</div>-->

				<legend class="text-center"><h4>Iniciar Sesión</h4></legend>

				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'login-form',
					'enableClientValidation'=>true,
					'clientOptions'=>array(
						'validateOnSubmit'=>true,

					),
					'htmlOptions'=>array('class'=>'form-horizontal')
				)); ?>

				
				<div class="panel-body text-center">
						
					<div class="form-group">
						<?php echo $form->labelEx($model,'username',array('class'=>'control-label col-sm-2')); ?>
					    
					    <div class="col-sm-8">
					    	<?php echo $form->textField($model,'username',array('class'=>'form-control')); ?>
					 		<?php echo $form->error($model,'username'); ?>
					    </div>
				  	</div>

				  	<div class="form-group">
					     <?php echo $form->labelEx($model,'password',array('class'=>'control-label col-sm-2')); ?>
					    <div class="col-sm-8"> 
					      <?php echo $form->passwordField($model,'password',array('class'=>'form-control')); ?>
					      	<?php echo $form->error($model,'password'); ?>
					    </div>
				  	</div>

				  	<!--<div class="form-group"> 
					  	 <div class="col-sm-10"> 
						     	(<span class="required">*</span>) indica que el campo es requerido
						    </div>
					
				  	</div>-->

					<div class="form-group">    
					     <?php echo CHtml::submitButton('Iniciar',array('class'=>'btn btn-conv')); ?>
				  	</div>
				  	
				</div>
				  	<!--<div class="form-group"> 
				    <div class="col-sm-offset-2 col-sm-10">
				      <div class="checkbox">-->
				       	<!--<?php/* echo $form->checkBox($model,'rememberMe');*/ ?>
						<?php /* echo $form->label($model,'rememberMe');*/ ?>
						<?php /*echo $form->error($model,'rememberMe');*/ ?>-->
				    <!--  </div>
				    </div>
				  </div> -->

				

					

				<?php $this->endWidget(); ?>

			</div>
		</div>
	</div>


  
  
  
  


