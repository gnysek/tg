<?php

/**
 * Klasa do updateowania bazy danych
 */
class Update
{

	public static function test()
	{
		echo 'test';
	}

	public static function runUpdate()
	{
		$model = Config::model()->findByPk('database');
		if (!$model) {
			$model = new Config();
			$model->name = 'database';
			$model->value = '1';
			$model->save();
		} else {
			// kolejne updejty
			if ($model->value == 1) {
				$connection=Yii::app()->db;
				$command = $connection->createCommand("ALTER TABLE `game` CHANGE `name` `name` VARCHAR( 255 ) NOT NULL ");
				$command->execute();
				$model->value = 2;
				$model->save();
			}
		}
	}

}
