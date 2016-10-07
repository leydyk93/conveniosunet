<?php
/* @var $this TipoconveniosController */
/* @var $model Tipoconvenios */

$this->breadcrumbs=array(
	'Tipo convenios'=>array('index'),
	'Crear',
);

/*$this->menu=array(
	array('label'=>'List Tipoconvenios', 'url'=>array('index')),
	array('label'=>'Manage Tipoconvenios', 'url'=>array('admin')),
);*/
?>

<div class="row">
	<div  class="nuevo col-md-12 text-left">
		 <h4>Tabla: Tipo de convenio</h4>
	</div>
</div>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>

