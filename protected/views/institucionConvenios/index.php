<?php
/* @var $this InstitucionConveniosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Institucion Convenioses',
);

$this->menu=array(
	array('label'=>'Create InstitucionConvenios', 'url'=>array('create')),
	array('label'=>'Manage InstitucionConvenios', 'url'=>array('admin')),
);
?>

<h1>Institucion Convenioses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
