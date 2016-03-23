<?php
/* @var $this ConvenioController */
/* @var $model Convenio */

$this->breadcrumbs=array(
	'Convenios'=>array('index'),
	$model->cod_convenio,
);

$this->menu=array(
	array('label'=>'List Convenio', 'url'=>array('index')),
	array('label'=>'Create Convenio', 'url'=>array('create')),
	array('label'=>'Update Convenio', 'url'=>array('update', 'id'=>$model->cod_convenio)),
	array('label'=>'Delete Convenio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cod_convenio),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Convenio', 'url'=>array('admin')),
);
?>

<h1>View Convenio #<?php echo $model->cod_convenio; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cod_convenio',
		'nombre_convenio',
		'fecha_creacion',
		'fecha_caducidad',
		'institucion_UNET',
		'objetivo_covenio',
		'cod_clasificacion',
	),
)); ?>
