<?php
/* @var $this InstitucionesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Instituciones',
);

$this->menu=array(
	array('label'=>'Create Instituciones', 'url'=>array('create')),
	array('label'=>'Manage Instituciones', 'url'=>array('admin')),
);
?>

<h1>Instituciones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
