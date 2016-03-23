<?php
/* @var $this ConvenioController */
/* @var $model Convenio */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'cod_convenio'); ?>
		<?php echo $form->textField($model,'cod_convenio',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombre_convenio'); ?>
		<?php echo $form->textField($model,'nombre_convenio',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_creacion'); ?>
		<?php echo $form->textField($model,'fecha_creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_caducidad'); ?>
		<?php echo $form->textField($model,'fecha_caducidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'institucion_UNET'); ?>
		<?php echo $form->textField($model,'institucion_UNET',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'objetivo_covenio'); ?>
		<?php echo $form->textArea($model,'objetivo_covenio',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cod_clasificacion'); ?>
		<?php echo $form->textField($model,'cod_clasificacion',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->