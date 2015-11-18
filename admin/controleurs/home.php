<?php

include_once('modeles/index.php');
include_once('modeles/home.php');

if(!empty($_POST)) {


}

$titre = 'Home';
$sous_titre = ' ';

// On affiche la page (vue)
include_once('vues/template_start.php');
$analytiquegraphstats = getGraphAnalytique();
include_once('vues/home.php');
include_once('vues/template_end.php');