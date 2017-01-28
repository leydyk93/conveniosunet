<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
 		<div class="panel-heading text-center"><h4><?php if($model->isNewRecord){ echo "Nuevo Usuario";}else{ echo "Modificar Usuario";} ?></h4></div>
 		<div class="panel-body text-center">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-horizontal',),
)); ?>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'nombre',array('class'=>"control-label col-sm-2")); ?>
		<div class="col-sm-10">
		<?php echo $form->textField($model,'nombre',array('class'=>"form-control input-sm")); ?>
		<?php echo $form->error($model,'nombre'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'clave',array('class'=>"control-label col-sm-2")); ?>
		<div class="col-sm-10">
		<?php echo $form->passwordField($model,'clave',array('class'=>"form-control input-sm")); ?>
		<?php echo $form->error($model,'clave'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'correo',array('class'=>"control-label col-sm-2")); ?>
		<div class="col-sm-10">
		<?php echo $form->textField($model,'correo',array('class'=>"form-control input-sm")); ?>
		<?php echo $form->error($model,'correo'); ?>
		</div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'IdRol',array('class'=>"control-label col-sm-2")); ?>
		<div class="col-sm-10">

		 <?php 

               echo $form->dropDownList($model,'IdRol', 
                                            array("1"=>"Administrador", "2"=>"Especial"),
                                            array('class'=>'form-control input-sms')                            
                                            );
                   
         ?>
		
		<?php echo $form->error($model,'IdRol'); ?>

		</div>
	</div>

	<div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>"btn btn-conv btn-md")); ?>
	</div>

<?php $this->endWidget(); ?>
</div>
   <p class="note text-right">Los campos con <span class="required">*</span> son obligatorios</p>
	</div>
  </div>
</div>