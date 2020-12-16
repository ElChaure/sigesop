<?php

/**
 * This is the model class for table "tecnicos".
 *
 * The followings are the available columns in table 'tecnicos':
 * @property integer $id
 * @property string $nombre_tecnico
 * @property integer $especialidad_id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property integer $usr_tipo
 * @property string $estatus
 */
class Tecnicos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Tecnicos the static model class
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
		return 'tecnicos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_tecnico, especialidad_id, username, password, usr_tipo, estatus', 'required'),
			array('especialidad_id, usr_tipo', 'numerical', 'integerOnly'=>true),
			array('nombre_tecnico', 'length', 'max'=>60),
			array('username, password', 'length', 'max'=>80),
			array('email', 'length', 'max'=>250),
			array('estatus', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre_tecnico, especialidad_id, username, password, email, usr_tipo, estatus', 'safe', 'on'=>'search'),
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
			'nombre_tecnico' => 'Nombre Tecnico',
			'especialidad_id' => 'Especialidad',
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
			'usr_tipo' => 'Usr Tipo',
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
		$criteria->compare('nombre_tecnico',$this->nombre_tecnico,true);
		$criteria->compare('especialidad_id',$this->especialidad_id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('usr_tipo',$this->usr_tipo);
		$criteria->compare('estatus',$this->estatus,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}