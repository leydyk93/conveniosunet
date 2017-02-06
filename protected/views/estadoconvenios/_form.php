<?php
/* @var $this EstadoconveniosController */
/* @var $model Estadoconvenios */
/* @var $form CActiveForm */
?>

<div class="row">
 <div class="col-md-8 col-md-offset-2">
 	<div class="panel panel-default">
 		<div class="panel-heading text-center"><h4><?php if($model->isNewRecord){ echo "Nuevo estado Convenio";}else{ echo "Modificar estado Convenio";} ?></h4></div>
 		<div class="panel-body text-center">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'estadoconvenios-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-horizontal', ),
)); ?>

	<div class="form-group">
		<div class="col-sm-4">
		<?php echo $form->labelEx($model,'nombreEstadoConvenio'); ?>
		</div>
		<div class="col-sm-6">
		<?php echo $form->textField($model,'nombreEstadoConvenio',array('class'=>"form-control")); ?>
		<?php echo $form->error($model,'nombreEstadoConvenio'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4">
		<?php echo $form->labelEx($model,'descripcionEstadoConvenio'); ?>
		</div>
		<div class="col-sm-6">
		<?php echo $form->textArea($model,'descripcionEstadoConvenio',array('class'=>"form-control")); ?>
		<?php echo $form->error($model,'descripcionEstadoConvenio'); ?>
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