<?php
/* @var $this TiposinstitucionesController */
/* @var $data Tiposinstituciones */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idTipoInstitucion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idTipoInstitucion), array('view', 'id'=>$data->idTipoInstitucion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombreTipoInstitucion')); ?>:</b>
	<?php echo CHtml::encode($data->nombreTipoInstitucion); ?>
	<br />


</div>