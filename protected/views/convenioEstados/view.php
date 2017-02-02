<?php
/* @var $this ConvenioEstadosController */
/* @var $model ConvenioEstados */

$this->breadcrumbs=array(
	'Convenio Estadoses'=>array('index'),
	$model->id_convenio_estado,
);

$this->menu=array(
	array('label'=>'List ConvenioEstados', 'url'=>array('index')),
	array('label'=>'Create ConvenioEstados', 'url'=>array('create')),
	array('label'=>'Update ConvenioEstados', 'url'=>array('update', 'id'=>$model->id_convenio_estado)),
	array('label'=>'Delete ConvenioEstados', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_convenio_estado),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ConvenioEstados', 'url'=>array('admin')),
);
?>

<h1>View ConvenioEstados #<?php echo $model->id_convenio_estado; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_convenio_estado',
		'convenios_idConvenio',
		'estadoConvenios_idEstadoConvenio',
		'fechaCambioEstado',
		'numeroReporte',
		'observacionCambioEstado',
		'dependencias_idDependencia',
	),
)); ?>
