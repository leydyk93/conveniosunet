<?php
/* @var $this InstitucionesController */
/* @var $model Instituciones */
/* @var $form CActiveForm */
?>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
 		<div class="panel text-center"><h4><?php if($model->isNewRecord){ echo "Nueva Institución";}else{ echo "Modificar Institución";} ?></h4></div>
 		<div class="panel-body text-center">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'instituciones-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	 'htmlOptions'=>array('class'=>'form-horizontal', ),
)); ?>

	<div class="form-group">
		<div class="col-sm-4">
		<?php echo $form->labelEx($model,'nombreInstitucion'); ?>
	    </div>
	    <div class="col-sm-6">
		<?php echo $form->textField($model,'nombreInstitucion',array('class'=>"form-control")); ?>
		<?php echo $form->error($model,'nombreInstitucion'); ?>
	    </div>
	</div>

	<div class="form-group">
		<div class="col-sm-4">
		<?php echo $form->labelEx($model,'siglasInstitucion'); ?>
		</div>
		<div class="col-sm-6">
		<?php echo $form->textField($model,'siglasInstitucion',array('class'=>"form-control")); ?>
		<?php echo $form->error($model,'siglasInstitucion'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4">
		<?php echo $form->labelEx($model,'estados_idEstado'); ?>
		</div>
		<div class="col-sm-6">
		<?php echo $form->dropDownList($model,'estados_idEstado', CHtml::listData(Estados::model()->findAll(),'idEstado','nombreEstado'),
                              array('class'=>'form-control input-sm'));

		 /*echo $form->textField($model,'estados_idEstado',array('class'=>"form-control"));*/ ?>
		<?php echo $form->error($model,'estados_idEstado'); ?>

		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4">
		<?php echo $form->labelEx($model,'tiposInstituciones_idTipoInstitucion'); ?>
		</div>
		<div class="col-sm-6">
		<?php echo $form->dropDownList($model,'tiposInstituciones_idTipoInstitucion', CHtml::listData(tiposinstituciones::model()->findAll(),'idTipoInstitucion','nombreTipoInstitucion'),
                              array('class'=>'form-control input-sm'));?>


		<?php echo $form->error($model,'tiposInstituciones_idTipoInstitucion'); ?>
		</div>
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