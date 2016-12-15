<?php
/* @var $this TiposinstitucionesController */
/* @var $model Tiposinstituciones */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idTipoInstitucion'); ?>
		<?php echo $form->textField($model,'idTipoInstitucion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombreTipoInstitucion'); ?>
		<?php echo $form->textField($model,'nombreTipoInstitucion',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->