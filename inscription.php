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
$prenom = $nom = $email = $password = $cpassword = null;
$message=null;

if (!empty($_POST)) { // Si $_POST n'est pas vide ou encore, Si le formulaire est soumis.

    // -- Récupération des données du POST
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    
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

    // 2. Vérification du Nom / Prenom
    if (empty($prenom)) {
        $errors['prenom'] = "Veuillez saisir votre Prenom.";
    }
    if (empty($nom)) {
        $errors['nom'] = "Veuillez saisir votre Nom.";
    }

    // 3. Vérification du Password
    if (empty($password)||empty($cpassword)) {
        $errors['password'] = "Veuillez saisir votre Password.";
    }
    if ($cpassword!=$password) {
        $errors['password'] = "Erreur sur la confirmation de Password";
    }

// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
// XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX

    if(empty($errors)) {
        // Suppression de 'cpassword' de $_POST 
        $_POST = \array_diff_key($_POST, [0 => "xy", "cpassword" => "xy"]);

        // Encodage du 'password' de $_POST
        $_POST['password']=password_hash($_POST['password'],PASSWORD_DEFAULT);
        
        if(inscription()){
            // Redirection sur la page de connexion
            redirection('connexion.php?inscription=success&email='.$email);

            // Reset du formulaire
            $prenom =  $nom = $email = $password = $cpassword = null;
        };
    } else {
        // Message echec
        $message=
            "<div class='alert alert-warning'>
                Failed!
            </div>";
    }
}
?>

<!-- Ici viendra le contenu de ma page -->
<div class="p-3 mx-auto text-center">
    <h1 class="display-4">Inscription</h1>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <form method="POST" class="form-horizontal" novalidate>
                <div class="form-group">
                    <input type="text" class="form-control my-1 <?= isset($errors['prenom']) ? 'is-invalid' : '' ?>"
                    placeholder="prenom" name="prenom" value="<?= $prenom ?>">
                    <div class="invalid-feedback">
                        <?= isset($errors['prenom']) ? $errors['prenom'] : '' ?>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control my-1 <?= isset($errors['nom']) ? 'is-invalid' : '' ?>"
                    placeholder="nom" name="nom" value="<?= $nom ?>">
                    <div class="invalid-feedback">
                        <?= isset($errors['nom']) ? $errors['nom'] : '' ?>
                    </div>
                </div>
                <div class="form-group">    
                    <input type="email" class="form-control my-1 <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
                    placeholder="email" name="email" value="<?= $email ?>">
                    <div class="invalid-feedback">
                        <?= isset($errors['email']) ? $errors['email'] : '' ?>
                    </div>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control my-1 <?= isset($errors['password']) ? 'is-invalid' : '' ?>"
                    placeholder="password" name="password">
                    <input type="password" class="form-control my-1 <?= isset($errors['password']) ? 'is-invalid' : '' ?>"
                    placeholder="Confirmez le password" name="cpassword">
                    <div class="invalid-feedback">
                        <?= isset($errors['password']) ? $errors['password'] : '' ?>
                    </div>
                </div>
                <button class="btn btn-block btn-dark bg-success">Inscription</button>
            </form>
        </div>
    </div>
</div>

<?php
// Inclusion du footer.php sur la page
require_once(__DIR__.'/partials/footer.php');
?>