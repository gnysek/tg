<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class AController extends Controller {
	
	public $layout='/layouts/adminlayout';

	/**
	 * Domyślna rola dla kontrolerów dziedziączych po AController
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules() {
		return array(
				array('allow', // allow admin user to perform 'admin' and 'delete' actions
						'actions' => array('index', 'view','create', 'update', 'admin', 'delete'),
						'users' => AdminModule::adminRuleCheck(),
				),
				array('deny', // deny all users
						'users' => array('*'),
				),
		);
	}

}