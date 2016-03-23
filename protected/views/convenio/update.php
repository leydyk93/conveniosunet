<?php
/* @var $this ConvenioController */
/* @var $model Convenio */

$this->breadcrumbs=array(
	'Convenios'=>array('index'),
	$model->cod_convenio=>array('view','id'=>$model->cod_convenio),
	'Update',
);

$this->menu=array(
	array('label'=>'List Convenio', 'url'=>array('index')),
	array('label'=>'Create Convenio', 'url'=>array('create')),
	array('label'=>'View Convenio', 'url'=>array('view', 'id'=>$model->cod_convenio)),
	array('label'=>'Manage Convenio', 'url'=>array('admin')),
);
?>

<h1>Update Convenio <?php echo $model->cod_convenio; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>