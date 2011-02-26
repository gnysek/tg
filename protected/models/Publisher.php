<?php

/**
 * This is the model class for table "publisher".
 *
 * The followings are the available columns in table 'publisher':
 * @property integer $publisher_id
 * @property integer $user_id
 * @property integer $type
 * @property string $name
 * @property string $www
 * @property string $desc
 *
 * The followings are the available model relations:
 */
class Publisher extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Publisher the static model class
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
		return 'publisher';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, type, name', 'required'),
			array('user_id, type', 'numerical', 'integerOnly'=>true),
			array('name, www', 'length', 'max'=>255),
			array('desc', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('publisher_id, user_id, type, name, www, desc', 'safe', 'on'=>'search'),
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
			'publisher_id' => 'Publisher',
			'user_id' => 'User',
			'type' => 'Type',
			'name' => 'Name',
			'www' => 'Www',
			'desc' => 'Desc',
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

		$criteria->compare('publisher_id',$this->publisher_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('type',$this->type);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('www',$this->www,true);
		$criteria->compare('desc',$this->desc,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}