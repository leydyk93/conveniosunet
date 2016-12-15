<?php
/* @var $this EstadoconveniosController */
/* @var $model Estadoconvenios */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idEstadoConvenio'); ?>
		<?php echo $form->textField($model,'idEstadoConvenio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombreEstadoConvenio'); ?>
		<?php echo $form->textField($model,'nombreEstadoConvenio',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcionEstadoConvenio'); ?>
		<?php echo $form->textField($model,'descripcionEstadoConvenio',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->