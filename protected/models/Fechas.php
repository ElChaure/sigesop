<?php

/**
 * This is the model class for table "fechas".
 *
 * The followings are the available columns in table 'fechas':
 * @property integer $id
 * @property string $desde
 * @property string $hasta
 * @property integer $tecnico_id
 * @property integer $dependencia_id
 */
class Fechas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Fechas the static model class
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
		return 'fechas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('desde, hasta, tecnico_id, dependencia_id', 'required'),
			array('tecnico_id, dependencia_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, desde, hasta, tecnico_id, dependencia_id', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'desde' => 'Desde',
			'hasta' => 'Hasta',
			'tecnico_id' => 'Tecnico',
			'dependencia_id' => 'Dependencia',
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
		$criteria->compare('desde',$this->desde,true);
		$criteria->compare('hasta',$this->hasta,true);
		$criteria->compare('tecnico_id',$this->tecnico_id);
		$criteria->compare('dependencia_id',$this->dependencia_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}