<?php
/* @var $this TiporesponsableController */
/* @var $model Tiporesponsable */

$this->breadcrumbs=array(
	'Tipo responsables'=>array('admin'),
	$model->idTipoResponsable=>array('view','id'=>$model->idTipoResponsable),
	'Modificar',
);

/*$this->menu=array(
	array('label'=>'List Tiporesponsable', 'url'=>array('index')),
	array('label'=>'Create Tiporesponsable', 'url'=>array('create')),
	array('label'=>'View Tiporesponsable', 'url'=>array('view', 'id'=>$model->idTipoResponsable)),
	array('label'=>'Manage Tiporesponsable', 'url'=>array('admin')),
);*/
?>

<div class="container">
	<?php $this->renderPartial('_form', array('model'=>$model)); ?>

	<ul class="breadcrumb text-right">
	  <li><a href="<?php echo $this->createUrl("site/configuracion"); ?>">Gestion de la Base de Datos</a></li>
	  <li><a href="<?php echo $this->createUrl("admin"); ?>">Listar Tipo de Responsables</a></li>
	</ul>
</div>