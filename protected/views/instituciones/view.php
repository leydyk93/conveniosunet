<?php
/* @var $this InstitucionesController */
/* @var $model Instituciones */

$this->breadcrumbs=array(
	'Instituciones'=>array('index'),
	$model->idInstitucion,
);

$this->menu=array(
	array('label'=>'List Instituciones', 'url'=>array('index')),
	array('label'=>'Create Instituciones', 'url'=>array('create')),
	array('label'=>'Update Instituciones', 'url'=>array('update', 'id'=>$model->idInstitucion)),
	array('label'=>'Delete Instituciones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idInstitucion),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Instituciones', 'url'=>array('admin')),
);
?>

<h1>View Instituciones #<?php echo $model->idInstitucion; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idInstitucion',
		'nombre_institucion',
	),
)); ?>
