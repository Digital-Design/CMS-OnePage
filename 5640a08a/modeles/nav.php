<?php

//fonction pour récupérer les liens de la nav
function getNav() {
  $bdd = connectDB();
  $sql = 'SELECT * FROM nav ORDER BY ordre';
  $res = $bdd->prepare($sql);
  $res->execute();
  return $res->fetchAll(PDO::FETCH_ASSOC);
}

?>