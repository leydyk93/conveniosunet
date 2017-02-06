<?php
/* @var $this ConvenioEstadosController */
/* @var $data ConvenioEstados */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_convenio_estado')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_convenio_estado), array('view', 'id'=>$data->id_convenio_estado)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('convenios_idConvenio')); ?>:</b>
	<?php echo CHtml::encode($data->convenios_idConvenio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estadoConvenios_idEstadoConvenio')); ?>:</b>
	<?php echo CHtml::encode($data->estadoConvenios_idEstadoConvenio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaCambioEstado')); ?>:</b>
	<?php echo CHtml::encode($data->fechaCambioEstado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numeroReporte')); ?>:</b>
	<?php echo CHtml::encode($data->numeroReporte); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observacionCambioEstado')); ?>:</b>
	<?php echo CHtml::encode($data->observacionCambioEstado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dependencias_idDependencia')); ?>:</b>
	<?php echo CHtml::encode($data->dependencias_idDependencia); ?>
	<br />


</div>