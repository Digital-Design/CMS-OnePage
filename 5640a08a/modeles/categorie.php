<?php

//fonction pour récupérer les catégories
function getCategories() {
  $bdd = connectDB();
  $sql = 'SELECT * FROM categories ORDER BY ordre';
  $res = $bdd->prepare($sql);
  $res->execute();
  return $res->fetchAll(PDO::FETCH_ASSOC);
}

?>