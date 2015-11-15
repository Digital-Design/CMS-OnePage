<?php

include_once('modeles/index.php');
include_once('modeles/parametre.php');

if(!empty($_POST)) {

}

$titre = 'Paramètres';
$sous_titre = ' ';

// On affiche la page (vue)
include_once('vues/template_start.php');
include_once('vues/parametre.php');
include_once('vues/template_end.php');