<?php
/* @var $this EstadoconveniosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Estadoconvenioses',
);

$this->menu=array(
	array('label'=>'Create Estadoconvenios', 'url'=>array('create')),
	array('label'=>'Manage Estadoconvenios', 'url'=>array('admin')),
);
?>

<h1>Estadoconvenioses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
