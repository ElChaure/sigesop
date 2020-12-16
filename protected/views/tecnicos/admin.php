<?php
$this->breadcrumbs=array(
	'Tecnicos'=>array('index'),
	'Gestionar',
);

$this->menu=array(
	array('label'=>'Listar Tecnicos', 'url'=>array('index')),
	array('label'=>'Crear Tecnicos', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tecnicos-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Tecnicos</h1>

<p>
Opcionalmente puede utilizar los operadores (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al comienzo de cada valor de busqueda.
</p>
<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tecnicos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nombre_tecnico',
		'especialidad_id',
		'username',
		'password',
		'email',
		/*
		'usr_tipo',
		'estatus',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
