<?php
/* @var $this EstadosController */
/* @var $model Estados */

$this->breadcrumbs=array(
	'Manage',
	'Gestion base Datos'=>array('site/configuracion'),
	'Listar Estados y Provincias',
);

/*$this->menu=array(
	array('label'=>'List Estados', 'url'=>array('index')),
	array('label'=>'Create Estados', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#estados-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");*/
?>



<?php /*echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); */?>
<!--</div>--><!-- search-form -->

<div class="container">
	<div class="row">
	 <div class="col-sm-6">
	 <h4>Tabla: Estados y Provincias</h4>
	 </div>	
	 <div class="col-sm-6">
	 	<div class="text-right">
	 		<?php echo CHtml::link('Nuevo estado o Provincia',array('create'),array('class'=>'btn btn-conv btn-md')); ?>
	 	</div>
	 </div>
	</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'estados-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'idEstado',
		'nombreEstado',
			array(
				            'header'=>'Pais',
				            'name' =>'paises_idPais',
				            'value'=>'$data->paisesIdPais->nombrePais',
				            'filter'=>CHtml::listData(Paises::model()->findAll(),'idPais','nombrePais'),
				        ),
			array(
				'class'=>'CButtonColumn', 'header'=>'Operaciones', 'template'=>'<span>{update}</span> <span>{delete}</span>',
				'buttons'=>array(
				        'update'=> array(
				            'label'=>'',
				            'imageUrl'=>'',
				            'options'=>array( 'class'=>'glyphicon glyphicon-pencil' ),
				        ),
				        'delete'=>array(
				            'label'=>'',
				            'imageUrl'=>'',
				            'options'=>array( 'class'=>'glyphicon glyphicon-remove' ),
				        ),
				    ),


			),
	),
)); ?>

	<ul class="breadcrumb text-right">
	  <li><a href="<?php echo $this->createUrl("site/index"); ?>">Home</a></li>
	  <li><a href="<?php echo $this->createUrl("site/configuracion"); ?>">Gestion de la Base de Datos</a></li>
	</ul>
</div>
