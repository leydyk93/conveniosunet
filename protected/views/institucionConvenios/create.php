<?php
/* @var $this InstitucionConveniosController */
/* @var $model InstitucionConvenios */

$this->breadcrumbs=array(
	'Institucion Convenioses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List InstitucionConvenios', 'url'=>array('index')),
	array('label'=>'Manage InstitucionConvenios', 'url'=>array('admin')),
);
?>

<h1>Create InstitucionConvenios</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>