<?php
$this->breadcrumbs=array(
	'Reportes de Solicitudes de Servicio'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Regresar', 'url'=>array('index')),
);
?>

<h1>Parametros para el Reporte</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'desde',
		'hasta',
		'tecnico_id',
		'dependencia_id',
	),
)); ?>
