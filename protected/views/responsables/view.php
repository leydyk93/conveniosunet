<?php
/* @var $this ResponsablesController */
/* @var $model Responsables */

$this->breadcrumbs=array(
	'Responsables'=>array('index'),
	$model->idResponsable,
);

$this->menu=array(
	array('label'=>'List Responsables', 'url'=>array('index')),
	array('label'=>'Create Responsables', 'url'=>array('create')),
	array('label'=>'Update Responsables', 'url'=>array('update', 'id'=>$model->idResponsable)),
	array('label'=>'Delete Responsables', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idResponsable),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Responsables', 'url'=>array('admin')),
);
?>

<h1>View Responsables #<?php echo $model->idResponsable; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idResponsable',
		'primerNombreResponsable',
		'segundoNombreResponsable',
		'primerApellidoResponsable',
		'segundoApellidoResponsable',
		'correoElectronicoResponsable',
		'telefonoResponsable',
		'instituciones_idInstitucion',
		'dependencias_idDependencia',
	),
)); ?>
