<?php

class GameController extends Controller
{

	public $layout = '//layouts/column2';

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionAdd()
	{
		$model = new Game();

		if (!empty($_POST['Game'])) {
			$model->attributes = $_POST['Game'];
			if ($model->validate() && $model->save()) {
				$this->redirect(array('view', 'id' => $model->game_id));
			}
		}

		$buffer = Member::model()->with('publisher')->findAll(array(
					'select' => '*',
					'condition' => 't.user_id=:userID',
					'params' => array(':userID' => Yii::app()->user->id),
					'order' => 't.publisher_id DESC',
				));
		$publishers = array();
		/* @var $p Member */
		foreach ($buffer as $p) {
			$publishers[$p->member_id] = $p->publisher->name;
		}
		$this->render('add', array('model' => $model, 'pub' => $publishers));
	}

	public function actionComment()
	{
		$this->render('comment');
	}

	public function actionDelete()
	{
		$this->render('delete');
	}

	public function actionUpdate()
	{
		$this->render('update');
	}

	public function actionView($id)
	{
		$model = Game::model()->find($id);
		$this->render('view', array('model' => $model));
	}

	public function actionVote()
	{
		$this->render('vote');
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