SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

CREATE TABLE IF NOT EXISTS `comment` (
  `comm_id` int(10) NOT NULL AUTO_INCREMENT,
  `content_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date` int(10) NOT NULL,
  `text` varchar(255) NOT NULL,
  PRIMARY KEY (`comm_id`),
  KEY `content_id` (`content_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `content` (
  `content_id` int(10) NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) NOT NULL,
  `user_id` int(5) NOT NULL,
  `date` int(10) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `comments` int(5) NOT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `content_image` (
  `content_id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `src` varchar(255) NOT NULL,
  `thumb_src` varchar(255) NOT NULL,
  `votes` int(10) NOT NULL,
  `score` decimal(1,1) NOT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `content_news` (
  `content_id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `more` text,
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `content_video` (
  `content_id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `src` varchar(255) NOT NULL,
  `preview_img` varchar(255) NOT NULL,
  `votes` int(10) NOT NULL,
  `score` decimal(1,1) NOT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `content_vote` (
  `content_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `score` tinyint(1) NOT NULL,
  PRIMARY KEY (`content_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `fcat` (
  `cat_id` int(5) NOT NULL AUTO_INCREMENT,
  `forum_id` int(5) NOT NULL,
  `pos` int(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `topics_total` int(10) NOT NULL,
  `posts_total` int(10) NOT NULL,
  `last_post_data` text NOT NULL,
  `visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`cat_id`),
  KEY `forum_id` (`forum_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `forum` (
  `forum_id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `pos` int(3) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`forum_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `game` (
  `game_id` int(11) NOT NULL AUTO_INCREMENT,
  `publisher_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `version` varchar(8) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `size` int(5) NOT NULL,
  `downloads` int(5) NOT NULL,
  `url` int(11) NOT NULL,
  `comments` int(5) NOT NULL,
  `images` int(11) NOT NULL,
  `videos` int(11) NOT NULL,
  `bugtracker_enabled` tinyint(1) NOT NULL,
  `voting_enabled` tinyint(1) NOT NULL,
  `comments_enabled` tinyint(1) NOT NULL,
  `votes` int(10) NOT NULL,
  `score` decimal(1,1) NOT NULL,
  `staff_fav` tinyint(1) NOT NULL,
  PRIMARY KEY (`game_id`),
  KEY `publisher_id` (`publisher_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `game_bugtracker` (
  `bug_id` int(10) NOT NULL AUTO_INCREMENT,
  `game_id` int(10) NOT NULL,
  `bug_reporter` int(10) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `text` text NOT NULL,
  `reply` text NOT NULL,
  `date` int(10) NOT NULL,
  `update_date` int(10) NOT NULL,
  PRIMARY KEY (`bug_id`),
  KEY `game_id` (`game_id`),
  KEY `bug_reporter` (`bug_reporter`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `game_comment` (
  `comm_id` int(10) NOT NULL AUTO_INCREMENT,
  `game_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date` int(10) NOT NULL,
  `text` varchar(255) NOT NULL,
  PRIMARY KEY (`comm_id`),
  KEY `game_id` (`game_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `game_favs` (
  `game_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  KEY `game_id` (`game_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `game_image` (
  `game_id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `src` varchar(255) NOT NULL,
  `thumb_src` varchar(255) NOT NULL,
  `votes` int(10) NOT NULL,
  `score` decimal(1,1) NOT NULL,
  PRIMARY KEY (`game_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `game_video` (
  `game_id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `src` varchar(255) NOT NULL,
  `preview_img` varchar(255) NOT NULL,
  `votes` int(10) NOT NULL,
  `score` decimal(1,1) NOT NULL,
  PRIMARY KEY (`game_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `game_vote` (
  `game_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `score` tinyint(1) NOT NULL,
  PRIMARY KEY (`game_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `member` (
  `member_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_id` int(5) NOT NULL,
  `publisher_id` int(5) NOT NULL,
  `publisher_admin` tinyint(1) NOT NULL,
  `publisher_staff_role` varchar(255) NOT NULL,
  PRIMARY KEY (`member_id`),
  KEY `user_id` (`user_id`),
  KEY `publisher_id` (`publisher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(10) NOT NULL AUTO_INCREMENT,
  `topic_id` int(10) NOT NULL,
  `user_id` int(5) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `topic_id` (`topic_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `publisher` (
  `publisher_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_id` int(5) NOT NULL,
  `type` smallint(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `www` varchar(255) DEFAULT NULL,
  `desc` text,
  PRIMARY KEY (`publisher_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

CREATE TABLE IF NOT EXISTS `ranking` (
  `ranking_id` int(10) NOT NULL AUTO_INCREMENT,
  `ranking_creator` int(10) NOT NULL,
  `start_date` int(11) NOT NULL,
  `end_date` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `rules` text NOT NULL,
  `winner` int(10) NOT NULL,
  PRIMARY KEY (`ranking_id`),
  KEY `ranking_creator` (`ranking_creator`),
  KEY `winner` (`winner`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `ranking_game` (
  `entry_id` int(11) NOT NULL AUTO_INCREMENT,
  `game_id` int(10) NOT NULL,
  `votes` int(10) NOT NULL,
  `score` decimal(1,1) NOT NULL,
  PRIMARY KEY (`entry_id`),
  KEY `game_id` (`game_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `ranking_vote` (
  `entry_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `score` tinyint(1) NOT NULL,
  PRIMARY KEY (`entry_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `topic` (
  `topic_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_id` int(5) NOT NULL,
  `forum_id` int(5) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `title` varchar(255) NOT NULL,
  `posts` int(5) NOT NULL,
  `topic_data` text NOT NULL,
  `last_post_data` text NOT NULL,
  PRIMARY KEY (`topic_id`),
  KEY `cat_id` (`cat_id`),
  KEY `forum_id` (`forum_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `password` varchar(38) NOT NULL,
  `autokey` varchar(32) DEFAULT NULL,
  `email` varchar(64) NOT NULL,
  `regdate` int(10) DEFAULT NULL,
  `sex` tinyint(1) DEFAULT '0',
  `from` varchar(32) DEFAULT NULL,
  `bday` date DEFAULT NULL,
  `real_name` varchar(64) DEFAULT NULL,
  `social_status` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `posts` int(5) DEFAULT '0',
  `games` int(5) DEFAULT '0',
  `last_time` int(10) DEFAULT '0',
  `time` int(10) DEFAULT '0',
  `active` tinyint(1) DEFAULT '0',
  `ban` tinyint(1) DEFAULT '0',
  `admin` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;


ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `content` (`content_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `content_image`
  ADD CONSTRAINT `content_image_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `content` (`content_id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `content_news`
  ADD CONSTRAINT `content_news_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `content` (`content_id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `content_video`
  ADD CONSTRAINT `content_video_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `content` (`content_id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `content_vote`
  ADD CONSTRAINT `content_vote_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `content` (`content_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `content_vote_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `fcat`
  ADD CONSTRAINT `fcat_ibfk_1` FOREIGN KEY (`forum_id`) REFERENCES `forum` (`forum_id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `game_bugtracker`
  ADD CONSTRAINT `game_bugtracker_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `game` (`game_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `game_bugtracker_ibfk_2` FOREIGN KEY (`bug_reporter`) REFERENCES `post` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `game_comment`
  ADD CONSTRAINT `game_comment_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `game` (`game_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `game_comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `game_favs`
  ADD CONSTRAINT `game_favs_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `game` (`game_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `game_favs_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `game_image`
  ADD CONSTRAINT `game_image_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `game` (`game_id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `game_video`
  ADD CONSTRAINT `game_video_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `game` (`game_id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `game_vote`
  ADD CONSTRAINT `game_vote_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `game` (`game_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `game_vote_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_2` FOREIGN KEY (`publisher_id`) REFERENCES `publisher` (`publisher_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`topic_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `ranking`
  ADD CONSTRAINT `ranking_ibfk_1` FOREIGN KEY (`ranking_creator`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ranking_ibfk_2` FOREIGN KEY (`winner`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE `ranking_game`
  ADD CONSTRAINT `ranking_game_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `game` (`game_id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `ranking_vote`
  ADD CONSTRAINT `ranking_vote_ibfk_1` FOREIGN KEY (`entry_id`) REFERENCES `ranking_game` (`entry_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ranking_vote_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `topic`
  ADD CONSTRAINT `topic_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `fcat` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `topic_ibfk_2` FOREIGN KEY (`forum_id`) REFERENCES `forum` (`forum_id`) ON DELETE CASCADE ON UPDATE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
