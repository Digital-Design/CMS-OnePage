<?php

//fonction pour se connecter à la base de donnée
function connectDB() {
  $bdd = new PDO('mysql:host='.SQL_HOST.';dbname='.SQL_DATABASE, SQL_USER, SQL_PASS);
  $bdd->exec('SET NAMES utf8');
  return $bdd;
}

// Fonction de suppression des accents de David Colin
function str2url($str){
  $str=html_entity_decode(utf8_decode($str));
  $str = strtr($str,
    utf8_decode('ÀÁÂÃÄÅàáâãäåÇçÒÓÔÕÖØòóôõöøÈÉÊËèéêëÌÍÎÏìíîïÙÚÛÜùúûüYÝÿýÑñ'),
    utf8_decode('AAAAAAaaaaaaCcOOOOOOooooooEEEEeeeeIIIIiiiiUUUUuuuuYYyyNn'));
  $str = str_replace('Æ','AE',$str);
  $str = str_replace('æ','ae',$str);
  $str = str_replace('¼','OE',$str);
  $str = str_replace('½','oe',$str);
  $str = preg_replace('/[^a-z0-9_\s\'\:\/\[\]-]/','',strtolower($str));
  $str = preg_replace('/[\s\'\:\/\[\]-]+/',' ',trim($str));
  $str = str_replace(' ','-',$str);
  return $str;
}

?>