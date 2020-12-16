<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'dependencias-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'dependencia'); ?>
		<?php echo $form->textField($model,'dependencia',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'dependencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ubicacion'); ?>
		<?php echo $form->textField($model,'ubicacion',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'ubicacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'responsable'); ?>
		<?php echo $form->textField($model,'responsable',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'responsable'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'celular'); ?>
		<?php echo $form->textField($model,'celular',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'celular'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'local'); ?>
		<?php echo $form->textField($model,'local',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'local'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'condicion'); ?>
		<?php echo $form->dropDownList($model, 'condicion',array('1' => 'Interno', '2' => 'Externo')); ?>
		<?php echo $form->error($model,'condicion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Salvar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
