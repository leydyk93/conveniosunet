<?php
/* @var $this ConveniosController */
/* @var $model Convenios */

$this->breadcrumbs=array(
	'Convenioses'=>array('index'),
	$model->idConvenio=>array('view','id'=>$model->idConvenio),
	'Update',
);

$this->menu=array(
	array('label'=>'List Convenios', 'url'=>array('index')),
	array('label'=>'Create Convenios', 'url'=>array('create')),
	array('label'=>'View Convenios', 'url'=>array('view', 'id'=>$model->idConvenio)),
	array('label'=>'Manage Convenios', 'url'=>array('admin')),
);
?>

<h1>Update Convenios <?php echo $model->idConvenio; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>