<?php

function getAnalytiques() {
  $bdd = connectDB();
  $sql = 'SELECT * FROM analytique ORDER BY date_creation DESC';
  $res = $bdd->prepare($sql);
  $res->execute();
  return $res->fetchAll(PDO::FETCH_ASSOC);
}

function getWeekAnalytiques() {
  $bdd = connectDB();
  $sql = 'SELECT * FROM analytique WHERE date_creation >= DATE_SUB(CURDATE(), INTERVAL DAYOFWEEK(CURDATE())-1 DAY) ORDER BY date_creation DESC';
  $res = $bdd->prepare($sql);
  $res->execute();
  return $res->fetchAll(PDO::FETCH_ASSOC);
}

function getGraphAnalytique(){
  $bdd = connectDB();
  $sql = "SELECT *, COUNT(id_analytique) AS value, DATE_FORMAT(date_creation,'%Y-%m-%d') AS date_now FROM analytique WHERE date_creation >= DATE_SUB(CURDATE(), INTERVAL DAYOFWEEK(CURDATE())-1 DAY) GROUP BY date_now";
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

//fonction qui permet de vérifier si l'ip est valide pour l'insere de donnée
function valideIp($ip) {

  //checker l'ip dans la liste d'ip 'blacklistées'
  if(!in_array($ip, unserialize(IP_BLACKLIST))) return false;

  $bdd = connectDB();
  $sql = 'SELECT *, NOW() AS date_now FROM analytique WHERE ip=:ip ORDER BY date_creation DESC LIMIT 1;';

  $stmt = $bdd->prepare($sql);
  $stmt->bindParam(':ip', $ip, PDO::PARAM_STR);

  if($stmt->execute() or die(var_dump($stmt->ErrorInfo()))) {
    //on regarde si l'ip existe pas deja
    if($stmt->rowCount()){
      //Si oui -> On regarde si la page a été chargé dans les 15 deernières minutes
      $LASTCHECK = TEMPS_ANALYTIQUE;
      //......
      //Si non -> Création d'une entrée
      if(1) return true;
      //Si oui -> On ne fait rien
    }
    //sinon on ajoute
    else{
      return true;
    }
  }
  return false;
}

//fonction qui permet d'ajouter en d'db l'ip, la page et le navigateur du client
function pageLoaded() {

  //Récupération ip
  $ip = $_SERVER['REMOTE_ADDR'];

  //si on accepte l'ip on l'ajoute
  if(valideIp($ip)){
    //Récupération navigateur
    $navigateur = get_browser(null, true);
    //Récupération page
    $page = preg_replace('~^(.*[\\\/])~','',$_SERVER['REQUEST_URI']);
    //si la page est vide c'est donc un index
    if($page == '') $page = 'index';

    //on ajoute en db
    addAnalytique($ip, $navigateur['parent'], $page);
  }
}