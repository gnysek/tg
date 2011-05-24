<?php

class GameController extends Controller
{

	public $layout = '//layouts/column2';

	public function actionIndex()
	{
		$model = Game::model()->findAll();
		$this->render('index',array('model'=>$model));
	}
	
	public function actionUserGames($userId)
	{
		$user = User::model()->findByPk($userId);
		
		$model = Game::model()->findAll(array(
			'select' => '*',
			'condition' => 'user_id=:userId',
			'params' => array(':userId' => $userId),
			'order' => 'game_id ASC'
		));
		
		$this->render('usergame', array('model' => $model, 'user_name' => $user->name));
	}

	public function actionPubGames($pubId)
	{
		$pub = Publisher::model()->findByPk($pubId);
		
		$model = Game::model()->findAll(array(
			'select' => '*',
			'condition' => 'publisher_id=:pubId',
			'params' => array(':pubId' => $pubId),
			'order' => 'game_id ASC'
		));
		
		$this->render('pubgame', array('model' => $model, 'pub_name' => $pub->name));
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

	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);
		$pub[$model->publisher->publisher_id] = $model->publisher->name;

		if ($model->publisher->isPublisherAdmin()){
			if (!empty($_POST['Game'])){
				$model->attributes = $_POST['Game'];
				if ($model->save()) {
					$this->redirect(array('view', 'id' => $model->game_id));
				}
			}
			
			$this->render('update', array('model' => $model, 'pub' => $pub));
		}
		else
			$this->redirect(array('view', 'id' => $model->game_id));
	}

	public function actionView($id)
	{
		$model = Game::model()->findByPk((int)$id);
		$this->render('view', array('model' => $model));
	}
	
	public function actionVote() //AJAX
	{
		$vote = isset($_POST['vote']) ? $_POST['vote'] : 0;
		$game_id = $_POST['game'];
		$id = Yii::app()->user->getId();
		
		// Save rate
		$game_vote = new GameVote();
		$game_vote->game_id = $game_id;
		$game_vote->user_id = $id;
		$game_vote->score = $vote;
		
		// Change game score
		$game = $this->loadModel($game_id);
		$votes = ($game->score * $game->votes) + $vote;
		$game->votes++;
		$game->score = $votes / $game->votes;
		
		$game_vote->save();
		$game->save();
		$game->refresh();
		
		echo "Twoja ocena: <strong>{$vote}</strong>, Wynik: <strong>{$game->score}</strong>";
	}
	
	public static function userVote($gameId)
	{
		$model = GameVote::model()->findByAttributes(array(
				'user_id' => Yii::app()->user->getId(),
				'game_id' => $gameId
			)
		);
		
		return $model === null;
	}
	
	public function loadModel($id)
	{
		$model = Game::model()->findByPk((int) $id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
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

