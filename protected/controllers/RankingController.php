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
		
		
		$user_winner = Game::model()->find(array(
			'select' =>'user_id', 
			'condition' => 'game_id=:gameId',
			'params' => array(':gameId' => $winner->game_id)));
		
		$model = $this->loadModel($ranking);
		$model->winner = $user_winner->user_id;
		$model->update('winner');
		
		$this->render('winner',array(
			'winner' => $model
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
		$game = Game::model()->findAll(array(
			'select' => '*',
			'condition' => 'user_id=:userID',
			'params' => array(':userID' => $user )
		));
		
		if(isset($_POST['game']))
		{
			$game = $_POST['game'];
			$dodano[] = array();
			$dodano[] = RankingGame::model()->findAllByAttributes(array('game_id'=> $game, 'entry_id'=>$ranking));

			if(empty($dodano[1])){
				$ranking_game = new RankingGame();
				$ranking_game->game_id = $_POST['game'];
				$ranking_game->ranking_id = $ranking;
				$ranking_game->votes = 0;
				$ranking_game->score = 0;
				if($ranking_game->save()){
				/*	$ranking_vote = new RankingVote();
					$ranking_vote->user_id = $user;
					$ranking_vote->score = 0;
					$ranking_game->ranking_id = $ranking;
					$ranking_vote->entry_id = RankingGame::model()->findAllByPk($pk)
					if($ranking_vote->save()){ */
						$this->redirect(array('view','id'=>$ranking));	
				}
			} else {
				$this->render('addGame', 
				array('game' => $game));
			}
			
		}
		$this->render('addGame', 
			array('game' => $game));
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
	
	public static function userVote($rankingId)
	{
		$model = RankingVote::model()->findByAttributes(array(
				'user_id' => Yii::app()->user->getId(),
				'ranking_id' => $rankingId
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
		$ranking_vote = new RankingVote;
		$ranking_vote->entry_id = $entry_id;
		$ranking_vote->user_id = $id;
		$ranking_vote->score = $vote;
		$ranking_vote->ranking_id = $ranking_id;
		
		// Change game score
		
		$ranking = RankingGame::model()->findByAttributes(array(
				'entry_id' => $entry_id,
				'game_id' => $game_id
			));
			$ranking_vote->save();
		$votes = ($ranking->score * $ranking->votes) + $vote;
		$ranking->votes++;
		$ranking->score = $votes / $ranking->votes;
		$ranking->game_id = $game_id;
		$ranking->ranking_id = $ranking_id;
		
		
		
		
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
