<?php

/**
 * This is the model class for table "game_video".
 *
 * The followings are the available columns in table 'game_video':
 * @property integer $game_id
 * @property string $title
 * @property string $src
 * @property string $preview_img
 * @property integer $votes
 * @property string $score
 *
 * The followings are the available model relations:
 * @property Game $game
 */
class GameVideo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return GameVideo the static model class
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
		return 'game_video';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('game_id, title, src, votes, score', 'required'),
			array('game_id, votes', 'numerical', 'integerOnly'=>true),
			array('title, src, preview_img', 'length', 'max'=>255),
			array('score', 'length', 'max'=>3),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('game_id, title, src, preview_img, votes, score', 'safe', 'on'=>'search'),
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
			'src' => 'Adres filmu',
			'preview_img' => 'Miniatura',
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
		$criteria->compare('preview_img',$this->preview_img,true);
		$criteria->compare('votes',$this->votes);
		$criteria->compare('score',$this->score,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	protected function beforeValidate()
	{
		if (!preg_match('/youtube/i', $this->src)) {
			$this->addError('src', 'Film musi pochodzić z youtube i być w formacie: http://www.youtube.com/watch?v=XXXXXXXXXXX');
			return false;
		}
		return parent::beforeValidate();
	}
	
	protected function beforeSave() {
		if (parent::beforeSave()) {
			if (preg_match('/youtube/i', $this->src)) {
				// http://www.reelseo.com/youtube-thumbnail-image/
				$this->src = $this->getYTid($this->src);
				$this->preview_img = 'http://img.youtube.com/vi/' . $this->src . '/1.jpg';
			}
			return true;
		}
		
		return false;
	}
	
	/*
	 * http://snipplr.com/view/19232/retrieve-youtube-video-id-from-a-yt-url/
	 * Retrieve the video ID from a YouTube video URL
	 * @param $ytURL The full YouTube URL from which the ID will be extracted
	 * @return $ytvID The YouTube video ID string
	 */

	function getYTid($ytURL)
	{

		$ytvIDlen = 11; // This is the length of YouTube's video IDs
		// The ID string starts after "v=", which is usually right after
		// "youtube.com/watch?" in the URL
		$idStarts = strpos($ytURL, "?v=");

		// In case the "v=" is NOT right after the "?" (not likely, but I like to keep my
		// bases covered), it will be after an "&":
		if ($idStarts === FALSE)
			$idStarts = strpos($ytURL, "&v=");
		// If still FALSE, URL doesn't have a vid ID
		if ($idStarts === FALSE)
			die("YouTube video ID not found. Please double-check your URL.");

		// Offset the start location to match the beginning of the ID string
		$idStarts +=3;

		// Get the ID string and return it
		$ytvID = substr($ytURL, $idStarts, $ytvIDlen);

		return $ytvID;
	}
}