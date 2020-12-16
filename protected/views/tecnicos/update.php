<?php
$this->breadcrumbs=array(
	'Tecnicos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Tecnicos', 'url'=>array('index')),
	array('label'=>'CreatrTecnico', 'url'=>array('create')),
	array('label'=>'Ver Tecnico', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gestionar Tecnicos', 'url'=>array('admin')),
);
?>

<h1>Actualiza Tecnico <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>