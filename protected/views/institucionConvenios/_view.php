<?php
/* @var $this InstitucionConveniosController */
/* @var $data InstitucionConvenios */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idInstitucionConvenio')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idInstitucionConvenio), array('view', 'id'=>$data->idInstitucionConvenio)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('instituciones_idInstitucion')); ?>:</b>
	<?php echo CHtml::encode($data->instituciones_idInstitucion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('convenios_idConvenio')); ?>:</b>
	<?php echo CHtml::encode($data->convenios_idConvenio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaIncorporacion')); ?>:</b>
	<?php echo CHtml::encode($data->fechaIncorporacion); ?>
	<br />


</div>