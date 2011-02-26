<?php

/**
 * This is the model class for table "content_news".
 *
 * The followings are the available columns in table 'content_news':
 * @property integer $content_id
 * @property string $title
 * @property string $text
 * @property string $more
 *
 * The followings are the available model relations:
 * @property Content $content
 */
class ContentNews extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ContentNews the static model class
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
		return 'content_news';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('content_id, title, text', 'required'),
			array('content_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('more', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('content_id, title, text, more', 'safe', 'on'=>'search'),
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
			'content' => array(self::BELONGS_TO, 'Content', 'content_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'content_id' => 'Content',
			'title' => 'Title',
			'text' => 'Text',
			'more' => 'More',
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

		$criteria->compare('content_id',$this->content_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('more',$this->more,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}