<?php 
	$form=$this->beginWidget("CActiveForm");
 ?>


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
	 			/*echo "<br>";
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
*/
?>
		<br>
		Información de las Partes
		<br>
		UNET
		<br>
		Institución: Universidad Nacional Experimental del Táchira
		<br>
		<br>
		<div class="row">
		<?php echo $form->labelEx($pasodos,'instanciaunet',array('class'=>'col-md-3')); ?>
		<?php echo $form->dropDownList($pasodos,'instanciaunet',CHtml::listData(Dependencias::model()->findAll(), 'idDependencia', 'nombreDependencia'),'',array('style'=>'width:200px;','class'=>'col-md-5')); ?>
		<?php echo $form->error($pasodos,'instanciaunet'); ?>
		</div>
		<br>
		
		<div class="row">
		<?php echo $form->labelEx($pasodos,"responsableunet",array('class'=>'col-md-3')); ?>
		<?php echo $form->textField($pasodos,"responsableunet",array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($pasodos,"responsableunet"); ?>
		</div>
		<br>
	
		Contraparte
		<br>
		<br>
		<div class="row">
		<?php echo $form->labelEx($pasodos,'institucion',array('class'=>'col-md-3')); ?>
		<?php echo $form->dropDownList($pasodos,'institucion',CHtml::listData(Instituciones::model()->findAll(), 'idInstitucion', 'nombreInstitucion'),''); ?>
		<?php echo $form->error($pasodos,'institucion'); ?>
		</div>
		<br>
		<br>
		<div class="row">
		<?php echo $form->labelEx($pasodos,'instancia_contraparte',array('class'=>'col-md-3')); ?>
		<?php echo $form->dropDownList($pasodos,'instancia_contraparte',CHtml::listData(Dependencias::model()->findAll(), 'idDependencia', 'nombreDependencia'),''); ?>
		<?php echo $form->error($pasodos,'instancia_contraparte'); ?>
		</div>
		<br>
	
		<div class="row">
		<?php echo $form->labelEx($pasodos,"responsable_contraparte",array('class'=>'col-md-3')); ?>
		<?php echo $form->textField($pasodos,"responsable_contraparte",array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($pasodos,"responsable_contraparte"); ?>
		</div>
		<br>
	
		<?php echo CHtml::submitButton("siguiente",array("class"=>"btn btn-primary")); ?>

<?php $this->endWidget(); ?>
