<?php
/* @var $this InstitucionConveniosController */
/* @var $model InstitucionConvenios */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idInstitucionConvenio'); ?>
		<?php echo $form->textField($model,'idInstitucionConvenio',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'instituciones_idInstitucion'); ?>
		<?php echo $form->textField($model,'instituciones_idInstitucion',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'convenios_idConvenio'); ?>
		<?php echo $form->textField($model,'convenios_idConvenio',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaIncorporacion'); ?>
		<?php echo $form->textField($model,'fechaIncorporacion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->