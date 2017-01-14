<?php
/* @var $this ResponsablesController */
/* @var $model Responsables */

$this->breadcrumbs=array(
	'Responsables'=>array('index'),
	'Crear',
);

/*$this->menu=array(
	array('label'=>'List Responsables', 'url'=>array('index')),
	array('label'=>'Manage Responsables', 'url'=>array('admin')),
);*/
?>

<div class="container"> 
	<?php $this->renderPartial('_form', array('model'=>$model,'pais'=>$pais,'estados'=>$estados,'tipoIns'=>$tipoIns,)); ?>

	<ul class="breadcrumb text-right">
	  <li><a href="<?php echo $this->createUrl("site/configuracion"); ?>">Gestión de la Base de Datos</a></li>
	  <li><a href="<?php echo $this->createUrl("admin"); ?>">Listar Responsables</a></li>
	</ul>
</div>
