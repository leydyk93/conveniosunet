<?php 
	if(isset($_SESSION['aporte'])){
		 $pasocuatro->descripcion_aporte=" ";
		 $pasocuatro->monedas_idMoneda=" ";
		 $pasocuatro->valor=" ";
		 $pasocuatro->cantidad=" ";

	}
 ?>


<?php 
	$form=$this->beginWidget("CActiveForm",array(  
			'htmlOptions'=>array('class'=>'form-horizontal'),     
			'enableClientValidation'=> true,
		                         'clientOptions'=> array(
		                            'validateOnSubmit'=> true,
		                            'validateOnChange'=> true,
		                            'validateOnType'=>true,
		                          ),                         
			));
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
				//echo "instancia contraparte: ".$_SESSION['instancia_contraparte'];
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
*/
				/*foreach ($_SESSION['documento'] as $doc => $i) {
				 					
					$docu="ActaIntencion".$i->name;

					//$_SESSION['url_acta']=;
					//$model->urlConvenio=$path.$docu;

					$i->saveAs($_SESSION['url_acta'].$docu);

					echo "</br>";
					echo $_SESSION['url_acta'].$docu;

				}*/

		

 ?>
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
 <?php echo "<br>"; ?>
 Aportes del Convenio
  <?php echo "<br>"; ?>
  <?php echo "<br>"; ?>
<div class="form-group">
<?php echo $form->labelEx($pasocuatro,'descripcion_aporte',array('class'=>'control-label col-sm-2')); ?>
<div class="col-sm-9">
	<?php echo $form->textField($pasocuatro,'descripcion_aporte',array('class'=>'form-control')); ?>
	<?php echo $form->error($pasocuatro,'descripcion_aporte'); ?>
</div>
</div>

<div class="form-group">
<?php echo $form->labelEx($pasocuatro,'monedas_idMoneda',array('class'=>'control-label col-sm-2')); ?>
<div class="col-sm-9">
	<?php echo $form->dropDownList($pasocuatro,'monedas_idMoneda',CHtml::listData(Monedas::model()->findAll(), 'idMoneda', 'descripcionMoneda'),array('class'=>'form-control')); ?>
	<?php echo $form->error($pasocuatro,'monedas_idMoneda'); ?>
</div>
</div>

<div class="form-group">
<?php echo $form->labelEx($pasocuatro,'valor',array('class'=>'control-label col-sm-2')); ?>
	<div class="col-sm-9">
		<?php echo $form->textField($pasocuatro,'valor',array('class'=>'form-control')); ?>
		<?php echo $form->error($pasocuatro,'valor'); ?>
	</div>
</div>


<div class="form-group">
<?php echo $form->labelEx($pasocuatro,'cantidad',array('class'=>'control-label col-sm-2')); ?>
<div class="col-sm-9">
	<?php echo $form->textField($pasocuatro,'cantidad',array('class'=>'form-control')); ?>
	<?php echo $form->error($pasocuatro,'cantidad'); ?>
	
</div>
</div>
<div class="text-right"><a onclick="aporte_agregar()"> <span class="glyphicon glyphicon-plus"></span></a></div>

<?php echo "<br>"; ?>

 <table class="table table-bordered" id="tablai">
		      <thead>
		      <tr>
		        <th>Aporte</th>
		        <th>Moneda</th>
		        <th>Valor</th>
		        <th>Cantidad</th>
		        <th>Operacion</th>
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
						//echo '<td>Eliminar</td>';
						echo '<td> <a id=b-a'.$i.'-'.$aporteA[0].'.'.$moneda->idMoneda.'.'.$aporteA[2].'.'.$aporteA[3].' onclick=eliminarfilap(this.id)> <span class="glyphicon glyphicon-remove"></span> </a>';
						echo '</tr>';

					}
					}
				 ?>
		      <!-- <tr>
		       
		        <td>Bono alimenticio </td>
		        <td>Bolivares</td>
		        <td>Cantidad</td>
		        <td>Valor</td>
		        <td>Eliminar</td>
		      </tr>
		        <tr>
		        <td>Aporte Humano</td>
		        <td>N/A</td>
		        <td>10</td>
		        <td>N/A</td>
		        <td>Eliminar</td>
		      </tr>
		    -->
		    </tbody>
		  </table>
