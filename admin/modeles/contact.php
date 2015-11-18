<?php

//fonction pour récupérer les commentaires de la semaine
function getWeekContacts() {
  $bdd = connectDB();
  $sql = 'SELECT * FROM contact WHERE date_creation >= DATE_SUB(CURDATE(), INTERVAL DAYOFWEEK(CURDATE())-1 DAY) ORDER BY date_creation';
  $res = $bdd->prepare($sql);
  $res->execute();
  return $res->fetchAll(PDO::FETCH_ASSOC);
}

//fonction pour récupérer les commentaires
function getContacts() {
  $bdd = connectDB();
  $sql = 'SELECT * FROM contact ORDER BY date_creation';
  $res = $bdd->prepare($sql);
  $res->execute();
  return $res->fetchAll(PDO::FETCH_ASSOC);
}

//fonction pour supprimer un commentaire
function deleteContact($id_contact) {
  $bdd = connectDB();
  $sql = 'DELETE FROM contact WHERE id_contact = :id_contact';
  $stmt = $bdd->prepare($sql);
  $stmt->bindParam(':id_contact', $id_contact, PDO::PARAM_INT);

  if($stmt->execute() or die(var_dump($stmt->ErrorInfo()))) {
    return true;
  }
  return false;
}