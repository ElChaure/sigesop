<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'solicitudes-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<table bgcolor='#FEE'>
        <tr>
        <td> 
	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
			$this->widget('CJuiDateTimePicker',array(
			'model'=>$model,
			'attribute'=>'fecha',
                        'mode'=>'date', 
			'options'=>array(
			'showAnim'=>'fold',
			'dateFormat'=>'yy-mm-dd'
			) // jquery plugin options
		));?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>
        </td>
        <td>
	<div class="row">
		<?php echo $form->labelEx($model,'hora'); ?>
		<?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
			$this->widget('CJuiDateTimePicker',array(
			'model'=>$model,
			'attribute'=>'hora',
            'mode'=>'time', 
			'options'=>array(
			'showAnim'=>'fold',
			'dateFormat'=>'hh:mm:ss'
			) // jquery plugin options
		));?>
		<?php echo $form->error($model,'hora'); ?>
	</div>
        </td>
        </tr>
        </table>

	<div class="row">
		<?php 
 	        echo $form->labelEx($model,'receptor_id'); 
		    echo $form->dropDownList($model,'receptor_id', CHtml::listData(Tecnicos::model()->findAll(), 'id', 'nombre_tecnico'));
		    echo $form->error($model,'receptor_id');
  	    ?>
	</div>	
		
		
		
	<div class="row">
		<?php echo $form->labelEx($model,'dependencia_id'); ?>
		<?php echo $form->dropDownList($model,'dependencia_id', CHtml::listData(Dependencias::model()->findAll(), 'id', 'dependencia')); ?>
		<?php echo $form->error($model,'dependencia_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usuario'); ?>
		<?php echo $form->textField($model,'usuario',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'usuario'); ?>
	</div>
        <br>
        <h2>Datos del Equipo:</h2>
        </br>
	<table  bgcolor='#FEE'>
        <tr>
        <td>
	<div class="row">
		<?php echo $form->labelEx($model,'cpu'); ?>
		<?php echo $form->checkBox($model,'cpu'); ?>
		<?php echo $form->error($model,'cpu'); ?>
	</div>
        </td>
        <td>
	<div class="row">
		<?php echo $form->labelEx($model,'impresora'); ?>
		<?php echo $form->checkBox($model,'impresora'); ?>
		<?php echo $form->error($model,'impresora'); ?>
	</div>
        </td>
        <td>
	<div class="row">
		<?php echo $form->labelEx($model,'mouse'); ?>
		<?php echo $form->checkBox($model,'mouse'); ?>
		<?php echo $form->error($model,'mouse'); ?>
	</div>
        </td>
        <td>
	<div class="row">
		<?php echo $form->labelEx($model,'teclado'); ?>
		<?php echo $form->checkBox($model,'teclado'); ?>
		<?php echo $form->error($model,'teclado'); ?>
	</div>
        </td>
        </tr>
        <tr>
        <td>
	<div class="row">
		<?php echo $form->labelEx($model,'escaner'); ?>
		<?php echo $form->checkBox($model,'escaner'); ?>
		<?php echo $form->error($model,'escaner'); ?>
	</div>
        </td>
        <td>
	<div class="row">
		<?php echo $form->labelEx($model,'monitor'); ?>
		<?php echo $form->checkBox($model,'monitor'); ?>
		<?php echo $form->error($model,'monitor'); ?>
	</div>
        </td>
        <td>
	<div class="row">
		<?php echo $form->labelEx($model,'telecom'); ?>
		<?php echo $form->checkBox($model,'telecom'); ?>
		<?php echo $form->error($model,'telecom'); ?>
	</div>
        </td>
        <td>
	<div class="row">
		<?php echo $form->labelEx($model,'otro1'); ?>
		<?php echo $form->checkBox($model,'otro1'); ?>
		<?php echo $form->error($model,'otro1'); ?>
	</div>
        </td>
        </tr>
        </table>
    
        <table> 
        <tr>
        <td> 
	<div class="row">
		<?php echo $form->labelEx($model,'serial'); ?>
		<?php echo $form->textField($model,'serial',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'serial'); ?>
	</div>
        </td>
        <td>
	<div class="row">
		<?php echo $form->labelEx($model,'bien_nacional'); ?>
		<?php echo $form->textField($model,'bien_nacional',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'bien_nacional'); ?>
	</div>
        </td>
        <td>
	<div class="row">
		<?php echo $form->labelEx($model,'modelo'); ?>
		<?php echo $form->textField($model,'modelo',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'modelo'); ?>
	</div>
        </td>
        </tr>
        </table>

	<div class="row">
		<?php echo $form->labelEx($model,'motivo'); ?>
		<?php echo $form->textArea($model,'motivo',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'motivo'); ?>
	</div>

        <br>
        <h2>Datos tecnicos de procedimientos a realizar:</h2>
        </br>

	<table  bgcolor='#FEE'>
        <tr>
        <td>
	<div class="row">
		<?php echo $form->labelEx($model,'hardware'); ?>
		<?php echo $form->checkBox($model,'hardware'); ?>
		<?php echo $form->error($model,'hardware'); ?>
	</div>
        </td>
        <td>
	<div class="row">
		<?php echo $form->labelEx($model,'software'); ?>
		<?php echo $form->checkBox($model,'software'); ?>
		<?php echo $form->error($model,'software'); ?>
	</div>
        </td>
        <td>
	<div class="row">
		<?php echo $form->labelEx($model,'mantenimiento'); ?>
		<?php echo $form->checkBox($model,'mantenimiento'); ?>
		<?php echo $form->error($model,'mantenimiento'); ?>
	</div>
        </td>
        </tr>
        <tr>
        <td>
	<div class="row">
		<?php echo $form->labelEx($model,'antivirus'); ?>
		<?php echo $form->checkBox($model,'antivirus'); ?>
		<?php echo $form->error($model,'antivirus'); ?>
	</div>
        </td>
        <td>
	<div class="row">
		<?php echo $form->labelEx($model,'red'); ?>
		<?php echo $form->checkBox($model,'red'); ?>
		<?php echo $form->error($model,'red'); ?>
	</div>
        </td>
        <td>
	<div class="row">
		<?php echo $form->labelEx($model,'otro2'); ?>
		<?php echo $form->checkBox($model,'otro2'); ?>
		<?php echo $form->error($model,'otro2'); ?>
	</div>
        </td>
        </tr>	
        </table>



	<div class="row">
		<?php 
		      $mi_rol=Yii::app()->user->rol;
		      if ($mi_rol == 'Administrador' || $mi_rol == 'Recepcionista') {
  			     echo $form->labelEx($model,'tecnico_id'); 
		         echo $form->dropDownList($model,'tecnico_id', CHtml::listData(Tecnicos::model()->findAll(), 'id', 'nombre_tecnico'));
		         echo $form->error($model,'tecnico_id');
			  };
  	    ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'observaciones'); ?>
		<?php echo $form->textArea($model,'observaciones',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'observaciones'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estatus'); ?>
		<?php echo $form->dropDownList($model,'estatus', CHtml::listData(Estatus::model()->findAll(), 'estatus', 'descripcion')); ?>
		<?php echo $form->error($model,'estatus'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Salvar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
