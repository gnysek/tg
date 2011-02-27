<?php

class DefaultController extends AController
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}
	
	public function actionIndex()
	{
		$this->render('index');
	}
}