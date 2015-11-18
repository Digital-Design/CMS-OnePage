<?php

include_once('modeles/index.php');
include_once('modeles/contact.php');

if(!empty($_POST)) {
  for ($i=0; $i <= $_POST['nb_com']; $i++) {

    if($_POST['action_'.$i] == 'delete') $SUCCESS = deleteContact($_POST['id_contact_'.$i]);
  }
}

$titre = 'Contact';
$contact = getContacts();
$sous_titre = count($contact).' personne(s) vous ont contacté';

// On affiche la page (vue)
include_once('vues/template_start.php');
include_once('vues/contact.php');
include_once('vues/template_end.php');