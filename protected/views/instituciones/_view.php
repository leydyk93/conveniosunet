<?php
/* @var $this InstitucionesController */
/* @var $data Instituciones */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idInstitucion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idInstitucion), array('view', 'id'=>$data->idInstitucion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombreInstitucion')); ?>:</b>
	<?php echo CHtml::encode($data->nombreInstitucion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('siglasInstitucion')); ?>:</b>
	<?php echo CHtml::encode($data->siglasInstitucion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estados_idEstado')); ?>:</b>
	<?php echo CHtml::encode($data->estados_idEstado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tiposInstituciones_idTipoInstitucion')); ?>:</b>
	<?php echo CHtml::encode($data->tiposInstituciones_idTipoInstitucion); ?>
	<br />


</div>