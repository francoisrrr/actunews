<?php
    // Inclusion du header.php sur la page
    require_once(__DIR__.'/partials/header.php');
?>


<?php
    deconnexion();
    redirection('index.php');
?>