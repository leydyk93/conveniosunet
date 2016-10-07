<?php
/* @var $this TipoconveniosController */
/* @var $model Tipoconvenios */

$this->breadcrumbs=array(
	'Tipo convenios'=>array('index'),
	$model->idTipoConvenio=>array('view','id'=>$model->idTipoConvenio),
	'Modificar',
);

/*$this->menu=array(
	array('label'=>'List Tipoconvenios', 'url'=>array('index')),
	array('label'=>'Create Tipoconvenios', 'url'=>array('create')),
	array('label'=>'View Tipoconvenios', 'url'=>array('view', 'id'=>$model->idTipoConvenio)),
	array('label'=>'Manage Tipoconvenios', 'url'=>array('admin')),
);*/
?>

<div class="row">
	<div  class="nuevo col-md-12 text-left">
		 <h4>Tabla: Tipo de convenio</h4>
	</div>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>