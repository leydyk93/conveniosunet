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
                        <li><a href="index.php?r=convenios/_paso1" class="text-center">Paso 1</a></li>
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
<!-- ************************************** BUSQUEDA AUTOCOMPLETADA *********************************** -->
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
		     'placeholder'=>'Buscar persona...',
		     'title'=>'Indique el nombre del responsable.'
		     ),
		   ));  
		 ?>
		 <?php echo $form->error($pasodos,'responsable_legal_unet'); ?>
		</div>

<!-- ************************************************************************************************************* -->
		<br>
		<div class="row">
		<?php echo $form->labelEx($pasodos,"responsable_contacto_unet",array('class'=>'col-md-3')); ?>
		<?php echo $form->textField($pasodos,"responsable_contacto_unet",array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($pasodos,"responsable_contacto_unet"); ?>
		</div>
		<br>
		<h4>Contraparte</h4>
		<div class="row">
		<?php echo $form->labelEx($pasodos,'institucion',array('class'=>'col-md-3')); ?>
		<?php echo $form->dropDownList($pasodos,'institucion',CHtml::listData(Instituciones::model()->findAll(), 'idInstitucion', 'nombreInstitucion'),''); ?>
		<?php echo $form->error($pasodos,'institucion'); ?>
		</div>
		<a onclick="fagregar()"> Agregar</a>
		<a href="#" data-toggle="modal" data-target="#miventana2">
   		 Nueva Institucion 
		</a>
		<br>
		<br>
		<?php //$_SESSION['hola']="PROBANDOOO"; echo $_SESSION['hola'];

		if(isset($_COOKIE['contra'])){
			
			unset($_COOKIE['contra']);
			//echo $_COOKIE['contra'];
			
	
		}
			//print_r($contrapartes);
			//=$contrapartes;
		 ?>
	

		
	
		  <table class="table table-bordered" id="tablai">
		      <thead>
		      <tr>
		        <th>Institución</th>
		        <th>Nro Institucion</th>
		      </tr>
		    </thead>
		  <tbody id="bodyt">
		       <!--<tr>
		       
		        <td>Universidad de los Andes</td>
		         <td>1</td>
		      </tr>
		      <tr>
		        
		        <td>Universidad Catolica</td>
		        <td>2</td>
		      </tr>
		      <tr>
		        
		        <td>Universidad Simon Bolivar</td>
		        <td>3</td>
		      </tr>-->
		    </tbody>
		  </table>
		

		<div class="row">
		<?php echo $form->labelEx($pasodos,'instancia_contraparte',array('class'=>'col-md-3')); ?>
		<?php echo $form->dropDownList($pasodos,'instancia_contraparte',CHtml::listData(Dependencias::model()->findAll(), 'idDependencia', 'nombreDependencia'),''); ?>
		<?php echo $form->error($pasodos,'instancia_contraparte'); ?>
		</div>
		<br>
	
		<div class="row">
		<?php echo $form->labelEx($pasodos,"responsable_legal_contraparte",array('class'=>'col-md-3')); ?>
		<?php echo $form->textField($pasodos,"responsable_legal_contraparte",array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($pasodos,"responsable_legal_contraparte"); ?>
		</div>
		<br>
		<div class="row">
		<?php echo $form->labelEx($pasodos,"responsable_contacto_contraparte",array('class'=>'col-md-3')); ?>
		<?php echo $form->textField($pasodos,"responsable_contacto_contraparte",array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($pasodos,"responsable_contacto_contraparte"); ?>
		</div>
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
                    <?php 
                         $formi=$this->beginWidget("CActiveForm");
                    ?>
					<div class="row">
                    <?php echo $formi->labelEx($paises,'idPais',array('class'=>'col-md-3')); ?>
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

				

                    <!--
                    <div class="row">
                    <?//php echo $formd->labelEx($instituciones,'siglasInstitucion',array('class'=>'col-md-3')); ?>
                    <?//php echo $form->textField($instituciones,"siglasInstitucion",array('style'=>'width:200px;','class'=>'col-md-5'));?>
                    <?//php echo $form->error($instituciones,"siglasInstitucion"); ?>
                    </div>-->

                </div>
                <div class="modal-footer">
                    <button  type="button" class="btn btn-conv" data-dismiss="modal"> Cerrar</button>
                    <a  type "button" onclick="mens()" >Boton</a>
                    <?php echo CHtml::submitButton("Guardar",array("class"=>'btn btn-conv')); ?>
                    <?php 
                    $value=0;
                    $value1="";
                    setcookie("nrofila", $value);
                    setcookie("contra",$value1);
                     ?>

                <?php $this->endWidget(); ?>
                </div>


<script>
	

	function fagregar(){
		

		var tabla=document.getElementById("bodyt");
		var tr1=document.createElement('tr');
		var td1=document.createElement('td');
		var btn1=document.createElement('a')
		var td2=document.createElement('td');
		var selec=document.getElementById("PasodosForm_institucion");
		var seleci=selec.options[selec.selectedIndex].text;
		var valselc=selec.options[selec.selectedIndex].value;
		var nombreboton;
		var nomb;

		
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
		var nomb="b-"+nombreboton+"-"+valselc
		alert(nomb);
		btn1.setAttribute("id",nomb);
		btn1.setAttribute("onclick","eliminarfila(this.id)");
		td1.appendChild(btn1);
		td2.innerHTML=seleci;


		tr1.appendChild(td1);
		tr1.appendChild(td2);
		tabla.appendChild(tr1);

		//div1.appendChild(div3);
		//div4.setAttribute("class","col-15");
		//agregando al cookie contra... la contraparte que se selecciono. 
		document.cookie="contra="+getCookie("contra")+"-"+valselc;


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
</script>