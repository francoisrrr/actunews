<?php
    // Fonctions PHP
    require_once(__DIR__.'/../functions/global.php');
    require_once(__DIR__.'/../functions/article.php');
    require_once(__DIR__.'/../functions/auteur.php');
    require_once(__DIR__.'/../functions/categorie.php');
    
    // Connexion PDO à la BD
    require_once('./config/database.php');
    
    // Récupération des catégories de la base
    $categories=getCategories();

    // Récupération du tableau d'info de l'auteur s'il est en session
    $auteur=isOnline();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ActuNews</title>

    <!-- Styles personnalisés -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

<header>
    <nav class="nav nav-pills flex-sm-row flex-column p-3">       
            <a class="nav-item nav-link" href="index.php">
                Accueil
            </a>
            <?php foreach ($categories as $value) { // Ouverture boucle PHP ?>
            <a class="nav-item nav-link" href="index.php?nom_categorie=<?=$value['nom']?>&id_categorie=<?=$value['id_categorie']?>">
                <?= $value['nom'] // Echo PHP ?>
            </a>
            <?php } // Fermeture boucle PHP ?>       
        <?php if ($auteur) { ?>
            <span class='navbar-text px-3 ml-auto'>
                Bonjour <?= $_SESSION['auteur']['prenom'].' '.$_SESSION['auteur']['nom']?>
            </span>
            <a class="nav-item nav-link btn btn-outline-primary mx-1 my-1"
            href="creer-article.php">
                Créer un Article
            </a>
            <a class="nav-item nav-link btn btn-outline-danger mx-1 my-1"
            href="deconnexion.php">
                Déconnexion
            </a>
        <?php } else { ?>
            <div class="nav ml-auto">
                <a class="nav-item nav-link btn btn-outline-success mx-1 my-1"
                    href="connexion.php">
                    Connexion
                </a>
                <a class="nav-item nav-link btn btn-outline-success mx-1 my-1"
                    href="inscription.php">
                    Inscription
                </a>
            </div>
        <?php } ?>
    </nav>
</header>

