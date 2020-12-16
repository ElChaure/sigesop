<?php

class SolicitudesController extends Controller
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
				'actions'=>array('create','update','imprime','reporte1','reporte2','reporte3','admin','delete'),
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
		$model=new Solicitudes;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Solicitudes']))
		{
			$model->attributes=$_POST['Solicitudes'];
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

		if(isset($_POST['Solicitudes']))
		{
			$model->attributes=$_POST['Solicitudes'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
                if(Yii::app()->user->rol=='Tecnico') {
     	           
                   $criteria = new CDbCriteria();
                   $q = Yii::app()->user->codigo;
                   $criteria->compare('tecnico_id', $q, true);
                   $dataProvider=new CActiveDataProvider("Solicitudes", array('criteria'=>$criteria));
           	   $this->render('index',array(
  		         'dataProvider'=>$dataProvider,
		   ));

                   }
                else
                   {
     	           $dataProvider=new CActiveDataProvider('Solicitudes');
		   $this->render('index',array(
			'dataProvider'=>$dataProvider,
		   ));
                   }
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
 	        echo Yii::app()->user->codigo;
 	        echo Yii::app()->user->rol;

                if(Yii::app()->user->rol=='Tecnico') {
    	           $model=new Solicitudes('search');
                   $model->tecnico_id=Yii::app()->user->codigo;
                   }
                else
                   {
    	           $model=new Solicitudes('search');
                   $model->unsetAttributes();  // clear any default values
                 }
		
		if(isset($_GET['Solicitudes']))
			$model->attributes=$_GET['Solicitudes'];

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
		$model=Solicitudes::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='solicitudes-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		// Page number
		$this->Cell(0, 10, 'Pagina '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}



public function actionImprime($id){
   $params = array("author" => "Pdf test", "title" =>"TCPDF Example 002", "subject" => "TCPDF Tutorial", "keywords"=>array("TCPDF, PDF, example, test, guide"), "header" => false, "footer" => false, "output" => "Solicitud_".$id.".pdf");

                $pdf = Yii::createComponent('application.extensions.tcpdf.ETcPdf', 'P', 'cm', 'Letter', true, 'UTF-8', $params);
                
                $html = $this->renderPartial('view', array('model' => $this->loadModel($id)), false, true);

                $orden=Solicitudes::model()->findbyPk($id);
                $criteria= new CDbCriteria();
                $criteria->condition='id='.$id;

		$fecha=$orden->fecha;
		$hora=$orden->hora;
		$dependencia_id=$orden->dependencia_id;
		$usuario=$orden->usuario;
		$cpu=$orden->cpu;
		$impresora=$orden->impresora;
		$mouse=$orden->mouse;
		$teclado=$orden->teclado;
		$escaner=$orden->escaner;
		$monitor=$orden->monitor;
		$telecom=$orden->telecom;
		$otro1=$orden->otro1;
		$serial=$orden->serial;
		$bien_nacional=$orden->bien_nacional;
		$modelo=$orden->modelo;
		$hardware=$orden->hardware;
		$software=$orden->software;
		$mantenimiento=$orden->mantenimiento;
		$antivirus=$orden->antivirus;
		$red=$orden->red;
		$otro2=$orden->otro2;
		$motivo=$orden->motivo;
		$tecnico_id=$orden->tecnico_id;
		$observaciones=$orden->observaciones;
		$estatus=$orden->estatus;

                $dependencia=Dependencias::model()->findbyPk($dependencia_id);
                $dep=$dependencia->dependencia; 
                $ubi=$dependencia->ubicacion;
                $con=$dependencia->condicion;

                $tecnico=Tecnicos::model()->findbyPk($tecnico_id);
                $nomtec=$tecnico->nombre_tecnico; 

                
                $valor[0] = " ";
                $valor[1] = "X";  


                if ($con < 2)
                {
                   $institucion='Servicio en Edificio Sede Secretaria de Salud Region Capital';
                }
                else
                {
                   $institucion='Servicio Externo';
                } 



                $pdf->SetCreator(PDF_CREATOR);
                $pdf->SetAuthor("Oficina de Informatica Direccion Estadal de Salud Distrito Capital");
                $pdf->SetTitle("Solicitud de Servicio Nro ".$id);
                $pdf->SetSubject("Requisicion de Soporte Tecnico");
                $pdf->SetKeywords("id, fecha, tecnico, estatus, dependencia");
                $pdf->setPrintHeader(true);
                $pdf->setPrintFooter(false);
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


                $pdf->SetFont("times", "BI", 12);
                $pdf->SetXY(8,2.2); 
                $html='<b>Hoja de Servicio Nro: '.$id.'</b>';
                $pdf->writeHTML($html, true, false, false, false, '');


                $pdf->SetXY(12,3); 
                $html='<b>Fecha de Solicitud: '.$fecha.' / '.$hora.'</b>';
                $pdf->writeHTML($html, true, false, false, false, '');


                $pdf->SetFont("times", "B", 10);
                $pdf->SetXY(1,4); 
                $html='Nombre del Usuario: '.$usuario;
                $pdf->writeHTML($html, true, false, false, false, '');

                $pdf->SetXY(1,4.5); 
                $html='Departamento: '.$dep;
                $pdf->writeHTML($html, true, false, false, false, '');

                $pdf->SetXY(12,4.5); 
                $html='Ubicacion: '.$ubi;
                $pdf->writeHTML($html, true, false, false, false, '');

                $pdf->SetXY(1,5); 
                $html='Institucion: '.$institucion;
                $pdf->writeHTML($html, true, false, false, false, '');

                $pdf->SetXY(1,6); 
                $html='Datos del Equipo: ';
                $pdf->writeHTML($html, true, false, false, false, '');


                $pdf->SetXY(1,6.5); 
                $html='<table width="800" cellspacing="7">
                <tr>
                  <td>CPU</td><td border="1" align="center" width="12">'.$valor[$cpu].'</td>
                  <td>Impresora</td><td border="1" align="center" width="12">'.$valor[$impresora].'</td>
                  <td>Mouse</td><td border="1" align="center" width="12">'.$valor[$mouse].'</td>
                  <td>Teclado</td><td border="1" align="center" width="12">'.$valor[$teclado].'</td>
                </tr>
                <tr>
                  <td>Escaner</td><td border="1" align="center" width="12">'.$valor[$escaner].'</td>
                  <td>Monitor</td><td border="1" align="center" width="12">'.$valor[$monitor].'</td>
                  <td>Telecomunicaciones</td><td border="1" align="center" width="12">'.$valor[$telecom].'</td>
                  <td>Otros</td><td border="1" align="center" width="12">'.$valor[$otro1].'</td>
                </tr>
                </table>
                <hr width="100%"></hr>';
                $pdf->writeHTML($html, true, false, false, false, '');


                $pdf->SetXY(1,8.75); 
                $html='Serial: '.$serial;
                $pdf->writeHTML($html, true, false, false, false, '');

                $pdf->SetXY(6.5,8.75); 
                $html='Nro Bien Nacional: '.$bien_nacional;
                $pdf->writeHTML($html, true, false, false, false, '');

                $pdf->SetXY(14,8.75); 
                $html='Modelo: '.$modelo;
                $pdf->writeHTML($html, true, false, false, false, '');

                $pdf->SetXY(1,9.25); 
                $html='<hr width="100%"></hr>';
                $pdf->writeHTML($html, true, false, false, false, '');

                $pdf->SetXY(1,10); 
                $html='Descripcion del Problema: '.$motivo;
                $pdf->writeHTML($html, true, false, false, false, '');

                $pdf->SetXY(1,15); 
                $html='Datos Tecnicos de procedimientos a realizar: ';
                $pdf->writeHTML($html, true, false, false, false, '');


                $pdf->SetXY(1,15.5); 
                $html='<table width="800" cellspacing="7">
                <tr>
                  <td>Hardware</td><td border="1" align="center" width="12">'.$valor[$hardware].'</td>
                  <td>Software</td><td border="1" align="center" width="12">'.$valor[$software].'</td>
                  <td>Mantenimiento</td><td border="1" align="center" width="12">'.$valor[$mantenimiento].'</td>
                </tr>
                <tr>
                  <td>Actualizacion Antivirus</td><td border="1" align="center" width="12">'.$valor[$antivirus].'</td>
                  <td>Red</td><td border="1" align="center" width="12">'.$valor[$red].'</td>
                  <td>Otros</td><td border="1" align="center" width="12">'.$valor[$otro2].'</td>
                </tr>
                </table>
                <hr width="100%"></hr>';
                $pdf->writeHTML($html, true, false, false, false, '');

                $pdf->SetXY(1,18); 
                $html='Observaciones del Tecnico: '.$observaciones;
                $pdf->writeHTML($html, true, false, false, false, '');

                $pdf->SetXY(5,24); 
                $html='Tecnico';
                $pdf->writeHTML($html, true, false, false, false, '');

                $pdf->SetXY(15,24); 
                $html='Usuario';
                $pdf->writeHTML($html, true, false, false, false, '');

                $pdf->SetXY(5,24.30); 
                $html=$nomtec;
                $pdf->writeHTML($html, true, false, false, false, '');

                $pdf->SetXY(15,24.30); 
                $html=$usuario;
                $pdf->writeHTML($html, true, false, false, false, '');

                $pdf->SetFont("times", "B", 6);
                $pdf->SetXY(8,25.1); 
                $html='Telefonos: 0212-451-59-14 - 451-32-95';
                $pdf->writeHTML($html, true, false, false, false, '');

                $pdf->SetFont("times", "B", 6);
                $pdf->SetXY(5,25.4); 
                $html='Direccion: Av. San Martin, puente 09 de diciembre, Edificio Direccion Estadal de Salud Caracas';
                $pdf->writeHTML($html, true, false, false, false, '');


                ob_end_clean();
                $pdf->Output("Solicitud_".$id.".pdf", "I");
                return $pdf;

}

public function actionReporte1(){
  
   $params = array("author" => "Pdf test", "title" =>"TCPDF Example 002", "subject" => "TCPDF Tutorial", "keywords"=>array("TCPDF, PDF, example, test, guide"), "header" => false, "footer" => false, "output" => "Solicitudes_pendientes.pdf");

     
     $pdf = Yii::createComponent('application.extensions.tcpdf.ETcPdf', 'P', 'cm', 'Letter', true, 'UTF-8', $params);
     

     $criteria= new CDbCriteria();
     $criteria->condition='estatus=1';
     $criteria->order='id';
     $orden=Solicitudes::model()->findAll($criteria);

     $hoy = date("d/m/y");

     $pdf->SetCreator(PDF_CREATOR);
     $pdf->SetAuthor("Oficina de Informatica Direccion Estadal de Salud Distrito Capital");
     $pdf->SetTitle("Reporte de Solicitudes Pendientes");
     $pdf->SetSubject("Solicitudes Pendientes");
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
     $html='<b>Reporte de Solicitudes Pendientes al '.$hoy.'</b>';
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

                $linea =$linea + 0.5;
                }

                    
                ob_end_clean();
                $pdf->Output("Solicitudes Pendientes.pdf", "I");
                return $pdf;
  
   }

public function actionReporte2(){
  
   $params = array("author" => "Pdf test", "title" =>"TCPDF Example 002", "subject" => "TCPDF Tutorial", "keywords"=>array("TCPDF, PDF, example, test, guide"), "header" => false, "footer" => false, "output" => "Solicitudes_pendientes.pdf");

     
     $pdf = Yii::createComponent('application.extensions.tcpdf.ETcPdf', 'P', 'cm', 'Letter', true, 'UTF-8', $params);
     

     $criteria= new CDbCriteria();
     $criteria->condition='estatus=2';
     $criteria->order='id';
     $orden=Solicitudes::model()->findAll($criteria);

     $hoy = date("d/m/y");

     $pdf->SetCreator(PDF_CREATOR);
     $pdf->SetAuthor("Oficina de Informatica Direccion Estadal de Salud Distrito Capital");
     $pdf->SetTitle("Reporte de Solicitudes Finalizadas");
     $pdf->SetSubject("Solicitudes Finalizadas");
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
     $html='<b>Reporte de Solicitudes Finalizadas al '.$hoy.'</b>';
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

                $linea =$linea + 0.5;
                }

                    
                ob_end_clean();
                $pdf->Output("Solicitudes Finalizadas.pdf", "I");
                return $pdf;
  
   }

/*public function actionReporte3(){
  
   $params = array("author" => "Pdf test", "title" =>"TCPDF Example 002", "subject" => "TCPDF Tutorial", "keywords"=>array("TCPDF, PDF, example, test, guide"), "header" => false, "footer" => false, "output" => "Solicitudes_pendientes.pdf");

     
     $pdf = Yii::createComponent('application.extensions.tcpdf.ETcPdf', 'P', 'cm', 'Letter', true, 'UTF-8', $params);
     
     $criteria= new CDbCriteria();
     $criteria->condition='estatus=2';
     $criteria->order='id';
     $orden=Solicitudes::model()->findAll($criteria);


     $pdf->SetCreator(PDF_CREATOR);
     $pdf->SetAuthor("Oficina de Informatica Direccion Estadal de Salud Distrito Capital");
     $pdf->SetTitle("Reporte de Solicitudes Finalizadas");
     $pdf->SetSubject("Solicitudes Finalizadas");
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
     $html='<b>Reporte de Solicitudes Registradas entre</b>';
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

                $linea =$linea + 0.5;
                }

                    
                ob_end_clean();
                $pdf->Output("Solicitudes Finalizadas.pdf", "I");
                return $pdf;
  
   }*/

}
