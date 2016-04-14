<?php
/* @var $this ConveniosController */
/* @var $model Convenios */

$this->breadcrumbs=array(
	'Convenioses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Convenios', 'url'=>array('index')),
	array('label'=>'Create Convenios', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#convenios-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Convenioses</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'convenios-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idConvenio',
		'nombreConvenio',
		'fechaCaducidadConvenio',
		'objetivoConvenio',
		'institucionUNET',
		'urlConvenio',
		/*
		'clasificacionConvenios_idTipoConvenio',
		'tipoConvenios_idTipoConvenio',
		'alcanceConvenios_idAlcanceConvenio',
		'formaConvenios_idFormaConvenio',
		'dependencias_idDependencia',
		'convenios_idConvenio',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
