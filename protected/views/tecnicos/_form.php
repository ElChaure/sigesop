<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tecnicos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre_tecnico'); ?>
		<?php echo $form->textField($model,'nombre_tecnico',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'nombre_tecnico'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'especialidad_id'); ?>
		<?php echo $form->dropDownList($model,'especialidad_id', CHtml::listData(Especialidades::model()->findAll(), 'id', 'especialidad')); ?>
		<?php echo $form->error($model,'especialidad_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usr_tipo'); ?>
		<?php echo $form->dropDownList($model, 'usr_tipo',array('0' => 'Administrador', '1' => 'Coordinador', '2' => 'Tecnico', '3' => 'Recepcionista')); ?>
		<?php echo $form->error($model,'usr_tipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estatus'); ?>
		<?php echo $form->dropDownList($model, 'estatus',array('Activo' => 'Activo', 'Inactivo' => 'Inactivo')); ?>	
		<?php echo $form->error($model,'estatus'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Salvar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->