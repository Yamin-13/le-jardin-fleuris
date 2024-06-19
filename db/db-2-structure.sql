-- Mentionne le nom de la base de données à utiliser pour exécuter les commandes SQL qui suivent.
USE `520-blog-ecf-YAO`;

INSERT INTO role (id, code, label) VALUES
(10, 'A', 'admin')
,(20, 'C', 'contributor')
,(30, 'SU', 'simpleUser')
;

INSERT INTO user (id, idRole, name, email, password) VALUES
(40, 10, 'yamin', 'yamin@live.fr', 'moi')
,(60, 20, 'bob', 'bob@live.fr', 'mdp')
,(80, 30, 'tom', 'tom@live.fr', 'psw')
;

INSERT INTO categorie (id, name) VALUES
(90, 'Fleurs')
;

INSERT INTO article (id, name, TypeOfArticle, textOfArticle, date, idUser, idCategorie) VALUES
(50, 'Fleurs de Lys', 'Fleurs', 'Découvrez la fleur de Lys', '2024-06-20 16:00:00', 60, 90 )
;

INSERT INTO comment (id, textOfComment, date, idUser, idArticle) VALUES
(40, 'très bon article !', '2024-06-20 16:00:00', 60, 50)
;

