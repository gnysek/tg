<?php

/**
 * This is the model class for table "game_bugtracker".
 *
 * The followings are the available columns in table 'game_bugtracker':
 * @property integer $bug_id
 * @property integer $game_id
 * @property integer $bug_reporter
 * @property integer $type
 * @property integer $status
 * @property string $text
 * @property string $reply
 * @property integer $date
 * @property integer $update_date
 *
 * The followings are the available model relations:
 * @property Post $bugReporter0
 * @property Game $game
 */
class GameBugtracker extends CActiveRecord
{
	const STATUS_NEW = 0;
	const STATUS_KNOW = 1;
	const STATUS_PROGRESS = 2;
	const STATUS_FEEDBACK = 3;
	const STATUS_FIXED = 4;
	const STATUS_WONT_FIX = 5;
	const STATUS_CLOSED = 6;

	const TYPE_MIS = 0;
	const TYPE_NEW = 1;
	const TYPE_PRO = 2;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return GameBugtracker the static model class
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
		return 'game_bugtracker';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('game_id, bug_reporter, type, status, text, reply, date, update_date', 'required'),
			array('game_id, bug_reporter, type, status, date, update_date', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('bug_id, game_id, bug_reporter, type, status, text, reply, date, update_date', 'safe', 'on'=>'search'),
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
			'bugReporter0' => array(self::BELONGS_TO, 'Post', 'bug_reporter'),
			'game' => array(self::BELONGS_TO, 'Game', 'game_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'bug_id' => 'Bug',
			'game_id' => 'Game',
			'bug_reporter' => 'Zgłaszający',
			'type' => 'Typ',
			'status' => 'Status',
			'text' => 'Opis',
			'reply' => 'Odpowiedź',
			'date' => 'Data',
			'update_date' => 'Update Date',
		);
	}
	
	
	public function _getStatusOptions() {
		return array(
			self::STATUS_NEW => 'Nowy',
			self::STATUS_KNOW => 'Przyjęty',
			self::STATUS_PROGRESS => 'W trakcie',
			self::STATUS_FIXED => 'Naprawiony',
			self::STATUS_CLOSED => 'Zamknięty',
			self::STATUS_WONT_FIX => 'Odrzucony',
			self::STATUS_FEEDBACK => 'Feedback',
		);
	}
	
	public function getStatus() {
		$x = $this->_getStatusOptions();
		return $x[$this->status];
	}
	
	public function _getType() {
		return array(
			self::TYPE_MIS => 'Błąd',
			self::TYPE_NEW => 'Podpowiedź',
			self::TYPE_PRO => 'Propozycja',
		);
	}
	
	public function getType() {
		$x = $this->_getType();
		return $x[$this->type];
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

		$criteria->compare('bug_id',$this->bug_id);
		$criteria->compare('game_id',$this->game_id);
		$criteria->compare('bug_reporter',$this->bug_reporter);
		$criteria->compare('type',$this->type);
		$criteria->compare('status',$this->status);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('reply',$this->reply,true);
		$criteria->compare('date',$this->date);
		$criteria->compare('update_date',$this->update_date);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

}