<?php
/* @var $this InstitucionesController */
/* @var $data Instituciones */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idInstitucion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idInstitucion), array('view', 'id'=>$data->idInstitucion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_institucion')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_institucion); ?>
	<br />


</div>