<?php
/* @var $this TipoconveniosController */
/* @var $model Tipoconvenios */

$this->breadcrumbs=array(
	'Tipo Convenios'=>array('index'),
	'Gestionar',
);

/*$this->menu=array(
	array('label'=>'List Tipoconvenios', 'url'=>array('index')),
	array('label'=>'Create Tipoconvenios', 'url'=>array('create')),
);*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tipoconvenios-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
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
	</div>  
	<div class="col-sm-9">

		<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
		<div class="search-form" style="display:none">
		<?php $this->renderPartial('_search',array(
			'model'=>$model,
		)); ?>
		</div><!-- search-form -->

		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'tipoconvenios-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'columns'=>array(
				'idTipoConvenio',
				'descripcionTipoConvenio',
				array(
					'class'=>'CButtonColumn',
				),
			),
		)); ?>
	
	</div>
</div>





