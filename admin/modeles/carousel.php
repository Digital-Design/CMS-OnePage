<?php

//fonction pour récupérer les catégories
function getCarousel() {
  $bdd = connectDB();
  $sql = 'SELECT * FROM carousel ORDER BY ordre';
  $res = $bdd->prepare($sql);
  $res->execute();
  return $res->fetchAll(PDO::FETCH_ASSOC);
}

?>