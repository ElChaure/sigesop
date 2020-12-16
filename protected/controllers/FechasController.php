<?php

class FechasController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','Reporte3','Reporte4','Reporte5','admin','delete'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Fechas;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Fechas']))
		{
			$model->attributes=$_POST['Fechas'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Fechas']))
		{
			$model->attributes=$_POST['Fechas'];
			if($model->save())
                           $id=$model->id;
                           if($id == 1):
                              $this->forward('Reporte3',true);
                           elseif($id == 2):
                              $this->forward('Reporte4',true);
                           else:
                              $this->forward('Reporte5',true);
                         endif; 
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Fechas');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Fechas('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Fechas']))
			$model->attributes=$_GET['Fechas'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Fechas::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='fechas-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

public function actionReporte3(){
    Yii::app()->getClientScript()->registerCoreScript('jquery');
    Yii::app()->getClientScript()->registerScript('abrirAparte', 'jQuery("a").attr("target","_blank")');
	
	
   $params = array("author" => "Pdf test", "title" =>"TCPDF Example 002", "subject" => "TCPDF Tutorial", "keywords"=>array("TCPDF, PDF, example, test, guide"), "header" => false, "footer" => false, "output" => "Solicitudes_pendientes.pdf");

     
     $pdf = Yii::createComponent('application.extensions.tcpdf.ETcPdf', 'P', 'cm', 'Letter', true, 'UTF-8', $params);
     
     $fechas=Fechas::model()->findbyPk(1);
     $desde=$fechas->desde; 
     $hasta=$fechas->hasta; 

  
     $criteria= new CDbCriteria();
     $criteria->condition="fecha >='".$desde."'AND fecha <='".$hasta."'";
     $criteria->order='id';
     $orden=Solicitudes::model()->findAll($criteria);


     $pdf->SetCreator(PDF_CREATOR);
     $pdf->SetAuthor("Oficina de Informatica Direccion Estadal de Salud Distrito Capital");
     $pdf->SetTitle("Reporte de Solicitudes por Fecha");
     $pdf->SetSubject("Solicitudes por Fecha");
     $pdf->SetKeywords("id, fecha, tecnico, estatus, dependencia");
     $pdf->setPrintHeader(true);
     $pdf->setPrintFooter(true);
     $pdf->AliasNbPages();
     $pdf->SetTopMargin(10); 
     $pdf->SetHeaderMargin(0.2);
     $pdf->SetFooterMargin(1);
     $image_file = 'banner_ministerio_salud.JPG'; 
     $pdf->SetHeaderData($image_file, 18, 'Titulo1', 'Titulo2');

     $pdf->AddPage();

     $pdf->SetFont("times", "BI", 8);
     $pdf->SetXY(11.53,1.50); 
     $html='<b>Unidad de Informatica</b>';
     $pdf->writeHTML($html, true, false, false, false, '');
 
     $pdf->SetFont("times", "BIU", 12);
     $pdf->SetXY(5,2.50); 
     $html='<b>Reporte de Solicitudes Registradas entre '.$desde.' y '.$hasta.'</b>';
     $pdf->writeHTML($html, true, false, false, false, '');


     $pdf->SetFont("times", "BIU", 8);

     $pdf->SetXY(1,4); 
     $html='<b>Id</b>';
     $pdf->writeHTML($html, true, false, false, false, '');

     $pdf->SetXY(1.5,4); 
     $html='<b>Fecha</b>';
     $pdf->writeHTML($html, true, false, false, false, '');

     $pdf->SetXY(3.5,4); 
     $html='<b>Dependencia</b>';
     $pdf->writeHTML($html, true, false, false, false, '');

     $pdf->SetXY(11,4); 
     $html='<b>Usuario</b>';
     $pdf->writeHTML($html, true, false, false, false, '');

     $pdf->SetXY(16,4); 
     $html='<b>Tecnico</b>';
     $pdf->writeHTML($html, true, false, false, false, '');


     $pdf->SetFont("times", "BI", 8);
     $linea =4.5;

     foreach ($orden as $renglon) {
                $id=$renglon->id;
                $fecha=$renglon->fecha;
		$hora=$renglon->hora;
		$dependencia_id=$renglon->dependencia_id;
		$usuario=$renglon->usuario;
		$serial=$renglon->serial;
		$bien_nacional=$renglon->bien_nacional;
		$modelo=$renglon->modelo;
		$motivo=$renglon->motivo;
		$tecnico_id=$renglon->tecnico_id;
		$observaciones=$renglon->observaciones;
		$estatus=$renglon->estatus;
                  
                if($estatus < 2) {
                   $est="Pendiente";
                }  
                else {
                   $est="Finalizada";
                };

                $dependencia=Dependencias::model()->findbyPk($dependencia_id);
                $dep=$dependencia->dependencia; 
                $ubi=$dependencia->ubicacion;
                $con=$dependencia->condicion;

                $tecnico=Tecnicos::model()->findbyPk($tecnico_id);
                $nomtec=$tecnico->nombre_tecnico; 

                $pdf->SetXY(1,$linea); 
                $html=$id;
                $pdf->writeHTML($html, true, false, false, false, '');
               

                $pdf->SetXY(1.5,$linea); 
                $html=$fecha;
                $pdf->writeHTML($html, true, false, false, false, '');

                $pdf->SetXY(3.5,$linea); 
                $html=$dep;
                $pdf->writeHTML($html, true, false, false, false, '');

                $pdf->SetXY(11,$linea); 
                $html=$usuario;
                $pdf->writeHTML($html, true, false, false, false, '');

                $pdf->SetXY(16,$linea); 
                $html=$nomtec;
                $pdf->writeHTML($html, true, false, false, false, '');

                $pdf->SetXY(19,$linea); 
                $html=$est;
                $pdf->writeHTML($html, true, false, false, false, '');

                $linea =$linea + 0.5;
                }

                    
                ob_end_clean();
                $pdf->Output("Solicitudes entre ".$desde." y ".$hasta.".pdf", "I");
                return $pdf;
  
   }

public function actionReporte4(){
  
   $params = array("author" => "Pdf test", "title" =>"TCPDF Example 002", "subject" => "TCPDF Tutorial", "keywords"=>array("TCPDF, PDF, example, test, guide"), "header" => false, "footer" => false, "output" => "Solicitudes_pendientes.pdf");

     
     $pdf = Yii::createComponent('application.extensions.tcpdf.ETcPdf', 'P', 'cm', 'Letter', true, 'UTF-8', $params);
     
     $fechas=Fechas::model()->findbyPk(2);
     $desde=$fechas->desde; 
     $hasta=$fechas->hasta;
     $dependencia_id=$fechas->dependencia_id;  

  
     $criteria= new CDbCriteria();
     $criteria->condition="dependencia_id =".$dependencia_id;
     $criteria->order='id';
     $orden=Solicitudes::model()->findAll($criteria);


     $pdf->SetCreator(PDF_CREATOR);
     $pdf->SetAuthor("Oficina de Informatica Direccion Estadal de Salud Distrito Capital");
     $pdf->SetTitle("Reporte de Solicitudes por Fecha");
     $pdf->SetSubject("Solicitudes por Fecha");
     $pdf->SetKeywords("id, fecha, tecnico, estatus, dependencia");
     $pdf->setPrintHeader(true);
     $pdf->setPrintFooter(true);
     $pdf->AliasNbPages();
     $pdf->SetTopMargin(10); 
     $pdf->SetHeaderMargin(0.2);
     $pdf->SetFooterMargin(1);
     $image_file = 'banner_ministerio_salud.JPG'; 
     $pdf->SetHeaderData($image_file, 18, 'Titulo1', 'Titulo2');

     $pdf->AddPage();

     $pdf->SetFont("times", "BI", 8);
     $pdf->SetXY(11.53,1.50); 
     $html='<b>Unidad de Informatica</b>';
     $pdf->writeHTML($html, true, false, false, false, '');
 
     $pdf->SetFont("times", "BIU", 12);
     $pdf->SetXY(7,2.50); 
     $html='<b>Reporte de Solicitudes Registradas por Dependencia</b>';
     $pdf->writeHTML($html, true, false, false, false, '');


     $pdf->SetFont("times", "BIU", 8);

     $pdf->SetXY(1,4); 
     $html='<b>Id</b>';
     $pdf->writeHTML($html, true, false, false, false, '');

     $pdf->SetXY(1.5,4); 
     $html='<b>Fecha</b>';
     $pdf->writeHTML($html, true, false, false, false, '');

     $pdf->SetXY(3.5,4); 
     $html='<b>Dependencia</b>';
     $pdf->writeHTML($html, true, false, false, false, '');

     $pdf->SetXY(11,4); 
     $html='<b>Usuario</b>';
     $pdf->writeHTML($html, true, false, false, false, '');

     $pdf->SetXY(16,4); 
     $html='<b>Tecnico</b>';
     $pdf->writeHTML($html, true, false, false, false, '');


     $pdf->SetFont("times", "BI", 8);
     $linea =4.5;

     foreach ($orden as $renglon) {
                $id=$renglon->id;
                $fecha=$renglon->fecha;
		$hora=$renglon->hora;
		$dependencia_id=$renglon->dependencia_id;
		$usuario=$renglon->usuario;
		$serial=$renglon->serial;
		$bien_nacional=$renglon->bien_nacional;
		$modelo=$renglon->modelo;
		$motivo=$renglon->motivo;
		$tecnico_id=$renglon->tecnico_id;
		$observaciones=$renglon->observaciones;
		$estatus=$renglon->estatus;
                  
                if($estatus < 2) {
                   $est="Pendiente";
                }  
                else {
                   $est="Finalizada";
                };

                $dependencia=Dependencias::model()->findbyPk($dependencia_id);
                $dep=$dependencia->dependencia; 
                $ubi=$dependencia->ubicacion;
                $con=$dependencia->condicion;

                $tecnico=Tecnicos::model()->findbyPk($tecnico_id);
                $nomtec=$tecnico->nombre_tecnico; 

                $pdf->SetXY(1,$linea); 
                $html=$id;
                $pdf->writeHTML($html, true, false, false, false, '');
               

                $pdf->SetXY(1.5,$linea); 
                $html=$fecha;
                $pdf->writeHTML($html, true, false, false, false, '');

                $pdf->SetXY(3.5,$linea); 
                $html=$dep;
                $pdf->writeHTML($html, true, false, false, false, '');

                $pdf->SetXY(11,$linea); 
                $html=$usuario;
                $pdf->writeHTML($html, true, false, false, false, '');

                $pdf->SetXY(16,$linea); 
                $html=$nomtec;
                $pdf->writeHTML($html, true, false, false, false, '');

                $pdf->SetXY(19,$linea); 
                $html=$est;
                $pdf->writeHTML($html, true, false, false, false, '');

                $linea =$linea + 0.5;
                }

                    
                ob_end_clean();
                $pdf->Output("Solicitudes entre ".$desde." y ".$hasta.".pdf", "I");
                return $pdf;
  
   }

public function actionReporte5(){
  
   $params = array("author" => "Pdf test", "title" =>"TCPDF Example 002", "subject" => "TCPDF Tutorial", "keywords"=>array("TCPDF, PDF, example, test, guide"), "header" => false, "footer" => false, "output" => "Solicitudes_pendientes.pdf");

     
     $pdf = Yii::createComponent('application.extensions.tcpdf.ETcPdf', 'P', 'cm', 'Letter', true, 'UTF-8', $params);
     
     $fechas=Fechas::model()->findbyPk(3);
     $desde=$fechas->desde; 
     $hasta=$fechas->hasta; 
     $tecnico_id=$fechas->tecnico_id;
  
     $criteria= new CDbCriteria();
     $criteria->condition="tecnico_id =".$tecnico_id;
     $criteria->order='id';
     $orden=Solicitudes::model()->findAll($criteria);


     $pdf->SetCreator(PDF_CREATOR);
     $pdf->SetAuthor("Oficina de Informatica Direccion Estadal de Salud Distrito Capital");
     $pdf->SetTitle("Reporte de Solicitudes por Fecha");
     $pdf->SetSubject("Solicitudes por Fecha");
     $pdf->SetKeywords("id, fecha, tecnico, estatus, dependencia");
     $pdf->setPrintHeader(true);
     $pdf->setPrintFooter(true);
     $pdf->AliasNbPages();
     $pdf->SetTopMargin(10); 
     $pdf->SetHeaderMargin(0.2);
     $pdf->SetFooterMargin(1);
     $image_file = 'banner_ministerio_salud.JPG'; 
     $pdf->SetHeaderData($image_file, 18, 'Titulo1', 'Titulo2');

     $pdf->AddPage();

     $pdf->SetFont("times", "BI", 8);
     $pdf->SetXY(11.53,1.50); 
     $html='<b>Unidad de Informatica</b>';
     $pdf->writeHTML($html, true, false, false, false, '');
 
     $pdf->SetFont("times", "BIU", 12);
     $pdf->SetXY(5,2.50); 
     $html='<b>Reporte de Solicitudes Registradas por Tecnico</b>';
     $pdf->writeHTML($html, true, false, false, false, '');


     $pdf->SetFont("times", "BIU", 8);

     $pdf->SetXY(1,4); 
     $html='<b>Id</b>';
     $pdf->writeHTML($html, true, false, false, false, '');

     $pdf->SetXY(1.5,4); 
     $html='<b>Fecha</b>';
     $pdf->writeHTML($html, true, false, false, false, '');

     $pdf->SetXY(3.5,4); 
     $html='<b>Dependencia</b>';
     $pdf->writeHTML($html, true, false, false, false, '');

     $pdf->SetXY(11,4); 
     $html='<b>Usuario</b>';
     $pdf->writeHTML($html, true, false, false, false, '');

     $pdf->SetXY(16,4); 
     $html='<b>Tecnico</b>';
     $pdf->writeHTML($html, true, false, false, false, '');


     $pdf->SetFont("times", "BI", 8);
     $linea =4.5;

     foreach ($orden as $renglon) {
                $id=$renglon->id;
                $fecha=$renglon->fecha;
		$hora=$renglon->hora;
		$dependencia_id=$renglon->dependencia_id;
		$usuario=$renglon->usuario;
		$serial=$renglon->serial;
		$bien_nacional=$renglon->bien_nacional;
		$modelo=$renglon->modelo;
		$motivo=$renglon->motivo;
		$tecnico_id=$renglon->tecnico_id;
		$observaciones=$renglon->observaciones;
		$estatus=$renglon->estatus;
                  
                if($estatus < 2) {
                   $est="Pendiente";
                }  
                else {
                   $est="Finalizada";
                };

                $dependencia=Dependencias::model()->findbyPk($dependencia_id);
                $dep=$dependencia->dependencia; 
                $ubi=$dependencia->ubicacion;
                $con=$dependencia->condicion;

                $tecnico=Tecnicos::model()->findbyPk($tecnico_id);
                $nomtec=$tecnico->nombre_tecnico; 

                $pdf->SetXY(1,$linea); 
                $html=$id;
                $pdf->writeHTML($html, true, false, false, false, '');
               

                $pdf->SetXY(1.5,$linea); 
                $html=$fecha;
                $pdf->writeHTML($html, true, false, false, false, '');

                $pdf->SetXY(3.5,$linea); 
                $html=$dep;
                $pdf->writeHTML($html, true, false, false, false, '');

                $pdf->SetXY(11,$linea); 
                $html=$usuario;
                $pdf->writeHTML($html, true, false, false, false, '');

                $pdf->SetXY(16,$linea); 
                $html=$nomtec;
                $pdf->writeHTML($html, true, false, false, false, '');

                $pdf->SetXY(19,$linea); 
                $html=$est;
                $pdf->writeHTML($html, true, false, false, false, '');

                $linea =$linea + 0.5;
                }

                    
                ob_end_clean();
                $pdf->Output("Solicitudes entre ".$desde." y ".$hasta.".pdf", "I");
                return $pdf;
  
   }



}
