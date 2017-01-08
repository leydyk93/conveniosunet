<?php
/* @var $this TiposinstitucionesController */
/* @var $model Tiposinstituciones */

$this->breadcrumbs=array(
	'Tiposinstituciones'=>array('index'),
	$model->idTipoInstitucion,
);

$this->menu=array(
	array('label'=>'List Tiposinstituciones', 'url'=>array('index')),
	array('label'=>'Create Tiposinstituciones', 'url'=>array('create')),
	array('label'=>'Update Tiposinstituciones', 'url'=>array('update', 'id'=>$model->idTipoInstitucion)),
	array('label'=>'Delete Tiposinstituciones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idTipoInstitucion),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tiposinstituciones', 'url'=>array('admin')),
);
?>

<h1>View Tiposinstituciones #<?php echo $model->idTipoInstitucion; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idTipoInstitucion',
		'nombreTipoInstitucion',
	),
)); ?>
