<?php
/* @var $this ResponsablesController */
/* @var $model Responsables */
/* @var $form CActiveForm */
?>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
 		<div class="panel text-center"><h4><?php if($model->isNewRecord){ echo "Nuevo Responsable";}else{ echo "Modificar Responsable";} ?></h4></div>
 		<div class="panel-body text-center">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'responsables-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'form-horizontal', ),
)); ?>
	<h4>Informacion Personal del Responsable</h4>
	<div class="form-group">
		<label for="" class="control-label col-sm-4">Tipo Documento</label>
		<div class="col-sm-2">
		<?php echo CHtml::dropDownList('TipoDocumento', 'tipodocumento_id', array('V-','E-','Otro-'
    	), array('class'=>"form-control")); ?>
    	</div>
			<?php echo $form->labelEx($model,'idResponsable',array('class'=>"control-label col-sm-2")); ?>
		 <div class="col-sm-4">
			<?php echo $form->textField($model,'idResponsable',array('class'=>"form-control")); ?>
			<?php echo $form->error($model,'idResponsable'); ?>
		</div>		
	
	</div>

	<div class="form-group">
			<?php echo $form->labelEx($model,'primerNombreResponsable',array('class'=>"control-label col-sm-2")); ?>
		<div class="col-sm-4">
			<?php echo $form->textField($model,'primerNombreResponsable',array('class'=>"form-control")); ?>
			<?php echo $form->error($model,'primerNombreResponsable'); ?>
		</div>
		 <?php echo $form->labelEx($model,'segundoNombreResponsable',array('class'=>"control-label col-sm-2")); ?>
		 <div class="col-sm-4">
			<?php echo $form->textField($model,'segundoNombreResponsable',array('class'=>"form-control")); ?>
			<?php echo $form->error($model,'segundoNombreResponsable'); ?>
		</div>

	</div>
	<div class="form-group">
		
		<?php echo $form->labelEx($model,'primerApellidoResponsable',array('class'=>"control-label col-sm-2")); ?>
		<div class="col-sm-4">
			<?php echo $form->textField($model,'primerApellidoResponsable',array('class'=>"form-control")); ?>
			<?php echo $form->error($model,'primerApellidoResponsable'); ?>
		</div>
		<?php echo $form->labelEx($model,'segundoApellidoResponsable',array('class'=>"control-label col-sm-2")); ?>
		<div class="col-sm-4">
			<?php echo $form->textField($model,'segundoApellidoResponsable',array('class'=>"form-control")); ?>
			<?php echo $form->error($model,'segundoApellidoResponsable'); ?>
		</div>
	</div>

	<div class="form-group">
		
		<?php echo $form->labelEx($model,'correoElectronicoResponsable',array('class'=>"control-label col-sm-2")); ?>
		<div class="col-sm-4">
			<?php echo $form->textField($model,'correoElectronicoResponsable',array('class'=>"form-control")); ?>
			<?php echo $form->error($model,'correoElectronicoResponsable'); ?>
		</div>
		<?php echo $form->labelEx($model,'telefonoResponsable',array('class'=>"control-label col-sm-2")); ?>
		<div class="col-sm-4">
		<?php echo $form->textField($model,'telefonoResponsable',array('class'=>"form-control")); ?>
		<?php echo $form->error($model,'telefonoResponsable'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4">
		<?php echo $form->labelEx($model,'tipoResponsable_idTipoResponsable'); ?>
		</div>
		<div class="col-sm-6">
			<?php echo $form->dropDownList($model,'tipoResponsable_idTipoResponsable', CHtml::listData(Tiporesponsable::model()->findAll(),'idTipoResponsable','descripcionTipoResponsable'),
                              array('class'=>'form-control input-sm',
                               'empty'=>'Seleccione')); ?>		
		<?php echo $form->error($model,'tipoResponsable_idTipoResponsable'); ?>
		</div>
	</div>

    <h4>Información de la Institución que representa el Responsable</h4>
	<div class="form-group">
		<div class="col-sm-4">	
			<strong>Pais</strong> 
		</div>
		<div class="col-sm-6">
		<?php 
			if (!$model->isNewRecord) {

				$findidEstado=Instituciones::model()->with('estadosIdEstado')->findByPk($model->instituciones_idInstitucion);
				$valorest=$findidEstado->estados_idEstado;

				$findidPais=Estados::model()->with('paisesIdPais')->findByPk($findidEstado->estados_idEstado);
				$valorpais=$findidPais->paises_idPais;

				echo $form->dropDownList($pais,'idPais', CHtml::listData(Paises::model()->findAll(),'idPais','nombrePais'),
                              array(  'ajax'=>array(
						                'type'=>'POST',
						                'url'=>Yii::app()->createUrl('instituciones/selectEstado'),
						                'update'=>'#Estados_idEstado',
						                'data'=>array('idPais'=>'js:this.value'),
						            ),
                              	'class'=>'form-control input-sm', 
                                 'options'=> array($valorpais=>array('selected'=>'selected'))
                              	));

			}else{
		 ?>
		<?php
					echo $form->dropDownList($pais,'idPais', CHtml::listData(Paises::model()->findAll(),'idPais','nombrePais'),
                              array(  'ajax'=>array(
						                'type'=>'POST',
						                'url'=>Yii::app()->createUrl('instituciones/selectEstado'),
						                'update'=>'#Estados_idEstado',
						                'data'=>array('idPais'=>'js:this.value'),
						            ),
                              	'class'=>'form-control input-sm', 
                                'empty'=>'Seleccione',

                              	));
                      } ?>
        </div>
	</div>

	<div class="form-group">
		<div class="col-sm-4">	
			<strong>Estado</strong> 
		</div>
		<div class="col-sm-6">
		<?php if (!$model->isNewRecord) {
			echo $form->dropDownList($estados,'idEstado', CHtml::listData(Estados::model()->findAll('paises_idPais=:paises_idPais', array(':paises_idPais'=>$valorpais)),'idEstado','nombreEstado'),
                              array(
                              	'class'=>'form-control input-sm', 
                                'options'=> array($valorest=>array('selected'=>'selected'))
                              	));
		}else{?>	
		<?php	
				echo $form->dropDownList($estados,'idEstado', array(),
                              array( 
                              	'class'=>'form-control input-sm', 
                                'empty'=>'Seleccione',
                              	));
                            } ?>
        </div>
	</div>

	<div class="form-group">
		<div class="col-sm-4">	
		<?php echo $form->labelEx($tipoIns,'idTipoInstitucion'); ?>
		</div>
		<div class="col-sm-6">

		<?php 
		if(!$model->isNewRecord){

			$findtipoinst=Instituciones::model()->with('tiposInstitucionesIdTipoInstitucion')->findByPk($model->instituciones_idInstitucion);
			$tiposelec=$findtipoinst->tiposInstituciones_idTipoInstitucion;
			
				echo $form->dropDownList($tipoIns,'idTipoInstitucion', CHtml::listData(Tiposinstituciones::model()->findAll(),'idTipoInstitucion','nombreTipoInstitucion'),
                              array(
                              		'class'=>'form-control input-sm',
                              		'options'=> array($tiposelec=>array('selected'=>'selected'))
                              		));
		}else{ ?>
		<?php  
				echo $form->dropDownList($tipoIns,'idTipoInstitucion', CHtml::listData(Tiposinstituciones::model()->findAll(),'idTipoInstitucion','nombreTipoInstitucion'),
                              array('class'=>'form-control input-sm','empty'=>'Seleccione',));
		 ?>
        <?php 
    	} ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4">	
		<?php echo $form->labelEx($model,'instituciones_idInstitucion'); ?>
		</div>
		<div class="col-sm-6">

			<?php  
   				if(!$model->isNewRecord){
				 	$listaInst=CHtml::listData(Instituciones::model()->findAll('tiposInstituciones_idTipoInstitucion=:tiposInstituciones_idTipoInstitucion AND estados_idEstado=:estados_idEstado',
   				 	array(':tiposInstituciones_idTipoInstitucion'=>$tiposelec, ':estados_idEstado'=>$valorest)),'idInstitucion','nombreInstitucion');
				}else{
					$listaInst=array();
				}
   			?>
		<?php echo $form->dropDownList($model,'instituciones_idInstitucion', $listaInst,
                              array('class'=>'form-control input-sm','empty'=>'Seleccione',)); ?>
		<?php echo $form->error($model,'instituciones_idInstitucion'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-4">
		<?php echo $form->labelEx($model,'dependencias_idDependencia'); ?>
		</div>
		<div class="col-sm-6">
		<?php echo $form->dropDownList($model,'dependencias_idDependencia', CHtml::listData(Dependencias::model()->findAll(),'idDependencia','nombreDependencia'),
                              array('class'=>'form-control input-sm', 'empty'=>'Seleccione',)); ?>	
		<?php echo $form->error($model,'dependencias_idDependencia'); ?>
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

<script>

	$('#Estados_idEstado').change(function() {
    	cambiarInstitucion(); 
	});

	$('#Tiposinstituciones_idTipoInstitucion').change(function() {
    	cambiarInstitucion();  
	});

	function cambiarInstitucion(){
		 var url= '<?php echo Yii::app()->createUrl("instituciones/selectTipoInstitucion"); ?>';
		 var estado=$('#Estados_idEstado option:selected').val();
		 var tipo=$('#Tiposinstituciones_idTipoInstitucion option:selected').val();
		$.ajax({        
		type:"post",
		url: url,
		data:{ idEstadox:estado , idTipoInstitucion:tipo},
		success:function(datos){
		   document.getElementById("Responsables_instituciones_idInstitucion").innerHTML=datos;  
}
});
	}
</script>
