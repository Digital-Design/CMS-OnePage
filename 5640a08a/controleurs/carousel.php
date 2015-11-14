<?php

include_once('modeles/index.php');
include_once('modeles/carousel.php');


if(!empty($_POST)) {

	$bdd = connectDB();

	if($_POST['action'] == 'add') $sql = 'INSERT INTO';
	else if($_POST['action'] == 'edit') $sql = 'UPDATE';
	$sql .= ' carousel SET ';

	$sql .= 'titre = :titre,
	description = :description,
	ordre = :ordre,
	alt = :alt';

	if($_POST['action'] == 'edit') $sql .= ' WHERE id_carousel = :id_carousel';

	for ($i=0; $i < count(getCarousel()); $i++) {

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
	header("LOCATION: index.php?page=carousel");
}
else{

	$navadmin = getNavAdmin(2);
	$carousel = getCarousel();


	// On affiche la page (vue)
	include_once('vues/carousel.php');
}