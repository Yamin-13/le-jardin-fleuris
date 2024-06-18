-- - Supprime la base de données si elle existe déjà
-- - Crée la base de données
-- - Mentionne le nom de la base de données à utiliser pour exécuter les commandes SQL qui suivent
DROP DATABASE IF EXISTS `520-blog-ecf-YAO`;
CREATE DATABASE IF NOT EXISTS `520-blog-ecf-YAO`;
USE `520-blog-ecf-YAO`;

-- -------------
-- TABLES
-- -------------

CREATE TABLE user (
   id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY
   ,name varchar(50)
  ,password varchar(100) NOT NULL
  ,email varchar(50) NOT NULL
  ,idRole bigint(20) NOT NULL
)
;

CREATE TABLE role (
   id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY
  ,code varchar(50) NOT NULL
  ,label varchar(50) NOT NULL
)
;

CREATE TABLE comment (
  id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY
  ,text varchar(500) NOT NULL
  ,date timestamp(6) NOT NULL
  ,idUser bigint(20) NOT NULL
  ,idArticle bigint(20) NOT NULL
)
;

CREATE TABLE categorie (
    id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY
    ,name varchar(50) NOT NULL
)
;

CREATE TABLE article (
      id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY
      ,name varchar(50) NOT NULL
      ,text varchar(500) NOT NULL
      ,typeOfArticle varchar(50) NOT NULL
      ,idUser bigint(20) NOT NULL
      ,idCategorie bigint(20) NOT NULL
)
;

-- -------------
-- CONTRAINTES
-- -------------

ALTER TABLE user
   ADD CONSTRAINT `u_user_email` UNIQUE(email)
  ,ADD CONSTRAINT `fk_user_role` FOREIGN KEY(idRole) REFERENCES role(id)
;

ALTER TABLE role
   ADD CONSTRAINT `u_role_code` UNIQUE(code)
   ,ADD CONSTRAINT `u_role_label` UNIQUE(label)
;

ALTER TABLE article
ADD CONSTRAINT `fk_article_user` FOREIGN KEY(IdUser) REFERENCES user(id)
,ADD CONSTRAINT `fk_article_categorie` FOREIGN KEY(idCategorie) REFERENCES categorie(id)
;

ALTER TABLE comment
ADD CONSTRAINT `fk_comment_user` FOREIGN KEY(IdUser) REFERENCES user(id)
,ADD CONSTRAINT `fk_comment_article` FOREIGN KEY(idArticle) REFERENCES article(id)  
;


