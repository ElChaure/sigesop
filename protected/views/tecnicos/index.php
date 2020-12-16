<?php
$this->breadcrumbs=array(
	'Tecnicos',
);

$this->menu=array(
	array('label'=>'Crear Tecnicos', 'url'=>array('create')),
	array('label'=>'Gestionar Tecnicos', 'url'=>array('admin')),
);
?>

<h1>Tecnicos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
