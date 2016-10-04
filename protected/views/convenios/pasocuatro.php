<?php 
	$form=$this->beginWidget("CActiveForm");
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
				echo "instancia contraparte: ".$_SESSION['instancia_contraparte'];
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
 <?php echo "<br>"; ?>
 Aportes del Convenio
  <?php echo "<br>"; ?>
  <?php echo "<br>"; ?>
<div>
<?php echo $form->labelEx($pasocuatro,'descripcion_aporte',array('class'=>'col-md-3')); ?>
<?php echo $form->textField($pasocuatro,'descripcion_aporte'); ?>
<?php echo $form->error($pasocuatro,'descripcion_aporte'); ?>
</div>

 <?php echo "<br>"; ?>
 <div>
<?php echo $form->labelEx($pasocuatro,'monedas_idMoneda',array('class'=>'col-md-3')); ?>
<?php echo $form->dropDownList($pasocuatro,'monedas_idMoneda',CHtml::listData(Monedas::model()->findAll(), 'idMoneda', 'descripcionMoneda'),''); ?>
<?php echo $form->error($pasocuatro,'monedas_idMoneda'); ?>
</div>

<?php echo "<br>"; ?>
<div>
<?php echo $form->labelEx($pasocuatro,'valor',array('class'=>'col-md-3')); ?>
<?php echo $form->textField($pasocuatro,'valor'); ?>
<?php echo $form->error($pasocuatro,'valor'); ?>
</div>
<?php echo "<br>"; ?>
<div>
<?php echo $form->labelEx($pasocuatro,'cantidad',array('class'=>'col-md-3')); ?>
<?php echo $form->textField($pasocuatro,'cantidad'); ?>
<?php echo $form->error($pasocuatro,'cantidad'); ?>
</div>
<?php echo "<br>"; ?>
<a onclick="aporte_agregar()"> Agregar</a>
<?php echo "<br>"; ?>

 <table class="table table-bordered" id="tablai">
		      <thead>
		      <tr>
		        <th>Aporte</th>
		        <th>Moneda</th>
		        <th>Cantidad</th>
		        <th>Valor</th>
		        <th>Operacion</th>
		      </tr>
		    </thead>
		  <tbody id="bodya">
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
		var val=document.getElementById("PasocuatroForm_valor").value;
		var cant=document.getElementById("PasocuatroForm_cantidad").value;
		//var selec=document.getElementById("PasodosForm_institucion");
		//var seleci=selec.options[selec.selectedIndex].text;
		//var valselc=selec.options[selec.selectedIndex].value;
		var nombreboton;
		var nomb;

		
		bt1.innerHTML="Eliminar";
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
		alert(nomb);
		bt1.setAttribute("id",nomb);
		bt1.setAttribute("onclick","eliminarfilap(this.id)");

		td1.innerHTML=desc;
		td2.innerHTML=moned;
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