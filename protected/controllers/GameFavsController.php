<?php

class GameFavsController extends Controller
{

	public $layout = '//layouts/column2';

	public function actionIndex()
	{
		$model = GameFavs::model()->findAll();
		$this->render('index', array('model' => $model));
	}

	public function actionAdd($gameId)
	{
		if(Yii::app()->user->isGuest)
			$this->redirect(array('site/login'));
		
		$model = new GameFavs();
		$isFavs[] = array();
		$isFavs[] = GameFavs::model()->findByAttributes(array('user_id' => Yii::app()->user->id, 'game_id' => $gameId), 'user_id=:userId', array(':userId' => Yii::app()->user->id));

		if (empty($isFavs[1]))
		{
			$model->game_id = $gameId;
			$model->user_id = Yii::app()->user->id;
			if ($model->save())
			{
				$this->redirect(array('view', 'id' => $model->user_id));
			} else
			{
				$this->render('/game/view', array('model' => $model));
			}
		} else
		{
			$model = GameFavs::model()->findAll(array(
				'select' => '*',
				'condition' => 'user_id=:userId',
				'params' => array(':userId' => Yii::app()->user->id)
			));
			$this->render('view', array('model' => $model, 'isFavs' => $isFavs));
		}
	}

	public function actionView($id)
	{
		$model = GameFavs::model()->findAll(array(
			'select' => '*',
			'condition' => 'user_id=:userId',
			'params' => array(':userId' => $id)
		));
		$this->render('view', array('model' => $model));
	}

	public function loadModel($id)
	{
		$model = GameFavs::model()->findByPk((int) $id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	public function actionComment()
	{
		$this->render('comment');
	}

	public function actionDelete()
	{
		$this->render('delete');
	}

	public function actionUpdate($id)
	{
		$this->render('update');
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