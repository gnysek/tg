<?php

/**
 * This is the model class for table "topic".
 *
 * The followings are the available columns in table 'topic':
 * @property integer $topic_id
 * @property integer $cat_id
 * @property integer $forum_id
 * @property integer $status
 * @property integer $type
 * @property string $title
 * @property integer $posts
 * @property string $topic_data
 * @property string $last_post_data
 *
 * The followings are the available model relations:
 * @property Post[] $post0
 * @property Fcat $cat
 * @property Forum $forum
 */
class Topic extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Topic the static model class
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
		return 'topic';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'required'),
			array('cat_id, forum_id, status, type, posts', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('topic_id, cat_id, forum_id, status, type, title, posts, topic_data, last_post_data', 'safe', 'on'=>'search'),
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
			'post0' => array(self::HAS_MANY, 'Post', 'topic_id'),
			'cat' => array(self::BELONGS_TO, 'Fcat', 'cat_id'),
			'forum' => array(self::BELONGS_TO, 'Forum', 'forum_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'topic_id' => 'Tytuł',
			'cat_id' => 'ID Kategorii',
			'forum_id' => 'ID forum',
			'status' => 'Status',
			'type' => 'Typ',
			'title' => 'Tytuł',
			'posts' => 'Postów',
			'topic_data' => 'Dane tematu',
			'last_post_data' => 'Dane ostatniego postu',
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

		$criteria->compare('topic_id',$this->topic_id);
		$criteria->compare('cat_id',$this->cat_id);
		$criteria->compare('forum_id',$this->forum_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('type',$this->type);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('posts',$this->posts);
		$criteria->compare('topic_data',$this->topic_data,true);
		$criteria->compare('last_post_data',$this->last_post_data,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	protected function beforeSave()
	{
		if (parent::beforeSave()) {
			if ($this->isNewRecord) {
				$this->status = 1;
				$this->type = 1;
				$this->posts = 1;
				$this->topic_data = serialize(array());
				$this->last_post_data = serialize(array());
				
				$model = Fcat::model()->findByPk($this->cat_id);
				/* @var $model Fcat */
				$model->topics_total = (string) ($model->topics_total + 1);
				$model->save();
				
				return true;
			}
			return true;
		}
		return false;
	}
}