<?php
/* @var $this DependenciasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dependenciases',
);

$this->menu=array(
	array('label'=>'Create Dependencias', 'url'=>array('create')),
	array('label'=>'Manage Dependencias', 'url'=>array('admin')),
);
?>

<h1>Dependenciases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
