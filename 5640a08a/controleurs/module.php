<?php

include_once('modeles/index.php');
include_once('modeles/module.php');

if(!empty($_POST)) {

	header("LOCATION: index.php?page=module");

}else{

	$navadmin = getNavAdmin(4);
	$modules = getModules();


	// On affiche la page (vue)
	include_once('vues/module.php');
}