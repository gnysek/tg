<?php

/**
 * This is the model class for table "content_vote".
 *
 * The followings are the available columns in table 'content_vote':
 * @property integer $content_id
 * @property integer $user_id
 * @property integer $score
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Content $content
 */
class ContentVote extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ContentVote the static model class
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
		return 'content_vote';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('content_id, user_id, score', 'required'),
			array('content_id, user_id, score', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('content_id, user_id, score', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'content' => array(self::BELONGS_TO, 'Content', 'content_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'content_id' => 'Content',
			'user_id' => 'User',
			'score' => 'Score',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('score',$this->score);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}