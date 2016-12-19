<?php
/* @var $this ResponsablesController */
/* @var $data Responsables */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idResponsable')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idResponsable), array('view', 'id'=>$data->idResponsable)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('primerNombreResponsable')); ?>:</b>
	<?php echo CHtml::encode($data->primerNombreResponsable); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('segundoNombreResponsable')); ?>:</b>
	<?php echo CHtml::encode($data->segundoNombreResponsable); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('primerApellidoResponsable')); ?>:</b>
	<?php echo CHtml::encode($data->primerApellidoResponsable); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('segundoApellidoResponsable')); ?>:</b>
	<?php echo CHtml::encode($data->segundoApellidoResponsable); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('correoElectronicoResponsable')); ?>:</b>
	<?php echo CHtml::encode($data->correoElectronicoResponsable); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefonoResponsable')); ?>:</b>
	<?php echo CHtml::encode($data->telefonoResponsable); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('instituciones_idInstitucion')); ?>:</b>
	<?php echo CHtml::encode($data->instituciones_idInstitucion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dependencias_idDependencia')); ?>:</b>
	<?php echo CHtml::encode($data->dependencias_idDependencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipoResponsable_idTipoResponsable')); ?>:</b>
	<?php echo CHtml::encode($data->tipoResponsable_idTipoResponsable); ?>
	<br />

	*/ ?>

</div>