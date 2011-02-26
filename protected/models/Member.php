<?php

/**
 * This is the model class for table "member".
 *
 * The followings are the available columns in table 'member':
 * @property integer $member_id
 * @property integer $user_id
 * @property integer $publisher_id
 * @property integer $publisher_admin
 * @property string $publisher_staff_role
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Member $publisher
 * @property Member[] $members
 */
class Member extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Member the static model class
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
		return 'member';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, publisher_id, publisher_admin, publisher_staff_role', 'required'),
			array('user_id, publisher_id, publisher_admin', 'numerical', 'integerOnly'=>true),
			array('publisher_staff_role', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('member_id, user_id, publisher_id, publisher_admin, publisher_staff_role', 'safe', 'on'=>'search'),
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
			'publisher' => array(self::BELONGS_TO, 'Member', 'publisher_id'),
			'members' => array(self::HAS_MANY, 'Member', 'publisher_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'member_id' => 'Member',
			'user_id' => 'User',
			'publisher_id' => 'Publisher',
			'publisher_admin' => 'Publisher Admin',
			'publisher_staff_role' => 'Publisher Staff Role',
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

		$criteria->compare('member_id',$this->member_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('publisher_id',$this->publisher_id);
		$criteria->compare('publisher_admin',$this->publisher_admin);
		$criteria->compare('publisher_staff_role',$this->publisher_staff_role,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}