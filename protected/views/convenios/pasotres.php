
<?php 
	$form=$this->beginWidget("CActiveForm");
 ?>

<?php 
			/*	echo $_SESSION['idconvenio'];
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
				echo $_SESSION['instanciaunet'];
				echo "<br>";
				echo $_SESSION['responsableunet'];
				echo "<br>";
				echo $_SESSION['institucion'];
				echo "<br>";
				echo $_SESSION['instancia_contraparte'];
				echo "<br>";
				echo $_SESSION['responsable_contraparte'];
				echo "<br>";*/
//campos del formulario 
 ?>

 Acta de Intención 

<?php echo "<br>"; ?>
<?php echo "<br>"; ?>
<div class="row">
<?php echo $form->labelEx($pasotres,'nro_acta',array('class'=>'col-md-3')); ?>
<?php echo $form->textField($pasotres,'nro_acta',array('style'=>'width:200px;','class'=>'col-md-5')); ?>
<?php echo $form->error($pasotres,'nro_acta'); ?>
</div>
<?php echo "<br>"; ?>
<div class="row">
<?php echo $form->labelEx($pasotres,'fecha_acta',array('class'=>'col-md-3')); ?>
<?php echo $form->textField($pasotres,'fecha_acta',array('style'=>'width:200px;','class'=>'col-md-5')); ?>
<?php echo $form->error($pasotres,'fecha_acta'); ?>
</div>
<?php echo "<br>"; ?>
<div class="row">
<?php echo $form->labelEx($pasotres,'url_acta',array('class'=>'col-md-3')); ?>
<?php echo $form->textField($pasotres,'url_acta',array('style'=>'width:200px;','class'=>'col-md-5')); ?>
<?php echo $form->error($pasotres,'url_acta'); ?>
</div>
<?php echo "<br>"; ?>

<?php echo CHtml::submitButton("siguiente",array("class"=>"btn btn-primary")); ?>

<?php $this->endWidget(); ?>