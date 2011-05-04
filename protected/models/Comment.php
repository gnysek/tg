<?php

/**
 * This is the model class for table "comment".
 *
 * The followings are the available columns in table 'comment':
 * @property integer $comm_id
 * @property integer $content_id
 * @property integer $user_id
 * @property integer $date
 * @property string $text
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Content $content
 */
class Comment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Comment the static model class
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
		return 'comment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('content_id, user_id, date, text', 'required'),
			array('content_id, user_id, date', 'numerical', 'integerOnly'=>true),
			array('text', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('comm_id, content_id, user_id, date, text', 'safe', 'on'=>'search'),
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
			'content' => array(self::BELONGS_TO, 'Content', 'content_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'comm_id' => 'Comm',
			'content_id' => 'Content',
			'user_id' => 'User',
			'date' => 'Date',
			'text' => 'Text',
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

		$criteria->compare('comm_id',$this->comm_id);
		$criteria->compare('content_id',$this->content_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('date',$this->date);
		$criteria->compare('text',$this->text,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	protected function beforeSave(){
		if ($this->isNewRecord) {
			$this->content_id = $_GET['id'];
			$this->user = Yii::app()->user->id;
			$this->date = time();
		}
		return parent::beforeSave();
	}
	
	protected function afterSave(){
		if ($this->isNewRecord) {
			$model = Content::model()->findByPk($this->content_id);
			$model->comments++;
			$model->save();
		}
		return parent::afterSave();
	
	}
}






