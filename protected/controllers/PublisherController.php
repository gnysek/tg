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
				'actions' => array('view', 'my', 'add', 'delete', 'update'),
				'users' => array('@'),
			),
			array('allow',
				'actions' => array('index'),
				'users' => array('*'),
			),
			array('deny', // deny all users
				'users' => array('*'),
			),
		);
	}

	public function actionAdd()
	{
		$model = new Publisher();

		if (!empty($_POST['Publisher']))
		{
			$model->attributes = $_POST['Publisher'];
			if ($model->validate() && $model->save())
			{
				$this->redirect(array('view', 'id' => $model->publisher_id));
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
		$criteria = new CDbCriteria();
		$criteria->select = '*';

		$count = Publisher::model()->count($criteria);
		$pages = new CPagination($count);
		$pages->pageSize = 25;
		$pages->applyLimit($criteria);

		$publishers = Publisher::model()->findAll($criteria);

		$this->render('index', array(
			'model' => $publishers,
			'pages' => $pages
		));
	}

	public function actionMy()
	{
		$publishers = Member::model()->findAll(array(
			'select' => '*',
			'condition' => 'user_id=:userID',
			'params' => array(':userID' => Yii::app()->user->id),
			'order' => 'publisher_id DESC',
		));
		$this->render('my', array('model' => $publishers));
	}

	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);

		if ($model->isPublisherAdmin())
		{
			if (isset($_POST['Publisher']))
			{
				$model->attributes = $_POST['Publisher'];

				if ($model->save())
					$this->redirect(array('view', 'id' => $model->publisher_id));
			}
			
			$this->render('update', array('model' => $model));
		}
		else
			$this->redirect(array('view', 'id' => $model->publisher_id));
	}

	public function actionView($id)
	{
		$model = $this->loadModel($id);

		$this->render('view', array('model' => $model));
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