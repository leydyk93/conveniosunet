<?php 
	$form=$this->beginWidget("CActiveForm");
 ?>


<?php 
//igualando y mostrando variables del paso aterior a modelo 
/*	$model->idConvenio=$_SESSION['idconvenio'];
	$model->nombreConvenio=$_SESSION['nombreconvenio'];
	 echo "<br>";
	 echo $model->idConvenio;
	 echo "<br>";
	 echo $model->nombreConvenio;
	 echo "<br>";*/

//campos del formulario 
	 			/*echo "<br>";
	 			echo $_SESSION['idconvenio'];
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
*/
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
		
		<div class="row">
		<?php echo $form->labelEx($pasodos,"responsableunet",array('class'=>'col-md-3')); ?>
		<?php echo $form->textField($pasodos,"responsableunet",array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($pasodos,"responsableunet"); ?>
		</div>
		<br>
	
		<h4>Contraparte</h4>
		<div class="row">
		<?php echo $form->labelEx($pasodos,'institucion',array('class'=>'col-md-3')); ?>
		<?php echo $form->dropDownList($pasodos,'institucion',CHtml::listData(Instituciones::model()->findAll(), 'idInstitucion', 'nombreInstitucion'),''); ?>
		<?php echo $form->error($pasodos,'institucion'); ?>
		</div>
		<br>
		<br>
		<div class="row">
		<?php echo $form->labelEx($pasodos,'instancia_contraparte',array('class'=>'col-md-3')); ?>
		<?php echo $form->dropDownList($pasodos,'instancia_contraparte',CHtml::listData(Dependencias::model()->findAll(), 'idDependencia', 'nombreDependencia'),''); ?>
		<?php echo $form->error($pasodos,'instancia_contraparte'); ?>
		</div>
		<br>
	
		<div class="row">
		<?php echo $form->labelEx($pasodos,"responsable_contraparte",array('class'=>'col-md-3')); ?>
		<?php echo $form->textField($pasodos,"responsable_contraparte",array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($pasodos,"responsable_contraparte"); ?>
		</div>
		<br>
	
		<?php echo CHtml::submitButton("siguiente",array("class"=>'btn btn-conv')); ?>


</section>
</div><!--contenido-->
</main>

<?php $this->endWidget(); ?>
