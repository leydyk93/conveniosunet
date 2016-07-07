<?php
/* @var $this InstitucionConveniosController */
/* @var $model InstitucionConvenios */

$this->breadcrumbs=array(
	'Institucion Convenioses'=>array('index'),
	$model->idInstitucionConvenio,
);

$this->menu=array(
	array('label'=>'List InstitucionConvenios', 'url'=>array('index')),
	array('label'=>'Create InstitucionConvenios', 'url'=>array('create')),
	array('label'=>'Update InstitucionConvenios', 'url'=>array('update', 'id'=>$model->idInstitucionConvenio)),
	array('label'=>'Delete InstitucionConvenios', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idInstitucionConvenio),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage InstitucionConvenios', 'url'=>array('admin')),
);
?>

<h1>View InstitucionConvenios #<?php echo $model->idInstitucionConvenio; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idInstitucionConvenio',
		'instituciones_idInstitucion',
		'convenios_idConvenio',
		'fechaIncorporacion',
	),
)); ?>
