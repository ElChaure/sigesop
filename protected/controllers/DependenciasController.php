<?php

class DependenciasController extends Controller
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
				'actions'=>array('create','update','reporte6','admin','delete'),
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
		$model=new Dependencias;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Dependencias']))
		{
			$model->attributes=$_POST['Dependencias'];
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

		if(isset($_POST['Dependencias']))
		{
			$model->attributes=$_POST['Dependencias'];
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
		$dataProvider=new CActiveDataProvider('Dependencias');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Dependencias('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Dependencias']))
			$model->attributes=$_GET['Dependencias'];

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
		$model=Dependencias::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='dependencias-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


public function actionReporte6(){
  
   $params = array("author" => "Pdf test", "title" =>"TCPDF Example 002", "subject" => "TCPDF Tutorial", "keywords"=>array("TCPDF, PDF, example, test, guide"), "header" => false, "footer" => false, "output" => "Solicitudes_pendientes.pdf");

     
     $pdf = Yii::createComponent('application.extensions.tcpdf.ETcPdf', 'P', 'cm', 'Letter', true, 'UTF-8', $params);
     

     $criteria= new CDbCriteria();
     $criteria->condition='condicion<3';
     $criteria->order='id';
     $orden=Dependencias::model()->findAll($criteria);

     $hoy = date("d/m/y");

     $pdf->SetCreator(PDF_CREATOR);
     $pdf->SetAuthor("Oficina de Informatica Direccion Estadal de Salud Distrito Capital");
     $pdf->SetTitle("Reporte de Dependencias");
     $pdf->SetSubject("Reporte de Dependencias");
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
     $html='<b>Reporte de Dependencias al '.$hoy.'</b>';
     $pdf->writeHTML($html, true, false, false, false, '');


     $pdf->SetFont("times", "BIU", 8);
     $pdf->SetFont("times", "BI", 8);

     $linea =4.5;

$html = <<<EOD
    <font size="8">
    <table border="1" >
    <thead>
     <tr style="background-color:#C0C0C0;">
      <td width="12" align="center"><b>Id</b></td>
      <td width="100" align="center"><b>Dependencia</b></td>
      <td width="100" align="center"><b>Ubicacion</b></td>
      <td width="100" align="center"> <b>Responsable</b></td>
      <td width="100" align="center"><b>Celular</b></td>
      <td width="100" align="center"><b>Local</b></td>
      <td width="45" align="center"><b>Condicion</b></td>
     </tr>
    </thead>
EOD;



   foreach ($orden as $renglon) {
                $id=$renglon->id;
                $dependencia=$renglon->dependencia;
		$ubicacion=$renglon->ubicacion;
		$responsable=$renglon->responsable;
		$celular=$renglon->celular;
		$local=$renglon->local;
		$condicion=$renglon->condicion;
                if ($condicion < 2)
                {
                   $institucion='Sede';
                }
                else
                {
                   $institucion='Externo';
                } 

                $html .=  <<<EOD
                <tr>
                   <td width="12" align="center">$id</td>
                   <td width="100">$dependencia</td>
                   <td width="100" >$ubicacion</td>
                   <td width="100" >$responsable</td>
                   <td width="100" >$celular</td>
                   <td width="100" >$local</td>
                   <td width="45" >$institucion</td>
                </tr>
EOD;
}

$html .= <<<EOD
</table>
</font>
EOD;
$pdf->writeHTML($html, true, false, false, false, '');
ob_end_clean();
$pdf->Output("Dependencias.pdf", "I");
return $pdf;
  
   }


}
