<?php 
	$form=$this->beginWidget("CActiveForm");
 ?>

Este es el paso dos 
<?php 
//igualando y mostrando variables del paso aterior a modelo 
/*	$model->idConvenio=$_SESSION['idconvenio'];
	$model->nombreConvenio=$_SESSION['nombreconvenio'];
	 echo "<br>";
	 echo $model->idConvenio;
	 echo "<br>";
	 echo $model->nombreConvenio;
	 echo "<br>";*/

//campos del formulario 
	 			echo "<br>";
	 			echo $_SESSION['idconvenio'];
	 			echo "<br>";
				echo $_SESSION['nombreconvenio'];
				echo "<br>";
				echo $_SESSION['fechainicioconvenio'];
				echo "<br>";
				echo $_SESSION['fechacaducidadconvenio'];
				echo "<br>";
				echo $_SESSION['objetivo'];
				echo "<br>";
				echo $_SESSION['dependenciaconvenio'];
				echo "<br>";

?>
		<br>
		Información de las Partes
		<br>
		UNET
		<br>
		Institución: Universidad Nacional Experimental del Táchira
		<br>
		<br>
		<?php echo $form->labelEx($pasodos,'instanciaunet'); ?>
		<?php echo $form->dropDownList($pasodos,'instanciaunet',CHtml::listData(Dependencias::model()->findAll(), 'idDependencia', 'nombreDependencia'),''); ?>
		<?php echo $form->error($pasodos,'instanciaunet'); ?>
		<br>
		<br>
		<?php echo $form->labelEx($pasodos,"responsableunet"); ?>
		<?php echo $form->textField($pasodos,"responsableunet",array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($pasodos,"responsableunet"); ?>
		<br>
		<br>
		Contraparte
		<br>
		<br>
		<?php echo $form->labelEx($pasodos,'institucion'); ?>
		<?php echo $form->dropDownList($pasodos,'institucion',CHtml::listData(Instituciones::model()->findAll(), 'idInstitucion', 'nombreInstitucion'),''); ?>
		<?php echo $form->error($pasodos,'institucion'); ?>
		<br>
		<br>
		<?php echo $form->labelEx($pasodos,'instancia_contraparte'); ?>
		<?php echo $form->dropDownList($pasodos,'instancia_contraparte',CHtml::listData(Dependencias::model()->findAll(), 'idDependencia', 'nombreDependencia'),''); ?>
		<?php echo $form->error($pasodos,'instancia_contraparte'); ?>
		<br>
		<br>
		<?php echo $form->labelEx($pasodos,"responsable_contraparte"); ?>
		<?php echo $form->textField($pasodos,"responsable_contraparte",array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($pasodos,"responsable_contraparte"); ?>
		<br>
		<br>
		<?php echo CHtml::submitButton("siguiente",array("class"=>"btn btn-primary")); ?>

<?php $this->endWidget(); ?>
