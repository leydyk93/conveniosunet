<?php
/* @var $this ConvenioEstadosController */
/* @var $model ConvenioEstados */

$this->breadcrumbs=array(
	'Convenio Estadoses'=>array('index'),
	$model->id_convenio_estado=>array('view','id'=>$model->id_convenio_estado),
	'Update',
);

$this->menu=array(
	array('label'=>'List ConvenioEstados', 'url'=>array('index')),
	array('label'=>'Create ConvenioEstados', 'url'=>array('create')),
	array('label'=>'View ConvenioEstados', 'url'=>array('view', 'id'=>$model->id_convenio_estado)),
	array('label'=>'Manage ConvenioEstados', 'url'=>array('admin')),
);
?>

<h1>Update ConvenioEstados <?php echo $model->id_convenio_estado; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>