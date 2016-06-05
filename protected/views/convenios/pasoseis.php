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
 echo "<br>";
 echo $_SESSION['alcanceconvenio'];
 echo "<br>";
echo $_SESSION['formaconvenio'];
 echo "<br>";
echo $_SESSION['idmarcoconvenio'];
 echo "<br>";


 ?>
 <!--<?php //echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Save');  ?>-->
<input type="submit" name="enviar" value="confirmar" >
<?php $this->endWidget(); ?>