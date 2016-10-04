<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contacto';
$this->breadcrumbs=array(
	'Contacto',
);
?>

<h1>Contáctenos</h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p>

Si tiene alguna pregunta, por favor llene el siguiente formulario para contactarnos. Gracias.
</p>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subject'); ?>
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'subject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'body'); ?>
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">Please enter the letters as they are shown in the image above.
		<br/>Letters are not case-sensitive.</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <legend class="text-center header">Contactanos</legend>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center">Nombre</span>
                            <div class="col-md-8">
                            	<?php echo $form->textField($model,'name',array('class'=>"form-control")); ?>
								<?php echo $form->error($model,'name'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center">Correo</span>
                            <div class="col-md-8">
                                <?php echo $form->textField($model,'email',array('class'=>"form-control")); ?>
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
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>