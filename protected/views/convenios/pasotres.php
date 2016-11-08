<!--INCIALIZANDO LOS CAMPOS -->
<?php 
//window.onload=asignar();
if(!isset($_SESSION['nro_acta'])){
        $_SESSION['nro_acta']="";
}
if(!isset($_SESSION['fecha_acta'])){
        $_SESSION['fecha_acta']="";
}
if(!isset($_SESSION['url_acta'])){
        $_SESSION['url_acta']="";
}
?>

<?php 
	$form=$this->beginWidget("CActiveForm",array(  
			'htmlOptions'=>array('class'=>'form-horizontal','enctype'=>'multipart/form-data'),                      
			));
 ?>

 <?php if(isset($_COOKIE['contra'])){
			echo " cookie ";
		   echo $_COOKIE['contra'];
		   $_SESSION['institucion']=explode('-',$_COOKIE['contra']);	
		   echo " Variable de Sesion ";
		   print_r($_SESSION['institucion']) ;
		   }
		  //print_r($_SESSION['institucion']) ;
		  //echo " nueva";
		  //echo $_SESSION['institucion'][0];
		 // print_r($_SESSION['institucion']);
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
			
				echo "<br>";
				echo "responsable legal contraparte: ".$_SESSION['responsable_legal_contraparte'];
				echo "<br>";
				echo "responsable contacto contraparte ".$_SESSION['responsable_contacto_contraparte'];

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
							<li><a href="<?php echo $this->createUrl( '/convenios/pasocinco' )."&idconvenio=".$_SESSION['idconvenio']; ?>"  class="text-center">Paso 5</a></li>

						</ul>
                    
                
            </aside>

<section class="datos col-xs-9">     

<h4>Acta de Intención </h4> 
	

<div class="form-group">
	<?php echo $form->labelEx($pasotres,'nro_acta',array('class'=>'control-label col-sm-2')); ?>
	<div class="col-sm-10">
		<?php echo $form->textField($pasotres,'nro_acta',array('class'=>'form-control','value'=>$_SESSION['nro_acta'])); ?>
		<?php echo $form->error($pasotres,'nro_acta'); ?>
	</div>
</div>


<div class="form-group">
        <?php echo $form->labelEx($pasotres,"fecha_acta",array('class'=>'control-label col-sm-2')); ?>
        <div class="col-sm-10"> 

            <?php
              $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'options'=>array(
                                    'showAnim'=>'fold',
                            ),
                            'model'=>$pasotres,
                            'attribute'=>'fecha_acta',
                            'htmlOptions'=>array(
                                    'class'=>'betterform',
                                    'tabindex'=>3
                            ),
                            'options'=>array(
                                    'dateFormat'=>'yy-mm-dd',
                                    'showButtonPanel'=>true,
                                    'changeMonth'=>true,
                                    'changeYear'=>true,
                                    'defaultDate'=>'+1w',
                            ),
                            'htmlOptions'=>array( 'class'=>'form-control input-sm',//,
                                    'value'=>$_SESSION['fecha_acta']
                                ),
                    ));
               ?>
        <?php echo $form->error($pasotres,"fecha_acta"); ?>

        </div>
      </div>

<div class="form-group">

<?php echo $form->labelEx($pasotres,'url_acta',array('class'=>'control-label col-sm-2')); ?>
<div class="col-sm-10">
	<?php echo $form->textField($pasotres,'url_acta',array('class'=>'form-control','value'=>$_SESSION['url_acta'])); ?>
	<?php echo $form->error($pasotres,'url_acta'); ?>
</div>
</div>


            		<?php 
	                     echo $form->labelEx($modelArchivo,'titulo',array('class'=>"modelArchivo"));
	                     echo $form->textField($modelArchivo,'titulo',array('class'=>"modelArchivo"));
	                     echo $form->error($modelArchivo,'titulo');
	               
 						?>


  <div class="form-group">
                          <span class="col-md-2 col-md-offset-2 text-center"><?php ?></span>
                          <div class="col-md-7">
                          <label class="btn btn-conv btn-sm"> <span class="glyphicon glyphicon-open-file"></span> Subir Archivo del Convenio
 <?php 	

               $this->widget('CMultiFileUpload',
              array(
                'model'=>$modelArchivo,
                'name'=>'documento',
                'attribute'=>'documento',
                'accept'=> 'pdf',
                'denied'=>'El documento debe estar en formato PDF',
                'max'=>1,
                'duplicate'=>'archivo duplicado',
                 'htmlOptions'=>array(
                                    'style'=>"display: none;"     
                                  ),
                ));
              
                echo $form->error($modelArchivo,'documento');
         

             // echo Yii::app()->request->baseUrl."/archivos/"."/".$modelArchivo->documento;
             
          //    $this->endWidget();
       

                ?>
            </label>
            </div>
            </div>

<?php echo CHtml::submitButton("siguiente",array("class"=>'btn btn-conv')); ?>

<?php $this->endWidget(); ?>
</section>
</div><!--contenido-->
</main>
