<?php

function addComment($articleId, $userId, $content, $dbConnection)
{
    $query = 'INSERT INTO comment (idArticle, idUser, textOfComment, date) 
              VALUES (:article_id, :user_id, :content, 
            --   NOW() permet de retourner la date et l’heure du système
              NOW())';  
    $statement = $dbConnection->prepare($query);
    $statement->bindParam(':article_id', $articleId);
    $statement->bindParam(':user_id', $userId);
    $statement->bindParam(':content', $content);
    $statement->execute();
}

function getCommentsByArticleId($articleId, $dbConnection)
{
    $query = 'SELECT c.id, c.textOfComment, c.date, u.name, c.idUser
              FROM comment c
              JOIN user u ON c.idUser = u.id
              WHERE c.idArticle = :article_id
              ORDER BY c.date DESC';
    $statement = $dbConnection->prepare($query);
    $statement->bindParam(':article_id', $articleId);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function getCommentById($commentId, $dbConnection)
{
    $query = 'SELECT * 
              FROM comment 
              WHERE id = :id';
    $statement = $dbConnection->prepare($query);
    $statement->bindParam(':id', $commentId);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
}

function deleteComment($commentId, $dbConnection)
{
    $query = 'DELETE FROM comment 
              WHERE id = :id';
    $statement = $dbConnection->prepare($query);
    $statement->bindParam(':id', $commentId);
    $statement->execute();
}

function updateComment($commentId, $content, $dbConnection)
{
    $query ='UPDATE comment 
            SET textOfComment = :content, 
            date = NOW() 
            WHERE id = :id';
    $statement = $dbConnection->prepare($query);
    $statement->bindParam(':id', $commentId);
    $statement->bindParam(':content', $content);
    $statement->execute();
}
