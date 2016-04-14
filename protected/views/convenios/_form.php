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

	

	<?php echo $form->errorSummary($model); ?>

<h4>Datos Generales del convenio</h4>
<form class="form-horizontal" role="form">
  <div class="form-group">
	
	<div class="row">
		<label class="control-label col-sm-2" for="idconvenio"> <?php echo $form->labelEx($model,'idConvenio'); ?></label>
		<?php echo $form->textField($model,'idConvenio',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'idConvenio'); ?>
	</div>
  </div>

  <div class="form-group">
	<div class="row">
		 <label class="control-label col-sm-2" for="nombre"><?php echo $form->labelEx($model,'nombreConvenio'); ?></label>
		<?php echo $form->textField($model,'nombreConvenio',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'nombreConvenio'); ?>
	</div>

  </div>

  <div class="form-group">

  	<div class="row">
  		<label class="control-label col-sm-2" for="fechacaducidad"><?php echo $form->labelEx($model,'fechaCaducidadConvenio'); ?></label>
		
		<?php echo $form->textField($model,'fechaCaducidadConvenio'); ?>
		<?php echo $form->error($model,'fechaCaducidadConvenio'); ?>
	</div>
  	
  </div>

  <div class="form-group">

  	<div class="row">
		<label class="control-label col-sm-2" for="objetivo"> <?php echo $form->labelEx($model,'objetivoConvenio'); ?> </label>
		<?php echo $form->textArea($model,'objetivoConvenio',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'objetivoConvenio'); ?>
	</div>
  	
  </div>

  <h4>Datos de las Partes</h4>

  <div class="form-group">
  	<div class="row">
		<label class="control-label col-sm-2" for="institucionUnet"> <?php echo $form->labelEx($model,'institucionUNET'); ?></label>
		<?php echo $form->textField($model,'institucionUNET',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'institucionUNET'); ?>
	</div>

  </div>
<h4>Información de las Intención</h4>
  <div class="form-group" >
  	<div class="row">
		<label class="control-label col-sm-2" for="urlConvenio"><?php echo $form->labelEx($model,'urlConvenio'); ?></label>
		<?php echo $form->textField($model,'urlConvenio',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'urlConvenio'); ?>
	</div>

  </div>

    <div class="form-group" >
  	<div class="row">
		<label class="control-label col-sm-2" for="clasificacionConvenio"><?php echo $form->labelEx($model,'clasificacionConvenios_idTipoConvenio'); ?></label>
		<?php echo $form->dropDownList($model,'clasificacionConvenios_idTipoConvenio',CHtml::listData( Clasificacionconvenios::model()->findAll(), 'idClasificacionConvenio', 'nombreClasificacionConvenio'),''); ?>
		<?php echo $form->error($model,'clasificacionConvenios_idTipoConvenio'); ?>
	</div>

  </div>

  <div class="form-group" >
  	<div class="row">
		<label class="control-label col-sm-2" for="tipoConvenio"><?php echo $form->labelEx($model,'tipoConvenios_idTipoConvenio'); ?></label>
		
		<?php echo $form->textField($model,'tipoConvenios_idTipoConvenio',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'tipoConvenios_idTipoConvenio'); ?>
	</div>

  </div>

  <div class="form-group" >
  	<div class="row">
		<label class="control-label col-sm-2" for="alcanceConvenio"><?php echo $form->labelEx($model,'alcanceConvenios_idAlcanceConvenio'); ?></label>
		
		<?php echo $form->textField($model,'alcanceConvenios_idAlcanceConvenio',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'alcanceConvenios_idAlcanceConvenio'); ?>
	</div>

  </div>


  <div class="form-group" >
  	<div class="row">
		<label class="control-label col-sm-2" for="clasificacionConvenio"><?php echo $form->labelEx($model,'formaConvenios_idFormaConvenio'); ?></label>
		
		<?php echo $form->textField($model,'formaConvenios_idFormaConvenio',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'formaConvenios_idFormaConvenio'); ?>
	</div>

  </div>

  </form>

	<!--<div class="row">
		<?php /*echo $form->labelEx($model,'clasificacionConvenios_idTipoConvenio'); */?>
		<?php /*echo $form->textField($model,'clasificacionConvenios_idTipoConvenio',array('size'=>10,'maxlength'=>10));*/ ?>
		<?php /*echo $form->error($model,'clasificacionConvenios_idTipoConvenio'); */?>
	 </div>-->

<p class="note">los campos con <span class="required">*</span> son obligatorios</p>
	<div class="row">
		
	</div>

	<!--<div class="row">
		<?php /*echo $form->labelEx($model,'dependencias_idDependencia'); */?>
		<?php /*echo $form->textField($model,'dependencias_idDependencia',array('size'=>10,'maxlength'=>10));*/ ?>
		<?php /*echo $form->error($model,'dependencias_idDependencia'); */?>
	</div>-->

	<!--<div class="row">
		<?php /*echo $form->labelEx($model,'convenios_idConvenio'); */?>
		<?php /*echo $form->textField($model,'convenios_idConvenio',array('size'=>50,'maxlength'=>50));*/ ?>
		<?php /*echo $form->error($model,'convenios_idConvenio'); */?>
	</div>-->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Save', array('class'=>"btn btn-conv")); ?>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->