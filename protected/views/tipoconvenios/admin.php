<?php
/* @var $this TipoconveniosController */
/* @var $model Tipoconvenios */
$this->breadcrumbs=array(
	'Gestion base Datos'=>array('site/configuracion'),
	'Listar tipo convenio',
);
/*$this->menu=array(
	array('label'=>'List Tipoconvenios', 'url'=>array('index')),
	array('label'=>'Create Tipoconvenios', 'url'=>array('create')),
);*/

/*Yii::app()->clientScript->registerScript('search', "
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
");*/
?>

<div class="container">
	<div class="row">
	 <div class="col-sm-6">
	 <h4>Tabla: Tipo de Convenio</h4>
	 </div>	
	 <div class="col-sm-6">
	 	<div class="text-right">
	 		<?php echo CHtml::link('Nuevo tipo de convenio',array('create'),array('class'=>'btn btn-conv btn-md')); ?>
	 	</div>
	 </div>
	</div>


<?php /* echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
));*/ ?>
<!--</div>--><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tipoconvenios-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'htmlOptions' => array('class' => 'grid-view'),
	'columns'=>array(
		 //array('name'=>'idTipoConvenio', 'htmlOptions'=>array('class'=>'text-center')),
		
		'descripcionTipoConvenio',
		array(
			'class'=>'CButtonColumn', 'header'=>'Operaciones', 'template'=>'<span>{update}</span> <span>{delete}</span>',
			'buttons'=>array (
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
