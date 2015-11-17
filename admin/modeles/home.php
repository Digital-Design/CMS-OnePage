<?php
//fonction pour récupérer les catégories
function getContact() {
  $bdd = connectDB();
  $sql = 'SELECT * FROM contact WHERE date_creation >= DATE_SUB(CURDATE(), INTERVAL DAYOFWEEK(CURDATE())-1 DAY) ORDER BY date_creation';
  $res = $bdd->prepare($sql);
  $res->execute();
  return $res->fetchAll(PDO::FETCH_ASSOC);
}