<?php
$this->breadcrumbs=array(
	'Valores2s'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Valores2', 'url'=>array('index')),
	array('label'=>'Create Valores2', 'url'=>array('create')),
	array('label'=>'Update Valores2', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Valores2', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Valores2', 'url'=>array('admin')),
);
?>

<h1>View Valores2 #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'valor',
	),
)); ?>
