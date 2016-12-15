<?php
/* @var $this TiporesponsableController */
/* @var $data Tiporesponsable */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idTipoResponsable')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idTipoResponsable), array('view', 'id'=>$data->idTipoResponsable)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcionTipoResponsable')); ?>:</b>
	<?php echo CHtml::encode($data->descripcionTipoResponsable); ?>
	<br />


</div>