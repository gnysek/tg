ALTER TABLE `member` DROP FOREIGN KEY `member_ibfk_2` ;

ALTER TABLE `member` ADD FOREIGN KEY ( `publisher_id` ) REFERENCES `tg`.`publisher` (
`publisher_id`
) ON DELETE CASCADE ON UPDATE CASCADE ;
