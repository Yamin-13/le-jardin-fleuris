-- Mentionne le nom de la base de données à utiliser pour exécuter les commandes SQL qui suivent.
USE `520-blog-ecf-YAO`;

INSERT INTO role (id, code, label ) VALUES
     (10, 'ADM', 'Admin')
     ,(20, 'C', 'contributor')
    ,(30, 'SA', 'sampleUser')
;

INSERT INTO user (id, idRole, password, email) VALUES
     (40, 10, 'yamin@live.fr', 'moi')
    ,(60, 20, 'bob@live.fr', 'mdp')
    ,(80, 30, 'tom@live.fr', 'psw')
; 

INSERT INTO categorie (id, name) VALUES
    (90, 'Fleurs')
    ,(100, 'plante dinterieur')
    ,(110, 'Le Jardin')
;

INSERT INTO article (id, name, textOfArticle, date, idUser, idCategorie) VALUES
    (50, 'Fleurs de Lys', 'Découvrez la fleur de Lys', '2024-06-20 16:00:00', 60, 90)
;

INSERT INTO comment (id, textOfComment, date, idUser, idArticle) VALUES
    (40, 'très bon article !', '2024-06-20 16:00:00', 60, 50)
;

SELECT user.email, role.code
FROM user
JOIN role ON user.idRole = role.id
;