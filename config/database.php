<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=actunews','root','',[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // Active les erreurs SQL
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Les erreurs seront récupérées dans un tableau associatif
    ]);
} catch (Exception $e) {
    echo 'echec de connexion : '.$e->getMessage();
    exit;
}