<?php
/* @var $this TiposinstitucionesController */
/* @var $model Tiposinstituciones */

$this->breadcrumbs=array(
	'Tipos instituciones'=>array('admin'),
	'Crear',
);

/*$this->menu=array(
	array('label'=>'List Tiposinstituciones', 'url'=>array('index')),
	array('label'=>'Manage Tiposinstituciones', 'url'=>array('admin')),
);*/
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<ul class="breadcrumb text-right">
  <li><a href="<?php echo $this->createUrl("site/configuracion"); ?>">Gestion de la Base de Datos</a></li>
  <li><a href="<?php echo $this->createUrl("admin"); ?>">Listar Tipos Instituciones</a></li>
</ul>