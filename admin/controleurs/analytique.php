<?php

include_once('modeles/index.php');
include_once('modeles/analytique.php');

if(!empty($_POST)) {

}

$titre = 'Analytique';
$sous_titre = 'XX personnes ont visité votre site';

// On affiche la page (vue)
include_once('vues/template_start.php');
include_once('vues/analytique.php');
include_once('vues/template_end.php');