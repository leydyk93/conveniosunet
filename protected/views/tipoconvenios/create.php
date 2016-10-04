<?php
/* @var $this TipoconveniosController */
/* @var $model Tipoconvenios */

$this->breadcrumbs=array(
	'Tipoconvenioses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tipoconvenios', 'url'=>array('index')),
	array('label'=>'Manage Tipoconvenios', 'url'=>array('admin')),
);
?>

<h1>Create Tipoconvenios</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>