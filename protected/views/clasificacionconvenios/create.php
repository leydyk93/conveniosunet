<?php
/* @var $this ClasificacionconveniosController */
/* @var $model Clasificacionconvenios */

$this->breadcrumbs=array(
	'Clasificacion Convenios'=>array('admin'),
	'Crear',
);

/*$this->menu=array(
	array('label'=>'List Clasificacionconvenios', 'url'=>array('index')),
	array('label'=>'Manage Clasificacionconvenios', 'url'=>array('admin')),
);*/
?>

<div class="container">
	<?php $this->renderPartial('_form', array('model'=>$model)); ?>

	<ul class="breadcrumb text-right">
	  <li><a href="<?php echo $this->createUrl("site/configuracion"); ?>">Gestion de la Base de Datos</a></li>
	  <li><a href="<?php echo $this->createUrl("admin"); ?>">Listar Clasificación convenio</a></li>
	</ul>
</div>