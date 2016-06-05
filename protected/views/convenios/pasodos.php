<?php 
	$form=$this->beginWidget("CActiveForm");
 ?>

Este es el paso dos 
<?php 
//igualando y mostrando variables del paso aterior a modelo 
	$model->idConvenio=$_SESSION['idconvenio'];
	$model->nombreConvenio=$_SESSION['nombreconvenio'];
	 echo "<br>";
	 echo $model->idConvenio;
	 echo "<br>";
	 echo $model->nombreConvenio;
	 echo "<br>";
//campos del formulario 

?>

		<?php echo $form->labelEx($pasodos,'tipoconvenio'); ?>
		<?php echo $form->dropDownList($pasodos,'tipoconvenio',CHtml::listData( Tipoconvenios::model()->findAll(), 'idTipoConvenio', 'descripcionTipoConvenio'),''); ?>
		<?php echo $form->error($pasodos,'tipoconvenio'); ?>

		<?php echo"<br>"; ?>
		<?php echo $form->labelEx($pasodos,'fechainicioconvenio'); ?>
		<?php echo $form->textField($pasodos,'fechainicioconvenio'); ?>
		<?php echo $form->error($pasodos,'fechainicioconvenio'); ?>
		<?php echo"<br>"; ?>

		<?php echo CHtml::submitButton("siguiente",array("class"=>"btn btn-primary")); ?>

<?php $this->endWidget(); ?>
