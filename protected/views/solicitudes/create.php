<?php
$this->breadcrumbs=array(
	'Solicitudes de Servicio'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Solicitudes', 'url'=>array('index')),
	array('label'=>'Gestionar Solicitudes', 'url'=>array('admin')),
);
?>

<h1>Crear Solicitudes de Servicio</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
