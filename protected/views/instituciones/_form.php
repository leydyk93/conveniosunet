<?php
/* @var $this InstitucionesController */
/* @var $model Instituciones */
/* @var $form CActiveForm */
?>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
 		<div class="panel text-center"><h4><?php if($model->isNewRecord){ echo "Nueva Institución";}else{ echo "Modificar Institución";} ?></h4></div>
 		<div class="panel-body text-center">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'instituciones-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	 'htmlOptions'=>array('class'=>'form-horizontal', ),
)); ?>
<h2>Información Personal del Responsable</h2>
	<div class="form-group">
		<div class="col-sm-4">
		<?php echo $form->labelEx($model,'nombreInstitucion'); ?>
	    </div>
	    <div class="col-sm-6">
		<?php echo $form->textField($model,'nombreInstitucion',array('class'=>"form-control")); ?>
		<?php echo $form->error($model,'nombreInstitucion'); ?>
	    </div>
	</div>

	<div class="form-group">
		<div class="col-sm-4">
		<?php echo $form->labelEx($model,'siglasInstitucion'); ?>
		</div>
		<div class="col-sm-6">
		<?php echo $form->textField($model,'siglasInstitucion',array('class'=>"form-control")); ?>
		<?php echo $form->error($model,'siglasInstitucion'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4">
		<strong>Pais</strong> 
		</div>
		<div class="col-sm-6">
			<?php 
			if(!$model->isNewRecord){
				$findidPais=Estados::model()->with('paisesIdPais')->findByPk($model->estados_idEstado);
				$valor=$findidPais->paises_idPais;

				echo $form->dropDownList($pais,'idPais', CHtml::listData(Paises::model()->findAll(),'idPais','nombrePais'),
                              array(  'ajax'=>array(
						                'type'=>'POST',
						                'url'=>Yii::app()->createUrl('instituciones/selectEstado'),
						                'update'=>'#Instituciones_estados_idEstado',
						                'data'=>array('idPais'=>'js:this.value'),
						            ),
                              	'class'=>'form-control input-sm', 
                                'options'=> array( $valor=>array('selected'=>'selected'))

                              	));
			}else{
			
			?>

			<?php
				
				echo $form->dropDownList($pais,'idPais', CHtml::listData(Paises::model()->findAll(),'idPais','nombrePais'),
                              array(  'ajax'=>array(
						                'type'=>'POST',
						                'url'=>Yii::app()->createUrl('instituciones/selectEstado'),
						                'update'=>'#Instituciones_estados_idEstado',
						                'data'=>array('idPais'=>'js:this.value'),
						            ),
                              	'class'=>'form-control input-sm', 
                                'empty'=>'Seleccione',

                              	));
                             }?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4">
		<?php echo $form->labelEx($model,'estados_idEstado'); ?>
		</div>
		<div class="col-sm-6">
			<?php 
			if(!$model->isNewRecord){
				 $listaestad=CHtml::listData(Estados::model()->findAll('paises_idPais=:paises_idPais', array(':paises_idPais'=>$valor)),'idEstado','nombreEstado');			
			}else{
				$listaestad=array();
			}
			 ?>
		<?php echo $form->dropDownList($model,'estados_idEstado',$listaestad,
                              array('class'=>'form-control input-sm',"empty" => "seleccione"));
                             
                              ?>
		<?php echo $form->error($model,'estados_idEstado'); ?>

		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4">
		<?php echo $form->labelEx($model,'tiposInstituciones_idTipoInstitucion'); ?>
		</div>
		<div class="col-sm-6">
		<?php echo $form->dropDownList($model,'tiposInstituciones_idTipoInstitucion', CHtml::listData(tiposinstituciones::model()->findAll(),'idTipoInstitucion','nombreTipoInstitucion'),
                              array('class'=>'form-control input-sm'));?>
		<?php echo $form->error($model,'tiposInstituciones_idTipoInstitucion'); ?>
		</div>
	</div>

	<div class="form-group">
		
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>"btn btn-conv btn-md")); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
   <p class="note text-right">Los campos con <span class="required">*</span> son obligatorios</p>
	</div>
	
  </div>
</div>