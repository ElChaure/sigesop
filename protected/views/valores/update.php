<?php
$this->breadcrumbs=array(
	'Valores'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Valores', 'url'=>array('index')),
	array('label'=>'Create Valores', 'url'=>array('create')),
	array('label'=>'View Valores', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Valores', 'url'=>array('admin')),
);
?>

<h1>Update Valores <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>