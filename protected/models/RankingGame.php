<?php

/**
 * This is the model class for table "ranking_game".
 *
 * The followings are the available columns in table 'ranking_game':
 * @property integer $entry_id
 * @property integer $game_id
 * @property integer $votes
 * @property string $score
 *
 * The followings are the available model relations:
 * @property Game $game
 * @property RankingVote $rankingVote
 */
class RankingGame extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return RankingGame the static model class
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
		return 'ranking_game';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('game_id, votes, score', 'required'),
			array('game_id, votes', 'numerical', 'integerOnly'=>true),
			array('score', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('entry_id, game_id, votes, score', 'safe', 'on'=>'search'),
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
			'game' => array(self::BELONGS_TO, 'Game', 'game_id'),
			'rankingVote' => array(self::HAS_ONE, 'RankingVote', 'entry_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'entry_id' => 'Entry',
			'game_id' => 'Game',
			'votes' => 'Votes',
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

		$criteria->compare('entry_id',$this->entry_id);
		$criteria->compare('game_id',$this->game_id);
		$criteria->compare('votes',$this->votes);
		$criteria->compare('score',$this->score,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}