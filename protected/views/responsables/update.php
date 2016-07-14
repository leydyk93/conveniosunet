<?php
/* @var $this ResponsablesController */
/* @var $model Responsables */

$this->breadcrumbs=array(
	'Responsables'=>array('index'),
	$model->idResponsable=>array('view','id'=>$model->idResponsable),
	'Update',
);

$this->menu=array(
	array('label'=>'List Responsables', 'url'=>array('index')),
	array('label'=>'Create Responsables', 'url'=>array('create')),
	array('label'=>'View Responsables', 'url'=>array('view', 'id'=>$model->idResponsable)),
	array('label'=>'Manage Responsables', 'url'=>array('admin')),
);
?>

<h1>Update Responsables <?php echo $model->idResponsable; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>