<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $user_id
 * @property string $name
 * @property string $password
 * @property string $autokey
 * @property string $email
 * @property integer $regdate
 * @property integer $sex
 * @property string $from
 * @property string $bday
 * @property string $real_name
 * @property string $social_status
 * @property string $avatar
 * @property integer $posts
 * @property integer $games
 * @property integer $last_time
 * @property integer $time
 * @property integer $active
 * @property integer $ban
 * @property integer $admin x
 *
 * The followings are the available model relations:
 * @property Comment[] $comments
 * @property ContentVote[] $contentVotes
 * @property GameComment[] $gameComments
 * @property GameFavs[] $gameFavs
 * @property GameVote[] $gameVotes
 * @property Member[] $members
 * @property Post[] $post0
 * @property Ranking[] $rankings
 * @property RankingVote[] $rankingVotes
 */
class User extends CActiveRecord
{
	const MALE = 0;
	const FEMALE = 1;

	public function getSexType()
	{
		return array(
			self::MALE => 'Mężczyzna',
			self::FEMALE => 'Kobieta'
		);
	}
	
	public function getSexText()
	{
		$sexType = $this->getSexType();
		return isset($sexType[$this->sex]) ? $sexType[$this->sex] : "nie podano ({$this->sex})";
	}
	
	public function getRegDateText()
	{
		return date('Y-m-d', $this->regdate);
	}
	
	public function getLastTimeText()
	{
		return date('H:m:s Y-m-d', $this->last_time);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return User the static model class
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
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, password, email', 'required'),
			array('email','email'),
			array('name', 'unique', 'message' => 'Taki login już istnieje'),
			array('email', 'unique', 'message' => 'Taki email już istnieje'),
//			array('password', 'authenticate', 'skipOnError'=>true),
			array('regdate, sex, posts, games, last_time, time, active, ban, admin', 'numerical', 'integerOnly'=>true),
			array('name, autokey, from', 'length', 'max'=>32),
			array('password', 'length', 'min' => 6, 'max'=>38),
			array('email, real_name', 'length', 'max'=>64),
			array('social_status, avatar', 'length', 'max' => 255),
			array('avatar', 'file', 'types' => 'jpg, gif, png', 'allowEmpty' => true),
			array('bday', 'safe'),
			//array('bday', 'datetime', 'format' => 'd/m/yyyy', 'allowEmpty' => true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			// array('user_id, name, password, autokey, email, regdate, sex, from, bday, real_name, social_status, avatar, posts, games, last_time, time, active, ban, admin', 'safe', 'on'=>'search'),
			array('user_id, name, email, regdate, sex, from, bday, real_name, social_status, avatar, posts, games, last_time, time, ban, admin', 'safe', 'on'=>'search'),
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
			'comments' => array(self::HAS_MANY, 'Comment', 'user_id'),
			'contentVotes' => array(self::HAS_MANY, 'ContentVote', 'user_id'),
			'gameComments' => array(self::HAS_MANY, 'GameComment', 'user_id'),
			'gameFavs' => array(self::HAS_MANY, 'GameFavs', 'user_id'),
			'gameVotes' => array(self::HAS_MANY, 'GameVote', 'user_id'),
			'members' => array(self::HAS_MANY, 'Member', 'user_id'),
			'post0' => array(self::HAS_MANY, 'Post', 'user_id'),
			'rankings' => array(self::HAS_MANY, 'Ranking', 'ranking_creator'),
			'rankingVotes' => array(self::HAS_MANY, 'RankingVote', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'User',
			'name' => 'Login',
			'password' => 'Hasło',
			'autokey' => 'Autokey',
			'email' => 'E-mail',
			'regdate' => 'Data rejestracji',
			'sex' => 'Płeć',
			'from' => 'Skąd',
			'bday' => 'Data urodzin',
			'real_name' => 'Imię',
			'social_status' => 'Status',
			'avatar' => 'Avatar',
			'posts' => 'Posty',
			'games' => 'Gry',
			'last_time' => 'Ostatnio widziany',
			'time' => 'Time',
			'active' => 'Active',
			'ban' => 'Ban',
			'admin' => 'Admin',
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

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('name',$this->name,true);
//		$criteria->compare('password',$this->password,true);
//		$criteria->compare('autokey',$this->autokey,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('regdate',$this->regdate);
		$criteria->compare('sex',$this->sex);
		$criteria->compare('from',$this->from,true);
		$criteria->compare('bday',$this->bday,true);
		$criteria->compare('real_name',$this->real_name,true);
		$criteria->compare('social_status',$this->social_status,true);
		$criteria->compare('avatar',$this->avatar,true);
		$criteria->compare('posts',$this->posts);
		$criteria->compare('games',$this->games);
		$criteria->compare('last_time',$this->last_time);
		$criteria->compare('time',$this->time);
		$criteria->compare('active',$this->active);
		$criteria->compare('ban',$this->ban);
		$criteria->compare('admin',$this->admin);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	protected function beforeSave()
	{
		if (parent::beforeSave()) {
			if ($this->isNewRecord) {
				$this->password = md5($this->password);
				$this->last_time = $this->regdate = time();
			}
			return true;
		}
		return false;
	}
}