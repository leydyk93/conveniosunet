<?php
/* @var $this DependenciasController */
/* @var $model Dependencias */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idDependencia'); ?>
		<?php echo $form->textField($model,'idDependencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombreDependencia'); ?>
		<?php echo $form->textField($model,'nombreDependencia',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telefonoDependencia'); ?>
		<?php echo $form->textField($model,'telefonoDependencia',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->