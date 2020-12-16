<?php
$this->breadcrumbs=array(
	'Especialidades'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Especialidades', 'url'=>array('index')),
	array('label'=>'Crear Especialidades', 'url'=>array('create')),
	array('label'=>'Ver Especialidades', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gestionar Especialidades', 'url'=>array('admin')),
);
?>

<h1>Actualizar Especialidades <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
