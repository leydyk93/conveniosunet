<?php
/* @var $this ConveniosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Convenios',
);

$this->menu=array(
	array('label'=>'Create Convenios', 'url'=>array('create')),
	array('label'=>'Manage Convenios', 'url'=>array('admin')),
);
?>

<h1>Convenios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
