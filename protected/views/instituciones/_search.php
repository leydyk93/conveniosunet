<?php
/* @var $this InstitucionesController */
/* @var $model Instituciones */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idInstitucion'); ?>
		<?php echo $form->textField($model,'idInstitucion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombreInstitucion'); ?>
		<?php echo $form->textField($model,'nombreInstitucion',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'siglasInstitucion'); ?>
		<?php echo $form->textField($model,'siglasInstitucion',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estados_idEstado'); ?>
		<?php echo $form->textField($model,'estados_idEstado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tiposInstituciones_idTipoInstitucion'); ?>
		<?php echo $form->textField($model,'tiposInstituciones_idTipoInstitucion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->