ALTER TABLE `member` DROP FOREIGN KEY `member_ibfk_2` ;

ALTER TABLE `member` ADD FOREIGN KEY ( `publisher_id` ) REFERENCES `tg`.`publisher` (
`publisher_id`
) ON DELETE CASCADE ON UPDATE CASCADE ;



ALTER TABLE `content` ADD INDEX ( `user_id` ) ;

ALTER TABLE `content` ADD FOREIGN KEY ( `user_id` ) REFERENCES `tg`.`user` (
`user_id`
) ON DELETE CASCADE ON UPDATE CASCADE ;