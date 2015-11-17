<?php

include_once('modeles/nav.php');
include_once('modeles/index.php');
include_once('modeles/categorie.php');
/*
if ($_FILES['file']['name']) {
  if (!$_FILES['file']['error']) {
    $name = md5(rand(100, 200));
    $ext = explode('.', $_FILES['file']['name']);
    $filename = $name . '.' . $ext[1];
    $destination = '../images/' . $filename; //change this directory
    $location = $_FILES["file"]["tmp_name"];
    move_uploaded_file($location, $destination);
    echo 'http://test.yourdomain.al/images/' . $filename;//change this URL
  }
  else{
      echo  $message = 'Ooops!  Your upload triggered the following error:  '.$_FILES['file']['error'];
    }
}*/

if(!empty($_POST)) {

	if($_POST['action'] == 'edit') $SUCCESS = editCategorie($_POST['id_categorie'], $_POST['color'], $_POST['code'], $_POST['ordre'], $_POST['type']);
	elseif($_POST['action'] == 'add') $SUCCESS = addCategorie($_POST['color'], $_POST['code'], $_POST['ordre'], $_POST['type']);
	elseif($_POST['action'] == 'delete') $SUCCESS = deleteCategorie($_POST['id_categorie']);
}

$titre = 'Catégories';
$categories = getCategories();
$sous_titre = 'Il y a '.count($categories).' catégories';

// On affiche la page (vue)
include_once('vues/template_start.php');
include_once('vues/categorie.php');
include_once('vues/template_end.php');
