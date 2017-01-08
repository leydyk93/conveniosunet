<?php
/* @var $this DependenciasController */
/* @var $data Dependencias */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idDependencia')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idDependencia), array('view', 'id'=>$data->idDependencia)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombreDependencia')); ?>:</b>
	<?php echo CHtml::encode($data->nombreDependencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefonoDependencia')); ?>:</b>
	<?php echo CHtml::encode($data->telefonoDependencia); ?>
	<br />


</div>