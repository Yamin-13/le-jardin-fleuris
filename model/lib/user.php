<?php


/**
 * user.
 * 
 * @param string E-mail e-mail.
 * @param string password
 * @param PDO db Connexion à la BDD.
 * @return boolean Succès ou échec. 
 * 
 */
function getUser(string $email, string $password, PDO $db)
{
    // - Prépare la requête
    $query = 'SELECT user.name, user.id, user.email, user.password, user.idRole, avatar_filename';
    $query .= ' FROM user';
    $query .= ' WHERE user.email = :email ';
    $statement = $db->prepare($query);
    $statement->bindParam(':email', $email);

    // - Exécute la requête
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    // test=======================================================
    // var_dump($user);
    // var_dump($password);
    // var_dump($user['password']);
    // var_dump(password_verify($password, $user['password']));
    // exit();

    // var_dump($user);
    // var_dump($password);
    // var_dump($user['password']);
    // var_dump(password_verify($password, $user['password']));
    // exit();
    // ============================================================

    // conditions pour verifier le password hashé correspond. "password_verify" retourne true ou false si le mot de passe fourni correspond au haché stocké
    if ($user && password_verify($password, $user['password'])) {  // $password c'st le mot de passe en clair fournis, $user['password'] c'est le mot de passe haché de la BDD

        // Si les deux conditions sont vraies (l'utilisateur existe et le mot de passe est correct)...
        // ... alors la fonction retourne les données de l'utilisateur 
        return $user;
    } else {
        // Ca retourne null si les conditios sont false
        return null;
    }
}

// Fonction pour ajouter un utilisateur à la bases de données
function addUser($name, $email, $password, $idRole, $db, $fileName)
{
    $query = 'INSERT INTO user (name, email, password, idRole, avatar_filename) VALUES ( :name, :email, :password, :idRole, :avatar_filename)'; // requete SQL avec les parametres pour insérer un nouvel utilisateur dans la table...
    $statement = $db->prepare($query);   // prepare la requete SQL ele retourne un objet PDOstatement                               // ...user avec les 3 collones 

    $statement->bindParam(':name', $name); 
    $statement->bindParam(':idRole', $idRole);       //  <----------------------------- // ca lie la valeeur de $idRole au parametre ":idRole" dans la requête SQL ($idRole = :idRole ) 
    $statement->bindParam(':email', $email);        // methode PDOStatement::bindParam // (sécurisé)
    $statement->bindParam(':password', $password); //                                 //
    $statement->bindParam(':avatar_filename', basename($fileName), PDO::PARAM_STR);
    
    return $statement->execute();  // PDOStatement::execute (ca execute les requetes et retourne true ou false pour l'insert to) 

}

function updateUserProfile($name, $idUser, $email, $avatarFilename, $dbConnection) {
    $query = 'UPDATE user SET name = :name, email = :email, avatar_filename = :avatar_filename WHERE id = :id';
    $statement = $dbConnection->prepare($query);
    $statement->bindParam(':name', $name);
    $statement->bindParam(':email', $email);
    $statement->bindParam(':avatar_filename', $avatarFilename);
    $statement->bindParam(':id', $idUser);
    $statement->execute();
}

function getAllUsers($dbConnection) {
    $query = 'SELECT id, name, email, idRole FROM user';
    $statement = $dbConnection->prepare($query);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}
