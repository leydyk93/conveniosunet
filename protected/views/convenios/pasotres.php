Este es el paso tres
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

//campos del formulario 
 ?>
<?php echo "<br>"; ?>
<?php echo $form->labelEx($pasotres,'fechacaducidadconvenio'); ?>
<?php echo $form->textField($pasotres,'fechacaducidadconvenio'); ?>
<?php echo $form->error($pasotres,'fechacaducidadconvenio'); ?>
<?php echo "<br>"; ?>
<?php echo $form->labelEx($pasotres,'objetivoconvenio'); ?>
<?php echo $form->textField($pasotres,'objetivoconvenio'); ?>
<?php echo $form->error($pasotres,'objetivoconvenio'); ?>
<?php echo "<br>"; ?>
<?php echo $form->labelEx($pasotres,'dependenciaconvenio'); ?>
<?php echo $form->textField($pasotres,'dependenciaconvenio'); ?>
<?php echo $form->error($pasotres,'dependenciaconvenio'); ?>
<?php echo "<br>"; ?>

<?php echo CHtml::submitButton("siguiente",array("class"=>"btn btn-primary")); ?>

<?php $this->endWidget(); ?>