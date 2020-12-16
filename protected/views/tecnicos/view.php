<?php
$this->breadcrumbs=array(
	'Tecnicos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Tecnicos', 'url'=>array('index')),
	array('label'=>'Crear Tecnico', 'url'=>array('create')),
	array('label'=>'Actualizar Tecnico', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Tecnicos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Esta seguro de eliminar este registro?')),
	array('label'=>'Gestionr Tecnicos', 'url'=>array('admin')),
);
?>

<h1>Ver Tecnico #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre_tecnico',
		'especialidad_id',
		'username',
		'password',
		'email',
		'usr_tipo',
		'estatus',
	),
)); ?>
