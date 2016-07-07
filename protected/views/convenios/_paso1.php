<?php 
	$form=$this->beginWidget("CActiveForm");
 ?>

Datos Generales del Convenio 
<br>
<br>
<div class="row">

<?php echo $form->labelEx($pasouno,"idconvenio", array('class'=>'col-md-3')); ?>
<?php echo $form->textField($pasouno,"idconvenio",array('style'=>'width:200px;','class'=>'col-md-5')); ?>
<?php echo $form->error($pasouno,"idconvenio"); ?>
</div>
<br>

<div class="row">
<?php echo $form->labelEx($pasouno,"tipo",array('class'=>'col-md-3')); ?>
<?php echo $form->dropDownList($pasouno,"tipo",CHtml::listData(TipoConvenios::model()->findAll(), 'idTipoConvenio', 'descripcionTipoConvenio'),'',array('style'=>'width:200px;','class'=>'col-md-5')); ?>
<?php echo $form->error($pasouno,"tipo"); ?>
</div>
<br>
<br>
<div class="row">
<?php echo $form->labelEx($pasouno,"nombreconvenio",array('class'=>'col-md-3')); ?>
<?php echo $form->textField($pasouno,"nombreconvenio",array('style'=>'width:200px;','class'=>'col-md-5')); ?>
<?php echo $form->error($pasouno,"nombreconvenio"); ?>
</div>
<br>
<br>
<div class="row">
<?php echo $form->labelEx($pasouno,"fechainicio",array('class'=>'col-md-3')); ?>
<?php echo $form->textField($pasouno,"fechainicio",array('style'=>'width:200px;','class'=>'col-md-5'));?>
<?php echo $form->error($pasouno,"fechainicio"); ?>
</div>
<br>
<br>
<div class="row">
<?php echo $form->labelEx($pasouno,"fechacaducidad",array('class'=>'col-md-3')); ?>
<?php echo $form->textField($pasouno,"fechacaducidad",array('style'=>'width:200px;','class'=>'col-md-5'));?>
<?php echo $form->error($pasouno,"fechacaducidad"); ?>
</div>
<br>	
<br>
<div class="row">
<?php echo $form->labelEx($pasouno,"objetivo",array('class'=>'col-md-3')); ?>
<?php echo $form->textField($pasouno,"objetivo",array('style'=>'width:200px;','class'=>'col-md-5'));?>
<?php echo $form->error($pasouno,"objetivo"); ?>
</div>
<br>	
<br>	
<div class="row">
<?php echo $form->labelEx($pasouno,'dependencia',array('class'=>'col-md-3')); ?>
<?php echo $form->dropDownList($pasouno,'dependencia',CHtml::listData(Dependencias::model()->findAll(), 'idDependencia', 'nombreDependencia'),''); ?>
<?php echo $form->error($pasouno,'dependencia'); ?>
</div>
<br>	
<br>
Estado Inicial
<br>
<br>
<div class="row">
<?php echo $form->labelEx($pasouno,'estado',array('class'=>'col-md-3')); ?>
<?php echo $form->dropDownList($pasouno,'estado',CHtml::listData(Estadoconvenios::model()->findAll(), 'idEstadoConvenio', 'nombreEstadoConvenio'),''); ?>
<?php echo $form->error($pasouno,'estado'); ?>
</div>
<br>
<br>
<?php echo CHtml::submitButton("enviar",array("class"=>"btn btn-primary")); ?>


<?php $this->endWidget(); ?>

