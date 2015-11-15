<?php

include_once('modeles/index.php');
include_once('modeles/categorie.php');

if(!empty($_POST)) {

	if($_POST['action'] == 'edit') $SUCCESS = editCategorie($_POST['id_categorie'], $_POST['color'], $_POST['code'], $_POST['ordre']);
	elseif($_POST['action'] == 'add') $SUCCESS = addCategorie($_POST['color'], $_POST['code'], $_POST['ordre']);
	elseif($_POST['action'] == 'delete') $SUCCESS = deleteCategorie($_POST['id_categorie']);
}

$titre = 'Catégories';
$categories = getCategories();
$sous_titre = 'Il y a '.count($categories).' catégories';

// On affiche la page (vue)
include_once('vues/template_start.php');
include_once('vues/categorie.php');
include_once('vues/template_end.php');
