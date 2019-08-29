<?php

// Démarrage de la session PHP
session_start();


// ----------------------------------------------
// Les fonctions utilisables sur toutes les pages
// ----------------------------------------------

// Permet de générer une accroche à partir d'un texte
function summarize($text){
    // Suppression des balises HTML
    $string = strip_tags($text);

    if (strlen($string)>150) {
        // La chaîne est coupée au 150ième caractère
        $stringcut=substr($string,0,150);
        // La chaîne est coupée au dernier espace précédent le 150ième caractère
        $string=substr($stringcut,0,strrpos($stringcut, ' '));
    }

    return $string." ...";
}

// Permet de rediriger un utilisateur sur une nouvelle page
function redirection($page) {
    header('location: '.$page);
}

// Permet de vérifier si un utilisateur a ouvert une session
function isOnline() {
    return isset($_SESSION['auteur']) ? $_SESSION['auteur'] : false;
}
 
// Permet de convertir une chaîne de texte en "slug"
function slugify($text)
{
  // replace non letter or digits by -
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, '-');

  // remove duplicate -
  $text = preg_replace('~-+~', '-', $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}