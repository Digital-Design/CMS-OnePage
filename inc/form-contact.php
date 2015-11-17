<?php
require('config.inc.php');
require('../'.ADMIN_FOLDER.'/modeles/index.php');

$bdd = connectDB();

$sql = 'INSERT INTO contact SET
nom = :nom,
mail = :mail,
commentaire = :commentaire';

$stmt = $bdd->prepare($sql);

$stmt->bindParam(':mail', $_POST['mail'], PDO::PARAM_STR);
$stmt->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
$stmt->bindParam(':commentaire', $_POST['commentaire'], PDO::PARAM_STR);

if($stmt->execute() or die(var_dump($stmt->ErrorInfo()))) {
  echo "success";
}else{
  echo "invalid";
}
