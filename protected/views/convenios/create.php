<?php
/* @var $this ConveniosController */
/* @var $model Convenios */

$this->breadcrumbs=array(
	'Convenioses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Convenios', 'url'=>array('index')),
	array('label'=>'Manage Convenios', 'url'=>array('admin')),
);
?>

<h1>Create Convenios</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>