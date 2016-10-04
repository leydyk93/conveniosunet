<?php
/* @var $this ConveniosController */
/* @var $model Convenios */

$this->breadcrumbs=array(
	'Convenios'=>array('index'),
	'Detalle de convenio',
	//$model->idConvenio,
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
		 <h4>Convenio: <span><?php echo $model->nombreConvenio; ?></span></h4>

	</div>

 </div>

 <div class="list-group panel">
	<a href="#demo1" class="list-group-item" data-toggle="collapse"><h4>Datos generales del Convenio<span class="glyphicon glyphicon-plus-sign pull-right"></span></h4></a>
	<div class="collapse" id="demo1">
	 	<div class="list-group-item">
	 		<ul>
		  		<!--<li>Codigo: <?php /*echo $model->idConvenio; */?></li>
		  		<li>Nombre: <?php /*echo $model->nombreConvenio; */?></li>-->
		  		<li>Objetivo:<?php echo $model->objetivoConvenio; ?></li>
		  		<li>Tipo: <?php 
		  			 $modelTipo=Tipoconvenios::model()->findByPk($model->tipoConvenios_idTipoConvenio);
			      	 echo  $modelTipo->descripcionTipoConvenio;
			      	 ?>
			    </li>
			    <li>Fecha Inicio: <?php echo $model->fechaInicioConvenio; ?></li>
			    <li>Fecha Caducidad:<?php echo $model->fechaCaducidadConvenio; ?></li>
			    <li>Estado Actual: <?php echo $estado; ?><?php 


			     ?>
			 	</li>
		  	</ul>

	 	</div>
	</div>


	<a href="#demo2" class="list-group-item" data-toggle="collapse"><h4>Información de las Partes<span class="glyphicon glyphicon-plus-sign pull-right"></span></h4></a>
	<div class="collapse" id="demo2">
		<div  class="list-group-item">
			
			<h5>UNET </h5>
		  	<ul>
		  		<li>
			      	Institucion: <?php echo $model->institucionUNET ?>	
				</li>
		  		<li>Responsables
		  			<div class="table-responsive">
		  			<table class="table table-bordered">
					    <thead>
					      <tr>
					        <th>Tipo </th>
					        <th>Responsable</th>
					        <th>Información de Contacto</th>
					        
					      </tr>
					    </thead>
					    <tbody>
					      <?php while((($resulRespContUNET->read())!==false)){ ?>
					      <tr>
					        <td><?php echo $resullRespUNET->estado_actual_convenio ?></td>
					        <td><?php echo $resullRespUNET->fecha_inicio." ".$resullRespUNET->fecha_caducidad; ?></td>
					        <td><?php echo $resullRespUNET->objetivo_convenio." </br> Telf. ".$resullRespUNET->tipo_convenio; ?></td>
					        
					      </tr>
					     <?php } ?>
					    </tbody>
					  </table>
					</div>
		  		</li>
		  		
		  	</ul>
		  	<h5>Contraparte </h5>
		  	<ul>
		  		<li> Ubicación
		  			<div class="table-responsive">
					 <table class="table table-bordered">
					    <thead>
					      <tr>
					        <th>Pais</th>
					        <th>Estado</th>
					        <th>Institución</th>
					        
					      </tr>
					    </thead>
					    <tbody>
					      <?php while((($resulConsulta->read())!==false)) { ?>
					      <tr>
					        <td><?php  echo $resullInfo->estado_actual_convenio; ?></td>
					        <td><?php  echo $resullInfo->tipo_convenio; ?></td>
					        <td><?php  echo $resullInfo->fecha_caducidad." (".$resullInfo->fecha_inicio.")"; ?></td>
					      	<!--<td><button  type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="<?php /*echo '#'.$resullInfo->fecha_inicio */?>">Ver información</button></td>-->
					      </tr>
					     <?php } ?>
					    </tbody>
					  </table>
					</div>
		  		</li> 

		  		<li>Responsable Legal
		  			<div class="table-responsive">
		  			<table class="table table-bordered">
					    <thead>
					      <tr>
					        <th>Institucion</th>
					        <th>Responsable</th>
					        <th>Información de Contacto</th>
					        
					      </tr>
					    </thead>
					    <tbody>
					      <?php while((($resulConResp->read())!==false)){ ?>
					      <tr>
					        <td><?php echo $resullResp->nombre_convenio ?></td>
					        <td><?php echo $resullResp->fecha_inicio." ".$resullResp->fecha_caducidad; ?></td>
					        <td><?php echo $resullResp->objetivo_convenio." </br> Telf. ".$resullResp->tipo_convenio; ?></td>
					        
					      </tr>
					     <?php } ?>
					    </tbody>
					  </table>
					</div>
		  		</li>

		  		<li>Responsable Contacto
		  			<div class="table-responsive">
		  			<table class="table table-bordered">
					    <thead>
					      <tr>
					        <th>Institucion</th>
					        <th>Responsable</th>
					        <th>Información de Contacto</th>
					        
					      </tr>
					    </thead>
					    <tbody>
					      <?php while((($resulRespCont->read())!==false)){ ?>
					      <tr>
					        <td><?php echo $resullRespC->nombre_convenio ?></td>
					        <td><?php echo $resullRespC->fecha_inicio." ".$resullResp->fecha_caducidad; ?></td>
					        <td><?php echo $resullRespC->objetivo_convenio." </br> Telf. ".$resullResp->tipo_convenio; ?></td>
					        
					      </tr>
					     <?php } ?>
					    </tbody>
					  </table>
					</div>
		  		</li>
		  		
		  	</ul>

		</div>		
	</div>

    <a href="#demo3" class="list-group-item" data-toggle="collapse"><h4>Características del convenio<span class="glyphicon glyphicon-plus-sign pull-right"></span></h4></a>
	<div class="collapse" id="demo3">
		<div  class="list-group-item">
			<ul>
				<li>Clasificación: 
					<?php 
					 $modelClass=Clasificacionconvenios::model()->findByPk($model->clasificacionConvenios_idTipoConvenio);
			      	 echo $modelClass->nombreClasificacionConvenio; 	
			      	 ?>
				</li>
				<li>Alcance: </li>
				
			</ul>
		</div>
	</div>
</div>




