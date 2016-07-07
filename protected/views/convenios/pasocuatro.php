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
				echo "<br>";
				echo $_SESSION['nro_acta'];
				echo "<br>";
				echo $_SESSION['fecha_acta'];
				echo "<br>";
				echo $_SESSION['url_acta'];
				echo "<br>";*/
 ?>
 <div class="row">
<?php echo $form->labelEx($pasocuatro,'ventajas',array('class'=>'col-md-3')); ?>
<?php echo $form->textField($pasocuatro,'ventajas',array('style'=>'width:200px;','class'=>'col-md-5')); ?>
<?php echo $form->error($pasocuatro,'ventajas'); ?>
</div>
<?php echo "<br>"; ?>
<div class="row">
<?php echo $form->labelEx($pasocuatro,'clasiicacion',array('class'=>'col-md-3')); ?>
<?php echo $form->dropDownList($pasocuatro,'clasificacion',CHtml::listData(Clasificacionconvenios::model()->findAll(), 'idClasificacionConvenio', 'nombreClasificacionConvenio'),''); ?>
<?php echo $form->error($pasocuatro,'clasificacion'); ?>
</div>
<?php echo "<br>"; ?>
<div class="row">
<?php echo $form->labelEx($pasocuatro,'alcance',array('class'=>'col-md-3')); ?>
<?php echo $form->dropDownList($pasocuatro,'alcance',CHtml::listData(AlcanceConvenios::model()->findAll(), 'idAlcanceConvenio', 'descripcionAlcanceConvenio'),''); ?>
<?php echo $form->error($pasocuatro,'alcance'); ?>
</div>
<?php echo "<br>"; ?>
<div class="row">
<?php echo $form->labelEx($pasocuatro,'forma',array('class'=>'col-md-3')); ?>
<?php echo $form->dropDownList($pasocuatro,'forma',CHtml::listData(Formaconvenios::model()->findAll(), 'idFormaConvenio', 'descripcionFormaConvenio'),''); ?>
<?php echo $form->error($pasocuatro,'forma'); ?>
</div>
<?php echo "<br>"; ?>
<div class="row">
<?php echo $form->labelEx($pasocuatro,'actividades',array('class'=>'col-md-3')); ?>
<?php echo $form->dropDownList($pasocuatro,'actividades',CHtml::listData(Actividades::model()->findAll(), 'idActividad', 'descripcionActividad'),''); ?>
<?php echo $form->error($pasocuatro,'actividades'); ?>
</div>

<?php echo "<br>"; ?>
<div class="row">
<?php echo $form->labelEx($pasocuatro,'otras_instituciones',array('class'=>'col-md-3')); ?>
<?php echo $form->dropDownList($pasocuatro,'otras_instituciones',CHtml::listData(Instituciones::model()->findAll(), 'idInstitucion', 'nombreInstitucion'),''); ?>
<?php echo $form->error($pasocuatro,'otras_instituciones'); ?>
</div>
<br>
 <?php echo CHtml::submitButton("siguiente",array("class"=>"btn btn-primary")); ?>

<?php $this->endWidget(); ?>