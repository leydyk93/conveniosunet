<?php
/* @var $this ConvenioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Convenios',
);

$this->menu=array(
	array('label'=>'Create Convenio', 'url'=>array('create')),
	array('label'=>'Manage Convenio', 'url'=>array('admin')),
);
?>

<h1>Convenios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
