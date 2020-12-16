<div class="view">

	<strong><b>Solicitud de Servicio <?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br /></strong>

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hora')); ?>:</b>
	<?php echo CHtml::encode($data->hora); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('receptor')); ?>:</b>
    <?php echo CHtml::encode($data->receptor->nombre_tecnico); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Dependencia')); ?>:</b>
    <?php echo CHtml::encode($data->dependencia->dependencia); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario')); ?>:</b>
	<?php echo CHtml::encode($data->usuario); ?>
        <br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tecnico')); ?>:</b>
	<?php echo CHtml::encode($data->tecnico->nombre_tecnico); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />
	

	<?php /*

        <b><?php echo CHtml::encode($data->getAttributeLabel('cpu')); ?>:</b>
	<?php echo CHtml::encode($data->cpu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('impresora')); ?>:</b>
	<?php echo CHtml::encode($data->impresora); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mouse')); ?>:</b>
	<?php echo CHtml::encode($data->mouse); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('teclado')); ?>:</b>
	<?php echo CHtml::encode($data->teclado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('escaner')); ?>:</b>
	<?php echo CHtml::encode($data->escaner); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monitor')); ?>:</b>
	<?php echo CHtml::encode($data->monitor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telecom')); ?>:</b>
	<?php echo CHtml::encode($data->telecom); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('otro1')); ?>:</b>
	<?php echo CHtml::encode($data->otro1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('serial')); ?>:</b>
	<?php echo CHtml::encode($data->serial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bien_nacional')); ?>:</b>
	<?php echo CHtml::encode($data->bien_nacional); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modelo')); ?>:</b>
	<?php echo CHtml::encode($data->modelo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hardware')); ?>:</b>
	<?php echo CHtml::encode($data->hardware); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('software')); ?>:</b>
	<?php echo CHtml::encode($data->software); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mantenimiento')); ?>:</b>
	<?php echo CHtml::encode($data->mantenimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('antivirus')); ?>:</b>
	<?php echo CHtml::encode($data->antivirus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('red')); ?>:</b>
	<?php echo CHtml::encode($data->red); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('otro2')); ?>:</b>
	<?php echo CHtml::encode($data->otro2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('motivo')); ?>:</b>
	<?php echo CHtml::encode($data->motivo); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('observaciones')); ?>:</b>
	<?php echo CHtml::encode($data->observaciones); ?>
	<br />



	*/ ?>

</div>
