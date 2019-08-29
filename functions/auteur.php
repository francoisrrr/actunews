<?php
/* 
    Pour inscrire un nouvel utilisateur en BDD
*/
function inscription() {
    global $db; // Récupération de la variable $db depuis l'espace global

    $query = $db->prepare('
        INSERT INTO auteur(prenom,nom,email,password)
            VALUES(:prenom,:nom,:email,:password)
        ');

        foreach ($_POST as $key => $value) {
            $query->bindValue(':'.$key,$value);
        }

    return $query->execute();
}

/* 
    Permet la connexion d'un utilisateur et le stockage
    de ses informations en session:
        - retourne TRUE si la connexion est un succés
        - retourne FALSE sinon
*/
function connexion($email, $password) {
    global $db;
    $sql = 'SELECT * FROM auteur WHERE email = :email';
    $query = $db->prepare($sql);
    $query->bindValue(':email',$email);
    $query->execute();

    // Récupération de l'auteur dans la base
    $auteur=$query->fetch();

    // Si un auteur a été trouvé et que le mot de passe saisi est valide
    if ($auteur && password_verify($password,$auteur['password'])) {
        // Mettre en session les informations de l'auteur
        $_SESSION['auteur'] = $auteur; // Le tableau associatif $auteur est stocké à la clé 'auteur' dans la session PHP
        return true;
    }
    
    return false;
}

// Cette fonction permet de déconnecter un utilisateur en session
function deconnexion(){
    unset($_SESSION['auteur']);
    return true;
}