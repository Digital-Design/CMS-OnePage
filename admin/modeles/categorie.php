<?php

//fonction pour récupérer les catégories
function getCategories() {
  $bdd = connectDB();
  $sql = 'SELECT * FROM categories ORDER BY ordre';
  $res = $bdd->prepare($sql);
  $res->execute();
  return $res->fetchAll(PDO::FETCH_ASSOC);
}

//fonction pour editer une catégorie
function editCategorie($id_categorie, $color, $code, $ordre, $type) {
	$bdd = connectDB();

	$sql = 'UPDATE categories SET
	color = :color,
	ordre = :ordre,
	code = :code,
	type = :type
	WHERE id_categorie = :id_categorie';

	$stmt = $bdd->prepare($sql);

	$stmt->bindParam(':color', $color, PDO::PARAM_STR);
	$stmt->bindParam(':ordre', $ordre, PDO::PARAM_INT);
	$stmt->bindParam(':code', $code, PDO::PARAM_STR);
	$stmt->bindParam(':id_categorie', $id_categorie, PDO::PARAM_INT);
	$stmt->bindParam(':type', $type, PDO::PARAM_INT);

	if($stmt->execute() or die(var_dump($stmt->ErrorInfo()))) {
		return true;
	}
	return false;
}

//fonction pour ajouter une catégorie
function addCategorie($color, $code, $ordre, $type) {
	$bdd = connectDB();

	$sql = 'INSERT INTO categories SET
	color = :color,
	ordre = :ordre,
	type = :type,
	code = :code';

	$stmt = $bdd->prepare($sql);

	$stmt->bindParam(':color', $color, PDO::PARAM_STR);
	$stmt->bindParam(':ordre', $ordre, PDO::PARAM_INT);
	$stmt->bindParam(':code', $code, PDO::PARAM_STR);
	$stmt->bindParam(':type', $type, PDO::PARAM_INT);

	if($stmt->execute() or die(var_dump($stmt->ErrorInfo()))) {
		//on creer un lien dans la nav pour la nouvelle catégorie
		if(addNav('Catégorie '.$bdd->lastInsertId(), '#'.$bdd->lastInsertId(), 999))
			return true;
	}
	return false;
}

//fonction pour supprimer une catégorie
function deleteCategorie($id_categorie) {
	$bdd = connectDB();

	$sql = 'DELETE FROM categories WHERE id_categorie = :id_categorie';
	$stmt = $bdd->prepare($sql);
	$stmt->bindParam(':id_categorie', $id_categorie, PDO::PARAM_INT);

	if($stmt->execute() or die(var_dump($stmt->ErrorInfo()))) {
		return true;
	}
	return false;
}

?>