<?php
$this->breadcrumbs=array(
	'Reporte de Solicitudes de _Servicio'=>array('solicitudes/admin'),
	$model->id=>array('view','id'=>$model->id),
	'Parametros del Reporte',
);

$this->menu=array(
	array('label'=>'Regresar', 'url'=>array('solicitudes/admin')),
);
?>

<h1>Parametros del Reporte</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
