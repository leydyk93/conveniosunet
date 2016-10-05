<?php
/* @var $this TipoconveniosController */
/* @var $model Tipoconvenios */
/* @var $form CActiveForm */
?>
            <div class="well">
                <?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'tipoconvenios-form',
					'enableAjaxValidation'=>false,
					  'htmlOptions'=>array('class'=>'form-horizontal',),
				)); ?>
                    <!--<fieldset>-->
                        <legend class="text-center header"> <?php if($model->isNewRecord) { 
                        											echo "Nuevo Tipo de Convenio";
                        										}else{
                        											echo "Modificar Tipo de Convenio";
                        										}
                        									  ?>
                       </legend>
                        <div class="form-group">
                            <span class="col-md-2 col-md-offset-1 text-center"><?php echo $form->labelEx($model,'descripcionTipoConvenio'); ?></span>
                            <div class="col-md-8">
                                <?php echo $form->textField($model,'descripcionTipoConvenio',array('class'=>"form-control")); ?>
                                <?php echo $form->error($model,'descripcionTipoConvenio'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                            	<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', array('class'=>'btn btn-conv btn-lg')); ?>
                            </div>
                        </div>
                    <!--</fieldset>-->
	             <?php $this->endWidget(); ?>
            </div>
       
