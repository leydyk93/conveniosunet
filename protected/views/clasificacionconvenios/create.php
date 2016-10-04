<?php
/* @var $this ClasificacionconveniosController */
/* @var $model Clasificacionconvenios */

$this->breadcrumbs=array(
	'Clasificacionconvenioses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Clasificacionconvenios', 'url'=>array('index')),
	array('label'=>'Manage Clasificacionconvenios', 'url'=>array('admin')),
);
?>

<h1>Create Clasificacionconvenios</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>