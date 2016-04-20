<?php
/* @var $this ConveniosController */
/* @var $model Convenios */

$this->breadcrumbs=array(
	'Convenios'=>array('index'),
	$model->idConvenio,
);

$this->menu=array(
	array('label'=>'List Convenios', 'url'=>array('index')),
	array('label'=>'Create Convenios', 'url'=>array('create')),
	array('label'=>'Update Convenios', 'url'=>array('update', 'id'=>$model->idConvenio)),
	array('label'=>'Delete Convenios', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idConvenio),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Convenios', 'url'=>array('admin')),
);
?>
<h1>Variables de Sesion<?php echo $_SESSION['Variable']; echo $model->objetivoConvenio ?></h1>
<h1>View Convenios #<?php echo $model->idConvenio; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idConvenio',
		'nombreConvenio',
		'fechaCaducidadConvenio',
		'objetivoConvenio',
		'institucionUNET',
		'urlConvenio',
		'clasificacionConvenios_idTipoConvenio',
		'tipoConvenios_idTipoConvenio',
		'alcanceConvenios_idAlcanceConvenio',
		'formaConvenios_idFormaConvenio',
		'dependencias_idDependencia',
		'convenios_idConvenio',
	),
)); ?>
