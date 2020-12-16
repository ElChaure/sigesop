<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'especialidades-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'especialidad'); ?>
		<?php echo $form->textField($model,'especialidad',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'especialidad'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Salvar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
