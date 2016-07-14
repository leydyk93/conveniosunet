<?php
/* @var $this ConveniosController */
/* @var $model Convenios */

$this->breadcrumbs=array(
	'Convenios'=>array('index'),
	$model->idConvenio,
);

$this->menu=array(
	array('label'=>'List Convenios', 'url'=>array('index')),
	array('label'=>'Create Convenios', 'url'=>array('create')),
	array('label'=>'Update Convenios', 'url'=>array('update', 'id'=>$model->idConvenio)),
	array('label'=>'Delete Convenios', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idConvenio),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Convenios', 'url'=>array('admin')),
);
?>


  <div class="row">
	<div  class="nuevo col-md-12 text-left">
		
		 <p> Convenio <?php echo $model->nombreConvenio; ?></p>
	</div>

 </div>

  <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading"><h4>Datos Generales del convenio</h4></div>
      <div class="panel-body">

	      
	      	<p>Codigo: <?php echo $model->idConvenio; ?> </p>
	      	<p>Nombre: <?php echo $model->nombreConvenio; ?></p>
	      	<p>Objetivo:<?php echo $model->objetivoConvenio; ?></p>
	      	<p>Clasificacion: <?php 

	      	 $modelClass=Clasificacionconvenios::model()->findByPk($model->clasificacionConvenios_idTipoConvenio);
	      	 echo $modelClass->nombreClasificacionConvenio;


	      	 ?></p>
	      	<p>Fecha Inicio: <?php echo $model->fechaInicioConvenio; ?> </p>
	      	<p>Fecha Caducidad:<?php echo $model->fechaCaducidadConvenio; ?></p>
	      

      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading"><h4>Información de las Partes</h4></div>
      <div class="panel-body">
      	 	<h4>UNET </h4>
	      	<p>Institucion: <?php echo $model->institucionUNET ?></p>
	      	<p>Responsable: </p>
	      	<h4>Contraparte </h4>
	      	<p>Pais: 
                   <?php  


                    //$modelInst=Instituciones::model()->findByPk($model->clasificacionConvenios_idTipoConvenio); 


                //  $posts=Paises::model()->with('estadoconvenios','Instituciones','institucion_convenios','Convenios')->findAll();
                  

                 // $posts=institucion_convenios::model()->with('convenios','Instituciones','estadoconvenios','paises')->findAll();
                  
                   ?>

	      		<p>
	      	<p>Responsable: </p>


      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading"><h4>Características del Convenio</h4></div>
      <div class="panel-body"> </div>
    </div>
  </div>




<!--<?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idConvenio',
		'nombreConvenio',
		'fechaCaducidadConvenio',
		'objetivoConvenio',
		'institucionUNET',
		'urlConvenio',
		'clasificacionConvenios_idTipoConvenio',
		'tipoConvenios_idTipoConvenio',
		'alcanceConvenios_idAlcanceConvenio',
		'formaConvenios_idFormaConvenio',
		'dependencias_idDependencia',
		'convenios_idConvenio',
	),
)); */?>-->
