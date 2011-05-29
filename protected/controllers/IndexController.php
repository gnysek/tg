<?php

class IndexController extends Controller {
	
	public function actionIndex() {
		$this->registerScript();
		$this->render('index');
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
