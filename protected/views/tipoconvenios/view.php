<?php
/* @var $this TipoconveniosController */
/* @var $model Tipoconvenios */

$this->breadcrumbs=array(
	'Tipoconvenioses'=>array('index'),
	$model->idTipoConvenio,
);

$this->menu=array(
	array('label'=>'List Tipoconvenios', 'url'=>array('index')),
	array('label'=>'Create Tipoconvenios', 'url'=>array('create')),
	array('label'=>'Update Tipoconvenios', 'url'=>array('update', 'id'=>$model->idTipoConvenio)),
	array('label'=>'Delete Tipoconvenios', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idTipoConvenio),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tipoconvenios', 'url'=>array('admin')),
);
?>

<h1>View Tipoconvenios #<?php echo $model->idTipoConvenio; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idTipoConvenio',
		'descripcionTipoConvenio',
	),
)); ?>
