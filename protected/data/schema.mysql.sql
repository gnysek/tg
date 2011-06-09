SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

CREATE TABLE `comment` (
  `comm_id` int(10) NOT NULL AUTO_INCREMENT,
  `content_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date` int(10) NOT NULL,
  `text` varchar(255) NOT NULL,
  PRIMARY KEY (`comm_id`),
  KEY `content_id` (`content_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

INSERT INTO `comment` VALUES(1, 1, 1, 123456789, 'Testowy komentarz');

CREATE TABLE `config` (
  `name` varchar(255) NOT NULL,
  `value` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `config` VALUES('database', '15');

CREATE TABLE `content` (
  `content_id` int(10) NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) NOT NULL,
  `user_id` int(5) NOT NULL,
  `date` int(10) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `comments` int(5) NOT NULL,
  PRIMARY KEY (`content_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

INSERT INTO `content` VALUES(1, 1, 1, 1300744747, 1, 0);
INSERT INTO `content` VALUES(2, 1, 1, 1306787564, 1, 0);
INSERT INTO `content` VALUES(3, 1, 2, 1306788000, 1, 0);

CREATE TABLE `content_image` (
  `content_id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `src` varchar(255) NOT NULL,
  `thumb_src` varchar(255) NOT NULL,
  `votes` int(10) NOT NULL,
  `score` decimal(1,1) NOT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `content_news` (
  `content_id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `more` text,
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `content_news` VALUES(1, 'Szczecin Games Show zakończone!', 'W dniach 21-22 maja odbyła się druga edycja targów Szczecin Games Show. Przez halę przewinęło się 15000 osób, a wśród wystawców znalazły się też teamy niezależne - m.in. twórcy gry franko, demoscena czy GMCLAN. ', 'Lorem ipsum');
INSERT INTO `content_news` VALUES(2, 'Moacube wydaje DLL do obsługi plików OGG na Windows i Mac', 'Ekipa MoaCube wydała w zeszłym tygodniu rozszerzenie DLL do GameMakera pozwalające na odtwarzanie plików OGG zarówno pod Windowsem jak i Makiem. Oczywiście nic nie stoi na przeszkodzie, aby owego rozszerzenia użyć w innych projektach.', '');
INSERT INTO `content_news` VALUES(3, 'CryEngine 3 będzie dostępny publicznie i za darmo', 'CryEngine 3 będzie dostępny publicznie dla wszystkich! Tak w otwartym liście do community modderów zapowiedział Cevat Yerli, szef firmy Crytek. Latem zostanie udostępniony edytor do Crysis 2. Później - w sierpniu tego roku - za darmo upubliczniony zostanie CryENGINE SDK, łącznie z dokumentacją, eksporterami assetów, kodem shaderów oraz - co najciekawsze - "C++ code access" (chodzi pewnie o możliwość programowania gry w kodzie natywnym, nie tylko w języku skryptowym jak w UDK czy Unity).', '');

CREATE TABLE `content_video` (
  `content_id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `src` varchar(255) NOT NULL,
  `preview_img` varchar(255) NOT NULL,
  `votes` int(10) NOT NULL,
  `score` decimal(1,1) NOT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `content_vote` (
  `content_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `score` tinyint(1) NOT NULL,
  PRIMARY KEY (`content_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `fcat` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

INSERT INTO `fcat` VALUES(1, 1, 1, 'Informacje', 'asdf', 0, 0, '', 1);
INSERT INTO `fcat` VALUES(2, 2, 1, 'Grafika', 'Grafika', 2, 2, 'a:4:{s:7:"user_id";s:1:"1";s:9:"user_name";s:5:"admin";s:3:"pid";N;s:4:"time";i:1307607315;}', 1);
INSERT INTO `fcat` VALUES(3, 1, 2, 'Valhalla', 'Można sobie pozwolić na lekką nutkę spamu', 0, 0, '', 0);

CREATE TABLE `forum` (
  `forum_id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `pos` int(3) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`forum_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `forum` VALUES(1, 'Ogólne', 'a', 1, 1);
INSERT INTO `forum` VALUES(2, 'Zasoby', 'test', 2, 1);

CREATE TABLE `game` (
  `game_id` int(11) NOT NULL AUTO_INCREMENT,
  `publisher_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `version` varchar(8) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `size` int(5) NOT NULL,
  `downloads` int(5) NOT NULL,
  `url` varchar(255) NOT NULL,
  `comments` int(5) NOT NULL,
  `images` int(11) NOT NULL,
  `videos` int(11) NOT NULL,
  `bugtracker_enabled` tinyint(1) NOT NULL,
  `voting_enabled` tinyint(1) NOT NULL,
  `comments_enabled` tinyint(1) NOT NULL,
  `votes` int(10) NOT NULL,
  `score` decimal(3,1) NOT NULL,
  `staff_fav` tinyint(1) NOT NULL,
  PRIMARY KEY (`game_id`),
  KEY `publisher_id` (`publisher_id`,`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

INSERT INTO `game` VALUES(1, 2, 1, 'Moja pierwsza gra', '1.0', 2, 7, 0, 'http://onet.pl/', 0, 0, 0, 1, 0, 0, 0, '0.0', 0);
INSERT INTO `game` VALUES(2, 3, 1, 'SuperUltraGreatWonderfulGame', '1', 2, 1, 0, 'http://adres.pl', 0, 0, 0, 0, 0, 0, 0, '0.0', 0);
INSERT INTO `game` VALUES(3, 4, 2, 'Ta gra wygra', '1', 1, 10, 0, 'http://onet.pl', 0, 0, 0, 0, 0, 0, 0, '0.0', 0);
INSERT INTO `game` VALUES(13, 5, 11, 'Cinders', '1', 1, 1, 0, 'http://moacube.com/', 0, 0, 0, 0, 0, 0, 0, '0.0', 0);

CREATE TABLE `game_bugtracker` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

INSERT INTO `game_bugtracker` VALUES(1, 1, 1, 0, 4, 'test test', 'Działa', 1305063818, 1307606078);

CREATE TABLE `game_comment` (
  `comm_id` int(10) NOT NULL AUTO_INCREMENT,
  `game_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date` int(10) NOT NULL,
  `text` varchar(255) NOT NULL,
  PRIMARY KEY (`comm_id`),
  KEY `game_id` (`game_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE `game_favs` (
  `game_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  KEY `game_id` (`game_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `game_image` (
  `image_id` int(10) NOT NULL AUTO_INCREMENT,
  `game_id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `src` varchar(255) NOT NULL,
  `thumb_src` varchar(255) NOT NULL,
  `votes` int(10) NOT NULL,
  `score` decimal(1,1) NOT NULL,
  PRIMARY KEY (`image_id`),
  KEY `game_id` (`game_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

INSERT INTO `game_image` VALUES(3, 3, 'Testowy screen z thumbem', 'font_prop.png', 'thumb_font_prop.png', 0, '0.0');
INSERT INTO `game_image` VALUES(4, 3, 'Testowy screen', 'update.png', 'thumb_update.png', 0, '0.0');
INSERT INTO `game_image` VALUES(5, 1, 'Kai!', 'kai.jpg', 'thumb_kai.jpg', 0, '0.0');
INSERT INTO `game_image` VALUES(6, 1, 'Facebook', 'gt5ava.jpg', 'thumb_gt5ava.jpg', 0, '0.0');
INSERT INTO `game_image` VALUES(7, 1, 'Snejk', 'Tikori5logo.png', 'thumb_Tikori5logo.png', 0, '0.0');
INSERT INTO `game_image` VALUES(8, 2, 'Taki tam', 'desktop.jpg', 'thumb_desktop.jpg', 0, '0.0');
INSERT INTO `game_image` VALUES(10, 13, 'C2', 'screen_cind2.jpg', 'thumb_screen_cind2.jpg', 0, '0.0');
INSERT INTO `game_image` VALUES(11, 13, 'C1', 'screen_cind4.jpg', 'thumb_screen_cind4.jpg', 0, '0.0');
INSERT INTO `game_image` VALUES(12, 2, 'test', '100427105359_11.jpg', 'thumb_100427105359_11.jpg', 0, '0.0');

CREATE TABLE `game_video` (
  `video_id` int(10) NOT NULL AUTO_INCREMENT,
  `game_id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `src` varchar(255) NOT NULL,
  `preview_img` varchar(255) NOT NULL,
  `votes` int(10) NOT NULL,
  `score` decimal(1,1) NOT NULL,
  PRIMARY KEY (`video_id`),
  KEY `game_id` (`game_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

INSERT INTO `game_video` VALUES(1, 1, 'Filmik', 'G-XRzDt_bvo', 'http://img.youtube.com/vi/G-XRzDt_bvo/1.jpg', 0, '0.0');
INSERT INTO `game_video` VALUES(2, 1, 'Dirt3', '6ExOph892HM', 'http://img.youtube.com/vi/6ExOph892HM/1.jpg', 0, '0.0');
INSERT INTO `game_video` VALUES(3, 13, 'Sountrack', 'dkUn6AbxExA', 'http://img.youtube.com/vi/dkUn6AbxExA/1.jpg', 0, '0.0');
INSERT INTO `game_video` VALUES(4, 2, 'Filmik 1', 'L8uCGx2wGk8', 'http://img.youtube.com/vi/L8uCGx2wGk8/1.jpg', 0, '0.0');

CREATE TABLE `game_vote` (
  `vote_id` int(10) NOT NULL AUTO_INCREMENT,
  `game_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `score` tinyint(1) NOT NULL,
  PRIMARY KEY (`vote_id`),
  KEY `user_id` (`user_id`),
  KEY `game_id` (`game_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE `member` (
  `member_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_id` int(5) NOT NULL,
  `publisher_id` int(5) NOT NULL,
  `publisher_admin` tinyint(1) NOT NULL,
  `publisher_staff_role` varchar(255) NOT NULL,
  PRIMARY KEY (`member_id`),
  KEY `user_id` (`user_id`),
  KEY `publisher_id` (`publisher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

INSERT INTO `member` VALUES(2, 1, 1, 1, 'Założyciel');
INSERT INTO `member` VALUES(3, 1, 2, 1, 'Założyciel');
INSERT INTO `member` VALUES(4, 2, 3, 1, 'Założyciel');
INSERT INTO `member` VALUES(6, 2, 2, 0, 'Członek');
INSERT INTO `member` VALUES(7, 10, 2, 0, 'Członek');
INSERT INTO `member` VALUES(8, 1, 4, 1, 'Założyciel');
INSERT INTO `member` VALUES(9, 2, 4, 0, 'Muzyk');
INSERT INTO `member` VALUES(10, 10, 4, 0, 'Członek');
INSERT INTO `member` VALUES(11, 11, 5, 1, 'Założyciel');

CREATE TABLE `post` (
  `post_id` int(10) NOT NULL AUTO_INCREMENT,
  `topic_id` int(10) NOT NULL,
  `user_id` int(5) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `topic_id` (`topic_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

INSERT INTO `post` VALUES(23, 1, 1, 'Treść jest taka nijaka.');
INSERT INTO `post` VALUES(24, 2, 1, 'test');

CREATE TABLE `publisher` (
  `publisher_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_id` int(5) NOT NULL,
  `type` smallint(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `www` varchar(255) DEFAULT NULL,
  `desc` text,
  PRIMARY KEY (`publisher_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

INSERT INTO `publisher` VALUES(1, 1, 0, 'Zespół R', '', '');
INSERT INTO `publisher` VALUES(2, 1, 0, 'Sprytni studenci', 'http://hmt.pl', 'A takie tam srutututut');
INSERT INTO `publisher` VALUES(3, 2, 0, 'Team szarego usera', 'http://onet.pl', 'Krótki opis naszego teamu');
INSERT INTO `publisher` VALUES(4, 1, 0, 'Testowy', '', '');
INSERT INTO `publisher` VALUES(5, 11, 0, 'MoaCube', 'http://moacube.com', 'MoaCube is a small collective of indie game developers, started and headed by Tom Grochowiak.');

CREATE TABLE `ranking` (
  `ranking_id` int(10) NOT NULL AUTO_INCREMENT,
  `ranking_creator` int(10) NOT NULL,
  `start_date` int(11) NOT NULL,
  `end_date` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `rules` text NOT NULL,
  `winner` int(10) DEFAULT NULL,
  PRIMARY KEY (`ranking_id`),
  KEY `ranking_creator` (`ranking_creator`),
  KEY `winner` (`winner`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

INSERT INTO `ranking` VALUES(1, 1, 1304287200, 1305324000, 'ada', 'asdasd', 1);
INSERT INTO `ranking` VALUES(2, 1, 1306274400, 1306533600, 'Ranking testowy', 'asdad', 1);
INSERT INTO `ranking` VALUES(3, 1, 1306965600, 1307311200, 'Najfajniejszy screen', 'Głosujemy na grę która ma najładniejsze screeny ;)', 11);
INSERT INTO `ranking` VALUES(4, 1, 1307656800, 1308693600, 'najlepsza gra', 'wybiermy gre która najbardziej wam sie podoba ', 11);
INSERT INTO `ranking` VALUES(5, 1, 1307484000, 1307916000, 'Czarnobiała gra', 'asd', NULL);

CREATE TABLE `ranking_game` (
  `entry_id` int(11) NOT NULL AUTO_INCREMENT,
  `game_id` int(10) NOT NULL,
  `votes` int(10) NOT NULL,
  `score` decimal(3,1) NOT NULL,
  `ranking_id` int(10) NOT NULL,
  PRIMARY KEY (`entry_id`),
  KEY `game_id` (`game_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

INSERT INTO `ranking_game` VALUES(1, 1, 1, '9.0', 1);
INSERT INTO `ranking_game` VALUES(2, 2, 1, '3.0', 1);
INSERT INTO `ranking_game` VALUES(3, 1, 2, '3.0', 2);
INSERT INTO `ranking_game` VALUES(4, 3, 2, '8.5', 2);
INSERT INTO `ranking_game` VALUES(5, 2, 2, '6.5', 3);
INSERT INTO `ranking_game` VALUES(6, 13, 2, '9.5', 3);
INSERT INTO `ranking_game` VALUES(7, 2, 3, '5.0', 4);
INSERT INTO `ranking_game` VALUES(8, 1, 3, '6.0', 4);
INSERT INTO `ranking_game` VALUES(9, 3, 3, '7.7', 4);
INSERT INTO `ranking_game` VALUES(10, 13, 2, '10.0', 4);

CREATE TABLE `ranking_vote` (
  `vote_id` int(10) NOT NULL AUTO_INCREMENT,
  `entry_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `score` tinyint(1) NOT NULL,
  `ranking_id` int(10) NOT NULL,
  PRIMARY KEY (`vote_id`),
  KEY `user_id` (`user_id`),
  KEY `entry_id` (`entry_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

INSERT INTO `ranking_vote` VALUES(1, 1, 1, 9, 1);
INSERT INTO `ranking_vote` VALUES(2, 2, 1, 3, 1);
INSERT INTO `ranking_vote` VALUES(3, 3, 2, 5, 2);
INSERT INTO `ranking_vote` VALUES(4, 4, 2, 9, 2);
INSERT INTO `ranking_vote` VALUES(5, 4, 1, 8, 2);
INSERT INTO `ranking_vote` VALUES(6, 3, 1, 1, 2);
INSERT INTO `ranking_vote` VALUES(7, 5, 11, 7, 3);
INSERT INTO `ranking_vote` VALUES(8, 6, 11, 10, 3);
INSERT INTO `ranking_vote` VALUES(9, 6, 1, 9, 3);
INSERT INTO `ranking_vote` VALUES(10, 5, 1, 6, 3);
INSERT INTO `ranking_vote` VALUES(11, 7, 1, 4, 4);
INSERT INTO `ranking_vote` VALUES(12, 8, 1, 7, 4);
INSERT INTO `ranking_vote` VALUES(13, 8, 2, 7, 4);
INSERT INTO `ranking_vote` VALUES(14, 7, 2, 3, 4);
INSERT INTO `ranking_vote` VALUES(15, 9, 2, 9, 4);
INSERT INTO `ranking_vote` VALUES(16, 9, 11, 9, 4);
INSERT INTO `ranking_vote` VALUES(17, 8, 11, 4, 4);
INSERT INTO `ranking_vote` VALUES(18, 7, 11, 8, 4);
INSERT INTO `ranking_vote` VALUES(19, 10, 2, 10, 4);
INSERT INTO `ranking_vote` VALUES(20, 10, 1, 10, 4);
INSERT INTO `ranking_vote` VALUES(21, 9, 1, 5, 4);

CREATE TABLE `topic` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `topic` VALUES(1, 2, 2, 1, 1, 'Nowy temat', 1, 'a:4:{s:7:"user_id";s:1:"1";s:9:"user_name";s:5:"admin";s:3:"pid";s:2:"23";s:4:"time";i:1307560674;}', 'a:0:{}');
INSERT INTO `topic` VALUES(2, 2, 2, 1, 1, 'Testowy temat', 2, 'a:0:{}', 'a:4:{s:7:"user_id";s:1:"1";s:9:"user_name";s:5:"admin";s:3:"pid";N;s:4:"time";i:1307607315;}');

CREATE TABLE `user` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

INSERT INTO `user` VALUES(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, 'admin@admin.pl', NULL, 0, 'Gdańsk', '1987-11-25', 'Piotr', NULL, 'gbc3.gif', 0, 0, 0, 0, 0, 0, 1);
INSERT INTO `user` VALUES(2, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', NULL, 'demo@demo.pl', NULL, 0, '', '0000-00-00', '', NULL, 'layton.png', 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `user` VALUES(10, 'gnysek', '08aa782883aa4d69d2a31084945f137b', NULL, 'gnysek@gnysek.pl', 1231231231, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `user` VALUES(11, 'teegee', '0d497d871b288b6a20a7dc8549cf7261', NULL, 'teegee@teegee.com', 1306788174, 0, NULL, NULL, NULL, NULL, NULL, 0, 0, 1306788174, 0, 0, 0, 0);


ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `content` (`content_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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

ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`publisher_id`) REFERENCES `publisher` (`publisher_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `game_ibfk_2` FOREIGN KEY (`publisher_id`) REFERENCES `publisher` (`publisher_id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `game_bugtracker`
  ADD CONSTRAINT `game_bugtracker_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `game` (`game_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `game_bugtracker_ibfk_2` FOREIGN KEY (`bug_reporter`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `member_ibfk_2` FOREIGN KEY (`publisher_id`) REFERENCES `publisher` (`publisher_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
