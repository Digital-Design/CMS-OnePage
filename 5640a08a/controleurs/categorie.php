<?php

include_once('modeles/index.php');
include_once('modeles/categorie.php');

if(!empty($_POST)) {

	$bdd = connectDB();

	if($_POST['action'] == 'add') $sql = 'INSERT INTO';
	else if($_POST['action'] == 'edit') $sql = 'UPDATE';
	$sql .= ' categories SET ';

	$sql .= 'color = :color,
	ordre = :ordre,
	code = :code';

	if($_POST['action'] == 'edit') $sql .= ' WHERE id_categorie = :id_categorie';

	$stmt = $bdd->prepare($sql);

	$stmt->bindParam(':color', $_POST['color'], PDO::PARAM_STR);
	$stmt->bindParam(':ordre', $_POST['ordre'], PDO::PARAM_INT);
	$stmt->bindParam(':code', $_POST['code'], PDO::PARAM_STR);
	$stmt->bindParam(':id_categorie', $_POST['id_categorie'], PDO::PARAM_INT);

	if($stmt->execute() or die(var_dump($stmt->ErrorInfo()))) {
		$success = TRUE;
	}
	header("LOCATION: index.php?page=categorie");
}
else{

	$navadmin = getNavAdmin(1);
	$categories = getCategories();


	// On affiche la page (vue)
	include_once('vues/categorie.php');
}