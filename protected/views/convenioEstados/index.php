<?php
/* @var $this ConvenioEstadosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Convenio Estadoses',
);

$this->menu=array(
	array('label'=>'Create ConvenioEstados', 'url'=>array('create')),
	array('label'=>'Manage ConvenioEstados', 'url'=>array('admin')),
);
?>

<h1>Convenio Estadoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
