<?php
/* @var $this TiporesponsableController */
/* @var $model Tiporesponsable */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idTipoResponsable'); ?>
		<?php echo $form->textField($model,'idTipoResponsable'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcionTipoResponsable'); ?>
		<?php echo $form->textField($model,'descripcionTipoResponsable',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->