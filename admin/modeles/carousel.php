<?php

//fonction pour récupérer les catégories
function getCarousel() {
  $bdd = connectDB();
  $sql = 'SELECT * FROM carousel ORDER BY ordre';
  $res = $bdd->prepare($sql);
  $res->execute();
  return $res->fetchAll(PDO::FETCH_ASSOC);
}

//fonction pour editer le carousel
function editCarousel($id_carousel, $titre, $description, $alt, $ordre) {
  $bdd = connectDB();

  $sql = 'UPDATE carousel SET
  titre = :titre,
  description = :description,
  alt = :alt,
  ordre = :ordre
  WHERE id_carousel = :id_carousel';

  $stmt = $bdd->prepare($sql);

  $stmt->bindParam(':titre', $titre, PDO::PARAM_STR);
  $stmt->bindParam(':description', $description, PDO::PARAM_STR);
  $stmt->bindParam(':alt', $alt, PDO::PARAM_STR);
  $stmt->bindParam(':ordre', $ordre, PDO::PARAM_INT);
  $stmt->bindParam(':id_carousel', $id_carousel, PDO::PARAM_INT);

  if($stmt->execute() or die(var_dump($stmt->ErrorInfo()))) {
    return true;
  }
  return false;
}

//fonction pour ajouter un lien de la barre de nav
function addCarousel($titre, $description, $alt, $ordre) {
  $bdd = connectDB();

  $sql = 'INSERT INTO carousel SET
  titre = :titre,
  description = :description,
  alt = :alt,
  ordre = :ordre';

  $stmt = $bdd->prepare($sql);

  $stmt->bindParam(':titre', $titre, PDO::PARAM_STR);
  $stmt->bindParam(':description', $description, PDO::PARAM_STR);
  $stmt->bindParam(':alt', $alt, PDO::PARAM_STR);
  $stmt->bindParam(':ordre', $ordre, PDO::PARAM_INT);

  if($stmt->execute() or die(var_dump($stmt->ErrorInfo()))) {
    return true;
  }
  return false;
}


//fonction pour supprimer un lien de la barre de nav
function deleteCarousel($id_carousel) {
  $bdd = connectDB();

  $sql = 'DELETE FROM carousel WHERE id_carousel = :id_carousel';
  $stmt = $bdd->prepare($sql);
  $stmt->bindParam(':id_carousel', $id_carousel, PDO::PARAM_INT);

  if($stmt->execute() or die(var_dump($stmt->ErrorInfo()))) {
    return true;
  }
  return false;
}
?>