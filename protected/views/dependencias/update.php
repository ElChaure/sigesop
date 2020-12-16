<?php
$this->breadcrumbs=array(
	'Dependencias'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Dependencias', 'url'=>array('index')),
	array('label'=>'Crear Dependencias', 'url'=>array('create')),
	array('label'=>'Ver Dependencias', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gestionar Dependencias', 'url'=>array('admin')),
);
?>

<h1>Actualizar Dependencias <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
