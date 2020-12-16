<?php
$this->breadcrumbs=array(
	'Solicitudes'=>array('index'),
	'Gestionar Solicitudes de Soporte',
);

switch (Yii::app()->user->rol) {
       case 'Administrador': 
             $this->menu=array(
 	            array('label'=>'Listar Solicitudes', 'url'=>array('index')),
 	            array('label'=>'Crear Solicitudes', 'url'=>array('create')),
	            array('label'=>'Reporte de Solicitudes Pendientes', 'url'=>array('reporte1'), 'linkOptions' => array('target'=>'_blank')),
	            array('label'=>'Reporte de Solicitudes Finalizadas', 'url'=>array('reporte2'), 'linkOptions' => array('target'=>'_blank')),
                    array('label'=>'Reporte de Solicitudes por Fecha', 'url'=>array('/fechas/update&id=')),
                    array('label'=>'Reporte de Solicitudes por Dependencia', 'url'=>array('/fechas/update&id=2')),
                    array('label'=>'Reporte de Solicitudes por Tecnico', 'url'=>array('/fechas/update&id=3')),
                    );
                    break;
       case 'Coordinador': 
             $this->menu=array(
 	            array('label'=>'Listar Solicitudes', 'url'=>array('index')),
 	            array('label'=>'Crear Solicitudes', 'url'=>array('create')),
	            array('label'=>'Reporte de Solicitudes Pendientes', 'url'=>array('reporte1'), 'linkOptions' => array('target'=>'_blank')),
	            array('label'=>'Reporte de Solicitudes Finalizadas', 'url'=>array('reporte2'), 'linkOptions' => array('target'=>'_blank')),
                    array('label'=>'Reporte de Solicitudes por Tecnico', 'url'=>array('/fechas/update&id=3'), 'linkOptions' => array('target'=>'_blank')),
                    );
                    break;
       case 'Tecnico': 
             $this->menu=array(
 	            //array('label'=>'Listar Solicitudes', 'url'=>array('index')),
	            array('label'=>'Reporte de Solicitudes Pendientes', 'url'=>array('reporte1'), 'linkOptions' => array('target'=>'_blank')),
	            array('label'=>'Reporte de Solicitudes Finalizadas', 'url'=>array('reporte2'), 'linkOptions' => array('target'=>'_blank')),
                    );
                    break;
       case 'Recepcionista': 
             $this->menu=array(
 	            array('label'=>'Crear Solicitudes', 'url'=>array('create')),
                    );
                    break;
        default:
                    echo '';
}


Yii::app()->clientScript->registerScript('Buscar', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('solicitudes-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Solicitudes de Soporte</h1>

<p>
Opcionalmente puede utilizar los operadores (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al comienzo de los valores de busqueda.
</p>

<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 
if ((Yii::app()->user->rol)=='Administrador' || (Yii::app()->user->rol)=='Coordinador'){
   $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'solicitudes-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'fecha',
		'hora',
                array(
                   'name'=>'dependencia_id',
                   'value'=>'$data->dependencia->dependencia',
                   'filter' => CHtml::listData(Dependencias::model()->findAll(), 'id', 'dependencia'),
                 ),

		'usuario',

                array(
                   'name'=>'tecnico_id',
                   'value'=>'$data->tecnico->nombre_tecnico',
                   'filter' => CHtml::listData(Tecnicos::model()->findAll(), 'id', 'nombre_tecnico'),


                 ),

                array(
                   'name'=>'estatus',
                   'value'=>'$data->status->nombre',
                   'filter' => array(1 => 'Pendiente', 2 => 'Finalizado'),
                ),
		/*
		'cpu',
		'impresora',
		'mouse',
		'teclado',
		'escaner',
		'monitor',
		'telecom',
		'otro1',
		'serial',
		'bien_nacional',
		'modelo',
		'hardware',
		'software',
		'mantenimiento',
		'antivirus',
		'red',
		'otro2',
		'motivo',
		'tecnico_id',
		'observaciones',

		*/
		array(
			'class'=>'CButtonColumn',
                        'template' => '{view} {update} {delete} {imprime}',
                'buttons'=>array(
                        'imprime' => array(
                                'label'=>'Imprime Solicitud', 
                                'url'=>"CHtml::normalizeUrl(array('imprime', 'id'=>\$data->id))",
				'imageUrl' => Yii::app()->baseUrl . '/images/printer.png',
                                'options' => array('class'=>'ImprimePDF','target'=>'_blank'),
								'linkOptions' => array('target'=>'_blank')
                        ),
                ),


		),
	),
));
}
else
{
   $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'solicitudes-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'fecha',
		'hora',
                array(
                   'name'=>'dependencia_id',
                   'value'=>'$data->dependencia->dependencia',
                   'filter' => CHtml::listData(Dependencias::model()->findAll(), 'id', 'dependencia'),
                 ),

		'usuario',

                array(
                   'name'=>'tecnico_id',
                   'value'=>'$data->tecnico->nombre_tecnico',
                   'filter' => CHtml::listData(Tecnicos::model()->findAll(Yii::app()->user->codigo), 'id', 'nombre_tecnico'),


                 ),

                array(
                   'name'=>'estatus',
                   'value'=>'$data->status->nombre',
                   'filter' => array(1 => 'Pendiente', 2 => 'Finalizado'),
                ),

		/*
		'cpu',
		'impresora',
		'mouse',
		'teclado',
		'escaner',
		'monitor',
		'telecom',
		'otro1',
		'serial',
		'bien_nacional',
		'modelo',
		'hardware',
		'software',
		'mantenimiento',
		'antivirus',
		'red',
		'otro2',
		'motivo',
		'tecnico_id',
		'observaciones',
		*/
		array(
			'class'=>'CButtonColumn',
                        'template' => '{view} {update} {imprime}',
                        'buttons'=>array(
                        'imprime' => array(
                                'label'=>'Imprime Solicitud', 
                                'url'=>"CHtml::normalizeUrl(array('imprime', 'id'=>\$data->id))",
				'imageUrl' => Yii::app()->baseUrl . '/images/printer.png',
                                'options' => array('class'=>'ImprimePDF'),
                        ),
                ),


		),
	),
));
};
 ?>
