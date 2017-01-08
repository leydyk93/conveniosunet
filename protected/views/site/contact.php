<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contacto';
$this->breadcrumbs=array(
	'Contacto',
);
?>

<div class="container">

<p class="hFamilia">Para mas información, dudas o sugerencias, te invitamos a comunicarte con nosotros via correo electrónico, Escribenos </p>   
</div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">

                <div class="panel-heading text-center"><h4>Contáctenos</h4></div>
                <?php $form=$this->beginWidget('CActiveForm', array(
						'id'=>'contact-form',
						'enableClientValidation'=>true,
						'clientOptions'=>array(
							'validateOnSubmit'=>true,

						),
						  'htmlOptions'=>array(
                                  'class'=>'form-horizontal',
                                ),
					)); ?>

                    <div class="panel-body text-center">
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center">Nombre</span>
                            <div class="col-md-8">
                            	<?php echo $form->textField($model,'name',array('class'=>"form-control", 'placeholder'=>'Tu nombre')); ?>
								<?php echo $form->error($model,'name'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center">Correo</span>
                            <div class="col-md-8">
                                <?php echo $form->textField($model,'email',array('class'=>"form-control", 'placeholder'=>'ejemplo@gmail.com')); ?>
								<?php echo $form->error($model,'email'); ?>
                            </div>
                        </div>

                          <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center">Asunto</span>
                            <div class="col-md-8">
                             	<?php echo $form->textField($model,'subject',array('class'=>"form-control")); ?>
								<?php echo $form->error($model,'subject'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center">Mensaje</span>
                            <div class="col-md-8">
                                	<!--<?php /*echo $form->labelEx($model,'body'); */?>-->
									<?php echo $form->textArea($model,'body',array('class'=>"form-control", 'rows'=>"7" )); ?>
									<?php echo $form->error($model,'body'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                	<?php echo CHtml::submitButton('Enviar',array('class'=>'btn btn-conv btn-lg')); ?>
                            </div>
                        </div>

                    </div>
                    
                <?php $this->endWidget(); ?>
            </div>
         
        </div>
    </div>
