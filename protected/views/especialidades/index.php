<?php
$this->breadcrumbs=array(
	'Especialidades',
);

$this->menu=array(
	array('label'=>'Crear Especialidades', 'url'=>array('create')),
	array('label'=>'Gestionar Especialidades', 'url'=>array('admin')),
);
?>

<h1>Especialidades</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
