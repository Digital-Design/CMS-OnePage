<?php

include_once('modeles/index.php');
include_once('modeles/login.php');

if(!empty($_POST)) {

$_SESSION['user'] = $_POST['user'];
			header("LOCATION: ./");
			
	if($_POST['type'] == 'connexion'){
			

		if(checkLogin($_POST['user'], $_POST['pwd'])){
			$_SESSION['user'] = $_POST['user'];
			header("LOCATION: ./");
		}
		$SUCCESS = false;

	}
	else if($_POST['type'] == 'deconnexion'){
		session_unset();
		header("LOCATION: ./");
	}
}

// On affiche la page (vue)
include_once('vues/login.php');