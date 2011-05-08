<?php

class ForumController extends Controller
{

	public function actionIndex()
	{
		$model = Forum::model()->with('fcats')->findAll();
		$this->render('index', array('model' => $model));
	}

	// parametry: id forum, id tematu
	public function actionPosting($id, $topic=0)
	{
		/* @var $fcat Fcat */
		$fcat = Fcat::model()->findByPk($id);
		$model = new Post();
		$modelTopic = new Topic();

		$canSave = TRUE;
		if (empty($topic)) {
			if (!empty($_POST['Topic'])) {
				$modelTopic->attributes = $_POST['Topic'];
				$modelTopic->cat_id = $fcat->cat_id;
				$modelTopic->forum_id = $fcat->forum_id;
				if (!$modelTopic->validate()) {
					$canSave = FALSE;
				}
			}
		}

		if (!empty($_POST['Post'])) {
			// jesli $topic = 0 to znaczy, ze to nowy temat
			$model->attributes = $_POST['Post'];
			if (!$model->validate()) {
				$canSave = FALSE;
			}
			// jeśli mozna zapisywać, to zapisujemy
			if ($canSave) {
				// gdy to jest nowy temat
				if (empty($topic)) {
					$modelTopic->save();
					// mamy zapisany temat, wiec znamy jego ID
					$topic = $modelTopic->topic_id;
				}
				$model->topic_id = $topic;
				// zapisujemy temat normalnie
				$model->save();
				// jesli to nowy temat, zaktualizuj info
				if (!empty($topic)) {
					$modelTopic->topic_data = serialize(array(
						'user_id' => $model->user_id,
						'user_name' => Yii::app()->user->name,
						'pid' => $model->post_id,
						'time' => time(),
							));
					$modelTopic->save();
				}
				$this->redirect(array('viewtopic', 'id' => $model->topic_id));
			}
		}


		$this->render('posting', array('fcat' => $fcat, 'model' => $model, 'modelTopic' => $modelTopic, 'fid' => $id, 'tid' => $topic));
	}

	public function actionViewcat()
	{
		// TODO: można kiedyś zaimplementować, aby pokazywało tylko fora w jednej grupie
		// (tzn. jeden <th> )
		$this->render('viewcat');
	}

	public function actionViewforum($id)
	{
		$fcat = Fcat::model()->findByPk($id);
		$total = Topic::model()->count("topic_id = $id");
		$criteria = new CDbCriteria();
		$criteria->addCondition(array("cat_id = $id"));
		$dataProvider = new CActiveDataProvider('Topic', array(
					'criteria' => $criteria,
				));
		$this->render('viewforum', array('fcat' => $fcat, 'dataProvider' => $dataProvider, 'total' => $total));
	}

	public function actionViewtopic($id)
	{
		$topic = Topic::model()->findByPk($id);
		$criteria = new CDbCriteria();
		$criteria->addCondition(array("topic_id = $id"));
		$dataProvider = new CActiveDataProvider('Post', array(
					'criteria' => $criteria,
				));
		$this->render('viewtopic', array('topic' => $topic, 'dataProvider' => $dataProvider,));
	}

	// Uncomment the following methods and override them if needed
	/*
	  public function filters()
	  {
	  // return the filter configuration for this controller, e.g.:
	  return array(
	  'inlineFilterName',
	  array(
	  'class'=>'path.to.FilterClass',
	  'propertyName'=>'propertyValue',
	  ),
	  );
	  }

	  public function actions()
	  {
	  // return external action classes, e.g.:
	  return array(
	  'action1'=>'path.to.ActionClass',
	  'action2'=>array(
	  'class'=>'path.to.AnotherActionClass',
	  'propertyName'=>'propertyValue



	  ',
	  ),
	  );
	  }
	 */
}