<?php

function getAnalytiques() {
  $bdd = connectDB();
  $sql = 'SELECT * FROM analytique ORDER BY date_creation';
  $res = $bdd->prepare($sql);
  $res->execute();
  return $res->fetchAll(PDO::FETCH_ASSOC);
}

function getWeekAnalytiques() {
  $bdd = connectDB();
  $sql = 'SELECT * FROM analytique WHERE date_creation >= DATE_SUB(CURDATE(), INTERVAL DAYOFWEEK(CURDATE())-1 DAY) ORDER BY date_creation';
  $res = $bdd->prepare($sql);
  $res->execute();
  return $res->fetchAll(PDO::FETCH_ASSOC);
}

function addAnalytique($ip, $navigateur, $page) {
  $bdd = connectDB();

  $sql = 'INSERT INTO analytique SET
  ip = :ip,
  navigateur = :navigateur,
  page = :page';

  $stmt = $bdd->prepare($sql);

  $stmt->bindParam(':ip', $ip, PDO::PARAM_STR);
  $stmt->bindParam(':navigateur', $navigateur, PDO::PARAM_INT);
  $stmt->bindParam(':page', $page, PDO::PARAM_STR);

  if($stmt->execute() or die(var_dump($stmt->ErrorInfo()))) {
    return true;
  }
  return false;
}

//fonction pour supprimer un logde la db
function deleteAnalytique($id_analytique) {
  $bdd = connectDB();
  $sql = 'DELETE FROM analytique WHERE id_analytique = :id_analytique';
  $stmt = $bdd->prepare($sql);
  $stmt->bindParam(':id_analytique', $id_analytique, PDO::PARAM_INT);

  if($stmt->execute() or die(var_dump($stmt->ErrorInfo()))) {
    return true;
  }
  return false;
}

function valideIp($ip) {

  $LASTCHECK = TEMPS_ANALYTIQUE;

  $bdd = connectDB();
  $sql = 'SELECT * FROM analytique WHERE ip=:ip';

  $stmt = $bdd->prepare($sql);
  $stmt->bindParam(':ip', $ip, PDO::PARAM_STR);

  if($stmt->execute() or die(var_dump($stmt->ErrorInfo()))) {
    if($stmt->rowCount()){
      //Si oui -> On regarde si la page a été chargé dans les 15 deernières minutes
        //Si oui -> On ne fait rien
        //Si non -> Création d'une entrée
      if(1) return true;
    }else{
      return true;
    }
  }
  return false;
}

function pageLoaded() {

  //Récupération ip
  $ip = $_SERVER['REMOTE_ADDR'];
  //Récupération navigateur
//------> Erreur :  get_browser(): browscap ini directive not set in
  $navigateur = get_browser(null, true)['parent'];
  //Récupération page
  $page = preg_replace('~^(.*[\\\/])~','',$_SERVER['REQUEST_URI']);

  //si la page est vide c'est donc un index
  if($page == '') $page = 'index';

  //si on accepte l'ip on l'ajoute
  if(valideIp($ip))
    addAnalytique($ip, $navigateur, $page);

}