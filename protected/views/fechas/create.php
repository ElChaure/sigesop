<?php
$this->breadcrumbs=array(
	'Fechases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Fechas', 'url'=>array('index')),
	array('label'=>'Manage Fechas', 'url'=>array('admin')),
);
?>

<h1>Create Fechas</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>