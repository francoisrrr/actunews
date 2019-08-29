<?php
// Inclusion du header.php sur la page
require_once(__DIR__.'/functions/global.php');
require_once(__DIR__.'/partials/header.php');

?>

<?php
    // Récupération du nom de la catégorie dans l'URL
    $nom_categorie = (isset($_GET['nom_categorie']))?$_GET['nom_categorie']:'Accueil';
    // Récupération de l'id de la catégorie dans l'URL
    $id_categorie = (isset($_GET['id_categorie']))?$_GET['id_categorie']:'';
    // Récupération des articles de la $db
    $articles=(!empty($id_categorie)?getArticleByCategorieId($id_categorie):getArticles());

?>

<!-- Ici viendra le contenu de ma page -->
<div class="p-3 mx-auto text-center">
    <h1 class="display-4"><?php echo $nom_categorie;?></h1>
</div>

<div class="py-5 bg-light">
<div class="container">
    <div class="row">
        <?php if (empty($articles)) {?>
           <div class="col">
                <div class="alert alert-warning">Aucune publication pour le moment</div>
           </div>
        <?php }?>
        <?php foreach ($articles as $article) {?>
        <div class="col-md-4 my-1">
            <div class="card shadow-sm">
                <img src="./assets/img/article/<?=$article['image'];?>"
                    class="card-img-top" alt="<?=$article['titre'];?>">
                <div class="card-body">
                    <h5 class="card-title">
                        <?=$article['titre'];?>
                    </h5>
                    <p class="card-text"><?= summarize($article['contenu']);?></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="article.php?id_article=<?=$article['id_article']?>" class="btn btn-primary">Lire la suite</a>
                        <small class="text-muted mx-2">
                            <?= $article['prenom'].' '.$article['nom'];?>
                        </small>
                    </div> <!-- d-flex -->
                </div>  <!-- card -->
            </div>
        </div>
        <?php }?>
    </div>
</div>
</div>

<?php
// Inclusion du footer.php sur la page
require_once(__DIR__.'/partials/footer.php');
?>