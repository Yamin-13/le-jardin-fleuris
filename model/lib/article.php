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
     $query = ' SELECT article.id, article.name, article.date, article.textOfArticle, article.image_filename, article.typeOfArticle, article.idUser, article.idCategorie';
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

function create(string $name, string $textOfArticle, string $TypeOfArticle, string $date, string $image_filename, string $idCategorie, string $IdUser, PDO $db): bool
{
    // Prépare la requête
    $query = 'INSERT INTO article (name, TypeOfArticle, textOfArticle, date, image_filename, idCategorie, IdUser ) VALUES (:name, :TypeOfArticle, :textOfArticle, :date, :image_filename, :idCategorie, :IdUser)';
    $statement = $db->prepare($query);
    $statement->bindParam(':name', $name);
    $statement->bindParam(':TypeOfArticle', $TypeOfArticle);
    $statement->bindParam(':textOfArticle', $textOfArticle);
    $statement->bindParam(':date', $date);
    $statement->bindParam(':image_filename', $image_filename);
    $statement->bindParam(':idCategorie', $idCategorie);
    $statement->bindParam(':IdUser', $IdUser);


    // Exécute la requête
    $successOrFailure = $statement->execute();

    return $successOrFailure;
}
