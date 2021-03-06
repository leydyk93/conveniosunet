<?php
/* @var $this ResponsablesController */
/* @var $model Responsables */

$this->breadcrumbs=array(
	'Gestion base Datos'=>array('site/configuracion'),
	'Listar Responsables',
);

/*$this->menu=array(
	array('label'=>'List Responsables', 'url'=>array('index')),
	array('label'=>'Create Responsables', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#responsables-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");*/
?>
<div class="container">
	<div class="row">
	 <div class="col-sm-6">
	 <h4>Tabla: Responsables</h4>
	 </div>	
	 <div class="col-sm-6">
	 	<div class="text-right">
	 		<?php echo CHtml::link('Nuevo Responsable',array('create'),array('class'=>'btn btn-conv btn-md')); ?>
	 	</div>

	 </div>
	</div>

		<?php /*echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
		<div class="search-form" style="display:none">
		<?php $this->renderPartial('_search',array(
			'model'=>$model,
		));*/ ?>
		<!--</div>--><!-- search-form -->

		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'responsables-grid',
			//'pager'=> array('cssFile' => Yii::app()->baseUrl . '/css/gridViewStyle/gridView.css'),
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'columns'=>array(
				//'idResponsable',
				'primerNombreResponsable',
				//'segundoNombreResponsable',
				'primerApellidoResponsable',
				//'segundoApellidoResponsable',
				'correoElectronicoResponsable',
				'telefonoResponsable',
				array(
				            'header'=>'Institucion',
				            'name' =>'instituciones_idInstitucion',
				            'value'=>'$data->institucionesIdInstitucion->siglasInstitucion',
				            'filter'=>CHtml::listData(Instituciones::model()->findAll(),'idInstitucion','siglasInstitucion'),
				        ),
				array('name'=>'tipoResponsable_idTipoResponsable','header'=>'Tipo Responsable' ,
					'value'=>'$data->tipoResponsableIdTipoResponsable->descripcionTipoResponsable',
				   'filter'=>CHtml::listData(Tiporesponsable::model()->findAll(),'idTipoResponsable','descripcionTipoResponsable'), 
				   ),
				/*
				'',
				'dependencias_idDependencia',	
				*/
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
