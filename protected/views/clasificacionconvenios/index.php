<?php
/* @var $this ClasificacionconveniosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Clasificacionconvenioses',
);

$this->menu=array(
	array('label'=>'Create Clasificacionconvenios', 'url'=>array('create')),
	array('label'=>'Manage Clasificacionconvenios', 'url'=>array('admin')),
);
?>

<h1>Clasificacionconvenioses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
