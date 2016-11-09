<?php 
	$form=$this->beginWidget("CActiveForm");
 ?>
<?php if(isset($_COOKIE['aportes'])){
		//	echo " cookie ";
		   //echo $_COOKIE['aportes'];
		   $_SESSION['aporte']=explode('-',$_COOKIE['aportes']);	
		   //echo " Variable de Sesion ";
		 //  print_r($_SESSION['aporte']) ;
		}
		 ?>

<?php 
echo "<br>";
	 		/*	echo "id_convenio: ".$_SESSION['idconvenio'];
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
				if($_SESSION['fecha_acta']==""){
					echo "no hay fecha de acta";
				}
				echo "<br>";
				echo "url_acta ".$_SESSION['url_acta'];
				//variales del paso cuatro 
				echo "<br>";
				echo "PASO CUATRO";
				echo "<br>";
				if(isset($_SESSION['aporte'])){
				
					print_r($_SESSION['aporte']) ;
					echo count($_SESSION['aporte']);
				}*/

 ?>
 <!--<?php //echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Save');  ?>-->
 <main class="container-fluid">
        <div class "row">
            
            <div  class="nuevo col-xs-12 text-left">
                <p ><span class="glyphicon glyphicon-th-list"></span> Nuevo Convenio Marco</p>
            </div>
        </div>

<div class="row">
<aside id="pasos" class="menu_pasos col-xs-3">

	<div class="list-group panel">
	    <a href="" class="list-group-item"><h4>Nuevo Convenio</h4></a>
	    <a href="index.php?r=convenios/create" class="list-group-item opcion text-center"><h5>Paso 1</h5></a>
	    <a href="<?php echo $this->createUrl( '/convenios/pasodos' )."&idconvenio=".$_SESSION['idconvenio']; ?>" class="list-group-item opcion text-center"><h5>Paso 2</h5></a>
	    <a href="<?php echo $this->createUrl( '/convenios/pasotres' )."&idconvenio=".$_SESSION['idconvenio']; ?>" class="list-group-item opcion text-center"><h5>Paso 3</h5></a>
	    <a href="<?php echo $this->createUrl( '/convenios/pasocuatro' )."&idconvenio=".$_SESSION['idconvenio']; ?>" class="list-group-item opcion text-center"><h5>Paso 4</h5></a>
	    <a href="<?php echo $this->createUrl( '/convenios/pasocinco' )."&idconvenio=".$_SESSION['idconvenio']; ?>" class="list-group-item opcion text-center" ><h5>Paso 5</h5></a>
	    
	   </div>
            
                  		<!--<ul id="navi">
							<li><a href="index.php?r=convenios/create" class="text-center">Paso 1</a></li>
							<li><a href="<?php //echo $this->createUrl( '/convenios/pasodos' )."&idconvenio=".$_SESSION['idconvenio']; ?>" class="text-center" >Paso 2</a></li>
							<li><a href="<?php //echo $this->createUrl( '/convenios/pasotres' )."&idconvenio=".$_SESSION['idconvenio']; ?>" class="text-center">Paso 3</a></li>
							<li><a href="<?php //echo $this->createUrl( '/convenios/pasocuatro' )."&idconvenio=".$_SESSION['idconvenio']; ?>"  class="text-center">Paso 4</a></li>
							<li><a href="<?php //echo $this->createUrl( '/convenios/pasocinco' )."&idconvenio=".$_SESSION['idconvenio']; ?>"  class="text-center">Paso 5</a></li>

						</ul>-->
                    
                
            </aside>

            

<section class="datos col-xs-9">    

<div class="row">
	<div  class="nuevo col-md-12 text-left">
		 <h4>Convenio: <span><?php echo $_SESSION['nombreconvenio']; ?></span></h4>
	</div>
 </div>
 
 <div id="Mostrar" class="list-group panel">
 	
 	<a href="#demo1" class="list-group-item opcion" data-toggle="collapse"><h4>Datos generales del Convenio<span class="glyphicon glyphicon-plus-sign pull-right"></span></h4></a>
 	<div class="collapse" id="demo1">
 		<div class="list-group-item">
			<ul>
				<?php 
				$tipo=Dependencias::model()->find('idDependencia='.$_SESSION['dependenciaconvenio']);
				$dependencia=Dependencias::model()->find('idDependencia='.$_SESSION['dependenciaconvenio']);
				$estado=Estadoconvenios::model()->find('idEstadoConvenio='.$_SESSION['estado']);
				$clasificacion=Clasificacionconvenios::model()->find('idClasificacionConvenio='.$_SESSION['clasificacion']);
				$tipo=Tipoconvenios::model()->find('idTipoConvenio='.$_SESSION['tipo']);
				 ?>
				<li>Tipo: <small><?php echo $tipo->descripcionTipoConvenio?></small></li>
				<li>Objetivo: <small><?php echo $_SESSION['objetivo']?></small></li>
				<li>Fecha de Inicio: <small><?php echo $_SESSION['fechainicioconvenio']?></small></li>
				<li>Fecha de Finalización: <small><?php echo $_SESSION['fechacaducidadconvenio']?></small></li>
				<li>Dependencia <small><?php echo $dependencia->nombreDependencia?></small></li>
				<li>Estado Inicial  <small><?php echo $estado->nombreEstadoConvenio ?></small></li>
				<li>Clasificacion  <small><?php echo $clasificacion->nombreClasificacionConvenio?></small></li>
				<li>Alcance  <small><?php echo $_SESSION['alcance']?></small></li>
			</ul>	
		</div>
 	</div>
