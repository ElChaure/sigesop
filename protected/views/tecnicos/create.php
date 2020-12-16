<?php
$this->breadcrumbs=array(
	'Tecnicos'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Tecnicos', 'url'=>array('index')),
	array('label'=>'Gestionar Tecnicos', 'url'=>array('admin')),
);
?>

<h1>Crear Tecnicos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>