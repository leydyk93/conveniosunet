<?php
/* @var $this ConveniosController */
/* @var $model Convenios */

$this->breadcrumbs=array(
	'Convenios'=>array('consultar'),
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
<!--<div class="row">
	<div  class="nuevo col-md-12 text-left">
		 <h4>Convenio: <span><?php /*echo $model->nombreConvenio;*/ ?></span></h4>

	</div>

 </div>-->

 <div id="Mostrar" class="list-group panel">
	<a href="#" class="list-group-item opcion" data-toggle="collapse"><h4>Datos generales del Convenio</h4></a>
	<!--<div class="collapse" id="demo1">-->
	 	<div class="list-group-item">
	 		<ul>
		  		<!--<li>Codigo: <?php /*echo $model->idConvenio; */?></li>-->
		  		<li>Nombre: <?php echo $model->nombreConvenio; ?></li>
		  		<li>Objetivo:<small><?php echo $model->objetivoConvenio; ?></small></li>
		  		<li>Tipo: <small><?php 
		  			 $modelTipo=Tipoconvenios::model()->findByPk($model->tipoConvenios_idTipoConvenio);
			      	 echo  $modelTipo->descripcionTipoConvenio;
			      	 ?></small>
			    </li>
			    <li>Fecha Inicio: <small> <?php echo $model->fechaInicioConvenio; ?></small></li>
			    <li>Fecha Caducidad:<small><?php echo $model->fechaCaducidadConvenio; ?></small></li>
			    <li>Estado Actual:<small> <?php echo $estado; ?><?php 


			     ?></small>
			 	</li>
		  	</ul>

	 	</div>
	<!--</div>-->


	<a href="#demo2" class="list-group-item" data-toggle="collapse"><h4>Información de las Partes<span class="glyphicon glyphicon-plus-sign pull-right"></span></h4></a>
	<div class="collapse" id="demo2">
		<div  class="list-group-item">
			
			<h4>UNET <small><?php echo $model->institucionUNET ?></small></h4>
		  	<h5>Responsables</h5>
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
					      <?php while((($resulRU->read())!==false)){ ?>
					      <tr>
					        <td><?php echo $resullRespUNET->estado_actual_convenio ?></td>
					        <td><?php echo $resullRespUNET->fecha_inicio." ".$resullRespUNET->fecha_caducidad; ?></td>
					        <td><?php echo $resullRespUNET->objetivo_convenio." </br> Telf. ".$resullRespUNET->tipo_convenio; ?></td>
					        
					      </tr>
					     <?php } ?>
					    </tbody>
					  </table>
					</div>
		  		
		  	<h4>Contraparte </h4>
		  	
		 	<?php while((($resulRC->read())!==false)){ ?>
		
				<h4><?php echo $resullRespCONT->tipo_convenio; ?><small><?php echo " ".$resullRespCONT->objetivo_convenio." (".$resullRespCONT->estado_actual_convenio.",".$resullRespCONT->fecha_caducidad.")" ?></small></h4>
		 		 <h5>Responsables</h5>   
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
						
		 		    <?php for($i=0;$i<count($InforRC);$i++){ ?>

		 		    <?php if($resullRespCONT->institucion==$InforRC[$i]->institucion){?>
							
								<tr>
							        <td><?php echo $InforRC[$i]->tipo_institucion; ?></td>
							        <td><?php echo $InforRC[$i]->estado_actual_convenio." ".$InforRC[$i]->responsable_Unet; ?></td>
							        <td><?php echo $InforRC[$i]->clasificacion." Telf.".$InforRC[$i]->ambito; ?></td>
							        
							      </tr>
					<?php  }?>
		 		   
		 		<?php } ?>

				  			</tbody>
							  </table>
							</div>
		 		<?php } ?>

		</div>		
	</div>

    <a href="#demo3" class="list-group-item" data-toggle="collapse"><h4>Características del convenio<span class="glyphicon glyphicon-plus-sign pull-right"></span></h4></a>
	<div class="collapse" id="demo3">
		<div  class="list-group-item">
			<ul>
				<li>Clasificación: <small>
					<?php 
					 $modelClass=Clasificacionconvenios::model()->findByPk($model->clasificacionConvenios_idTipoConvenio);
			      	 echo $modelClass->nombreClasificacionConvenio; 	
			      	 ?></small>
				</li>
				<li>Alcance: <small> <?php echo $model->alcanceConvenios; ?> </small></li>
			</ul>
		</div>
	</div>
</div>










