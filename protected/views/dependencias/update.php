<?php
/* @var $this DependenciasController */
/* @var $model Dependencias */

$this->breadcrumbs=array(
	'Dependencias'=>array('admin'),
	//$model->idDependencia=>array('view','id'=>$model->idDependencia),
	'Modificar',
);

/*$this->menu=array(
	array('label'=>'List Dependencias', 'url'=>array('index')),
	array('label'=>'Create Dependencias', 'url'=>array('create')),
	array('label'=>'View Dependencias', 'url'=>array('view', 'id'=>$model->idDependencia)),
	array('label'=>'Manage Dependencias', 'url'=>array('admin')),
);*/
?>

<div class="container"> 
	<?php $this->renderPartial('_form', array('model'=>$model)); ?>

	<ul class="breadcrumb text-right">
	  <li><a href="<?php echo $this->createUrl("site/configuracion"); ?>">Gestion de la Base de Datos</a></li>
	  <li><a href="<?php echo $this->createUrl("admin"); ?>">Listar Dependencias</a></li>
	</ul>
</div>