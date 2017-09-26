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
		if(!isset($_SESSION['nombrerresponsabe'])){
				//$_SESSION['nombreresponsable']="";
		}

		?>

		<?php 
		$form=$this->beginWidget("CActiveForm",array(  
			'htmlOptions'=>array('class'=>'form-horizontal'),     
			'method' => 'POST',
            // 'action'=> Yii::app()->createUrl('convenios/pasodos'),
             'id'=>'pasodos',
             'enableAjaxValidation'=>true,
             'enableClientValidation'=> true,
             'clientOptions'=> array(
                'validateOnSubmit'=> true,
                'validateOnChange'=> true,
                'validateOnType'=>true,
               )                
			));
			?>


			<?php 
		//campos del formulario 
			/*
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
			
			

			//echo "idpapa: ".$_SESSION['idpapa'];
			echo "<br>";
 			*/
			?>
			<?php 
				if(!isset($_SESSION['responsable_legal_unet'])){
 			       $_SESSION['responsable_legal_unet']="";
				}
			 ?>

			<body onload="asignar();">
		

			<main class="container-fluid" >
				<div class "row" >

				<!--	<div  class="nuevo col-xs-12 text-left">
						<p ><span class="glyphicon glyphicon-th-list"></span> Nuevo Convenio Marco</p>
					</div>-->
				</div>

	<div class="row">
		<aside id="pasos" class="menu_pasos col-xs-3">

			<?php if($_SESSION["isNewRecord"]==1){ ?>
			   <div class="list-group panel">
			    <a href="" class="list-group-item"><h4>Nuevo Convenio</h4></a>
			    <a href="index.php?r=convenios/create" class="list-group-item opcion text-center"><h5>Paso 1</h5></a>
			    <a href="<?php echo $this->createUrl( '/convenios/pasodos' )."&idconvenio=".$_SESSION['idconvenio']; ?>" class="list-group-item opcion_selected text-center"><h5>Paso 2</h5></a>
			    <a class="list-group-item opcion_disabled text-center"><h5>Paso 3</h5></a>
			    <a class="list-group-item opcion_disabled text-center"><h5>Paso 4</h5></a>
			    <a class="list-group-item opcion_disabled text-center" ><h5>Paso 5</h5></a>
			    
			    </div>
			    <?php }?>
			    <?php if($_SESSION["isNewRecord"]==0){ ?>
			   <div class="list-group panel">
			    <a href="" class="list-group-item"><h4>Nuevo Convenio</h4></a>
			    <a href="<?php echo $this->createUrl( '/convenios/updateConvenio' )."&id=".$_SESSION['idconvenio']; ?>" class="list-group-item opcion text-center"><h5>Paso 1</h5></a>
			  <a href="<?php echo $this->createUrl( '/convenios/pasodos' )."&idconvenio=".$_SESSION['idconvenio']; ?>" class="list-group-item opcion_selected text-center"><h5>Paso 2</h5></a>
                <a class="list-group-item opcion_disabled text-center"><h5>Paso 3</h5></a>
			    <a class="list-group-item opcion_disabled text-center"><h5>Paso 4</h5></a>
			    <a class="list-group-item opcion_disabled text-center" ><h5>Paso 5</h5></a>      
						    </div>
    <?php }?>
   
					</aside>

					<section class="datos col-xs-9">     

						<legend class="text-center header"><h4>Información de las Partes</h4></legend>  
						<h4>UNET <small><?php echo "Universidad Nacional Experimental del Táchira"; ?></small></h4>
						

						<br>
						<?php 
						if(isset($_COOKIE["errorc"]))
						echo("<script>console.log('error ".$_SESSION["errorc"]."');</script>"); 
						 ?>
						<?php if(isset($_SESSION["errorc"])&&$_SESSION["errorc"]=="1"){ ?>
						<legend class="text-center header"><h4>Ingrese almenos una institucion contraparte</h4></legend>  
						<?php } ?>

				<!--		<div class="form-group">
				 	<?php //echo $form->labelEx($pasodos,'instanciaunet',array('class'=>'control-label col-sm-2')); ?>
							<div class="col-sm-9"> 
								
								<?php 
								//echo $form->dropDownList($pasodos,'instanciaunet',
								//	CHtml::listData(Dependencias::model()->findAll(), 'idDependencia', 'nombreDependencia'),
								//	array('class'=>'form-control input-sm'),
								//	array('options' => array($_SESSION['instanciaunet']=>array('selected'=>true)),'value'=>$_SESSION['instanciaunet'])
								//	);
									
									?>
									<?php //echo $form->error($pasodos,'instanciaunet'); ?>
								</div>
							</div>

		<div class="row">
			<?php //echo $form->labelEx($pasodos,"responsable_legal_unet",array('class'=>'col-md-3')); ?>
			<?php //echo $form->textField($pasodos,"responsable_legal_unet",array('size'=>60,'maxlength'=>200)); ?>
			<?php //echo $form->error($pasodos,"responsable_legal_unet"); ?>
		</div> -->
		<!-- ************************************** BUSQUEDA AUTOCOMPLETADA ******** RESPONSABLE LEGAL UNET*************************** -->
		<div class="form-group">
			<?php echo $form->labelEx($pasodos,'responsable_legal_unet',array('class'=>'control-label col-sm-2')); ?>
			<div class="col-sm-9">
				<?php
			  echo $form->TextField($pasodos,'responsable_legal_unet',array()); // Campo oculto para guardar el ID de la persona seleccionada

			  $this->widget('zii.widgets.jui.CJuiAutoComplete',
			  	array(
			    'name'=>'apellidos_nombres', // Nombre para el campo de autocompletar
			    'model'=>$responsable,
			    'value'=>$responsable->isNewRecord ? $_SESSION["nombreresponsablelegal"] : $responsable->primerApellidoResponsable.' '.$responsable->primerNombreResponsable,
			    'source'=>$this->createUrl('Convenios/autocompleteL'), // URL que genera el conjunto de datos
			    'options'=> array(
			    	'showAnim'=>'fold',
			    	'size'=>'30',
			      'minLength'=>'3', // Minimo de caracteres que hay que digitar antes de relizar la busqueda
			      'select'=>"js:function(event, ui) { 
			      	$('#PasodosForm_responsable_legal_unet').val(ui.item.id); // HTML-Id del campo
			      		document.cookie='seleccion=1'; 
			      }"
			      ),
			    'htmlOptions'=> array(
			    	'size'=>60,
			    	'value'=> '1',
			    	'name'=>'1',
			    	'class'=>'form-control input-sm',
			    	'onblur'=>'pruebafocus(1)',
			    	'onclick'=>'institucion_unet()',

			    	//'placeholder'=>'Buscar responsable...',
			   //  'title'=>'Indique el nombre del responsable.'
			    	),
			    ));  
			    ?>
			    <?php echo $form->error($pasodos,'responsable_legal_unet'); ?>
			    <div id="MensajeAjax"> </div>

			</div>    
			 <div class="text-left col-sm-1"><a href="#" data-toggle="modal" data-target="#miventana3" onclick="institucion_unet()">
			    	<span class="glyphicon glyphicon-plus"></span>
			    </a></div>
		</div>


		<!-- ************************************************************************************************************* -->

		<!-- ************************************** BUSQUEDA AUTOCOMPLETADA ******** RESPONSABLE CONTACTO UNET*************************** -->
		<div class="form-group">
			<?php echo $form->labelEx($pasodos,'responsable_contacto_unet',array('class'=>'control-label col-sm-2')); ?>
			<div class="col-sm-9">
				<?php
			  echo $form->TextField($pasodos,'responsable_contacto_unet',array()); // Campo oculto para guardar el ID de la persona seleccionada
			  $this->widget('zii.widgets.jui.CJuiAutoComplete',
			  	array(
			    'name'=>'apellidos_nombres1', // Nombre para el campo de autocompletar
			    'model'=>$responsable,
			    'value'=>$responsable->isNewRecord ? $_SESSION["nombreresponsablecontacto"] : $responsable->primerApellidoResponsable.' '.$responsable->primerNombreResponsable,
			    'source'=>$this->createUrl('Convenios/autocompleteC'), // URL que genera el conjunto de datos
			    'options'=> array(
			    	'showAnim'=>'fold',
			    	'size'=>'30',
			      'minLength'=>'3', // Minimo de caracteres que hay que digitar antes de relizar la busqueda
			      'select'=>"js:function(event, ui) { 
			      	$('#PasodosForm_responsable_contacto_unet').val(ui.item.id); // HTML-Id del campo
			      	document.cookie='seleccion=1'; 
			      }"
			      ),
			    'htmlOptions'=> array(
			    	'size'=>60,
			    	'onclick'=>'institucion_unet()',
			    	'placeholder'=>'Buscar responsable...',
			    	'class'=>'form-control input-sm',
			    	'onblur'=>'pruebafocus(2)',
			     //'title'=>'Indique el nombre del responsable.'
			    	),
			    ));  
			    ?>
			    <?php echo $form->error($pasodos,'responsable_contacto_unet'); ?>
			     <div id="MensajeAjax1"> </div>
			    
			</div>
		<div class="text-left col-sm-1"><a href="#" data-toggle="modal" data-target="#miventana3" onclick="institucion_unet()">
			    	<span class="glyphicon glyphicon-plus"></span>
		</a></div>
		</div>
		
	
		<!-- ************************************************************************************************************* -->
		<br>
		<h4>Contraparte</h4>

		<div class="form-group">
			<?php echo $form->labelEx($pasodos,'institucion',array('class'=>'control-label col-sm-2')); ?>
			<div class="col-sm-9">
			<?php echo $form->dropDownList($pasodos,'institucion',CHtml::listData(Instituciones::model()->findAll( array(
                      'condition' => 'idInstitucion != :valor',
                      'params'    => array(':valor' => 6)
                  )), 'idInstitucion', 'nombreInstitucion'),array('class'=>'form-control input-sm')); ?>
			<?php echo $form->error($pasodos,'institucion'); ?>
			
			</div>
			<div class="text-left col-sm-1"><a href="#" data-toggle="modal" data-target="#miventana2">
				<span class="glyphicon glyphicon-plus"></span>
			</a></div>
		</div>


		<!--****************************************************** BUSQUEDA AUTO-COMPLETADA RESPONSABLE LEGAL CONTRAPARTE******************* -->
			<div class="form-group">
			<?php echo $form->labelEx($pasodos,'responsable_legal_contraparte',array('class'=>'control-label col-sm-2')); ?>
			<div class="col-sm-9">
			<?php
			  echo $form->TextField($pasodos,'responsable_legal_contraparte',array()); // Campo oculto para guardar el ID de la persona seleccionada
			  $this->widget('zii.widgets.jui.CJuiAutoComplete',
			  	array(
			    'name'=>'apellidos_nombres2', // Nombre para el campo de autocompletar
			    'model'=>$responsable,
			    'value'=>$responsable->isNewRecord ? '' : $responsable->primerApellidoResponsable.' '.$responsable->primerNombreResponsable,
			    'source'=>$this->createUrl('Convenios/autocompletefL'), // URL que genera el conjunto de datos
			    'options'=> array(
			    	'showAnim'=>'fold',
			    	'size'=>'30',
			      'minLength'=>'3', // Minimo de caracteres que hay que digitar antes de relizar la busqueda
			      'select'=>"js:function(event, ui) { 
			      	$('#PasodosForm_responsable_legal_contraparte').val(ui.item.id); // HTML-Id del campo
			      	document.cookie='seleccion=1'; 
			      }"
			      ),
			    'htmlOptions'=> array(
			    	'size'=>60,
			    	'placeholder'=>'Buscar responsable...',
			    	'onclick'=>'capturar_institucion()',
			    	'class'=>'form-control input-sm',
			    	'onblur'=>'pruebafocus(3)',
			     //'title'=>'Indique el nombre del responsable.'
			    	),
			    ));  
			    ?>
			    <?php echo $form->error($pasodos,'responsable_legal_contraparte'); ?>
			     <div id="MensajeAjax2"> </div>
				
				</div>
				<div class="text-righ col-sm-1"><a href="#" data-toggle="modal" data-target="#miventana3" onclick="capturar_institucion()">
					<span class="glyphicon glyphicon-plus"></span>
				</a></div>
			</div>

			<!-- ********************************************************************************************* -->
			<!--****************************************************** BUSQUEDA AUTO-COMPLETADA RESPONSABLE CONTACTO CONTRAPARTE******************* -->
			<div class="form-group">
				<?php echo $form->labelEx($pasodos,'responsable_contacto_contraparte',array('class'=>'control-label col-sm-2')); ?>
				<div class="col-sm-9">
				<?php
			  echo $form->TextField($pasodos,'responsable_contacto_contraparte',array()); // Campo oculto para guardar el ID de la persona seleccionada

			  $this->widget('zii.widgets.jui.CJuiAutoComplete',
			  	array(
			    'name'=>'apellidos_nombres3', // Nombre para el campo de autocompletar
			    'model'=>$responsable,
			    'value'=>$responsable->isNewRecord ? '' : $responsable->primerApellidoResponsable.' '.$responsable->primerNombreResponsable,
			    'source'=>$this->createUrl('Convenios/autocompletefC'), // URL que genera el conjunto de datos
			    'options'=> array(
			    	'showAnim'=>'fold',
			    	'size'=>'30',
			      'minLength'=>'3', // Minimo de caracteres que hay que digitar antes de relizar la busqueda
			      'select'=>"js:function(event, ui) { 
			      	$('#PasodosForm_responsable_contacto_contraparte').val(ui.item.id); // HTML-Id del campo
			      	document.cookie='seleccion=1'; 
			      }"
			      ),
			    'htmlOptions'=> array(
			    	'size'=>60,
			    	'placeholder'=>'Buscar responsable...',
			    	'onclick'=>'capturar_institucion()',
			    	'class'=>'form-control input-sm',
			    	'onblur'=>'pruebafocus(4)',
			     //'title'=>'Indique el nombre del responsable.'
			    	),
			    ));  
			    ?>
			    <?php echo $form->error($pasodos,'responsable_contacto_contraparte'); ?>
			     <div id="MensajeAjax3"> </div>
			    
				</div>

				<div class="text-left col-sm-1"><a href="#" data-toggle="modal" data-target="#miventana3" onclick="capturar_institucion()">
					<span class="glyphicon glyphicon-plus"></span>
				</a></div>
			</div>
			
		

			<?php 
			if(isset($_COOKIE['contra'])){
				unset($_COOKIE['contra']);

			}
				//print_r($contrapartes);
			?>	
			<br>
			<!--*************************************** BOTON PARA AGREGAR EN LA TABLA^************************************-->
			<div class="text-right"><a class="btn btn-conv" onclick="fagregar()"> <span > Agregar Contraparte</span></a></div>	
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
				if(isset($_SESSION['institucion'])){
					for ($i=1; $i <count($_SESSION['institucion']) ; $i++) {
						
						$institucion_contraparte=explode('.',$_SESSION['institucion'][$i]);	
						
						$institucion=Instituciones::model()->find('idInstitucion='.$institucion_contraparte[0]);
						$resp_legal=Responsables::model()->find('idResponsable='.$institucion_contraparte[1]);
						$resp_cont=Responsables::model()->find('idResponsable='.$institucion_contraparte[2]);

						echo '<tr id='.$i.'>';
						echo '<td>'.$institucion->nombreInstitucion.'</td>';
						echo '<td>'.$resp_legal->primerApellidoResponsable.' '.$resp_legal->primerNombreResponsable.'</td>';
						echo '<td>'.$resp_cont->primerApellidoResponsable.' '.$resp_cont->primerNombreResponsable.'</td>';
						echo '<td> <a id=b-'.$i.'-'.$institucion_contraparte[0].'.'.$institucion_contraparte[1].'.'.$institucion_contraparte[2].' onclick=eliminarfila(this.id)> <span class="glyphicon glyphicon-remove"></span> </a>';
						echo '</tr>';

					}
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
		<div class="row">
			<div class="col-sm-10"></div>
		<?php echo CHtml::submitButton("siguiente",array("class"=>'btn btn-conv',"onclick"=>'recolectar()',"name"=>'siguiente2')); ?>
		</div>

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
				<div id="MensajeInstitucion"></div>
				<!-- ***********************************************************-->
				<?php 
				$formi=$this->beginWidget("CActiveForm",array(  
								'htmlOptions'=>array('class'=>'form-horizontal'),  
								'enableClientValidation'=> true,
		                         'clientOptions'=> array(
		                            'validateOnSubmit'=> true,
		                            'validateOnChange'=> true,
		                            'validateOnType'=>true,
		                          ),                    
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
									'update'=>'#PasodosForm_institucion',
									'complete'=>'js:function(data){
				                              if(getCookie("ginstitucion")==1){
				                                  document.cookie="ginstitucion=0";
				                                   $("#MensajeInstitucion").html("");
				                                
				                                  $("#MensajeInstitucion").html("Institucion guardada con éxito cierre la pantalla modal y continue la carga");
				                                  }
				                              else{
				                                  $("#MensajeInstitucion").html("Llene todos los campos");
				                              }
				                             
				                            }',
									),array("class"=>'btn btn-conv')
								);?>
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

							
							<!--************************************************************aca  -->

							<!-- ***********************************************************-->
							<?php 
							$formr=$this->beginWidget("CActiveForm",array(  
								
				                 'method' => 'POST',
		                         'action'=> Yii::app()->createUrl('convenios/pasodos'),
		                         'id'=>'formresp',
		                         //'enableAjaxValidation'=>true,
		                         'enableClientValidation'=> true,
		                         'clientOptions'=> array(
		                            'validateOnSubmit'=> true,
		                            'validateOnChange'=> true,
		                            'validateOnType'=>true,
		                          ),
		                        //  'htmlOptions'=>array('class'=>'form-horizontal'),                  
							));
							?>
							<div id="MensajeResponsable"></div>
							<br>
							<div class="form-group">
								<?php echo $formr->labelEx($responsable,'idResponsable',array('class'=>' col-sm-2')); ?>
								<div class="col-sm-10">
									<?php echo $formr->textField($responsable,"idResponsable",array('class'=>'form-control'));?>
									<?php echo $formr->error($responsable,"idResponsable"); ?>
								</div>
							</div>
							
							<div class="col-sm-12"> <br></div>

							<?php echo $formr->labelEx($responsable,'primerNombreResponsable',array('class'=>'col-sm-6')); ?>
							<?php echo $formr->labelEx($responsable,'segundoNombreResponsable',array('class'=>'col-sm-6')); ?>

							<div class="form-group">
						
								<div class="col-sm-6">
									<?php echo $formr->textField($responsable,"primerNombreResponsable",array('class'=>'form-control'));?>
									<?php echo $formr->error($responsable,"primerNombreResponsable"); ?>
								</div>
							</div>
							
							<div class="form-group">
								
								<div class="col-sm-6">
									<?php echo $formr->textField($responsable,"segundoNombreResponsable",array('class'=>'form-control'));?>
									<?php echo $formr->error($responsable,"segundoNombreResponsable"); ?>
								</div>
							</div>
							
							<div class="col-sm-12"> <br></div>
							
							<?php echo $formr->labelEx($responsable,'primerApellidoResponsable',array('class'=>'col-sm-6')); ?>
							<?php echo $formr->labelEx($responsable,'segundoApellidoResponsable',array('class'=>'col-sm-6')); ?>
							<div class="form-group">
								
								<div class="col-sm-6">
									<?php echo $formr->textField($responsable,"primerApellidoResponsable",array('class'=>'form-control'));?>
									<?php echo $formr->error($responsable,"primerApellidoResponsable"); ?>
								</div>
							</div>
					
							<div class="form-group">
								
								<div class="col-sm-6">
									<?php echo $formr->textField($responsable,"segundoApellidoResponsable",array('class'=>'form-control'));?>
									<?php echo $formr->error($responsable,"segundoApellidoResponsable"); ?>
								</div>
							</div>
							
							<div class="col-sm-12"> <br></div>
							
							<?php echo $formr->labelEx($responsable,'telefonoResponsable',array('class'=>'control-label col-sm-6')); ?>
							<?php echo $formr->labelEx($responsable,'correoElectronicoResponsable',array('class'=>'control-label col-sm-6')); ?>

							<div class="form-group">
								
								<div class="col-sm-6">
									<?php echo $formr->textField($responsable,"telefonoResponsable",array('class'=>'form-control'));?>
									<?php echo $formr->error($responsable,"telefonoResponsable"); ?>
								</div>
							</div>
						
							<div class="form-group">
								
								<div class="col-sm-6">
									<?php echo $formr->textField($responsable,"correoElectronicoResponsable",array('class'=>'form-control'));?>
									<?php echo $formr->error($responsable,"correoElectronicoResponsable"); ?>
								</div>
							</div>
						
						<div class="col-sm-12"> <br></div>

						<?php echo $formr->labelEx($responsable,'dependencias_idDependencia',array('class'=>'control-label col-sm-6')); ?>
						<?php echo $formr->labelEx($responsable,'tipoResponsable_idTipoResponsable',array('class'=>'control-label col-sm-6')); ?>
							<div class="form-group">


								<div class="col-sm-6">
								<?php echo $formr->dropDownList($responsable,'dependencias_idDependencia',CHtml::listData(Dependencias::model()->findAll(), 'idDependencia', 'nombreDependencia'),array('class'=>'form-control')); ?>
								<?php echo $formr->error($responsable,'dependencias_idDependencia'); ?>
								</div>
							</div>
							<br>
							<div class="row">
								
								<div class="col-sm-5">
								<?php echo $formr->dropDownList($responsable,'tipoResponsable_idTipoResponsable',CHtml::listData(Tiporesponsable::model()->findAll(), 'idTipoResponsable', 'descripcionTipoResponsable'),array('class'=>'form-control')); ?>
								<?php echo $formr->error($responsable,'tipoResponsable_idTipoResponsable'); ?>
								</div>
							</div>
							
							<div class="col-sm-12"> <br></div>
							<?php 
							if(isset($_COOKIE['cookinst'])){
								$responsable->instituciones_idInstitucion=$_COOKIE['cookinst'];
							}
							?>

							<div class="col-sm-6 text-left">	
							<!--	<button  type="button" class="btn btn-conv" data-dismiss="modal"> Cerrar</button>-->
							</div>
								

							<div class="col-sm-6 text-right">
								
								<?php 
									echo CHtml:: ajaxSubmitButton(
										'Guardar', array('convenios/guardarresponsable'),array(
										'update'=>'#oculto',
										'complete'=>'js:function(data){
												
											if(getCookie("gresponsable")==3){
														  $("#MensajeResponsable").html("");
														  $("#MensajeResponsable").html("<font color=\'red\'> Correo electronico ya existe");
														
				                              	  }
				                            if(getCookie("gresponsable")==0){
				                            		  $("#MensajeResponsable").html("");
				                                  	$("#MensajeResponsable").html("<font color=\'red\'> Cedula ya se encuentra registrada");
				                                  	
				                              	  }

				                              if(getCookie("gresponsable")==1){
				                                  
				                                   $("#MensajeResponsable").html("");
				                                
				                                  $("#MensajeResponsable").html("<font color=\'green\'> Responsable guardado con éxito cierre la pantalla modal y continue la carga");
				                               }
				                           document.cookie="gresponsable=0";
				                         
				                            }',
									),array("class"=>'btn btn-conv')
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
				//$value=0;
				//$value1="";
				//setcookie("nrofila", $value);
				?>


				<script>

				function recolectar(){

					var respl=document.getElementById("apellidos_nombres");
					//document.cookie="responsable_legal_unet="+respl.value;
					var respc=document.getElementById("apellidos_nombres1");
					//document.cookie="responsable_contacto_unet="+respc.value;
					document.cookie="accion=1"
				
				}
				
				 function asignar(){


        		 	if(getCookie("contra")==""&&getCookie("accion")!=""){
						alert("Introduzca una institución Contraparte")
					}
        
         		 	var resp=document.getElementById("PasodosForm_responsable_legal_unet");
         		 	var respc=document.getElementById("PasodosForm_responsable_contacto_unet");
         			
         		 	var resp_legal_contraparte=document.getElementById("PasodosForm_responsable_legal_contraparte");
         		 	var resp_contacto_contraparte=document.getElementById("PasodosForm_responsable_contacto_contraparte");

         		 	resp.value=getCookie("responsable_legal_unet");
         		    respc.value=getCookie("responsable_contacto_unet");

         		    resp_legal_contraparte.value=getCookie("responsable_legal_contraparate");
         		    resp_contacto_contraparte.value=getCookie("responsable_contacto_contraparate");


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

					if(respl==""||respc==""){
						alert("Debe llenar los Responsables de la contraparte")
					}
					else{
							//realizando validación de institución repetida. 
							
							var bandera=0;
							var cookaux=getCookie("contra");
							var auxcontra=cookaux.split("-");
							
							for(var j=0; j<auxcontra.length; j++){
								var auxdetallado=auxcontra[j].split(".");
								for(var i=0; i<auxdetallado.length;i++){
									if(valselc==auxdetallado[0]){
										alert("Institución repetida");
										var resplc=document.getElementById("apellidos_nombres2");
				         				var respcc=document.getElementById("apellidos_nombres3")

				         				resplc.value="";
				         				respcc.value="";
										bandera=1;
										break;
									}
								}
								if(bandera==1)
									break;
							 }
							
				if(bandera==0){

							btn1.innerHTML="<span class='glyphicon glyphicon-remove'></span>";
					//obtenienod cookie con nro de fila actual 
							nombreboton=getCookie("nrofila");
					//auentado uno a la fila<span class='glyphicon glyphicon-remove'></span>
							nombreboton++;
					//asignano el nro a la fila
							tr1.setAttribute("id",nombreboton);
					//asignando el nuevo nuero actual al cookie
							document.cookie="nrofila="+nombreboton;
					//asignando id al boton
					//asignando id al boton relacioinado con la fila 
							var nomb="b-"+nombreboton+"-"+valselc+"."+respl_id+"."+respc_id;
							//alert(nomb);
							
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
							console.log(getCookie("contra"));
							//limpiando campos 

							 	var resplc=document.getElementById("apellidos_nombres2");
				         		var respcc=document.getElementById("apellidos_nombres3") 	

				         		resplc.value="";
				         		respcc.value="";

				}//if de bandera si la institución no es repetida. 
         	}//else de campos no vacios
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
			console.log(getCookie("contra"));


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
		function institucion_unet(){
				var valselc=6;
				document.cookie="cookinst="+valselc;
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

		function pruebafocus(numero){
			

			
			var url= '<?php echo Yii::app()->createUrl("convenios/validacionautocomplete"); ?>'
			var inicio="hola";
			
			if(numero==1){
			var widget=document.getElementById("apellidos_nombres").value;
			var oculto=document.getElementById("PasodosForm_responsable_legal_unet").value;
			}
			if(numero==2)
			var widget=document.getElementById("apellidos_nombres1").value;
			if(numero==3)
			var widget=document.getElementById("apellidos_nombres2").value;
			if(numero==4)
			var widget=document.getElementById("apellidos_nombres3").value;

			if(widget==""||widget==" "){
			
			}

			$.ajax({

			type:"post",
			url: url,
			data:{ oculto:oculto,widget:widget},
			success:function(datos){

				var arreglo=datos.split(" ");
				var elementos=datos.length;
//reviandooo
   				//document.getElementById("MensajeAjax").innerHTML="Elementos "+elementos;

   				if(elementos<11){
   					if(numero==1){
   					document.getElementById("PasodosForm_responsable_legal_unet").value=datos;
   					var pmens=document.getElementById("MensajeAjax");
   					pmens.innerHTML=" ";

   					}
   					if(numero==2){
   					document.getElementById("PasodosForm_responsable_contacto_unet").value=datos;	
   					var pmens=document.getElementById("MensajeAjax1");
   					pmens.innerHTML=" ";

   					}
   					if(numero==3){
   					document.getElementById("PasodosForm_responsable_legal_contraparte").value=datos;	
   					var pmens=document.getElementById("MensajeAjax2");
   					pmens.innerHTML=" ";

   					}
   					if(numero==4){
   					document.getElementById("PasodosForm_responsable_contacto_contraparte").value=datos;
   					var pmens=document.getElementById("MensajeAjax3");
   					pmens.innerHTML=" ";
	
   					}
   				}
   				else{
   					if(numero==1){
   						//si no selecciono un elemento de la lista autocompletada... borre el campo y muestre el mensaje 
   						if(getCookie("seleccion")==0){
   						document.getElementById("PasodosForm_responsable_legal_unet").value="";
   						document.getElementById("MensajeAjax").innerHTML=datos;/*+" "+getCookie("seleccion")+" "+elementos;*/
   						}
   						else{
   							//reiniciando variable seleccion
   							var nuevo=0;
							document.cookie="seleccion="+nuevo;   
							if(elementos==78){
								document.getElementById("PasodosForm_responsable_legal_unet").value="";
								document.getElementById("MensajeAjax").innerHTML=datos;/*+" "+getCookie("seleccion")+" "+elementos;*/
   							}
   						}			
   					}
   					if(numero==2){
   						if(getCookie("seleccion")==0){
   							document.getElementById("PasodosForm_responsable_contacto_unet").value="";
   							document.getElementById("MensajeAjax1").innerHTML=datos;
   						}
   						else{

   							var nuevo=0;
							document.cookie="seleccion="+nuevo;   
							if(elementos==78){
								document.getElementById("PasodosForm_responsable_contacto_unet").value="";
								document.getElementById("MensajeAjax1").innerHTML=datos;/*+" "+getCookie("seleccion")+" "+elementos;*/
   							}
   						}
   					}
   					if(numero==3){
   						if(getCookie("contra").length==0&&getCookie("seleccion")==0){
   							document.getElementById("PasodosForm_responsable_legal_contraparte").value="";
   							document.getElementById("MensajeAjax2").innerHTML=datos;/*+" "+getCookie("contra").length;*/
   						}	
   						else{
   							var nuevo=0;
							document.cookie="seleccion="+nuevo;
							if(elementos==78){
								document.getElementById("PasodosForm_responsable_legal_contraparte").value="";
								document.getElementById("MensajeAjax2").innerHTML=datos;/*+" "+getCookie("seleccion")+" "+elementos;*/
							}
   						}
   					}
   					if(numero==4){
   						if(getCookie("contra").length==0&&getCookie("seleccion")==0){
   							document.getElementById("PasodosForm_responsable_contacto_contraparte").value="";
   							document.getElementById("MensajeAjax3").innerHTML=datos;/*+" "+getCookie("contra").length;	*/
   						}
   						else{
   							var nuevo=0;
							document.cookie="seleccion="+nuevo;
							if(elementos==78){
								document.getElementById("PasodosForm_responsable_contacto_contraparte").value="";
								document.getElementById("MensajeAjax3").innerHTML=datos;/*+" "+getCookie("seleccion")+" "+elementos;*/
							}
   						}
   					}
   				} 			
   
			}

});

		}
		</script>