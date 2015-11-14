<?php session_start();

include_once('../inc/config.inc.php');

//gestion des get
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
/*
//gestion des post
if(isset($_SESSION['log'])){

  $success = FALSE;

  if(!strcmp($_POST['type'], 'connexion')) {
    require ('controleurs/login.php');
    header("LOCATION: index.php?page=categorie");

  } 
  else if(!strcmp($_POST['type'], 'deconnexion')) {
    require ('controleurs/login.php');
    unset($_POST);
    header("LOCATION: ./../index.php");
  } 
  else {

  }
}


/*
//si il y a un post
if(!empty($_POST)) {

  $success = FALSE;

  if($_POST['type'] == 'connexion'){
    $_SESSION = $_POST;
    $_SESSION['log'] = true;
  }
  else if($_POST['type'] == 'deconnexion'){
    unset($_SESSION);
  }
  else if($_POST['type'] == 'categorie'){

    $bdd = connectDB();

    if($_POST['action'] == 'add') $sql = 'INSERT INTO';
    else if($_POST['action'] == 'edit') $sql = 'UPDATE';
    $sql .= ' categories SET ';

    $sql .= 'color = :color,
    ordre = :ordre,
    code = :code';

    if($_POST['action'] == 'edit') $sql .= ' WHERE id_categories = :id_categories';

    $stmt = $bdd->prepare($sql);

    $stmt->bindParam(':color', $_POST['color'], PDO::PARAM_STR);
    $stmt->bindParam(':ordre', $_POST['ordre'], PDO::PARAM_INT);
    $stmt->bindParam(':code', $_POST['code'], PDO::PARAM_STR);
    $stmt->bindParam(':id_categories', $_POST['id_categories'], PDO::PARAM_INT);

    if($stmt->execute() or die(var_dump($stmt->ErrorInfo()))) {
      $success = TRUE;
    }
  }
  else if($_POST['type'] == 'carousel'){
    $bdd = connectDB();

    if($_POST['action'] == 'add') $sql = 'INSERT INTO';
    else if($_POST['action'] == 'edit') $sql = 'UPDATE';
    $sql .= ' carousel SET ';

    $sql .= 'titre = :titre,
    description = :description,
    ordre = :ordre,
    alt = :alt';

    if($_POST['action'] == 'edit') $sql .= ' WHERE id_carousel = :id_carousel';

    for ($i=1; $i < count(getCarousel())+1; $i++) {

      $stmt = $bdd->prepare($sql);
      $stmt->bindParam(':titre', $_POST['titre_'.$i], PDO::PARAM_STR);
      $stmt->bindParam(':description', $_POST['description_'.$i], PDO::PARAM_STR);
      $stmt->bindParam(':ordre', $_POST['ordre_'.$i], PDO::PARAM_INT);
      $stmt->bindParam(':alt', $_POST['alt_'.$i], PDO::PARAM_STR);
      $stmt->bindParam(':id_carousel', $_POST['id_carousel_'.$i], PDO::PARAM_INT);

      if($stmt->execute() or die(var_dump($stmt->ErrorInfo()))) {
        $success = TRUE;
      }
    }
  }
  else if($_POST['type'] == 'nav'){

    $bdd = connectDB();

    if($_POST['action'] == 'add') $sql = 'INSERT INTO';
    else if($_POST['action'] == 'edit') $sql = 'UPDATE';
    $sql .= ' nav SET ';

    $sql .= 'titre = :titre,
    lien = :lien,
    ordre = :ordre';

    if($_POST['action'] == 'edit') $sql .= ' WHERE id_nav = :id_nav';

    for ($i=1; $i < count(getNav())+1; $i++) {

      $stmt = $bdd->prepare($sql);

      $stmt->bindParam(':titre', $_POST['titre_'.$i], PDO::PARAM_STR);
      $stmt->bindParam(':lien', $_POST['lien_'.$i], PDO::PARAM_STR);
      $stmt->bindParam(':ordre', $_POST['ordre_'.$i], PDO::PARAM_INT);
      $stmt->bindParam(':id_nav', $_POST['id_nav_'.$i], PDO::PARAM_INT);

      if($stmt->execute() or die(var_dump($stmt->ErrorInfo()))) {
        $success = TRUE;
      }
    }
  }
}
*/