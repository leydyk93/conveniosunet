<?php
/* @var $this TipoconveniosController */
/* @var $model Tipoconvenios */
/* @var $form CActiveForm */
?>

<div class="row">
 <div class="col-md-8 col-md-offset-2">
 	<div class="panel panel-default">
 		<div class="panel text-center"><h4><?php if($model->isNewRecord){ echo "Nuevo Tipo de Convenio";}else{ echo "Modificar Tipo de Convenio";} ?></h4></div>
 		<div class="panel-body text-center">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'tipoconvenios-form',
			// Please note: When you enable ajax validation, make sure the corresponding
			// controller action is handling ajax validation correctly.
			// There is a call to performAjaxValidation() commented in generated controller code.
			// See class documentation of CActiveForm for details on this.
			'enableAjaxValidation'=>false,
			 'htmlOptions'=>array('class'=>'form-inline', ),
		                        
		)); ?>
			<div class="form-group">
				<?php echo $form->labelEx($model,'descripcionTipoConvenio'); ?>
				<?php echo $form->textField($model,'descripcionTipoConvenio',array('class'=>"form-control")); ?>
				
			</div>

				<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>"btn btn-conv btn-md")); ?>

		<?php $this->endWidget(); ?>
		<?php echo $form->error($model,'descripcionTipoConvenio'); ?>
		</div>
   <p class="note text-right">Los campos con <span class="required">*</span> son obligatorios</p>
	</div>
	
  </div>
</div>





