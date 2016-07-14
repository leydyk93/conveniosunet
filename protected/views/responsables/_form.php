<?php
/* @var $this ResponsablesController */
/* @var $model Responsables */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'responsables-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'primerNombreResponsable'); ?>
		<?php echo $form->textField($model,'primerNombreResponsable',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'primerNombreResponsable'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'segundoNombreResponsable'); ?>
		<?php echo $form->textField($model,'segundoNombreResponsable',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'segundoNombreResponsable'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'primerApellidoResponsable'); ?>
		<?php echo $form->textField($model,'primerApellidoResponsable',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'primerApellidoResponsable'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'segundoApellidoResponsable'); ?>
		<?php echo $form->textField($model,'segundoApellidoResponsable',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'segundoApellidoResponsable'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'correoElectronicoResponsable'); ?>
		<?php echo $form->textField($model,'correoElectronicoResponsable',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'correoElectronicoResponsable'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefonoResponsable'); ?>
		<?php echo $form->textField($model,'telefonoResponsable',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'telefonoResponsable'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'instituciones_idInstitucion'); ?>
		<?php echo $form->textField($model,'instituciones_idInstitucion'); ?>
		<?php echo $form->error($model,'instituciones_idInstitucion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dependencias_idDependencia'); ?>
		<?php echo $form->textField($model,'dependencias_idDependencia'); ?>
		<?php echo $form->error($model,'dependencias_idDependencia'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>


</div><!-- form -->