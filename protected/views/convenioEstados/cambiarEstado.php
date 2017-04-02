
<div class="container">			
<div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-heading text-center"><h4>Nuevo Estado para el Convenio</h4></div>

		    <?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'convenio-estados-form',
			 'htmlOptions'=>array(
                            'class'=>'form-horizontal',
                             /*'enctype'=>'multipart/form-data'*/
                          ),

			// Please note: When you enable ajax validation, make sure the corresponding
			// controller action is handling ajax validation correctly.
			// There is a call to performAjaxValidation() commented in generated controller code.
			// See class documentation of CActiveForm for details on this.
			'enableAjaxValidation'=>false,

		)); ?>



			<?php echo $form->errorSummary($modeloE); ?>

		<div class="panel-body text-center">

			<div class="row">
				<?php echo $form->labelEx($modeloE,'estadoConvenios_idEstadoConvenio'); ?>
				<?php echo $form->textField($modeloE,'estadoConvenios_idEstadoConvenio'); ?>
				<?php echo $form->error($modeloE,'estadoConvenios_idEstadoConvenio'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($modeloE,'fechaCambioEstado'); ?>
				<?php echo $form->textField($modeloE,'fechaCambioEstado'); ?>
				<?php echo $form->error($modeloE,'fechaCambioEstado'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($modeloE,'observacionCambioEstado'); ?>
				<?php echo $form->textArea($modeloE,'observacionCambioEstado',array('rows'=>6, 'cols'=>50)); ?>
				<?php echo $form->error($modeloE,'observacionCambioEstado'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($modeloE,'dependencias_idDependencia'); ?>
				<?php echo $form->textField($modeloE,'dependencias_idDependencia'); ?>
				<?php echo $form->error($modeloE,'dependencias_idDependencia'); ?>
			</div>

			<div class="row buttons">
				<?php echo CHtml::submitButton($modeloE->isNewRecord ? 'Create' : 'Save'); ?>
			</div>
  
  </div>
                     <?php $this->endWidget(); ?>

                      </div>
            </div>
        </div>
  </div>