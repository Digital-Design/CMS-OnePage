<?php

include_once('modeles/index.php');
include_once('modeles/carousel.php');


if(!empty($_POST)) {

	for ($i=0; $i <= $_POST['nb_carousel']; $i++) {

		if($_POST['action_'.$i] == 'edit') $SUCCESS = editCarousel($_POST['id_carousel_'.$i], $_POST['titre_'.$i], $_POST['description_'.$i], $_POST['alt_'.$i], $_POST['ordre_'.$i]);
		elseif($_POST['action_'.$i] == 'add') $SUCCESS = addCarousel($_POST['titre_'.$i], $_POST['description_'.$i], $_POST['alt_'.$i], $_POST['ordre_'.$i]);
		elseif($_POST['action_'.$i] == 'delete') $SUCCESS = deleteCarousel($_POST['id_carousel_'.$i]);
	}
}

$titre = 'Carousel';
$carousel = getCarousel();
$sous_titre = 'Il y a '.count($carousel).' images dans le carousel';

// On affiche la page (vue)
include_once('vues/template_start.php');
include_once('vues/carousel.php');
include_once('vues/template_end.php');
