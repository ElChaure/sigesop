<?php
$this->pageTitle=Yii::app()->name . ' - Ingreso al Sistema';
$this->breadcrumbs=array(
	'Login',
);
?>

<h1>Ingresar al Sistema</h1>

<p>Por favor introduzca sus datos de identificacion:</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
		<p class="hint">
			
		</p>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Ingresar'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->