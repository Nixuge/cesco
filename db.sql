

CREATE TABLE `aj_users` (
  `users_PK` int(11) NOT NULL , 
  `username` varchar(255) NOT NULL, 
  `passwd` varchar(255) NOT NULL,
  `mail` varchar(100) NOT NULL, 
  `is_validate` int(11) NOT NULL, 
  `verif_code` varchar(256) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `aj_users`
  ADD PRIMARY KEY (`users_PK`);


ALTER TABLE `aj_users`
  MODIFY `users_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;



SET time_zone = "+00:00";

CREATE TABLE `aj_articles` (
  `ARTICLES_PK` int(11) NOT NULL, 
  `title` varchar(8000) NOT NULL, 
  `content` longtext NOT NULL, 
  `dat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP, 
  `USER_FK` int(11) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `aj_articles`
  ADD PRIMARY KEY (`ARTICLES_PK`);



ALTER TABLE `aj_articles`
MODIFY `ARTICLES_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;



SET time_zone = "+00:00";

CREATE TABLE `aj_chat` (
  `CHAT_PK` int(11) NOT NULL, 
  `content` varchar(1000) NOT NULL, 
  `USER_FK` int(11) NOT NULL,
  `dat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `aj_chat`
  ADD PRIMARY KEY (`CHAT_PK`);

ALTER TABLE `aj_chat`
  MODIFY `CHAT_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;



SET time_zone = "+00:00";

CREATE TABLE `aj_comments` (
  `COMENT_PK` int(11) NOT NULL,
  `ARTICLE_FK` int(11) NOT NULL,
  `content` varchar(500) NOT NULL, 
  `dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, 
  `USER_FK` int(11) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `aj_comments`
  ADD PRIMARY KEY (`COMENT_PK`);


ALTER TABLE `aj_comments`
  MODIFY `COMENT_PK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;



SET time_zone = "+00:00";

CREATE TABLE `aj_reactions` (
  `ARTICLE_FK` int(11) NOT NULL,
  `USER_FK` int(11) NOT NULL, 
  `type` varchar(1) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;