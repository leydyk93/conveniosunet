
<?php 
	$form=$this->beginWidget("CActiveForm");
 ?>

<?php 
			/*	echo $_SESSION['idconvenio'];
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
				echo $_SESSION['instanciaunet'];
				echo "<br>";
				echo $_SESSION['responsableunet'];
				echo "<br>";
				echo $_SESSION['institucion'];
				echo "<br>";
				echo $_SESSION['instancia_contraparte'];
				echo "<br>";
				echo $_SESSION['responsable_contraparte'];
				echo "<br>";*/
//campos del formulario 
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
                        <li><a href="index.php?r=cargar/paso2" class="text-center" >Paso 2</a></li>
                        <li><a href="index.php?r=cargar/paso3" class="text-center">Paso 3</a></li>
                        <li><a href="index.php?r=cargar/paso4" class="text-center">Paso 4</a></li>
                        <li><a href="index.php?r=cargar/paso5" class="text-center">Paso 5</a></li>
                        <li><a href="#" class="text-center">Paso 6</a></li>
                        
                    </ul>
                    
                
            </aside>

<section class="datos col-xs-9">     

 Acta de Intención 

<?php echo "<br>"; ?>
<?php echo "<br>"; ?>
<div class="row">
<?php echo $form->labelEx($pasotres,'nro_acta',array('class'=>'col-md-3')); ?>
<?php echo $form->textField($pasotres,'nro_acta',array('style'=>'width:200px;','class'=>'col-md-5')); ?>
<?php echo $form->error($pasotres,'nro_acta'); ?>
</div>
<?php echo "<br>"; ?>
<div class="row">
<?php echo $form->labelEx($pasotres,'fecha_acta',array('class'=>'col-md-3')); ?>
<?php echo $form->textField($pasotres,'fecha_acta',array('style'=>'width:200px;','class'=>'col-md-5')); ?>
<?php echo $form->error($pasotres,'fecha_acta'); ?>
</div>
<?php echo "<br>"; ?>
<div class="row">
<?php echo $form->labelEx($pasotres,'url_acta',array('class'=>'col-md-3')); ?>
<?php echo $form->textField($pasotres,'url_acta',array('style'=>'width:200px;','class'=>'col-md-5')); ?>
<?php echo $form->error($pasotres,'url_acta'); ?>
</div>
<?php echo "<br>"; ?>

<?php echo CHtml::submitButton("siguiente",array("class"=>"btn btn-primary")); ?>

<?php $this->endWidget(); ?>
</section>
</div><!--contenido-->
</main>