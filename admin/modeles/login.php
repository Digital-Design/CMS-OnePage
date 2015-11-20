<?php

//fonction qui vérifie le password
function checkLogin($user, $password) {

  if (CRYPT_SHA512 != 1) {
    throw new Exception('Hashing mechanism not supported.');
  }

  $user = getLogin($user);

  return (crypt(SALT . $password . $user['hash'], $user['pwd']) == $user['pwd']) ? true : false;

}

//fonction qui permet de créer un user
function addLogin($user, $password, $mail) {

  if (CRYPT_SHA512 != 1) {
    throw new Exception('Hashing mechanism not supported.');
  }

  $bdd = connectDB();

  $sql = 'INSERT INTO users SET
  user = :user,
  pwd = :pwd,
  hash = :hash,
  mail = :mail';

  $stmt = $bdd->prepare($sql);

  $salt = substr(md5(uniqid(rand(), true)), 0, MAX_LENGTH_SALT);

  $stmt->bindParam(':user', $user, PDO::PARAM_STR);
  $stmt->bindParam(':pwd', crypt(SALT . $password . $salt , '$6$rounds=4567$abcdefghijklmnop$'), PDO::PARAM_STR);
  $stmt->bindParam(':hash', $salt , PDO::PARAM_STR);
  $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);

  if($stmt->execute() or die(var_dump($stmt->ErrorInfo())))
    return true;
  return false;
}

//fonction qui permet de recupérer un user en fonction de son pseudo
function getLogin($user) {
  $bdd = connectDB();
  $sql = 'SELECT * FROM users WHERE user = :user';

  $res = $bdd->prepare($sql);
  $res->bindParam(':user', $user, PDO::PARAM_STR);
  $res->execute();
  return $res->fetch(PDO::FETCH_ASSOC);
}