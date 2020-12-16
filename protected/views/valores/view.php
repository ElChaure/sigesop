<?php
$this->breadcrumbs=array(
	'Valores'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Valores', 'url'=>array('index')),
	array('label'=>'Create Valores', 'url'=>array('create')),
	array('label'=>'Update Valores', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Valores', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Valores', 'url'=>array('admin')),
);
?>

<h1>View Valores #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'valor',
	),
)); ?>
