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
 echo "<br>";
 echo $_SESSION['institucionconvenio'];
 echo "<br>";
echo $_SESSION['urlconvenio'];
 echo "<br>";
echo $_SESSION['clasificacionconvenio'];
 echo "<br>"

//campos del formulario 
 ?>

 <?php echo "<br>"; ?>
<?php echo $form->labelEx($pasocinco,'alcanceconvenio'); ?>
<?php echo $form->textField($pasocinco,'alcanceconvenio'); ?>
<?php echo $form->error($pasocinco,'alcanceconvenio'); ?>
<?php echo "<br>"; ?>
<?php echo $form->labelEx($pasocinco,'formaconvenio'); ?>
<?php echo $form->textField($pasocinco,'formaconvenio'); ?>
<?php echo $form->error($pasocinco,'formaconvenio'); ?>
<?php echo "<br>"; ?>
<?php echo $form->labelEx($pasocinco,'idmarcoconvenio'); ?>
<?php echo $form->textField($pasocinco,'idmarcoconvenio'); ?>
<?php echo $form->error($pasocinco,'idmarcoconvenio'); ?>
<?php echo "<br>"; ?>

 <?php echo CHtml::submitButton("siguiente",array("class"=>"btn btn-primary")); ?>

<?php $this->endWidget(); ?>