<?php

include_once('modeles/index.php');
include_once('modeles/home.php');

if(!empty($_POST)) {


}

// On affiche la page (vue)
if(isset($error)){
  if($error == 404){
    $titre = 'Erreur 404';
    $sous_titre = '';
    include_once('vues/template_start.php');
    include_once('vues/404.php');
  }
}else{
  $titre = 'Home';
  $sous_titre = '';
  include_once('vues/template_start.php');
  $analytiquegraphstats = getGraphAnalytique();
  include_once('vues/home.php');
}

include_once('vues/template_end.php');