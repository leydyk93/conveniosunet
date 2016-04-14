<?php
/* @var $this ConveniosController */
/* @var $data Convenios */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idConvenio')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idConvenio), array('view', 'id'=>$data->idConvenio)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombreConvenio')); ?>:</b>
	<?php echo CHtml::encode($data->nombreConvenio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaCaducidadConvenio')); ?>:</b>
	<?php echo CHtml::encode($data->fechaCaducidadConvenio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('objetivoConvenio')); ?>:</b>
	<?php echo CHtml::encode($data->objetivoConvenio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('institucionUNET')); ?>:</b>
	<?php echo CHtml::encode($data->institucionUNET); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('urlConvenio')); ?>:</b>
	<?php echo CHtml::encode($data->urlConvenio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('clasificacionConvenios_idTipoConvenio')); ?>:</b>
	<?php echo CHtml::encode($data->clasificacionConvenios_idTipoConvenio); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('tipoConvenios_idTipoConvenio')); ?>:</b>
	<?php echo CHtml::encode($data->tipoConvenios_idTipoConvenio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alcanceConvenios_idAlcanceConvenio')); ?>:</b>
	<?php echo CHtml::encode($data->alcanceConvenios_idAlcanceConvenio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('formaConvenios_idFormaConvenio')); ?>:</b>
	<?php echo CHtml::encode($data->formaConvenios_idFormaConvenio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dependencias_idDependencia')); ?>:</b>
	<?php echo CHtml::encode($data->dependencias_idDependencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('convenios_idConvenio')); ?>:</b>
	<?php echo CHtml::encode($data->convenios_idConvenio); ?>
	<br />

	*/ ?>

</div>