<?php

class PublisherController extends Controller
{

	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/column2';
	public $defaultAction = 'index';

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
				'actions' => array('view', 'index', 'add', 'delete', 'update'),
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

	public function actionAdd()
	{
		$model = new Publisher();
		
		if (!empty($_POST['Publisher'])) {
			$model->attributes = $_POST['Publisher'];
			if ($model->validate() && $model->save()) {
				$this->redirect(array('view'));
			}
		}

		$this->render('add', array('model' => $model));
	}

	public function actionDelete()
	{
		$this->render('delete');
	}

	public function actionIndex()
	{
		$publishers = Member::model()->findAll(array(
					'select' => '*',
					'condition' => 'user_id=:userID',
					'params' => array(':userID' => Yii::app()->user->id),
					'order' => 'publisher_id DESC',
				));
		$this->render('index', array('model' => $publishers));
	}

	public function actionUpdate()
	{
		$this->render('update');
	}

	public function actionView($id)
	{
		$model = $this->loadModel($id);
		
		$this->render('view', array('model'=>$model));
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 * @return Publisher obiekt publishera
	 */
	public function loadModel($id)
	{
		$model = Publisher::model()->findByPk((int) $id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

}