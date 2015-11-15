<?php

include_once('modeles/index.php');
include_once('modeles/module.php');

if(!empty($_POST)) {


}

$titre = 'Modules';
$modules = getModules();
$sous_titre = ' Il y a '.count($modules).' modules';

// On affiche la page (vue)
include_once('vues/template_start.php');
include_once('vues/module.php');
include_once('vues/template_end.php');