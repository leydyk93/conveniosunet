<?php
/* @var $this InstitucionesController */
/* @var $model Instituciones */

$this->breadcrumbs=array(
	'Instituciones'=>array('admin'),
	//$model->idInstitucion=>array('view','id'=>$model->idInstitucion),
	'Modificar',
);

/*$this->menu=array(
	array('label'=>'List Instituciones', 'url'=>array('index')),
	array('label'=>'Create Instituciones', 'url'=>array('create')),
	array('label'=>'View Instituciones', 'url'=>array('view', 'id'=>$model->idInstitucion)),
	array('label'=>'Manage Instituciones', 'url'=>array('admin')),
);*/
?>

<div class="container">
	<?php $this->renderPartial('_form', array('model'=>$model,'pais'=>$pais)); ?>

	<ul class="breadcrumb text-right">
	  <li><a href="<?php echo $this->createUrl("site/configuracion"); ?>">Gestion de la Base de Datos</a></li>
	  <li><a href="<?php echo $this->createUrl("admin"); ?>">Listar Instituciones</a></li>
	</ul>
</div>