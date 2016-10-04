<?php
/* @var $this ClasificacionconveniosController */
/* @var $model Clasificacionconvenios */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'clasificacionconvenios-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombreClasificacionConvenio'); ?>
		<?php echo $form->textField($model,'nombreClasificacionConvenio',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'nombreClasificacionConvenio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcionClasificacionConvenio'); ?>
		<?php echo $form->textField($model,'descripcionClasificacionConvenio',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'descripcionClasificacionConvenio'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->