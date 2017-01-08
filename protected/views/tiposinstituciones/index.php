<?php
/* @var $this TiposinstitucionesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tiposinstituciones',
);

$this->menu=array(
	array('label'=>'Create Tiposinstituciones', 'url'=>array('create')),
	array('label'=>'Manage Tiposinstituciones', 'url'=>array('admin')),
);
?>

<h1>Tiposinstituciones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
