<?php
/* @var $this TipoconveniosController */
/* @var $model Tipoconvenios */
/* @var $form CActiveForm */
?>

 <div class="well">
                <?php $form=$this->beginWidget('CActiveForm', array(
					'action'=>Yii::app()->createUrl($this->route),
					'method'=>'get',
					'htmlOptions'=>array('class'=>'form-horizontal',),
				)); ?>
                    <!--<fieldset>-->
                        <legend class="text-center header">Busqueda Avanzada</legend>
                        <div class="form-group">
                            <span class="col-md-2 col-md-offset-1 text-center"><?php echo $form->label($model,'idTipoConvenio'); ?></span>
                            <div class="col-md-8">
                               
								<?php echo $form->textField($model,'idTipoConvenio',array('class'=>"form-control")); ?>
                            </div>
                        </div>

                         <div class="form-group">
                            <span class="col-md-2 col-md-offset-1 text-center"><?php echo $form->label($model,'descripcionTipoConvenio'); ?></span>
                            <div class="col-md-8">
                              	
								<?php echo $form->textField($model,'descripcionTipoConvenio',array('class'=>"form-control")); ?>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                            	<?php echo CHtml::submitButton('Search',array('class'=>'btn btn-conv btn-md')); ?>
                            </div>
                        </div>
                    <!--</fieldset>-->
	             <?php $this->endWidget(); ?>
            </div>