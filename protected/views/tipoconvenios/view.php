<?php
/* @var $this TipoconveniosController */
/* @var $model Tipoconvenios */

$this->breadcrumbs=array(
	'Tipo convenios'=>array('index'),
	$model->idTipoConvenio,
);

/*$this->menu=array(
	array('label'=>'List Tipoconvenios', 'url'=>array('index')),
	array('label'=>'Create Tipoconvenios', 'url'=>array('create')),
	array('label'=>'Update Tipoconvenios', 'url'=>array('update', 'id'=>$model->idTipoConvenio)),
	array('label'=>'Delete Tipoconvenios', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idTipoConvenio),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tipoconvenios', 'url'=>array('admin')),
);*/
?>

<div class="row">
	<div  class="nuevo col-md-12 text-center">
		 <h4>Tipos de Convenio: Detallado del Tipo <?php echo $model->descripcionTipoConvenio; ?></h4>
	</div>
</div>


 <div class="row">
	  <div class="col-sm-3">
			 <ul class="nav nav-pills nav-stacked">
			  <li><a href="#">Tipo de Convenio</a></li>
			  <li><a href="<?php echo $this->createUrl('/tipoconvenios/create'); ?>">Crear </a></li>
			  <li><a href="<?php echo $this->createUrl('/tipoconvenios/index'); ?>">Listar</a></li>
			  <li><a href="<?php echo $this->createUrl('/tipoconvenios/admin'); ?>">Gestionar</a></li>
			</ul>
	</div>  
	<div class="col-sm-9">

	<div class="well">
		<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
				'idTipoConvenio',
				'descripcionTipoConvenio',
			),
		)); ?>
	</div>
	
	</div>
</div>


