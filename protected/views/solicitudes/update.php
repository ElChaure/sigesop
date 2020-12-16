<?php
$this->breadcrumbs=array(
	'Solicitudes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

if ((Yii::app()->user->rol)=='Administrador' || (Yii::app()->user->rol)=='Coordinador'){
$this->menu=array(
	array('label'=>'Listar Solicitudes', 'url'=>array('index')),
	array('label'=>'Crear Solicitudes', 'url'=>array('create')),
	array('label'=>'Ver Solicitud', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gestionar Solicitudes', 'url'=>array('admin')),
);}
else
{
$this->menu=array(
	//array('label'=>'Listar Solicitudes', 'url'=>array('index')),
	//array('label'=>'Crear Solicitudes', 'url'=>array('create')),
	array('label'=>'Ver Solicitud', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gestionar Solicitudes', 'url'=>array('admin')),
);
};
?>

<h1>Actualizar Solicitud de Servicio <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
