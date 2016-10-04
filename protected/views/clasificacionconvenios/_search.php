<?php
/* @var $this ClasificacionconveniosController */
/* @var $model Clasificacionconvenios */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idClasificacionConvenio'); ?>
		<?php echo $form->textField($model,'idClasificacionConvenio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombreClasificacionConvenio'); ?>
		<?php echo $form->textField($model,'nombreClasificacionConvenio',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcionClasificacionConvenio'); ?>
		<?php echo $form->textField($model,'descripcionClasificacionConvenio',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->