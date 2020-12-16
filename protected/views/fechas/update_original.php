<?php
$this->breadcrumbs=array(
	'Parametros para el Reporte de Solicitudes de Servicios'=>array('/solicitudes/admin'),
	$model->id=>array('/solicitudes/admin','id'=>$model->id),
	'Indique parametros del listado',
);

$this->menu=array(
	array('label'=>'Regresar', 'url'=>array('/solicitudes/admin')),
);
?>

<h1>Rango de Fechas para el Reporte</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
