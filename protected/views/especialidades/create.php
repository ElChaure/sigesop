<?php
$this->breadcrumbs=array(
	'Especialidades'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Especialidades', 'url'=>array('index')),
	array('label'=>'Gestionar Especialidades', 'url'=>array('admin')),
);
?>

<h1>Crear Especialidades</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
