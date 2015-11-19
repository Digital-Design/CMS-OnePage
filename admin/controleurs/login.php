<?php

include_once('modeles/index.php');
include_once('modeles/login.php');

if(!empty($_POST)) {

	if($_POST['type'] == 'connexion'){
		$_SESSION = $_POST;
		header("LOCATION: index.php?page=home");

	}
	else if($_POST['type'] == 'deconnexion'){
		session_unset();
		header("LOCATION: index.php");
	}
}
else{
	// On affiche la page (vue)
	include_once('vues/login.php');

}
