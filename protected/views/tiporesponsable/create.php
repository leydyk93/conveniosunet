<?php
/* @var $this TiporesponsableController */
/* @var $model Tiporesponsable */

$this->breadcrumbs=array(
	'Tipo Responsables'=>array('admin'),
	'Crear',
);

/*$this->menu=array(
	array('label'=>'List Tiporesponsable', 'url'=>array('index')),
	array('label'=>'Manage Tiporesponsable', 'url'=>array('admin')),
);*/
?>
<div class="container">
	<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	<ul class="breadcrumb text-right">
	  <li><a href="<?php echo $this->createUrl("site/configuracion"); ?>">Gestion de la Base de Datos</a></li>
	  <li><a href="<?php echo $this->createUrl("admin"); ?>">Listar Tipo Responsable</a></li>
	</ul>
</div>