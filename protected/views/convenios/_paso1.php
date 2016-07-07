<?php 
	$form=$this->beginWidget("CActiveForm");
 ?>


<?php echo $form->labelEx($pasouno,"idconvenio"); ?>
<?php echo $form->textField($pasouno,"idconvenio",array('size'=>50,'maxlength'=>50)); ?>
<?php echo $form->error($pasouno,"idconvenio"); ?>
<br>
<br>
<br>	
<?php echo $form->labelEx($pasouno,'tipo'); ?>
<?php echo $form->dropDownList($pasouno,'tipo',CHtml::listData(TipoConvenios::model()->findAll(), 'idTipoConvenio', 'descripcionTipoConvenio'),''); ?>
<?php echo $form->error($pasouno,'tipo'); ?>
<br>
<br>
<?php echo $form->labelEx($pasouno,"nombreconvenio"); ?>
<?php echo $form->textField($pasouno,"nombreconvenio",array('size'=>60,'maxlength'=>200)); ?>
<?php echo $form->error($pasouno,"nombreconvenio"); ?>
<br>
<br>
<?php echo $form->labelEx($pasouno,"fechainicio"); ?>
<?php echo $form->textField($pasouno,"fechainicio");?>
<?php echo $form->error($pasouno,"fechainicio"); ?>
<br>
<br>
<?php echo $form->labelEx($pasouno,"fechacaducidad"); ?>
<?php echo $form->textField($pasouno,"fechacaducidad");?>
<?php echo $form->error($pasouno,"fechacaducidad"); ?>
<br>	
<br>
<?php echo $form->labelEx($pasouno,"objetivo"); ?>
<?php echo $form->textField($pasouno,"objetivo");?>
<?php echo $form->error($pasouno,"objetivo"); ?>
<br>	
<br>	
<?php echo $form->labelEx($pasouno,'dependencia'); ?>
<?php echo $form->dropDownList($pasouno,'dependencia',CHtml::listData(Dependencias::model()->findAll(), 'idDependencia', 'nombreDependencia'),''); ?>
<?php echo $form->error($pasouno,'dependencia'); ?>
<br>	
<br>
Estado Inicial
<br>
<?php echo $form->labelEx($pasouno,'estado'); ?>
<?php echo $form->dropDownList($pasouno,'estado',CHtml::listData(Estadoconvenios::model()->findAll(), 'idEstadoConvenio', 'nombreEstadoConvenio'),''); ?>
<?php echo $form->error($pasouno,'estado'); ?>
<br>
<br>
<?php echo CHtml::submitButton("enviar",array("class"=>"btn btn-primary")); ?>


<?php $this->endWidget(); ?>

