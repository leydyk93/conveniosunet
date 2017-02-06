<?php
/* @var $this TipoconveniosController */
/* @var $model Tipoconvenios */

$this->breadcrumbs=array(
	'Tipo convenios'=>array('admin'),
	//$model->idTipoConvenio=>array('view','id'=>$model->idTipoConvenio),
	'Modificar',
);

/*$this->menu=array(
	array('label'=>'List Tipoconvenios', 'url'=>array('index')),
	array('label'=>'Create Tipoconvenios', 'url'=>array('create')),
	array('label'=>'View Tipoconvenios', 'url'=>array('view', 'id'=>$model->idTipoConvenio)),
	array('label'=>'Manage Tipoconvenios', 'url'=>array('admin')),
);*/
?>

<div class="container">
	<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	<ul class="breadcrumb text-right">
	  <li><a href="<?php echo $this->createUrl("site/configuracion"); ?>">Gestion de la Base de Datos</a></li>
	  <li><a href="<?php echo $this->createUrl("admin"); ?>">Listar Tipo de convenio</a></li>
	</ul>
</div>