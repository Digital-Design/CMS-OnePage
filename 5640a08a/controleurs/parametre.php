<?php

include_once('modeles/index.php');
include_once('modeles/parametre.php');

if(!empty($_POST)) {
	header("LOCATION: index.php?page=parametre");
}else{

	$navadmin = getNavAdmin(5);


	// On affiche la page (vue)
	include_once('vues/parametre.php');
}