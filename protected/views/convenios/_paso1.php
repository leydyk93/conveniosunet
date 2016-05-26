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
<form class="form-horizontal" role="form" 	>

  <div class="form-group">
	
	<div class="row">
		<label class="control-label col-sm-2" for="idconvenio"> <?php echo $form->labelEx($model,'idConvenio'); ?></label>
		<?php echo $form->textField($model,'idConvenio',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'idConvenio'); ?>
	</div>
  </div>
  	<div class="row">
		<?php echo $form->labelEx($model,'tipoConvenios_idTipoConvenio'); ?>
		<?php echo $form->dropDownList($model,'tipoConvenios_idTipoConvenio',CHtml::listData( Tipoconvenios::model()->findAll(), 'idTipoConvenio', 'descripcionTipoConvenio'),''); ?>
		<?php echo $form->error($model,'tipoConvenios_idTipoConvenio'); ?>
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
  		<label class="control-label col-sm-2" for="fechainicio"><?php echo $form->labelEx($model,'fechaInicioConvenio'); ?></label>
		
		<?php echo $form->textField($model,'fechaInicioConvenio'); ?>
		<?php echo $form->error($model,'fechaInicioConvenio'); ?>

	</div>
  </div>

  <div class="form-group">

  	<div class="row">
  		<label class="control-label col-sm-2" for="fechacaducidad"><?php echo $form->labelEx($model,'fechaCaducidadConvenio'); ?></label>
		
		<?php echo $form->textField($model,'fechaCaducidadConvenio'); ?>
		<?php echo $form->error($model,'fechaCaducidadConvenio'); ?>
	</div>
  	
  </div>

	

  </div>
	<div class="row buttons">
		 <input type="submit" value="confirmar">
		<!-- <?php /*echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Save'); */ ?> -->
	</div>



  	<p class="note">los campos con <span class="required">*</span> son obligatorios</p>


  </form> <!--FIN DEL  DEL FORMULARIO-->
	<?php $this->endWidget(); ?> <!-- 	FIN DEL WIDGET DEL FORMULARIO-->

</div><!-- form -->