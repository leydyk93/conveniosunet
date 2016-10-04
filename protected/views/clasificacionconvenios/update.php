<?php
/* @var $this ClasificacionconveniosController */
/* @var $model Clasificacionconvenios */

$this->breadcrumbs=array(
	'Clasificacionconvenioses'=>array('index'),
	$model->idClasificacionConvenio=>array('view','id'=>$model->idClasificacionConvenio),
	'Update',
);

$this->menu=array(
	array('label'=>'List Clasificacionconvenios', 'url'=>array('index')),
	array('label'=>'Create Clasificacionconvenios', 'url'=>array('create')),
	array('label'=>'View Clasificacionconvenios', 'url'=>array('view', 'id'=>$model->idClasificacionConvenio)),
	array('label'=>'Manage Clasificacionconvenios', 'url'=>array('admin')),
);
?>

<h1>Update Clasificacionconvenios <?php echo $model->idClasificacionConvenio; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>