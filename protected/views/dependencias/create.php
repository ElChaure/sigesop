<?php
$this->breadcrumbs=array(
	'Dependencias'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Dependencias', 'url'=>array('index')),
	array('label'=>'Gestionar Dependencias', 'url'=>array('admin')),
);
?>

<h1>Crear Dependencias</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