<a href="#demo2" class="list-group-item opcion" data-toggle="collapse"><h4>Datos de la Contraparte<span class="glyphicon glyphicon-plus-sign pull-right"></span></h4></a>
	<div class="collapse" id="demo2">
 		<div class="list-group-item">
			<ul>
				<?php 
				$instancia_unet=Dependencias::model()->find('idDependencia='.$_SESSION['instanciaunet']);
				$responsable_legal=Responsables::model()->find('idResponsable='.$_SESSION['responsable_legal_unet']);
				$responsable_contacto=Responsables::model()->find('idResponsable='.$_SESSION['responsable_contacto_unet']);
				;
				 ?>
				<li>Instancia Unet: <small><?php echo $instancia_unet->nombreDependencia?></small></li>
				<li>Responsable Legal Unet: <small><?php echo $responsable_legal->primerApellidoResponsable." ".$responsable_legal->primerNombreResponsable?></small></li>
				<li>Responsable Contacto Unet: <small><?php echo $responsable_contacto->primerApellidoResponsable." ".$responsable_legal->primerNombreResponsable?></small></li>
				<br>
				<li> Datos de la Contraparte </li>

				<div class="table-responsive">
				<table class="table table-bordered" id="tablai">
				<thead>
					<tr>
						<th>Insttitucion</th>
						<th>Responsable legal</th>
						<th>Responsable Contacto</th>

					</tr>
				</thead>
				<br>
				<tbody id="bodyt">

				<?php if(isset($_SESSION['institucion'])){
					for ($i=1; $i <count($_SESSION['institucion']) ; $i++) {
						
						$institucion_contraparte=explode('.',$_SESSION['institucion'][$i]);	
						
						$institucion=Instituciones::model()->find('idInstitucion='.$institucion_contraparte[0]);
						$resp_legal=Responsables::model()->find('idResponsable='.$institucion_contraparte[1]);
						$resp_cont=Responsables::model()->find('idResponsable='.$institucion_contraparte[2]);

						echo '<tr id='.$i.'>';
						echo '<td>'.$institucion->nombreInstitucion.'</td>';
						echo '<td>'.$resp_legal->primerApellidoResponsable.' '.$resp_legal->primerNombreResponsable.'</td>';
						echo '<td>'.$resp_cont->primerApellidoResponsable.' '.$resp_cont->primerNombreResponsable.'</td>';
						echo '</tr>';

					}
					}
				?>
					</tbody>
				</table>
			</div>
		</div>
 	</div>

	<a href="#demo3" class="list-group-item opcion" data-toggle="collapse"><h4>Acta de Intención<span class="glyphicon glyphicon-plus-sign pull-right"></span></h4></a>
 	<div class="collapse" id="demo3">
 		<div class="list-group-item">
			<ul>
				
				<li>Nro de Acta de Intención : <small><?php echo $_SESSION['nro_acta']?></small></li>
				<li>Fecha de Acta de Intención: <small><?php echo $_SESSION['fecha_acta']?></small></li>
				<li>URL (Archivo) Acta de intención : <small><?php echo $_SESSION['url_acta']?></small></li>
			
			</ul>	
		</div>
 	</div>
<a href="#demo4" class="list-group-item opcion" data-toggle="collapse"><h4>Aportes del Convenio<span class="glyphicon glyphicon-plus-sign pull-right"></span></h4></a>
 	<div class="collapse" id="demo4">
 		<div class="list-group-item">
			<ul>

				<div class="table-responsive">
				<table class="table table-bordered" id="tablai">
		      <thead>
		      <tr>
		        <th>Aporte</th>
		        <th>Moneda</th>
		        <th>Valor</th>
		        <th>Cantidad</th>
		      </tr>
		    </thead>
		  <tbody id="bodya">
			
			<?php 

		  			if(isset($_SESSION['aporte'])){
					for ($i=1; $i <count($_SESSION['aporte']) ; $i++) {	
						$aporteA=explode('.',$_SESSION['aporte'][$i]);			
						$moneda=Monedas::model()->find('idMoneda='.$aporteA[1]);
						echo '<tr id=a'.$i.'>';
						echo '<td>'.$aporteA[0].'</td>';
						echo '<td>'.$moneda->descripcionMoneda.'</td>';
						echo '<td>'.$aporteA[2].'</td>';
						echo '<td>'.$aporteA[3].'</td>';
						echo '</tr>';

					}
					}
				 ?>
		
		    </tbody>
		  </table>
			</div>
			
			</ul>	
		</div>
 	</div>


 </div>


<input class='btn btn-conv' type="submit" name="enviar" value="confirmar" >


<?php $this->endWidget(); ?>
</section>
</div><!--contenido-->
</main>