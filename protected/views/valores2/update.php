<?php
$this->breadcrumbs=array(
	'Valores2s'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Valores2', 'url'=>array('index')),
	array('label'=>'Create Valores2', 'url'=>array('create')),
	array('label'=>'View Valores2', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Valores2', 'url'=>array('admin')),
);
?>

<h1>Update Valores2 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>