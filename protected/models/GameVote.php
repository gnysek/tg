<?php

/**
 * This is the model class for table "game_vote".
 *
 * The followings are the available columns in table 'game_vote':
 * @property integer $game_id
 * @property integer $user_id
 * @property integer $score
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Game $game
 */
class GameVote extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return GameVote the static model class
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
		return 'game_vote';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('game_id, user_id, score', 'required'),
			array('game_id, user_id, score', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('game_id, user_id, score', 'safe', 'on'=>'search'),
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
			'game' => array(self::BELONGS_TO, 'Game', 'game_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'game_id' => 'Game',
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

		$criteria->compare('game_id',$this->game_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('score',$this->score);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}