<?php
/* @var $this ClasificacionconveniosController */
/* @var $model Clasificacionconvenios */

$this->breadcrumbs=array(
	'Clasificacionconvenioses'=>array('index'),
	$model->idClasificacionConvenio,
);

$this->menu=array(
	array('label'=>'List Clasificacionconvenios', 'url'=>array('index')),
	array('label'=>'Create Clasificacionconvenios', 'url'=>array('create')),
	array('label'=>'Update Clasificacionconvenios', 'url'=>array('update', 'id'=>$model->idClasificacionConvenio)),
	array('label'=>'Delete Clasificacionconvenios', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idClasificacionConvenio),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Clasificacionconvenios', 'url'=>array('admin')),
);
?>

<h1>View Clasificacionconvenios #<?php echo $model->idClasificacionConvenio; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idClasificacionConvenio',
		'nombreClasificacionConvenio',
		'descripcionClasificacionConvenio',
	),
)); ?>
