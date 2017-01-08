<?php
/* @var $this TiporesponsableController */
/* @var $model Tiporesponsable */

$this->breadcrumbs=array(
	'Tiporesponsables'=>array('index'),
	$model->idTipoResponsable,
);

$this->menu=array(
	array('label'=>'List Tiporesponsable', 'url'=>array('index')),
	array('label'=>'Create Tiporesponsable', 'url'=>array('create')),
	array('label'=>'Update Tiporesponsable', 'url'=>array('update', 'id'=>$model->idTipoResponsable)),
	array('label'=>'Delete Tiporesponsable', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idTipoResponsable),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tiporesponsable', 'url'=>array('admin')),
);
?>

<h1>View Tiporesponsable #<?php echo $model->idTipoResponsable; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idTipoResponsable',
		'descripcionTipoResponsable',
	),
)); ?>
