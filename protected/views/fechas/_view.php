<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desde')); ?>:</b>
	<?php echo CHtml::encode($data->desde); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hasta')); ?>:</b>
	<?php echo CHtml::encode($data->hasta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tecnico_id')); ?>:</b>
	<?php echo CHtml::encode($data->tecnico_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dependencia_id')); ?>:</b>
	<?php echo CHtml::encode($data->dependencia_id); ?>
	<br />


</div>