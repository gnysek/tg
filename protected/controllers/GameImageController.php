<?php

class GameImageController extends Controller
{

	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('create', 'update', 'delete'),
				'users' => array('@'),
			)
		);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($gameId)
	{
		$model = new GameImage;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['GameImage']))
		{
			$model->game_id = $gameId;
			$model->attributes = $_POST['GameImage'];
			$model->votes = 0;
			$model->score = 0;
			
			$this->uploadImage($model, $model->src, $model->game_id);
			
			if ($model->validate() && $model->save())
				$this->redirect(array('/game/view', 'id' => $model->game_id));
		}

		$this->render('create', array(
			'model' => $model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$oldSrc = $model->src;
		if (isset($_POST['GameImage']))
		{
			$model->attributes = $_POST['GameImage'];
			$this->uploadImage($model, $oldSrc, $model->game_id);
			if ($model->validate() && $model->save())
				$this->redirect(array('/game/view', 'id' => $model->game_id));
		}

		$this->render('update', array(
			'model' => $model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id, $gameId)
	{
		if (Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/game/view', 'id' => $gameId));
		}
		else
			throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model = GameImage::model()->findByAttributes(array('image_id' => $id));
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'game-image-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	private function uploadImage($model,$oldVal,$gameId)
	{
		/* @var $model GameImage */
		if ($model->validate()) {
			$model->src = CUploadedFile::getInstance($model, 'src');

			if (!empty($model->src)) {
				//$md = md5(time()) . end(explode($model->src,'.',2));
				$dir = Yii::getPathOfAlias('webroot') . "/upload/{$gameId}/";
				
				$filename = $dir . $model->src;

				// utworz katalog
				if (!is_dir($dir))
					@mkdir($dir, 0777);
				
				// usun stary screen
				if (!empty($oldVal) && file_exists($dir . $oldVal)) {
					@unlink($dir . $oldVal);
					@unlink($dir . 'thumb_' . $oldVal);
				}

				// zapisz nowy screen
				$model->src->saveAs($filename);

				@copy($filename, $dir . 'thumb_' . $model->src);
				/* @var $image Image */
				$image = Yii::app()->image->load($filename);
				$image->resize(640, 480)->quality(75);
				$image->save();
				
				$image = Yii::app()->image->load($dir . 'thumb_' . $model->src);
				$image->resize(120, 90, 1)->quality(75)->sharpen(20);
				$image->save();
				$model->thumb_src = 'thumb_' . $model->src;
				
			} else {
				// przywroc poprzedni screen, gdy nie zapisujemy nowego
				$model->src = $oldVal;
			}
			return true;
		}
		return false;
	}

}
