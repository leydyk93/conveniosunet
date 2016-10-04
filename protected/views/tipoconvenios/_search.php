<?php
/* @var $this TipoconveniosController */
/* @var $model Tipoconvenios */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idTipoConvenio'); ?>
		<?php echo $form->textField($model,'idTipoConvenio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcionTipoConvenio'); ?>
		<?php echo $form->textField($model,'descripcionTipoConvenio',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->