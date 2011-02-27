<?php

class AdminModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'admin.models.*',
			'admin.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			if (!Yii::app()->user->admin) {
				Yii::app()->getRequest()->redirect(Yii::app()->createUrl('/'));
				return false;
			}
			return true;
		}
		else
			return false;
	}
	
	public static function adminRuleCheck() {
		// goscie to na pewno nie admini ;)
		if (Yii::app()->user->isGuest)
			return array('admin');
		if (Yii::app()->user->admin) {
			return array(Yii::app()->user->name);
		}
		
		return array('admin');
	}
}
