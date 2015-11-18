<?php

include_once('modeles/index.php');
include_once('modeles/analytique.php');

if(!empty($_POST)) {
  for ($i=0; $i <= $_POST['nb_analytique']; $i++) {

    if($_POST['action_'.$i] == 'delete') $SUCCESS = deleteAnalytique($_POST['id_analytique_'.$i]);
  }
}

$titre = 'Analytique';
$analytiques = getAnalytiques();
$sous_titre = count($analytiques).' personne(s) ont visité votre site';

// On affiche la page (vue)
include_once('vues/template_start.php');
include_once('vues/analytique.php');
include_once('vues/template_end.php');