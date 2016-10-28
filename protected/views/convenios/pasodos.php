		<?php 
		if(!isset($_SESSION['instanciaunet'])){
			$_SESSION['instanciaunet']="";
		}
		if(!isset($_SESSION['responsable_legal_unet'])){
			$_SESSION['responsable_legal_unet']="";
		}
		else{
			$pasodos->responsable_legal_unet=$_SESSION['responsable_legal_unet'];
		}
		if(!isset($_SESSION['responsable_contacto_unet'])){
			$_SESSION['responsable_contacto_unet']="";

		}
		else{
			$pasodos->responsable_contacto_unet=$_SESSION['responsable_contacto_unet'];
		}	
		if(!isset($_SESSION['responsable_legal_contraparte'])){
			$_SESSION['responsable_legal_contraparte']="";

		}
		else{
			$pasodos->responsable_legal_contraparte=$_SESSION['responsable_legal_contraparte'];
		}

		if(!isset($_SESSION['responsable_contacto_contraparte'])){
			$_SESSION['responsable_contacto_contraparte']="";

		}
		else{
			$pasodos->responsable_contacto_contraparte=$_SESSION['responsable_contacto_contraparte'];
		}
		?>

		<?php 
		$form=$this->beginWidget("CActiveForm",array(  
			'htmlOptions'=>array('class'=>'form-horizontal'),                      
			));
			?>


			<?php 
		//campos del formulario 
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

			?>
			<?php 
				if(!isset($_SESSION['responsable_legal_unet'])){
 			       $_SESSION['responsable_legal_unet']="";
				}
			 ?>

			<body onload="asignar();">
		

			<main class="container-fluid" >
				<div class "row" >

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
							<li><a href="<?php echo $this->createUrl( '/convenios/pasodos' )."&idconvenio=".$_SESSION['idconvenio']; ?>"  class="text-center">Paso 5</a></li>
							<li><a href="#" class="text-center">Paso 6</a></li>

						</ul>


					</aside>

					<section class="datos col-xs-9">     

						<legend class="text-center header"><h4>Información de las Partes</h4></legend>  

						<h4>UNET</h4>

						<p>Institución: Universidad Nacional Experimental del Táchira</p>

						<br>
						<div class="form-group">
							<?php echo $form->labelEx($pasodos,'instanciaunet',array('class'=>'control-label col-sm-2')); ?>
							<div class="col-sm-10"> 
								
								<?php 
								echo $form->dropDownList($pasodos,'instanciaunet',
									CHtml::listData(Dependencias::model()->findAll(), 'idDependencia', 'nombreDependencia'),
									array('class'=>'form-control input-sm'),
									array('options' => array($_SESSION['instanciaunet']=>array('selected'=>true)),'value'=>$_SESSION['instanciaunet'])
									);
									
									?>
									<?php echo $form->error($pasodos,'instanciaunet'); ?>
								</div>
							</div>

		<!--	<div class="row">
			<?php //echo $form->labelEx($pasodos,"responsable_legal_unet",array('class'=>'col-md-3')); ?>
			<?php //echo $form->textField($pasodos,"responsable_legal_unet",array('size'=>60,'maxlength'=>200)); ?>
			<?php //echo $form->error($pasodos,"responsable_legal_unet"); ?>
		</div> -->
		<!-- ************************************** BUSQUEDA AUTOCOMPLETADA ******** RESPONSABLE LEGAL UNET*************************** -->
		<div class="form-group">
			<?php echo $form->labelEx($pasodos,'responsable_legal_unet',array('class'=>'control-label col-sm-2')); ?>
			<div class="col-sm-10">
				<?php
			  echo $form->hiddenField($pasodos,'responsable_legal_unet',array()); // Campo oculto para guardar el ID de la persona seleccionada

			  $this->widget('zii.widgets.jui.CJuiAutoComplete',
			  	array(
			    'name'=>'apellidos_nombres', // Nombre para el campo de autocompletar
			    'model'=>$responsable,
			    'value'=>$responsable->isNewRecord ? '' : $responsable->primerApellidoResponsable.' '.$responsable->primerNombreResponsable,
			    'source'=>$this->createUrl('Convenios/autocomplete'), // URL que genera el conjunto de datos
			    'options'=> array(
			    	'showAnim'=>'fold',
			    	'size'=>'30',
			      'minLength'=>'3', // Minimo de caracteres que hay que digitar antes de relizar la busqueda
			      'select'=>"js:function(event, ui) { 
			      	$('#PasodosForm_responsable_legal_unet').val(ui.item.id); // HTML-Id del campo
			      }"
			      ),
			    'htmlOptions'=> array(
			    	'size'=>60,
			    	'value'=> '1',
			    	'name'=>'1',
			    	'class'=>'form-control input-sm',
			    	'onclick'=>'asignar()',

			    	//'placeholder'=>'Buscar responsable...',
			   //  'title'=>'Indique el nombre del responsable.'
			    	),
			    ));  
			    ?>
			    <?php echo $form->error($pasodos,'responsable_legal_unet'); ?>

			    <div class="text-right"><a href="#" data-toggle="modal" data-target="#miventana3" onclick="limpiar_institucion()">
			    	Nuevo Responsable
			    </a></div>

			</div>    
		</div>


		<!-- ************************************************************************************************************* -->

		<!-- ************************************** BUSQUEDA AUTOCOMPLETADA ******** RESPONSABLE CONTACTO UNET*************************** -->
		<div class="form-group">
			<?php echo $form->labelEx($pasodos,'responsable_contacto_unet',array('class'=>'control-label col-sm-2')); ?>
			<div class="col-sm-10">
				<?php
			  echo $form->hiddenField($pasodos,'responsable_contacto_unet',array()); // Campo oculto para guardar el ID de la persona seleccionada
			  $this->widget('zii.widgets.jui.CJuiAutoComplete',
			  	array(
			    'name'=>'apellidos_nombres1', // Nombre para el campo de autocompletar
			    'model'=>$responsable,
			    'value'=>$responsable->isNewRecord ? '' : $responsable->primerApellidoResponsable.' '.$responsable->primerNombreResponsable,
			    'source'=>$this->createUrl('Convenios/autocomplete'), // URL que genera el conjunto de datos
			    'options'=> array(
			    	'showAnim'=>'fold',
			    	'size'=>'30',
			      'minLength'=>'3', // Minimo de caracteres que hay que digitar antes de relizar la busqueda
			      'select'=>"js:function(event, ui) { 
			      	$('#PasodosForm_responsable_contacto_unet').val(ui.item.id); // HTML-Id del campo
			      }"
			      ),
			    'htmlOptions'=> array(
			    	'size'=>60,

			    	'placeholder'=>'Buscar responsable...',
			    	'class'=>'form-control input-sm',
			     //'title'=>'Indique el nombre del responsable.'
			    	),
			    ));  
			    ?>
			    <?php echo $form->error($pasodos,'responsable_contacto_unet'); ?>
			    <div class="text-right"><a href="#" data-toggle="modal" data-target="#miventana3" onclick="limpiar_institucion()">
			    	Nuevo Responsable
			    </a></div>
			</div>
		</div>


		<!-- ************************************************************************************************************* -->
		<br>
		<h4>Contraparte</h4>

		<div class="form-group">
			<?php echo $form->labelEx($pasodos,'institucion',array('class'=>'control-label col-sm-2')); ?>
			<div class="col-sm-10">
			<?php echo $form->dropDownList($pasodos,'institucion',CHtml::listData(Instituciones::model()->findAll(), 'idInstitucion', 'nombreInstitucion'),array('class'=>'form-control input-sm')); ?>
			<?php echo $form->error($pasodos,'institucion'); ?>
			<div class="text-right"><a href="#" data-toggle="modal" data-target="#miventana2">
			Nueva Institucion 
			</a></div>
			</div>

		</div>


		<!--****************************************************** BUSQUEDA AUTO-COMPLETADA RESPONSABLE LEGAL CONTRAPARTE******************* -->
			<div class="form-group">
			<?php echo $form->labelEx($pasodos,'responsable_legal_contraparte',array('class'=>'control-label col-sm-2')); ?>
			<div class="col-sm-10">
			<?php
			  echo $form->hiddenField($pasodos,'responsable_legal_contraparte',array()); // Campo oculto para guardar el ID de la persona seleccionada
			  $this->widget('zii.widgets.jui.CJuiAutoComplete',
			  	array(
			    'name'=>'apellidos_nombres2', // Nombre para el campo de autocompletar
			    'model'=>$responsable,
			    'value'=>$responsable->isNewRecord ? '' : $responsable->primerApellidoResponsable.' '.$responsable->primerNombreResponsable,
			    'source'=>$this->createUrl('Convenios/autocompletef'), // URL que genera el conjunto de datos
			    'options'=> array(
			    	'showAnim'=>'fold',
			    	'size'=>'30',
			      'minLength'=>'3', // Minimo de caracteres que hay que digitar antes de relizar la busqueda
			      'select'=>"js:function(event, ui) { 
			      	$('#PasodosForm_responsable_legal_contraparte').val(ui.item.id); // HTML-Id del campo
			      }"
			      ),
			    'htmlOptions'=> array(
			    	'size'=>60,
			    	'placeholder'=>'Buscar responsable...',
			    	'onclick'=>'capturar_institucion()',
			    	'class'=>'form-control input-sm',
			     //'title'=>'Indique el nombre del responsable.'
			    	),
			    ));  
			    ?>
			    <?php echo $form->error($pasodos,'responsable_legal_contraparte'); ?>
				<div class="text-right"><a href="#" data-toggle="modal" data-target="#miventana3" onclick="capturar_institucion()">
				Nuevo Responsable
				</a></div>
				</div>
			</div>

			<!-- ********************************************************************************************* -->
			<!--****************************************************** BUSQUEDA AUTO-COMPLETADA RESPONSABLE CONTACTO CONTRAPARTE******************* -->
			<div class="form-group">
				<?php echo $form->labelEx($pasodos,'responsable_contacto_contraparte',array('class'=>'control-label col-sm-2')); ?>
				<div class="col-sm-10">
				<?php
			  echo $form->hiddenField($pasodos,'responsable_contacto_contraparte',array()); // Campo oculto para guardar el ID de la persona seleccionada

			  $this->widget('zii.widgets.jui.CJuiAutoComplete',
			  	array(
			    'name'=>'apellidos_nombres3', // Nombre para el campo de autocompletar
			    'model'=>$responsable,
			    'value'=>$responsable->isNewRecord ? '' : $responsable->primerApellidoResponsable.' '.$responsable->primerNombreResponsable,
			    'source'=>$this->createUrl('Convenios/autocompletef'), // URL que genera el conjunto de datos
			    'options'=> array(
			    	'showAnim'=>'fold',
			    	'size'=>'30',
			      'minLength'=>'3', // Minimo de caracteres que hay que digitar antes de relizar la busqueda
			      'select'=>"js:function(event, ui) { 
			      	$('#PasodosForm_responsable_contacto_contraparte').val(ui.item.id); // HTML-Id del campo
			      }"
			      ),
			    'htmlOptions'=> array(
			    	'size'=>60,
			    	'placeholder'=>'Buscar responsable...',
			    	'onclick'=>'capturar_institucion()',
			    	'class'=>'form-control input-sm',
			     //'title'=>'Indique el nombre del responsable.'
			    	),
			    ));  
			    ?>
			    <?php echo $form->error($pasodos,'responsable_contacto_contraparte'); ?>
			    <div class="text-right"><a href="#" data-toggle="modal" data-target="#miventana3" onclick="capturar_institucion()">
				Nuevo Responsable
				</a></div>
				</div>
			</div>
			
		

			<?php 
			if(isset($_COOKIE['contra'])){
				unset($_COOKIE['contra']);

			}
				//print_r($contrapartes);
			?>	
			<br>
			<!--*************************************** BOTON PARA AGREGAR EN LA TABLA^************************************-->
			<div class="text-right"><a onclick="fagregar()"> Agregar Contraparte</a></div>	
			<br>
			

			<table class="table table-bordered" id="tablai">
				<thead>
					<tr>
						<th>Insttitucion</th>
						<th>Responsable legal</th>
						<th>Responsable Contacto</th>
						<th>Operaciones </th>
					</tr>
				</thead>
				<tbody id="bodyt">
				<?php 
					for ($i=1; $i <count($_SESSION['institucion']) ; $i++) {
						
						$institucion_contraparte=explode('.',$_SESSION['institucion'][$i]);	
						
						$institucion=Instituciones::model()->find('idInstitucion='.$institucion_contraparte[0]);
						$resp_legal=Responsables::model()->find('idResponsable='.$institucion_contraparte[1]);
						$resp_cont=Responsables::model()->find('idResponsable='.$institucion_contraparte[2]);

						echo '<tr id='.$i.'>';
						echo '<td>'.$institucion->nombreInstitucion.'</td>';
						echo '<td>'.$resp_legal->primerApellidoResponsable.' '.$resp_legal->primerNombreResponsable.'</td>';
						echo '<td>'.$resp_cont->primerApellidoResponsable.' '.$resp_cont->primerNombreResponsable.'</td>';
						echo '<td> <a id=b-'.$i.'-'.$institucion_contraparte[0].'.'.$institucion_contraparte[1].'.'.$institucion_contraparte[2].' onclick=eliminarfila(this.id)> Eliminar </a>';
						echo '</tr>';

					}

				 ?>
					<!-- ESTRUCTURA DE LA TABLA -->
			   <!--
			       <tr>
			       
			        <td>Universidad de los Andes</td>
			         <td>Pedro Perez</td>
			         <td>Carlos hernandez</td>
			         <td>Rectorado</td>
			         <td>Eliminar</td>
			      </tr>
			      <tr>
			        
			        <td>Universidad Catolica</td>
			        <td>Jose Suarez</td>
			        <td>Josue Cardenaz</td>
			        <td>Decanato de Docencia </td>
			        <td>Eliminar </td>
			      </tr>
			      <tr>
			        
			        <td>Universidad Simon Bolivar</td>
			        <td>Maria peña</td>
			        <td>jesus Medina </td>
			        <td>Departamento de Sociales </td>
			        <td>Eliminar</td>
			      </tr>
			  -->
			</tbody>
		</table>



		<br>


		<br>
		<?php echo CHtml::submitButton("siguiente",array("class"=>'btn btn-conv',"onclick"=>'recolectar()')); ?>


	</section>
