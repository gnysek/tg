<?php

/**
 * This is the model class for table "post".
 *
 * The followings are the available columns in table 'post':
 * @property integer $post_id
 * @property integer $topic_id
 * @property integer $user_id
 * @property string $text
 *
 * The followings are the available model relations:
 * @property GameBugtracker[] $gameBugtrackers
 * @property Topic $topic
 * @property User $user
 */
class Post extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Post the static model class
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
		return 'post';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('topic_id, user_id, text', 'required'),
			array('topic_id, user_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('post_id, topic_id, user_id, text', 'safe', 'on'=>'search'),
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
			'gameBugtrackers' => array(self::HAS_MANY, 'GameBugtracker', 'bug_reporter'),
			'topic' => array(self::BELONGS_TO, 'Topic', 'topic_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'post_id' => 'Post',
			'topic_id' => 'Topic',
			'user_id' => 'User',
			'text' => 'Text',
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

		$criteria->compare('post_id',$this->post_id);
		$criteria->compare('topic_id',$this->topic_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('text',$this->text,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}