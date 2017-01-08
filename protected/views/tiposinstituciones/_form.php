<?php
/* @var $this TiposinstitucionesController */
/* @var $model Tiposinstituciones */
/* @var $form CActiveForm */
?>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
 		<div class="panel text-center"><h4><?php if($model->isNewRecord){ echo "Nuevo Tipo de Institucion";}else{ echo "Modificar Tipo de Institucion";} ?></h4></div>
 		<div class="panel-body text-center">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tiposinstituciones-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-inline', ),
)); ?>

	<div class="form-group">
		
		<?php echo $form->labelEx($model,'nombreTipoInstitucion'); ?>
		
		
		<?php echo $form->textField($model,'nombreTipoInstitucion',array('class'=>"form-control")); ?>
		<?php echo $form->error($model,'nombreTipoInstitucion'); ?>
		
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