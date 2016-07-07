<?php
/* @var $this InstitucionConveniosController */
/* @var $model InstitucionConvenios */

$this->breadcrumbs=array(
	'Institucion Convenioses'=>array('index'),
	$model->idInstitucionConvenio=>array('view','id'=>$model->idInstitucionConvenio),
	'Update',
);

$this->menu=array(
	array('label'=>'List InstitucionConvenios', 'url'=>array('index')),
	array('label'=>'Create InstitucionConvenios', 'url'=>array('create')),
	array('label'=>'View InstitucionConvenios', 'url'=>array('view', 'id'=>$model->idInstitucionConvenio)),
	array('label'=>'Manage InstitucionConvenios', 'url'=>array('admin')),
);
?>

<h1>Update InstitucionConvenios <?php echo $model->idInstitucionConvenio; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>