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
		<?php echo $form->label($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hora'); ?>
		<?php echo $form->textField($model,'hora'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dependencia_id'); ?>
		<?php echo $form->textField($model,'dependencia_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usuario'); ?>
		<?php echo $form->textField($model,'usuario',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cpu'); ?>
		<?php echo $form->textField($model,'cpu'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'impresora'); ?>
		<?php echo $form->textField($model,'impresora'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mouse'); ?>
		<?php echo $form->textField($model,'mouse'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'teclado'); ?>
		<?php echo $form->textField($model,'teclado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'escaner'); ?>
		<?php echo $form->textField($model,'escaner'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'monitor'); ?>
		<?php echo $form->textField($model,'monitor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telecom'); ?>
		<?php echo $form->textField($model,'telecom'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'otro1'); ?>
		<?php echo $form->textField($model,'otro1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'serial'); ?>
		<?php echo $form->textField($model,'serial',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bien_nacional'); ?>
		<?php echo $form->textField($model,'bien_nacional',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'modelo'); ?>
		<?php echo $form->textField($model,'modelo',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hardware'); ?>
		<?php echo $form->textField($model,'hardware'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'software'); ?>
		<?php echo $form->textField($model,'software'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mantenimiento'); ?>
		<?php echo $form->textField($model,'mantenimiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'antivirus'); ?>
		<?php echo $form->textField($model,'antivirus'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'red'); ?>
		<?php echo $form->textField($model,'red'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'otro2'); ?>
		<?php echo $form->textField($model,'otro2'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'motivo'); ?>
		<?php echo $form->textArea($model,'motivo',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tecnico_id'); ?>
		<?php echo $form->textField($model,'tecnico_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'observaciones'); ?>
		<?php echo $form->textArea($model,'observaciones',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estatus'); ?>
		<?php echo $form->textField($model,'estatus'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
