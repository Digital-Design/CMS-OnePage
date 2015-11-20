<?php

include_once('modeles/nav.php');
include_once('modeles/index.php');
include_once('modeles/login.php');

if(!empty($_POST)) {


}

$titre = ucfirst($_SESSION['user']);
$user = getLogin($_SESSION['user']);
$sous_titre = ' Editer votre profil';

// On affiche la page (vue)
include_once('vues/template_start.php');
include_once('vues/profil.php');
include_once('vues/template_end.php');