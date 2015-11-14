<?php session_start();

include_once('../inc/config.inc.php');

//gestion des routes
if(!isset($_SESSION['log'])){
  require ('controleurs/login.php');
}
else if(!strcmp($_GET['page'], 'categorie')) {
  require ('controleurs/categorie.php');
} 
else if(!strcmp($_GET['page'], 'carousel')) {
  require ('controleurs/carousel.php');
} 
else if(!strcmp($_GET['page'], 'login')) {
  require ('controleurs/login.php');
} 
else if(!strcmp($_GET['page'], 'module')) {
  require ('controleurs/module.php');
} 
else if(!strcmp($_GET['page'], 'nav')) {
  require ('controleurs/nav.php');
} 
else if(!strcmp($_GET['page'], 'parametre')) {
  require ('controleurs/parametre.php');
} 
else if(!strcmp($_GET['page'], 'carousel')) {
  require ('controleurs/carousel.php');
} 
else {
  require ('controleurs/login.php');
}
