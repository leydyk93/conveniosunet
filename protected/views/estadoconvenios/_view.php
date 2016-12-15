<?php
/* @var $this EstadoconveniosController */
/* @var $data Estadoconvenios */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idEstadoConvenio')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idEstadoConvenio), array('view', 'id'=>$data->idEstadoConvenio)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombreEstadoConvenio')); ?>:</b>
	<?php echo CHtml::encode($data->nombreEstadoConvenio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcionEstadoConvenio')); ?>:</b>
	<?php echo CHtml::encode($data->descripcionEstadoConvenio); ?>
	<br />


</div>