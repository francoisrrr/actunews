<?php
    // Inclusion du header.php sur la page
    require_once(__DIR__.'/partials/header.php');

    /*
    OBJECTIFS: Mettre en place le formulaire permettant l'ajout
    d'un article dans la base de données.

    CONSIGNE:
        1. Mettre en place le formulaire HTML
        2. Valider le formulaire à l'aide de PHP
        3. Insérer l'article en BDD sans tenir compte de l'image
        4. BONUS : Gérer l'upload de l'image
        5. BONUS : Après l'insertion rediriger l'utilisateur sur
        l'article nouvellement créé
    */

    // http://127.0.0.1/php/07-ACTUNEWS/creer-article.php
?>

<?php
// L'utilisateur doit être en ligne sinon il est redirigé sur la page de connexion
if (!$auteur) {
    redirection('connexion.php?creerarticle=failed');
}

// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
/*
    On initialise nos variables à null;
    -----------------------------------
    Au départ, mes variables sont null, car l'utilisateur n'a pas encore soumis son formulaire.
*/
$id_categorie = $titre = $contenu =  null;


if (!empty($_POST)) { // Si $_POST n'est pas vide ou encore, Si le formulaire est soumis.

    // -- Récupération des données du POST  
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $id_categorie = $_POST['id_categorie']??null;
    $id_auteur = $auteur['id_auteur'];

    // Traitement de l'upload
    $image = $_FILES['image'];
    
        // Récupération des données du fichier à uploader
        $fileTmp = $image['tmp_name'];  // Emplacement temporaire de l'image sur le serveur
        // Récupération de l'extension de fichier
        $extension = pathinfo($image['name'])['extension'];
        // Nouveau nom pour le fichier dans la BDD
        $fileName = slugify($titre).'.'.$extension;
        // Destination du fichier dans la BDD
        $destination = __DIR__.'/assets/img/article/'.$fileName;

        // Le fichier est déplacé du dossier temporaire vers le dossier projet
        move_uploaded_file($fileTmp, $destination);

        // Le nom du fichier est envoyé en BDD
        $image=$filename;

    // Début des vérifications.
    $errors = [];
    
    // 1. Vérification de la $id_categorie (selectionné)
    if (empty($id_categorie)) {
        $errors['id_categorie']="Veuillez sélectionner une catégorie";
    }
    // 2. Vérification du $titre (non-vide)
    if (empty($titre)) {
            $errors['titre'] = "Veuillez saisir un titre.";
    }
    // 3. Vérification du $contenu (10 caractères min)
    if (strlen($contenu)<10) {
        $errors['contenu']="Le texte de l'article doit faire 10 caratères min.";
    }

// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX

    if(empty($errors)) {
        $id_Article=addArticle($titre,$contenu,$id_categorie,$id_auteur,$image);
        if ($id_Article) {
            redirection('article.php?id_article='.$id_Article);
        }
    }
}

?>


<!-- Ici viendra le contenu de ma page -->
<div class="p-3 mx-auto text-center">
    <h1 class="display-4">Créer Article</h1>
</div>

<div class="py-5 bg-light">

<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <form method="POST" class="form-horizontal" novalidate method="post"
            enctype="multipart/form-data">  <!-- enctype est nécessaire pour transmettre des fichiers à partir du formulaire -->

            <div class="form-group"> <!-- $id_categorie -->
                <label for="">Catégorie</label>
                <select class="<?= (isset($errors['id_categorie'])?'is-invalid':'')?>
                form-control" id="id_categorie" name="id_categorie">
                    <option value="">-- Sélectionnez --</option>
                    <?php 
                    foreach ($categories as $item) {?>
                        <option value="<?=$item['id_categorie']?>"
                            <?= ($item['id_categorie']==$id_categorie)?"selected":''?>>
                                <?= $item['id_categorie']." ".$item['nom']?>
                        </option>
                    <?php }?>
                </select>
                <div class="invalid-feedback">
                    <?= isset($errors['id_categorie'])?$errors['id_categorie']:'' ?>
                </div>
            </div>

            <div class="<?= (isset($errors['titre'])?'is-invalid':'')?>
            form-group"> <!-- $titre -->
                <label for="titre">Titre</label>
                <input type="text" class="form-control my-1 <?= isset($errors['titre']) ? 'is-invalid' : '' ?>"
                placeholder="titre" name="titre" id="titre" value="<?= $titre ?? '' ?>">
                <div class="invalid-feedback">
                    <?= isset($errors['titre']) ? $errors['titre'] : '' ?>
                </div>
            </div>

            <div class="form-group"> <!-- $contenu --> 
                <label for="contenu">Contenu</label>
                <textarea class="<?= (isset($errors['contenu'])?'is-invalid':'')?>
                form-control" name="contenu" id="contenu" rows="3" ><?= $contenu ?></textarea>
                <div class="invalid-feedback">
                    <?= isset($errors['contenu'])?$errors['contenu']:'' ?>
                </div>
            </div>

            <div class="form-group"> <!-- $image --> 
                <input type="file" class="<?= isset($errors['image']) ? 'is-invalid' : '' ?>"
                placeholder="image" name="image" id="image" value="<?= $image ?? '' ?>">
                <div class="invalid-feedback">
                    <?= isset($errors['image']) ? $errors['image'] : '' ?>
                </div>
            </div>

            <button class="btn btn-block btn-dark bg-success">Publier mon Article</button>
            </form>
        </div>
    </div>
</div>

</div>

<?php
// Inclusion du footer.php sur la page
require_once(__DIR__.'/partials/footer.php');
?>