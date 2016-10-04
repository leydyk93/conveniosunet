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
				/*
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
				echo $_SESSION['fechainicioconvenio'];*/
 ?>
 <!--<?php //echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Save');  ?>-->
 <main class="container-fluid">
        <div class "row">
            
            <div  class="nuevo col-xs-12 text-left">
                <p ><span class="glyphicon glyphicon-th-list"></span> Nuevo Convenio Marco</p>
            </div>
        </div>

<div class="row">
<aside class="menu_pasos col-xs-3">
            
                    <ul id="navi">
                        <li><a href="index.php?r=convenios/_paso1" class="text-center">Paso 1</a></li>
                        <li><a href="<?php echo $this->createUrl( '/convenios/pasodos' )."&idconvenio=".$_SESSION['idconvenio']; ?>" class="text-center" >Paso 2</a></li>
                        <li><a href="<?php echo $this->createUrl( '/convenios/pasotres' )."&idconvenio=".$_SESSION['idconvenio']; ?>" class="text-center">Paso 3</a></li>
                        <li><a href="<?php echo $this->createUrl( '/convenios/pasocuatro' )."&idconvenio=".$_SESSION['idconvenio']; ?>"  class="text-center">Paso 4</a></li>
                        <li><a href="<?php echo $this->createUrl( '/convenios/pasodos' )."&idconvenio=".$_SESSION['idconvenio']; ?>"  class="text-center">Paso 5</a></li>
                        <li><a href="#" class="text-center">Paso 6</a></li>
                        
                    </ul>
                    
                
            </aside>

<section class="datos col-xs-9">    

<input class='btn btn-conv' type="submit" name="enviar" value="confirmar" >


<?php $this->endWidget(); ?>
</section>
</div><!--contenido-->
</main>