<?php
/* @var $this TiporesponsableController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tiporesponsables',
);

$this->menu=array(
	array('label'=>'Create Tiporesponsable', 'url'=>array('create')),
	array('label'=>'Manage Tiporesponsable', 'url'=>array('admin')),
);
?>

<h1>Tiporesponsables</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
