<?php 
	$form=$this->beginWidget("CActiveForm");
 ?>

<?php 
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
				echo "<br>";
				echo $_SESSION['ventajas'];
				echo "<br>";
				echo $_SESSION['clasificacion'];
				echo "<br>";
				echo $_SESSION['alcance'];
				echo "<br>";
				echo $_SESSION['forma'];
				echo "<br>";
				echo $_SESSION['actividades'];
				echo "<br>";
				echo $_SESSION['otras_instituciones'];
				echo "<br>";
//campos del formulario 
 ?>

 <?php echo "<br>"; ?>
<?php echo $form->labelEx($pasocinco,'aporte'); ?>
<?php echo $form->dropDownList($pasocinco,'aporte',CHtml::listData(Aportes::model()->findAll(), 'idAporte', 'descripcionAporte'),''); ?>
<?php echo $form->error($pasocinco,'aporte'); ?>
<?php echo "<br>"; ?>
<?php echo $form->labelEx($pasocinco,'moneda'); ?>
<?php echo $form->dropDownList($pasocinco,'moneda',CHtml::listData(Monedas::model()->findAll(), 'idMoneda', 'descripcionMoneda'),''); ?>
<?php echo $form->error($pasocinco,'moneda'); ?>
<?php echo "<br>"; ?>
<?php echo $form->labelEx($pasocinco,'aporte_valor'); ?>
<?php echo $form->textField($pasocinco,'aporte_valor'); ?>
<?php echo $form->error($pasocinco,'aporte_valor'); ?>
<?php echo "<br>"; ?>
<?php echo $form->labelEx($pasocinco,'presupuesto'); ?>
<?php echo $form->dropDownList($pasocinco,'presupuesto',CHtml::listData(Presupuestos::model()->findAll(), 'idPresupuesto', 'descripcionPresupuesto'),''); ?>
<?php echo $form->error($pasocinco,'presupuesto'); ?>
<?php echo "<br>"; ?>
<?php echo $form->labelEx($pasocinco,'presupuesto_costo'); ?>
<?php echo $form->textField($pasocinco,'presupuesto_costo'); ?>
<?php echo $form->error($pasocinco,'presupuesto_costo'); ?>

 <?php echo CHtml::submitButton("siguiente",array("class"=>"btn btn-primary")); ?>

<?php $this->endWidget(); ?>