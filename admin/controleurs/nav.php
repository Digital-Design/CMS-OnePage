<?php

include_once('modeles/index.php');
include_once('modeles/nav.php');

if(!empty($_POST)) {

	for ($i=0; $i <= $_POST['nb_lien']; $i++) {

		if($_POST['action_'.$i] == 'edit') $SUCCESS = editNav($_POST['id_nav_'.$i], $_POST['titre_'.$i], $_POST['lien_'.$i], $_POST['ordre_'.$i]);
		elseif($_POST['action_'.$i] == 'add') $SUCCESS = addNav($_POST['titre_'.$i], $_POST['lien_'.$i], $_POST['ordre_'.$i]);
		elseif($_POST['action_'.$i] == 'delete') $SUCCESS = deleteNav($_POST['id_nav_'.$i]);
	}
}

$titre = 'Barre de navigation';
$nav = getNav();
$sous_titre = 'Il y a '.count($nav).' liens dans la barre de navigation';

// On affiche la page (vue)
include_once('vues/template_start.php');
include_once('vues/nav.php');
include_once('vues/template_end.php');
