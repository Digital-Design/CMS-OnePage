<?php

//fonction pour récupérer les liens de la nav
function getNav() {
  $bdd = connectDB();
  $sql = 'SELECT * FROM nav ORDER BY ordre';
  $res = $bdd->prepare($sql);
  $res->execute();
  return $res->fetchAll(PDO::FETCH_ASSOC);
}

//fonction pour editer un lien de la barre de nav
function editNav($id_nav, $titre, $lien, $ordre) {
	$bdd = connectDB();

	$sql = 'UPDATE nav SET  
	titre = :titre,
	lien = :lien,
	ordre = :ordre
	WHERE id_nav = :id_nav';

	$stmt = $bdd->prepare($sql);

	$stmt->bindParam(':titre', $titre, PDO::PARAM_STR);
	$stmt->bindParam(':lien', $lien, PDO::PARAM_STR);
	$stmt->bindParam(':ordre', $ordre, PDO::PARAM_INT);
	$stmt->bindParam(':id_nav', $id_nav, PDO::PARAM_INT);

	if($stmt->execute() or die(var_dump($stmt->ErrorInfo()))) {
		return true;
	}
	return false;
}

//fonction pour ajouter un lien de la barre de nav
function addNav($color, $code, $ordre) {
	$bdd = connectDB();

	$sql = 'INSERT nav SET  
	titre = :titre,
	lien = :lien,
	ordre = :ordre';

	$stmt = $bdd->prepare($sql);

	$stmt->bindParam(':titre', $titre, PDO::PARAM_STR);
	$stmt->bindParam(':lien', $lien, PDO::PARAM_STR);
	$stmt->bindParam(':ordre', $ordre, PDO::PARAM_INT);

	if($stmt->execute() or die(var_dump($stmt->ErrorInfo()))) {
		return true;
	}
	return false;
}

//fonction pour supprimer un lien de la barre de nav
function deleteNav($id_nav) {
	$bdd = connectDB();

	$sql = 'DELETE FROM nav WHERE id_nav = :id_nav';
	$stmt = $bdd->prepare($sql);
	$stmt->bindParam(':id_nav', $id_nav, PDO::PARAM_INT);

	if($stmt->execute() or die(var_dump($stmt->ErrorInfo()))) {
		return true;
	}
	return false;
}
?>