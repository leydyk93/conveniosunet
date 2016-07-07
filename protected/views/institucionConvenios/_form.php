<?php
/* @var $this InstitucionConveniosController */
/* @var $model InstitucionConvenios */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'institucion-convenios-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idInstitucionConvenio'); ?>
		<?php echo $form->textField($model,'idInstitucionConvenio',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'idInstitucionConvenio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'instituciones_idInstitucion'); ?>
		<?php echo $form->textField($model,'instituciones_idInstitucion',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'instituciones_idInstitucion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'convenios_idConvenio'); ?>
		<?php echo $form->textField($model,'convenios_idConvenio',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'convenios_idConvenio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaIncorporacion'); ?>
		<?php echo $form->textField($model,'fechaIncorporacion'); ?>
		<?php echo $form->error($model,'fechaIncorporacion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->