</div><!--contenido-->
</main>

<?php $this->endWidget(); ?>

<!-- PANTALLA MODAL PARA AGREGAR INSTITUCION -->
<div class="modal fade" id="miventana2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog"> 
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4>Agregar Nueva Institución</h4>
			</div>            
			<div class="modal-body">
				<!--************************************************************aca  -->

				<!-- ***********************************************************-->
				<?php 
				$formi=$this->beginWidget("CActiveForm",array(  
								'htmlOptions'=>array('class'=>'form-horizontal'),                      
				));
				?>
				 
				 <div class="form-group">
					<?php echo $formi->labelEx($paises,'idPais',array('class'=>'control-label col-sm-3')); ?>

					<!--++++++++++++++++++++++++++++++++++++++++++++++++validacion para dropdownlist dependiente ++++++++++++++++++++ -->
					  <div class="col-sm-9">
					<?php echo $formi->dropDownList($paises,"idPais",
						CHtml::listData(Paises::model()->findAll(),'idPais','nombrePais'), 
						array(
							'class'=>'form-control input-sm',
							'ajax'=>array(
								'type'=>'POST',
								'url'=>CController::createurl('Convenios/Selectdos'),
								'update'=>'#'.Chtml::activeId($instituciones,'estados_idEstado')
								),'prompt'=>'Seleccione'
							)
							);?>
							<?php echo $formi->error($paises,"idPais"); ?>
					</div>
				</div>

						 <div class="form-group">
							<?php echo $formi->labelEx($instituciones,'estados_idEstado',array('class'=>'control-label col-sm-3')); ?>
							  <div class="col-sm-9">
								<?php echo $formi->dropDownList($instituciones,"estados_idEstado",array(),array('class'=>'form-control input-sm'));?>
								<?php echo $formi->error($instituciones,"estados_idEstado"); ?>
							</div>
						</div>

						 <div class="form-group">
							<?php echo $formi->labelEx($instituciones,'nombreInstitucion',array('class'=>'control-label col-sm-3')); ?>
							<div class="col-sm-9">
								<?php echo $formi->textField($instituciones,"nombreInstitucion",array('class'=>'form-control input-sm'));?>
								<?php echo $formi->error($instituciones,"nombreInstitucion"); ?>
							</div>
						</div>
						<div class="form-group">
							<?php echo $formi->labelEx($instituciones,'siglasInstitucion',array('class'=>'control-label col-sm-3')); ?>
							<div class="col-sm-9">
							<?php echo $formi->textField($instituciones,"siglasInstitucion",array('class'=>'form-control input-sm'));?>
							<?php echo $formi->error($instituciones,"siglasInstitucion"); ?>
							</div>
						</div>

						<div class="form-group">
							<?php echo $formi->labelEx($instituciones,'tiposInstituciones_idTipoInstitucion',array('class'=>'control-label col-sm-3')); ?>
							<div class="col-sm-9">
							<?php echo $form->dropDownList($instituciones,'tiposInstituciones_idTipoInstitucion',CHtml::listData(Tiposinstituciones::model()->findAll(), 'idTipoInstitucion', 'nombreTipoInstitucion'),array('class'=>'form-control ')); ?>
							<?php echo $formi->error($instituciones,"tiposInstituciones_idTipoInstitucion"); ?>
							</div>
						</div>
						<div id="oculto"></div>
						<div class="col-sm-6 text-left">
								<button  type="button" class="btn btn-conv" data-dismiss="modal"> Cerrar</button>
						</div>
						<div class="col-sm-6 text-right">
								<?php 
								echo CHtml:: ajaxSubmitButton(
								'Guardar', array('convenios/guardarinstitucion'),array(
									'update'=>'#PasodosForm_institucion'
									),array("class"=>'btn btn-conv','data-dismiss'=>'modal')
								);

								?>
						</div>
					
							<?php $this->endWidget(); ?>
						</div>

						<div class="modal-footer">
							
							
						

						</div>
					</div>
				</div>
			</div>



			<!-- PANTALLA MODAL PARA AGREGAR RESPONSABLE -->
			<div class="modal fade" id="miventana3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog"> 
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4>Agregar Nuevo Responsable</h4>
						</div>            
						<div class="modal-body">

							<p>Todo el contenido de la ventana modal</p>
							<!--************************************************************aca  -->

							<!-- ***********************************************************-->
							<?php 
							$formr=$this->beginWidget("CActiveForm",array(  
								'htmlOptions'=>array('class'=>'form-horizontal'),                      
							));
							?>

							<div class="form-group">
								<?php echo $formr->labelEx($responsable,'primerNombreResponsable',array('class'=>'control-label col-sm-3')); ?>
								<div class="col-sm-8">
									<?php echo $formr->textField($responsable,"primerNombreResponsable",array('class'=>'form-control'));?>
									<?php echo $formr->error($responsable,"primerNombreResponsable"); ?>
								</div>
							</div>
							
							<div class="form-group">
								<?php echo $formr->labelEx($responsable,'segundoNombreResponsable',array('class'=>'control-label col-sm-3')); ?>
								<div class="col-sm-8">
									<?php echo $formr->textField($responsable,"segundoNombreResponsable",array('class'=>'form-control'));?>
									<?php echo $formr->error($responsable,"segundoNombreResponsable"); ?>
								</div>
							</div>

							<div class="form-group">
								<?php echo $formr->labelEx($responsable,'primerApellidoResponsable',array('class'=>'control-label col-sm-3')); ?>
								<div class="col-sm-8">
									<?php echo $formr->textField($responsable,"primerApellidoResponsable",array('class'=>'form-control'));?>
									<?php echo $formr->error($responsable,"primerApellidoResponsable"); ?>
								</div>
							</div>
					
							<div class="form-group">
								<?php echo $formr->labelEx($responsable,'segundoApellidoResponsable',array('class'=>'control-label col-sm-3')); ?>
								<div class="col-sm-8">
									<?php echo $formr->textField($responsable,"segundoApellidoResponsable",array('class'=>'form-control'));?>
									<?php echo $formr->error($responsable,"segundoApellidoResponsable"); ?>
								</div>
							</div>
						
							<div class="form-group">
								<?php echo $formr->labelEx($responsable,'telefonoResponsable',array('class'=>'control-label col-sm-3')); ?>
								<div class="col-sm-8">
									<?php echo $formr->textField($responsable,"telefonoResponsable",array('class'=>'form-control'));?>
									<?php echo $formr->error($responsable,"telefonoResponsable"); ?>
								</div>
							</div>
						
							<div class="form-group">
								<?php echo $formr->labelEx($responsable,'correoElectronicoResponsable',array('class'=>'control-label col-sm-3')); ?>
								<div class="col-sm-8">
									<?php echo $formr->textField($responsable,"correoElectronicoResponsable",array('class'=>'form-control'));?>
									<?php echo $formr->error($responsable,"correoElectronicoResponsable"); ?>
								</div>
							</div>
						
							<div class="form-group">

								<?php echo $formr->labelEx($responsable,'dependencias_idDependencia',array('class'=>'control-label col-sm-3')); ?>
								<div class="col-sm-8">
								<?php echo $formr->dropDownList($responsable,'dependencias_idDependencia',CHtml::listData(Dependencias::model()->findAll(), 'idDependencia', 'nombreDependencia'),array('class'=>'form-control')); ?>
								<?php echo $formr->error($responsable,'dependencias_idDependencia'); ?>
								</div>
							</div>
							<br>
							<div class="row">
								<?php echo $formr->labelEx($responsable,'tipoResponsable_idTipoResponsable',array('class'=>'control-label col-sm-3')); ?>
								<div class="col-sm-8">
								<?php echo $formr->dropDownList($responsable,'tipoResponsable_idTipoResponsable',CHtml::listData(Tiporesponsable::model()->findAll(), 'idTipoResponsable', 'descripcionTipoResponsable'),array('class'=>'form-control')); ?>
								<?php echo $formr->error($responsable,'tipoResponsable_idTipoResponsable'); ?>
								</div>
							</div>
							
							<?php 
							if(isset($_COOKIE['cookinst'])){
								$responsable->instituciones_idInstitucion=$_COOKIE['cookinst'];
							}
							?>

							<div class="col-sm-6 text-left">	
								<button  type="button" class="btn btn-conv" data-dismiss="modal"> Cerrar</button>
							</div>
								

							<div class="col-sm-6 text-right">
								
								<?php 
									echo CHtml:: ajaxSubmitButton(
										'Guardar', array('convenios/guardarresponsable'),array(
										'update'=>'#oculto'
									),array("class"=>'btn btn-conv','data-dismiss'=>'modal')
									);

								?>
							</div>
							<?php $this->endWidget(); ?>	

							</div>
							<div class="modal-footer row">
								
							
							</div>
						</div>
					</div>
				</div>


				<?php 
				$value=0;
				$value1="";
				setcookie("nrofila", $value);
		//setcookie("contra",$value1);
				?>


				<script>

				function recolectar(){

					
					var respl=document.getElementById("apellidos_nombres");
					document.cookie="responsable_legal_unet="+respl.value;

					var respc=document.getElementById("apellidos_nombres1");
					document.cookie="responsable_contacto_unet="+respc.value;
					
				


				}

				 function asignar(){
        		 
        
         		 	var resp=document.getElementById("apellidos_nombres");
         		 	var respc=document.getElementById("apellidos_nombres1")
         	
         		 //	resp.innerHTML="holaaa";
         		 	resp.value=getCookie("responsable_legal_unet");
         		 	respc.value=getCookie("responsable_contacto_unet");

         		 		var selec=document.getElementById("PasodosForm_instanciaunet");
						selec.selectedIndex="2";
         	

     			   }
				function fagregar(){


					var tabla=document.getElementById("bodyt");
					var tr1=document.createElement('tr');
					var td1=document.createElement('td');
					var btn1=document.createElement('a')
					var td2=document.createElement('td');
					var td3=document.createElement('td');
					var td4=document.createElement('td');
					var td5=document.createElement('td');

					var selec=document.getElementById("PasodosForm_institucion");
					var seleci=selec.options[selec.selectedIndex].text;
					var valselc=selec.options[selec.selectedIndex].value;
					
					var nombreboton;
					var nomb;

					var respl=document.getElementById("apellidos_nombres2").value;
					var respc=document.getElementById("apellidos_nombres3").value;
				
					//var inst= document.getElementById("PasodosForm_instancia_contraparte");
					//var inst_selec=inst.options[inst.selectedIndex].text;
					//var inst_id=inst.options[inst.selectedIndex].value;

					var respl_id=document.getElementById("PasodosForm_responsable_legal_contraparte").value;
					var respc_id=document.getElementById("PasodosForm_responsable_contacto_contraparte").value;


					btn1.innerHTML="Eliminar";
			//obtenienod cookie con nro de fila actual 
					nombreboton=getCookie("nrofila");
			//auentado uno a la fila
					nombreboton++;
			//asignano el nro a la fila
					tr1.setAttribute("id",nombreboton);
			//asignando el nuevo nuero actual al cookie
					document.cookie="nrofila="+nombreboton;
			//asignando id al boton
			//asignando id al boton relacioinado con la fila 
				var nomb="b-"+nombreboton+"-"+valselc+"."+respl_id+"."+respc_id;
				alert(nomb);
				
				btn1.setAttribute("id",nomb);
				btn1.setAttribute("onclick","eliminarfila(this.id)");

			//agregando institución;
			td1.innerHTML=seleci;
			//agregando responsable legal
			td2.innerHTML=respl;
			//agregando responsable de contacto
			td3.innerHTML=respc;
			//agregando boton;
			td5.appendChild(btn1);
			


			tr1.appendChild(td1);
			tr1.appendChild(td2);
			tr1.appendChild(td3);

			tr1.appendChild(td5);
			tabla.appendChild(tr1);

			//div1.appendChild(div3);
			//div4.setAttribute("class","col-15");
			//agregando al cookie contra... la contraparte que se selecciono. 
			document.cookie="contra="+getCookie("contra")+"-"+valselc+"."+respl_id+"."+respc_id;


		}
		function eliminarfila(fila){

			var aux;
			aux=fila.split("-");
			var cookaux=getCookie("contra");
			var auxcontra= cookaux.split("-");
			//alert(aux[1]);		
			var fil=document.getElementById(aux[1]);
			fil.parentNode.removeChild(fil);

			//eliminadno valor el cookie
			document.cookie="contra= ";
			for(var j=1;j<auxcontra.length;j++){
				if(auxcontra[j]!=aux[2]){
					document.cookie="contra="+getCookie("contra")+"-"+auxcontra[j];
				}
			}

		}

		function getCookie(cname) {
			var name = cname + "=";
			var ca = document.cookie.split(';');
			for(var i = 0; i <ca.length; i++) {
				var c = ca[i];
				while (c.charAt(0)==' ') {
					c = c.substring(1);
				}
				if (c.indexOf(name) == 0) {
					return c.substring(name.length,c.length);
				}
			}
			return "";
		}

		function capturar_institucion(){

			var selec=document.getElementById("PasodosForm_institucion");
			var seleci=selec.options[selec.selectedIndex].text;
			var valselc=selec.options[selec.selectedIndex].value;
			document.cookie="cookinst="+valselc;
			//alert(valselc);

			
		}
		function limpiar_institucion(){

			document.cookie="cookinst="+" ";
			
		}
		function get_institucion(){
			alert("hola");
		}
		</script>