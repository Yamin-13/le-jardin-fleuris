<?php

/**
 * Liste les Articles.
 * 
 * @param PDO db Connexion à la BDD.
 * @return array Succès ou échec. 
 */

function getAll(PDO $db): array
{

    // Prépare la requête
    $query = ' SELECT article.id, article.name, article.date, article.textOfArticle, article.image_filename, article.idUser, article.idCategorie';
    $query .= ' FROM article';
    $statement = $db->prepare($query);

    // Exécute la requête
    $successOrFailure = $statement->execute();
    $listArticle = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $listArticle;
}


/**
 * Crée une Article
 * 
 * @param string name nom de l'Article.
 * @param string text texte de l'Article.
 * @param PDO db Connexion à la BDD.
 * @return boolean Succès ou échec. 
 */

function create(string $name, string $textOfArticle, string $date, string $image_filename, string $idCategorie, string $IdUser, PDO $db): bool
{
    // Prépare la requête
    $query = 'INSERT INTO article (name, textOfArticle, date, image_filename, idCategorie, IdUser ) VALUES (:name, :textOfArticle, :date, :image_filename, :idCategorie, :IdUser)';
    $statement = $db->prepare($query);
    $statement->bindParam(':name', $name);
    $statement->bindParam(':textOfArticle', $textOfArticle);
    $statement->bindParam(':date', $date);
    $statement->bindParam(':image_filename', $image_filename);
    $statement->bindParam(':idCategorie', $idCategorie);
    $statement->bindParam(':IdUser', $IdUser);


    // Exécute la requête
    $successOrFailure = $statement->execute();

    return $successOrFailure;
}


function getArticleById($id)
{
    global $dbConnection;
    $stmt = $dbConnection->prepare("SELECT article.id, article.name, article.idUser, article.textOfArticle, article.date, article.image_filename, categorie.name AS categorieName 

    -- jointure avec la table categorie pour récupérer le nom de la catégorie
    FROM article 
    JOIN categorie ON article.idCategorie = categorie.id 
    WHERE article.id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getArticlesByCategory($dbConnection) {
    $query = 'SELECT a.id, a.name as articleName, a.date, a.textOfArticle, a.image_filename, c.name as categoryName
              FROM article a
              JOIN categorie c ON a.idCategorie = c.id
              ORDER BY c.name, a.date DESC';
    $statement = $dbConnection->prepare($query);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}
