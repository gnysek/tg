<?php

class RankingController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	/*public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}
*/
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model = $this->loadModel($id);
		$game = RankingGame::model()->findAll(array(
					'select' => '*',
					'condition' => 'ranking_id=:rankingID',
					'params' => array(':rankingID' => $model->ranking_id),
					'order'=>'score desc'));
	
		
		$creator = User::model()->find(array(
			'select' => 'name',
			'condition' => 'user_id=:userID',
			'params' => array(':userID' => $model->ranking_creator ),
		));
		
		$this->render('view',array(
			'model'=> $model,
			'creator' => $creator,
			'game' => $game,
		));
	}

	public function actionWinner($ranking)
	{
		$winner = RankingGame::model()->find(array(
			'select' =>'* , max(score) AS score', 
			'condition' => 'ranking_id=:rankingId',
			'params' => array(':rankingId' => $ranking)));
		
		
		/* @var $user_winner Game */
		$user_winner = Game::model()->findByPk($winner->game_id);
		
		$model = $this->loadModel($ranking);
		$model->winner = $user_winner->publisher->user_id;
		$model->update('winner');
		
		$this->render('winner',array(
			'winner' => $model,
			'game' => $user_winner,
		));
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Ranking;
		$game = Game::model()->findAll();
		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['Ranking']))
		{
			$model->attributes=$_POST['Ranking'];
			$model->ranking_creator = Yii::app()->user->id;
			//ZMINIC !!!!!!!!!!!
			$model->winner = 1;
			if($model->save())
				$this->redirect(array('view','id'=>$model->ranking_id));
		}

		$this->render('create',array(
			'model'=>$model,
			'game' =>$game,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$game = Game::model()->findAll();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Ranking']))
		{
			$model->attributes=$_POST['Ranking'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ranking_id));
		}

		$this->render('update',array(
			'model'=>$model,
			'game' =>$game,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
	
	public function actionAddGame($user,$ranking)
	{
		$ranking_sql = "select game_id from ranking_game WHERE ranking_id=$ranking";
		$main_sql = "select * from game WHERE user_id=$user AND game_id NOT IN ($ranking_sql)";
		
		$game = Game::model()->findAllBySql($main_sql);
		
		if(isset($_POST['game']))
		{
			$game = $_POST['game'];
			$dodano = RankingGame::model()->findByAttributes(array('game_id'=> $game, 'ranking_id'=>$ranking));

			if(empty($dodano)) {
				 
				$ranking_game = new RankingGame();
				$ranking_game->game_id = $_POST['game'];
				$ranking_game->ranking_id = $ranking;
				$ranking_game->votes = 0;
				$ranking_game->score = 0;
				
				if($ranking_game->save())
					$this->redirect(array('view','id'=>$ranking));	
			} else {
				$this->render('addGame', array('game' => $game));
			}
			
		}
		$this->render('addGame', array('game' => $game, 'ranking_id' => $ranking));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model = Ranking::model()->findAll();
		$this->render('index', 
			array('model' => $model));
	}
	
	public static function userVote($entryId)
	{
		$model = RankingVote::model()->findByAttributes(array(
				'user_id' => Yii::app()->user->getId(),
				'entry_id' => $entryId
			)
		);
		
		return $model === null;
	}
	
	public function actionVote() //AJAX
	{
		$vote = isset($_POST['vote']) ? $_POST['vote'] : 0;
		$game_id = $_POST['game'];
		$id = Yii::app()->user->getId();
		$entry_id = $_POST['entry_id'];
		$ranking_id = $_POST['ranking_id'];
		
		// Save rate
		$ranking_vote = new RankingVote();
		$ranking_vote->entry_id = $entry_id;
		$ranking_vote->user_id = $id;
		$ranking_vote->score = $vote;
		$ranking_vote->ranking_id = $ranking_id;
		$ranking_vote->save();
		
		// Change game score
		$ranking = RankingGame::model()->findByAttributes(array(
				'entry_id' => $entry_id,
				'game_id' => $game_id
			));
		
		$votes = ($ranking->score * $ranking->votes) + $vote;
		$ranking->votes++;
		$ranking->score = $votes / $ranking->votes;
		
		$ranking->update();
		$ranking->refresh();
		
		echo "Twoja ocena: <strong>{$vote}</strong>, Wynik: <strong>{$ranking->score}</strong>";
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Ranking::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ranking-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
