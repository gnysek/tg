<?php

/**
 * This is the model class for table "content".
 *
 * The followings are the available columns in table 'content':
 * @property integer $content_id
 * @property integer $type
 * @property integer $user_id
 * @property integer $date
 * @property integer $active
 * @property integer $comments
 *
 * The followings are the available model relations:
 * @property Comment[] $comment0
 * @property ContentImage $contentImage
 * @property ContentNews $contentNews
 * @property ContentVideo $contentVideo
 * @property ContentVote $contentVote
 */
class Content extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Content the static model class
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
		return 'content';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, user_id, date, active, comments', 'required'),
			array('type, user_id, date, active, comments', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('content_id, type, user_id, date, active, comments', 'safe', 'on'=>'search'),
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
			'comment0' => array(self::HAS_MANY, 'Comment', 'content_id'),
			'contentImage' => array(self::HAS_ONE, 'ContentImage', 'content_id'),
			'contentNews' => array(self::HAS_ONE, 'ContentNews', 'content_id'),
			'contentVideo' => array(self::HAS_ONE, 'ContentVideo', 'content_id'),
			'contentVote' => array(self::HAS_ONE, 'ContentVote', 'content_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'content_id' => 'Content',
			'type' => 'Type',
			'user_id' => 'User',
			'date' => 'Date',
			'active' => 'Active',
			'comments' => 'Comments',
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

		$criteria->compare('content_id',$this->content_id);
		$criteria->compare('type',$this->type);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('date',$this->date);
		$criteria->compare('active',$this->active);
		$criteria->compare('comments',$this->comments);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}