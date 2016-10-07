<?php
/* @var $this TipoconveniosController */
/* @var $model Tipoconvenios */
$this->breadcrumbs=array(
	'Tipo convenio'=>array('index'),
	'Listar',
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

<div class="row">
	<div  class="nuevo col-md-12 text-left">
		 <h4>Tabla: Tipo de convenio</h4>
	</div>
 </div>

 <div class="row">
 	<div class="">
 		<?php echo CHtml::link('Nuevo tipo de convenio',array('create'),array('class'=>'btn btn-conv btn-md')); ?>
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
		 array('name'=>'idTipoConvenio', 'htmlOptions'=>array('class'=>'text-center')),
		
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


<div class="row">
 	<div class="text-right">Regresar a 
 		<?php echo CHtml::link('Gestion de la BD',array('site/configuracion'),array('class'=>'btn btn-conv btn-md')); ?>
 	</div>
 </div>

