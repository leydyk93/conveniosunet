<?php
/* @var $this ClasificacionconveniosController */
/* @var $data Clasificacionconvenios */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idClasificacionConvenio')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idClasificacionConvenio), array('view', 'id'=>$data->idClasificacionConvenio)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombreClasificacionConvenio')); ?>:</b>
	<?php echo CHtml::encode($data->nombreClasificacionConvenio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcionClasificacionConvenio')); ?>:</b>
	<?php echo CHtml::encode($data->descripcionClasificacionConvenio); ?>
	<br />


</div>