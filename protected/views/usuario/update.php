<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('admin'),
	//$model->id=>array('view','id'=>$model->id),
	'Modificar',
);

/*$this->menu=array(
	array('label'=>'List Usuario', 'url'=>array('index')),
	array('label'=>'Create Usuario', 'url'=>array('create')),
	array('label'=>'View Usuario', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Usuario', 'url'=>array('admin')),
);*/
?>

<div class="container">

	<?php $this->renderPartial('_form', array('model'=>$model)); ?>

	<ul class="breadcrumb text-right">
	  <li><a href="<?php echo $this->createUrl("site/configuracion"); ?>">Gestion de la Base de Datos</a></li>
	  <li><a href="<?php echo $this->createUrl("admin"); ?>">Listar Usuarios</a></li>
	</ul>

</div>