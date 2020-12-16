<?php

/**
 * This is the model class for table "solicitudes".
 *
 * The followings are the available columns in table 'solicitudes':
 * @property integer $id
 * @property string $fecha
 * @property string $hora
 * @property integer $receptor_id
 * @property integer $dependencia_id
 * @property string $usuario
 * @property integer $cpu
 * @property integer $impresora
 * @property integer $mouse
 * @property integer $teclado
 * @property integer $escaner
 * @property integer $monitor
 * @property integer $telecom
 * @property integer $otro1
 * @property string $serial
 * @property string $bien_nacional
 * @property string $modelo
 * @property integer $hardware
 * @property integer $software
 * @property integer $mantenimiento
 * @property integer $antivirus
 * @property integer $red
 * @property integer $otro2
 * @property string $motivo
 * @property integer $tecnico_id
 * @property string $observaciones
 * @property integer $estatus
 */
class Solicitudes extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Solicitudes the static model class
	 */

 


	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'solicitudes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha, hora, dependencia_id, motivo, tecnico_id, estatus', 'required'),
			array('receptor_id, dependencia_id, cpu, impresora, mouse, teclado, escaner, monitor, telecom, otro1, hardware, software, mantenimiento, antivirus, red, otro2, tecnico_id, estatus', 'numerical', 'integerOnly'=>true),
			array('usuario', 'length', 'max'=>40),
			array('serial, bien_nacional, modelo', 'length', 'max'=>25),
			array('observaciones', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fecha, hora, dependencia_id, usuario, cpu, impresora, mouse, teclado, escaner, monitor, telecom, otro1, serial, bien_nacional, modelo, hardware, software, mantenimiento, antivirus, red, otro2, motivo, tecnico_id, observaciones, estatus', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
                       'tecnico' => array(self::BELONGS_TO, 'Tecnicos', 'tecnico_id'),
					   'receptor' => array(self::BELONGS_TO, 'Tecnicos', 'receptor_id'),
                       'dependencia' => array(self::BELONGS_TO, 'Dependencias', 'dependencia_id'),
                       'status' => array(self::BELONGS_TO, 'Estatus', 'estatus'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fecha' => 'Fecha',
			'hora' => 'Hora',
			'receptor_id' => 'Funcionario Receptor',
			'dependencia_id' => 'Dependencia',
			'usuario' => 'Usuario',
			'cpu' => 'Cpu',
			'impresora' => 'Impresora',
			'mouse' => 'Mouse',
			'teclado' => 'Teclado',
			'escaner' => 'Escaner',
			'monitor' => 'Monitor',
			'telecom' => 'Telecomunicaciones',
			'otro1' => 'Otro',
			'serial' => 'Serial',
			'bien_nacional' => 'Nro Bien Nacional',
			'modelo' => 'Modelo',
			'hardware' => 'Hardware',
			'software' => 'Software',
			'mantenimiento' => 'Mantenimiento',
			'antivirus' => 'Antivirus',
			'red' => 'Red',
			'otro2' => 'Otro',
			'motivo' => 'Motivo del Reporte',
			'tecnico_id' => 'Tecnico',
			'observaciones' => 'Observaciones del Tecnico',
			'estatus' => 'Estatus',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('dependencia_id',$this->dependencia_id);
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('serial',$this->serial,true);
		$criteria->compare('bien_nacional',$this->bien_nacional,true);
		$criteria->compare('modelo',$this->modelo,true);
		$criteria->compare('motivo',$this->motivo,true);
		$criteria->compare('tecnico_id',$this->tecnico_id);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('estatus',$this->estatus);

                $sort = new CSort;
                $sort->attributes = array(
                      'address' => array(
                      'asc' => 'dependencia, tecnico, status',
                      'desc' => 'dependencia DESC, tecnico DESC, status DESC',
                      ),
                      '*',
                );


		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
                          'sort'=>$sort,
		));
	}

	public function getValorFromId($id)
	   {
	    $WHERE_PART = 'G_ID='.$id;
	    $data = Yii::app()->db->createCommand()
	       ->select('valor')
	       ->from('valores')
	       ->where($WHERE_PART)
	       ->queryAll();
	    return $data;
	   }


        /*public function beforeSave()
        {
                if ($this->StartDate == '') {
                        $this->setAttribute('StartDate', null);
                } else {
                   $this->StartDate=date('Y-m-d', strtotime($this->StartDate));
                }

                if ($this->StopDate == '') {
                        $this->setAttribute('StopDate', null);
                } else {
                   $this->StopDate=date('Y-m-d', strtotime($this->StopDate));
                }

                return parent::beforeSave();
        } //End beforeSave() 
        */
       

}
