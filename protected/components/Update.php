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
		
		if ($model->value == 3) {
			$connection = Yii::app()->db;
			$command = $connection->createCommand("ALTER TABLE `fcat` CHANGE `last_post_data` `last_post_data` INT( 10 ) NOT NULL;");
			$command->execute();
			$model->value = 4;
			$model->save();
		}
		
		if ($model->value == 4) {
			$connection = Yii::app()->db;
			$command = $connection->createCommand("ALTER TABLE `game_video` ADD INDEX ( `game_id` );");
			$command->execute();
			$command = $connection->createCommand("ALTER TABLE `game_video` DROP PRIMARY KEY;");
			$command->execute();
			$command = $connection->createCommand("ALTER TABLE `game_video` ADD `video_id` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;");
			$command->execute();
			$model->value = 5;
			$model->save();
		}
		
		if ($model->value == 5) {
			$connection = Yii::app()->db;
			$command = $connection->createCommand("ALTER TABLE `game_image` ADD INDEX ( `game_id` );");
			$command->execute();
			$command = $connection->createCommand("ALTER TABLE `game_image` DROP PRIMARY KEY;");
			$command->execute();
			$command = $connection->createCommand("ALTER TABLE `game_image` ADD `image_id` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;");
			$command->execute();
			$model->value = 6;
			$model->save();
		}

		if ($model->value == 6) {
			$connection = Yii::app()->db;
			$command = $connection->createCommand("ALTER TABLE `game_bugtracker` DROP FOREIGN KEY `game_bugtracker_ibfk_2`;");
			$command->execute();
			$command = $connection->createCommand("ALTER TABLE `game_bugtracker` ADD FOREIGN KEY ( `bug_reporter` ) REFERENCES `tg`.`user` (
					`user_id`
					) ON DELETE CASCADE ON UPDATE CASCADE ;");
			$command->execute();
			$model->value = 7;
			$model->save();
		}
		
		if ($model->value == 7) {
			$connection = Yii::app()->db;
			$command = $connection->createCommand("ALTER TABLE `game_vote` ADD INDEX ( `game_id` );");
			$command->execute();
			$command = $connection->createCommand("ALTER TABLE `game_vote` DROP PRIMARY KEY;");
			$command->execute();
			$command = $connection->createCommand("ALTER TABLE `game_vote` ADD `vote_id` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;");
			$command->execute();
			$model->value = 8;
			$model->save();
		}
		
		if ($model->value == 8) {
			$connection = Yii::app()->db;
			$command = $connection->createCommand("ALTER TABLE `game` CHANGE `score` `score` DECIMAL( 3, 1 ) NOT NULL;");
			$command->execute();
			$model->value = 9;
			$model->save();
		}
		
		if ($model->value == 9) {
				$connection = Yii::app()->db;
				$command = $connection->createCommand("ALTER TABLE `ranking_vote` ADD `ranking_id` INT(10) NOT NULL;");
				$command->execute();
				$model->value = 10;
				$model->save();
		}
		
		if ($model->value == 10) {
			$connection = Yii::app()->db;
			$command = $connection->createCommand("ALTER TABLE `ranking_game` ADD `ranking_id` INT(10) NOT NULL;");
			$command->execute();
			$model->value = 11;
			$model->save();
		}
		
		if ($model->value == 11) {
			$connection = Yii::app()->db;
			$command = $connection->createCommand("ALTER TABLE `ranking_game` CHANGE `score` `score` DECIMAL( 3, 1 ) NOT NULL;");
			$command->execute();
			$model->value = 12;
			$model->save();
		}
		
		if ($model->value == 12) {
			$connection = Yii::app()->db;
			$command = $connection->createCommand("ALTER TABLE `ranking_vote` ADD INDEX ( `entry_id` );");
			$command->execute();
			$command = $connection->createCommand("ALTER TABLE `ranking_vote` DROP PRIMARY KEY;");
			$command->execute();
			$command = $connection->createCommand("ALTER TABLE `ranking_vote` ADD `vote_id` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;");
			$command->execute();
			$model->value = 13;
			$model->save();
		}
	}

}
