<?php

class WebUser extends CWebUser {

	/**
	 * Przechowaj model, zeby nie powtarzac zapytan sql.
	 * @var User
	 */
	private $_model = NULL;

	public function getAdmin() {
		return $this->userModel()->admin ? TRUE : FALSE;
	}
	
	/**
	 * Zwraca lub zczytuje model usera
	 * @return User
	 */
	public function userModel() {
		if ($this->_model === null && Yii::app()->user->id !== NULL) {
				$this->_model = User::model()->findByPk(Yii::app()->user->id);
		}
		return $this->_model;
	}

}
