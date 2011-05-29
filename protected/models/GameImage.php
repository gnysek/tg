<?php

/**
 * This is the model class for table "game_image".
 *
 * The followings are the available columns in table 'game_image':
 * @property integer $game_id
 * @property string $title
 * @property string $src
 * @property string $thumb_src
 * @property integer $votes
 * @property string $score
 *
 * The followings are the available model relations:
 * @property Game $game
 */
class GameImage extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return GameImage the static model class
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
		return 'game_image';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('game_id, title', 'required'),
			array('game_id, votes', 'numerical', 'integerOnly'=>true),
			array('title, src, thumb_src', 'length', 'max'=>255),
			array('score', 'length', 'max'=>3),
			array('src', 'file', 'types' => 'jpg, gif, png', 'allowEmpty' => true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('game_id, title, src, thumb_src, votes, score', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'game_id' => 'Game Id',
			'title' => 'Tytuł',
			'src' => 'Grafika',
			'thumb_src' => 'Miniatura',
			'votes' => 'Głosy',
			'score' => 'Wynik',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('src',$this->src,true);
		$criteria->compare('thumb_src',$this->thumb_src,true);
		$criteria->compare('votes',$this->votes);
		$criteria->compare('score',$this->score,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}