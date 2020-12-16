<?php

/**
 * This is the model class for table "dependencias".
 *
 * The followings are the available columns in table 'dependencias':
 * @property integer $id
 * @property string $dependencia
 * @property string $ubicacion
 * @property string $responsable
 * @property string $celular
 * @property string $local
 * @property integer $condicion
 */
class Dependencias extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Dependencias the static model class
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
		return 'dependencias';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('dependencia', 'required'),
			array('condicion', 'numerical', 'integerOnly'=>true),
			array('dependencia, ubicacion, responsable, celular, local', 'length', 'max'=>60),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, dependencia, ubicacion, responsable, celular, local, condicion', 'safe', 'on'=>'search'),
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
			'dependencia' => 'Dependencia',
			'ubicacion' => 'Ubicacion',
			'responsable' => 'Responsable',
			'celular' => 'Celular',
			'local' => 'Local',
			'condicion' => 'Condicion',
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
		$criteria->compare('dependencia',$this->dependencia,true);
		$criteria->compare('ubicacion',$this->ubicacion,true);
		$criteria->compare('responsable',$this->responsable,true);
		$criteria->compare('celular',$this->celular,true);
		$criteria->compare('local',$this->local,true);
		$criteria->compare('condicion',$this->condicion);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}