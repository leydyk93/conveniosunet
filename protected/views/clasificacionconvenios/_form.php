<?php
/* @var $this ClasificacionconveniosController */
/* @var $model Clasificacionconvenios */
/* @var $form CActiveForm */
?>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
 		<div class="panel text-center"><h4><?php if($model->isNewRecord){ echo "Nueva Clasificacion";}else{ echo "Modificar Clasificacion";} ?></h4></div>
 		<div class="panel-body text-center">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'clasificacionconvenios-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false,
		'htmlOptions'=>array('class'=>'form-horizontal', ),
)); ?>

	<div class="form-group">
		<div class="col-sm-4">
		<?php echo $form->labelEx($model,'nombreClasificacionConvenio'); ?>
		</div>
		<div class="col-sm-6">
		<?php echo $form->textField($model,'nombreClasificacionConvenio',array('class'=>"form-control")); ?>
		<?php echo $form->error($model,'nombreClasificacionConvenio'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4">
		<?php echo $form->labelEx($model,'descripcionClasificacionConvenio'); ?>
		</div>
		<div class="col-sm-6">
		<?php echo $form->textField($model,'descripcionClasificacionConvenio',array('class'=>"form-control")); ?>
		<?php echo $form->error($model,'descripcionClasificacionConvenio'); ?>
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
