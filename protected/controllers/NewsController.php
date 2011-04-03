<?php

class NewsController extends Controller
{
	
	public function actionIndex(){
		$model = ContentNews::model()->findAll();
		$this->render('index', array('model' => $model));
	}
}
?>