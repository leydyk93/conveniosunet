<?php
/* @var $this EstadosController */
/* @var $model Estados */
/* @var $form CActiveForm */
?>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
 		<div class="panel-heading text-center"><h4><?php if($model->isNewRecord){ echo "Nuevo Estado o Provincia";}else{ echo "Modificar Estado o Provincia";} ?></h4></div>
 		<div class="panel-body text-center">


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'estados-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-horizontal',),
)); ?>

	<div class="form-group">
		<div class="col-sm-4">
		<?php echo $form->labelEx($model,'paises_idPais'); ?>
		</div>
		<div class="col-sm-6">
		<?php 
				echo $form->dropDownList($model,'paises_idPais', CHtml::listData(Paises::model()->findAll(),'idPais','nombrePais'),
                              array(  
                              	'class'=>'form-control input-sm', 
                              	'empty'=>'Seleccione',
                                )
                              	);
		 ?>
		 <?php echo $form->error($model,'paises_idPais'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4">
			<?php echo $form->labelEx($model,'nombreEstado'); ?>
		</div>
		<div class="col-sm-6">
			<?php echo $form->textField($model,'nombreEstado',array('class'=>"form-control input-sm")); ?>
			<?php echo $form->error($model,'nombreEstado'); ?>
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