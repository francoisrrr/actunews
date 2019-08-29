<?php

// Retourne les catégories du site depuis la $db
function getCategories(){
    global $db; // Récupération de la variable $db depuis l'espace global
    $query = $db->query('SELECT * FROM categorie');
    return $query->fetchAll();  // Retourne les catégories de la BDD
}