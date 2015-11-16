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
function editCarousel($id_carousel, $titre, $description, $alt, $ordre, $file) {

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
    if(isset($file) && !empty($file) && $file['error'] == 0){
      if(addImageCarousel($file, $id_carousel))
        return true;
    }
    return true;
  }
  return false;
}

//fonction pour ajouter un lien de la barre de nav
function addCarousel($titre, $description, $alt, $ordre, $file) {
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
    if(addImageCarousel($file, $bdd->lastInsertId()))
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
    if(deleteImageCarousel($id_carousel))
      return true;
  }
  return false;
}

//fonction pour supprimer une image des dossiers
function deleteImageCarousel($id_carousel){
  unlink("../images/carousel/{$id_carousel}.*");
}

//fonction pour ajouter une image au carousel avec son extension
function addImageCarousel($file , $id_carousel){

  //on recupère l'extenssion du fichier
  $extension = strtolower(substr(strrchr($file['name'],'.'),1));
  $nom = "../images/carousel/{$id_carousel}.{$extension}";

  $bdd = connectDB();

  //on ajoute l'extension en db
  $sql = 'UPDATE carousel SET
  extension = :extension
  WHERE id_carousel = :id_carousel';

  $stmt = $bdd->prepare($sql);

  $stmt->bindParam(':extension', $extension, PDO::PARAM_STR);
  $stmt->bindParam(':id_carousel', $id_carousel, PDO::PARAM_INT);

  if($stmt->execute() or die(var_dump($stmt->ErrorInfo()))) {
    if (move_uploaded_file($file['tmp_name'], $nom)){
      //on attend que le fichier soit créé avant de continuer
      while(!file_exists($nom))
      return true;
    }
  }
  return false;
}


?>