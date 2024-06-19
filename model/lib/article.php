<?php

/**
 * Crée une Article
 * 
 * @param string name nom de l'Article.
 * @param string text texte de l'Article.
 * @param PDO db Connexion à la BDD.
 * @return boolean Succès ou échec. 
 */

function create(string $name, string $textOfArticle, string $TypeOfArticle, string $date, string $image_filename, string $IdCategorie, string $IdUser, PDO $db): bool
{
    // Prépare la requête
    $query = 'INSERT INTO article (name, TypeOfArticle, textOfArticle, date, image_filename, IdCategorie, IdUser ) VALUES (:name, :TypeOfArticle, :textOfArticle, :date, :image_filename, :IdCategorie, :IdUser)';
    $statement = $db->prepare($query);
    $statement->bindParam(':name', $name);
    $statement->bindParam(':TypeOfArticle', $TypeOfArticle);
    $statement->bindParam(':textOfArticle', $textOfArticle);
    $statement->bindParam(':date', $date);
    $statement->bindParam(':image_filename', $image_filename);
    $statement->bindParam(':IdCategorie', $IdCategorie);
    $statement->bindParam(':IdUser', $IdUser);
    $statement->bindParam(':idCategorie', $idCategorie);


    // Exécute la requête
    $successOrFailure = $statement->execute();

    return $successOrFailure;
}
