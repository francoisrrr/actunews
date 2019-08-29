<?php

/* 
    CONSIGNE : Créer 3 fonctions
    1. getArticles() : Permet de retourner tous les articles de la base
    2. getArticleById() : Permet de récupérer un article grâce à son Id
    3. getArticleByCategorieId() : Permet de récupérer les articles d'une catégorie grâce à l'Id de cette dernière
*/

function getArticles(){
    global $db; // Récupération de la variable $db depuis l'espace global

    $query = $db->query('SELECT * FROM article,auteur
        WHERE article.id_auteur = auteur.id_auteur ORDER BY id_article DESC');

    $query->execute();
    
    return $query->fetchAll();  // Retourne les articles de la BDD
}

function getArticleById($id_article){
    global $db; // Récupération de la variable $db depuis l'espace global

    $query = $db->prepare('SELECT*FROM article WHERE id_article= :id'); // :id est un paramètre MySQL

    $query->bindValue(':id',$id_article,PDO::PARAM_INT); // On s'assure que :id est bien un entier
    $query->execute();  // Execute la requête $query

    return $query->fetch();  // Retourne l'article depuis la BDD
}

function getArticleByCategorieId($id_categorie){
    global $db; // Récupération de la variable $db depuis l'espace global

    $query = $db->prepare('SELECT*FROM article,auteur WHERE article.id_auteur = auteur.id_auteur AND id_categorie= :id'); // :id est un paramètre MySQL

    $query->bindValue(':id',$id_categorie,PDO::PARAM_INT); // On s'assure que :id est bien un entier
    $query->execute();  // Execute la requête $query
    
    return $query->fetchAll();  // Retourne l'article(s) depuis la BDD
}


/* 
    Permet l'insertion d'un nouvel article dans la BDD
*/
function addArticle($titre,$contenu,$id_categorie,$id_auteur,$image) {
    global $db; // Récupération de la variable $db depuis l'espace global

    $query = $db->prepare('
        INSERT INTO article(titre, contenu, id_categorie, id_auteur,image)
            VALUES(:titre, :contenu, :id_categorie, :id_auteur, :image)
        ');

        $query->bindValue(':titre',$titre,PDO::PARAM_STR);
        $query->bindValue(':contenu',$contenu,PDO::PARAM_STR);
        $query->bindValue(':id_categorie',$id_categorie,PDO::PARAM_INT);
        $query->bindValue(':id_auteur',$id_auteur,PDO::PARAM_INT);
        $query->bindValue(':image',$image,PDO::PARAM_STR);

    return ($query->execute())?$db->lastInsertId():false;
}