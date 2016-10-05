<?php
/* @var $this TipoconveniosController */
/* @var $model Tipoconvenios */

$this->breadcrumbs=array(
	'Tipo convenios'=>array('index'),
	'Crear',
);


?>

<div class="row">
	<div  class="nuevo col-md-12 text-center">
		 <h4>Tipos de Convenio</h4>
	</div>
</div>

<div class="row">
  <div class="col-sm-3">
 <ul class="nav nav-pills nav-stacked">
   			  <li><a href="#">Tipo de Convenio</a></li>
			  <li><a href="<?php echo $this->createUrl('/tipoconvenios/create'); ?>">Crear </a></li>
			  <li><a href="<?php echo $this->createUrl('/tipoconvenios/index'); ?>">Listar</a></li>
			  <li><a href="<?php echo $this->createUrl('/tipoconvenios/admin'); ?>">Gestionar</a></li>
</ul>
  	
  	<?php 

  	/* $this->menu=array(
	array('label'=>'Lista Tipos de Convenios', 'url'=>array('index')),
	array('label'=>'Gestion Tipos de Convenio', 'url'=>array('admin')),
	);*/

  	?>
  </div>
  <div class="col-sm-9">
  	
		  	<!--<h1>Crear un nuevo Tipo de convenio</h1>-->

		<?php $this->renderPartial('_form', array('model'=>$model)); ?>
  </div>
</div>



