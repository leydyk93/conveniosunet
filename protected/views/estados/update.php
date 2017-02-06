<?php
/* @var $this EstadosController */
/* @var $model Estados */

$this->breadcrumbs=array(
	'Estados'=>array('admin'),
	//$model->idEstado=>array('view','id'=>$model->idEstado),
	'Modificar',
);

/*$this->menu=array(
	array('label'=>'List Estados', 'url'=>array('index')),
	array('label'=>'Create Estados', 'url'=>array('create')),
	array('label'=>'View Estados', 'url'=>array('view', 'id'=>$model->idEstado)),
	array('label'=>'Manage Estados', 'url'=>array('admin')),
);*/
?>

<div class="container">
<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	<ul class="breadcrumb text-right">
	  <li><a href="<?php echo $this->createUrl("site/configuracion"); ?>">Gestion de la Base de Datos</a></li>
	  <li><a href="<?php echo $this->createUrl("admin"); ?>">Listar Estados o Provincias</a></li>
	</ul>
</div>

