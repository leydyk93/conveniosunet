<?php
/* @var $this ResponsablesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Responsables',
);

$this->menu=array(
	array('label'=>'Create Responsables', 'url'=>array('create')),
	array('label'=>'Manage Responsables', 'url'=>array('admin')),
);
?>

<h1>Responsables</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
