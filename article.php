<?php
    // Inclusion du header.php sur la page
    require_once(__DIR__.'/partials/header.php');
    // Récupération de l'article dans l'URL
    $id_article=(isset($_GET['id_article']))?$_GET['id_article']:0;
    $article=getArticlebyId($id_article);
    /* Ou plus simplement :
        $article=getArticlebyId($_GET['id_article']??0);
    */
    // http://127.0.0.1/php/07-ACTUNEWS/article.php?id_article=33
?>

<!-- Ici viendra le contenu de ma page -->
<div class="p-3 mx-auto text-center">
    <h1 class="display-4"><?=$article['titre']??'!404 Rastafari!'?></h1>
</div>

<div class="py-5 bg-light">
<div class="container">
    <div class="row">
        <div class="col-md-6 py-2">
            <img src="./assets/img/article/<?=$article['image'];?>"
                class="img-fluid" alt="<?=$article['titre'];?>">    
        </div>
        <div class="col-md-6">
            <p><?=$article['contenu']?></p>
        </div>
    </div>
</div>
</div>

<?php
// Inclusion du footer.php sur la page
require_once(__DIR__.'/partials/footer.php');
?>