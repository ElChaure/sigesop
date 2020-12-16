<?php
$this->breadcrumbs=array(
	'Valores2s'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Valores2', 'url'=>array('index')),
	array('label'=>'Manage Valores2', 'url'=>array('admin')),
);
?>

<h1>Create Valores2</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>