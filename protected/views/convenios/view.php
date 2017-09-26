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

<div class="container">
 <div id="Mostrar" class="list-group panel">
	
	<?php if(!Yii::app()->user->isGuest):?>
					 	<div class="text-right">

					 		<ul class='list-inline'>
						 	
						 		<li><a href="<?php echo $this->createUrl("/convenios/updateConvenio",array('id'=>$model->idConvenio)); ?>" data-toggle='tooltip' title='Editar'><span class='glyphicon glyphicon-pencil'></span>Editar</a></li>
	 							<li><a href="<?php echo $this->createUrl("/convenios/renovar",array('id'=>$model->idConvenio)); ?>" data-toggle='tooltip' title='Renovar'><span class='glyphicon glyphicon-time'></span>Renovar</a></li>
	 						
		 						<!--<li><a href="<?php //echo $this->createUrl("/convenios/cambiarEstado")."&id=".$resull3->id_convenio; ?>" sdata-toggle='tooltip' title='Cambiar Estado'><span class='glyphicon glyphicon-refresh'></span></a></li>-->
								<?php if($model->urlConvenio!=null):?>
								<li><a href="<?php echo $model->urlConvenio; ?>" data-toggle='tooltip' title='Descargar' download='<?php echo $model->idConvenio."Convenio"; ?>'><span class='glyphicon glyphicon-download-alt'></span>Descargar</a></li>
		                       	 <?php endif?>
	                       
	                        	<li><a href="<?php echo $this->createUrl("/convenios/eliminar",array('id'=>$model->idConvenio)); ?>" onclick='return confirm("Esta seguro de eliminar el convenio");' data-toggle='tooltip' title='Eliminar'><span class='glyphicon glyphicon-trash'></span>Eliminar</a></li>
						 	
						 	</ul>
				 		</div>
		<?php endif?>
	 <a href="#" class="list-group-item opcion" data-toggle="collapse"><h4>Datos generales del Convenio</h4></a>

	<!--<div class="collapse" id="demo1">-->
	 	<div class="list-group-item">
	 		<ul>
		  		<!--<li>Codigo: <?php /*echo $model->idConvenio; */?></li>-->
		  		<li><strong class='text-info' >Nombre:</strong> <?php echo $model->nombreConvenio; ?></li>
		  		<li><strong class='text-info' >Objetivo:</strong><?php echo $model->objetivoConvenio; ?></li>
		  		<li><strong class='text-info' >Tipo: </strong><?php 
		  			 $modelTipo=Tipoconvenios::model()->findByPk($model->tipoConvenios_idTipoConvenio);
			      	 echo  $modelTipo->descripcionTipoConvenio;
			      	 ?>
			    </li>
			    <li><strong class='text-info' >Fecha Inicio:</strong> <?php echo $model->fechaInicioConvenio; ?></li>
			    <li><strong class='text-info' >Fecha Caducidad:</strong><?php echo $model->fechaCaducidadConvenio; ?></li>
			    <!--<li>Estado Actual:<small> <?php //echo $estado; ?></small>-->
			 	</li>
		  	</ul>

	 	</div>
	<!--</div>-->


	<a href="#demo2" class="list-group-item" data-toggle="collapse"><h4>Información de las Partes<span class="glyphicon glyphicon-plus-sign pull-right"></span></h4></a>
	<div class="collapse" id="demo2">
		<div  class="list-group-item">
			
			<h4>UNET <small><?php echo $model->institucionUNET ?></small></h4>
		  	<?php if(!Yii::app()->user->isGuest):?>
		  	<h5>Responsables</h5>
		  			<div class="table-responsive">
		  			<table class="table table-bordered">
					    <thead>
					      <tr>
					        <th  class='text-info'>Tipo </th>
					        <th  class='text-info'>Responsable</th>
					        <th  class='text-info'>Información de Contacto</th>
					        
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
			<?php endif?>
		  		
		  	<h4>Contraparte </h4>
		  	
		 	<?php while((($resulRC->read())!==false)){ ?>
		
				<h4><?php echo $resullRespCONT->tipo_convenio; ?><small><?php echo " ".$resullRespCONT->objetivo_convenio." (".$resullRespCONT->estado_actual_convenio.",".$resullRespCONT->fecha_caducidad.")" ?></small></h4>
		 		<?php if(!Yii::app()->user->isGuest):?>
		 		 <h5>Responsables</h5>   
		 		    <div class="table-responsive">
				  			<table class="table table-bordered">
							    <thead>
							      <tr>
							        <th  class='text-info'>Tipo </th>
							        <th  class='text-info'>Responsable</th>
							        <th  class='text-info'>Información de Contacto</th>
							     
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
							<?php endif?>
		 		<?php } ?>

		</div>		
	</div>

    <a href="#demo3" class="list-group-item" data-toggle="collapse"><h4>Características del convenio<span class="glyphicon glyphicon-plus-sign pull-right"></span></h4></a>
	<div class="collapse" id="demo3">
		<div  class="list-group-item">
			<ul>
				<li><strong  class='text-info'>Clasificación: </strong>
					<?php 
					 $modelClass=Clasificacionconvenios::model()->findByPk($model->clasificacionConvenios_idTipoConvenio);
			      	 echo $modelClass->nombreClasificacionConvenio; 	
			      	 ?>
				</li>
				<li><strong  class='text-info'>Alcance: </strong><?php echo $model->alcanceConvenios; ?></li>
				<?php if(isset($urlActa[0]->urlActaIntencion)){ ?>
					<div class="text-right">
							Descargar Acta Intención
							<a href="<?php  echo $urlActa[0]->urlActaIntencion; ?>" download="ActaIntencion.pdf"><span class="glyphicon glyphicon-arrow-down"></span></a>
					</div>
			
				<?php } ?>
				
			</ul>
		</div>
	</div>
</div>

<ul class="breadcrumb text-right">
  <li><a href="<?php echo $this->createUrl("site/index"); ?>">Home</a></li>
  <li><a href="<?php echo $this->createUrl("convenios/consultar"); ?>">consultar Convenios</a></li>
</ul>
</div>









