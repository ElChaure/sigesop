<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'desde'); ?>
		<?php echo $form->textField($model,'desde'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hasta'); ?>
		<?php echo $form->textField($model,'hasta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tecnico_id'); ?>
		<?php echo $form->textField($model,'tecnico_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dependencia_id'); ?>
		<?php echo $form->textField($model,'dependencia_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->