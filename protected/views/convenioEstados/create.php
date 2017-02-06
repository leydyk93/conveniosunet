<?php
/* @var $this ConvenioEstadosController */
/* @var $model ConvenioEstados */

$this->breadcrumbs=array(
	'Convenio Estadoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ConvenioEstados', 'url'=>array('index')),
	array('label'=>'Manage ConvenioEstados', 'url'=>array('admin')),
);
?>

<h1>Create ConvenioEstados</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>