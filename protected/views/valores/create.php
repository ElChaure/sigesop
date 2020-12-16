<?php
$this->breadcrumbs=array(
	'Valores'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Valores', 'url'=>array('index')),
	array('label'=>'Manage Valores', 'url'=>array('admin')),
);
?>

<h1>Create Valores</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>