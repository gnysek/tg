<?php

/**
 * This is the model class for table "fcat".
 *
 * The followings are the available columns in table 'fcat':
 * @property integer $cat_id
 * @property integer $forum_id
 * @property integer $pos
 * @property string $name
 * @property string $desc
 * @property integer $topics_total
 * @property integer $posts_total
 * @property string $last_post_data
 * @property integer $visible 
 *
 * The followings are the available model relations:
 * @property Forum $forum
 * @property Topic[] $topics
 */
class Fcat extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Fcat the static model class
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
		return 'fcat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('forum_id, pos, name, desc, topics_total, posts_total, last_post_data, visible', 'required'),
			array('forum_id, pos, topics_total, posts_total, visible', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cat_id, forum_id, pos, name, desc, topics_total, posts_total, last_post_data, visible', 'safe', 'on'=>'search'),
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
			'forum' => array(self::BELONGS_TO, 'Forum', 'forum_id'),
			'topics' => array(self::HAS_MANY, 'Topic', 'cat_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cat_id' => 'Cat',
			'forum_id' => 'Forum',
			'pos' => 'Pos',
			'name' => 'Name',
			'desc' => 'Desc',
			'topics_total' => 'Topics Total',
			'posts_total' => 'Posts Total',
			'last_post_data' => 'Last Post Data',
			'visible' => 'Visible',
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

		$criteria->compare('cat_id',$this->cat_id);
		$criteria->compare('forum_id',$this->forum_id);
		$criteria->compare('pos',$this->pos);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('topics_total',$this->topics_total);
		$criteria->compare('posts_total',$this->posts_total);
		$criteria->compare('last_post_data',$this->last_post_data,true);
		$criteria->compare('visible',$this->visible);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}