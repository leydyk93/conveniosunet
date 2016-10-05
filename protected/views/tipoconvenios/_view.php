<?php
/* @var $this TipoconveniosController */
/* @var $data Tipoconvenios */
?>

<div class="view">

	<!--<b><?php /*echo CHtml::encode($data->getAttributeLabel('idTipoConvenio'));*/ ?>:</b>-->
	<?php /*echo CHtml::link(CHtml::encode($data->idTipoConvenio), array('view', 'id'=>$data->idTipoConvenio));*/ ?>
	<!--<br />-->

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcionTipoConvenio')); ?>:</b>
	<?php echo CHtml::encode($data->descripcionTipoConvenio); ?>
	<br />


</div>