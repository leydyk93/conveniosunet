<?php
/* @var $this ResponsablesController */
/* @var $model Responsables */

$this->breadcrumbs=array(
	'Responsables'=>array('admin'),
	$model->idResponsable=>array('view','id'=>$model->idResponsable),
	'Modificar',
);

/*$this->menu=array(
	array('label'=>'List Responsables', 'url'=>array('index')),
	array('label'=>'Create Responsables', 'url'=>array('create')),
	array('label'=>'View Responsables', 'url'=>array('view', 'id'=>$model->idResponsable)),
	array('label'=>'Manage Responsables', 'url'=>array('admin')),
);*/
?>

<div class="container">
	<?php $this->renderPartial('_form', array('model'=>$model)); ?>

	<ul class="breadcrumb text-right">
	  <li><a href="<?php echo $this->createUrl("site/configuracion"); ?>">Gestion de la Base de Datos</a></li>
	  <li><a href="<?php echo $this->createUrl("admin"); ?>">Listar Instituciones</a></li>
	</ul>
</div>