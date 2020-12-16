<?php
$this->breadcrumbs=array(
	'Valores2s',
);

$this->menu=array(
	array('label'=>'Create Valores2', 'url'=>array('create')),
	array('label'=>'Manage Valores2', 'url'=>array('admin')),
);
?>

<h1>Valores2s</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
