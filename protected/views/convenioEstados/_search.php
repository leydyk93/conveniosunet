<?php
/* @var $this ConvenioEstadosController */
/* @var $model ConvenioEstados */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_convenio_estado'); ?>
		<?php echo $form->textField($model,'id_convenio_estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'convenios_idConvenio'); ?>
		<?php echo $form->textField($model,'convenios_idConvenio',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estadoConvenios_idEstadoConvenio'); ?>
		<?php echo $form->textField($model,'estadoConvenios_idEstadoConvenio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaCambioEstado'); ?>
		<?php echo $form->textField($model,'fechaCambioEstado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numeroReporte'); ?>
		<?php echo $form->textField($model,'numeroReporte',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'observacionCambioEstado'); ?>
		<?php echo $form->textArea($model,'observacionCambioEstado',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dependencias_idDependencia'); ?>
		<?php echo $form->textField($model,'dependencias_idDependencia'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->