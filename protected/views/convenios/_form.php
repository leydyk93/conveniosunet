<?php
/* @var $this ConveniosController */
/* @var $model Convenios */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'convenios-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

<form class="form-horizontal" role="form">
  <div class="form-group">
  	
  </div>
  </form>

	<div class="row">
		<?php echo $form->labelEx($model,'idConvenio'); ?>
		<?php echo $form->textField($model,'idConvenio',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'idConvenio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombreConvenio'); ?>
		<?php echo $form->textField($model,'nombreConvenio',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'nombreConvenio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaCaducidadConvenio'); ?>
		<?php echo $form->textField($model,'fechaCaducidadConvenio'); ?>
		<?php echo $form->error($model,'fechaCaducidadConvenio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'objetivoConvenio'); ?>
		<?php echo $form->textArea($model,'objetivoConvenio',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'objetivoConvenio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'institucionUNET'); ?>
		<?php echo $form->textField($model,'institucionUNET',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'institucionUNET'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'urlConvenio'); ?>
		<?php echo $form->textField($model,'urlConvenio',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'urlConvenio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'clasificacionConvenios_idTipoConvenio'); ?>
		<?php echo $form->dropDownList($model,'clasificacionConvenios_idTipoConvenio',CHtml::listData( Clasificacionconvenios::model()->findAll(), 'idClasificacionConvenio', 'nombreClasificacionConvenio'),''); ?>
		<?php echo $form->error($model,'clasificacionConvenios_idTipoConvenio'); ?>
	</div>

	<!--<div class="row">
		<?php /*echo $form->labelEx($model,'clasificacionConvenios_idTipoConvenio'); */?>
		<?php /*echo $form->textField($model,'clasificacionConvenios_idTipoConvenio',array('size'=>10,'maxlength'=>10));*/ ?>
		<?php /*echo $form->error($model,'clasificacionConvenios_idTipoConvenio'); */?>
	 </div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'tipoConvenios_idTipoConvenio'); ?>
		<?php echo $form->textField($model,'tipoConvenios_idTipoConvenio',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'tipoConvenios_idTipoConvenio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alcanceConvenios_idAlcanceConvenio'); ?>
		<?php echo $form->textField($model,'alcanceConvenios_idAlcanceConvenio',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'alcanceConvenios_idAlcanceConvenio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'formaConvenios_idFormaConvenio'); ?>
		<?php echo $form->textField($model,'formaConvenios_idFormaConvenio',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'formaConvenios_idFormaConvenio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dependencias_idDependencia'); ?>
		<?php echo $form->textField($model,'dependencias_idDependencia',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'dependencias_idDependencia'); ?>
	</div>

	<!--<div class="row">
		<?php /*echo $form->labelEx($model,'convenios_idConvenio'); */?>
		<?php /*echo $form->textField($model,'convenios_idConvenio',array('size'=>50,'maxlength'=>50));*/ ?>
		<?php /*echo $form->error($model,'convenios_idConvenio'); */?>
	</div>-->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->