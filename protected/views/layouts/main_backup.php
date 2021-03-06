<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo "<img src=".Yii::app()->request->baseUrl."/images/banner_ministerio_salud.JPG>"; ?></div>
	</div><!-- header -->

	<div id="mymenu">
		<?php $this->widget('application.extensions.mbmenu.MbMenu',array(
			'items'=>array(
				array('label'=>'Inicio', 'url'=>array('/site/index')),
                                array('label'=>'Maestros',
				 'visible'=>!Yii::app()->user->isGuest,
				'items'=>array( 
                array('label'=>'Dependencias', 'url'=>array('/dependencias/admin')), 
		array('label'=>'Especialidades', 'url'=>array('/especialidades/admin')), 
		array('label'=>'Tecnicos', 'url'=>array('/tecnicos/admin')), 
                    ), 
                ),
               array('label'=>'Solicitudes de Servicio', 'url'=>array('/solicitudes/admin'), 'visible'=>!Yii::app()->user->isGuest),

               array('label'=>'Acerca de', 'url'=>array('/site/page', 'view'=>'about')),
	       array('label'=>'Contacto', 'url'=>array('/site/contact')),
	       array('label'=>'Ingresar', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
               array('label'=>'Salir ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div id="footer">
		Ministerio del Poder Popular para la Salud - Direccion Estadal de Salud del Disrito Capital - Oficina de Informatica<br/>
		<?php echo date('d-m-Y'); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
