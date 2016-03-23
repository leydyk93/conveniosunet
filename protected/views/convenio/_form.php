<?php
/* @var $this ConvenioController */
/* @var $model Convenio */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'convenio-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cod_convenio'); ?>
		<?php echo $form->textField($model,'cod_convenio',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'cod_convenio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre_convenio'); ?>
		<?php echo $form->textField($model,'nombre_convenio',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nombre_convenio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_creacion'); ?>
		<?php echo $form->textField($model,'fecha_creacion'); ?>
		<?php echo $form->error($model,'fecha_creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_caducidad'); ?>
		<?php echo $form->textField($model,'fecha_caducidad'); ?>
		<?php echo $form->error($model,'fecha_caducidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'institucion_UNET'); ?>
		<?php echo $form->textField($model,'institucion_UNET',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'institucion_UNET'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'objetivo_covenio'); ?>
		<?php echo $form->textArea($model,'objetivo_covenio',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'objetivo_covenio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cod_clasificacion'); ?>
		<?php echo $form->textField($model,'cod_clasificacion',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'cod_clasificacion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->