<?php
/* @var $this InstitucionesController */
/* @var $model Instituciones */

$this->breadcrumbs=array(
	'Instituciones'=>array('index'),
	$model->idInstitucion=>array('view','id'=>$model->idInstitucion),
	'Update',
);

$this->menu=array(
	array('label'=>'List Instituciones', 'url'=>array('index')),
	array('label'=>'Create Instituciones', 'url'=>array('create')),
	array('label'=>'View Instituciones', 'url'=>array('view', 'id'=>$model->idInstitucion)),
	array('label'=>'Manage Instituciones', 'url'=>array('admin')),
);
?>

<h1>Update Instituciones <?php echo $model->idInstitucion; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>