<?php echo "<br>"; ?>
<?php echo "<br>"; ?>
 <?php echo CHtml::submitButton("siguiente",array("class"=>'btn btn-conv')); ?>


		


<?php $this->endWidget(); ?>
</section>
</div><!--contenido-->
</main>
<script>
function aporte_agregar(){
		

		var tabla=document.getElementById("bodya");
		var tr1=document.createElement('tr');
		var td1=document.createElement('td');
		var td2=document.createElement('td');
		var td3=document.createElement('td');
		var td4=document.createElement('td');
		var td5=document.createElement('td');
		var bt1=document.createElement('a'); //boton eliminar 
		var desc=document.getElementById("PasocuatroForm_descripcion_aporte").value;
		var mon=document.getElementById("PasocuatroForm_monedas_idMoneda");
		var moned=mon.options[mon.selectedIndex].value;
		var monedt=mon.options[mon.selectedIndex].text;
		var val=document.getElementById("PasocuatroForm_valor").value;
		var cant=document.getElementById("PasocuatroForm_cantidad").value;
		//var selec=document.getElementById("PasodosForm_institucion");
		//var seleci=selec.options[selec.selectedIndex].text;
		//var valselc=selec.options[selec.selectedIndex].value;
		var nombreboton;
		var nomb;

		if(desc==""||(val==""&&cant=="")){
			if(desc==""){
				alert("Debe llenar el campo descripción");
			}
			else if(val==""||cant==""){
				alert("Debe llenar el campo valor o el campo cantidad");
			}
		}
		else{

				bt1.innerHTML="<span class='glyphicon glyphicon-remove'></span>";
				//asignando nombre al boton eliminar
				nombreboton=getCookie("nrofilap");

				//aumentando una fila
				nombreboton++;
				//asignando el id con el nro a la fila 
				var filap;
				filap="a"+nombreboton;
				tr1.setAttribute("id",filap);
				//asignando nuevo valor al cookie
				document.cookie="nrofilap="+nombreboton;
				//asignando id al boton relacioinado con la fila
				nomb="b-"+filap+"-"+desc+"."+moned+"."+val+"."+cant;
				//alert(nomb);
				bt1.setAttribute("id",nomb);
				bt1.setAttribute("onclick","eliminarfilap(this.id)");

				td1.innerHTML=desc;
				td2.innerHTML=monedt;
				td3.innerHTML=val;
				td4.innerHTML=cant;
				td5.appendChild(bt1);

				tr1.appendChild(td1);
				tr1.appendChild(td2);
				tr1.appendChild(td3);
				tr1.appendChild(td4);
				tr1.appendChild(td5);
				
				tabla.appendChild(tr1);
			
				//agregando al cookie aportes... la contraparte que se selecciono. 
				document.cookie="aportes="+getCookie("aportes")+"-"+desc+"."+moned+"."+val+"."+cant;

	}//else si estan los campos llenos
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

	function eliminarfilap(fila){

		var aux;
		aux=fila.split("-");
		var cookaux=getCookie("aportes");
		var auxcontra= cookaux.split("-");
		//alert(aux[1]);		
		var fil=document.getElementById(aux[1]);
		fil.parentNode.removeChild(fil);

		//eliminadno valor el cookie
		document.cookie="aportes= ";
		for(var j=1;j<auxcontra.length;j++){
			if(auxcontra[j]!=aux[2]){
				document.cookie="aportes="+getCookie("aportes")+"-"+auxcontra[j];
			}
		}

	}	
</script>