<?php
$this->breadcrumbs=array(
	'Solicitudes'=>array('index'),
	$model->id,
);

if ((Yii::app()->user->rol)=='Administrador' || (Yii::app()->user->rol)=='Coordinador'){
$this->menu=array(
	array('label'=>'Listar Solicitudes', 'url'=>array('index')),
	array('label'=>'Crear Solicitudes', 'url'=>array('create')),
	array('label'=>'Actualizar Solicitudes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Solicitudes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Confirma la eliminacion de esta Solicitud de Servicio?')),
	array('label'=>'Gestiona Solicitudes', 'url'=>array('admin')),
);
}
else
{
$this->menu=array(
	array('label'=>'Listar Solicitudes', 'url'=>array('index')),
	array('label'=>'Actualizar Solicitud', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Gestiona Solicitudes', 'url'=>array('admin')),
);

};
?>

<h1>Ver Solicitud de Servicio #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'fecha',
		'hora',
                array(
                'name'=>'dependencia_id',
                'value'=>Dependencias::model()->find(
                    'id=:dependencia_id',
                    array(
                        ':dependencia_id'=>$model->dependencia_id
                    )
                   )->dependencia,
                ),
				array(
                'name'=>'receptor_id',
                'value'=>Tecnicos::model()->find(
                    'id=:receptor_id',
                    array(
                        ':receptor_id'=>$model->receptor_id
                    )
                   )->nombre_tecnico,
                ),
		'usuario',
                array(
                'name'=>'cpu',
                'value'=>Valores::model()->find(
                    'id=:cpu',
                    array(
                        ':cpu'=>$model->cpu
                    )
                   )->valor,
                ),
                array(
                'name'=>'impresora',
                'value'=>Valores::model()->find(
                    'id=:impresora',
                    array(
                        ':impresora'=>$model->impresora
                    )
                   )->valor,
                ),
                array(
                'name'=>'mouse',
                'value'=>Valores::model()->find(
                    'id=:mouse',
                    array(
                        ':mouse'=>$model->mouse
                    )
                   )->valor,
                ),
                array(
                'name'=>'teclado',
                'value'=>Valores::model()->find(
                    'id=:teclado',
                    array(
                        ':teclado'=>$model->teclado
                    )
                   )->valor,
                ),
                array(
                'name'=>'escaner',
                'value'=>Valores::model()->find(
                    'id=:escaner',
                    array(
                        ':escaner'=>$model->escaner
                    )
                   )->valor,
                ),
                array(
                'name'=>'monitor',
                'value'=>Valores::model()->find(
                    'id=:monitor',
                    array(
                        ':monitor'=>$model->monitor
                    )
                   )->valor,
                ),
                array(
                'name'=>'telecom',
                'value'=>Valores::model()->find(
                    'id=:telecom',
                    array(
                        ':telecom'=>$model->telecom
                    )
                   )->valor,
                ),
                array(
                'name'=>'otro1',
                'value'=>Valores::model()->find(
                    'id=:otro1',
                    array(
                        ':otro1'=>$model->otro1
                    )
                   )->valor,
                ),


		'serial',
		'bien_nacional',
		'modelo',

                array(
                'name'=>'hardware',
                'value'=>Valores2::model()->find(
                    'id=:hardware',
                    array(
                        ':hardware'=>$model->hardware
                    )
                   )->valor,
                ),

                array(
                'name'=>'software',
                'value'=>Valores2::model()->find(
                    'id=:software',
                    array(
                        ':software'=>$model->software
                    )
                   )->valor,
                ),

                array(
                'name'=>'mantenimiento',
                'value'=>Valores2::model()->find(
                    'id=:mantenimiento',
                    array(
                        ':mantenimiento'=>$model->mantenimiento
                    )
                   )->valor,
                ),

                array(
                'name'=>'antivirus',
                'value'=>Valores2::model()->find(
                    'id=:antivirus',
                    array(
                        ':antivirus'=>$model->antivirus
                    )
                   )->valor,
                ),

                array(
                'name'=>'red',
                'value'=>Valores2::model()->find(
                    'id=:red',
                    array(
                        ':red'=>$model->red
                    )
                   )->valor,
                ),

                array(
                'name'=>'otro2',
                'value'=>Valores2::model()->find(
                    'id=:otro2',
                    array(
                        ':otro2'=>$model->otro2
                    )
                   )->valor,
                ),

		'motivo',

		array(
                'name'=>'tecnico_id',
                'value'=>Tecnicos::model()->find(
                    'id=:tecnico_id',
                    array(
                        ':tecnico_id'=>$model->tecnico_id
                    )
                   )->nombre_tecnico,
                ),
		'observaciones',
                array(
                'name'=>'estatus',
                'value'=>Estatus::model()->find(
                    'id=:estatus',
                    array(
                        ':estatus'=>$model->estatus
                    )
                   )->nombre,
                ),
                
	),
)); ?>
