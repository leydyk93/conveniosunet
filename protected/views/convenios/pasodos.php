	<?php 
	if(!isset($_SESSION['responsable_legal_unet'])){
    	    $_SESSION['responsable_legal_unet']="";
	}
	?>

	<?php 
	$form=$this->beginWidget("CActiveForm");
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
				<li><a href="<?php echo $this->createUrl( '/convenios/pasodos' )."&idconvenio=".$_SESSION['idconvenio']; ?>"  class="text-center">Paso 5</a></li>
				<li><a href="#" class="text-center">Paso 6</a></li>

			</ul>


		</aside>

		<section class="datos col-xs-9">     

			<h4>Información de las Partes</h4>

			<h4>UNET</h4>

			<p>Institución: Universidad Nacional Experimental del Táchira</p>

			<br>
			<div class="row">
				<?php echo $form->labelEx($pasodos,'instanciaunet',array('class'=>'col-md-3')); ?>
				<?php echo $form->dropDownList($pasodos,'instanciaunet',CHtml::listData(Dependencias::model()->findAll(), 'idDependencia', 'nombreDependencia'),'',array('style'=>'width:200px;','class'=>'col-md-5')); ?>
				<?php echo $form->error($pasodos,'instanciaunet'); ?>
			</div>
			<br>

	<!--	<div class="row">
		<?php //echo $form->labelEx($pasodos,"responsable_legal_unet",array('class'=>'col-md-3')); ?>
		<?php //echo $form->textField($pasodos,"responsable_legal_unet",array('size'=>60,'maxlength'=>200)); ?>
		<?php //echo $form->error($pasodos,"responsable_legal_unet"); ?>
	</div> -->
	<!-- ************************************** BUSQUEDA AUTOCOMPLETADA ******** RESPONSABLE LEGAL UNET*************************** -->
	<div class="row">
		<?php echo $form->labelEx($pasodos,'responsable_legal_unet'); ?>
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
		    	//'placeholder'=>'Buscar responsable...',
		   //  'title'=>'Indique el nombre del responsable.'
		    	),
		    ));  
		    ?>
		    <?php echo $form->error($pasodos,'responsable_legal_unet'); ?>
		</div>
		<a href="#" data-toggle="modal" data-target="#miventana3" onclick="limpiar_institucion()">
			Nuevo Responsable
			</a>
			
		<!-- ************************************************************************************************************* -->
		<br>
		<!-- ************************************** BUSQUEDA AUTOCOMPLETADA ******** RESPONSABLE CONTACTO UNET*************************** -->
		<div class="row">
			<?php echo $form->labelEx($pasodos,'responsable_contacto_unet'); ?>
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
		     //'title'=>'Indique el nombre del responsable.'
		    	),
		    ));  
		    ?>
		    <?php echo $form->error($pasodos,'responsable_contacto_unet'); ?>
		</div>
		<a href="#" data-toggle="modal" data-target="#miventana3" onclick="limpiar_institucion()">
			Nuevo Responsable
			</a>
			
		<!-- ************************************************************************************************************* -->
		<br>
		<h4>Contraparte</h4>
		<div class="row">
			<?php echo $form->labelEx($pasodos,'institucion',array('class'=>'col-md-3')); ?>
			<?php echo $form->dropDownList($pasodos,'institucion',CHtml::listData(Instituciones::model()->findAll(), 'idInstitucion', 'nombreInstitucion'),''); ?>
			<?php echo $form->error($pasodos,'institucion'); ?>
		</div>

		<a href="#" data-toggle="modal" data-target="#miventana2">
			Nueva Institucion 
		</a>

		<br>
		<br>
		<!--****************************************************** BUSQUEDA AUTO-COMPLETADA RESPONSABLE LEGAL CONTRAPARTE******************* -->
		<div class="row">
			<?php echo $form->labelEx($pasodos,'responsable_legal_contraparte'); ?>
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
		     //'title'=>'Indique el nombre del responsable.'
		    	),
		    ));  
		    ?>
		    <?php echo $form->error($pasodos,'responsable_legal_contraparte'); ?>
		</div>
			
			<a href="#" data-toggle="modal" data-target="#miventana3" onclick="capturar_institucion()">
			Nuevo Responsable
			</a>

		<br>
		<!-- ********************************************************************************************* -->
		<!--****************************************************** BUSQUEDA AUTO-COMPLETADA RESPONSABLE CONTACTO CONTRAPARTE******************* -->
		<div class="row">
			<?php echo $form->labelEx($pasodos,'responsable_contacto_contraparte'); ?>
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
		     //'title'=>'Indique el nombre del responsable.'
		    	),
		    ));  
		    ?>
		    <?php echo $form->error($pasodos,'responsable_contacto_contraparte'); ?>
		</div>
		<a href="#" data-toggle="modal" data-target="#miventana3" onclick="capturar_institucion()">
			Nuevo Responsable
			</a>
			
		<br>
		<div class="row">
			<?php echo $form->labelEx($pasodos,'instancia_contraparte',array('class'=>'col-md-3')); ?>
			<?php echo $form->dropDownList($pasodos,'instancia_contraparte',CHtml::listData(Dependencias::model()->findAll(), 'idDependencia', 'nombreDependencia'),''); ?>
			<?php echo $form->error($pasodos,'instancia_contraparte'); ?>
		</div>

		<?php 
		if(isset($_COOKIE['contra'])){
			unset($_COOKIE['contra']);

		}
			//print_r($contrapartes);
		?>	
		<br>
		<!--*************************************** BOTON PARA AGREGAR EN LA TABLA^************************************-->
		<a onclick="fagregar()"> Agregar</a>	
		<br>
		<br>

		<table class="table table-bordered" id="tablai">
			<thead>
				<tr>
					<th>Insttitucion</th>
					<th>Responsable legal</th>
					<th>Responsable Contacto</th>
					<th>Instancia Contraparte</th>
					<th>Operaciones </th>
				</tr>
			</thead>
			<tbody id="bodyt">
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
	<?php echo CHtml::submitButton("siguiente",array("class"=>'btn btn-conv')); ?>


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

				<p>Todo el contenido de la ventana modal</p>
				<!--************************************************************aca  -->

				<!-- ***********************************************************-->
				<?php 
				$formi=$this->beginWidget("CActiveForm");
				?>
				<div class="row">

					<?php echo $formi->labelEx($paises,'idPais',array('class'=>'col-md-3')); ?>

					<!--++++++++++++++++++++++++++++++++++++++++++++++++validacion para dropdownlist dependiente ++++++++++++++++++++ -->
					<?php echo $formi->dropDownList($paises,"idPais",
						CHtml::listData(Paises::model()->findAll(),'idPais','nombrePais'), 
						array(
							'ajax'=>array(
								'type'=>'POST',
								'url'=>CController::createurl('Convenios/Selectdos'),
								'update'=>'#'.Chtml::activeId($instituciones,'estados_idEstado')
								),'prompt'=>'Seleccione'
							)
							);?>
							<?php echo $formi->error($paises,"idPais"); ?>

						</div>

						<br>
						<div class="row">
							<?php echo $formi->labelEx($instituciones,'estados_idEstado'); ?>
							<?php echo $formi->dropDownList($instituciones,"estados_idEstado",array());?>
							<?php echo $formi->error($instituciones,"estados_idEstado"); ?>

						</div>

						<div class="row">
							<?php echo $formi->labelEx($instituciones,'nombreInstitucion',array('class'=>'col-md-3')); ?>
							<?php echo $formi->textField($instituciones,"nombreInstitucion",array('style'=>'width:200px;','class'=>'col-md-5'));?>
							<?php echo $formi->error($instituciones,"nombreInstitucion"); ?>
						</div>
						<div class="row">
							<?php echo $formi->labelEx($instituciones,'siglasInstitucion',array('class'=>'col-md-3')); ?>
							<?php echo $formi->textField($instituciones,"siglasInstitucion",array('style'=>'width:200px;','class'=>'col-md-5'));?>
							<?php echo $formi->error($instituciones,"siglasInstitucion"); ?>
						</div>

						<div class="row">
							<?php echo $formi->labelEx($instituciones,'tiposInstituciones_idTipoInstitucion',array('class'=>'col-md-3')); ?>
							<?php echo $form->dropDownList($instituciones,'tiposInstituciones_idTipoInstitucion',CHtml::listData(Tiposinstituciones::model()->findAll(), 'idTipoInstitucion', 'nombreTipoInstitucion'),''); ?>
							<?php echo $formi->error($instituciones,"tiposInstituciones_idTipoInstitucion"); ?>
						</div>
						<div id="oculto"></div>
						<?php 
						echo CHtml:: ajaxSubmitButton(
							'Guardar', array('convenios/guardarinstitucion'),array(
								'update'=>'#PasodosForm_institucion'
								),array('data-dismiss'=>'modal')
							);

							?>

							<?php $this->endWidget(); ?>

						</div>
						<div class="modal-footer">
							<button  type="button" class="btn btn-conv" data-dismiss="modal"> Cerrar</button>

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
				$formr=$this->beginWidget("CActiveForm");
				?>
					
						<div class="row">
							<?php echo $formr->labelEx($responsable,'primerNombreResponsable',array('class'=>'col-md-3')); ?>
							<?php echo $formr->textField($responsable,"primerNombreResponsable",array('style'=>'width:200px;','class'=>'col-md-5'));?>
							<?php echo $formr->error($responsable,"primerNombreResponsable"); ?>
						</div>
						<br>
						<div class="row">
							<?php echo $formr->labelEx($responsable,'segundoNombreResponsable',array('class'=>'col-md-3')); ?>
							<?php echo $formr->textField($responsable,"segundoNombreResponsable",array('style'=>'width:200px;','class'=>'col-md-5'));?>
							<?php echo $formr->error($responsable,"segundoNombreResponsable"); ?>
						</div>
						<br>
						<div class="row">
							<?php echo $formr->labelEx($responsable,'primerApellidoResponsable',array('class'=>'col-md-3')); ?>
							<?php echo $formr->textField($responsable,"primerApellidoResponsable",array('style'=>'width:200px;','class'=>'col-md-5'));?>
							<?php echo $formr->error($responsable,"primerApellidoResponsable"); ?>
						</div>
						<br>
						<div class="row">
							<?php echo $formr->labelEx($responsable,'segundoApellidoResponsable',array('class'=>'col-md-3')); ?>
							<?php echo $formr->textField($responsable,"segundoApellidoResponsable",array('style'=>'width:200px;','class'=>'col-md-5'));?>
							<?php echo $formr->error($responsable,"segundoApellidoResponsable"); ?>
						</div>
						<br>
						<div class="row">
							<?php echo $formr->labelEx($responsable,'telefonoResponsable',array('class'=>'col-md-3')); ?>
							<?php echo $formr->textField($responsable,"telefonoResponsable",array('style'=>'width:200px;','class'=>'col-md-5'));?>
							<?php echo $formr->error($responsable,"telefonoResponsable"); ?>
						</div>
						<br>
						<div class="row">
							<?php echo $formr->labelEx($responsable,'correoElectronicoResponsable',array('class'=>'col-md-3')); ?>
							<?php echo $formr->textField($responsable,"correoElectronicoResponsable",array('style'=>'width:200px;','class'=>'col-md-5'));?>
							<?php echo $formr->error($responsable,"correoElectronicoResponsable"); ?>
						</div>
						<br>
					<div class="row">
						<?php echo $formr->labelEx($responsable,'dependencias_idDependencia',array('class'=>'col-md-3')); ?>
						<?php echo $formr->dropDownList($responsable,'dependencias_idDependencia',CHtml::listData(Dependencias::model()->findAll(), 'idDependencia', 'nombreDependencia'),''); ?>
						<?php echo $formr->error($responsable,'dependencias_idDependencia'); ?>
					</div>
					<br>
					<div class="row">
						<?php echo $formr->labelEx($responsable,'tipoResponsable_idTipoResponsable',array('class'=>'col-md-3')); ?>
						<?php echo $formr->dropDownList($responsable,'tipoResponsable_idTipoResponsable',CHtml::listData(Tiporesponsable::model()->findAll(), 'idTipoResponsable', 'descripcionTipoResponsable'),''); ?>
						<?php echo $formr->error($responsable,'tipoResponsable_idTipoResponsable'); ?>
					</div>
						
					<?php 
					if(isset($_COOKIE['cookinst'])){
						$responsable->instituciones_idInstitucion=$_COOKIE['cookinst'];
					}
					?>

						<?php 
						echo CHtml:: ajaxSubmitButton(
							'Guardar', array('convenios/guardarresponsable'),array(
							'update'=>'#oculto'
								),array('data-dismiss'=>'modal')
							);

							?>	

							<?php $this->endWidget(); ?>

						</div>
						<div class="modal-footer">
							<button  type="button" class="btn btn-conv" data-dismiss="modal"> Cerrar</button>

						
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
				var inst= document.getElementById("PasodosForm_instancia_contraparte");
				var inst_selec=inst.options[inst.selectedIndex].text;

				var inst_id=inst.options[inst.selectedIndex].value;
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
		var nomb="b-"+nombreboton+"-"+valselc+"."+respl_id+"."+respc_id+"."+inst_id;
		alert(nomb);
		btn1.setAttribute("id",nomb);
		btn1.setAttribute("onclick","eliminarfila(this.id)");

		//agregando institución;
		td1.innerHTML=seleci;
		//agregando responsable legal
		td2.innerHTML=respl;
		//agregando responsable de contacto
		td3.innerHTML=respc;
		//agrregando instancia
		td4.innerHTML=inst_selec;
		//agregando boton;
		td5.appendChild(btn1);
		


		tr1.appendChild(td1);
		tr1.appendChild(td2);
		tr1.appendChild(td3);
		tr1.appendChild(td4);
		tr1.appendChild(td5);
		tabla.appendChild(tr1);

		//div1.appendChild(div3);
		//div4.setAttribute("class","col-15");
		//agregando al cookie contra... la contraparte que se selecciono. 
		document.cookie="contra="+getCookie("contra")+"-"+valselc+"."+respl_id+"."+respc_id+"."+inst_id;


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
			alert(valselc);

		
	}
		function limpiar_institucion(){

			document.cookie="cookinst="+" ";
		
	}
	function get_institucion(){
		alert("hola");
	}
	</script>