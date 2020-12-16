<?php
$this->breadcrumbs=array(
	'Dependencias',
);

$this->menu=array(
	array('label'=>'Crear Dependencias', 'url'=>array('create')),
	array('label'=>'Gestionar Dependencias', 'url'=>array('admin')),
);
?>

<h1>Dependencias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
