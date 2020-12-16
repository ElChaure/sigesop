<?php
$this->breadcrumbs=array(
	'Dependencias'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Dependencias', 'url'=>array('index')),
	array('label'=>'Crear Dependencias', 'url'=>array('create')),
	array('label'=>'Actualizar Dependencias', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Dependencias', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Esta seguro de eliminar esta dependencia?')),
	array('label'=>'Gestionar Dependencias', 'url'=>array('admin')),
);
?>

<h1>Ver Dependencia #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'dependencia',
		'ubicacion',
		'responsable',
		'celular',
		'local',
		'condicion',
	),
)); ?>
