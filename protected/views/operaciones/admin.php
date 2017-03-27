<?php
/* @var $this OperacionesController */
/* @var $model Operaciones */

$this->breadcrumbs=array(
	//'Operaciones'=>array('index'),
	'Operaciones',
);

/*$this->menu=array(
	array('label'=>'List Operaciones', 'url'=>array('index')),
	array('label'=>'Create Operaciones', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#operaciones-grid').yiiGridView('update', {
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
		<div class="col-sm-12">
		<h4>Operaciones Realizadas</h4>
		</div>	
	</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'operaciones-grid',
	'dataProvider'=>$model->search(),
	'afterAjaxUpdate' => 'reinstallDatePicker',
	'filter'=>$model,
	'columns'=>array(
		'fecha',
		//'idOperacion',
	     /*array(
				            'header'=>'Fecha',
				            'name' =>'fecha',
							 'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model'=>$model, 
                'attribute'=>'fecha', 
                'language' => 'es',
                //'i18nScriptFile' => 'jquery.ui.datepicker-ja.js', (#2)
                'htmlOptions' => array(
					'id' => 'datepicker_for_due_date',
                    'size' => '10',
                ),
                'defaultOptions' => array(  // (#3)
                    'showOn' => 'focus', 
                    'dateFormat' => 'yy/mm/dd',
                    'showOtherMonths' => true,
                    'selectOtherMonths' => true,
                    'changeMonth' => true,
                    'changeYear' => true,
                    'showButtonPanel' => true,
                )
            ), 
            true),	
				        //    'filter'=>CHtml::listData(usuario::model()->findAll(),'id','nombre'),
				        ),*/
	    array(
				            'header'=>'Usuario',
				            'name' =>'usuario_id',
				            'value'=>'$data->usuario->nombre',
				            'filter'=>CHtml::listData(usuario::model()->findAll(),'id','nombre'),
				        ),
		array(
				            'header'=>'Tipo Operacion',
				            'name' =>'tipoOperaciones_idTipoOperacion',
				            'value'=>'$data->tipoOperacionesIdTipoOperacion->descripcionTipoOperacion',
				            'filter'=>CHtml::listData(tipooperaciones::model()->findAll(),'idTipoOperacion','descripcionTipoOperacion'),
				        ),
	    array(
				            'header'=>'Módulo',
				            'name' =>'modulos_idModulo',
				            'value'=>'$data->modulosIdModulo->descripcion',
				            'filter'=>CHtml::listData(modulos::model()->findAll(),'idModulo','descripcion'),
				        ),
	   /*array(
			'class'=>'CButtonColumn',
	  ),*/
	),
)); ?>
</div>
