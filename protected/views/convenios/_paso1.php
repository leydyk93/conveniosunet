	<?php 
	$form=$this->beginWidget("CActiveForm");
 ?>


<?php echo $form->labelEx($pasouno,"idconvenio"); ?>
<?php echo $form->textField($pasouno,"idconvenio",array('size'=>50,'maxlength'=>50)); ?>
<?php echo $form->error($pasouno,"idconvenio"); ?>
<br>
<br>
<?php echo $form->labelEx($pasouno,"nombreconvenio"); ?>
<?php echo $form->textField($pasouno,"nombreconvenio",array('size'=>60,'maxlength'=>200)); ?>
<?php echo $form->error($pasouno,"nombreconvenio"); ?>
<br>
	
<?php echo CHtml::submitButton("enviar",array("class"=>"btn btn-primary")); ?>

<?php $this->endWidget(); ?>

