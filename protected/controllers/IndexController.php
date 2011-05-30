<?php

class IndexController extends Controller {
	
	public function actionIndex() {
		$this->registerScript();
		/*SELECT * FROM game_image
		 * WHERE image_id IN (SELECT MAX(image_id) FROM `game_image` GROUP BY game_id) ORDER BY image_id DESC*/
		$model = ContentNews::model()->findAll(array('order'=>'content_id DESC'));
		

		//$condition=Yii::app()->db->createInCondition(GameImage::model()->tableSchema, 'id', $values);
//		$criteria = new CDbCriteria();
//		$criteria->addCondition(array("image_id IN (SELECT MAX(image_id) FROM game_image GROUP BY game_id)"));
//		$modelImg = new CActiveDataProvider('GameImage', array(
//					'criteria' => $criteria,
//				));
		
		$modelImg = GameImage::model()->findAll(array(
			'select' => '*',
			'condition' => 'image_id IN (SELECT MAX(image_id) FROM game_image GROUP BY game_id) ORDER BY image_id DESC',
		));
		
		$this->render('index', array('model' => $model, 'modelImg' => $modelImg));
	}
	
	public function registerScript() {
		$basePath=Yii::getPathOfAlias('application.views.asset');
		$baseUrl=Yii::app()->getAssetManager()->publish($basePath);
		/* @var $cs CClientScript */
		$cs = Yii::app()->getClientScript();
		$cs->registerCoreScript('jquery');
		$cs->registerCssFile($baseUrl.'/css/coin-slider-styles.css');
		//$cs->registerScript(__CLASS__ . '#gameviewhost', "var host_url = 'http://localhost/tg/';");
		$cs->registerScriptFile($baseUrl.'/js/coin-slider.js');
	}
}
