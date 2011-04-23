<?php

/**
 * This is the model class for table "game".
 *
 * The followings are the available columns in table 'game':
 * @property integer $game_id
 * @property integer $publisher_id
 * @property integer $user_id
 * @property string $name
 * @property string $version
 * @property integer $type
 * @property integer $size
 * @property integer $downloads
 * @property string $url
 * @property integer $comments
 * @property integer $images
 * @property integer $videos
 * @property integer $bugtracker_enabled
 * @property integer $voting_enabled
 * @property integer $comments_enabled
 * @property integer $votes
 * @property string $score
 * @property integer $staff_fav
 *
 * The followings are the available model relations:
 * @property Publisher $publisher
 * @property Game[] $games
 * @property GameBugtracker[] $gameBugtrackers
 * @property GameComment[] $gameComments
 * @property GameFavs[] $gameFavs
 * @property GameImage $gameImage
 * @property GameVideo $gameVideo
 * @property GameVote $gameVote
 * @property RankingGame[] $rankingGames
 */
class Game extends CActiveRecord
{

	/**
	 * Returns the static model of the specified AR class.
	 * @return Game the static model class
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
		return 'game';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('publisher_id, name, version, type, size, url', 'required'),
			array('publisher_id, user_id, type, size, downloads, comments, images, videos, bugtracker_enabled, voting_enabled, comments_enabled, votes, staff_fav', 'numerical', 'integerOnly' => true),
			array('version', 'length', 'max' => 8),
			array('score', 'length', 'max' => 1),
			array('name', 'length', 'max' => 255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('game_id, publisher_id, user_id, name, version, type, size, downloads, url, comments, images, videos, bugtracker_enabled, voting_enabled, comments_enabled, votes, score, staff_fav', 'safe', 'on' => 'search'),
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
			'publisher' => array(self::BELONGS_TO, 'Publisher', 'publisher_id'),
			'gameBugtrackers' => array(self::HAS_MANY, 'GameBugtracker', 'game_id'),
			'gameComments' => array(self::HAS_MANY, 'GameComment', 'game_id'),
			'gameFavs' => array(self::HAS_MANY, 'GameFavs', 'game_id'),
			'gameImage' => array(self::HAS_ONE, 'GameImage', 'game_id'),
			'gameVideo' => array(self::HAS_ONE, 'GameVideo', 'game_id'),
			'gameVote' => array(self::HAS_ONE, 'GameVote', 'game_id'),
			'rankingGames' => array(self::HAS_MANY, 'RankingGame', 'game_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'game_id' => 'Id gry',
			'publisher_id' => 'Wydawca',
			'user_id' => 'Dodał',
			'name' => 'Nazwa',
			'version' => 'Numer wersji',
			'type' => 'Typ',
			'size' => 'Rozmiar w MB',
			'downloads' => 'Pobrań',
			'url' => 'Url',
			'comments' => 'Komentarze',
			'images' => 'Screeny',
			'videos' => 'Wideo',
			'bugtracker_enabled' => 'Bugtracker włączony',
			'voting_enabled' => 'Ocenianie włączone',
			'comments_enabled' => 'Komentarze włączone',
			'votes' => 'Głosów',
			'score' => 'Wynik',
			'staff_fav' => 'Staff Pick',
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

		$criteria = new CDbCriteria;

		$criteria->compare('game_id', $this->game_id);
		$criteria->compare('publisher_id', $this->publisher_id);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('name', $this->name);
		$criteria->compare('version', $this->version, true);
		$criteria->compare('type', $this->type);
		$criteria->compare('size', $this->size);
		$criteria->compare('downloads', $this->downloads);
		$criteria->compare('url', $this->url);
		$criteria->compare('comments', $this->comments);
		$criteria->compare('images', $this->images);
		$criteria->compare('videos', $this->videos);
		$criteria->compare('bugtracker_enabled', $this->bugtracker_enabled);
		$criteria->compare('voting_enabled', $this->voting_enabled);
		$criteria->compare('comments_enabled', $this->comments_enabled);
		$criteria->compare('votes', $this->votes);
		$criteria->compare('score', $this->score, true);
		$criteria->compare('staff_fav', $this->staff_fav);

		return new CActiveDataProvider(get_class($this), array(
			'criteria' => $criteria,
		));
	}

	public function getTypes()
	{
		return array(
			1 => 'First Playable',
			2 => 'Alpha',
			3 => 'Beta',
			4 => 'Demo',
			5 => 'Final',
		);
	}

	public function getTypeText()
	{
		$x = $this->getTypes();
		return $x[$this->type];
	}

	protected function beforeSave()
	{
		if ($this->isNewRecord) {
			$this->user_id = Yii::app()->user->id;
		}

		return parent::beforeSave();
	}

}