<?php
/* @var $this EstadoconveniosController */
/* @var $model Estadoconvenios */

$this->breadcrumbs=array(
	'Estadoconvenioses'=>array('index'),
	$model->idEstadoConvenio,
);

$this->menu=array(
	array('label'=>'List Estadoconvenios', 'url'=>array('index')),
	array('label'=>'Create Estadoconvenios', 'url'=>array('create')),
	array('label'=>'Update Estadoconvenios', 'url'=>array('update', 'id'=>$model->idEstadoConvenio)),
	array('label'=>'Delete Estadoconvenios', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idEstadoConvenio),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Estadoconvenios', 'url'=>array('admin')),
);
?>

<h1>View Estadoconvenios #<?php echo $model->idEstadoConvenio; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idEstadoConvenio',
		'nombreEstadoConvenio',
		'descripcionEstadoConvenio',
	),
)); ?>
