<?php
/* @var $this TipoconveniosController */
/* @var $model Tipoconvenios */

$this->breadcrumbs=array(
	'Tipo convenios'=>array('index'),
	$model->idTipoConvenio=>array('view','id'=>$model->idTipoConvenio),
	'Modificar',
);

/*$this->menu=array(
	array('label'=>'List Tipoconvenios', 'url'=>array('index')),
	array('label'=>'Create Tipoconvenios', 'url'=>array('create')),
	array('label'=>'View Tipoconvenios', 'url'=>array('view', 'id'=>$model->idTipoConvenio)),
	array('label'=>'Manage Tipoconvenios', 'url'=>array('admin')),
);*/
?>

<div class="row">
	<div  class="nuevo col-md-12 text-center">
		 <h4>Tipo de Convenio</h4>
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

		<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	
	</div>
</div>

