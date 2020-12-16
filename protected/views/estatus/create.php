<?php
$this->breadcrumbs=array(
	'Estatuses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Estatus', 'url'=>array('index')),
	array('label'=>'Manage Estatus', 'url'=>array('admin')),
);
?>

<h1>Create Estatus</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>