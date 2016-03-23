<?php
/* @var $this ConvenioController */
/* @var $data Convenio */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cod_convenio')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cod_convenio), array('view', 'id'=>$data->cod_convenio)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_convenio')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_convenio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_caducidad')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_caducidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('institucion_UNET')); ?>:</b>
	<?php echo CHtml::encode($data->institucion_UNET); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('objetivo_covenio')); ?>:</b>
	<?php echo CHtml::encode($data->objetivo_covenio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cod_clasificacion')); ?>:</b>
	<?php echo CHtml::encode($data->cod_clasificacion); ?>
	<br />


</div>