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
		try {
			$model = Config::model()->findByPk('database');
		} catch (CDbException $e) {
			$connection = Yii::app()->db;
			$command = $connection->createCommand("CREATE TABLE IF NOT EXISTS `config` (
						  `name` varchar(255) NOT NULL,
						  `value` text,
						  PRIMARY KEY (`name`)
						) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
			$command->execute();
			Yii::app()->request->redirect(Yii::app()->createUrl('/'));
		}
		if (!$model) {
			$model = new Config();
			$model->name = 'database';
			$model->value = '1';
			$model->save();
		}
		// kolejne updejty
		if ($model->value == 1) {
			$connection = Yii::app()->db;
			$command = $connection->createCommand("ALTER TABLE `game` CHANGE `name` `name` VARCHAR( 255 ) NOT NULL ");
			$command->execute();
			$model->value = 2;
			$model->save();
		}
		if ($model->value == 2) {
			$connection = Yii::app()->db;
			$command = $connection->createCommand("ALTER TABLE `game` CHANGE `url` `url` VARCHAR( 255 ) NOT NULL");
			$command->execute();
			$command = $connection->createCommand("ALTER TABLE `game` ADD FOREIGN KEY ( `publisher_id` ) REFERENCES `tg`.`publisher` (
					`publisher_id`
					) ON DELETE CASCADE ON UPDATE CASCADE ;");
			$command->execute();
			$model->value = 3;
			$model->save();
		}
	}

}
