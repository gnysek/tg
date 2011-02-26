<?php

/**
 * This is the model class for table "forum".
 *
 * The followings are the available columns in table 'forum':
 * @property integer $forum_id
 * @property string $name
 * @property string $desc
 * @property integer $pos
 * @property integer $visible
 *
 * The followings are the available model relations:
 * @property Fcat[] $fcats
 * @property Topic[] $topics
 */
class Forum extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Forum the static model class
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
		return 'forum';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, desc, pos, visible', 'required'),
			array('pos, visible', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('forum_id, name, desc, pos, visible', 'safe', 'on'=>'search'),
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
			'fcats' => array(self::HAS_MANY, 'Fcat', 'forum_id'),
			'topics' => array(self::HAS_MANY, 'Topic', 'forum_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'forum_id' => 'Forum',
			'name' => 'Name',
			'desc' => 'Desc',
			'pos' => 'Pos',
			'visible' => 'Visible',
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

		$criteria->compare('forum_id',$this->forum_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('pos',$this->pos);
		$criteria->compare('visible',$this->visible);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}