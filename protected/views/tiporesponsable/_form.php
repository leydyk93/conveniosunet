<?php
/* @var $this TiporesponsableController */
/* @var $model Tiporesponsable */
/* @var $form CActiveForm */
?>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
 		<div class="panel-heading text-center"><h4><?php if($model->isNewRecord){ echo "Nuevo Tipo de Responsable";}else{ echo "Modificar Tipo de Responsable";} ?></h4></div>
 		<div class="panel-body text-center">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tiporesponsable-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-inline', ),
)); ?>


	<div class="form-group">
		<?php echo $form->labelEx($model,'descripcionTipoResponsable'); ?>
		<?php echo $form->textField($model,'descripcionTipoResponsable',array('class'=>"form-control")); ?>
		<?php echo $form->error($model,'descripcionTipoResponsable'); ?>
	</div>
	
	<div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>"btn btn-conv btn-md")); ?>
	</div>

<?php $this->endWidget(); ?>
</div>
   <p class="note text-right">Los campos con <span class="required">*</span> son obligatorios</p>
	</div>
	
  </div>
</div>