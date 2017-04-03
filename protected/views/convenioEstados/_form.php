<?php
/* @var $this ConvenioEstadosController */
/* @var $model ConvenioEstados */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'convenio-estados-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'convenios_idConvenio'); ?>
		<?php echo $form->textField($model,'convenios_idConvenio',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'convenios_idConvenio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estadoConvenios_idEstadoConvenio'); ?>
		<?php echo $form->textField($model,'estadoConvenios_idEstadoConvenio'); ?>
		<?php echo $form->error($model,'estadoConvenios_idEstadoConvenio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaCambioEstado'); ?>
		<?php echo $form->textField($model,'fechaCambioEstado'); ?>
		<?php echo $form->error($model,'fechaCambioEstado'); ?>
	</div>

	<!--<div class="row">
		<?php /*echo $form->labelEx($model,'numeroReporte'); */?>
		<?php /*echo $form->textField($model,'numeroReporte',array('size'=>10,'maxlength'=>10)); */?>
		<?php /*echo $form->error($model,'numeroReporte');*/ ?>
	</div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'observacionCambioEstado'); ?>
		<?php echo $form->textArea($model,'observacionCambioEstado',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'observacionCambioEstado'); ?>
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