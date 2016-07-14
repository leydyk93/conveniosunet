<?php
/* @var $this ResponsablesController */
/* @var $model Responsables */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idResponsable'); ?>
		<?php echo $form->textField($model,'idResponsable'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'primerNombreResponsable'); ?>
		<?php echo $form->textField($model,'primerNombreResponsable',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'segundoNombreResponsable'); ?>
		<?php echo $form->textField($model,'segundoNombreResponsable',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'primerApellidoResponsable'); ?>
		<?php echo $form->textField($model,'primerApellidoResponsable',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'segundoApellidoResponsable'); ?>
		<?php echo $form->textField($model,'segundoApellidoResponsable',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'correoElectronicoResponsable'); ?>
		<?php echo $form->textField($model,'correoElectronicoResponsable',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telefonoResponsable'); ?>
		<?php echo $form->textField($model,'telefonoResponsable',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'instituciones_idInstitucion'); ?>
		<?php echo $form->textField($model,'instituciones_idInstitucion'); ?>
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