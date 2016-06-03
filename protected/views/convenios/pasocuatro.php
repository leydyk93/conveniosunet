<?php 
	$form=$this->beginWidget("CActiveForm");
 ?>

<?php 
echo $_SESSION['idconvenio'];
 echo "<br>";
echo $_SESSION['nombreconvenio'];
 echo "<br>";
echo $_SESSION['tipoconvenio'];
 echo "<br>";
echo $_SESSION['fechainicioconvenio'];
 echo "<br>";
echo $_SESSION['fechacaducidadconvenio'];
 echo "<br>";
echo $_SESSION['objetivoconvenio'];
 echo "<br>";
echo $_SESSION['dependenciaconvenio'];
 echo "<br>"
//campos del formulario 
 ?>
<?php echo $form->labelEx($pasocuatro,'institucionconvenio'); ?>
<?php echo $form->textField($pasocuatro,'institucionconvenio'); ?>
<?php echo $form->error($pasocuatro,'institucionconvenio'); ?>
<?php echo "<br>"; ?>
<?php echo $form->labelEx($pasocuatro,'urlconvenio'); ?>
<?php echo $form->textField($pasocuatro,'urlconvenio'); ?>
<?php echo $form->error($pasocuatro,'urlconvenio'); ?>
<?php echo "<br>"; ?>
<?php echo $form->labelEx($pasocuatro,'clasificacionconvenio'); ?>
<?php echo $form->textField($pasocuatro,'clasificacionconvenio'); ?>
<?php echo $form->error($pasocuatro,'clasificacionconvenio'); ?>
<?php echo "<br>"; ?>

 <?php echo CHtml::submitButton("siguiente",array("class"=>"btn btn-primary")); ?>

<?php $this->endWidget(); ?>