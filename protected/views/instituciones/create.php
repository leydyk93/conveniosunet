<?php
/* @var $this InstitucionesController */
/* @var $model Instituciones */

$this->breadcrumbs=array(
	'Instituciones'=>array('admin'),
	'Crear',
);

/*$this->menu=array(
	array('label'=>'List Instituciones', 'url'=>array('index')),
	array('label'=>'Manage Instituciones', 'url'=>array('admin')),
);*/
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<ul class="breadcrumb text-right">
  <li><a href="<?php echo $this->createUrl("site/configuracion"); ?>">Gestion de la Base de Datos</a></li>
  <li><a href="<?php echo $this->createUrl("admin"); ?>">Listar Instituciones</a></li>
</ul>