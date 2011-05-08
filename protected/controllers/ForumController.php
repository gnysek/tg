<?php

class ForumController extends Controller
{

	public function actionIndex()
	{
		$model = Forum::model()->with('fcats')->findAll();
		$this->render('index', array('model' => $model));
	}

	public function actionPosting()
	{
		$this->render('posting');
	}

	public function actionViewcat()
	{
		// TODO: można kiedyś zaimplementować, aby pokazywało tylko fora w jednej grupie
		// (tzn. jeden <th> )
		$this->render('viewcat');
	}

	public function actionViewforum($id)
	{
		$forum = Forum::model()->findByPk($id);
		$total = Topic::model()->count("topic_id = $id");
		$model = Topic::model()->findAll(array(
					'select' => '*',
					'condition' => 'cat_id=:catID',
					'params' => array(':catID' => $id),
					'order' => 'topic_id DESC'
				)); //
		// ByAttributes('fcat_id', $id);
		$this->render('viewforum', array('forum' => $forum, 'model' => $model, 'total' => $total));
	}

	public function actionViewtopic()
	{
		$this->render('viewtopic');
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
	  'propertyName'=>'propertyValue',
	  ),
	  );
	  }
	 */
}