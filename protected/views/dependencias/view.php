<?php
/* @var $this DependenciasController */
/* @var $model Dependencias */

$this->breadcrumbs=array(
	'Dependenciases'=>array('index'),
	$model->idDependencia,
);

$this->menu=array(
	array('label'=>'List Dependencias', 'url'=>array('index')),
	array('label'=>'Create Dependencias', 'url'=>array('create')),
	array('label'=>'Update Dependencias', 'url'=>array('update', 'id'=>$model->idDependencia)),
	array('label'=>'Delete Dependencias', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idDependencia),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Dependencias', 'url'=>array('admin')),
);
?>

<h1>View Dependencias #<?php echo $model->idDependencia; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idDependencia',
		'nombreDependencia',
		'telefonoDependencia',
	),
)); ?>
