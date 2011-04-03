<?php

class MemberController extends Controller
{
	public function actionBrowseAdd($id)
	{
		$model = $this->loadPublisherModel($id);
		
		// znajdz tych userow, ktorzy juz sa w tym publisherze
		$existingMembers = Member::model()->findAll(array(
			'select' => 'user_id',
			'condition' => 'publisher_id=:pubID',
			'params' => array(':pubID' => $id),
			'order' => 'user_id ASC',
		));
		
		$exclude = array();
		/* @var $e User */
		foreach ($existingMembers as $e) {
			$exclude[] = $e->user_id;
		}
		
		// teraz pobierz wszystkich userów, poza tymi których przed chwilą buforowalismy
		if (!empty($exclude)) {
			$criteria = new CDbCriteria();
			$criteria->addNotInCondition('user_id', $exclude);
			$dataProvider = new CActiveDataProvider('User', array(
						'criteria' => $criteria,
					));
		} else {
			$dataProvider = new CActiveDataProvider('User');
		}
		
		// userów na strone
//		$dataProvider->pagination->pageSize = 20;
		$this->render('add',array(
			'model'=>$model,
			'dataProvider'=>$dataProvider,
		));
	}
	
	public function actionRemoveMember($id) {
		// id to numer rekordu w tabeli member, a nie id usera, zeby było jasne ;)
		$model = $this->loadModel($id);
		$pubId = $model->publisher_id; //zapamietaj, bo zaraz stracimy rekord
		$model->delete();
		$this->redirect(array('publisher/view','id' => $pubId));
	}
	
	public function actionAdd($pubId, $memId) {
		// wczytaj czy taki publisher w ogóle istnieje
		// jeśli nie, to load model zwróci 404
		$model = $this->loadPublisherModel($pubId);
		
		// utwórz model
		$member = new Member();
		$member->publisher_id = $pubId;
		$member->user_id = $memId;
		$member->publisher_admin = 0;
		$member->publisher_staff_role = 'Członek';
		$member->save();
		
		$this->redirect(array('publisher/view','id' => $pubId));
	}

	public function actionDelete()
	{
		$this->render('delete');
	}

	public function actionUpdate()
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
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 * @return Publisher obiekt publishera
	 */
	public function loadPublisherModel($id)
	{
		$model = Publisher::model()->findByPk((int) $id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 * @return Member obiekt membera
	 */
	public function loadModel($id)
	{
		$model = Member::model()->findByPk((int) $id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}
}