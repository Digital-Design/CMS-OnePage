<?php

//fonction pour récupérer les paramètres
function getParametres() {
  $bdd = connectDB();
  $sql = 'SELECT * FROM parametres';
  $res = $bdd->prepare($sql);
  $res->execute();
  return $res->fetchAll(PDO::FETCH_ASSOC);
}

//fonction pour récupérer un paramètre en fonction de son id
function getParametre($id_parametre) {
  $bdd = connectDB();
  $sql = 'SELECT * FROM parametres WHERE id_parametre = :id_parametre';
  $res = $bdd->prepare($sql);
  $res->bindParam(':id_parametre', $id_parametre, PDO::PARAM_INT);
  $res->execute();
  return $res->fetch(PDO::FETCH_ASSOC);
}

//fonction pour éditer un paramètre en fonction de son id
function editParametre($id_parametre, $valeur) {
  $bdd = connectDB();

  $sql = 'UPDATE parametres SET
  valeur = :valeur
  WHERE id_parametre = :id_parametre';

  $stmt = $bdd->prepare($sql);
  $stmt->bindParam(':id_parametre', $id_parametre, PDO::PARAM_INT);
  $stmt->bindParam(':valeur', $valeur, PDO::PARAM_STR);

  if($stmt->execute() or die(var_dump($stmt->ErrorInfo()))) {
    return true;
  }
  return false;
}


