<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'fechas-form',
	'enableAjaxValidation'=>false,
)); ?>

        	

	<?php echo $form->errorSummary($model); ?>

        <div id="fechas" class="row">
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

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Generar Reporte'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
