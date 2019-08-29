<?php
    // Inclusion du header.php sur la page
    require_once(__DIR__.'/partials/header.php');
?>

<?php
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
/*
    On initialise nos variables à null;
    -----------------------------------
    Au départ, mes variables sont null, car l'utilisateur n'a pas encore soumis son formulaire.
*/
$email = $password = null;

$content=null;

if (!empty($_POST)) { // Si $_POST n'est pas vide ou encore, Si le formulaire est soumis.

    // -- Récupération des données du POST
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // -- Je déclare un tableau d'erreurs vide.
    $errors = [];
    
    // 1a. Vérification du Mail
    if (empty($email)) {
        $errors['email'] = "Veuillez saisir votre email.";
    }

    // 1b. Vérification du Format du Mail
    if(!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) { // Si mon $email n'est pas vide et que dans le même temps le format de mon email n'est pas correct. Je rentre dans ma condition.
        $errors['email'] = "Vérifiez le format de votre email.";
    }

    // 3. Vérification du Password
    if (empty($password)) {
        $errors['password'] = "Veuillez saisir votre Password.";
    }


// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX

    if(empty($errors)) {
        // Début du processus de connexion s'il n'y a pas d'erreur de saisie
        if (connexion($email, $password)) {
            // L'utilisateur est bien connecté
            // La fonction connexion() a retourné TRUE
            redirection('index.php');

        } else {
            // Problème avec l'authentification
            // La fonction connexion() a retourné FALSE
            $errors['email']='email / mot de passe incorrect(s)';
        }
    }
}
?>


<?php
// Inclusion du header.php sur la page
require_once(__DIR__.'/partials/header.php');
?>

<!-- Ici viendra le contenu de ma page -->
<div class="p-3 mx-auto text-center">
    <h1 class="display-4">Connexion</h1>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
        <?php if (isset($_GET['inscription'])) {?>
            <div class='alert alert-success'>
                Félicitations! Vous pouvez maintenant vous connecter. 
            </div>
        <?php }?>
        <?php if (isset($_GET['creerarticle'])) {?>
            <div class='alert alert-warning'>
                Vous devez être connecté pour créer un article. 
            </div>
        <?php }?>
            <form method="POST" class="form-horizontal" novalidate method="post">
            <div class="form-group">    
                    <input type="email" class="form-control my-1 <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
                    placeholder="email" name="email" value="<?= $email ?? $_GET['email'] ?? '' ?>">
                    <div class="invalid-feedback">
                        <?= isset($errors['email']) ? $errors['email'] : '' ?>
                    </div>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control my-1 <?= isset($errors['password']) ? 'is-invalid' : '' ?>"
                    placeholder="password" name="password">
                    <div class="invalid-feedback">
                        <?= isset($errors['password']) ? $errors['password'] : '' ?>
                    </div>
                </div>

                <button class="btn btn-block btn-dark bg-success">Connexion</button>
            </form>
        </div>
    </div>
</div>

<?php
// Inclusion du footer.php sur la page
require_once(__DIR__.'/partials/footer.php');
?>