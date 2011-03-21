<?php

class ProfileController extends Controller
{

	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/column2';
	public $defaultAction = 'view';

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
			array('allow',
				'actions' => array('view'),
				'users' => array('@'),
			),
			array('allow',
				'actions' => array('update'),
				'users' => array('@'),
			),
			array('deny', // deny all users
				'users' => array('*'),
			),
		);
	}
	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView()
	{
		$this->render('view', array('model' => $this->loadModel(Yii::app()->user->id)));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate()
	{
		$model = $this->loadModel(Yii::app()->user->id);


		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['User']))
		{
			// zapamietaj tymczasowo stary avatar
			$oldAvatar = $model->avatar;
			$model->attributes = $_POST['User'];

			if ($model->validate())
			{
				$model->avatar = CUploadedFile::getInstance($model, 'avatar');

				if (!empty($model->avatar)) {
					$dir = Yii::getPathOfAlias('webroot') . "/avatars/{$model->name}/";
					$filename = $dir . $model->avatar;

					// utworz katalog
					if (!is_dir($dir))
						@mkdir($dir, 0777);

					// zapisz nowy avatar
					$model->avatar->saveAs($filename);
					
					// usun stary avatar
					if (!empty($oldAvatar) && file_exists($dir . $oldAvatar)) {
						@unlink($dir . $oldAvatar);
					}
					
				} else {
					// przywroc poprzedni avatar, gdy nie zapisujemy nowego
					$model->avatar = $oldAvatar;
				}

				$model->save();
				$this->redirect(array('view'));
			}
		}

		$this->render('update', array(
			'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model = User::model()->findByPk((int) $id);
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
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}
