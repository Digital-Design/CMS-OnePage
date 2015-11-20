<?php

include_once('modeles/index.php');
include_once('modeles/parametre.php');

if(!empty($_POST)) {

  foreach ($_POST['parametres'] as $key => $parametre) {
    $SUCCESS = editParametre($key+1, $parametre['valeur']);
  }
}

$titre = 'Paramètres';
$sous_titre = '';
$parametres = getParametres();

// On affiche la page (vue)
include_once('vues/template_start.php');
include_once('vues/parametre.php');
include_once('vues/template_end.php');