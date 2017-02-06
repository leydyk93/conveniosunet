<?php
/* @var $this ClasificacionconveniosController */
/* @var $model Clasificacionconvenios */

$this->breadcrumbs=array(
	'Clasificacion Convenios'=>array('admin'),
	//$model->idClasificacionConvenio=>array('view','id'=>$model->idClasificacionConvenio),
	'Modificar',
);

/*$this->menu=array(
	array('label'=>'List Clasificacionconvenios', 'url'=>array('index')),
	array('label'=>'Create Clasificacionconvenios', 'url'=>array('create')),
	array('label'=>'View Clasificacionconvenios', 'url'=>array('view', 'id'=>$model->idClasificacionConvenio)),
	array('label'=>'Manage Clasificacionconvenios', 'url'=>array('admin')),
);*/
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<ul class="breadcrumb text-right">
  <li><a href="<?php echo $this->createUrl("site/configuracion"); ?>">Gestion de la Base de Datos</a></li>
  <li><a href="<?php echo $this->createUrl("admin"); ?>">Listar Clasificacion convenio</a></li>
</ul>