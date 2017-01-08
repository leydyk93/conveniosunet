<?php
/* @var $this EstadoconveniosController */
/* @var $model Estadoconvenios */

$this->breadcrumbs=array(
	'Estado convenios'=>array('admin'),
	'Crear',
);

/*$this->menu=array(
	array('label'=>'List Estadoconvenios', 'url'=>array('index')),
	array('label'=>'Manage Estadoconvenios', 'url'=>array('admin')),
);*/
?>
<div class="container">
	<?php $this->renderPartial('_form', array('model'=>$model)); ?>

	<ul class="breadcrumb text-right">
	  <li><a href="<?php echo $this->createUrl("site/configuracion"); ?>">Gestion de la Base de Datos</a></li>
	  <li><a href="<?php echo $this->createUrl("admin"); ?>">Listar estados convenio</a></li>
	</ul>
</div>