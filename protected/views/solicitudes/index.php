<?php
$this->breadcrumbs=array(
	'Solicitudes de Servicio',
);
if ((Yii::app()->user->rol)=='Administrador' || (Yii::app()->user->rol)=='Coordinador'){
$this->menu=array(
	array('label'=>'Crear Solicitudes', 'url'=>array('create')),
	array('label'=>'Gestionar Solicitudes', 'url'=>array('admin')),
);}
else
{
$this->menu=array(
	//array('label'=>'Crear Solicitudes', 'url'=>array('create')),
	array('label'=>'Gestionar Solicitudes', 'url'=>array('admin')),
);
};
?>

<h1>Solicitudes de Servicio</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>


