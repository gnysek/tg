<?php

/**
 * This is the model class for table "ranking".
 *
 * The followings are the available columns in table 'ranking':
 * @property integer $ranking_id
 * @property integer $ranking_creator
 * @property integer $start_date
 * @property integer $end_date
 * @property string $name
 * @property string $rules
 * @property integer $winner
 *
 * The followings are the available model relations:
 * @property User $winner0
 * @property User $rankingCreator0
 */
class Ranking extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Ranking the static model class
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
		return 'ranking';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ranking_creator, start_date, end_date, name, rules, winner', 'required'),
			array('ranking_creator, start_date, end_date, winner', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ranking_id, ranking_creator, start_date, end_date, name, rules, winner', 'safe', 'on'=>'search'),
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
			'winner0' => array(self::BELONGS_TO, 'User', 'winner'),
			'rankingCreator0' => array(self::BELONGS_TO, 'User', 'ranking_creator'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ranking_id' => 'Ranking',
			'ranking_creator' => 'Twórca rankingu',
			'start_date' => 'Data rozpoczęcia',
			'end_date' => 'Data zakończenia',
			'name' => 'Nazwa',
			'rules' => 'Zasady',
			'winner' => 'Zwycięsca',
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

		$criteria->compare('ranking_id',$this->ranking_id);
		$criteria->compare('ranking_creator',$this->ranking_creator);
		$criteria->compare('start_date',$this->start_date);
		$criteria->compare('end_date',$this->end_date);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('rules',$this->rules,true);
		$criteria->compare('winner',$this->winner);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}