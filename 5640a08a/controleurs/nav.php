<?php

include_once('modeles/index.php');
include_once('modeles/nav.php');

if(!empty($_POST)) {

	$bdd = connectDB();

	if($_POST['action'] == 'add') $sql = 'INSERT INTO';
	else if($_POST['action'] == 'edit') $sql = 'UPDATE';
	$sql .= ' nav SET ';

	$sql .= 'titre = :titre,
	lien = :lien,
	ordre = :ordre';

	if($_POST['action'] == 'edit') $sql .= ' WHERE id_nav = :id_nav';

	for ($i=0; $i < count(getNav()); $i++) {

		$stmt = $bdd->prepare($sql);

		$stmt->bindParam(':titre', $_POST['titre_'.$i], PDO::PARAM_STR);
		$stmt->bindParam(':lien', $_POST['lien_'.$i], PDO::PARAM_STR);
		$stmt->bindParam(':ordre', $_POST['ordre_'.$i], PDO::PARAM_INT);
		$stmt->bindParam(':id_nav', $_POST['id_nav_'.$i], PDO::PARAM_INT);
		
		if($stmt->execute() or die(var_dump($stmt->ErrorInfo()))) {
			$success = TRUE;
		}
	}
	header("LOCATION: index.php?page=nav");

}else{

	$navadmin = getNavAdmin(3);
	$nav = getNav();


	// On affiche la page (vue)
	include_once('vues/nav.php');
}