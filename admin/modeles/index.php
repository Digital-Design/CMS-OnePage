<?php

//fonction pour se connecter à la base de donnée
function connectDB() {
  $bdd = new PDO('mysql:host='.SQL_HOST.';dbname='.SQL_DATABASE, SQL_USER, SQL_PASS);
  $bdd->exec('SET NAMES utf8');
  return $bdd;
}

// Fonction de suppression des accents de David Colin
function str2url($str){
  $str=html_entity_decode(utf8_decode($str));
  $str = strtr($str,
    utf8_decode('ÀÁÂÃÄÅàáâãäåÇçÒÓÔÕÖØòóôõöøÈÉÊËèéêëÌÍÎÏìíîïÙÚÛÜùúûüYÝÿýÑñ'),
    utf8_decode('AAAAAAaaaaaaCcOOOOOOooooooEEEEeeeeIIIIiiiiUUUUuuuuYYyyNn'));
  $str = str_replace('Æ','AE',$str);
  $str = str_replace('æ','ae',$str);
  $str = str_replace('¼','OE',$str);
  $str = str_replace('½','oe',$str);
  $str = preg_replace('/[^a-z0-9_\s\'\:\/\[\]-]/','',strtolower($str));
  $str = preg_replace('/[\s\'\:\/\[\]-]+/',' ',trim($str));
  $str = str_replace(' ','-',$str);
  return $str;
}

//fonction pour avoir la barre de nav admin
function getNavAdmin($IdLink){
  $toolbar = '
  <nav id="navigation" role="navigation">
    <h1>Hello, '.$_SESSION['user'].'!</h1>
    <form action="index.php?page=login" method="post">
      <input type="text" class="form-control" name="type" value="deconnexion">
      <button type="submit" name="type" value="deconnexion" class="btn btn-default">Déconnexion</button>
    </form>
    <br/>
    <div class="list-group">
      <a href="index.php?page=categorie" class="list-group-item ';
      if($IdLink==1)$toolbar .= 'active ';
      $toolbar .= '">Editer les catégories</a>
      <a href="index.php?page=carousel" class="list-group-item ';
      if($IdLink==2)$toolbar .= 'active ';
      $toolbar .= '">Editer le carousel</a>
      <a href="index.php?page=nav" class="list-group-item ';
      if($IdLink==3)$toolbar .= 'active ';
      $toolbar .= '">Editer la barre de navigation</a>
      <a href="index.php?page=module" class="list-group-item ';
      if($IdLink==4)$toolbar .= 'active ';
      $toolbar .= '">Gestion des modules</a>
      <a href="index.php?page=parametre" class="list-group-item ';
      if($IdLink==5)$toolbar .= 'active ';
      $toolbar .= '">Autres paramètres</a>
    </div>
  </nav>';
  return $toolbar;
}

?>