<?php
/* @var $this ConveniosController */
/* @var $model Convenios */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idConvenio'); ?>
		<?php echo $form->textField($model,'idConvenio',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombreConvenio'); ?>
		<?php echo $form->textField($model,'nombreConvenio',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaCaducidadConvenio'); ?>
		<?php echo $form->textField($model,'fechaCaducidadConvenio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'objetivoConvenio'); ?>
		<?php echo $form->textArea($model,'objetivoConvenio',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'institucionUNET'); ?>
		<?php echo $form->textField($model,'institucionUNET',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'urlConvenio'); ?>
		<?php echo $form->textField($model,'urlConvenio',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'clasificacionConvenios_idTipoConvenio'); ?>
		<?php echo $form->textField($model,'clasificacionConvenios_idTipoConvenio',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipoConvenios_idTipoConvenio'); ?>
		<?php echo $form->textField($model,'tipoConvenios_idTipoConvenio',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alcanceConvenios_idAlcanceConvenio'); ?>
		<?php echo $form->textField($model,'alcanceConvenios_idAlcanceConvenio',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'formaConvenios_idFormaConvenio'); ?>
		<?php echo $form->textField($model,'formaConvenios_idFormaConvenio',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dependencias_idDependencia'); ?>
		<?php echo $form->textField($model,'dependencias_idDependencia',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'convenios_idConvenio'); ?>
		<?php echo $form->textField($model,'convenios_idConvenio',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->