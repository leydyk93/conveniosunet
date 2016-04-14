<?php
/* @var $this ConveniosController */
/* @var $model Convenios */

$this->breadcrumbs=array(
	'Convenios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Convenios', 'url'=>array('index')),
	array('label'=>'Manage Convenios', 'url'=>array('admin')),
);
?>

<h1>Crear Convenios</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>