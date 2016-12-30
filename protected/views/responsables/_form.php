<?php
/* @var $this ResponsablesController */
/* @var $model Responsables */
/* @var $form CActiveForm */
?>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
 		<div class="panel text-center"><h4><?php if($model->isNewRecord){ echo "Nuevo Responsable";}else{ echo "Modificar Responsable";} ?></h4></div>
 		<div class="panel-body text-center">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'responsables-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-horizontal', ),
)); ?>

	<div class="form-group">
		<div class="col-sm-4">
			<?php echo $form->labelEx($model,'primerNombreResponsable'); ?>
		</div>
		<div class="col-sm-6">
			<?php echo $form->textField($model,'primerNombreResponsable',array('class'=>"form-control")); ?>
			<?php echo $form->error($model,'primerNombreResponsable'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4">
			<?php echo $form->labelEx($model,'segundoNombreResponsable'); ?>
		</div>
		<div class="col-sm-6">
			<?php echo $form->textField($model,'segundoNombreResponsable',array('class'=>"form-control")); ?>
			<?php echo $form->error($model,'segundoNombreResponsable'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4">
			<?php echo $form->labelEx($model,'primerApellidoResponsable'); ?>
		</div>
		<div class="col-sm-6">
			<?php echo $form->textField($model,'primerApellidoResponsable',array('class'=>"form-control")); ?>
			<?php echo $form->error($model,'primerApellidoResponsable'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4">
			<?php echo $form->labelEx($model,'segundoApellidoResponsable'); ?>
		</div>
		<div class="col-sm-6">
			<?php echo $form->textField($model,'segundoApellidoResponsable',array('class'=>"form-control")); ?>
			<?php echo $form->error($model,'segundoApellidoResponsable'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4">
			<?php echo $form->labelEx($model,'correoElectronicoResponsable'); ?>
		</div>
		<div class="col-sm-6">
			<?php echo $form->textField($model,'correoElectronicoResponsable',array('class'=>"form-control")); ?>
			<?php echo $form->error($model,'correoElectronicoResponsable'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4">
		<?php echo $form->labelEx($model,'telefonoResponsable'); ?>
		</div>
		<div class="col-sm-6">
		<?php echo $form->textField($model,'telefonoResponsable',array('class'=>"form-control")); ?>
		<?php echo $form->error($model,'telefonoResponsable'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4">	
		<?php echo $form->labelEx($model,'instituciones_idInstitucion'); ?>
		</div>
		<div class="col-sm-6">
		<?php echo $form->dropDownList($model,'instituciones_idInstitucion', CHtml::listData(Instituciones::model()->findAll(),'idInstitucion','nombreInstitucion'),
                              array('class'=>'form-control input-sm')); ?>
		<?php echo $form->error($model,'instituciones_idInstitucion'); ?>
		
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4">
		<?php echo $form->labelEx($model,'dependencias_idDependencia'); ?>
		</div>
		<div class="col-sm-6">
		<?php echo $form->dropDownList($model,'dependencias_idDependencia', CHtml::listData(Dependencias::model()->findAll(),'idDependencia','nombreDependencia'),
                              array('class'=>'form-control input-sm')); ?>	
		<?php echo $form->error($model,'dependencias_idDependencia'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4">
		<?php echo $form->labelEx($model,'tipoResponsable_idTipoResponsable'); ?>
		</div>
		<div class="col-sm-6">
		<?php echo $form->dropDownList($model,'tipoResponsable_idTipoResponsable', CHtml::listData(Tiporesponsable::model()->findAll(),'idTipoResponsable','descripcionTipoResponsable'),
                              array('class'=>'form-control input-sm')); ?>		
		<?php echo $form->error($model,'tipoResponsable_idTipoResponsable'); ?>
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