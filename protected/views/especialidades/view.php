<?php
$this->breadcrumbs=array(
	'Especialidades'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Especialidades', 'url'=>array('index')),
	array('label'=>'Crear Especialidades', 'url'=>array('create')),
	array('label'=>'Actualizar Especialidades', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Especialidades', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Esta seguro de eliminar esta especialidad?')),
	array('label'=>'Gestiona Especialidades', 'url'=>array('admin')),
);
?>

<h1>Ver Especialidades #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'especialidad',
	),
)); ?>
