<?php
/* @var $this InstitucionesController */
/* @var $model Instituciones */

$this->breadcrumbs=array(
	'Instituciones'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Instituciones', 'url'=>array('index')),
	array('label'=>'Manage Instituciones', 'url'=>array('admin')),
);
?>

<h1>Create Instituciones</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>