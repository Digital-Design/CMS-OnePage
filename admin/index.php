<?php session_start();

include_once('../inc/config.inc.php');

//gestion des routes
if(!isset($_SESSION['user'])){
  require ('controleurs/login.php');
}
elseif(isset($_GET['page'])){

  if(!strcmp($_GET['page'], 'categorie')) {
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
  else if(!strcmp($_GET['page'], 'home')) {
    require ('controleurs/home.php');
  }
  else if(!strcmp($_GET['page'], 'contact')) {
    require ('controleurs/contact.php');
  }
  else if(!strcmp($_GET['page'], 'analytique')) {
    require ('controleurs/analytique.php');
  }else {
    //404
    require ('controleurs/home.php');
  }
}else {
  require ('controleurs/home.php');
}
?>
