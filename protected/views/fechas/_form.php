
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'fechas-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>
        

    <?php

   $id=$model->id;
   if($id == 1):
       Yii::app()->clientScript->registerScript('accesoreport',"
            $('#misfechas').css('display', 'block');
       ",CClientScript::POS_READY);
   elseif($id == 2): // Tenga en cuenta la combinación de las palabras.
       Yii::app()->clientScript->registerScript('accesoreport',"
            $('#dependencias').css('display', 'block');
       ",CClientScript::POS_READY);
   else:
       Yii::app()->clientScript->registerScript('accesoreport',"
            $('#tecnicos').css('display', 'block');
       ",CClientScript::POS_READY);
   endif;       
?>

       <div id="misfechas" style="display:none;" class="row">
         <fieldset>
	<div class="row">
		<?php echo $form->labelEx($model,'desde'); ?>
		<?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
			$this->widget('CJuiDateTimePicker',array(
			'model'=>$model,
			'attribute'=>'desde',
            'mode'=>'date', 
			'options'=>array(
			'showAnim'=>'fold',
			'dateFormat'=>'yy-mm-dd'
			) // jquery plugin options
		));?>
		<?php echo $form->error($model,'desde'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hasta'); ?>
		<?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
			$this->widget('CJuiDateTimePicker',array(
			'model'=>$model,
			'attribute'=>'hasta',
            'mode'=>'date', 
			'options'=>array(
			'showAnim'=>'fold',
			'dateFormat'=>'yy-mm-dd'
			) // jquery plugin options
		));?>
		<?php echo $form->error($model,'hasta'); ?>
	</div>
        </fieldset>
        </div>
       <div id="tecnicos" style="display:none;" class="row">
        <fieldset>
	<div class="row">
		<?php echo $form->labelEx($model,'tecnico_id'); ?>
		<?php echo $form->dropDownList($model,'tecnico_id', CHtml::listData(Tecnicos::model()->findAll(), 'id', 'nombre_tecnico')); ?>
		<?php echo $form->error($model,'tecnico_id'); ?>
	</div>
        </fieldset>
        </div>

       <div id="dependencias" style="display:none;" class="row">
        <fieldset>
	<div class="row">
		<?php echo $form->labelEx($model,'dependencia_id'); ?>
		<?php echo $form->dropDownList($model,'dependencia_id', CHtml::listData(Dependencias::model()->findAll(), 'id', 'dependencia')); ?>
		<?php echo $form->error($model,'dependencia_id'); ?>
	</div>
        </fieldset>
        </div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Generar Reporte'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
