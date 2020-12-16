<?php
$this->breadcrumbs=array(
	'Fechases',
);

$this->menu=array(
	array('label'=>'Create Fechas', 'url'=>array('create')),
	array('label'=>'Manage Fechas', 'url'=>array('admin')),
);
?>

<h1>Fechases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
