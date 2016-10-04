<?php
/* @var $this TipoconveniosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipoconvenioses',
);

$this->menu=array(
	array('label'=>'Create Tipoconvenios', 'url'=>array('create')),
	array('label'=>'Manage Tipoconvenios', 'url'=>array('admin')),
);
?>

<h1>Tipoconvenioses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
