<?php 
	$form=$this->beginWidget("CActiveForm");
 ?>

<?php 
	           /* echo $_SESSION['idconvenio'];
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
				echo $_SESSION['estado'];
				echo "<br>";
				echo $_SESSION['tipo'];
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
				echo $_SESSION['aporte'];
				echo "<br>";
				echo $_SESSION['moneda'];
				echo "<br>";
				echo $_SESSION['aporte_valor'];
				echo "<br>";
				echo $_SESSION['presupuesto'];
				echo "<br>";
				echo $_SESSION['presupuesto_costo'];
				echo "<br>";

*/
				echo $_SESSION['idconvenio'];
				echo "<br>";
				echo $_SESSION['nombreconvenio'];
				echo "<br>";
				echo $_SESSION['fechacaducidadconvenio'];
				echo "<br>";
				echo $_SESSION['objetivo'];
				echo "<br>";
				echo $_SESSION['institucion'];
				echo "<br>";
				echo $_SESSION['url_acta'];
				echo "<br>";
				echo $_SESSION['clasificacion'];
				echo "<br>";
				echo $_SESSION['tipo'];
				echo "<br>";
				echo $_SESSION['alcance'];
				echo "<br>";
				echo $_SESSION['forma'];
				echo "<br>";
				echo $_SESSION['dependenciaconvenio'];
				echo "<br>";
				echo $_SESSION['idconvenio'];
				echo "<br>";
				echo $_SESSION['fechainicioconvenio'];
 ?>
 <!--<?php //echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Save');  ?>-->
<input type="submit" name="enviar" value="confirmar" >
<?php $this->endWidget(); ?>