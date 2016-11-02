<?php 
	$form=$this->beginWidget("CActiveForm");
 ?>
<?php if(isset($_COOKIE['aportes'])){
			echo " cookie ";
		   echo $_COOKIE['aportes'];
		   $_SESSION['aporte']=explode('-',$_COOKIE['aportes']);	
		   echo " Variable de Sesion ";
		   print_r($_SESSION['aporte']) ;
		}
		 ?>

<?php 
echo "<br>";
	 			echo "id_convenio: ".$_SESSION['idconvenio'];
	 			echo "<br>";
	 			echo "tipo : ".$_SESSION['tipo'];
	 			echo "<br>";
				echo "nombre_convenio: ".$_SESSION['nombreconvenio'];
				echo "<br>";
				echo "fecha_inicio: ".$_SESSION['fechainicioconvenio'];
				echo "<br>";
				echo "fecha_caducidad: ".$_SESSION['fechacaducidadconvenio'];
				echo "<br>";
				echo "objetivo: ".$_SESSION['objetivo'];
				echo "<br>";
				echo "dependencia: ".$_SESSION['dependenciaconvenio'];
				echo "<br>";
				echo "estado: ".$_SESSION['estado'];
				echo "<br>";
				echo "clasificacion: ".$_SESSION['clasificacion'];
				echo "<br>";
				echo "alcance: ".$_SESSION['alcance'];
				echo "<br>";
				//variables del paso dos
				echo "PASO DOS ";
				echo "<br>";
				echo "instanciaunet: ".$_SESSION['instanciaunet'];
				echo "<br>";
				echo "responsable_legal_unet: ".$_SESSION['responsable_legal_unet'];
				echo "<br>";
				echo "responsable_contacto_unet: ".$_SESSION['responsable_contacto_unet'];
				echo "<br>";
				print_r($_SESSION['institucion']) ;
				echo "<br>";
			//	echo "instancia contraparte: ".$_SESSION['instancia_contraparte'];
				echo "<br>";
				echo "responsable legal contraparte: ".$_SESSION['responsable_legal_contraparte'];
				echo "<br>";
				echo "responsable contacto contraparte ".$_SESSION['responsable_contacto_contraparte'];
				//variables del paso tres 
				echo "PASO TRES";
				echo "<br>";
				echo "nro_acta ".$_SESSION['nro_acta'];
				echo "<br>";
				echo "fecha_acta ".$_SESSION['fecha_acta'];
				echo "<br>";
				echo "url_acta ".$_SESSION['url_acta'];
				//variales del paso cuatro 
				echo "<br>";
				echo "PASO CUATRO";
				echo "<br>";
				print_r($_SESSION['aporte']) ;

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
							<li><a href="index.php?r=convenios/create" class="text-center">Paso 1</a></li>
							<li><a href="<?php echo $this->createUrl( '/convenios/pasodos' )."&idconvenio=".$_SESSION['idconvenio']; ?>" class="text-center" >Paso 2</a></li>
							<li><a href="<?php echo $this->createUrl( '/convenios/pasotres' )."&idconvenio=".$_SESSION['idconvenio']; ?>" class="text-center">Paso 3</a></li>
							<li><a href="<?php echo $this->createUrl( '/convenios/pasocuatro' )."&idconvenio=".$_SESSION['idconvenio']; ?>"  class="text-center">Paso 4</a></li>
							<li><a href="<?php echo $this->createUrl( '/convenios/pasocinco' )."&idconvenio=".$_SESSION['idconvenio']; ?>"  class="text-center">Paso 5</a></li>

						</ul>
                    
                
            </aside>

            

<section class="datos col-xs-9">    

<input class='btn btn-conv' type="submit" name="enviar" value="confirmar" >


<?php $this->endWidget(); ?>
</section>
</div><!--contenido-->
</main>