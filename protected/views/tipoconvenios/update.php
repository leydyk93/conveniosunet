<?php
/* @var $this TipoconveniosController */
/* @var $model Tipoconvenios */

$this->breadcrumbs=array(
	'Tipoconvenioses'=>array('index'),
	$model->idTipoConvenio=>array('view','id'=>$model->idTipoConvenio),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tipoconvenios', 'url'=>array('index')),
	array('label'=>'Create Tipoconvenios', 'url'=>array('create')),
	array('label'=>'View Tipoconvenios', 'url'=>array('view', 'id'=>$model->idTipoConvenio)),
	array('label'=>'Manage Tipoconvenios', 'url'=>array('admin')),
);
?>

<h1>Update Tipoconvenios <?php echo $model->idTipoConvenio; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>